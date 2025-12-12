<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $totalImages = Project::whereNotNull('image')->count();
        // Simple visitor counter using cache
        $visitors = Cache::get('visitors', 0);

        $recentProjects = Project::latest()->limit(5)->get();

        return view('admin.dashboard', compact('totalProjects','totalImages','visitors','recentProjects'));
    }
}
