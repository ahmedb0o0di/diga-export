<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - DIJA Group Export CMS</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav.png') }}">

    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">

    <style>
        :root {
            --dija-orange: #F26820;
            --dija-navy: #0A192F;
            --dija-sidebar: #0f172a;
            --dija-bg: #f8fafc;
            --dija-border: #e2e8f0;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--dija-bg);
            color: #334155;
            min-height: 100vh;
        }
        .admin-sidebar {
            width: 260px;
            background-color: var(--dija-sidebar);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1000;
            transition: all 0.3s;
        }
        .admin-sidebar .brand {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .admin-sidebar .nav-link {
            color: #94a3b8;
            padding: 12px 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 8px;
            margin: 4px 12px;
            transition: all 0.2s;
        }
        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(242, 104, 32, 0.15);
            color: var(--dija-orange);
        }
        .admin-sidebar .nav-link.active {
            font-weight: 700;
            background-color: var(--dija-orange);
            color: #fff !important;
        }
        .admin-main {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .admin-header {
            height: 70px;
            background: #fff;
            border-bottom: 1px solid var(--dija-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        .admin-content {
            padding: 30px;
            flex-grow: 1;
        }
        .card-custom {
            background: #fff;
            border: 1px solid var(--dija-border);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }
        .btn-dija {
            background-color: var(--dija-orange);
            color: #fff;
            border: none;
            font-weight: 600;
            padding: 8px 18px;
            border-radius: 8px;
        }
        .btn-dija:hover {
            background-color: #d85715;
            color: #fff;
        }
        .nav-tabs .nav-link {
            font-weight: 600;
            color: #64748b;
        }
        .nav-tabs .nav-link.active {
            color: var(--dija-orange);
            border-color: var(--dija-border) var(--dija-border) #fff;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="brand">
            <img src="{{ asset('assets/images/logo/logo-white.png') }}" alt="DIJA Admin" style="height: 38px; width: auto;">
        </div>
        <div class="py-3">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge-high"></i> <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fa-solid fa-sliders"></i> <span>Site Settings</span>
            </a>
            <a href="{{ route('admin.slides.index') }}" class="nav-link {{ request()->routeIs('admin.slides.*') ? 'active' : '' }}">
                <i class="fa-solid fa-images"></i> <span>Hero Banners</span>
            </a>
            <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                <i class="fa-solid fa-ship"></i> <span>Export Services</span>
            </a>
            <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <i class="fa-solid fa-newspaper"></i> <span>Blog & Insights</span>
            </a>
            <a href="{{ route('admin.team.index') }}" class="nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i> <span>Team Members</span>
            </a>
            <a href="{{ route('admin.inquiries.index') }}" class="nav-link {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                <i class="fa-solid fa-envelope-open-text"></i>
                <span>Inquiries & Quotes</span>
                @php $newCount = \App\Models\Inquiry::where('status', 'new')->count(); @endphp
                @if($newCount > 0)
                <span class="badge bg-danger ms-auto rounded-pill">{{ $newCount }}</span>
                @endif
            </a>
        </div>
        <div class="mt-auto p-3" style="position: absolute; bottom: 0; width: 100%; border-top: 1px solid rgba(255,255,255,0.08);">
            <a href="{{ route('home') }}" target="_blank" class="nav-link text-white-50">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> <span>View Live Site</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="admin-main">
        <header class="admin-header">
            <h5 class="mb-0 fw-bold">@yield('page-title', 'CMS Management')</h5>
            <div class="d-flex align-items-center gap-3">
                <span class="fw-semibold text-muted"><i class="fa-solid fa-user-shield me-1"></i> {{ Auth::user()->name ?? 'Administrator' }}</span>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                    </button>
                </form>
            </div>
        </header>

        <div class="admin-content">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/css/vendor/bootstrap.min.css') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
