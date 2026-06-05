<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Products</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --cream: #F9F5EE;
            --charcoal: #1C1C1E;
            --dusty-rose: #C9A98E;
            --accent: #D4501A;
            --soft-gray: #E8E2D9;
            --mid-gray: #9E9589;
            --white: #FFFFFF;
            --shadow: 0 4px 24px rgba(28, 28, 30, 0.08);
            --shadow-hover: 0 16px 48px rgba(28, 28, 30, 0.16);
        }

        body {
            background-color: var(--cream);
            font-family: 'DM Sans', sans-serif;
            color: var(--charcoal);
            min-height: 100vh;
        }

        /* ── HEADER ── */
        .site-header {
            background: var(--charcoal);
            padding: 48px 60px 40px;
            position: relative;
            overflow: hidden;
        }

        .site-header::before {
            content: '';
            position: absolute;
            right: -80px;
            top: -80px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(212, 80, 26, 0.18) 0%, transparent 70%);
        }

        .site-header::after {
            content: '';
            position: absolute;
            left: 30%;
            bottom: -60px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201, 169, 142, 0.12) 0%, transparent 70%);
        }

        .header-inner {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header-tagline {
            color: var(--mid-gray);
            font-size: 13px;
            font-weight: 300;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .header-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(36px, 5vw, 64px);
            font-weight: 900;
            color: var(--white);
            line-height: 1.05;
            letter-spacing: -1px;
        }

        .header-title span {
            color: var(--accent);
            font-style: italic;
        }

        /* ── STICKY SEARCH BAR ── */
        .search-bar-wrap {
            background: var(--white);
            border-bottom: 1px solid var(--soft-gray);
            padding: 16px 60px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 16px rgba(28, 28, 30, 0.06);
        }

        .search-bar-inner {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-input-wrap {
            flex: 1;
            min-width: 200px;
            position: relative;
        }

        .search-input-wrap svg {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.35;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 11px 14px 11px 44px;
            border: 1.5px solid var(--soft-gray);
            border-radius: 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            background: var(--cream);
            color: var(--charcoal);
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        .search-input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(212, 80, 26, 0.10);
        }

        .filter-select,
        .sort-select {
            padding: 11px 14px;
            border: 1.5px solid var(--soft-gray);
            border-radius: 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            background: var(--cream);
            color: var(--charcoal);
            cursor: pointer;
            outline: none;
            transition: border-color 0.2s;
        }

        .filter-select {
            min-width: 150px;
        }

        .sort-select {
            min-width: 175px;
        }

        .filter-select:focus,
        .sort-select:focus {
            border-color: var(--accent);
        }

        .clear-btn {
            padding: 11px 18px;
            background: transparent;
            border: 1.5px solid var(--soft-gray);
            border-radius: 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            color: var(--mid-gray);
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .clear-btn:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .results-count {
            font-size: 13px;
            color: var(--mid-gray);
            white-space: nowrap;
            margin-left: auto;
            font-weight: 500;
        }

        /* ── CATEGORY TABS ── */
        .tabs-outer {
            padding: 24px 60px 0;
        }

        .tabs-outer .tabs-inner {
            max-width: 1400px;
            margin: 0 auto;
        }

        .tabs {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 8px 18px;
            border-radius: 50px;
            border: 1.5px solid var(--soft-gray);
            background: transparent;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: var(--mid-gray);
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .tab-btn:hover {
            background: var(--charcoal);
            border-color: var(--charcoal);
            color: var(--white);
        }

        .tab-btn.active {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--white);
        }

        /* ── MAIN ── */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 60px 80px;
        }

        /* ── SKELETON ── */
        .skeleton-wrap {
            display: none;
        }

        .skeleton-wrap.visible {
            display: block;
        }

        .skeleton-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 56px;
        }

        .skeleton-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .sk {
            background: linear-gradient(90deg, var(--soft-gray) 25%, #ede7dc 50%, var(--soft-gray) 75%);
            background-size: 200% 100%;
            animation: shimmer 1.4s infinite;
        }

        .sk-img {
            height: 200px;
        }

        .sk-body {
            padding: 20px;
        }

        .sk-line {
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .sk-line.sm {
            height: 10px;
            width: 40%;
        }

        .sk-line.md {
            height: 14px;
            width: 80%;
        }

        .sk-line.lg {
            height: 12px;
            width: 60%;
            margin-bottom: 16px;
        }

        .sk-line.price {
            height: 20px;
            width: 50%;
        }

        @keyframes shimmer {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        /* ── NO RESULTS ── */
        .no-results {
            display: none;
            text-align: center;
            padding: 80px 20px;
            color: var(--mid-gray);
        }

        .no-results.visible {
            display: block;
        }

        .no-results h3 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin-bottom: 10px;
            color: var(--charcoal);
        }

        /* ── CATEGORY SECTION ── */
        .category-section {
            margin-bottom: 56px;
        }

        .category-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 28px;
        }

        .category-label {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--charcoal);
            letter-spacing: -0.5px;
            white-space: nowrap;
        }

        .category-line {
            flex: 1;
            height: 1px;
            background: var(--soft-gray);
        }

        .category-count {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--mid-gray);
        }

        /* ── PRODUCT GRID ── */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 24px;
        }

        /* ── PRODUCT CARD ── */
        .product-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s cubic-bezier(.22, 1, .36, 1), box-shadow 0.3s;
            cursor: pointer;
            animation: fadeUp 0.4s ease both;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-hover);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-img-wrap {
            position: relative;
            height: 200px;
            overflow: hidden;
            background: var(--soft-gray);
        }

        .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(.22, 1, .36, 1);
        }

        .product-card:hover .card-img-wrap img {
            transform: scale(1.06);
        }

        .card-no-img {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 8px;
            color: var(--mid-gray);
            font-size: 13px;
            letter-spacing: 1px;
        }

        .card-no-img svg {
            opacity: 0.3;
        }

        .card-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: var(--accent);
            color: var(--white);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 4px 10px;
            border-radius: 50px;
        }

        .card-body {
            padding: 18px 20px 16px;
        }

        .card-cat-tag {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--dusty-rose);
            margin-bottom: 6px;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--charcoal);
            margin-bottom: 7px;
            line-height: 1.35;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-desc {
            font-size: 13px;
            color: var(--mid-gray);
            line-height: 1.6;
            margin-bottom: 14px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-price {
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            font-weight: 900;
            color: var(--charcoal);
        }

        .card-price span {
            font-family: 'DM Sans', sans-serif;
            font-size: 12px;
            font-weight: 400;
            color: var(--mid-gray);
            margin-right: 2px;
        }

        .card-cta {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--charcoal);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s, transform 0.2s;
        }

        .card-cta:hover {
            background: var(--accent);
            transform: scale(1.1);
        }

        .card-thumbs {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            padding: 0 20px 16px;
        }

        .card-thumbs img {
            width: 34px;
            height: 34px;
            object-fit: cover;
            border-radius: 8px;
            border: 1.5px solid var(--soft-gray);
            transition: border-color 0.2s;
        }

        .card-thumbs img:hover {
            border-color: var(--accent);
        }

        /* ── SHOW MORE ── */
        .show-more-wrap {
            text-align: center;
            padding: 20px 0 60px;
        }

        .show-more-wrap.hidden {
            display: none;
        }

        .show-more-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 38px;
            background: var(--charcoal);
            color: var(--white);
            border: none;
            border-radius: 50px;
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            letter-spacing: 0.4px;
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 20px rgba(28, 28, 30, 0.18);
        }

        .show-more-btn:hover {
            background: var(--accent);
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(212, 80, 26, 0.28);
        }

        .show-more-btn:hover svg {
            transform: translateY(2px);
        }

        .show-more-btn svg {
            transition: transform 0.2s;
        }

        .show-more-btn:disabled {
            background: var(--soft-gray);
            color: var(--mid-gray);
            cursor: default;
            transform: none;
            box-shadow: none;
        }

        /* ── TOAST ── */
        .toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            background: #c0392b;
            color: #fff;
            padding: 14px 28px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.18);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
            z-index: 999;
        }

        .toast.visible {
            opacity: 1;
            pointer-events: auto;
        }

        @media (max-width: 900px) {

            .site-header,
            .search-bar-wrap,
            .main-content {
                padding-left: 24px;
                padding-right: 24px;
            }

            .tabs-outer {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                gap: 14px;
            }

            .card-img-wrap {
                height: 150px;
            }
        }
    </style>
