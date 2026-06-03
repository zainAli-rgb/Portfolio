<nav class="navbar" id="navbar">
    <div class="nav-wrap">
        <a href="{{ route('home') }}" class="nav-logo">
            <span class="bracket">&lt;</span>ZAA<span class="bracket">/&gt;</span>
        </a>

        <button class="nav-burger" id="navBurger" aria-label="Toggle menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <ul class="nav-links" id="navLinks">
            <li><a href="#about" class="nav-link">About</a></li>
            <li><a href="#skills" class="nav-link">Skills</a></li>
            <li><a href="#projects" class="nav-link">Projects</a></li>
            <li><a href="#experience" class="nav-link">Experience</a></li>
            <li><a href="#certifications" class="nav-link">Certs</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
            <li>
                <a href="{{ asset('files/Zain_Ali_Asghar_CV.pdf') }}" download class="nav-cta">
                    Download CV
                </a>
            </li>
        </ul>
    </div>
</nav>
