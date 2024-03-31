<?php

namespace App\Http\Requests\Product;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StoreProductRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'product_image' => 'image|file|max:2048',
			'name' => 'required|string',
			'category' => 'required|string',
			'sub_category' => 'string',
			'description' => 'required|string',
			'manufacturer' => 'required|string',
			'device' => 'required|string',
			'sku' => 'required|string',
			'upc_code' => 'required|string',
			'bar_code' => 'required|string',
			'valuation_method' => 'required|string',
			'new_stock_adjustment' => 'required|string',
			'new_inventory_item_cost' => 'required|string',
			'tax_class' => 'required|string',
			'tax_inclusive' => 'required|string',
			'retail_price' => 'required|string',
			'cost_price' => 'required|integer',
			'sale_price' => 'required|integer',
			'minimum_price' => 'required|integer',
			'on_hand_quantity' => 'required|integer',
			'stock_warning' => 'required|integer',
			'reorder_level' => 'required|integer',
			'manage_serialized' => 'required|string',
			'condition' => 'required|string',
			'supplier' => 'required|string',
			'physical_location' => 'required|integer',
			'warranty' => 'required|integer',
			'warranty_time_frame' => 'required|string',
			'imei' => 'required|integer',
			'display_pos' => 'required|string',
			'display_widget' => 'required|string',
			'comission_percentage' => 'nullable|numeric',
			'comission_amount' => 'nullable|numeric'
		];
	}

	// protected function prepareForValidation(): void
	// {
	//     $this->merge([
	//         'slug' => Str::slug($this->name, '-'),
	//         'code' =>
	//     ]);
	// }
}
