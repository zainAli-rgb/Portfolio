@extends('layouts.app')
@section('title', 'Zain Ali Asghar – Full Stack Laravel Developer')
@section('content')

    {{-- ══════════════════════════════════════
     HERO
══════════════════════════════════════ --}}
    <section class="snap-section hero" id="home" data-label="Home">
        <canvas id="heroCanvas"></canvas>
        <div class="hero-grid-bg"></div>
        <div class="hero-glow-1"></div>
        <div class="hero-glow-2"></div>

        <div class="hero-inner snap-inner">
            <div class="container">
                <div class="hero-grid">

                    {{-- LEFT: Text --}}
                    <div>
                        <div class="hero-badge">
                            <span class="badge-dot"></span>
                            Available for opportunities
                        </div>

                        <h1 class="hero-name">
                            <span class="name-1">Zain Ali</span>
                            <span class="name-2">Asghar</span>
                        </h1>

                        <p class="hero-role">Full Stack Developer</p>

                        <p class="hero-tagline">
                            I architect and ship scalable web applications using <strong>Laravel</strong> &amp;
                            <strong>Vue.js</strong> — turning complex problems into elegant, production-ready solutions.
                        </p>

                        <div class="hero-actions">
                            <a href="#projects" class="btn btn-primary">View My Work</a>
                            <a href="#contact" class="btn btn-ghost">Let's Connect</a>
                        </div>

                        <div class="hero-stats">
                            <div class="stat">
                                <span class="stat-num">1+</span>
                                <span class="stat-lbl">Years Experience</span>
                            </div>
                            <div class="stat-div"></div>
                            <div class="stat">
                                <span class="stat-num">6+</span>
                                <span class="stat-lbl">Projects Shipped</span>
                            </div>
                            <div class="stat-div"></div>
                            <div class="stat">
                                <span class="stat-num">3</span>
                                <span class="stat-lbl">Certifications</span>
                            </div>
                        </div>
                    </div>

                    {{-- RIGHT: Photo --}}
                    <div class="hero-photo-wrap">
                        <div class="photo-ring">
                            <div class="photo-chip"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" width="24" height="24">
                                    <path d="M4 20 V14 H6 V18 H10 V20 Z"></path>
                                    <path d="M10 4 V20 H12 V10 H14 V20 H16 V4 Z"></path>
                                </svg> Laravel Dev</div>
                        </div>
                        <div class="f-chip c1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                width="24" height="24">
                                <circle cx="5" cy="12" r="2"></circle>
                                <circle cx="19" cy="12" r="2"></circle>
                                <path d="M7 12 H17"></path>
                            </svg><span>WebSockets</span></div>
                        <div class="f-chip c2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                width="24" height="24">
                                <path d="M12 15v2m-6 4h12a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2z">
                                </path>
                                <path d="M15.536 8.464a5.999 5.999 0 11-8.485-8.485"></path>
                            </svg><span>JWT Auth</span></div>
                        <div class="f-chip c3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                width="24" height="24">
                                <path d="M17.571,6.857 L17.571,17.143 L6.4,17.143 L6.4,6.857 L17.571,6.857 Z"></path>
                                <path d="M9,9 L9,15 L15,15 L15,9 L9,9 Z"></path>
                            </svg><span>RESTful APIs</span></div>
                    </div>

                </div>
            </div>
        </div>

        <button class="scroll-hint" id="scrollHint" aria-label="Next section">
            <span>Scroll</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 5v14M5 12l7 7 7-7" />
            </svg>
        </button>
    </section>

    {{-- ══════════════════════════════════════
     ABOUT
══════════════════════════════════════ --}}
    <section class="snap-section about" id="about" data-label="About">
        <div class="snap-inner">
            <div class="container">
                <div class="sec-label">01 / About</div>
                <div class="about-grid">

                    <div class="reveal-left">
                        <h2 class="sec-title">Who I Am</h2>
                        <p class="about-lead">
                            A passionate Full Stack Developer from Sargodha, Pakistan, building real-world web applications
                            that scale.
                        </p>
                        <p class="about-body">
                            I graduated with a Bachelor's in Software Engineering from the University of Sargodha (2025) and
                            have since worked across multiple companies — honing my skills in Laravel, Vue.js, database
                            administration, and real-time application architecture.
                        </p>
                        <p class="about-body">
                            I believe clean code is not just about syntax — it's about building systems that are easy to
                            maintain, extend, and reason about.
                        </p>
                        {{-- TODO: Add 2-3 personal lines — hobbies, goals, what drives you --}}

                        <div class="highlights stagger">
                            <div class="hl">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                                <span>Clean, maintainable code</span>
                            </div>
                            <div class="hl">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M12 6v6l4 2" />
                                </svg>
                                <span>On-time delivery</span>
                            </div>
                            <div class="hl">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                                </svg>
                                <span>Team-first mindset</span>
                            </div>
                        </div>

                        <div class="about-btns">
                            <a href="{{ asset('files/Zain_Ali_Asghar_CV.pdf') }}" download class="btn btn-primary">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                                    <polyline points="7 10 12 15 17 10" />
                                    <line x1="12" y1="15" x2="12" y2="3" />
                                </svg>
                                Download Resume
                            </a>
                            <a href="https://www.linkedin.com/in/zain-ali-asghar-862886307" target="_blank"
                                rel="noopener" class="btn btn-ghost">LinkedIn Profile</a>
                        </div>
                    </div>

                    <div class="reveal-right">
                        <div class="info-card">
                            <div class="info-card-title">Quick Info</div>
                            <ul class="info-rows">
                                <li class="info-row"><span class="info-ico"><svg xmlns="http://w3.org"
                                            viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                                            <path
                                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                        </svg>
                                    </span>
                                    <div><span class="info-key">Location</span><span class="info-val">Sargodha,
                                            Pakistan</span></div>
                                </li>
                                <li class="info-row"><span class="info-ico"><svg xmlns="http://w3.org"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" width="24"
                                            height="24">
                                            <circle cx="12" cy="12" r="5"></circle>
                                        </svg>
                                    </span>
                                    <div><span class="info-key">Degree</span><span class="info-val">BS Software
                                            Engineering</span></div>
                                </li>
                                <li class="info-row"><span class="info-ico"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" width="24"
                                            height="24">
                                            <!-- Building base -->
                                            <rect x="4" y="10" width="16" height="10" rx="1"></rect>

                                            <!-- Roof -->
                                            <path d="M2 10 L12 4 L22 10"></path>

                                            <!-- Door -->
                                            <rect x="10" y="14" width="4" height="6"></rect>

                                            <!-- Windows -->
                                            <rect x="6" y="12" width="2" height="2"></rect>
                                            <rect x="16" y="12" width="2" height="2"></rect>
                                        </svg></span>
                                    <div><span class="info-key">University</span><span class="info-val">University of
                                            Sargodha</span></div>
                                </li>
                                <li class="info-row"><span class="info-ico"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" width="24"
                                            height="24">
                                            <!-- Envelope -->
                                            <rect x="3" y="5" width="18" height="14" rx="2"></rect>

                                            <!-- Flap -->
                                            <path d="M3 7 L12 13 L21 7"></path>
                                        </svg></span>
                                    <div><span class="info-key">Email</span><span
                                            class="info-val">zainaliasghar12@gmail.com</span></div>
                                </li>
                                <li class="info-row"><span class="info-ico"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" width="24"
                                            height="24">
                                            <!-- Phone body -->
                                            <rect x="7" y="2" width="10" height="20" rx="2"></rect>

                                            <!-- Screen -->
                                            <rect x="9" y="4" width="6" height="12" rx="1"></rect>

                                            <!-- Home button -->
                                            <circle cx="12" cy="18" r="1"></circle>
                                        </svg></span>
                                    <div><span class="info-key">Phone</span><span class="info-val">03274601687</span>
                                    </div>
                                </li>
                                <li class="info-row"><span class="info-ico"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" width="24"
                                            height="24">
                                            <!-- Briefcase -->
                                            <rect x="3" y="7" width="18" height="13" rx="2"></rect>

                                            <!-- Handle -->
                                            <path d="M9 7 V5 a2 2 0 0 1 6 0 v2"></path>

                                            <!-- Check mark -->
                                            <path d="M9 13 l2 2 l4 -4"></path>
                                        </svg></span>
                                    <div><span class="info-key">Status</span><span class="info-val status-open">Open to
                                            work</span></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════
     SKILLS
