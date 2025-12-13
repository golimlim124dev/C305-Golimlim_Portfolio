@extends('layouts.app')

@section('content')
<style>
:root{
    --primary:#8b5cf6;
    --secondary:#ec4899;
    --accent:#06b6d4;
    --bg-primary:#0f0f23;
    --bg-secondary:#14142b;
    --text-primary:#ffffff;
    --text-secondary:#b6b6c6;
    --card-bg:#1a1a2e;
    --border-color:#2a2a3e;
}

html{
    scroll-behavior:smooth;
}

body{
    background:
        radial-gradient(1200px 600px at 10% -10%, rgba(139,92,246,.15), transparent 40%),
        radial-gradient(800px 500px at 90% 10%, rgba(236,72,153,.12), transparent 45%),
        linear-gradient(135deg, var(--bg-primary), var(--bg-secondary));
    color:var(--text-primary);
    font-family:'Inter', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    font-weight: 600; /* Increased base weight for bolder, more readable text */
}

/* TYPOGRAPHY */
h1,h2,h3{
    letter-spacing:-0.02em;
    font-weight: 800; /* Extra bold for headings */
}
p{
    line-height:1.75;
    font-weight: 500; /* Bolder for paragraphs */
}

/* GRADIENT TEXT */
.gradient-text{
    background:linear-gradient(90deg,var(--primary),var(--secondary),var(--accent));
    background-size:200% 200%;
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    animation:gradientMove 8s ease infinite;
    font-weight: 900; /* Maximum bold for gradient text */
}
@keyframes gradientMove{
    0%{background-position:0% 50%}
    50%{background-position:100% 50%}
    100%{background-position:0% 50%}
}

/* REVEAL */
.section-reveal{
    opacity:0;
    transform:translateY(50px);
    transition:opacity .9s cubic-bezier(.4,0,.2,1), transform .9s cubic-bezier(.4,0,.2,1);
}
.section-reveal.revealed{
    opacity:1;
    transform:translateY(0);
}

/* CARDS */
.card-premium{
    background:linear-gradient(180deg,rgba(255,255,255,.03),rgba(255,255,255,0)) , var(--card-bg);
    border:1px solid var(--border-color);
    border-radius:1rem;
    transition:transform .45s cubic-bezier(.4,0,.2,1),
               box-shadow .45s cubic-bezier(.4,0,.2,1),
               border-color .45s;
}
.card-premium:hover{
    transform:translateY(-10px) scale(1.015);
    border-color:rgba(139,92,246,.5);
    box-shadow:
        0 30px 60px rgba(0,0,0,.6),
        0 0 0 1px rgba(139,92,246,.25);
}

/* BUTTONS */
.btn-interactive{
    background:linear-gradient(90deg,var(--primary),var(--secondary));
    color:var(--text-primary);
    border-radius:.75rem;
    font-weight:700; /* Bolder for buttons */
    letter-spacing:.01em;
    transition:transform .25s ease,
               box-shadow .25s ease,
               filter .25s ease;
}
.btn-interactive:hover{
    transform:translateY(-3px);
    filter:brightness(1.05);
    box-shadow:0 15px 35px rgba(139,92,246,.45);
}
.btn-interactive:active{
    transform:translateY(0);
    box-shadow:0 8px 18px rgba(139,92,246,.35);
}

/* FORMS */
input,select{
    background:rgba(255,255,255,.03);
    border:1px solid var(--border-color);
    border-radius:.75rem;
    font-weight: 500; /* Bolder for form text */
    transition:border-color .25s ease, box-shadow .25s ease;
}
input:focus,select:focus{
    outline:none;
    border-color:var(--primary);
    box-shadow:0 0 0 3px rgba(139,92,246,.25);
}

/* PROGRESS */
.progress-bar{
    background:linear-gradient(90deg,var(--primary),var(--accent));
    width:0%;
    transition:width 1.6s cubic-bezier(.4,0,.2,1);
}

