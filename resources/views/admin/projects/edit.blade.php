@extends('layouts.app')

@section('sidebar')
  @include('admin.partials.sidebar')
@endsection

@section('content')
  <h1 class="text-2xl font-bold mb-4">Edit Project</h1>

  <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-2xl">
    @csrf
    @method('PUT')

    <div>
      <label class="block text-sm font-medium">Title</label>
      <input name="title" value="{{ old('title', $project->title) }}" required class="mt-1 w-full border px-3 py-2 rounded">
      @error('title') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Description</label>
      <textarea name="description" rows="6" class="mt-1 w-full border px-3 py-2 rounded">{{ old('description', $project->description) }}</textarea>
      @error('description') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-medium">Category</label>
        <input name="category" value="{{ old('category', $project->category) }}" class="mt-1 w-full border px-3 py-2 rounded">
        @error('category') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium">Link</label>
        <input name="link" value="{{ old('link', $project->link) }}" class="mt-1 w-full border px-3 py-2 rounded" placeholder="https://example.com">
        @error('link') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
      </div>
    </div>

    <div>
      <label class="block text-sm font-medium">Current Image</label>
      <div class="mt-2">
        <img src="{{ $project->image ? asset('storage/'.$project->image) : 'https://via.placeholder.com/320x240' }}" alt="" class="w-48 h-32 object-cover rounded">
      </div>
    </div>

    <div>
      <label class="block text-sm font-medium">Replace Image (optional)</label>
      <input type="file" name="image" class="mt-1">
      @error('image') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div>
      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
      <a href="{{ route('admin.projects.index') }}" class="ml-2 text-sm">Cancel</a>
    </div>
  </form>
@endsection
