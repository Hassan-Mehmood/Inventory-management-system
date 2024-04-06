<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                {{ __('Products') }}
            </h3>
        </div>

        <div class="card-actions btn-group">
            <div class="dropdown">
                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <x-icon.vertical-dots />
                </a>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <a href="{{ route('products.create') }}" class="dropdown-item">
                        <x-icon.plus />
                        {{ __('Create Product') }}
                    </a>
                    <a href="{{ route('products.import.view') }}" class="dropdown-item">
                        <x-icon.plus />
                        {{ __('Import Products') }}
                    </a>
                    <a href="{{ route('products.export.store') }}" class="dropdown-item">
                        <x-icon.plus />
                        {{ __('Export Products') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-secondary">
                Show
                <div class="mx-2 d-inline-block">
                    <select wire:model.live="perPage" class="form-select form-select-sm" aria-label="result per page">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                    </select>
                </div>
                entries
            </div>
            <div class="ms-auto text-secondary">
                Search:
                <div class="ms-2 d-inline-block">
                    <input type="text" wire:model.live="search" class="form-control form-control-sm"
                        aria-label="Search invoice">
                </div>
            </div>
        </div>
    </div>

    <x-spinner.loading-spinner />

    <div class="table-responsive">
        <table wire:loading.remove class="table table-bordered card-table table-vcenter text-nowrap datatable">
            <thead class="thead-light">
                <tr>
                    <th class="align-middle text-center w-1">
                        {{ __('No.') }}
                    </th>
                    <th scope="col" class="align-middle text-center">
                        {{ __('Image') }}
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('name')" href="#" role="button">
                            {{ __('Name') }}
                            @include('inclues._sort-icon', ['field' => 'name'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('description')" href="#" role="button">
                            {{ __('Description') }}
                            @include('inclues._sort-icon', ['field' => 'description'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('manufacturer')" href="#" role="button">
                            {{ __('Manufacturer') }}
                            @include('inclues._sort-icon', ['field' => 'manufacturer'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('device')" href="#" role="button">
                            {{ __('Device') }}
                            @include('inclues._sort-icon', ['field' => 'device'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('sku')" href="#" role="button">
                            {{ __('SKU') }}
                            @include('inclues._sort-icon', ['field' => 'sku'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('upc_code')" href="#" role="button">
                            {{ __('UPC Code') }}
                            @include('inclues._sort-icon', ['field' => 'upc_code'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('is_barcode')" href="#" role="button">
                            {{ __('Is barcode') }}
                            @include('inclues._sort-icon', ['field' => 'is_barcode'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('valuation_method')" href="#" role="button">
                            {{ __('Valuation method') }}
                            @include('inclues._sort-icon', ['field' => 'valuation_method'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('new_stock_adjustment')" href="#" role="button">
                            {{ __('New stock adjustment') }}
                            @include('inclues._sort-icon', ['field' => 'new_stock_adjustment'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('new_inventory_item_cost')" href="#" role="button">
                            {{ __('New inventory item cost') }}
                            @include('inclues._sort-icon', ['field' => 'new_inventory_item_cost'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('tax_class')" href="#" role="button">
                            {{ __('Tax inclusive') }}
                            @include('inclues._sort-icon', ['field' => 'tax_class'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('tax_inclusive')" href="#" role="button">
                            {{ __('Tax inclusive') }}
                            @include('inclues._sort-icon', ['field' => 'tax_inclusive'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('retail_price')" href="#" role="button">
                            {{ __('Retail price') }}
                            @include('inclues._sort-icon', ['field' => 'retail_price'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('cost_price')" href="#" role="button">
                            {{ __('Cost price') }}
                            @include('inclues._sort-icon', ['field' => 'cost_price'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('sale_price')" href="#" role="button">
                            {{ __('Sale price') }}
                            @include('inclues._sort-icon', ['field' => 'sale_price'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('minimum_price')" href="#" role="button">
                            {{ __('Minimum price') }}
                            @include('inclues._sort-icon', ['field' => 'minimum_price'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('on_hand_quantity')" href="#" role="button">
                            {{ __('On hand quantity') }}
                            @include('inclues._sort-icon', ['field' => 'on_hand_quantity'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('stock_warning')" href="#" role="button">
                            {{ __('Stock warning') }}
                            @include('inclues._sort-icon', ['field' => 'stock_warning'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('re_order_level')" href="#" role="button">
                            {{ __('Re order level') }}
                            @include('inclues._sort-icon', ['field' => 're_order_level'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('manage_serialized')" href="#" role="button">
                            {{ __('Manage serialized') }}
                            @include('inclues._sort-icon', ['field' => 'manage_serialized'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('condition')" href="#" role="button">
                            {{ __('Condition') }}
                            @include('inclues._sort-icon', ['field' => 'condition'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('supplier')" href="#" role="button">
                            {{ __('Supplier') }}
                            @include('inclues._sort-icon', ['field' => 'supplier'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('physical_location')" href="#" role="button">
                            {{ __('Physical location') }}
                            @include('inclues._sort-icon', ['field' => 'physical_location'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('warranty')" href="#" role="button">
                            {{ __('Warranty') }}
                            @include('inclues._sort-icon', ['field' => 'warranty'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('warranty_time_frame')" href="#" role="button">
                            {{ __('Warranty time frame') }}
                            @include('inclues._sort-icon', ['field' => 'warranty_time_frame'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('imei')" href="#" role="button">
                            {{ __('IMEI') }}
                            @include('inclues._sort-icon', ['field' => 'imei'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('display_on_point_of_sale')" href="#" role="button">
                            {{ __('Display on point of sale') }}
                            @include('inclues._sort-icon', ['field' => 'display_on_point_of_sale'])
                        </a>
                    </th>

                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('display_on_widget')" href="#" role="button">
                            {{ __('Display on widget') }}
                            @include('inclues._sort-icon', ['field' => 'display_on_widget'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('comission_percentage')" href="#" role="button">
                            {{ __('Comission percentage') }}
                            @include('inclues._sort-icon', ['field' => 'comission_percentage'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('comission_amount')" href="#" role="button">
                            {{ __('Comission amoutn') }}
                            @include('inclues._sort-icon', ['field' => 'comission_amount'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        {{ __('Action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="align-middle text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="align-middle text-center">
                            <img style="width: 90px;"
                                src="{{ $product->product_image ? asset('storage/' . $product->product_image) : asset('assets/img/products/default.webp') }}"
                                alt="">
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->name }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->product_description }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->manufacturer }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->device }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->sku }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->upc_code }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->is_barcode }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->valuation_method }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->new_stock_adjustment }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->new_inventory_item_cost }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->tax_class }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->tax_inclusive }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->retail_price }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->cost_price }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->sale_price }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->minimum_price }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->on_hand_quantity }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->stock_warning }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->re_order_level }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->manage_serialized }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->condition }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->supplier }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->physical_location }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->warranty }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->warranty_time_frame }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->imei }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->display_on_point_of_sale }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->display_on_widget }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->comission_percentage }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->comission_amount }}
                        </td>
                        <td class="align-middle text-center" style="width: 10%">
                            <x-button.show class="btn-icon" route="{{ route('products.show', $product->uuid) }}" />
                            <x-button.edit class="btn-icon" route="{{ route('products.edit', $product->uuid) }}" />
                            <x-button.delete class="btn-icon" route="{{ route('products.destroy', $product->uuid) }}"
                                onclick="return confirm('Are you sure to delete product {{ $product->name }} ?')" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="align-middle text-center" colspan="37">No results found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-secondary">
            {{-- Showing <span>{{ $products->firstItem() }}</span> --}}
            {{-- to <span>{{ $products->lastItem() }}</span> of <span>{{ $products->total() }}</span> entries --}}
        </p>

        <ul class="pagination m-0 ms-auto">
            {{-- {{ $products->links() }} --}}
        </ul>
    </div>
</div>