══════════════════════════════════════ --}}
    <section class="snap-section skills" id="skills" data-label="Skills">
        <div class="snap-inner">
            <div class="container">
                <div class="sec-label">02 / Skills</div>
                <h2 class="sec-title center">Technical Arsenal</h2>
                <p class="sec-sub">Technologies I use to build production-grade applications</p>

                <div class="skills-wrap stagger">
                    @foreach ($skills as $category => $items)
                        <div class="skill-cat">
                            <div class="cat-label">{{ $category }}</div>
                            <div class="tags">
                                @foreach ($items as $skill)
                                    <span class="tag {{ $skill['level'] }}">{{ $skill['name'] }} @if (isset($skill['icon']))
                                            {{ $skill['icon'] }}
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bars-panel reveal">
                    <h3>Core Proficiency</h3>
                    <div class="bars-grid">
                        @foreach ($proficiencies as $skill)
                            <div class="bar-row">
                                <div class="bar-head">
                                    <span class="bar-name">{{ $skill['name'] }}</span>
                                    <span class="bar-pct">{{ $skill['percent'] }}%</span>
                                </div>
                                <div class="bar-track">
                                    <div class="bar-fill" style="--target:{{ $skill['percent'] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════
     PROJECTS
══════════════════════════════════════ --}}
    <section class="snap-section projects" id="projects" data-label="Projects">
        <div class="snap-inner">
            <div class="container">
                <div class="sec-label">03 / Projects</div>
                <h2 class="sec-title center">Featured Work</h2>
                <p class="sec-sub">Problem → Process → Outcome</p>

                <div class="proj-grid stagger">
                    @foreach ($projects as $index => $project)
                        <article class="proj-card {{ $project['featured'] ? 'feat' : '' }}">
                            <div class="proj-hd">
                                <div class="proj-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                                @if ($project['featured'])
                                    <span class="feat-badge">⭐ Featured</span>
                                @endif
                            </div>

                            <h3 class="proj-title">{{ $project['title'] }}</h3>
                            <div class="case">
                                <div class="case-row"><span class="case-lbl">Problem</span>
                                    <p>{{ $project['problem'] }}</p>
                                </div>
                                <div class="case-row"><span class="case-lbl">Process</span>
                                    <p>{{ $project['process'] }}</p>
                                </div>
                                <div class="case-row"><span class="case-lbl">Outcome</span>
                                    <p>{{ $project['outcome'] }}</p>
                                </div>
                            </div>
                            <div class="stack">
                                @foreach ($project['stack'] as $tech)
                                    <span class="t-badge">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <div class="proj-ft">
                                {{-- TODO: Replace # with real GitHub & live demo URLs --}}
                                <a href="#" class="proj-link">
                                    <svg viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" />
                                    </svg>
                                    Code
                                </a>
                                <a href="#" class="proj-link">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3" />
                                    </svg>
                                    Live Demo
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════
     EXPERIENCE
══════════════════════════════════════ --}}
    <section class="snap-section experience" id="experience" data-label="Experience">
        <div class="snap-inner">
            <div class="container">
                <div class="sec-label">04 / Experience</div>
                <h2 class="sec-title center">Professional Journey</h2>

                <div class="timeline">
                    @foreach ($experiences as $index => $exp)
                        <div class="tl-item reveal {{ $index % 2 === 0 ? '' : 'r' }}">
                            <div class="tl-dot"></div>
                            <div class="tl-card">
                                <div class="tl-head">
                                    <div>
                                        <div class="tl-title">{{ $exp['title'] }}</div>
                                        <div class="tl-company">{{ $exp['company'] }}<span> ·
                                                {{ $exp['location'] }}</span></div>
                                    </div>
                                    <span class="tl-date">{{ $exp['period'] }}</span>
                                </div>
                                <p class="tl-desc">{{ $exp['description'] }}</p>
                                <div class="tl-tags">
                                    @foreach ($exp['stack'] as $tech)
                                        <span class="t-badge sm">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════
     CERTIFICATIONS
