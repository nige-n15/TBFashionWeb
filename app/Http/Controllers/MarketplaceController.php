<?php
namespace App\Http\Controllers;

use App\Models\PlatformConfig;
use App\Models\PlatformPost;
use App\Services\MarketplaceService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MarketplaceController extends Controller
{
    protected $marketplaceService;

    public function __construct(MarketplaceService $marketplaceService)
    {
        $this->marketplaceService = $marketplaceService;
    }

    public function index()
    {
        $platforms = PlatformConfig::marketplace()->active()->get();
        $listings = PlatformPost::ofType('marketplace')->with('platform')->latest()->paginate(10);

        return Inertia::render('Admin/Marketplace/Index', [
            'platforms' => $platforms,
            'listings' => $listings,
        ]);
    }

    public function create()
    {
        $platforms = PlatformConfig::marketplace()->active()->get();

        return Inertia::render('Admin/Marketplace/Create', [
            'platforms' => $platforms,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|size:3',
            'media' => 'required|array|min:1',
            'media.*' => 'file|image|max:10240', // 10MB limit per file
            'platforms' => 'required|array',
            'platforms.*' => 'exists:platform_configs,id',
            'metadata' => 'nullable|array',
        ]);

        $mediaFiles = [];
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('marketplace', 'public');
                $mediaFiles[] = $path;
            }
        }

        $metadata = [
            'price' => $validated['price'],
            'currency' => $validated['currency'],
        ];

        if (isset($validated['metadata'])) {
            $metadata = array_merge($metadata, $validated['metadata']);
        }

        $publishedListings = $this->marketplaceService->publishToAll(
            $validated['title'],
            $validated['content'],
            $mediaFiles,
            $metadata,
            $validated['platforms']
        );

        return redirect()->route('admin.marketplace.index')
            ->with('success', 'Listed on ' . count($publishedListings) . ' marketplace platforms.');
    }
}
