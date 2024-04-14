<?php

namespace App\Livewire\Tables;

use Livewire\Component;
use \App\Models\PhoneRepair;
use Livewire\WithPagination;


class PhoneRepairTable extends Component
{
	use WithPagination;

	public $perPage = 5;
	public $selectedValue;
	public $search = '';

	public $sortField = 'phone_name';

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
		$phone_repairs = PhoneRepair::where("user_id", auth()->id())
			->search($this->search)
			->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
			->paginate($this->perPage);

		// dd($phoneRepairs);
		return view('livewire.tables.phone-repair-table', compact('phone_repairs'));
	}
}
