<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create("phone_repairs", function (Blueprint $table) {
			$table->increments("id");
			$table->foreignId("user_id")->constrained()->onDelete('cascade');
			$table->string("phone_name");
			$table->string("repair_parts");
			$table->string("description")->nullable();
			$table->string("status")->default("pending");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists("phone_repairs");
	}
};
