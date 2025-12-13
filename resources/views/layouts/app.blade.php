<!doctype html>
<html lang="en" class="h-full">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('app.name'))</title>

  <!-- Tailwind via CDN (no npm) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* Minimal custom utilities */
    .sidebar { width: 250px; }
    .project-thumb { width: 100%; height: 160px; object-fit: cover; }

    /* Custom animations */
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
      animation: fade-in 0.6s ease-out;
    }
    @keyframes slide-in-left {
      from { opacity: 0; transform: translateX(-20px); }
      to { opacity: 1; transform: translateX(0); }
    }
    .animate-slide-in-left {
      animation: slide-in-left 0.5s ease-out;
    }
    @keyframes slide-in-right {
      from { opacity: 0; transform: translateX(20px); }
      to { opacity: 1; transform: translateX(0); }
    }
    .animate-slide-in-right {
      animation: slide-in-right 0.5s ease-out;
    }
  </style>

  @stack('head')
</head>

<body class="bg-gradient-to-br from-slate-50 to-gray-100 text-slate-800 min-h-screen transition-all duration-300">
  <div id="app" class="min-h-screen flex animate-fade-in">

    @hasSection('sidebar')
      <aside class="sidebar bg-white border-r border-gray-200 p-6 hidden md:block shadow-lg animate-slide-in-left">
        @yield('sidebar')
      </aside>
    @endif

    <div class="flex-1 flex flex-col">
      <!-- Top navbar -->
      <nav class="bg-white border-b border-gray-200 p-4 flex items-center justify-between shadow-md animate-slide-in-right">
        <div class="flex items-center space-x-3">
          <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
          </svg>
          <a href="{{ url('/') }}"
             class="text-xl font-bold text-gray-800 hover:text-blue-600 transition-colors duration-200">
            {{ config('app.name', 'Portfolio CMS') }}
          </a>
        </div>

        <div class="flex items-center space-x-4">
          @auth
            <div class="flex items-center space-x-3">
              <span class="hidden sm:inline text-gray-700">
                Hi, {{ auth()->user()->name }}
              </span>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                  class="px-4 py-2 bg-red-100 text-red-700 rounded-lg border border-red-300
                         hover:bg-red-200 focus:ring-2 focus:ring-red-500
                         transform transition-all duration-300 hover:scale-105 active:scale-95
                         flex items-center space-x-2">
                  <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  <span>Logout</span>
                </button>
              </form>
            </div>
          @else
            <a href="{{ route('login') }}"
               class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg border border-blue-300
                      hover:bg-blue-200 focus:ring-2 focus:ring-blue-500
                      transform transition-all duration-300 hover:scale-105 active:scale-95
                      flex items-center space-x-2">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
              </svg>
              <span>Login</span>
            </a>

            <a href="{{ route('register') }}"
               class="px-4 py-2 bg-green-100 text-green-700 rounded-lg border border-green-300
                      hover:bg-green-200 focus:ring-2 focus:ring-green-500
                      transform transition-all duration-300 hover:scale-105 active:scale-95
                      flex items-center space-x-2">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
              </svg>
              <span>Register</span>
            </a>
          @endauth
        </div>
      </nav>

      <main class="p-6 flex-1">
        @if(session('success'))
          <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-green-100 border border-green-200
                      text-green-800 rounded-xl shadow-md animate-slide-in-right flex items-center space-x-3">
            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session('success') }}</span>
          </div>
        @endif

        @yield('content')
      </main>
    </div>
  </div>

  @stack('scripts')
</body>
</html>
