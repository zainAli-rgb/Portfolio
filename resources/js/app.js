/* ============================================
   ZAIN ALI ASGHAR – PORTFOLIO JS
   CSS Scroll-Snap driven full-page scroll.
   JS only handles: dot-nav, progress bar,
   reveal animations, counters, particles,
   cursor glow, navbar, mobile menu.
============================================ */

(() => {
'use strict';

/* ── DOM shorthand ── */
const $ = (s, ctx = document) => ctx.querySelector(s);
const $$ = (s, ctx = document) => [...ctx.querySelectorAll(s)];

/* ── Detect mobile (snap disabled below 768px) ── */
const isMobile = () => window.innerWidth <= 768;

/* ════════════════════════════════════════
   1. PROGRESS BAR + DOT NAV
   Tracks scroll position via IntersectionObserver
════════════════════════════════════════ */
const sections = $$('.snap-section');
let activeIndex = 0;

function buildUI() {
    /* Progress bar */
    if (!$('#fpProgress')) {
        const bar = document.createElement('div');
        bar.id = 'fpProgress';
        bar.innerHTML = '<div id="fpProgressFill"></div>';
        document.body.appendChild(bar);
    }

    /* Dot nav */
    if (!$('#fpDotNav')) {
        const nav = document.createElement('nav');
        nav.id = 'fpDotNav';
        nav.setAttribute('aria-label', 'Section navigation');

        sections.forEach((sec, i) => {
            const btn = document.createElement('button');
            btn.className = 'fp-dot' + (i === 0 ? ' active' : '');
            btn.setAttribute('title', sec.dataset.label || '');
            btn.setAttribute('aria-label', `Go to ${sec.dataset.label || 'section'}`);

            btn.addEventListener('click', () => {
                sec.scrollIntoView({ behavior: 'smooth' });
            });
            nav.appendChild(btn);
        });
        document.body.appendChild(nav);
    }
}

function setActive(index) {
    if (index === activeIndex && $$('.fp-dot.active').length) return;
    activeIndex = index;

    /* dots */
    $$('.fp-dot').forEach((d, i) => d.classList.toggle('active', i === index));

    /* progress */
    const fill = $('#fpProgressFill');
    if (fill) {
        const pct = sections.length <= 1 ? 100 : (index / (sections.length - 1)) * 100;
        fill.style.width = pct + '%';
    }

    /* nav links */
    const id = sections[index]?.id;
    $$('.nav-link').forEach(l => {
        const href = l.getAttribute('href') || '';
        l.classList.toggle('active', href.endsWith('#' + id));
    });
}

/* IntersectionObserver — fires when section is ≥ 50% visible */
function watchSections() {
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (!e.isIntersecting) return;
            const i = sections.indexOf(e.target);
            if (i !== -1) {
                setActive(i);
                activateSection(e.target, i);
            }
        });
    }, { threshold: 0.45 });

    sections.forEach(s => obs.observe(s));
}

/* ════════════════════════════════════════
   2. SECTION ENTER ANIMATIONS
   Called when a section becomes visible
════════════════════════════════════════ */
const activated = new Set();

function activateSection(sec, index) {
    /* Add is-active for CSS transitions */
    sections.forEach(s => s.classList.remove('is-active'));
    sec.classList.add('is-active');

    if (activated.has(index)) {
        /* Re-trigger reveals on revisit */
        triggerReveals(sec);
        if (sec.classList.contains('skills')) triggerBars(sec);
        return;
    }
    activated.add(index);

    triggerReveals(sec);
    if (sec.classList.contains('skills')) triggerBars(sec);
    if (sec.classList.contains('hero'))   triggerCounters(sec);
}

/* ── Reveal elements inside a section ── */
function triggerReveals(sec) {
    const els = $$('.reveal, .reveal-left, .reveal-right', sec);
    els.forEach(el => el.classList.remove('in'));

    const staggerGroups = $$('.stagger', sec);
    staggerGroups.forEach(g => g.classList.remove('in'));

    /* Stagger siblings */
    requestAnimationFrame(() => {
        els.forEach((el, i) => {
            setTimeout(() => el.classList.add('in'), 80 + i * 70);
        });
        staggerGroups.forEach((g, i) => {
            setTimeout(() => g.classList.add('in'), 100 + i * 80);
        });
    });
}

/* ── Animate skill bars ── */
function triggerBars(sec) {
    $$('.bar-fill', sec).forEach((bar, i) => {
        bar.classList.remove('run');
        setTimeout(() => bar.classList.add('run'), 300 + i * 60);
    });
}

/* ── Counter animation ── */
function triggerCounters(sec) {
    $$('.stat-num', sec).forEach(el => {
        const raw    = el.dataset.val || el.textContent.trim();
        el.dataset.val = raw;
        const suffix = raw.replace(/[0-9]/g, '');
        const target = parseInt(raw, 10);
        if (isNaN(target)) return;
        let cur = 0;
        el.textContent = '0' + suffix;
        const step = Math.ceil(target / 28);
        const t = setInterval(() => {
            cur = Math.min(cur + step, target);
            el.textContent = cur + suffix;
            if (cur >= target) clearInterval(t);
        }, 45);
    });
}

