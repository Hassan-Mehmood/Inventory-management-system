<?php

namespace App\Models;

use App\Enums\TaxType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
	use HasFactory;

	protected $guarded = ['id'];

	// $table->string('product_description')->nullable()->default('');
	// 	$table->string('manufacturer')->default('');
	// 	$table->string('device')->default('');
	// 	$table->string('sku')->nullable()->default('');
	// 	$table->string('upc_code')->nullable()->default('');
	// 	$table->boolean('is_barcode')->default(false);
	// 	$table->string('valuation_method')->default('');
	// 	$table->string('new_stock_adjustment')->nullable()->default('');
	// 	$table->decimal('new_inventory_item_cost', 10, 2)->nullable();
	// 	$table->string('tax_class')->nullable()->default('');
	// 	$table->boolean('tax_inclusive')->default(false);
	// 	$table->decimal('retail_price', 10, 2)->default(0.00);
	// 	$table->decimal('cost_price', 10, 2)->default(0.00);
	// 	$table->decimal('sale_price', 10, 2)->default(0.00);
	// 	$table->decimal('minimum_price', 10, 2)->default(0.00);
	// 	$table->decimal('on_hand_quantity', 10, 2)->default(0.00);
	// 	$table->decimal('stock_warning', 10, 2)->default(0.00);
	// 	$table->decimal('re_order_level', 10, 2)->default(0.00);
	// 	$table->string('manage_serialized')->nullable()->default('');
	// 	$table->string('condition')->nullable()->default('');
	// 	$table->string('supplier')->nullable()->default('');
	// 	$table->string('physical_location')->nullable()->default('');
	// 	$table->decimal('warranty', 10, 2)->default(0.00);
	// 	$table->string('warranty_time_frame')->nullable()->default('');
	// 	$table->string('imei')->nullable()->default('');
	// 	$table->string('display_on_point_of_sale')->nullable()->default('');
	// 	$table->string('display_on_widget')->nullable()->default('');
	// 	$table->float('comission_percentage')->default(0.00);
	// 	$table->decimal('comission_amount', 10, 2)->default(0.00);

	public $fillable = [
		'name',
		'slug',
		'quantity_alert',
		'tax',
		'tax_type',
		'notes',
		'product_image',
		'category_id',
		'unit_id',
		'created_at',
		'updated_at',
		"user_id",
		"uuid"
	];

	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'tax_type' => TaxType::class
	];

	public function getRouteKeyName(): string
	{
		return 'slug';
	}

	public function category_id(): BelongsTo
	{
		return $this->belongsTo(Category::class);
	}

	public function unit(): BelongsTo
	{
		return $this->belongsTo(Unit::class);
	}

	protected function buyingPrice(): Attribute
	{
		return Attribute::make(
			get: fn($value) => $value / 100,
			set: fn($value) => $value * 100,
		);
	}

	protected function sellingPrice(): Attribute
	{
		return Attribute::make(
			get: fn($value) => $value / 100,
			set: fn($value) => $value * 100,
		);
	}

	public function scopeSearch($query, $value): void
	{
		$query->where('name', 'like', "%{$value}%")
			->orWhere('category_id', 'like', "%{$value}%");
	}
	/**
	 * Get the user that owns the Category
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
