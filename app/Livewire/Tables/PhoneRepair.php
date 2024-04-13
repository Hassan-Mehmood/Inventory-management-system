<?php

namespace App\Livewire\Tables;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class PhoneRepair extends Component
{
	use WithPagination;

	public $perPage = 105;
	public $selectedValue;
	public $search = '';

	public $sortField = 'products.id';

	public $sortAsc = false;

	public function sortBy($field): void
	{
		if ($this->sortField === $field) {
			$this->sortAsc = !$this->sortAsc;

		} else {
			$this->sortAsc = true;
		}

		$this->sortField = $field;
	}

	public function render()
	{

		// fetch phone repairs

		return view('livewire.tables.phone-repair');
	}
}
