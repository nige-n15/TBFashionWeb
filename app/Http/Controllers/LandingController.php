<?php
// app/Http/Controllers/LandingController.php
namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        $featuredPosts = BlogPost::published()->take(3)->get();

        return Inertia::render('Landing/Index', [
            'featuredPosts' => $featuredPosts,
        ]);
    }

    public function about()
    {
        return Inertia::render('Landing/About');
    }

    public function contact()
    {
        return Inertia::render('Landing/Contact');
    }
}
