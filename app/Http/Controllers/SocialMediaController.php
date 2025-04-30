<?php
namespace App\Http\Controllers;

use App\Models\PlatformConfig;
use App\Models\PlatformPost;
use App\Services\SocialMediaService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SocialMediaController extends Controller
{
    protected $socialMediaService;

    public function __construct(SocialMediaService $socialMediaService)
    {
        $this->socialMediaService = $socialMediaService;
    }

    public function index()
    {
        $platforms = PlatformConfig::social()->active()->get();
        $posts = PlatformPost::ofType('social')->with('platform')->latest()->paginate(10);

        return Inertia::render('Admin/SocialMedia/Index', [
            'platforms' => $platforms,
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $platforms = PlatformConfig::social()->active()->get();

        return Inertia::render('Admin/SocialMedia/Create', [
            'platforms' => $platforms,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'media' => 'nullable|array',
            'media.*' => 'file|max:10240', // 10MB limit per file
            'platforms' => 'required|array',
            'platforms.*' => 'exists:platform_configs,id',
        ]);

        $mediaFiles = [];
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('social_media', 'public');
                $mediaFiles[] = $path;
            }
        }

        $publishedPosts = $this->socialMediaService->publishToAll(
            $validated['content'],
            $mediaFiles,
            $validated['platforms']
        );

        return redirect()->route('admin.social-media.index')
            ->with('success', 'Posted to ' . count($publishedPosts) . ' social media platforms.');
    }
}
