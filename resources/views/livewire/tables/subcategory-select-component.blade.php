<div>
    <div class="row">
        <div class="col-sm-6 col-md-6 mb-3">
            <label for="category" class="form-label">
                Categories
            </label>
            <select wire:model.live="category" wire:change="getSubCategories" name="category" id="category"
                class="form-select">
                @forelse ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $category === $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @empty
                    <option value="">Select a category</option>
                @endforelse
            </select>
        </div>
        <div class="col-sm-6 col-md-6 mb-3">
            <label for="sub_category" class="form-label">
                Sub Categories
            </label>
            <select wire:model.live="subCategory" name="sub_category" id="sub_category" class="form-select">
                @forelse ($subCategories as $subcategory)
                    <option value="{{ $subcategory->id }}">
                        {{ $subcategory->sub_category_name }}
                    </option>
                @empty
                    <option value="" selected>Select a sub category</option>
                @endforelse
            </select>
        </div>
    </div>
</div>