/* SOCIAL */
.social-svg{
    width:56px;
    height:56px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:linear-gradient(180deg,rgba(255,255,255,.05),rgba(255,255,255,0));
    border:1px solid var(--border-color);
    border-radius:50%;
    transition:transform .35s ease, box-shadow .35s ease, border-color .35s ease;
}
.social-svg:hover{
    transform:translateY(-6px) scale(1.1);
    border-color:rgba(139,92,246,.5);
    box-shadow:0 18px 35px rgba(139,92,246,.4);
}
.social-svg svg{
    width:26px;
    height:26px;
}
</style>

<div class="container mx-auto px-6 sm:px-8 py-24">

{{-- HERO --}}
<section class="text-center max-w-4xl mx-auto mb-40 section-reveal">
    <h1 class="text-5xl sm:text-6xl font-extrabold mb-8 gradient-text">
        Hello, I’m Justine Robert Golimlim
    </h1>
    <p class="text-xl text-gray-400 max-w-3xl mx-auto">
        A 3rd Year Computer Science student passionate about building modern, scalable, and user-focused web applications.
    </p>
</section>

{{-- ABOUT --}}
<section class="max-w-5xl mx-auto mb-40 section-reveal text-center">
    <h2 class="text-3xl font-bold mb-6">About Me</h2>
    <p class="text-gray-400 text-lg mb-14 max-w-3xl mx-auto">
        I enjoy transforming ideas into functional digital products by combining clean design, strong backend logic, and thoughtful user experience.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="p-8 card-premium">
            <h3 class="font-semibold mb-3 text-white">Education</h3>
            <p class="text-sm text-gray-400">
                BS Computer Science<br>
                3rd Year — City College of Angeles
            </p>
        </div>

        <div class="p-8 card-premium">
            <h3 class="font-semibold mb-3 text-white">Interests</h3>
            <p class="text-sm text-gray-400">
                Programming · UI/UX · Cybersecurity · Media Editing
            </p>
        </div>

        <div class="p-8 card-premium">
            <h3 class="font-semibold mb-3 text-white">Achievements</h3>
            <p class="text-sm text-gray-400">
                Graduated with Honors<br>
                Honor Roll (All Quarters)
            </p>
        </div>
    </div>
</section>

{{-- SKILLS --}}
<section class="max-w-4xl mx-auto mb-40 section-reveal">
    <h2 class="text-3xl font-bold text-center mb-14">Skills</h2>

    @foreach([
        ['HTML / CSS',80],
        ['JavaScript',75],
        ['PHP / Laravel',85],
        ['MySQL',70],
        ['UI / UX Design',90],
    ] as [$label,$value])
        <div class="mb-6">
            <p class="mb-2 text-sm tracking-wide text-black-300">{{ $label }}</p>
            <div class="w-full bg-gray-800/60 rounded-full h-4 overflow-hidden">
                <div class="h-4 rounded-full progress-bar" data-width="{{ $value }}"></div>
            </div>
        </div>
    @endforeach
</section>

