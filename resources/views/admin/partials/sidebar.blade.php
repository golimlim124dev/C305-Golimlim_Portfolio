<div class="space-y-6 animate-fade-in">
  <div class="text-sm font-bold text-gray-700 uppercase tracking-wide mb-4 flex items-center space-x-2">
    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
    </svg>
    <span>Admin Panel</span>
  </div>
  <nav class="space-y-2">
    <a href="{{ route('admin.dashboard') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-800 shadow-md' : 'text-gray-700' }}">
      <svg class="h-5 w-5 {{ request()->routeIs('admin.dashboard') ? 'text-blue-600' : 'text-gray-500 group-hover:text-blue-600' }} transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
      </svg>
      <span class="font-medium">Dashboard</span>
    </a>
    <a href="{{ route('admin.projects.index') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 {{ request()->routeIs('admin.projects.index') ? 'bg-green-100 text-green-800 shadow-md' : 'text-gray-700' }}">
      <svg class="h-5 w-5 {{ request()->routeIs('admin.projects.index') ? 'text-green-600' : 'text-gray-500 group-hover:text-green-600' }} transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
      </svg>
      <span class="font-medium">Projects</span>
    </a>
    <a href="{{ route('admin.projects.create') }}" class="group flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 hover:shadow-md transition-all duration-300 transform hover:scale-105 {{ request()->routeIs('admin.projects.create') ? 'bg-purple-100 text-purple-800 shadow-md' : 'text-gray-700' }}">
      <svg class="h-5 w-5 {{ request()->routeIs('admin.projects.create') ? 'text-purple-600' : 'text-gray-500 group-hover:text-purple-600' }} transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      <span class="font-medium">Create Project</span>
    </a>
  </nav>
</div>

<style>
  @keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in {
    animation: fade-in 0.6s ease-out;
  }
</style>