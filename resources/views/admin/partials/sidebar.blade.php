<div class="space-y-4">
  <div class="text-sm font-semibold mb-2">Admin</div>
  <nav class="space-y-1">
    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Dashboard</a>
    <a href="{{ route('admin.projects.index') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Projects</a>
    <a href="{{ route('admin.projects.create') }}" class="block px-3 py-2 rounded hover:bg-slate-50">Create Project</a>
  </nav>
</div>
