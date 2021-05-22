<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $categories;

    public function mount()
    {
        $availableCategories = ModelsCategory::orderBy('name', 'asc')->get();
        $this->categories = $availableCategories;
    }


    public function render()
    {
        return view('livewire.category');
    }
}
