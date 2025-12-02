<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function project(Request $request)
    {
        $selected = $request->query('category');

        $query = Project::query()->orderBy('year', 'desc')->orderBy('created_at', 'desc');

        if ($selected) {
            $query->where('category', $selected);
        }

        $projects = $query->get();

        $categories = Project::query()
            ->select('category', DB::raw('COUNT(*) as count'))
            ->groupBy('category')
            ->orderByDesc('count')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->category,
                    'count' => $item->count,
                ];
            });

        $totalCount = Project::count();
        $categories->prepend([
            'name' => 'Semua',
            'count' => $totalCount,
        ]);

        return view('project', [
            'projects' => $projects,
            'categories' => $categories,
            'selectedCategory' => $selected,
        ]);
    }

    public function showProject($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('project-show', [
            'project' => $project,
        ]);
    }
}
