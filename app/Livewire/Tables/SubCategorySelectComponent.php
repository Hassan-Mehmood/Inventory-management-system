<?php

// app/Http/Livewire/SelectComponent.php

namespace App\Livewire\Tables;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Subcategory;
use App\Models\Category;

class SubCategorySelectComponent extends Component
{
    public $selectedCategory = null;
    public $selectedSubCategory;
    public function mount($product)
    {
        $this->selectedCategory = $product->category_id;
        $this->selectedSubCategory = $product->category_id;
    }
    public function render()
    {
        $categories = Category::where("user_id", auth()->id())->get(['id', 'name']);
        /* for fetching subcategory recode */
        if (!$this->selectedCategory) {
            $this->selectedCategory = $categories[0]['id'];
        }

        // $sub_categories = SubCategory::all();

        return view('livewire.tables.subcategory-select-component', compact('categories'));
    }
}
