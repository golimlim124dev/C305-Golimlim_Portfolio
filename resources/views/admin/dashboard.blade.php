@extends('layouts.app')

@section('sidebar')
  @include('admin.partials.sidebar')
@endsection

@section('content')
  <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="p-4 bg-white border rounded">
      <div class="text-sm text-slate-500">Total Projects</div>
      <div class="text-2xl font-semibold">{{ $totalProjects }}</div>
    </div>

    <div class="p-4 bg-white border rounded">
      <div class="text-sm text-slate-500">Visitors (cached)</div>
      <div class="text-2xl font-semibold">{{ $visitors }}</div>
    </div>

    <div class="p-4 bg-white border rounded">
      <div class="text-sm text-slate-500">Projects with Images</div>
      <div class="text-2xl font-semibold">{{ $totalImages }}</div>
    </div>
  </div>

  <div class="bg-white border rounded p-4">
    <h2 class="font-semibold mb-3">Recent Projects</h2>
    <ul>
      @forelse($recentProjects as $p)
        <li class="py-2 border-b last:border-b-0">
          <div class="flex items-center space-x-3">
            <img src="{{ $p->image ? asset('storage/'.$p->image) : 'https://via.placeholder.com/80x60' }}" alt="" class="w-20 h-14 object-cover rounded">
            <div>
              <div class="font-medium">{{ $p->title }}</div>
              <div class="text-xs text-slate-500">{{ Str::limit($p->description, 80) }}</div>
            </div>
          </div>
        </li>
      @empty
        <li>No recent projects</li>
      @endforelse
    </ul>
  </div>
@endsection
