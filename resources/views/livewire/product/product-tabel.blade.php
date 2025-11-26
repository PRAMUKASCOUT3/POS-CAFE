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
                            <i class="fas fa-coffee me-2" style="font-size: 1.2rem;"></i>Data Produk Cafe
                            <i class="fas fa-boxes ms-2" style="font-size: 0.9rem;"></i>
                        </h5>
                        <p class="text-white-50 mb-0" style="font-size: 0.8rem;">
                            <i class="fas fa-info-circle me-1"></i>Kelola produk dan inventaris sistem POS Cafe
                        </p>
                    </div>
                    <a href="{{ route('product.create') }}" class="btn btn-light shadow-sm"
                        style="border-radius: 12px; font-weight: 500; transition: all 0.3s ease; padding: 0.5rem 1rem; font-size: 0.9rem;">
                        <i class="fas fa-plus-circle me-1"></i>Tambah Produk
                    </a>
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
                                    <i class="fas fa-image me-1"></i>Gambar
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-id-badge me-1"></i>Kode Produk
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-folder me-1"></i>Kategori
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-box me-1"></i>Nama Produk
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-tag me-1"></i>Merk
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-cubes me-1"></i>Stok
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-money-bill-wave me-1"></i>Harga Modal
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-hand-holding-usd me-1"></i>Harga Jual
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-weight me-1"></i>Satuan
                                </th>
                                <th class="border-0 py-2 px-3" style="font-weight: 500; font-size: 0.8rem;">
                                    <i class="fas fa-cogs me-1"></i>Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody style="background: rgba(255, 255, 255, 0.8); font-size: 0.85rem;">
                            @foreach ($products as $index => $item)
                                <tr style="transition: all 0.3s ease; border-bottom: 1px solid rgba(25, 118, 210, 0.08);"
                                    class="cafe-table-row">
                                    <!-- No -->
                                    <td class="py-2 px-3" style="font-weight: 400; color: #1976d2;">
                                        <span class="badge"
                                            style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.1), rgba(66, 165, 245, 0.1)); color: #1976d2; border-radius: 15px; padding: 0.3rem 0.8rem; font-weight: 500; font-size: 0.75rem;">
                                            {{ $index + 1 }}
                                        </span>
                                    </td>

                                    <!-- ✅ Gambar Produk -->
                                    <td class="py-2 px-3 text-center">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="Foto Produk"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px; border: 1px solid rgba(25, 118, 210, 0.2); box-shadow: 0 2px 6px rgba(25, 118, 210, 0.1);">
                                        @else
                                            <div
                                                style="width: 50px; height: 50px; background: rgba(25,118,210,0.05); display: flex; align-items: center; justify-content: center; border-radius: 8px; border: 1px dashed rgba(25,118,210,0.2); color: #1976d2;">
                                                <i class="fas fa-image" style="font-size: 1rem;"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <!-- Kode Produk -->
                                    <td class="py-2 px-3" style="font-weight: 500; color: #424242;">
                                        <i class="fas fa-id-card me-1" style="color: #1976d2; font-size: 0.8rem;"></i>
                                        <span
                                            style="font-family: 'Courier New', monospace; background: rgba(25, 118, 210, 0.05); padding: 0.2rem 0.4rem; border-radius: 4px; font-size: 0.8rem;">
                                            {{ $item->code }}
                                        </span>
                                    </td>

                                    <!-- Kategori -->
                                    <td class="py-2 px-3" style="font-weight: 500; color: #424242;">
                                        <i class="fas fa-folder me-1" style="color: #1976d2; font-size: 0.8rem;"></i>
                                        <span
                                            style="background: rgba(66, 165, 245, 0.1); color: #1976d2; padding: 0.2rem 0.6rem; border-radius: 12px; font-size: 0.75rem; font-weight: 500;">
                                            {{ $item->category->name }}
                                        </span>
                                    </td>

                                    <!-- Nama Produk -->
                                    <td class="py-2 px-3" style="font-weight: 600; color: #1976d2; font-size: 0.85rem;">
                                        <i class="fas fa-box me-1" style="color: #1976d2;"></i>
                                        {{ $item->name }}
                                    </td>

                                    <!-- Merk -->
                                    <td class="py-2 px-3" style="font-weight: 500; color: #666;">
                                        <i class="fas fa-tag me-1" style="color: #1976d2; font-size: 0.8rem;"></i>
                                        {{ $item->brand }}
                                    </td>

                                    <!-- Stok -->
                                    <td class="py-2 px-3" style="font-weight: 500; color: #424242;">
                                        @if ($item->stock == 0)
                                            <span class="badge"
                                                style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.8), rgba(239, 83, 80, 0.8)); color: white; border-radius: 15px; padding: 0.3rem 0.8rem; font-size: 0.7rem; font-weight: 600;">
                                                <i class="fas fa-exclamation-triangle me-1"></i>Habis
                                            </span>
                                        @elseif ($item->stock <= 5)
                                            <span class="badge"
                                                style="background: linear-gradient(135deg, rgba(255, 152, 0, 0.8), rgba(255, 193, 7, 0.8)); color: white; border-radius: 15px; padding: 0.3rem 0.8rem; font-size: 0.7rem; font-weight: 600;">
                                                <i class="fas fa-minus-circle me-1"></i>{{ $item->stock }}
                                            </span>
                                        @else
                                            <span class="badge"
                                                style="background: linear-gradient(135deg, rgba(76, 175, 80, 0.8), rgba(102, 187, 106, 0.8)); color: white; border-radius: 15px; padding: 0.3rem 0.8rem; font-size: 0.7rem; font-weight: 600;">
                                                <i class="fas fa-check-circle me-1"></i>{{ $item->stock }}
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Harga Beli -->
                                    <td class="py-2 px-3"
                                        style="font-weight: 600; color: #d32f2f; font-size: 0.8rem;">
                                        <i class="fas fa-money-bill-wave me-1" style="color: #d32f2f;"></i>
                                        Rp{{ number_format($item->price_buy) }}
                                    </td>

                                    <!-- Harga Jual -->
                                    <td class="py-2 px-3"
                                        style="font-weight: 600; color: #2e7d32; font-size: 0.8rem;">
                                        <i class="fas fa-hand-holding-usd me-1" style="color: #2e7d32;"></i>
                                        Rp{{ number_format($item->price_sell) }}
                                    </td>

                                    <!-- Satuan -->
                                    <td class="py-2 px-3" style="font-weight: 500; color: #666;">
                                        <i class="fas fa-weight me-1" style="color: #1976d2; font-size: 0.8rem;"></i>
                                        {{ $item->unit }}
                                    </td>

                                    <!-- Aksi -->
                                    <td class="py-2 px-3">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('product.edit', $item->id_product) }}"
                                                class="btn btn-outline-primary btn-sm"
                                                style="border-radius: 20px; padding: 0.3rem 0.8rem; font-weight: 500; transition: all 0.3s ease; border: 1px solid rgba(25, 118, 210, 0.3); font-size: 0.75rem;">
                                                <i class="fas fa-edit me-1"></i>Ubah
                                            </a>
                                            <form id="deleteForm{{ $item->id_product }}" class="d-inline"
                                                action="{{ route('product.delete', $item->id_product) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    onclick="confirmDelete({{ $item->id_product }})"
                                                    style="border-radius: 20px; padding: 0.3rem 0.8rem; font-weight: 500; transition: all 0.3s ease; border: 1px solid rgba(244, 67, 54, 0.3); font-size: 0.75rem;">
                                                    <i class="fas fa-trash me-1"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        <!-- Baris total tetap -->
                        @php
                            $total_buy = 0;
                            $total_sell = 0;
                            foreach ($products as $product) {
                                $total_buy += $product->stock * $product->price_buy;
                                $total_sell += $product->stock * $product->price_sell;
                            }
                        @endphp
                        <tr
                            style="background: linear-gradient(135deg, rgba(25, 118, 210, 0.05), rgba(66, 165, 245, 0.05)); border-top: 2px solid rgba(25, 118, 210, 0.2);">
                            <td colspan="7" class="py-3 px-3"
                                style="font-weight: 700; color: #1976d2; font-size: 0.9rem;">
                                <i class="fas fa-calculator me-2" style="color: #1976d2;"></i>Total Keseluruhan
                            </td>
                            <td class="py-3 px-3" style="font-weight: 700; color: #d32f2f; font-size: 0.9rem;">
                                <i class="fas fa-money-bill-wave me-1"></i>Rp{{ number_format($total_buy) }}
                            </td>
                            <td class="py-3 px-3" style="font-weight: 700; color: #2e7d32; font-size: 0.9rem;">
                                <i class="fas fa-hand-holding-usd me-1"></i>Rp{{ number_format($total_sell) }}
                            </td>
                            <td colspan="2" class="py-3 px-3"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
