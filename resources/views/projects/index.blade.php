@extends('layouts.app')

@section('content')
  <h1 class="text-3xl font-bold mb-4">Projects</h1>

  <form method="GET" class="mb-6 flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search projects" class="px-3 py-2 border rounded w-full max-w-md">
    <select name="category" class="px-3 py-2 border rounded">
      <option value="">All categories</option>
      @foreach($categories as $cat)
        <option value="{{ $cat }}" @selected(request('category') == $cat)>{{ $cat }}</option>
      @endforeach
    </select>
    <button class="px-3 py-2 border rounded">Filter</button>
  </form>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($projects as $project)
      <div class="bg-white border rounded overflow-hidden">
        <img src="{{ $project->image ? asset('storage/'.$project->image) : 'https://via.placeholder.com/600x400' }}" alt="{{ $project->title }}" class="project-thumb">
        <div class="p-4">
          <h3 class="font-semibold text-lg">{{ $project->title }}</h3>
          <p class="text-sm text-slate-600 mt-2">{{ \Illuminate\Support\Str::limit($project->description, 140) }}</p>
          <div class="mt-3 flex items-center justify-between">
            @if($project->link)
              <a href="{{ $project->link }}" target="_blank" rel="noopener" class="text-sm text-blue-600">View project</a>
            @endif
            <span class="text-xs text-slate-400">{{ $project->created_at->format('Y-m-d') }}</span>
          </div>
        </div>
      </div>
    @empty
      <div class="col-span-3">No projects found.</div>
    @endforelse
  </div>

  <div class="mt-6">
    {{ $projects->links() }}
  </div>
@endsection
