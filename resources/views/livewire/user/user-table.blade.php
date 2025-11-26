<div>
    <div class="container-fluid px-4">
        <div class="cafe-card">
            <div class="cafe-card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="cafe-card-title">
                            <i class="bi bi-cup-hot me-2"></i>Data Pengguna / Kasir
                            <i class="fas fa-users ms-2"></i>
                        </h5>
                        <p class="cafe-card-subtitle">
                            <i class="bi bi-info-circle me-1"></i>Kelola data kasir dan pengguna sistem POS Cafe
                        </p>
                    </div>
                    <button  type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-user-plus me-1"></i>Tambah Kasir
                    </button>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table id="example" class="cafe-table table-hover mb-0">
                        <thead>
                            <tr>
                                <th><i class="bi bi-hash me-1"></i>No</th>
                                <th><i class="fas fa-id-badge me-1"></i>Kode Kasir</th>
                                <th><i class="bi bi-person-circle me-1"></i>Nama Kasir</th>
                                <th><i class="bi bi-envelope me-1"></i>Email</th>
                                <th><i class="bi bi-gear me-1"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>
                                        <span class="cafe-badge">{{ $index + 1 }}</span>
                                    </td>
                                    <td>
                                        <i class="fas fa-id-card me-1" style="color: #1976d2; font-size: 0.8rem;"></i>
                                        <span
                                            style="font-family: 'Courier New', monospace; background: rgba(25, 118, 210, 0.05); padding: 0.2rem 0.4rem; border-radius: 4px; font-size: 0.8rem;">
                                            {{ $user->code }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="user-name">{{ $user->name }}</div>
                                                <small class="user-role">
                                                    <i class="bi bi-person-badge me-1"></i>Kasir
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="font-weight: 400; color: #666; font-size: 0.8rem;">
                                        <i class="bi bi-envelope me-1" style="color: #1976d2; font-size: 0.75rem;"></i>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('pengguna.edit', $user->id_user) }}"
                                                class="cafe-btn-outline-primary">
                                                <i class="bi bi-pencil-square me-1"></i>Ubah
                                            </a>
                                            <form id="deleteForm{{ $user->id_user }}" class="d-inline"
                                                action="{{ route('pengguna.delete', $user->id_user) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="cafe-btn-outline-danger"
                                                    onclick="confirmDelete({{ $user->id_user }})">
                                                    <i class="bi bi-trash me-1"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Komponen Livewire -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dengan tema cafe yang lebih modern dan menarik -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <div class="modal-icon">
                            <i class="fas fa-user-plus" style="font-size: 1.2rem; color: white;"></i>
                        </div>
                        <div>
                            <h4 class="modal-title fw-bold" id="createUserModalLabel" style="font-family: 'Nunito', cursive; color: white;">
                                <i class="fas fa-mug-hot me-2" style="font-size: 0.9rem;"></i>Tambah Kasir Baru
                            </h4>
                            <p class="modal-subtitle mb-0">
                                <i class="fas fa-coffee me-1"></i>Daftarkan kasir untuk sistem POS Cafe Anda
                            </p>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="cafe-form-container">
                        <!-- Header Form dengan Icon -->
                        <div class="text-center mb-4">
                            <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; border: 2px solid rgba(25, 118, 210, 0.2);">
                                <i class="fas fa-user-cog" style="font-size: 1.8rem; color: #1976d2;"></i>
                            </div>
                            <h6 class="fw-bold text-muted mb-0" style="font-size: 0.9rem;">Formulir Pendaftaran Kasir</h6>
                        </div>

                        <form wire:submit="save">
                            <input type="text" wire:model="code" hidden>

                            <!-- Nama Lengkap -->
                            <div class="mb-4">
                                <label for="name" class="form-label fw-semibold">
                                    <i class="fas fa-user-tag me-2" style="color: #1976d2;"></i>Nama Lengkap Kasir
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user" style="font-size: 0.9rem;"></i>
                                    </span>
                                    <input type="text" id="name" class="form-control" wire:model="name" required
                                        placeholder="Masukkan nama lengkap kasir" style="font-weight: 500;">
                                    <span class="input-group-text">
                                        <i class="fas fa-id-card" style="font-size: 0.8rem; color: #666;"></i>
                                    </span>
                                </div>
                                @error('name')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">
                                    <i class="fas fa-at me-2" style="color: #1976d2;"></i>Alamat Email Aktif
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope" style="font-size: 0.9rem;"></i>
                                    </span>
                                    <input type="email" id="email" class="form-control" wire:model="email"
                                        required placeholder="contoh@cafe.com" style="font-weight: 500;">
                                    <span class="input-group-text">
                                        <i class="fas fa-check-circle" style="font-size: 0.8rem; color: #4caf50;"></i>
                                    </span>
                                </div>
                                @error('email')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">
                                    <i class="fas fa-shield-alt me-2" style="color: #1976d2;"></i>Kata Sandi Keamanan
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock" style="font-size: 0.9rem;"></i>
                                    </span>
                                    <input type="password" id="password" class="form-control" wire:model="password"
                                        required placeholder="Minimal 8 karakter" style="font-weight: 500;">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-left: none;">
                                        <i class="fas fa-eye" id="passwordIcon" style="font-size: 0.9rem;"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                                <div class="form-text" style="color: #666; font-size: 0.75rem; background: rgba(25, 118, 210, 0.05); padding: 0.5rem; border-radius: 6px; margin-top: 0.5rem;">
                                    <i class="fas fa-info-circle me-1"></i>Kata sandi harus minimal 8 karakter dengan kombinasi huruf dan angka untuk keamanan maksimal
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-3 justify-content-end pt-3" style="border-top: 2px solid rgba(25, 118, 210, 0.1);">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-2"></i>Batal
                                </button>
                                <button type="submit" class="cafe-btn-primary">
                                    <i class="fas fa-user-plus me-2"></i>Simpan Kasir
                                </button>
                            </div>
                        </form>

                        <!-- Footer Info -->
                        <div class="text-center mt-4 pt-3" style="border-top: 1px solid rgba(25, 118, 210, 0.1);">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt me-1"></i>Data kasir akan disimpan dengan aman dan terenkripsi
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
