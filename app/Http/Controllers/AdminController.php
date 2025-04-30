<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\PlatformConfig;
use App\Models\PlatformPost;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        $recentPosts = BlogPost::latest()->take(5)->get();
        $socialPlatforms = PlatformConfig::social()->active()->get();
        $marketplacePlatforms = PlatformConfig::marketplace()->active()->get();

        return Inertia::render('Admin/Dashboard', [
            'recentPosts' => $recentPosts,
            'socialPlatforms' => $socialPlatforms,
            'marketplacePlatforms' => $marketplacePlatforms,
        ]);
    }

    public function blogIndex()
    {
        $posts = BlogPost::latest()->paginate(10);

        return Inertia::render('Admin/Blog/Index', [
            'posts' => $posts,
        ]);
    }

    public function platformConfigs()
    {
        $socialPlatforms = PlatformConfig::social()->get();
        $marketplacePlatforms = PlatformConfig::marketplace()->get();

        return Inertia::render('Admin/Platforms/Index', [
            'socialPlatforms' => $socialPlatforms,
            'marketplacePlatforms' => $marketplacePlatforms,
        ]);
    }
}
