<div>
    {{-- Container utama dengan layout modern --}}
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-body">
                {{-- Header Kasir dengan Counter Keranjang Interaktif --}}
                <div class="cafe-cashier-header mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class=" mb-0">
                                <i class="bi bi-shop me-2"></i>Kasir Cafe Biru
                            </h2>
                            <p class="cafe-subtitle mb-0">Sistem Point of Sale Interaktif Modern</p>
                        </div>
                        <div class="cafe-cart-counter" id="cart-counter">
                            <div class="counter-display">
                                <i class="bi bi-cart3 counter-icon"></i>
                                <span class="counter-number" id="cart-count">{{ count($items) }}</span>
                                <span class="counter-label">item</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Layout Grid Utama - Cafe POS System --}}
                <div class="cafe-pos-layout row">
                    {{-- Kolom Kiri: Search & Product Grid --}}
                    <div class="cafe-products-section col-lg-7 col-md-6">
                        <div class="cafe-search-section mb-4">
                            <div class="card cafe-search-card border-0 shadow-sm">
                                <div class="card-body cafe-search-body">
                                    <div class="row g-3">
                                        <div class="col-md-8">
                                            <div class="input-group cafe-search-group">
                                                <span class="input-group-text cafe-search-icon">
                                                    <i class="bi bi-search"></i>
                                                </span>
                                                <input type="text" id="search-product"
                                                    class="form-control cafe-search-input"
                                                    placeholder="Cari menu cafe, kopi, makanan..."
                                                    wire:model.live="search">
                                                <span class="input-group-text cafe-search-hint">
                                                    <i class="bi bi-cup-hot text-cafe-blue"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-select cafe-category-select"
                                                wire:model.live="selectedCategory">
                                                <option value="">Semua Kategori</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id_category }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cafe-products-grid">
                            @if ($product->isNotEmpty())
                                <div class="row g-3">
                                    @foreach ($product as $item)
                                        @if ($item->stock > 0)
                                            {{-- Product Card dengan tema cafe --}}
                                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="card cafe-product-card h-100 border-0 shadow-sm">
                                                    {{-- Product Image Placeholder --}}
                                                    <div class="cafe-product-image position-relative">
                                                        @if ($item->image)
                                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                                alt="{{ $item->name }}"
                                                                class="img-fluid rounded-top cafe-image"
                                                                style="object-fit: cover; height: 180px; width: 100%;">
                                                        @else
                                                            <div class="cafe-image-placeholder d-flex flex-column align-items-center justify-content-center"
                                                                style="height: 180px; background-color: #f5f5f5; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
                                                                <i class="bi bi-image text-cafe-blue fs-3"></i>
                                                                <span class="placeholder-text small text-muted">No
                                                                    Image</span>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    {{-- Product Info --}}
                                                    <div class="card-body cafe-product-body">
                                                        <h6 class="cafe-product-title text-cafe-blue fw-bold mb-2"
                                                            style="font-family: Jersey 10">
                                                            <i class="bi bi-cup-hot me-1"></i>{{ $item->name }}
                                                        </h6>
                                                        <div class="cafe-product-price mb-2">
                                                            <span class="price-amount fw-bold text-success">
                                                                Rp {{ number_format($item->price_sell, 0, ',', '.') }}
                                                            </span>
                                                        </div>
                                                        <div class="cafe-product-stock text-muted small mb-3">
                                                            <i class="bi bi-box-seam me-1"></i>Stok: {{ $item->stock }}
                                                        </div>

                                                        {{-- Add to Cart Button --}}
                                                        <button class="btn cafe-add-to-cart w-100"
                                                            wire:click="addItem({{ $item->id_product }})">
                                                            <i class="bi bi-cart-plus me-1"></i>Tambah
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                {{-- Pagination --}}
                                <div class="cafe-pagination-section mt-4">
                                    {{ $product->links() }}
                                </div>
                            @else
                                {{-- Empty State --}}
                                <div class="cafe-empty-state text-center py-5">
                                    <div class="empty-icon mb-3">
                                        <i class="bi bi-search text-cafe-blue" style="font-size: 4rem;"></i>
                                    </div>
                                    <h5 class="text-cafe-blue mb-2">Menu Tidak Ditemukan</h5>
                                    <p class="text-muted">Coba kata kunci pencarian yang berbeda</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Kolom Kanan: Keranjang Belanja --}}
                    <div class="cafe-cart-section col-lg-4 col-md-5">
                        <div class="cafe-cart-sticky">
                            <div class="cafe-cart-container">
                                {{-- Header Keranjang dengan counter animasi --}}
                                <div class="cafe-cart-header rounded-top">
                                    <div class="d-flex justify-content-between align-items-center p-4">
                                        <div class="d-flex align-items-center">
                                            <h4 class="text-white mb-0">
                                                <i class="bi bi-receipt me-2"></i>Keranjang Pesanan
                                            </h4>
                                            <span class="cart-item-count ms-2" id="cart-item-count">
                                                ({{ count($items) }} item)
                                            </span>
                                        </div>
                                        <button class="btn cafe-clear-btn" wire:click="clear">
                                            <i class="bi bi-arrow-clockwise me-1"></i>Reset
                                        </button>
                                    </div>
                                </div>

                                {{-- Tabel Keranjang dengan tema cafe --}}
                                <div class="cafe-cart-body rounded-bottom shadow-sm">
                                    <div class="p-4">
                                        @if (count($items) > 0)
                                            <div class="table-responsive">
                                                <table class="table cafe-table">
                                                    <thead class="cafe-table-header">
                                                        <tr>
                                                            <th><i class="bi bi-cup-hot me-1"></i>Menu</th>
                                                            <th><i class="bi bi-dash-circle me-1"></i>Jumlah</th>
                                                            <th><i class="bi bi-cash me-1"></i>Harga</th>
                                                            <th><i class="bi bi-calculator me-1"></i>Total</th>
                                                            <th><i class="bi bi-gear me-1"></i>Aksi</th>
                                                        </tr>
                                                        {{-- Discount Input Row --}}
                                                        <tr class="discount-row">
                                                            <td colspan="3" class="text-end fw-bold text-cafe-blue">
                                                                Diskon
                                                                (%)</td>
                                                            <td colspan="2">
                                                                <input type="number" wire:model.live="discount"
                                                                    class="form-control cafe-input text-center"
                                                                    min="0" max="100" placeholder="0"
                                                                    style="width: 80px; display: inline-block;">
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($items as $index => $item)
                                                            {{-- Baris tabel dengan animasi dan highlight --}}
                                                            <tr class="cafe-table-row cart-item-row"
                                                                id="cart-item-{{ $index }}"
                                                                data-item-id="{{ $index }}"
                                                                data-aos="slide-in-right"
                                                                data-aos-delay="{{ $loop->index * 50 }}">
                                                                <td class="fw-bold text-cafe-blue">
                                                                    <i class="bi bi-dot new-item-indicator"
                                                                        style="display: none;"></i>
                                                                    {{ $item['name'] }}
                                                                </td>
                                                                <td>
                                                                    <div class="quantity-control">
                                                                        <button
                                                                            class="btn btn-sm quantity-btn minus-btn"
                                                                            wire:click="updateQuantity({{ $index }}, {{ $item['stock'] - 1 }})"
                                                                            @if ($item['stock'] <= 1) disabled @endif>
                                                                            <i class="bi bi-dash"></i>
                                                                        </button>
                                                                        <input type="number" min="1"
                                                                            wire:model.defer="items.{{ $index }}.stock"
                                                                            wire:change="updateQuantity({{ $index }}, $event.target.value)"
                                                                            class="form-control cafe-quantity-input">
                                                                        <button
                                                                            class="btn btn-sm quantity-btn plus-btn"
                                                                            wire:click="updateQuantity({{ $index }}, {{ $item['stock'] + 1 }})">
                                                                            <i class="bi bi-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                                <td class="cafe-price">
                                                                    Rp
                                                                    {{ number_format($item['price_sell'], 0, ',', '.') }}
                                                                </td>
                                                                <td class="fw-bold cafe-total">
                                                                    Rp
                                                                    {{ number_format($item['price_sell'] * $item['stock'], 0, ',', '.') }}
                                                                </td>
                                                                <td>
                                                                    <button class="btn cafe-remove-btn btn-sm"
                                                                        wire:click="removeItem({{ $index }})">
                                                                        <i class="bi bi-trash me-1"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach {{-- ✅ Harus ditutup di sini --}}

                                                        {{-- Total Row --}}
                                                        <tr class="total-row">
                                                            <td colspan="3"
                                                                class="text-end fw-bold text-cafe-blue">TOTAL
                                                            </td>
                                                            <td colspan="2"
                                                                class="fw-bold text-cafe-blue cafe-total">
                                                                Rp
                                                                {{ number_format($subtotal - ($subtotal * $discount) / 100, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            {{-- Pesan keranjang kosong --}}
                                            <div class="text-center py-5">
                                                <i class="bi bi-cart-x text-cafe-blue" style="font-size: 3rem;"></i>
                                                <h5 class="mt-3 text-cafe-blue">Keranjang Masih Kosong</h5>
                                                <p class="text-muted">Tambahkan menu dari daftar di atas</p>
                                            </div>
                                        @endif

                                    </div>

                                    <div class="cafe-payment-section mt-4">
                                        {{-- Ringkasan Pembayaran --}}
                                        <div class="cafe-payment-summary p-4 mb-4 rounded">
                                            <h5 class="text-cafe-blue mb-3">
                                                <i class="bi bi-calculator me-2"></i>Ringkasan Pembayaran
                                            </h5>
                                            {{-- Itemized Totals --}}
                                            <div class="mb-3">
                                                <div
                                                    class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                                    <span class="text-muted">Subtotal:</span>
                                                    <span class="fw-bold text-cafe-blue">Rp
                                                        {{ number_format($subtotal, 0, ',', '.') }}</span>
                                                </div>
                                                <div
                                                    class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                                    <span class="text-muted">Diskon ({{ $discount }}%):</span>
                                                    <span class="fw-bold text-success">-Rp
                                                        {{ number_format(($subtotal * $discount) / 100, 0, ',', '.') }}</span>
                                                </div>
                                                <div
                                                    class="d-flex justify-content-between align-items-center py-3 border-bottom border-2">
                                                    <span class="fw-bold text-cafe-blue">Total:</span>
                                                    <span class="fw-bold text-cafe-blue fs-5">Rp
                                                        {{ number_format($subtotal - ($subtotal * $discount) / 100, 0, ',', '.') }}</span>
                                                </div>
                                            </div>

                                            {{-- Payment Section --}}
                                            <div class="row g-3">
                                                {{-- Bayar --}}
                                                <div class="col-12">
                                                    <label class="form-label fw-bold text-cafe-blue">Bayar</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text cafe-input-icon">
                                                            Rp
                                                        </span>
                                                        <input type="text" id="amount-paid-display"
                                                            class="form-control cafe-input" placeholder="0" required>
                                                        <input type="hidden" wire:model.live="amount_paid"
                                                            id="amount-paid-hidden">
                                                    </div>
                                                </div>

                                                {{-- Kembalian --}}
                                                <div class="col-12">
                                                    <label class="form-label fw-bold text-cafe-blue">Kembalian</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text cafe-input-icon">
                                                            <i class="bi bi-arrow-left-right"></i>
                                                        </span>
                                                        <input type="text" id="kembali"
                                                            value="Rp {{ number_format($change, 0, ',', '.') }}"
                                                            class="form-control cafe-change-input fw-bold" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Tombol Pembayaran --}}
                                        <input type="text" wire:model='user_id' hidden>
                                        <div class="d-flex justify-content-center mt-4">
                                            <button class="btn cafe-pay-btn px-5 py-3 w-100"
                                                wire:click="saveTransaction">
                                                <i class="bi bi-credit-card me-2"></i>Proses Pembayaran
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi AOS
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false,
                offset: 50
            });

            // Livewire event listeners untuk animasi interaktif
            Livewire.on('itemAdded', (data) => {
                // Bounce animation untuk counter
                const counter = document.getElementById('cart-counter');
                counter.classList.add('bounce-animation');

                // Update counter dengan animasi
                const countElement = document.getElementById('cart-count');
                const itemCountElement = document.getElementById('cart-item-count');
                const newCount = parseInt(countElement.textContent) + 1;

                animateCounter(countElement, newCount);
                animateCounterText(itemCountElement, newCount);

                // Highlight item baru
                setTimeout(() => {
                    const newItemRow = document.querySelector('.cart-item-row:last-child');
                    if (newItemRow) {
                        newItemRow.classList.add('new-item-highlight');
                        const indicator = newItemRow.querySelector('.new-item-indicator');
                        if (indicator) {
                            indicator.style.display = 'inline';
                            setTimeout(() => {
                                indicator.style.display = 'none';
                                newItemRow.classList.remove('new-item-highlight');
                            }, 2000);
                        }
                    }
                }, 100);

                // Remove bounce class after animation
                setTimeout(() => {
                    counter.classList.remove('bounce-animation');
                }, 600);
            });

            Livewire.on('itemRemoved', (data) => {
                // Update counter saat item dihapus
                const countElement = document.getElementById('cart-count');
                const itemCountElement = document.getElementById('cart-item-count');
                const newCount = Math.max(0, parseInt(countElement.textContent) - 1);

                animateCounter(countElement, newCount);
                animateCounterText(itemCountElement, newCount);
            });

            Livewire.on('cartCleared', () => {
                // Reset counter dengan animasi
                const countElement = document.getElementById('cart-count');
                const itemCountElement = document.getElementById('cart-item-count');

                animateCounter(countElement, 0);
                animateCounterText(itemCountElement, 0);
            });

            // Fungsi animasi counter
            function animateCounter(element, target) {
                const start = parseInt(element.textContent);
                const duration = 300;
                const startTime = performance.now();

                function update(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);

                    const current = Math.round(start + (target - start) * progress);
                    element.textContent = current;

                    if (progress < 1) {
                        requestAnimationFrame(update);
                    }
                }

                requestAnimationFrame(update);
            }

            function animateCounterText(element, count) {
                element.textContent = `(${count} item)`;
            }

            // Animasi quantity buttons
            document.addEventListener('click', function(e) {
                if (e.target.closest('.quantity-btn')) {
                    const btn = e.target.closest('.quantity-btn');
                    btn.classList.add('quantity-click-animation');
                    setTimeout(() => {
                        btn.classList.remove('quantity-click-animation');
                    }, 150);
                }
            });

            // Smooth scroll untuk hasil pencarian
            const searchInput = document.getElementById('search-product');
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    const resultsContainer = document.querySelector('.cafe-products-grid');
                    if (resultsContainer) {
                        resultsContainer.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    }
                });
            }

            // Auto-focus pada input diskon saat cart memiliki items
            Livewire.on('itemAdded', () => {
                setTimeout(() => {
                    const discountInput = document.querySelector('.discount-row input');
                    if (discountInput && !discountInput.value) {
                        discountInput.focus();
                    }
                }, 500);
            });

            // Format input bayar sebagai Rupiah
            const amountPaidDisplay = document.getElementById('amount-paid-display');
            const amountPaidHidden = document.getElementById('amount-paid-hidden');

            if (amountPaidDisplay && amountPaidHidden) {
                // Fungsi untuk format Rupiah
                function formatRupiah(angka) {
                    let numberString = angka.replace(/[^,\d]/g, '').toString();
                    let split = numberString.split(',');
                    let sisa = split[0].length % 3;
                    let rupiah = split[0].substr(0, sisa);
                    let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                    if (ribuan) {
                        let separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return rupiah;
                }

                // Event listener untuk input
                amountPaidDisplay.addEventListener('input', function(e) {
                    let value = e.target.value;
                    let formatted = formatRupiah(value);
                    e.target.value = formatted;

                    // Update hidden input dengan nilai numerik
                    let numericValue = value.replace(/[^\d]/g, '');
                    amountPaidHidden.value = numericValue;
                    amountPaidHidden.dispatchEvent(new Event('input', {
                        bubbles: true
                    }));
                });

                // Set initial value jika ada
                if (amountPaidHidden.value) {
                    let numericValue = amountPaidHidden.value;
                    amountPaidDisplay.value = formatRupiah(numericValue.toString());
                }
            }
        });
    </script>
</div>
