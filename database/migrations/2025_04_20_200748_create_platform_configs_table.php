<?php
// database/migrations/xxxx_xx_xx_create_platform_configs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('platform_configs', function (Blueprint $table) {
            $table->id();
            $table->string('platform_name');
            $table->string('platform_type'); // 'social' or 'marketplace'
            $table->boolean('active')->default(true);
            $table->json('credentials'); // Store API keys, tokens, etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('platform_configs');
    }
};
