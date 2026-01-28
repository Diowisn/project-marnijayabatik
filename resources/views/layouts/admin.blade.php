<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Batik</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/Logomarnijaya-polos.png') }}" type="image/x-icon">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Styles -->
    <style>
        :root {
            --primary-brown: #8b4513;
            --light-brown: #a0522d;
            --dark-brown: #654321;
            --cream: #f5deb3;
            --light-cream: #fff8dc;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Sidebar Styling */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--dark-brown) 0%, var(--primary-brown) 100%);
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .sidebar.collapsed {
            margin-left: -450px;
        }
        
        .sidebar .nav-link {
            color: var(--cream);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }
        
        .sidebar .nav-link.active {
            background-color: var(--light-brown);
            color: white;
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
        }
        
        .sidebar .nav-link i {
            width: 25px;
            text-align: center;
        }
        
        /* Top Navbar */
        .top-navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        /* Main Content */
        .main-content {
            padding: 20px;
            transition: all 0.3s ease;
        }
        
        .main-content.expanded {
            margin-left: 0;
        }
        
        /* Cards */
        .stat-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }
        
        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--light-brown) 100%);
            color: white;
            border: none;
            padding: 15px 20px;
        }
        
        /* Custom Button */
        .btn-brown {
            background-color: var(--primary-brown);
            border-color: var(--primary-brown);
            color: white;
        }
        
        .btn-brown:hover {
            background-color: var(--dark-brown);
            border-color: var(--dark-brown);
            color: white;
        }
        
        .btn-outline-brown {
            border-color: var(--primary-brown);
            color: var(--primary-brown);
        }
        
        .btn-outline-brown:hover {
            background-color: var(--primary-brown);
            color: white;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 1001;
                margin-left: -450px;
            }
            
            .sidebar.show {
                margin-left: 0;
            }
            
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1000;
            }
            
            .sidebar-overlay.show {
                display: block;
            }
            
            .main-content {
                padding: 15px;
            }
        }
        
        /* Table Styling */
        .table-custom {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .table-custom thead {
            background: linear-gradient(135deg, var(--primary-brown) 0%, var(--light-brown) 100%);
            color: white;
        }
        
        .table-custom tbody tr:hover {
            background-color: rgba(139, 69, 19, 0.05);
        }
        
        /* Badge */
        .badge-brown {
            background-color: var(--primary-brown);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Sidebar Overlay (for mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <div class="container-fluid p-0">
        <!-- Top Navbar -->
        <nav class="top-navbar navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-- Hamburger Menu Button -->
                <button class="btn btn-brown me-3 d-lg-none" type="button" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                
                <!-- Brand Logo -->
                <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-shop me-2" style="color: #8b4513;"></i>
                    <span style="color: #8b4513;">MarniJaya</span><span class="text-muted">Batik</span>
                </a>
                
                <!-- User Menu -->
                <div class="dropdown ms-auto">
                    <button class="btn btn-outline-brown dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-2"></i>
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-lg-2 sidebar" id="sidebar">
                <div class="pt-4">
                    <!-- User Info -->
                    <div class="text-center mb-4 px-3">
                        <div class="mb-3">
                            <i class="bi bi-person-circle display-6" style="color: var(--cream);"></i>
                        </div>
                        <h6 class="mb-1 text-white fw-bold">{{ Auth::user()->name }}</h6>
                        <span class="badge bg-warning text-dark">
                            <i class="bi bi-star-fill me-1"></i>Admin
                        </span>
                    </div>
                    
                    <hr class="border-secondary mx-3">
                    
                    <!-- Navigation Menu -->
                    <ul class="nav flex-column mt-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                               href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" 
                               href="{{ route('admin.products.index') }}">
                                <i class="bi bi-box-seam me-2"></i> Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" 
                               href="{{ route('admin.categories.index') }}">
                                <i class="bi bi-tags me-2"></i> Kategori
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.motifs.*') ? 'active' : '' }}" 
                               href="{{ route('admin.motifs.index') }}">
                                <i class="bi bi-palette me-2"></i> Motif
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" 
                            href="{{ route('admin.users.index') }}">
                                <i class="bi bi-people me-2"></i> Manajemen Admin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.change-password') ? 'active' : '' }}" 
                            href="{{ route('admin.change-password') }}">
                                <i class="bi bi-key me-2"></i> Ganti Password
                            </a>
                        </li>

                        <li class="nav-item mt-4">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link text-start w-100" style="background: none; border: none;">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                    
                    <!-- Sidebar Footer -->
                    <div class="position-absolute bottom-0 start-0 end-0 p-3">
                        <div class="text-center">
                            <small class="text-muted">v1.0.0</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-lg-10 main-content" id="mainContent">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-2 fw-bold" style="color: var(--primary-brown);">
                            <i class="bi bi-speedometer2 me-2"></i>@yield('page-title')
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@yield('page-title')</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex gap-2">
                        @yield('page-actions')
                    </div>
                </div>
                
                <!-- Notifications -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Content -->
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS for Sidebar Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            // Toggle Sidebar
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
                mainContent.classList.toggle('expanded');
            });
            
            // Close sidebar when clicking overlay
            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
                mainContent.classList.remove('expanded');
            });
            
            // Close sidebar when clicking on a link (mobile)
            const navLinks = document.querySelectorAll('.sidebar .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('show');
                        sidebarOverlay.classList.remove('show');
                        mainContent.classList.remove('expanded');
                    }
                });
            });
            
            // Auto-collapse sidebar on mobile on page load
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
                mainContent.classList.add('expanded');
            }
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                    mainContent.classList.remove('expanded');
                }
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>