@extends('layouts.app')

@section('sidebar')
  @include('admin.partials.sidebar')
@endsection

@section('content')
  <div class="animate-fade-in">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Create Project</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-2xl bg-white border border-gray-200 rounded-xl shadow-lg p-8 animate-slide-up">
      @csrf

      <div class="relative">
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
        <div class="relative">
          <input type="text" id="title" name="title" value="{{ old('title') }}" required class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 placeholder-gray-400">
          <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
          </svg>
        </div>
        @error('title')
          <div class="text-red-600 text-sm mt-1 animate-slide-in">{{ $message }}</div>
        @enderror
      </div>

      <div class="relative">
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <textarea id="description" name="description" rows="6" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 placeholder-gray-400 resize-vertical">{{ old('description') }}</textarea>
        @error('description')
          <div class="text-red-600 text-sm mt-1 animate-slide-in">{{ $message }}</div>
        @enderror
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="relative">
          <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
          <div class="relative">
            <input type="text" id="category" name="category" value="{{ old('category') }}" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 placeholder-gray-400">
            <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
          </div>
          @error('category')
            <div class="text-red-600 text-sm mt-1 animate-slide-in">{{ $message }}</div>
          @enderror
        </div>

        <div class="relative">
          <label for="link" class="block text-sm font-medium text-gray-700 mb-2">Link</label>
          <div class="relative">
            <input type="url" id="link" name="link" value="{{ old('link') }}" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 placeholder-gray-400" placeholder="https://example.com">
            <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
            </svg>
          </div>
          @error('link')
            <div class="text-red-600 text-sm mt-1 animate-slide-in">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="relative">
        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image (jpg, png, webp) — max 5MB</label>
        <div class="relative">
          <input type="file" id="image" name="image" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
          <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
          </svg>
        </div>
        @error('image')
          <div class="text-red-600 text-sm mt-1 animate-slide-in">{{ $message }}</div>
        @enderror
      </div>

      <div class="flex items-center space-x-4 pt-4">
        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-emerald-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95">
          <span class="flex items-center justify-center gap-2">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Create Project
          </span>
        </button>
        <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95">Cancel</a>
      </div>
    </form>
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
    @keyframes slide-in {
      from { opacity: 0; transform: translateX(-10px); }
      to { opacity: 1; transform: translateX(0); }
    }
    .animate-slide-in {
      animation: slide-in 0.3s ease-out;
    }
  </style>
@endsection