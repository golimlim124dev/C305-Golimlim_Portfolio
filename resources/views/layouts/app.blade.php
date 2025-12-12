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
<body class="bg-gradient-to-br from-slate-50 to-gray-100 dark:from-slate-900 dark:to-gray-900 text-slate-800 dark:text-white min-h-screen transition-all duration-300">
  <div id="app" class="min-h-screen flex animate-fade-in">
    @hasSection('sidebar')
      <aside class="sidebar bg-white dark:bg-slate-800 border-r border-gray-200 dark:border-gray-700 p-6 hidden md:block shadow-lg animate-slide-in-left">
        @yield('sidebar')
      </aside>
    @endif

    <div class="flex-1 flex flex-col">
      <!-- Top navbar -->
      <nav class="bg-white dark:bg-slate-800 border-b border-gray-200 dark:border-gray-700 p-4 flex items-center justify-between shadow-md animate-slide-in-right">
        <div class="flex items-center space-x-3">
          <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
          </svg>
          <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">{{ config('app.name', 'Portfolio CMS') }}</a>
        </div>

        <div class="flex items-center space-x-4">
          <!-- Dark mode toggle -->
          <button id="dark-toggle" class="px-4 py-2 bg-gray-100 dark:bg-slate-700 text-gray-700 dark:text-white rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-slate-600 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95 flex items-center space-x-2">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
            <span>Dark</span>
          </button>

          @auth
            <div class="flex items-center space-x-3">
              <span class="hidden sm:inline text-gray-700 dark:text-gray-300">Hi, {{ auth()->user()->name }}</span>
              <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-lg border border-red-300 dark:border-red-700 hover:bg-red-200 dark:hover:bg-red-800 focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95 flex items-center space-x-2">
                  <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  <span>Logout</span>
                </button>
              </form>
            </div>
          @else
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 rounded-lg border border-blue-300 dark:border-blue-700 hover:bg-blue-200 dark:hover:bg-blue-800 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95 flex items-center space-x-2">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
              </svg>
              <span>Login</span>
            </a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg border border-green-300 dark:border-green-700 hover:bg-green-200 dark:hover:bg-green-800 focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 focus:ring-offset-2 transform transition-all duration-300 hover:scale-105 active:scale-95 flex items-center space-x-2">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
              </svg>
              <span>Register</span>
            </a>
          @endauth
        </div>
      </nav>

      <main class="p-6 flex-1">
        @if(session('success'))
            <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-green-100 dark:from-green-900 dark:to-green-800 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 rounded-xl shadow-md animate-slide-in-right flex items-center space-x-3">
              <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <span>{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
      </main>
    </div>
  </div>

  <script>
    // Dark mode toggle (localStorage)
    const btn = document.getElementById('dark-toggle');
    const root = document.documentElement;
    const isDark = localStorage.getItem('dark') === '1';
    if (isDark) {
      root.classList.add('dark');
      btn.innerHTML = `
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>
        <span>Light</span>
      `;
    }

    btn?.addEventListener('click', () => {
      const dark = root.classList.toggle('dark');
      if (dark) {
        localStorage.setItem('dark', '1');
        btn.innerHTML = `
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
          </svg>
          <span>Light</span>
        `;
      } else {
        localStorage.setItem('dark', '0');
        btn.innerHTML = `
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
          </svg>
          <span>Dark</span>
        `;
      }
    });
  </script>

  @stack('scripts')
</body>
</html>
