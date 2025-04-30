<?php
// app/Services/PlatformConfigReader.php
namespace App\Services;

use App\Models\PlatformConfig;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PlatformConfigReader
{
    /**
     * Read all platform configurations from files and update the database.
     *
     * @return array
     */
    public function syncAllPlatformConfigs(): array
    {
        // Get all config files from storage
        $files = Storage::disk('local')->files('platform_configs');
        $results = [];

        foreach ($files as $file) {
            $contents = Storage::disk('local')->get($file);
            $filename = basename($file);

            try {
                $config = $this->parseConfigFile($contents, $filename);
                $results[] = $config;
            } catch (\Exception $e) {
                Log::error("Failed to parse config file {$filename}: " . $e->getMessage());
            }
        }

        return $results;
    }

    /**
     * Parse a platform configuration file and update or create a record in the database.
     *
     * @param string $contents
     * @param string $filename
     * @return PlatformConfig
     */
    public function parseConfigFile(string $contents, string $filename): PlatformConfig
    {
        // Parse the file contents (assumes a simple key=value format)
        $data = [];
        $lines = explode("\n", $contents);

        foreach ($lines as $line) {
            $line = trim($line);

            // Skip comments and empty lines
            if (empty($line) || str_starts_with($line, '#')) {
                continue;
            }

            $parts = explode('=', $line, 2);
            if (count($parts) == 2) {
                $key = trim($parts[0]);
                $value = trim($parts[1]);
                $data[$key] = $value;
            }
        }

        // Determine the platform type based on the filename
        $platformType = 'social';
        if (str_contains($filename, 'marketplace') || str_contains($filename, 'ebay') || str_contains($filename, 'vinted')) {
            $platformType = 'marketplace';
        }

        // Get platform name from filename (remove .config extension)
        $platformName = str_replace('.config', '', $filename);

        // Prepare credentials JSON
        $credentials = [
            'api_key' => $data['api_key'] ?? null,
            'api_secret' => $data['api_secret'] ?? null,
            'access_token' => $data['access_token'] ?? null,
            'refresh_token' => $data['refresh_token'] ?? null,
            'username' => $data['username'] ?? null,
            'password' => $data['password'] ?? null,
        ];

        // Remove null values
        $credentials = array_filter($credentials);

        // Find or create platform config in the database
        return PlatformConfig::updateOrCreate(
            ['platform_name' => $platformName],
            [
                'platform_type' => $platformType,
                'active' => ($data['active'] ?? 'true') === 'true',
                'credentials' => $credentials,
            ]
        );
    }

    /**
     * Read a specific platform configuration.
     *
     * @param string $platformName
     * @return PlatformConfig|null
     */
    public function getPlatformConfig(string $platformName): ?PlatformConfig
    {
        $filename = "{$platformName}.config";
        $path = "platform_configs/{$filename}";

        if (!Storage::disk('local')->exists($path)) {
            return null;
        }

        $contents = Storage::disk('local')->get($path);
        return $this->parseConfigFile($contents, $filename);
    }
}

// app/Console/Commands/SyncPlatformConfigs.php
namespace App\Console\Commands;

use App\Services\PlatformConfigReader;
use Illuminate\Console\Command;

class SyncPlatformConfigs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'platform:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync platform configurations from files to the database';

    /**
     * Execute the console command.
     */
    public function handle(PlatformConfigReader $configReader)
    {
        $this->info('Syncing platform configurations...');

        $platforms = $configReader->syncAllPlatformConfigs();

        $this->info('Successfully synced ' . count($platforms) . ' platform configurations.');

        foreach ($platforms as $platform) {
            $this->line(" - {$platform->platform_name} ({$platform->platform_type})");
        }

        return 0;
    }
}
/*
// Example config files
// storage/app/platform_configs/facebook.config
# Facebook Platform Configuration
api_key=facebook_api_key_here
api_secret=facebook_api_secret_here
access_token=facebook_access_token_here
refresh_token=facebook_refresh_token_here
active=true

// storage/app/platform_configs/instagram.config
# Instagram Platform Configuration
api_key=instagram_api_key_here
api_secret=instagram_api_secret_here
access_token=instagram_access_token_here
refresh_token=instagram_refresh_token_here
active=true

// storage/app/platform_configs/twitter.config
# Twitter Platform Configuration
api_key=twitter_api_key_here
api_secret=twitter_api_secret_here
access_token=twitter_access_token_here
refresh_token=twitter_access_token_secret_here
active=true

// storage/app/platform_configs/tiktok.config
# TikTok Platform Configuration
api_key=tiktok_api_key_here
api_secret=tiktok_api_secret_here
access_token=tiktok_access_token_here
refresh_token=tiktok_refresh_token_here
active=true

// storage/app/platform_configs/ebay.config
# eBay Marketplace Configuration
api_key=ebay_api_key_here
api_secret=ebay_api_secret_here
access_token=ebay_access_token_here
refresh_token=ebay_refresh_token_here
active=true

// storage/app/platform_configs/vinted.config
# Vinted Marketplace Configuration
api_key=vinted_api_key_here
api_secret=vinted_api_secret_here
access_token=vinted_access_token_here
refresh_token=vinted_refresh_token_here
active=true

// storage/app/platform_configs/facebookmarketplace.config
# Facebook Marketplace Configuration
api_key=facebook_marketplace_api_key_here
api_secret=facebook_marketplace_api_secret_here
access_token=facebook_marketplace_access_token_here
refresh_token=facebook_marketplace_refresh_token_here
active=true
*/
