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
  </style>

  @stack('head')
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen">
  <div id="app" class="min-h-screen flex">
    @hasSection('sidebar')
      <aside class="sidebar bg-white border-r p-4 hidden md:block">
        @yield('sidebar')
      </aside>
    @endif

    <div class="flex-1">
      <!-- Top navbar -->
      <nav class="bg-white border-b p-3 flex items-center justify-between">
        <div>
          <a href="{{ url('/') }}" class="text-lg font-semibold">{{ config('app.name', 'Portfolio CMS') }}</a>
        </div>

        <div class="flex items-center space-x-3">
          <!-- Dark mode toggle -->
          <button id="dark-toggle" class="px-3 py-1 rounded border">Dark</button>

          @auth
            <div class="flex items-center space-x-3">
              <span class="hidden sm:inline">Hi, {{ auth()->user()->name }}</span>
              <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-sm px-3 py-1 border rounded">Logout</button>
              </form>
            </div>
          @else
            <a href="{{ route('login') }}" class="px-3 py-1 border rounded">Login</a>
            <a href="{{ route('register') }}" class="px-3 py-1 border rounded">Register</a>
          @endauth
        </div>
      </nav>

      <main class="p-6">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-800 rounded">
                {{ session('success') }}
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
    if (isDark) root.classList.add('dark'), document.body.classList.add('bg-slate-900','text-white');

    btn?.addEventListener('click', () => {
      const dark = root.classList.toggle('dark');
      if (dark) {
        document.body.classList.add('bg-slate-900','text-white');
        localStorage.setItem('dark', '1');
      } else {
        document.body.classList.remove('bg-slate-900','text-white');
        localStorage.setItem('dark', '0');
      }
    });
  </script>

  @stack('scripts')
</body>
</html>
