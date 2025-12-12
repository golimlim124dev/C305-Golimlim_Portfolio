@extends('layouts.app')

@section('content')
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">Projects</h1>

    <form method="GET" class="mb-8 flex flex-col sm:flex-row gap-4 items-center justify-center">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search projects" class="px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full max-w-md transition duration-200">
      <select name="category" class="px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
        <option value="">All categories</option>
        @foreach($categories as $cat)
          <option value="{{ $cat }}" @selected(request('category') == $cat)>{{ $cat }}</option>
        @endforeach
      </select>
      <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">Filter</button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @forelse($projects as $project)
        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
          <img src="{{ $project->image ? asset('storage/'.$project->image) : 'https://via.placeholder.com/600x400' }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="font-semibold text-xl text-gray-900 mb-2">{{ $project->title }}</h3>
            <p class="text-sm text-gray-600 leading-relaxed">{{ \Illuminate\Support\Str::limit($project->description, 140) }}</p>
            <div class="mt-4 flex items-center justify-between">
              @if($project->link)
                <a href="{{ $project->link }}" target="_blank" rel="noopener" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors duration-200">View project</a>
              @endif
              <span class="text-xs text-gray-500">{{ $project->created_at->format('Y-m-d') }}</span>
            </div>
          </div>
        </div>
      @empty
        <div class="col-span-full text-center py-12">
          <p class="text-gray-500 text-lg">No projects found.</p>
        </div>
      @endforelse
    </div>

    <div class="mt-12 flex justify-center">
      {{ $projects->links() }}
    </div>
  </div>
@endsection