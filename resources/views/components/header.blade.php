<nav class="fixed inset-x-0 top-0 z-30 border-b border-slate-800 bg-slate-950/80 backdrop-blur">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            {{-- Brand --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                <div class="h-8 w-8 rounded-xl bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 shadow-lg shadow-blue-500/30 group-hover:scale-105 transition-transform"></div>
                <div class="flex flex-col">
                    <span class="text-sm font-semibold tracking-tight">
                        Justine Robert Golimlim
                    </span>
                    <span class="text-[11px] text-slate-400 leading-none">
                        CS Student • Aspiring Full-Stack Dev
                    </span>
                </div>
            </a>

            {{-- Desktop nav --}}
            <div class="hidden md:flex items-center gap-6 text-sm">
                <a href="{{ url('/') }}" class="hover:text-blue-400 transition">Home</a>
                <a href="{{ url('/#projects') }}" class="hover:text-blue-400 transition">Projects</a>
                <a href="{{ url('/#contact') }}" class="hover:text-blue-400 transition">Contact</a>

                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-3 py-1.5 rounded-full border border-slate-700 hover:border-blue-500 hover:text-blue-300 text-xs font-medium">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login.form') }}"
                       class="text-xs text-slate-300 hover:text-blue-400">
                        Login
                    </a>
                    <a href="{{ route('register.form') }}"
                       class="px-3 py-1.5 rounded-full bg-blue-600 hover:bg-blue-700 text-xs font-medium shadow shadow-blue-600/30">
                        Sign up
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>