@extends('layouts.app')

@section('sidebar')
  @include('admin.partials.sidebar')
@endsection

@section('content')
  <div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-bold">Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="px-3 py-2 bg-blue-600 text-white rounded">New Project</a>
  </div>

  <form method="GET" class="mb-4 flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search title or description" class="px-3 py-2 border rounded w-full">
    <select name="category" class="px-3 py-2 border rounded">
      <option value="">All categories</option>
      @foreach($categories as $cat)
        <option value="{{ $cat }}" @selected(request('category') == $cat)>{{ $cat }}</option>
      @endforeach
    </select>
    <button class="px-3 py-2 border rounded">Filter</button>
  </form>

  <div class="bg-white border rounded overflow-x-auto">
    <table class="w-full text-left">
      <thead class="bg-slate-50">
        <tr>
          <th class="p-3">Image</th>
          <th class="p-3">Title</th>
          <th class="p-3">Category</th>
          <th class="p-3">Link</th>
          <th class="p-3">Created</th>
          <th class="p-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($projects as $project)
          <tr class="border-t">
            <td class="p-3">
              <img src="{{ $project->image ? asset('storage/'.$project->image) : 'https://via.placeholder.com/120x80' }}" alt="" class="w-28 h-16 object-cover rounded">
            </td>
            <td class="p-3">{{ $project->title }}</td>
            <td class="p-3">{{ $project->category ?? '-' }}</td>
            <td class="p-3">
              @if($project->link)
                <a href="{{ $project->link }}" target="_blank" class="text-blue-600 underline">View</a>
              @endif
            </td>
            <td class="p-3 text-sm text-slate-500">{{ $project->created_at->format('Y-m-d') }}</td>
            <td class="p-3">
              <a href="{{ route('admin.projects.edit', $project) }}" class="px-2 py-1 border rounded">Edit</a>

              <form action="{{ route('admin.projects.delete', $project) }}" method="POST" class="inline" onsubmit="return confirm('Delete this project?');">
                @csrf
                @method('DELETE')
                <button class="px-2 py-1 border text-red-600 rounded">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="p-4">No projects found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $projects->links() }}
  </div>
@endsection
