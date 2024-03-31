<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
	public function index()
	{
		$subcategories = SubCategory::all("id", "sub_category_name");

		return view('subcategories.index', [
			'subcategories' => $subcategories,
		]);
	}

	public function create()
	{
		$categories = Category::all("id", "name");
		return view('subcategories.create', [
			'categories' => $categories
		]);
	}

	public function store(Request $request)
	{
		SubCategory::create([
			"sub_category_name" => $request->name,
			"category_id" => $request->categories
		]);

		return redirect()
			->route('subcategories.index')
			->with('success', 'Category has been created!');
	}

	// public function show(Category $category)
	// {
	// 	return view('categories.show', [
	// 		'category' => $category
	// 	]);
	// }

	// public function edit(Category $category)
	// {
	// 	return view('categories.edit', [
	// 		'category' => $category
	// 	]);
	// }

	// public function update(UpdateCategoryRequest $request, Category $category)
	// {
	// 	$category->update([
	// 		"name" => $request->name,
	// 		"slug" => Str::slug($request->name)
	// 	]);

	// 	return redirect()
	// 		->route('categories.index')
	// 		->with('success', 'Category has been updated!');
	// }

	// public function destroy(Category $category)
	// {
	// 	$category->delete();

	// 	return redirect()
	// 		->route('categories.index')
	// 		->with('success', 'Category has been deleted!');
	// }
}