/* ════════════════════════════════════════
   3. NAVBAR
════════════════════════════════════════ */
function initNavbar() {
    const nav = $('#navbar');
    if (!nav) return;

    /* Always show compact style (we're on a dark full-page layout) */
    nav.classList.add('scrolled');

    /* On mobile with normal scroll, track scroll for compact */
    if (isMobile()) {
        nav.classList.remove('scrolled');
        window.addEventListener('scroll', () => {
            nav.classList.toggle('compact', window.scrollY > 50);
        }, { passive: true });
    }
}

/* ════════════════════════════════════════
   4. MOBILE MENU
════════════════════════════════════════ */
function initMobileMenu() {
    const burger = $('#navBurger');
    const links  = $('#navLinks');
    if (!burger || !links) return;

    burger.addEventListener('click', () => {
        const open = links.classList.toggle('open');
        burger.classList.toggle('open', open);
        document.body.style.overflow = open ? 'hidden' : '';
    });

    $$('a', links).forEach(a => {
        a.addEventListener('click', () => {
            links.classList.remove('open');
            burger.classList.remove('open');
            document.body.style.overflow = '';
        });
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && links.classList.contains('open')) {
            links.classList.remove('open');
            burger.classList.remove('open');
            document.body.style.overflow = '';
        }
    });
}

/* ════════════════════════════════════════
   5. NAV LINK CLICKS — smooth scroll to section
════════════════════════════════════════ */
function initNavClicks() {
    $$('a[href*="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const hash = (a.getAttribute('href') || '').split('#')[1];
            if (!hash) return;
            const target = document.getElementById(hash);
            if (!target) return;
            e.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
        });
    });
}

/* ════════════════════════════════════════
   6. HERO PARTICLE CANVAS
════════════════════════════════════════ */
function initParticles() {
    const canvas = $('#heroCanvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    let W, H, pts;

    const resize = () => {
        W = canvas.width  = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
        pts = Array.from({ length: Math.floor(W * H / 16000) }, () => ({
            x: Math.random() * W,
            y: Math.random() * H,
            r: Math.random() * 1.3 + 0.3,
            vx: (Math.random() - .5) * .25,
            vy: -(Math.random() * .35 + .08),
            o: Math.random() * .45 + .08,
        }));
    };

    const draw = () => {
        ctx.clearRect(0, 0, W, H);
        pts.forEach(p => {
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(0,229,200,${p.o})`;
            ctx.fill();
            p.x += p.vx; p.y += p.vy;
            if (p.y < -4) p.y = H + 4;
            if (p.x < -4) p.x = W + 4;
            if (p.x > W + 4) p.x = -4;
        });
        requestAnimationFrame(draw);
    };

    resize();
    draw();
    window.addEventListener('resize', debounce(resize, 300));
}

/* ════════════════════════════════════════
   7. CURSOR GLOW (desktop only)
════════════════════════════════════════ */
function initCursorGlow() {
    if (window.matchMedia('(pointer:coarse)').matches) return;
    const el = document.createElement('div');
    el.id = 'cursorGlow';
    document.body.appendChild(el);

    let mx = -300, my = -300, cx = -300, cy = -300;
    window.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });

    (function raf() {
        cx += (mx - cx) * .09;
        cy += (my - cy) * .09;
        el.style.transform = `translate(${cx}px,${cy}px) translate(-50%,-50%)`;
        requestAnimationFrame(raf);
    })();
}

/* ════════════════════════════════════════
   8. FLOATING CHIP PARALLAX
════════════════════════════════════════ */
function initParallax() {
    const chips = $$('.f-chip');
    if (!chips.length) return;
    window.addEventListener('mousemove', e => {
        const dx = (e.clientX / window.innerWidth  - .5);
        const dy = (e.clientY / window.innerHeight - .5);
        chips.forEach((c, i) => {
            const f = (i + 1) * 5;
            c.style.transform = `translate(${dx * f}px, ${dy * f}px)`;
        });
    });
}

/* ════════════════════════════════════════
   9. CONTACT FORM
════════════════════════════════════════ */
function initForm() {
    const form = $('#contactForm');
    if (!form) return;
    const btn = $('button[type=submit]', form);
    form.addEventListener('submit', () => {
        if (!btn) return;
        btn.disabled = true;
        btn.innerHTML = `<svg class="spin-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg> Sending…`;
    });
}

/* ════════════════════════════════════════
   UTILS
════════════════════════════════════════ */
function debounce(fn, ms) {
    let t;
    return (...a) => { clearTimeout(t); t = setTimeout(() => fn(...a), ms); };
}

/* Inject runtime styles */
function injectStyles() {
    const s = document.createElement('style');
    s.textContent = `
        @keyframes spin-kf { to { transform:rotate(360deg); } }
        .spin-ico { animation: spin-kf .8s linear infinite; }
    `;
    document.head.appendChild(s);
}

/* ════════════════════════════════════════
   INIT
════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', () => {
    injectStyles();
    buildUI();
    watchSections();
    initNavbar();
    initMobileMenu();
    initNavClicks();
    initParticles();
    initCursorGlow();
    initParallax();
    initForm();

    /* Trigger first section immediately */
    if (sections[0]) {
        setTimeout(() => activateSection(sections[0], 0), 120);
    }
});

})();