</head>

<body>

    <!-- ════════════ HEADER ════════════ -->
    <header class="site-header">
        <div class="header-inner">
            <p class="header-tagline">Curated for your home</p>
            <h1 class="header-title">Our <span>Products</span></h1>
        </div>
    </header>

    <!-- ════════════ SEARCH BAR ════════════ -->
    <div class="search-bar-wrap">
        <div class="search-bar-inner">
            <div class="search-input-wrap">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#1C1C1E" stroke-width="2">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input class="search-input" id="searchInput" type="text" placeholder="Search products by name…"
                    autocomplete="off">
            </div>
            <select class="filter-select" id="categoryFilter">
                <option value="">All Categories</option>
            </select>
            <select class="sort-select" id="sortSelect">
                <option value="">Sort: Default</option>
                <option value="price-asc">Price: Low → High</option>
                <option value="price-desc">Price: High → Low</option>
                <option value="name-asc">Name: A → Z</option>
            </select>
            <button class="clear-btn" id="clearBtn">✕ Clear</button>
            <span class="results-count" id="resultsCount"></span>
        </div>
    </div>

    <!-- ════════════ CATEGORY TABS ════════════ -->
    <div class="tabs-outer">
        <div class="tabs-inner">
            <div class="tabs" id="categoryTabs">
                <button class="tab-btn active" data-category="">All</button>
            </div>
        </div>
    </div>

    <!-- ════════════ MAIN ════════════ -->
    <main class="main-content">

        <!-- Skeleton loader -->
        <div class="skeleton-wrap visible" id="skeletonWrap">
            <div class="sk sk-line md" style="height:32px; width:200px; border-radius:8px; margin-bottom:28px;"></div>
            <div class="skeleton-grid">
                <div class="skeleton-card">
                    <div class="sk sk-img"></div>
                    <div class="sk-body">
                        <div class="sk sk-line sm"></div>
                        <div class="sk sk-line md"></div>
                        <div class="sk sk-line lg"></div>
                        <div class="sk sk-line price"></div>
                    </div>
                </div>
                <div class="skeleton-card">
                    <div class="sk sk-img"></div>
                    <div class="sk-body">
                        <div class="sk sk-line sm"></div>
                        <div class="sk sk-line md"></div>
                        <div class="sk sk-line lg"></div>
                        <div class="sk sk-line price"></div>
                    </div>
                </div>
                <div class="skeleton-card">
                    <div class="sk sk-img"></div>
                    <div class="sk-body">
                        <div class="sk sk-line sm"></div>
                        <div class="sk sk-line md"></div>
                        <div class="sk sk-line lg"></div>
                        <div class="sk sk-line price"></div>
                    </div>
                </div>
                <div class="skeleton-card">
                    <div class="sk sk-img"></div>
                    <div class="sk-body">
                        <div class="sk sk-line sm"></div>
                        <div class="sk sk-line md"></div>
                        <div class="sk sk-line lg"></div>
                        <div class="sk sk-line price"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rendered catalog -->
        <div id="catalog"></div>

        <!-- No results -->
        <div class="no-results" id="noResults">
            <h3>No products found</h3>
            <p>Try adjusting your search or filters.</p>
        </div>

        <!-- Show More -->
        <div class="show-more-wrap hidden" id="showMoreWrap">
            <button class="show-more-btn" id="showMoreBtn">
                <span id="showMoreText">Show More Products</span>
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2.2">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </button>
        </div>
    </main>

    <!-- Toast -->
    <div class="toast" id="toast">Failed to load products. Please try again.</div>

    <script>
        (function() {
            /* ── CONFIG ── */
            const API_URL = '/home-products';
            const INITIAL_SHOW = 8;
            const LOAD_MORE_STEP = 8;

            /* ── STATE ── */
            let allProducts = [];
            let filtered = [];
            let visibleCount = INITIAL_SHOW;
            let activeCategory = '';
            let searchQuery = '';
            let sortMode = '';

            /* ── ELEMENTS ── */
            const catalog = document.getElementById('catalog');
            const skeletonWrap = document.getElementById('skeletonWrap');
            const noResults = document.getElementById('noResults');
            const showMoreWrap = document.getElementById('showMoreWrap');
            const showMoreBtn = document.getElementById('showMoreBtn');
            const showMoreText = document.getElementById('showMoreText');
            const resultsCount = document.getElementById('resultsCount');
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const sortSelect = document.getElementById('sortSelect');
            const clearBtn = document.getElementById('clearBtn');
            const tabsContainer = document.getElementById('categoryTabs');
            const toast = document.getElementById('toast');

            /* ── FETCH ── */
            fetch(API_URL)
                .then(res => {
                    if (!res.ok) throw new Error('Network error');
                    return res.json();
                })
                .then(json => {
                    const data = json.data; // { CategoryName: [...products] }
                    allProducts = [];
                    Object.entries(data).forEach(([category, items]) => {
                        items.forEach(product => allProducts.push({
                            ...product,
                            _category: category
                        }));
                    });
                    buildCategoryUI(data);
                    skeletonWrap.classList.remove('visible');
                    applyFilters();
                })
                .catch(() => {
                    skeletonWrap.classList.remove('visible');
                    showToast('Failed to load products. Please try again.');
                });

            /* ── BUILD CATEGORY DROPDOWN + TABS ── */
            function buildCategoryUI(data) {
                Object.keys(data).forEach(cat => {
                    const opt = document.createElement('option');
                    opt.value = cat;
                    opt.textContent = cat;
                    categoryFilter.appendChild(opt);

                    const btn = document.createElement('button');
                    btn.className = 'tab-btn';
                    btn.dataset.category = cat;
                    btn.textContent = cat;
                    btn.addEventListener('click', () => {
                        activeCategory = cat;
                        categoryFilter.value = cat;
                        visibleCount = INITIAL_SHOW;
                        syncTabs();
                        applyFilters();
                    });
                    tabsContainer.appendChild(btn);
                });
            }

            /* ── FILTER + SORT ── */
            function applyFilters() {
                filtered = allProducts.filter(p => {
                    const matchName = !searchQuery || p.title.toLowerCase().includes(searchQuery);
                    const matchCat = !activeCategory || p._category === activeCategory;
                    return matchName && matchCat;
                });
                if (sortMode === 'price-asc') filtered.sort((a, b) => +a.price - +b.price);
                if (sortMode === 'price-desc') filtered.sort((a, b) => +b.price - +a.price);
                if (sortMode === 'name-asc') filtered.sort((a, b) => a.title.localeCompare(b.title));
                render();
            }

            /* ── RENDER ── */
            function render() {
                catalog.innerHTML = '';

                if (filtered.length === 0) {
                    noResults.classList.add('visible');
                    showMoreWrap.classList.add('hidden');
                    resultsCount.textContent = '0 products';
                    return;
                }
                noResults.classList.remove('visible');

                const slice = filtered.slice(0, visibleCount);

                // Group slice by category
                const grouped = {};
                slice.forEach(p => {
                    if (!grouped[p._category]) grouped[p._category] = [];
                    grouped[p._category].push(p);
                });

                Object.entries(grouped).forEach(([cat, items]) => {
                    const section = document.createElement('section');
                    section.className = 'category-section';
                    section.innerHTML = `
                <div class="category-header">
                    <h2 class="category-label">${esc(cat)}</h2>
                    <div class="category-line"></div>
                    <span class="category-count">${items.length} items</span>
                </div>
                <div class="product-grid"></div>
            `;
                    const grid = section.querySelector('.product-grid');
                    items.forEach((p, i) => grid.appendChild(buildCard(p, i)));
                    catalog.appendChild(section);
                });

                // Show More
                const remaining = filtered.length - visibleCount;
                if (remaining > 0) {
                    showMoreWrap.classList.remove('hidden');
                    showMoreText.textContent = `Show More  (${remaining} remaining)`;
                    showMoreBtn.disabled = false;
                } else {
                    showMoreWrap.classList.remove('hidden');
                    showMoreBtn.disabled = true;
                    showMoreText.textContent = 'All products shown';
                    if (filtered.length <= INITIAL_SHOW) showMoreWrap.classList.add('hidden');
                }

                resultsCount.textContent = `${Math.min(filtered.length, visibleCount)} of ${filtered.length} products`;
            }

            /* ── BUILD CARD ── */
            function buildCard(p, idx) {
                const card = document.createElement('div');
                card.className = 'product-card';
                card.style.animationDelay = `${(idx % 8) * 55}ms`;

                const images = p.images || [];
                const primaryImg = images.find(img => img.is_primary == 1);

                const imgHtml = primaryImg ?
                    `<img src="${esc(primaryImg.image_path)}" alt="${esc(p.title)}" loading="lazy">` :
                    `<div class="card-no-img">
                <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <rect x="3" y="3" width="18" height="18" rx="3"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <polyline points="21 15 16 10 5 21"/>
                </svg>No Image</div>`;

                const thumbsHtml = images.length > 1 ?
                    `<div class="card-thumbs">${images.map(img => `<img src="${esc(img.image_path)}" alt="thumb" loading="lazy">`).join('')}</div>` :
                    '';

                card.innerHTML = `
            <div class="card-img-wrap">
                ${imgHtml}
                <span class="card-badge">New</span>
            </div>
            <div class="card-body">
                <p class="card-cat-tag">${esc(p._category)}</p>
                <h3 class="card-title">${esc(p.title)}</h3>
                <p class="card-desc">${esc(p.description || '')}</p>
                <div class="card-footer">
                    <div class="card-price"><span>Rs</span>${Number(p.price).toLocaleString()}</div>
                    <button class="card-cta" title="Add to cart">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.5">
                            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                    </button>
                </div>
            </div>
            ${thumbsHtml}
        `;
                return card;
            }

            /* ── EVENTS ── */
            searchInput.addEventListener('input', () => {
                searchQuery = searchInput.value.trim().toLowerCase();
                visibleCount = INITIAL_SHOW;
                applyFilters();
            });
            categoryFilter.addEventListener('change', () => {
                activeCategory = categoryFilter.value;
                visibleCount = INITIAL_SHOW;
                syncTabs();
                applyFilters();
            });
            sortSelect.addEventListener('change', () => {
                sortMode = sortSelect.value;
                visibleCount = INITIAL_SHOW;
                applyFilters();
            });
            clearBtn.addEventListener('click', () => {
                searchInput.value = '';
                categoryFilter.value = '';
                sortSelect.value = '';
                searchQuery = '';
                activeCategory = '';
                sortMode = '';
                visibleCount = INITIAL_SHOW;
                syncTabs();
                applyFilters();
            });
            showMoreBtn.addEventListener('click', () => {
                visibleCount += LOAD_MORE_STEP;
                applyFilters();
            });

            // "All" tab
            document.querySelector('.tab-btn[data-category=""]').addEventListener('click', function() {
                activeCategory = '';
                categoryFilter.value = '';
                visibleCount = INITIAL_SHOW;
                syncTabs();
                applyFilters();
            });

            function syncTabs() {
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.toggle('active', btn.dataset.category === activeCategory);
                });
            }

            /* ── HELPERS ── */
            function esc(str) {
                return String(str ?? '')
                    .replace(/&/g, '&amp;').replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;').replace(/"/g, '&quot;');
            }

            function showToast(msg) {
                toast.textContent = msg;
                toast.classList.add('visible');
                setTimeout(() => toast.classList.remove('visible'), 4000);
            }
        })();
    </script>
</body>

</html>
