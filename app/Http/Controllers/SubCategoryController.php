<?php

namespace App\Http\Controllers;

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
		return view('subcategories.create');
	}

	// public function store(StoreCategoryRequest $request)
	// {
	// 	Category::create([
	// 		"user_id" => auth()->id(),
	// 		"name" => $request->name,
	// 		"slug" => Str::slug($request->name)
	// 	]);

	// 	return redirect()
	// 		->route('categories.index')
	// 		->with('success', 'Category has been created!');
	// }

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
