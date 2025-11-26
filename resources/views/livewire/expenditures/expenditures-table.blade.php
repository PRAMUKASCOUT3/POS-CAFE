<div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Pengeluaran <i class="fas fa-file-invoice-dollar"></i></h5>
                <div class="table-responsive">
                    {{-- Header atas tabel dengan tombol di kanan --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-cafe-blue mb-0">
                            <i class="fas fa-wallet me-2"></i>Daftar Pengeluaran
                        </h5>
                        <button type="button" class="btn btn-light d-flex align-items-center gap-2 shadow-sm"
                            data-bs-toggle="modal" data-bs-target="#exampleModal" style="border-radius: 8px;">
                            <i class="fas fa-wallet"></i>
                            Tambah Pengeluaran
                        </button>
                    </div>

                    {{-- <a href="{{ route('expenditures.history') }}" class="btn btn-warning mb-3"><i class="fas fa-history"></i> Riwayat pengeluaran</a> --}}
                    <table id="example" class="table table-striped align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Tanggal <i class="fas fa-calendar-alt"></i></th>
                                <th>Deskripsi Pengeluaran <i class="fas fa-paragraph"></i></th>
                                <th>Nominal Pengeluaran <i class="fas fa-dollar-sign"></i></th>
                                <th>Aksi <i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $totalThisMonth = 0;
                                $lastMonth = null;
                                $number = 0;
                            @endphp

                            @foreach ($expenditures as $item)
                                @php
                                    $itemMonth = Carbon\Carbon::parse($item->date)->format('Y-m');
                                @endphp

                                @if ($itemMonth !== $lastMonth)
                                    @php
                                        $lastMonth = $itemMonth;
                                        $number = 1;
                                    @endphp
                                @else
                                    @php
                                        $number++;
                                    @endphp
                                @endif

                                @if (Carbon\Carbon::parse($item->date)->isCurrentMonth())
                                    @php
                                        $totalThisMonth += $item->nominal;
                                    @endphp
                                    <tr>
                                        <td>{{ $number }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>Rp. {{ number_format($item->nominal, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('expenditures.edit', $item->id_expenditure) }}"
                                                    class="btn btn-info btn-sm me-2">
                                                    <i class="fas fa-edit"></i> Ubah
                                                </a>
                                                <form id="deleteForm{{ $item->id_expenditure }}" class="d-inline"
                                                    action="{{ route('expenditures.delete', $item->id_expenditure) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="confirmDelete({{ $item->id_expenditure }})">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>

                        {{-- Total Bulan Ini --}}
                        @if ($totalThisMonth > 0)
                            <tfoot>
                                <tr class="table-light">
                                    <td colspan="3" class="text-center fw-bold">Total Pengeluaran Bulan Ini</td>
                                    <td colspan="2" class="fw-bold text-success">
                                        Rp. {{ number_format($totalThisMonth, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tfoot>
                        @else
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-center text-muted fst-italic">
                                        Tidak ada pengeluaran untuk bulan ini
                                    </td>
                                </tr>
                            </tfoot>
                        @endif
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
                            <i class="fas fa-wallet" style="color: darkblue"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" id="exampleModalLabel">Tambah Kategori
                                Baru</h5>
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
                            <label for="date" class="form-label fw-semibold">
                                <i class="fas fa-calendar-week me-1"></i>Tanggal Pengeluaran
                            </label>
                            <input type="date" id="date" class="form-control form-control-lg" wire:model="date"
                                required style="border: 2px solid rgba(25, 118, 210, 0.2); border-radius: 10px;">
                            @error('date')
                                <div class="text-danger mt-1 small">
                                    <i class="bi bi-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">
                                <i class="bi bi-textarea-resize me-1"></i>Deskripsi Pengeluaran
                            </label>
                            <textarea id="description" wire:model="description" class="form-control" rows="3"
                                placeholder="Masukkan deskripsi pengeluaran..."
                                style="border: 2px solid rgba(25, 118, 210, 0.2); border-radius: 10px; resize: vertical;"></textarea>
                            @error('description')
                                <div class="text-danger mt-1 small">
                                    <i class="bi bi-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nominal" class="form-label fw-semibold">
                                <i class="bi bi-cash-stack me-1"></i>Nominal Pengeluaran (Rp)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"
                                    style="border: 2px solid rgba(25, 118, 210, 0.2); border-right: none; border-radius: 10px 0 0 10px; background: rgba(25, 118, 210, 0.05);">Rp</span>
                                <input type="number" id="nominal" class="form-control form-control-lg"
                                    wire:model="nominal" required min="0" placeholder="0"
                                    style="border: 2px solid rgba(25, 118, 210, 0.2); border-left: none; border-radius: 0 10px 10px 0;">
                            </div>
                            @error('nominal')
                                <div class="text-danger mt-1 small">
                                    <i class="bi bi-exclamation-triangle me-1"></i>{{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-outline-secondary me-md-2" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-1"></i>Batal
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle me-1"></i>Simpan Pengeluaran
                            </button>
                        </div>
                    </form>
                </div>

                <div class="modal-footer bg-light border-0 text-muted small">
                    <i class="fas fa-info-circle me-1"></i>Pastikan nama kategori unik agar tidak
                    duplikat.
                </div>
            </div>
        </div>
    </div>
</div>
