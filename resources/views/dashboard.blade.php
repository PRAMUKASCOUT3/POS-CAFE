@extends('layouts.master')

@section('content')
    @php
        $user = \App\Models\User::where('isAdmin', 0)->count();
        $product = \App\Models\Product::count();
        $category = \App\Models\Category::count();
        $supplier = \App\Models\Supplier::count();

    @endphp

    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Beranda</h3>
                </div>
            </div>
            @if (Auth()->user()->isAdmin == 2)
                <div class="row row-card-no-pd">
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3">
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
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3">
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
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3">
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
                    <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                        <div class="card stats-card h-100">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex justify-content-between w-100 align-items-center">
                                    <div>
                                        <h5 class="card-title text-info mb-1">
                                            <i class="bi bi-truck me-2"></i>Pemasok
                                        </h5>
                                        <p class="text-muted small mb-0">Mitra supplier</p>
                                    </div>
                                    <div class="text-end">
                                        <h2 class="text-info fw-bold mb-0">{{ $supplier }}</h2>
                                        <small class="text-success">
                                            <i class="bi bi-check-circle me-1"></i>Aktif
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Statistik Transaksi</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Total Preorder <i class="fas fa-calendar"></i></div>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="mb-4 mt-2">
                                <h1>Rp. {{ number_format($profitThisMonth,'0')}}</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        var options = {
            chart: {
                type: 'bar',
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
                text: 'Persentase Penyelesaian Transaksi (12 Bulan Terakhir)',
                align: 'left'
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection
