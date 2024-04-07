<div>
    <div class="row">
        <div class="col-sm-6 col-md-6 mb-3">
            <label for="category" class="form-label">
                Categories
            </label>
            <select wire:model.live="selectedCategory" wire:change="getSubCategories" name="category" id="category"
                class="form-select">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-6 col-md-6 mb-3">
            <label for="bar_code" class="form-label">
                Sub Categories
            </label>
            <select wire:model="selectedSubCategory" name="categories" id="categories" class="form-select">
                @forelse ($subCategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}</option>
                @empty
                    <option value="">Select a sub category</option>
                @endforelse
            </select>
        </div>

    </div>
</div>
