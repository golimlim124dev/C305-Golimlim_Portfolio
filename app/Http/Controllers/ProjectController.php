<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // increment simple visitor counter (cache)
        Cache::increment('visitors');

        // pagination and optional category filter
        $query = Project::query();

        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        $projects = $query->latest()->paginate(12)->withQueryString();

        $categories = Project::select('category')->whereNotNull('category')->distinct()->pluck('category');

        return view('projects.index', compact('projects','categories'));
    }
}