{{-- PROJECTS --}}
<section class="section-reveal mb-28">
    <h2 class="text-4xl font-extrabold text-center mb-10">Projects</h2>

    <form method="GET" class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
        <input name="search" value="{{ request('search') }}" placeholder="Search projects"
               class="px-5 py-3 w-full max-w-md">
        <select name="category" class="px-5 py-3">
            <option value="">All categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat }}" @selected(request('category')==$cat)>{{ $cat }}</option>
            @endforeach
        </select>
        <button class="px-8 py-3 btn-interactive">
            Filter
        </button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($projects as $project)
            <div class="card-premium overflow-hidden">
                <img
                    src="{{ $project->image ? asset('storage/'.$project->image) : 'https://via.placeholder.com/600x400' }}"
                    class="h-52 w-full object-cover">
                <div class="p-7">
                    <h3 class="font-semibold text-white mb-3">{{ $project->title }}</h3>
                    <p class="text-sm text-gray-400">
                        {{ \Illuminate\Support\Str::limit($project->description,140) }}
                    </p>
                    <div class="flex justify-between items-center mt-5">
                        @if($project->link)
                            <a href="{{ $project->link }}" target="_blank" class="text-sm font-medium text-violet-400 hover:underline">
                                View
                            </a>
                        @endif
                        <span class="text-xs text-gray-500">
                            {{ $project->created_at->format('Y-m-d') }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No projects found.</p>
        @endforelse
    </div>

    <div class="mt-16 flex justify-center">
        {{ $projects->links() }}
    </div>
</section>

{{-- CONTACT --}}
<section class="text-center max-w-3xl mx-auto section-reveal mt-40">
    <h2 class="text-3xl font-bold mb-5">Let’s Build Something Together</h2>
    <p class="text-gray-400 mb-12">
        I’m open to collaborations, internships, and opportunities.
    </p>

    <div class="flex justify-center gap-8 mb-12">
        <a href="https://www.facebook.com/share/1JPXgEggMm/" target="_blank" class="social-svg">
            <svg viewBox="0 0 24 24"><path fill="#1877F2" d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.097 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953h-1.513c-1.49 0-1.953.926-1.953 1.874v2.25h3.328l-.532 3.49h-2.796V24z"/></svg>
        </a>

        <a href="https://www.instagram.com/jrgginetsuj" target="_blank" class="social-svg">
            <svg viewBox="0 0 24 24">
                <defs>
                    <linearGradient id="ig" x1="0%" y1="100%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#feda75"/>
                        <stop offset="25%" stop-color="#fa7e1e"/>
                        <stop offset="50%" stop-color="#d62976"/>
                        <stop offset="75%" stop-color="#962fbf"/>
                        <stop offset="100%" stop-color="#4f5bd5"/>
                    </linearGradient>
                </defs>
                <path fill="url(#ig)" d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.343 3.608 1.319.975.975 1.257 2.242 1.319 3.608.058 1.266.069 1.645.069 4.84s-.012 3.574-.07 4.84c-.062 1.366-.344 2.633-1.319 3.608-.975.976-2.242 1.257-3.608 1.319-1.266.058-1.645.07-4.84.07s-3.574-.012-4.84-.07c-1.366-.062-2.633-.343-3.608-1.319-.976-.975-1.257-2.242-1.319-3.608C2.175 15.574 2.163 15.195 2.163 12s.012-3.574.07-4.84c.062-1.366.343-2.633 1.319-3.608.975-.976 2.242-1.257 3.608-1.319C8.426 2.175 8.806 2.163 12 2.163z"/>
            </svg>
        </a>

        <a href="https://github.com/golimlim124dev" target="_blank" class="social-svg">
            <svg viewBox="0 0 24 24"><path fill="#24292e" d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.757-1.333-1.757-1.089-.745.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.418-1.305.762-1.605-2.665-.305-5.466-1.332-5.466-5.93 0-1.31.468-2.38 1.235-3.22-.123-.303-.535-1.523.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.241 2.873.118 3.176.77.84 1.233 1.91 1.233 3.22 0 4.61-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.218.694.825.576C20.565 22.092 24 17.592 24 12.297z"/></svg>
        </a>

        <a href="mailto:justinerobertgolimlim0124@gmail.com" class="social-svg">
            <svg viewBox="0 0 24 24">
                <path fill="#EA4335" d="M12 13.065L.75 6.375v11.25c0 .828.672 1.5 1.5 1.5h19.5c.828 0 1.5-.672 1.5-1.5V6.375L12 13.065z"/>
                <path fill="#FBBC04" d="M23.25 4.125c0-.828-.672-1.5-1.5-1.5H2.25c-.828 0-1.5.672-1.5 1.5l11.25 6.75 11.25-6.75z"/>
            </svg>
        </a>
    </div>
</section>

<footer class="text-center text-sm text-gray-500 mt-40">
    © {{ date('Y') }} Justine Robert Golimlim. All rights reserved.
</footer>
</div>

<script>
const revealObserver=new IntersectionObserver(e=>{
    e.forEach(x=>x.isIntersecting&&x.target.classList.add('revealed'))
},{threshold:.15});
document.querySelectorAll('.section-reveal').forEach(el=>revealObserver.observe(el));

const skillObserver=new IntersectionObserver(e=>{
    e.forEach(x=>{
        if(x.isIntersecting){
            x.target.style.width=x.target.dataset.width+'%';
        }
    })
},{threshold:.6});
document.querySelectorAll('.progress-bar').forEach(bar=>skillObserver.observe(bar));
</script>
@endsection