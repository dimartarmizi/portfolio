<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        return Inertia::render('Index');
    }

    // Blogs
    public function blogsIndex()
    {
        return Inertia::render('Blogs/Index');
    }

    public function blogsShow($slug)
    {
        return Inertia::render('Blogs/Show', ['slug' => $slug]);
    }

    // Experiences
    public function experiencesIndex()
    {
        return Inertia::render('Experiences/Index');
    }

    public function experiencesShow($id)
    {
        return Inertia::render('Experiences/Show', ['id' => $id]);
    }

    // Projects
    public function projectsIndex()
    {
        return Inertia::render('Projects/Index');
    }

    public function projectsShow($id)
    {
        return Inertia::render('Projects/Show', ['id' => $id]);
    }
}
