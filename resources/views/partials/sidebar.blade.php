<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg modern-navbar">
            <div class="container-fluid">
                <!-- Logo and Brand -->
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <div class="logo-container me-3">
                        <img src="/assets/images/logo/logo.png" alt="POS Cafe Logo" class="navbar-logo">
                    </div>
                    <div class="brand-text">
                        <h5 class="mb-0 fw-bold cafe-title">POS Cafe</h5>
                        <small class="text-light opacity-75">Sistem Point of Sale</small>
                    </div>
                </a>

                <!-- Mobile Toggle -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="/">
                                <i class="bi bi-house-door me-1"></i>Beranda
                            </a>
                        </li>

                        @if (Auth()->user()->isAdmin == 1)
                            <!-- Owner Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="ownerDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-graph-up me-1"></i>Laporan
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="ownerDropdown">
                                    <li><a class="dropdown-item" href="{{ route('pengguna.laporan') }}">
                                        <i class="bi bi-people me-2"></i>Pengguna</a></li>
                                    <li><a class="dropdown-item" href="{{ route('product.report') }}">
                                        <i class="bi bi-box-seam me-2"></i>Produk</a></li>
                                    <li><a class="dropdown-item" href="{{ route('cashier.report') }}">
                                        <i class="bi bi-receipt me-2"></i>Transaksi</a></li>
                                </ul>
                            </li>
                        @elseif (Auth()->user()->isAdmin == 2)
                            <!-- Admin Menu - Separate Items -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pengguna.index') }}">
                                    <i class="bi bi-person-lines-fill me-1"></i>Data Pengguna
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.index') }}">
                                    <i class="bi bi-boxes me-1"></i>Data Produk
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.index') }}">
                                    <i class="bi bi-tags me-1"></i>Data Kategori
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('supplier.index') }}">
                                    <i class="bi bi-truck me-1"></i>Data Pemasok
                                </a>
                            </li>
                        @elseif (Auth()->user()->isAdmin == 0)
                            <!-- Cashier Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="cashierDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-cash-coin me-1"></i>Transaksi
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="cashierDropdown">
                                    <li><a class="dropdown-item" href="{{ route('expenditures.index') }}">
                                        <i class="bi bi-cash-stack me-2"></i>Pengeluaran</a></li>
                                    <li><a class="dropdown-item" href="{{ route('cashier.index') }}">
                                        <i class="bi bi-cart-check me-2"></i>Transaksi</a></li>
                                    <li><a class="dropdown-item" href="{{ route('cashier.riwayat') }}">
                                        <i class="bi bi-clock-history me-2"></i>Riwayat Transaksi</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>

                    <!-- User Menu -->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user-menu-link" href="#" id="userDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                @php
                                    $user = Auth::user();
                                @endphp
                                <div class="d-flex align-items-center">
                                    <div class="user-info me-2">
                                        <div class="user-name fw-bold">{{ $user->name }}</div>
                                        <small class="user-role">
                                            @if (Auth()->user()->isAdmin == 2)
                                                Administrator
                                            @elseif (Auth()->user()->isAdmin ==1)
                                                Owner
                                            @else
                                                Kasir
                                            @endif
                                        </small>
                                    </div>
                                    <img src="/assets/images/faces/1.jpg" class="rounded-circle user-avatar" alt="User Avatar">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dropdown" aria-labelledby="userDropdown">
                                <li><h6 class="dropdown-header">Hello, {{ $user->name }}</h6></li>
                                @if (Auth::user()->isAdmin == 2)
                                <li><a class="dropdown-item" href="{{ route('pengguna.show', Auth::id()) }}">
                                    <i class="bi bi-person-circle me-2"></i>Profil</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">
                                            <i class="bi bi-box-arrow-right me-2"></i>Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>