<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function portfolio(Request $request)
    {
        $selected = $request->query('category');

        $query = Portfolio::query()->orderBy('year', 'desc')->orderBy('created_at', 'desc');

        if ($selected) {
            $query->where('category', $selected);
        }

        $portfolios = $query->get();

        // build distinct categories from model records (preserve order by count)
        $categories = Portfolio::query()
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

        // Add "Semua" category with total count
        $totalCount = Portfolio::count();
        $categories->prepend([
            'name' => 'Semua',
            'count' => $totalCount,
        ]);

        return view('portfolio', [
            'portfolios' => $portfolios,
            'categories' => $categories,
            'selectedCategory' => $selected,
        ]);
    }

    /**
     * Show a single portfolio by slug
     */
    public function showPortfolio($slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->firstOrFail();

        return view('portfolio-show', [
            'portfolio' => $portfolio,
        ]);
    }
}
