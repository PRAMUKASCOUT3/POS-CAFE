<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $id_category, $name, $brand, $stock, $price_buy, $price_sell, $unit;
    public $code; // Auto-generated product code
    public $image; // ✅ Tambahan untuk upload gambar

    // Rules untuk validasi
    protected $rules = [
        'id_category' => 'required',
        'name' => 'required|string|max:30',
        'brand' => 'required|string|max:30',
        'stock' => 'required|string|max:5',
        'price_buy' => 'required|numeric',
        'price_sell' => 'required|numeric',
        'unit' => 'required|string|max:20',
        'image' => 'nullable|image|max:2048', // ✅ validasi gambar (maks 2MB)
    ];

    public function mount()
    {
        $this->code = 'BR' . str_pad(Product::max('id_product') + 1, 4, '0', STR_PAD_LEFT);
    }

    public function save()
    {
        $validatedData = $this->validate();

        // ✅ Simpan gambar jika diunggah
        $imagePath = null;
        if ($this->image) {
            $imageName = 'product_' . time() . '.' . $this->image->extension();
            $imagePath = $this->image->storeAs('products', $imageName, 'public');
        }

        Product::create([
            'code' => $this->code,
            'id_category' => $this->id_category,
            'name' => $this->name,
            'brand' => $this->brand,
            'stock' => $this->stock,
            'price_buy' => $this->price_buy,
            'price_sell' => $this->price_sell,
            'unit' => $this->unit,
            'image' => $imagePath, // ✅ Simpan path gambar
        ]);

        toastr()->success('Data Berhasil Ditambahkan!');

        // Reset input
        $this->reset(['id_category', 'name', 'brand', 'stock', 'price_buy', 'price_sell', 'unit', 'image']);

        // Regenerate kode baru
        $this->code = 'BR' . str_pad(Product::max('id_product') + 1, 4, '0', STR_PAD_LEFT);

        return redirect()->route('product.index');
    }

    public function render()
    {
        return view('livewire.product.product-create', [
            'category' => Category::all()
        ]);
    }
}
