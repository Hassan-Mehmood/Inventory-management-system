@extends('layouts.tabler')

<?php
$repair_parts = [
    'Battery' => 'Battery',
    'Back Cover' => 'Back Cover',
    'Screen' => 'Screen',
    'Camera' => 'Camera',
    'Others' => 'Others',
];

$status = [
    'Pending' => 'Pending',
    'In Progress' => 'In Progress',
    'Completed' => 'Completed',
];

?>

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Edit Product') }}
                    </h2>
                </div>
            </div>

            {{-- @include('partials._breadcrumbs', ['model' => $product]) --}}
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <form action="{{ route('products.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        {{ __('Product Image') }}
                                    </h3>

                                    <img class="img-account-profile mb-2" {{-- src="{{ $product->product_image ? asset('storage/' . $product->product_image) : asset('assets/img/products/default.webp') }}" --}} alt=""
                                        id="image-preview">

                                    <div class="small font-italic text-muted mb-2">
                                        JPG or PNG no larger than 2 MB
                                    </div>

                                    <input type="file" accept="image/*" id="image" name="product_image"
                                        class="form-control @error('product_image') is-invalid @enderror"
                                        onchange="previewImage();">

                                    @error('product_image')
                                        <div class="invalid-feedback">
                                            {{-- {{ $message }} --}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        {{ __('Product Details') }}
                                    </h3>

                                    <div class="row row-cards">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">
                                                    {{ __('Phone name') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text" id="phone_name" name="phone_name"
                                                    class="form-control @error('phone_name') is-invalid @enderror"
                                                    placeholder="Phone name" value="{{ old('phone_name') }}">

                                                @error('phone_name')
                                                    <div class="invalid-feedback">
                                                        {{-- {{ $message }} --}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="category_id" class="form-label">
                                                    Repair part
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <select name="repair_part_id" id="repair_part_id"
                                                    class="form-select @error('repair_part_id') is-invalid @enderror">
                                                    <option selected="" disabled="">Repair part</option>
                                                    @foreach ($repair_parts as $part)
                                                        <option value="{{ $part }}"
                                                            @if (old('repair_part_id', $part) == $part) selected="selected" @endif>
                                                            {{ $part }}</option>
                                                    @endforeach
                                                </select>

                                                @error('repair_part_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12 d-none" id="desc_field">
                                            <div class="mb-3 mb-0">
                                                <label for="description" class="form-label">
                                                    {{ __('Decription') }}
                                                </label>

                                                <textarea name="description" id="description" rows="5"
                                                    class="form-control @error('description') is-invalid @enderror" placeholder="Description...">{{ old('description') }}</textarea>

                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">
                                                    Status
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <select name="status" id="status"
                                                    class="form-select @error('status') is-invalid @enderror">
                                                    <option selected="" disabled="">Status</option>
                                                    @foreach ($status as $st)
                                                        <option value="{{ $st }}"
                                                            @if (old('status', $st) == $st) selected="selected" @endif>
                                                            {{ $st }}</option>
                                                    @endforeach
                                                </select>

                                                @error('status')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">
                                        {{ __('Update') }}
                                    </button>

                                    <a class="btn btn-danger" href="{{ url()->previous() }}">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@pushonce('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
    <script>
        const repairParts = document.querySelector('#repair_part_id');

        repairParts.addEventListener('change', function() {
            if (repairParts.value === 'Others') {
                document.querySelector('#desc_field').classList.remove('d-none');
            } else {
                document.querySelector('#desc_field').classList.add('d-none');
            }
        })
    </script>
@endpushonce