══════════════════════════════════════ --}}
    <section class="snap-section certifications" id="certifications" data-label="Certifications">
        <div class="snap-inner">
            <div class="container">
                <div class="sec-label">05 / Certifications</div>
                <h2 class="sec-title center">Credentials &amp; Training</h2>

                <div class="certs-grid stagger">
                    @foreach ($certifications as $cert)
                        <div class="cert-card">
                            <div class="cert-ico">{{ $cert['icon'] }}</div>
                            <div>
                                <div class="cert-name">{{ $cert['title'] }}</div>
                                <div class="cert-iss">{{ $cert['issuer'] }}</div>
                                <span class="cert-date">{{ $cert['date'] }}</span>
                                <p class="cert-desc">{{ $cert['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════
     TESTIMONIALS
══════════════════════════════════════ --}}
    <section class="snap-section testimonials" id="testimonials" data-label="Testimonials">
        <div class="snap-inner">
            <div class="container">
                <div class="sec-label">06 / Testimonials</div>
                <h2 class="sec-title center">What People Say</h2>
                {{-- TODO: Replace with real testimonials --}}
                <div class="testi-grid stagger">
                    @foreach ($testimonials as $t)
                        <div class="testi-card">
                            <div class="testi-quote">"</div>
                            <p class="testi-text">{{ $t['text'] }}</p>
                            <div class="testi-author">
                                <div class="testi-avatar">{{ strtoupper(substr($t['name'], 0, 1)) }}</div>
                                <div><strong>{{ $t['name'] }}</strong><span>{{ $t['role'] }}</span></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ══════════════════════════════════════
     CONTACT
══════════════════════════════════════ --}}
    <section class="snap-section contact" id="contact" data-label="Contact">
        <div class="snap-inner">
            <div class="container">
                <div class="sec-label">07 / Contact</div>
                <div class="contact-grid">

                    <div class="reveal-left">
                        <h2 class="sec-title contact-title">Let's Build<br>Something Great</h2>
                        <p class="contact-sub">I'm open to full-time, part-time, and freelance opportunities. My inbox is
                            always open.</p>

                        <div class="c-methods">
                            <a href="mailto:zainaliasghar12@gmail.com" class="c-method">
                                <div class="c-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <rect x="2" y="4" width="20" height="16" rx="2" />
                                        <path d="M2 7l10 7 10-7" />
                                    </svg></div>
                                <div><strong>Email</strong><span>zainaliasghar12@gmail.com</span></div>
                            </a>
                            <a href="https://www.linkedin.com/in/zain-ali-asghar-862886307" target="_blank"
                                rel="noopener" class="c-method">
                                <div class="c-ico"><svg viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z" />
                                        <circle cx="4" cy="4" r="2" />
                                    </svg></div>
                                <div><strong>LinkedIn</strong><span>zain-ali-asghar-862886307</span></div>
                            </a>
                            <div class="c-method">
                                <div class="c-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.86 19.79 19.79 0 01.01 1.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.06 6.06l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z" />
                                    </svg></div>
                                <div><strong>Phone</strong><span>03274601687</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="reveal-right">
                        <div class="form-wrap">
                            <form class="c-form" id="contactForm" action="{{ route('contact.send') }}" method="POST">
                                @csrf
                                <div class="fg"><label for="name">Your Name</label><input type="text"
                                        id="name" name="name" placeholder="John Doe" required></div>
                                <div class="fg"><label for="email">Email Address</label><input type="email"
                                        id="email" name="email" placeholder="john@example.com" required></div>
                                <div class="fg"><label for="subject">Subject</label><input type="text"
                                        id="subject" name="subject" placeholder="Project Inquiry / Job Opportunity"
                                        required></div>
                                <div class="fg"><label for="message">Message</label>
                                    <textarea id="message" name="message" rows="4" placeholder="Tell me about your project..." required></textarea>
                                </div>
                                @if (session('success'))
                                    <div class="form-ok">{{ session('success') }}</div>
                                @endif
                                @if ($errors->any())
                                    <div class="form-err">{{ $errors->first() }}</div>
                                @endif
                                <button type="submit" class="btn btn-primary w-full">
                                    Send Message
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="22" y1="2" x2="11" y2="13" />
                                        <polygon points="22 2 15 22 11 13 2 9 22 2" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        document.getElementById('scrollHint')?.addEventListener('click', () => {
            document.getElementById('about')?.scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>
@endsection
