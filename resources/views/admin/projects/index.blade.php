@extends('layouts.app')

@section('sidebar')
  @include('admin.partials.sidebar')
@endsection

@section('content')
  <div class="animate-fade-in">
    <div class="flex items-center justify-between mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Projects</h1>
      <a href="{{ route('admin.projects.create') }}" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg font-semibold hover:from-blue-700 hover:to-indigo-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95">
        <span class="flex items-center justify-center gap-2">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          New Project
        </span>
      </a>
    </div>

    <form method="GET" class="mb-8 flex gap-4 bg-white border border-gray-200 rounded-xl shadow-lg p-6 animate-slide-up">
      <div class="flex-1 relative">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search title or description" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 placeholder-gray-400">
        <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
      </div>
      <div class="relative">
        <select name="category" class="border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
          <option value="">All categories</option>
          @foreach($categories as $cat)
            <option value="{{ $cat }}" @selected(request('category') == $cat)>{{ $cat }}</option>
          @endforeach
        </select>
        <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
      </div>
      <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-emerald-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95">
        <span class="flex items-center justify-center gap-2">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
          </svg>
          Filter
        </span>
      </button>
    </form>

    <div class="bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden animate-slide-up" style="animation-delay: 0.1s;">
      <table class="w-full text-left">
        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
          <tr>
            <th class="p-4 font-semibold text-gray-700">Image</th>
            <th class="p-4 font-semibold text-gray-700">Title</th>
            <th class="p-4 font-semibold text-gray-700">Category</th>
            <th class="p-4 font-semibold text-gray-700">Link</th>
            <th class="p-4 font-semibold text-gray-700">Created</th>
            <th class="p-4 font-semibold text-gray-700">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($projects as $project)
            <tr class="border-t border-gray-200 hover:bg-gray-50 transition-colors duration-200">
              <td class="p-4">
                <img src="{{ $project->image ? asset('storage/'.$project->image) : 'https://via.placeholder.com/120x80' }}" alt="Project image" class="w-28 h-16 object-cover rounded-lg shadow-md transform transition-transform duration-300 hover:scale-105">
              </td>
              <td class="p-4 font-medium text-gray-800">{{ $project->title }}</td>
              <td class="p-4 text-gray-600">{{ $project->category ?? '-' }}</td>
              <td class="p-4">
                @if($project->link)
                  <a href="{{ $project->link }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline transition-colors duration-200">View</a>
                @else
                  <span class="text-gray-400">-</span>
                @endif
              </td>
              <td class="p-4 text-sm text-gray-500">{{ $project->created_at->format('Y-m-d') }}</td>
              <td class="p-4 space-x-2">
                <a href="{{ route('admin.projects.edit', $project) }}" class="inline-flex items-center px-3 py-2 bg-blue-100 text-blue-700 rounded-lg font-medium hover:bg-blue-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95">
                  <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                  </svg>
                  Edit
                </a>
                <form action="{{ route('admin.projects.delete', $project) }}" method="POST" class="inline" onsubmit="return confirm('Delete this project?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-100 text-red-700 rounded-lg font-medium hover:bg-red-200 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95">
                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="p-8 text-center text-gray-500">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                No projects found.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-8 animate-slide-up" style="animation-delay: 0.2s;">
      {{ $projects->links() }}
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