<div>
    <div class="container-fluid px-4">
        <div class="card shadow-lg border-0"
            style="border-radius: 15px; background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 249, 250, 0.95) 100%); backdrop-filter: blur(10px);">
            <div class="card-header"
                style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.9) 0%, rgba(66, 165, 245, 0.9) 100%); border-radius: 15px 15px 0 0 !important; border: none; padding: 1.5rem;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title text-white mb-1"
                            style="font-weight: 600; font-family: 'Nunito', cursive; font-size: 1.1rem;">
                            <i class="fas fa-coffee me-2" style="font-size: 1.2rem;"></i>Data Kategori Cafe
                            <i class="fas fa-tags ms-2" style="font-size: 0.9rem;"></i>
                        </h5>
                        <p class="text-white-50 mb-0" style="font-size: 0.8rem;">
                            <i class="fas fa-info-circle me-1"></i>Kelola kategori produk sistem POS Cafe
                        </p>
                    </div>
                    <button type="button" class="btn btn-light d-flex align-items-center gap-2 shadow-sm"
                        data-bs-toggle="modal" data-bs-target="#exampleModal" style="border-radius: 8px;">
                        <i class="fas fa-layer-group"></i>
                        Tambah Kategori
                    </button>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table id="example" class="table table-hover mb-0"
                        style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(25, 118, 210, 0.08); font-size: 0.85rem;">
                        <thead
                            style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.9) 0%, rgba(66, 165, 245, 0.9) 100%); color: white;">
                            <tr>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-hashtag me-1"></i>No
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-folder me-1"></i>Nama Kategori
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-cogs me-1"></i>Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody style="background: rgba(255, 255, 255, 0.8);">
                            @foreach ($categories as $no => $item)
                                <tr style="transition: all 0.3s ease; border-bottom: 1px solid rgba(25, 118, 210, 0.08);"
                                    class="cafe-table-row">
                                    <td class="py-2 px-3" style="font-weight: 400; color: #1976d2;">
                                        <span class="badge"
                                            style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); color: #1976d2; border-radius: 15px; padding: 0.3rem 0.8rem; font-weight: 500; font-size: 0.75rem;">
                                            {{ ++$no }}
                                        </span>
                                    </td>
                                    <td class="py-2 px-3" style="font-weight: 600; color: #424242; font-size: 0.85rem;">
                                        <i class="fas fa-folder me-2" style="color: #1976d2;"></i>
                                        {{ $item->name }}
                                    </td>
                                    <td class="py-2 px-3">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('category.edit', $item->id_category) }}"
                                                class="btn btn-outline-primary btn-sm"
                                                style="border-radius: 20px; padding: 0.3rem 0.8rem; font-weight: 500; transition: all 0.3s ease; border: 1px solid rgba(25, 118, 210, 0.3); font-size: 0.75rem;">
                                                <i class="fas fa-edit me-1"></i>Ubah
                                            </a>
                                            <form id="deleteForm{{ $item->id_category }}" class="d-inline"
                                                action="{{ route('category.delete', $item->id_category) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    onclick="confirmDelete({{ $item->id_category }})"
                                                    style="border-radius: 20px; padding: 0.3rem 0.8rem; font-weight: 500; transition: all 0.3s ease; border: 1px solid rgba(244, 67, 54, 0.3); font-size: 0.75rem;">
                                                    <i class="fas fa-trash me-1"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header text-white" style="background: linear-gradient(135deg, #1976d2, #2196f3);">
                    <div class="d-flex align-items-center">
                        <div class="me-2 bg-white bg-opacity-25 p-2 rounded-circle">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="exampleModalLabel">Tambah Kategori Baru</h5>
                            <small class="text-light opacity-75">
                                <i class="fas fa-tags me-1"></i>Tambahkan kategori menu di POS Café Anda
                            </small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Kategori</label>
                            <input type="text" class="form-control" wire:model="name"
                                placeholder="Masukkan nama kategori..." required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i>Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Simpan
                            </button>
                        </div>
                    </form>
                </div>

                <div class="modal-footer bg-light border-0 text-muted small">
                    <i class="fas fa-info-circle me-1"></i>Pastikan nama kategori unik agar tidak duplikat.
                </div>
            </div>
        </div>
    </div>
</div>
