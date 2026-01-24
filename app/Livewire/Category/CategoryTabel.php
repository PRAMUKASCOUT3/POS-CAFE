<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryTabel extends Component
{
    public $categories, $name;
    protected $listeners = ['DeleteUser' => 'render'];

    public function mount()
    {
        $this->categories = Category::orderBy('created_at','desc')->get();
    }
     public function save()
    {
        $this->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $this->name,
        ]);

        toastr()->success('Data Berhasil Ditambahkan');

        $this->reset(['name']);

        redirect()->route('category.index');
    }
    public function render()
    {
        return view('livewire.category.category-tabel',[
            'categories' => $this->categories,
        ]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        toastr()->success('Data Berhasil Dihapus!');

        $this->dispatch('DeleteUser');
    }
}
