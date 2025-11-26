@extends('layouts.master')

@section('content')


    @php
        // Query untuk mendapatkan jumlah data statistik
        $user = \App\Models\User::where('isAdmin', 0)->count();
        $product = \App\Models\Product::count();
        $category = \App\Models\Category::count();
        $supplier = \App\Models\Supplier::count();
    @endphp

    <div class="container">
        <div class="page-inner">
            <!-- Cafe Branding Header dengan animasi fade-in -->
            <div class="cafe-dashboard-header mb-5" data-aos="fade-down" data-aos-duration="800">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                        <div class="cafe-logo-icon me-3">
                            <i class="fas fa-coffee fa-2x text-cafe-blue"></i>
                        </div>
                        <div>
                            <h1 class="mb-1" style="font-family: BBH Sans Bartle">Cafe Biru</h1>
                        </div>
                    </div>
                    @php
                        $hour = now()->format('H'); // Ambil jam saat ini (0-23)
                    @endphp

                    <div class="cafe-welcome-card">
                        <div class="d-flex align-items-center">
                            <div class="welcome-icon me-2">
                                @if ($hour >= 6 && $hour < 18)
                                    {{-- Siang: 06.00–17.59 --}}
                                    <i class="fas fa-sun text-warning"></i>
                                @else
                                    {{-- Malam: 18.00–05.59 --}}
                                    <i class="fas fa-moon text-primary"></i>
                                @endif
                            </div>
                            <div>
                                <h6 class="mb-0" style="font-family: 'Momo Signature'">Selamat Datang!</h6>
                                <small class="text-muted">{{ Auth::user()->name }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cafe-slogan mt-3">
                    <p class="mb-0 text-center text-cafe-blue fw-bold" style="font-family: Momo Signature">"Nikmati Kopi
                        Berkualitas dengan Pelayanan Terbaik"</p>
                </div>
            </div>
            {{-- Kondisi untuk menampilkan statistik hanya untuk admin level 2 --}}
            @if (Auth()->user()->isAdmin == 2)
                {{-- Container kartu statistik dengan grid responsif --}}
                <div class="row row-card-no-pd mb-4">
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="100"
                        data-aos-duration="600">
                        <div class="card stats-card h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex justify-content-between w-100 align-items-center">
                                    <div>
                                        <h5 class="card-title text-primary mb-1">
                                            <i class="bi bi-people-fill me-2"></i>Pengguna/Kasir
                                        </h5>
                                        <p class="text-muted small mb-0">Total pengguna aktif</p>
                                    </div>
                                    <div class="text-end">
                                        <h2 class="text-primary fw-bold mb-0">{{ $user }}</h2>
                                        <small class="text-success">
                                            <i class="bi bi-arrow-up-circle me-1"></i>Aktif
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="200"
                        data-aos-duration="600">
                        <div class="card stats-card h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex justify-content-between w-100 align-items-center">
                                    <div>
                                        <h5 class="card-title text-success mb-1">
                                            <i class="bi bi-box-seam-fill me-2"></i>Produk
                                        </h5>
                                        <p class="text-muted small mb-0">Total produk tersedia</p>
                                    </div>
                                    <div class="text-end">
                                        <h2 class="text-success fw-bold mb-0">{{ $product }}</h2>
                                        <small class="text-info">
                                            <i class="bi bi-shop me-1"></i>Tersedia
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="300"
                        data-aos-duration="600">
                        <div class="card stats-card h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex justify-content-between w-100 align-items-center">
                                    <div>
                                        <h5 class="card-title text-warning mb-1">
                                            <i class="bi bi-tags-fill me-2"></i>Kategori
                                        </h5>
                                        <p class="text-muted small mb-0">Jenis produk</p>
                                    </div>
                                    <div class="text-end">
                                        <h2 class="text-warning fw-bold mb-0">{{ $category }}</h2>
                                        <small class="text-primary">
                                            <i class="bi bi-diagram-3 me-1"></i>Kategori
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-md-8" data-aos="fade-right" data-aos-delay="500" data-aos-duration="800">
                    <div class="card cafe-chart-card">
                        <div class="card-header cafe-card-header">
                            <div class="card-head-row d-flex align-items-center">
                                <div class="cafe-chart-icon me-2">
                                    <i class="fas fa-chart-line text-cafe-blue"></i>
                                </div>
                                <div>
                                    <div class="card-title mb-0">Statistik Penjualan Harian</div>
                                    <small class="text-muted">12 bulan terakhir</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart" class="cafe-chart-container"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-left" data-aos-delay="600" data-aos-duration="800">
                    <div class="card cafe-stats-card h-100">
                        <div class="card-header cafe-card-header">
                            <div class="card-head-row d-flex align-items-center">
                                <div class="cafe-stats-icon me-2">
                                    <i class="fas fa-trophy text-warning"></i>
                                </div>
                                <div>
                                    <div class="card-title mb-0">Produk Terlaris</div>
                                    <small class="text-muted">Bulan ini</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                                $topProducts = \App\Models\Product::withCount([
                                    'transactions as total_sold' => function ($query) {
                                        $query
                                            ->whereMonth('created_at', now()->month)
                                            ->whereYear('created_at', now()->year);
                                    },
                                ])
                                    ->orderBy('total_sold', 'desc')
                                    ->take(3)
                                    ->get();
                            @endphp

                            @if ($topProducts->isNotEmpty())
                                @foreach ($topProducts as $index => $product)
                                    <div class="cafe-product-item d-flex align-items-center mb-3" data-aos="zoom-in"
                                        data-aos-delay="{{ ($index + 1) * 100 }}">
                                        <div class="cafe-product-rank me-3">
                                            <span
                                                class="badge cafe-rank-badge rank-{{ $index + 1 }}">{{ $index + 1 }}</span>
                                        </div>
                                        <div class="cafe-product-image-placeholder me-3">
                                            <i class="fas fa-coffee text-cafe-blue"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 cafe-product-name">{{ $product->name }}</h6>
                                            <small class="text-muted">{{ $product->total_sold ?? 0 }} terjual</small>
                                        </div>
                                        <div class="cafe-product-price">
                                            <span class="fw-bold text-success">Rp
                                                {{ number_format($product->price_sell, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-coffee fa-2x text-muted mb-2"></i>
                                    <p class="text-muted mb-0">Belum ada data penjualan</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===========================================
                     TOTAL PENDAPATAN & MENU ELEMENTS
                     ===========================================
                     Menampilkan:
                     - Total pendapatan bulan ini dengan animasi
                     - Elemen visual menu dengan ikon
                =========================================== --}}
            <div class="row">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="700" data-aos-duration="800">
                    <div class="card cafe-revenue-card">
                        <div class="card-body text-center">
                            <div class="cafe-revenue-icon mb-3">
                                <i class="fas fa-money-bill-wave fa-3x text-success"></i>
                            </div>
                            <h5 class="card-title text-cafe-blue">Total Pendapatan</h5>
                            <h2 class="cafe-revenue-amount text-success fw-bold mb-2">
                                Rp {{ number_format($profitThisMonth ?? 0, 0, ',', '.') }}
                            </h2>
                            <small class="text-muted">Bulan {{ now()->format('F Y') }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="800" data-aos-duration="800">
                    <div class="card cafe-menu-elements-card border-0 shadow-sm" style="min-height: 200px;">
                        <div class="card-header cafe-card-header bg-white border-0 mb-3">
                            <div class="card-title mb-0 d-flex align-items-center text-cafe-blue fw-bold">
                                <i class="fas fa-layer-group me-2"></i>
                                Menu Categories
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="row g-2">
                                @foreach (\App\Models\Category::withCount('products')->get() as $category)
                                    <div class="col-6 col-md-4 text-center" data-aos="zoom-in"
                                        data-aos-delay="{{ 80 * $loop->iteration }}">
                                        <div
                                            class="cafe-menu-item p-2 shadow-sm rounded bg-light h-100 hover-shadow transition d-flex flex-column justify-content-center">
                                            {{-- Icon atau Gambar --}}
                                            <div class="cafe-menu-icon mb-1">
                                                @if ($category->image)
                                                    <img src="{{ asset('storage/categories/' . $category->image) }}"
                                                        alt="{{ $category->name }}"
                                                        class="img-fluid rounded-circle border"
                                                        style="width: 45px; height: 45px; object-fit: cover;">
                                                @else
                                                    <i
                                                        class="
                                        @switch(strtolower($category->name))
                                            @case('coffee') fas fa-coffee @break
                                            @case('tea') fas fa-mug-hot @break
                                            @case('non-coffee') fas fa-glass-whiskey @break
                                            @case('snack') fas fa-cookie-bite @break
                                            @case('dessert') fas fa-ice-cream @break
                                            @case('main course') fas fa-utensils @break
                                            @case('juice') fas fa-blender @break
                                            @case('smoothies') fas fa-wine-glass-alt @break
                                            @case('milkshake') fas fa-glass-martini-alt @break
                                            @case('mocktail') fas fa-cocktail @break
                                            @default fas fa-store
                                        @endswitch
                                        fa-lg text-cafe-blue"></i>
                                                @endif
                                            </div>

                                            {{-- Nama Kategori --}}
                                            <h6 class="mb-0 fw-bold text-cafe-blue"
                                                style="font-family: 'Jersey 10'; font-size: 0.9rem;">
                                                {{ ucfirst($category->name) }}
                                            </h6>

                                            {{-- Jumlah Produk --}}
                                            <small class="text-muted" style="font-size: 0.75rem;">
                                                {{ $category->products_count }} items
                                            </small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- ===========================================
         SCRIPT CHART APEXCHARTS
         ===========================================
         Konfigurasi chart dengan:
         - Animasi smooth saat render
         - Data persentase penyelesaian transaksi
         - Kategori bulan dalam 12 bulan terakhir
         - Tema warna biru yang konsisten
    =========================================== --}}
    <script>
        // Inisialisasi chart dengan animasi smooth
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'bar',
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    }
                },
                series: [{
                    name: 'Jumlah Transaksi',
                    data: [{{ implode(',', $completedPercentages) }}]
                }],
                xaxis: {
                    categories: [
                        '{{ now()->subMonths(11)->format('M') }}',
                        '{{ now()->subMonths(10)->format('M') }}',
                        '{{ now()->subMonths(9)->format('M') }}',
                        '{{ now()->subMonths(8)->format('M') }}',
                        '{{ now()->subMonths(7)->format('M') }}',
                        '{{ now()->subMonths(6)->format('M') }}',
                        '{{ now()->subMonths(5)->format('M') }}',
                        '{{ now()->subMonths(4)->format('M') }}',
                        '{{ now()->subMonths(3)->format('M') }}',
                        '{{ now()->subMonths(2)->format('M') }}',
                        '{{ now()->subMonths(1)->format('M') }}',
                        '{{ now()->format('M') }}'
                    ]
                },
                title: {
                    text: 'Penjualan Bulanan - Cafe Biru',
                    align: 'left',
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold',
                        color: '#1976d2'
                    }
                },
                colors: ['#1976d2', '#42a5f5', '#64b5f6', '#90caf9'],
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        columnWidth: '60%',
                        distributed: false
                    }
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        colors: ['#fff']
                    },
                    background: {
                        enabled: true,
                        foreColor: '#1976d2',
                        borderRadius: 2,
                        padding: 4,
                        opacity: 0.9
                    }
                },
                grid: {
                    show: true,
                    borderColor: '#f1f3f4',
                    strokeDashArray: 3
                },
                tooltip: {
                    theme: 'light',
                    y: {
                        formatter: function(value) {
                            return value + ' transaksi';
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>
@endsection

{{-- ===========================================
     STYLES TAMBAHAN DASHBOARD CAFE
     ===========================================
     Styling khusus untuk dashboard cafe:
     - Header branding dengan logo dan slogan
     - Kartu statistik dengan tema cafe
     - Animasi dan efek visual menarik
     - Responsif untuk semua device
=========================================== --}}
<style>
    .cafe-dashboard-header {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 248, 255, 0.95) 100%);
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 8px 25px rgba(25, 118, 210, 0.1);
        border: 1px solid rgba(25, 118, 210, 0.1);
        position: relative;
        overflow: hidden;
    }

    .cafe-dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #1976d2, #42a5f5, #1976d2);
    }

    .cafe-logo-icon {
        background: linear-gradient(135deg, #1976d2, #42a5f5);
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        box-shadow: 0 4px 15px rgba(25, 118, 210, 0.3);
    }

    .cafe-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1976d2;
        margin: 0;
        text-shadow: 0 2px 4px rgba(25, 118, 210, 0.1);
        font-family: 'Poppins', sans-serif;
    }

    .cafe-subtitle {
        color: #666;
        font-size: 1rem;
        margin: 0;
    }

    .cafe-welcome-card {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 12px;
        padding: 1rem;
        border: 1px solid rgba(25, 118, 210, 0.1);
    }

    .welcome-icon {
        background: linear-gradient(135deg, #fff3cd, #ffeaa7);
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cafe-slogan {
        border-top: 1px solid rgba(25, 118, 210, 0.1);
        padding-top: 1rem;
        margin-top: 1rem;
    }

    .cafe-card-header {
        background: linear-gradient(135deg, #1976d2 0%, #42a5f5 100%);
        color: white;
        border: none;
        padding: 1.5rem;
    }

    .cafe-chart-card,
    .cafe-stats-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(25, 118, 210, 0.1);
        overflow: hidden;
    }

    .cafe-chart-container {
        min-height: 300px;
    }

    .cafe-product-item {
        padding: 0.75rem;
        border-radius: 10px;
        background: rgba(25, 118, 210, 0.02);
        border: 1px solid rgba(25, 118, 210, 0.05);
        transition: all 0.3s ease;
    }

    .cafe-product-item:hover {
        background: rgba(25, 118, 210, 0.05);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(25, 118, 210, 0.1);
    }

    .cafe-rank-badge {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .rank-1 {
        background: linear-gradient(135deg, #ffd700, #ffb347);
        color: #333;
    }

    .rank-2 {
        background: linear-gradient(135deg, #c0c0c0, #a8a8a8);
        color: #333;
    }

    .rank-3 {
        background: linear-gradient(135deg, #cd7f32, #a0522d);
        color: white;
    }

    .cafe-product-image-placeholder {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1));
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1976d2;
    }

    .cafe-revenue-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 248, 255, 0.95) 100%);
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(25, 118, 210, 0.1);
        transition: all 0.3s ease;
    }

    .cafe-revenue-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(25, 118, 210, 0.2);
    }

    .cafe-revenue-icon {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .cafe-revenue-amount {
        font-size: 2rem;
        text-shadow: 0 2px 4px rgba(25, 118, 210, 0.1);
        font-family: 'Poppins', sans-serif;
    }

    .cafe-menu-elements-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(25, 118, 210, 0.1);
        overflow: hidden;
    }

    .cafe-menu-item {
        padding: 1rem;
        border-radius: 10px;
        background: rgba(25, 118, 210, 0.02);
        border: 1px solid rgba(25, 118, 210, 0.05);
        transition: all 0.3s ease;
    }

    .cafe-menu-item:hover {
        background: rgba(25, 118, 210, 0.05);
        transform: scale(1.05);
    }

    .cafe-menu-icon {
        animation: bounce 2s infinite;
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-5px);
        }

        60% {
            transform: translateY(-3px);
        }
    }

    @media (max-width: 768px) {
        .cafe-title {
            font-size: 2rem;
        }

        .cafe-dashboard-header {
            padding: 1.5rem;
        }

        .cafe-logo-icon {
            width: 50px;
            height: 50px;
        }

        .cafe-welcome-card {
            margin-top: 1rem;
        }
    }
</style>

{{-- ===========================================
     SCRIPT INISIALISASI AOS (ANIMATE ON SCROLL)
     ===========================================
     Konfigurasi animasi:
     - Durasi: 800ms untuk smooth transition
     - Easing: ease-in-out untuk natural feel
     - Once: true (animasi hanya sekali)
     - Mirror: false (tidak animasi saat scroll balik)
=========================================== --}}
<script>
    // Inisialisasi AOS untuk animasi halaman
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    });
</script>
