<?php
function isEven($number)
{
    return $number % 2 == 0;
}

?>

<div>

    <div class="table-responsive">
        <table wire:loading.remove class="table table-bordered card-table table-vcenter text-nowrap datatable">
            <thead class="thead-light">
                <tr>
                    <th class="align-middle text-center w-1">
                        {{ __('No.') }}
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('invoice_no')" href="#" role="button">
                            {{ __('Phone Name') }}
                            {{-- @include('inclues._sort-icon', ['field' => 'invoice_no']) --}}
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('customer_id')" href="#" role="button">
                            {{ __('Repair parts') }}
                            {{-- @include('inclues._sort-icon', ['field' => 'customer_id']) --}}
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('order_date')" href="#" role="button">
                            {{ __('Description') }}
                            {{-- @include('inclues._sort-icon', ['field' => 'order_date']) --}}
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('payment_type')" href="#" role="button">
                            {{ __('Status') }}
                            {{-- @include('inclues._sort-icon', ['field' => 'payment_type']) --}}
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        {{ __('Action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse () --}}
                @for ($i = 0; $i < 10; $i++)
                    <tr>
                        <td class="align-middle text-center">
                            {{ ++$i }}
                        </td>
                        <td class="align-middle text-center">
                            {{-- {{ $order->invoice_no }} --}}
                            Dummy data
                        </td>
                        <td class="align-middle text-center">
                            {{-- {{ $order->customer->name }} --}}
                            Dummy data

                        </td>
                        <td class="align-middle text-center">
                            {{-- {{ $order->order_date->format('d-m-Y') }} --}}
                            Dummy data
                        </td>
                        <td class="align-middle text-center">
                            <x-status {{-- color="{{ $order->order_status === \App\Enums\OrderStatus::COMPLETE ? 'green' : ($order->order_status === \App\Enums\OrderStatus::PENDING ? 'orange' : '') }}" --}} color="{{ isEven($i) ? 'green' : 'orange' }}"
                                class="text-uppercase">
                                {{-- {{ $order->order_status->label() }} --}}
                                {{ isEven($i) ? 'Complete' : 'Pending' }}
                            </x-status>
                        </td>
                        <td class="align-middle text-center">
                            <x-button.show class="btn-icon" route="{{ route('repair-phpne.show', 1) }}" />
                            @if (true)
                                <x-button.delete class="btn-icon" route="{{ route('orders.cancel', 1) }}"
                                    onclick="return confirm('Are you sure to cancel invoice no. 1 ?')" />
                            @endif
                        </td>
                    </tr>
                @endfor
                {{-- @empty
                    <tr>
                        <td class="align-middle text-center" colspan="8">
                            No results found
                        </td>
                    </tr>
                @endforelse --}}
            </tbody>
        </table>
    </div>

</div>
