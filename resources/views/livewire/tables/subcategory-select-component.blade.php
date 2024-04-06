<div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-sm-6 col-md-6 mb-3">
                <label for="category" class="form-label">
                    Categories
                </label>
                <select wire:model.live="selectedCategory" name="category" id="category" class="form-select">
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
                    <option value="">Select a sub category</option>
                    @if ($selectedCategory)
                        @foreach (\App\Models\Subcategory::where('category_id', $selectedCategory)->get() as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

        </div>
        {{-- <div class="col-sm-6 col-md-6">
            <div class="mb-3">
                <label for="category_id" class="form-label">
                    Product category
                    <span class="text-danger">*</span>
                </label>

                <select name="category_id" id="category_id"
                    class="form-select @error('category_id') is-invalid @enderror">
                    <option selected="" disabled="">Select a category:</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if (old('category_id', $selectedCategory) == $category->id) selected="selected" @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>

                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div> --}}

    </div>
</div>
