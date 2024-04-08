<?php

namespace App\Livewire\Tables;

use App\Models\Product;
use Livewire\Component;
use App\Models\Subcategory;
use App\Models\Category;

class SubCategorySelectComponent extends Component
{
	public $category = null;
	public $categories = [];
	public $product = null;
	public $subCategory = null;
	public $subCategories = [];

	public function mount($categories, $product = null)
	{
		$this->categories = $categories;

		// if categories are available fetch subcategories for that particular category
		if ($categories) {
			$this->subCategories = Subcategory::where('category_id', $categories[0]['id'])->get();
		}

		// if product is passed as props that means it is beign called from edit page so fetch subcategory for that product category
		if ($product) {
			$this->subCategories = Subcategory::where('category_id', $product['category_id'])->get();
		}

		if ($categories && $product) {
			$this->category = Category::where('id', $product['category_id'])->firstOrFail()['id'];
		}


	}

	public function getSubCategories()
	{
		$this->subCategories = Subcategory::where('category_id', $this->category)->get();
	}

	public function render()
	{
		return view('livewire.tables.subcategory-select-component');
	}
}
