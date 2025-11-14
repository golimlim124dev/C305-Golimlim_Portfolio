<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justine Robert Golimlim - Portfolio</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- ICONS (Optional: Add Font Awesome for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Base Styles */
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
            transition: background-color .3s, color .3s;
            background: linear-gradient(135deg, #111 0%, #222 100%);
        }

        a {
            text-decoration: none;
        }

        section {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        section.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Navbar */
        .navbar {
            background-color: rgba(17, 17, 17, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar .nav-link {
            color: #fff;
            font-weight: 500;
            transition: color 0.3s ease, transform 0.3s ease;
            position: relative;
        }

        .navbar .nav-link:hover {
            color: #f2f2f2;
            transform: translateY(-2px);
        }

        .navbar .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background-color: #fff;
            transition: width 0.3s ease, left 0.3s ease;
        }

        .navbar .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .navbar-brand:hover {
            color: #f2f2f2;
            transform: scale(1.05);
        }

        /* Hero Section */
        .hero {
            padding: 150px 0 100px;
            background: linear-gradient(135deg, #111 0%, #333 100%);
            color: #fff;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            opacity: 0.1;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            100% { transform: translateY(-100px); }
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            animation: fadeInUp 1s ease-out;
        }

        .hero p {
            font-size: 1.25rem;
            opacity: 0.8;
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .btn-outline-light {
            border: 2px solid #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-outline-light::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #fff;
            transition: left 0.3s ease;
            z-index: -1;
        }

        .btn-outline-light:hover::before {
            left: 0;
        }

        .btn-outline-light:hover {
            color: #111;
            transform: scale(1.05);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* About Section */
        #about {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
        }

        #about h2 {
            position: relative;
        }

        #about h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: #fff;
            transition: width 0.3s ease;
        }

        #about:hover h2::after {
            width: 100px;
        }

        /* Projects */
        .card {
            border: none;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            background: rgba(255, 255, 255, 0.2);
        }

        .card-img-top {
            border-radius: 0.5rem 0.5rem 0 0;
            filter: grayscale(100%);
            transition: all 0.3s ease;
        }

        .card:hover .card-img-top {
            filter: grayscale(0%);
            transform: scale(1.05);
        }

        .card-body {
            transition: padding 0.3s ease;
        }

        .card:hover .card-body {
            padding-top: 1.5rem;
        }

        .card-title {
            transition: color 0.3s ease;
        }

        .card:hover .card-title {
            color: #fff;
        }

        /* Contact */
        #contact {
            background: linear-gradient(135deg, #222 0%, #111 100%);
        }

        .form-control {
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #fff;
            box-shadow: 0 0 0 0.2rem rgba(255,255,255,0.1);
            background: rgba(255, 255, 255, 0.2);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .btn-dark {
            background: #333;
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-dark::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #555;
            transition: left 0.3s ease;
            z-index: -1;
        }

        .btn-dark:hover::before {
            left: 0;
        }

        .btn-dark:hover {
            background: #555;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        /* Footer */
        footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
            font-size: 0.9rem;
            opacity: 0.8;
            background: rgba(17, 17, 17, 0.9);
            backdrop-filter: blur(10px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>

<body class="bg-dark text-light">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-code me-2"></i>JUSTINE ROBERT G.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3">
                    <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#projects" class="nav-link">Projects</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                    <li class="nav-item">
                        <button id="themeToggle" class="btn btn-outline-light btn-sm"><i class="fas fa-sun"></i> Light</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero" id="hero">
        <div class="container">
            <h1>Hello, I'm <span class="text-secondary">Justine Robert Golimlim</span></h1>
            <p>Web Developer • Designer • Problem Solver</p>
            <a href="#projects" class="btn btn-outline-light mt-4 px-4 py-2"><i class="fas fa-arrow-down me-2"></i>View My Work</a>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4"><i class="fas fa-user me-2"></i>ABOUT ME</h2>
            <p class="fs-5 opacity-75">
                I'm a web developer specializing in Laravel, PHP, Bootstrap, and modern UI/UX design.
                I create clean, elegant, and functional digital experiences with professional design principles.
            </p>
        </div>
    </section>

    <!-- PROJECTS -->
    <section id="projects" class="py-5 bg-light text-dark">
        <div class="container">
            <h2 class="fw-bold text-center mb-5"><i class="fas fa-project-diagram me-2"></i>PROJECTS</h2>
            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Project 1">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">Project One</h5>
                            <p class="card-text text-muted small flex-grow-1">A professional, clean description of Project One.</p>
                            <a href="#" class="btn btn-primary mt-auto"><i class="fas fa-external-link-alt me-1"></i>View Project</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Project 2">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">Project Two</h5>
                            <p class="card-text text-muted small flex-grow-1">A professional, clean description of Project Two.</p>
                            <a href="#" class="btn btn-primary mt-auto"><i class="fas fa-external-link-alt me-1"></i>View Project</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100">
                    <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Project 3">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">Project Three</h5>
                            <p class="card-text text-muted small flex-grow-1">A professional, clean description of Project Three.</p>
                            <a href="#" class="btn btn-primary mt-auto"><i class="fas fa-external-link-alt me-1"></i>View Project</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="fw-bold text-center mb-4"><i class="fas fa-envelope me-2"></i>CONTACT</h2>
            <div class="col-md-8 mx-auto">
                <form class="border p-4 rounded shadow-sm bg-light text-dark" method="post" action="#">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <textarea class="form-control mt-3" name="message" rows="4" placeholder="Your message" required></textarea>
                    <button class="btn btn-dark w-100 mt-3"><i class="fas fa-paper-plane me-2"></i>Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-center">
        © <span id="year"></span> MyPortfolio — All rights reserved. <i class="fas fa-heart text-danger ms-1"></i>
    </footer>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DARK MODE SCRIPT + Scroll Animations -->
    <script>
        const toggle = document.getElementById('themeToggle');
        const html = document.documentElement;

        // Set current year in footer
        document.getElementById('year').textContent = new Date().getFullYear();

        if (localStorage.getItem("theme") === "light") {
            html.removeAttribute("data-bs-theme");
            toggle.innerHTML = '<i class="fas fa-moon"></i> Dark';
        }

        toggle.addEventListener("click", () => {
            if (html.getAttribute("data-bs-theme") === "dark") {
                html.removeAttribute("data-bs-theme");
                localStorage.setItem("theme", "light");
                toggle.innerHTML = '<i class="fas fa-moon"></i> Dark';
            } else {
                html.setAttribute("data-bs-theme", "dark");
                localStorage.setItem("theme", "dark");
                toggle.innerHTML = '<i class="fas fa-sun"></i> Light';
            }
        });

        const sections = document.querySelectorAll("section");
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting){
                    entry.target.classList.add("show");
                }
            });
        }, { threshold: 0.1 });

        sections.forEach(section => observer.observe(section));
    </script>

</body>
</html>