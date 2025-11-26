<div>
    <div class="container-fluid px-4">
        <div class="cafe-card">
            <div class="cafe-card-header">
                <div class="d-flex align-items-center">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: rgba(255, 255, 255, 0.2); display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                        <i class="fas fa-user" style="font-size: 1.5rem; color: white;"></i>
                    </div>
                    <div>
                        <h4 class="cafe-card-title" style="font-size: 1.3rem;">
                            <i class="fas fa-coffee me-2"></i>Edit Data Kasir
                        </h4>
                        <p class="cafe-card-subtitle" style="font-size: 0.9rem;">
                            <i class="fas fa-edit me-1"></i>Perbarui informasi kasir sistem POS Cafe
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
                                        <i class="fas fa-user-circle me-2"></i>Nama Pengguna / Kasir
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                            <i class="fas fa-user" style="color: #d32f2f;"></i>
                                        </span>
                                        <input type="text" class="form-control" value="{{ $user->name }}" readonly style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: rgba(244, 67, 54, 0.02); font-weight: 500;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color: #d32f2f; font-size: 0.9rem;">
                                        <i class="fas fa-envelope me-2"></i>Alamat Email
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                            <i class="fas fa-envelope" style="color: #d32f2f;"></i>
                                        </span>
                                        <input type="email" class="form-control" value="{{ $user->email }}" readonly style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: rgba(244, 67, 54, 0.02); font-weight: 500;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color: #d32f2f; font-size: 0.9rem;">
                                        <i class="fas fa-lock me-2"></i>Kata Sandi
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.1), rgba(239, 83, 80, 0.1)); border: 1px solid rgba(244, 67, 54, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                            <i class="fas fa-shield-alt" style="color: #d32f2f;"></i>
                                        </span>
                                        <input type="password" class="form-control" value="{{ $user->password }}" readonly style="border: 1px solid rgba(244, 67, 54, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: rgba(244, 67, 54, 0.02); font-weight: 500;">
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
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" style="color: #1976d2; font-size: 0.9rem;">
                                            <i class="fas fa-user-circle me-2"></i>Nama Pengguna / Kasir
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); border: 1px solid rgba(25, 118, 210, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                                <i class="fas fa-user" style="color: #1976d2;"></i>
                                            </span>
                                            <input type="text" class="form-control" wire:model="name" style="border: 1px solid rgba(25, 118, 210, 0.2); border-left: none; border-radius: 0 8px 8px 0; font-weight: 400; font-size: 0.9rem;" placeholder="Masukkan nama lengkap">
                                        </div>
                                        @error('name')
                                            <div class="text-danger mt-2 small" style="background: rgba(244, 67, 54, 0.1); padding: 0.4rem; border-radius: 6px; border-left: 2px solid #f44336; font-size: 0.8rem;">
                                                <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" style="color: #1976d2; font-size: 0.9rem;">
                                            <i class="fas fa-envelope me-2"></i>Alamat Email
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); border: 1px solid rgba(25, 118, 210, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                                <i class="fas fa-envelope" style="color: #1976d2;"></i>
                                            </span>
                                            <input type="email" class="form-control" wire:model="email" style="border: 1px solid rgba(25, 118, 210, 0.2); border-left: none; border-radius: 0 8px 8px 0; font-weight: 400; font-size: 0.9rem;" placeholder="contoh@cafe.com">
                                        </div>
                                        @error('email')
                                            <div class="text-danger mt-2 small" style="background: rgba(244, 67, 54, 0.1); padding: 0.4rem; border-radius: 6px; border-left: 2px solid #f44336; font-size: 0.8rem;">
                                                <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" style="color: #1976d2; font-size: 0.9rem;">
                                            <i class="fas fa-lock me-2"></i>Kata Sandi Baru
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); border: 1px solid rgba(25, 118, 210, 0.2); border-right: none; border-radius: 8px 0 0 8px;">
                                                <i class="fas fa-shield-alt" style="color: #1976d2;"></i>
                                            </span>
                                            <input type="password" class="form-control" wire:model="password" style="border: 1px solid rgba(25, 118, 210, 0.2); border-left: none; border-right: none; border-radius: 0; font-weight: 400; font-size: 0.9rem;" placeholder="Minimal 8 karakter">
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border: 1px solid rgba(25, 118, 210, 0.2); border-left: none; border-radius: 0 8px 8px 0; background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1));">
                                                <i class="fas fa-eye" id="passwordIcon"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <div class="text-danger mt-2 small" style="background: rgba(244, 67, 54, 0.1); padding: 0.4rem; border-radius: 6px; border-left: 2px solid #f44336; font-size: 0.8rem;">
                                                <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                        <div class="form-text" style="color: #666; font-size: 0.75rem;">
                                            <i class="fas fa-info-circle me-1"></i>Kosongkan jika tidak ingin mengubah kata sandi
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-end pt-2" style="border-top: 1px solid rgba(25, 118, 210, 0.1);">
                                        <a href="{{ route('pengguna.index') }}" class="btn btn-outline-secondary px-3" style="border-radius: 20px; font-weight: 500; border: 1px solid rgba(108, 117, 125, 0.3); transition: all 0.3s ease; font-size: 0.85rem; padding: 0.4rem 1rem;">
                                            <i class="fas fa-arrow-left me-1"></i>Kembali
                                        </a>
                                        <button type="submit" class="cafe-btn-primary px-3" style="font-size: 0.85rem; padding: 0.4rem 1rem;">
                                            <i class="fas fa-check-circle me-1"></i>Simpan Perubahan
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

    .form-control:focus {
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

        .form-control {
            font-size: 0.85rem !important;
        }
    }
    </style>

    <script>
        document.getElementById('togglePassword')?.addEventListener('click', function() {
            const passwordInput = document.querySelector('input[wire\\:model="password"]');
            const icon = document.getElementById('passwordIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    </script>
</div>
