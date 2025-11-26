<div>
    <div class="container-fluid px-4">
        <div class="cafe-card">
            <div class="cafe-card-header">
                <div class="d-flex align-items-center">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: rgba(255, 255, 255, 0.2); display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                        <i class="fas fa-edit" style="font-size: 1.5rem; color: white;"></i>
                    </div>
                    <div>
                        <h4 class="cafe-card-title" style="font-size: 1.3rem;">
                            <i class="fas fa-coffee me-2"></i>Edit Produk Cafe
                        </h4>
                        <p class="cafe-card-subtitle" style="font-size: 0.9rem;">
                            <i class="fas fa-box me-1"></i>Perbarui informasi produk di sistem POS Cafe
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <!-- Data Lama -->
                    <div class="col-lg-6">
                        <div class="cafe-card" style="border-radius: 12px; background: linear-gradient(135deg, rgba(248, 249, 250, 0.8) 0%, rgba(255, 255, 255, 0.9) 100%); border: 1px solid rgba(25, 118, 210, 0.2);">
                            <div class="card-header" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.9), rgba(239, 83, 80, 0.9)); color: white; border-radius: 12px 12px 0 0 !important; border: none; padding: 1rem;">
                                <h6 class="mb-0" style="font-weight: 600; font-size: 1rem;">
                                    <i class="fas fa-eye me-2"></i>Data Lama
                                </h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color: #d32f2f; font-size: 0.9rem;">
                                        <i class="fas fa-folder me-2"></i>Kategori Produk
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                            <i class="fas fa-folder" style="color: #d32f2f;"></i>
                                        </span>
                                        <input type="text" class="form-control" value="{{ $product->category->name ?? 'N/A' }}" readonly style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: rgba(244, 67, 54, 0.02); font-weight: 500;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color: #d32f2f; font-size: 0.9rem;">
                                        <i class="fas fa-box me-2"></i>Nama Produk
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                            <i class="fas fa-box" style="color: #d32f2f;"></i>
                                        </span>
                                        <input type="text" class="form-control" value="{{ $product->name }}" readonly style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: rgba(244, 67, 54, 0.02); font-weight: 500;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color: #d32f2f; font-size: 0.9rem;">
                                        <i class="fas fa-tag me-2"></i>Merk Produk
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                            <i class="fas fa-tag" style="color: #d32f2f;"></i>
                                        </span>
                                        <input type="text" class="form-control" value="{{ $product->brand }}" readonly style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: rgba(244, 67, 54, 0.02); font-weight: 500;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color: #d32f2f; font-size: 0.9rem;">
                                        <i class="fas fa-cubes me-2"></i>Stok Lama
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                            <i class="fas fa-cubes" style="color: #d32f2f;"></i>
                                        </span>
                                        <input type="number" class="form-control" value="{{ $product->stock }}" readonly style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: rgba(244, 67, 54, 0.02); font-weight: 500;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color: #d32f2f; font-size: 0.9rem;">
                                        <i class="fas fa-money-bill-wave me-2"></i>Harga Beli Lama
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                            <i class="fas fa-money-bill-wave" style="color: #d32f2f;"></i>
                                        </span>
                                        <input type="text" class="form-control" value="Rp{{ number_format($product->price_buy) }}" readonly style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: rgba(244, 67, 54, 0.02); font-weight: 500;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color: #d32f2f; font-size: 0.9rem;">
                                        <i class="fas fa-hand-holding-usd me-2"></i>Harga Jual Lama
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                            <i class="fas fa-hand-holding-usd" style="color: #d32f2f;"></i>
                                        </span>
                                        <input type="text" class="form-control" value="Rp{{ number_format($product->price_sell) }}" readonly style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: rgba(244, 67, 54, 0.02); font-weight: 500;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color: #d32f2f; font-size: 0.9rem;">
                                        <i class="fas fa-weight me-2"></i>Satuan Lama
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                            <i class="fas fa-weight" style="color: #d32f2f;"></i>
                                        </span>
                                        <input type="text" class="form-control" value="{{ $product->unit }}" readonly style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: rgba(244, 67, 54, 0.02); font-weight: 500;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Baru -->
                    <div class="col-lg-6">
                        <div class="cafe-card" style="border-radius: 12px; background: linear-gradient(135deg, rgba(248, 249, 250, 0.8) 0%, rgba(255, 255, 255, 0.9) 100%); border: 1px solid rgba(25, 118, 210, 0.2);">
                            <div class="card-header" style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.9), rgba(66, 165, 245, 0.9)); color: white; border-radius: 12px 12px 0 0 !important; border: none; padding: 1rem;">
                                <h6 class="mb-0" style="font-weight: 600; font-size: 1rem;">
                                    <i class="fas fa-edit me-2"></i>Data Baru
                                </h6>
                            </div>
                            <div class="card-body p-3">
                                <form wire:submit="update">
                                    <input type="text" wire:mode="code" hidden>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" style="color: #1976d2; font-size: 0.9rem;">
                                            <i class="fas fa-folder me-2"></i>Kategori Produk
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); border: 1px solid rgba(25, 118, 210, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                                <i class="fas fa-folder" style="color: #1976d2;"></i>
                                            </span>
                                            <select wire:model="category_id" class="form-select" style="border: 1px solid rgba(25, 118, 210, 0.2); border-left: none; border-radius: 0 8px 8px 0; font-weight: 400; font-size: 0.9rem;">
                                                <option value="">== Pilih Kategori Produk ==</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                            <div class="text-danger mt-2 small" style="background: rgba(244, 67, 54, 0.1); padding: 0.4rem; border-radius: 6px; border-left: 2px solid #f44336; font-size: 0.8rem;">
                                                <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" style="color: #1976d2; font-size: 0.9rem;">
                                            <i class="fas fa-box me-2"></i>Nama Produk
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); border: 1px solid rgba(25, 118, 210, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                                <i class="fas fa-box" style="color: #1976d2;"></i>
                                            </span>
                                            <input type="text" class="form-control" wire:model="name" placeholder="Masukkan nama produk baru" style="border: 1px solid rgba(25, 118, 210, 0.2); border-left: none; border-radius: 0 8px 8px 0; font-weight: 400; font-size: 0.9rem;">
                                        </div>
                                        @error('name')
                                            <div class="text-danger mt-2 small" style="background: rgba(244, 67, 54, 0.1); padding: 0.4rem; border-radius: 6px; border-left: 2px solid #f44336; font-size: 0.8rem;">
                                                <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" style="color: #1976d2; font-size: 0.9rem;">
                                            <i class="fas fa-tag me-2"></i>Merk Produk
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); border: 1px solid rgba(25, 118, 210, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                                <i class="fas fa-tag" style="color: #1976d2;"></i>
                                            </span>
                                            <input type="text" class="form-control" wire:model="brand" placeholder="Masukkan merk produk" style="border: 1px solid rgba(25, 118, 210, 0.2); border-left: none; border-radius: 0 8px 8px 0; font-weight: 400; font-size: 0.9rem;">
                                        </div>
                                        @error('brand')
                                            <div class="text-danger mt-2 small" style="background: rgba(244, 67, 54, 0.1); padding: 0.4rem; border-radius: 6px; border-left: 2px solid #f44336; font-size: 0.8rem;">
                                                <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Stok Section -->
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" style="color: #1976d2; font-size: 0.9rem;">
                                            <i class="fas fa-cubes me-2"></i>Update Stok Produk
                                        </label>
                                        <div class="row g-2">
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); border: 1px solid rgba(25, 118, 210, 0.2); border-right: none; border-radius: 6px 0 0 6px; padding: 0.25rem 0.5rem;">
                                                        <i class="fas fa-plus-circle" style="color: #1976d2; font-size: 0.8rem;"></i>
                                                    </span>
                                                    <input type="number" class="form-control" wire:model.live="stock" placeholder="0" min="0" style="border: 1px solid rgba(25, 118, 210, 0.2); border-left: none; border-radius: 0 6px 6px 0; font-weight: 400; font-size: 0.8rem; padding: 0.25rem 0.5rem;">
                                                </div>
                                                <small class="text-muted" style="font-size: 0.7rem;">Tambah Stok</small>
                                                @error('stock')
                                                    <div class="text-danger mt-1 small" style="background: rgba(244, 67, 54, 0.1); padding: 0.2rem; border-radius: 4px; border-left: 2px solid #f44336; font-size: 0.7rem;">
                                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-8">
                                                <div class="input-group">
                                                    <span class="input-group-text" style="background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(102, 187, 106, 0.1)); border: 1px solid rgba(76, 175, 80, 0.2); border-right: none; border-radius: 6px 0 0 6px; padding: 0.25rem 0.5rem;">
                                                        <i class="fas fa-equals" style="color: #2e7d32; font-size: 0.8rem;"></i>
                                                    </span>
                                                    <input type="number" class="form-control" value="{{ $new_stock }}" readonly style="border: 1px solid rgba(76, 175, 80, 0.2); border-left: none; border-radius: 0 6px 6px 0; background: rgba(76, 175, 80, 0.02); font-weight: 600; color: #2e7d32; font-size: 0.8rem; padding: 0.25rem 0.5rem;">
                                                </div>
                                                <small class="text-success" style="font-size: 0.7rem;">Total Stok Baru</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" style="color: #d32f2f; font-size: 0.9rem;">
                                            <i class="fas fa-money-bill-wave me-2"></i>Harga Beli Baru
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                                <i class="fas fa-money-bill-wave" style="color: #d32f2f;"></i>
                                            </span>
                                            <input type="number" class="form-control" wire:model="price_buy" placeholder="0" min="0" style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; font-weight: 400; font-size: 0.9rem;">
                                        </div>
                                        @error('price_buy')
                                            <div class="text-danger mt-2 small" style="background: rgba(244, 67, 54, 0.1); padding: 0.4rem; border-radius: 6px; border-left: 2px solid #f44336; font-size: 0.8rem;">
                                                <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" style="color: #2e7d32; font-size: 0.9rem;">
                                            <i class="fas fa-hand-holding-usd me-2"></i>Harga Jual Baru
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(102, 187, 106, 0.1)); border: 1px solid rgba(76, 175, 80, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                                <i class="fas fa-hand-holding-usd" style="color: #2e7d32;"></i>
                                            </span>
                                            <input type="number" class="form-control" wire:model="price_sell" placeholder="0" min="0" style="border: 1px solid rgba(76, 175, 80, 0.2); border-left: none; border-radius: 0 8px 8px 0; font-weight: 400; font-size: 0.9rem;">
                                        </div>
                                        @error('price_sell')
                                            <div class="text-danger mt-2 small" style="background: rgba(244, 67, 54, 0.1); padding: 0.4rem; border-radius: 6px; border-left: 2px solid #f44336; font-size: 0.8rem;">
                                                <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #1976d2; font-size: 0.9rem;">
                                            <i class="fas fa-weight me-2"></i>Satuan Barang
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); border: 1px solid rgba(25, 118, 210, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                                <i class="fas fa-weight" style="color: #1976d2;"></i>
                                            </span>
                                            <select class="form-select" wire:model="unit" style="border: 1px solid rgba(25, 118, 210, 0.2); border-left: none; border-radius: 0 8px 8px 0; font-weight: 400; font-size: 0.9rem;">
                                                <option value="">== Pilih Satuan ==</option>
                                                <option value="Pcs (Pieces)">Pcs (Pieces)</option>
                                                <option value="Set">Set</option>
                                                <option value="Kg">Kg</option>
                                                <option value="Liter">Liter</option>
                                                <option value="Box">Box</option>
                                            </select>
                                        </div>
                                        @error('unit')
                                            <div class="text-danger mt-2 small" style="background: rgba(244, 67, 54, 0.1); padding: 0.4rem; border-radius: 6px; border-left: 2px solid #f44336; font-size: 0.8rem;">
                                                <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Info Alert -->
                                    <div class="alert" style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.05), rgba(66, 165, 245, 0.05)); border: 1px solid rgba(25, 118, 210, 0.2); border-radius: 10px; color: #1976d2; margin-bottom: 1.5rem;">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Informasi:</strong> Pastikan semua data produk diperbarui dengan benar. Stok baru akan ditambahkan ke stok lama.
                                    </div>

                                    <div class="d-flex gap-2 justify-content-end pt-2" style="border-top: 1px solid rgba(25, 118, 210, 0.1);">
                                        <a href="{{ route('product.index') }}" class="btn btn-outline-secondary px-3" style="border-radius: 20px; font-weight: 500; border: 1px solid rgba(108, 117, 125, 0.3); transition: all 0.3s ease; font-size: 0.85rem; padding: 0.4rem 1rem;">
                                            <i class="fas fa-arrow-left me-1"></i>Kembali
                                        </a>
                                        <button type="submit" class="cafe-btn-primary px-3" style="font-size: 0.85rem; padding: 0.4rem 1rem;">
                                            <i class="fas fa-save me-1"></i>Update Produk
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CSS tambahan untuk efek hover dan animasi cafe-style -->
    <style>
    .cafe-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(25, 118, 210, 0.2);
        transition: all 0.3s ease;
    }

    .input-group:hover .input-group-text {
        background: linear-gradient(135deg, rgba(25, 118, 210, 0.2), rgba(66, 165, 245, 0.2)) !important;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: rgba(25, 118, 210, 0.8);
        box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.25);
        transform: translateY(-1px);
        transition: all 0.3s ease;
    }

    .cafe-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(25, 118, 210, 0.4);
    }

    /* Animasi untuk ikon di header */
    @keyframes bounce-icon {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-3px); }
        60% { transform: translateY(-2px); }
    }

    .cafe-card-header:hover .fas.fa-coffee {
        animation: bounce-icon 2s infinite;
    }

    /* Responsive untuk tablet dan mobile */
    @media (max-width: 768px) {
        .row.g-4 {
            --bs-gutter-x: 1rem;
            --bs-gutter-y: 1rem;
        }

        .col-lg-6 {
            margin-bottom: 1rem;
        }

        .cafe-card-title {
            font-size: 1.1rem !important;
        }

        .card-body {
            padding: 1.5rem !important;
        }

        .alert {
            font-size: 0.85rem !important;
        }
    }

    @media (max-width: 576px) {
        .container-fluid {
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important;
        }

        .cafe-card {
            margin-bottom: 1rem;
        }

        .input-group-text {
            padding: 0.375rem 0.5rem !important;
        }

        .form-control, .form-select {
            font-size: 0.85rem !important;
        }

        .btn {
            padding: 0.3rem 0.8rem !important;
            font-size: 0.8rem !important;
        }
    }
    </style>
</div>
