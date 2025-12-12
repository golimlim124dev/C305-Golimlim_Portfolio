@extends('layouts.app')

@section('sidebar')
  @include('admin.partials.sidebar')
@endsection

@section('content')
  <div class="animate-fade-in">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="p-6 bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105 animate-slide-up">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-blue-600 font-medium">Total Projects</div>
            <div class="text-3xl font-bold text-blue-800 mt-1">{{ $totalProjects }}</div>
          </div>
          <div class="p-3 bg-blue-200 rounded-full">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
          </div>
        </div>
      </div>

      <div class="p-6 bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105 animate-slide-up" style="animation-delay: 0.1s;">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-green-600 font-medium">Visitors (cached)</div>
            <div class="text-3xl font-bold text-green-800 mt-1">{{ $visitors }}</div>
          </div>
          <div class="p-3 bg-green-200 rounded-full">
            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
          </div>
        </div>
      </div>

      <div class="p-6 bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105 animate-slide-up" style="animation-delay: 0.2s;">
        <div class="flex items-center justify-between">
          <div>
            <div class="text-sm text-purple-600 font-medium">Projects with Images</div>
            <div class="text-3xl font-bold text-purple-800 mt-1">{{ $totalImages }}</div>
          </div>
          <div class="p-3 bg-purple-200 rounded-full">
            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 animate-fade-in" style="animation-delay: 0.3s;">
      <h2 class="text-xl font-semibold mb-4 text-gray-800">Recent Projects</h2>
      <ul class="space-y-4">
        @forelse($recentProjects as $p)
          <li class="py-3 border-b border-gray-100 last:border-b-0 hover:bg-gray-50 rounded-lg transition-colors duration-200 cursor-pointer">
            <div class="flex items-center space-x-4">
              <img src="{{ $p->image ? asset('storage/'.$p->image) : 'https://via.placeholder.com/80x60' }}" alt="" class="w-20 h-14 object-cover rounded-lg shadow-md transform transition-transform duration-300 hover:scale-110">
              <div class="flex-1">
                <div class="font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-200">{{ $p->title }}</div>
                <div class="text-sm text-gray-600 mt-1">{{ Str::limit($p->description, 80) }}</div>
              </div>
              <div class="text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
              </div>
            </div>
          </li>
        @empty
          <li class="text-center text-gray-500 py-8">No recent projects</li>
        @endforelse
      </ul>
    </div>
  </div>

  <style>
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
      animation: fade-in 0.6s ease-out;
    }
    @keyframes slide-up {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-slide-up {
      animation: slide-up 0.5s ease-out;
    }
  </style>
@endsection