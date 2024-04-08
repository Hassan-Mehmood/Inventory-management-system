<?php

// app/Http/Livewire/SelectComponent.php

namespace App\Livewire\Tables;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Subcategory;
use App\Models\Category;

class SubCategorySelectComponent extends Component
{
	public $selectedCategory = null;

	public $product;
	public $selectedSubCategory;
	public function mount($product)
	{
		$this->product = $product;
		$this->selectedCategory = $product->category_id;
		$this->selectedSubCategory = $product->sub_category;

	}
	public function render()
	{
		$categories = Category::where("user_id", auth()->id())->get(['id', 'name']);
		// $product = Product::where('user_id', auth()->id())->get();
		/* for fetching subcategory recode */
		if (!$this->selectedCategory) {
			$this->selectedCategory = $categories[0]['id'];
		}

		// $sub_categories = SubCategory::all();

		return view('livewire.tables.subcategory-select-component', compact('categories'));
	}
}
