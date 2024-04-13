@extends('layouts.tabler')

<?php
$repair_parts = [
    'Battery' => 'Battery',
    'Back Cover' => 'Back Cover',
    'Screen' => 'Screen',
    'Camera' => 'Camera',
    'Others' => 'Others',
]; ?>

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <x-alert />

            <div class="row row-cards">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        {{ __('Phone Image') }}
                                    </h3>

                                    <img class="img-account-profile mb-2"
                                        src="{{ asset('assets/img/products/default.webp') }}" alt=""
                                        id="image-preview" />

                                    <div class="small font-italic text-muted mb-2">
                                        JPG or PNG no larger than 2 MB
                                    </div>

                                    <input type="file" accept="image/*" id="image" name="product_image"
                                        class="form-control @error('product_image') is-invalid @enderror"
                                        onchange="previewImage();">

                                    @error('product_image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <h3 class="card-title">
                                            {{ __('Repair phone') }}
                                        </h3>
                                    </div>

                                    <div class="card-actions">
                                        <a href="{{ route('phone-repair.index') }}" class="btn-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M18 6l-12 12"></path>
                                                <path d="M6 6l12 12"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cards">
                                        <div class="col-md-12">
                                            <x-input name="Phone name" id="name" placeholder="Phone name"
                                                value="{{ old('name') }}" />
                                        </div>

                                        <div class="col-sm-6 col-md-12">
                                            <label for="select_repair_part" class="form-label required">
                                                {{ __('Repair part') }}
                                            </label>

                                            <select name="repair_part" id="select_repair_part"
                                                class="form-control form-select">
                                                @foreach ($repair_parts as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-6 col-md-12 d-none" id="desc_field">
                                            <x-input name="Write a description" id="desc_name"
                                                placeholder="Write a description" value="{{ old('desc_name') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <x-button.save type="submit">
                                        {{ __('Save') }}
                                    </x-button.save>

                                    <a class="btn btn-warning" href="{{ url()->previous() }}">
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
        const select_repair_part = document.querySelector('#select_repair_part');

        select_repair_part.addEventListener('change', function() {
            if (select_repair_part.value === 'Others') {
                document.querySelector('#desc_field').classList.remove('d-none');
            } else {
                document.querySelector('#desc_field').classList.add('d-none');
            }
        });
    </script>
@endpushonce
