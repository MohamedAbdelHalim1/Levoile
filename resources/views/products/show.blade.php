@extends('layouts.app')

@section('styles')
    <style>
        .product-image {
            max-width: 300px;
            height: auto;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .arrow {
            display: flex;
            align-items: center;
        }

        .arrow svg {
            margin-right: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="p-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                <div>
                    <div class="row align-items-center">
                        <!-- Product Image -->
                        <div class="col-md-6 text-center">
                            @if ($product->photo)
                                <img src="{{ asset($product->photo) }}" alt="Product Image" class="img-fluid rounded shadow"
                                    style="max-width: 350px; height: auto;">
                            @else
                                <p class="text-muted"><i>{{ __('messages.N/A') }}</i></p>
                            @endif
                        </div>
                    
                        <!-- Product Details -->
                        <div class="col-md-6">
                            <h3 class="mb-4 text-center">{{ __('messages.product_details') }}</h3>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th class="text-end">{{ __('messages.description') }}:</th>
                                            <td style="font-weight: bold;">{{ $product->description }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-end">{{ __('messages.code') }}:</th>
                                            <td style="font-weight: bold;">{{ $product->code ?? 'لا يوجد' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-end">{{ __('messages.category') }}:</th>
                                            <td style="font-weight: bold;">{{ $product->category->name ?? 'لا يوجد' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-end">{{ __('messages.season') }}:</th>
                                            <td style="font-weight: bold;">{{ $product->season->name ?? 'لا يوجد' }}</td>
                                        </tr>
                         
                                        <tr>
                                            <th class="text-end">{{ __('messages.stock_status') }}:</th>
                                            <td style="font-weight: bold;">
                                                {{ $product->have_stock ? __('messages.available') : __('messages.not_available') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-end">الحالة:</th>
                                            <td style="font-weight: bold;">
                                                <span class="badge 
                                                    @if ($product->status === 'new') bg-primary 
                                                    @elseif ($product->status === 'complete') bg-success 
                                                    @elseif ($product->status === 'partial') bg-warning 
                                                    @elseif ($product->status === 'pending') bg-info
                                                    @elseif ($product->status === 'processing') bg-info
                                                    @elseif ($product->status === 'cancel') bg-danger
                                                    @elseif ($product->status === 'stop') bg-danger
                                                    @elseif ($product->status === 'postponed') bg-info
                                                    @else bg-secondary @endif">
                                                @if ($product->status === 'new') {{ __('messages.new') }} 
                                                @elseif ($product->status === 'complete') {{ __('messages.complete') }} 
                                                @elseif ($product->status === 'partial') {{ __('messages.partial') }} 
                                                @elseif ($product->status === 'pending') {{ __('messages.pending') }}
                                                @elseif ($product->status === 'processing') {{ __('messages.processing') }} 
                                                @elseif ($product->status === 'cancel') {{ __('messages.cancel') }}
                                                @elseif ($product->status === 'stop') {{ __('messages.stop') }}
                                                @elseif ($product->status === 'postponed') {{ __('messages.postponed') }}
                                                @else {{ __('messages.N/A') }} @endif
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <hr>

                    <h2>{{ __('messages.colors') }}</h2>
                    @if ($product->productColors->isEmpty())
                        <p>{{ __('messages.no_colors') }}</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ __('messages.color') }}</th>
                                        <th>{{ __('messages.expected_delivery_date') }}</th>
                                        <th>{{ __('messages.quantity') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.notes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productColors as $productColor)
                                        @foreach ($productColor->productcolorvariants->where('parent_id', null) as $variant)
                                            <tr>
                                                <td>{{ $productColor->color->name ?? '-' }}</td>
                                                <td>{{ $variant->expected_delivery ?? '-' }}</td>
                                                <td>{{ $variant->quantity ?? '-' }}</td>
                                                <td>
                                                    @switch($variant->status)
                                                        @case('new')
                                                            {{ __('messages.new') }}
                                                        @break

                                                        @case('processing')
                                                            {{ __('messages.processing') }}
                                                        @break

                                                        @case('postponed')
                                                            {{ __('messages.postponed') }}
                                                        @break

                                                        @case('partial')
                                                            {{ __('messages.partial') }}
                                                        @break

                                                        @case('complete')
                                                            {{ __('messages.complete') }}
                                                        @break

                                                        @case('cancel')
                                                            {{ __('messages.cancel') }}
                                                        @break

                                                        @case('stop')
                                                            {{ __('messages.stop') }}
                                                        @break

                                                        @default
                                                            {{ __('messages.unknown') }}
                                                    @endswitch
                                                </td>
                                                <td>{{ $variant->note ?? '-' }}</td>
                                            </tr>
                                            @if ($variant->children && $variant->children->isNotEmpty())
                                                @foreach ($variant->children as $child)
                                                    <tr>
                                                        <td class="arrow">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-arrow-right"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M10.146 4.146a.5.5 0 0 1 .708.708L7.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5z" />
                                                            </svg>
                                                            {{ $child->productcolor->color->name ?? '-' }}
                                                        </td>
                                                        <td>{{ $child->expected_delivery ?? '-' }}</td>
                                                        <td>{{ $child->quantity ?? '-' }}</td>
                                                        <td>
                                                            @if ($child->status === 'new')
                                                                {{ __('messages.new') }}
                                                            @elseif ($child->status === 'processing')
                                                                {{ __('messages.processing') }}
                                                            @elseif ($child->status === 'postponed')
                                                                {{ __('messages.postponed') }}
                                                            @elseif ($child->status === 'partial')
                                                                {{ __('messages.partial') }}
                                                            @elseif ($child->status === 'complete')
                                                                {{ __('messages.complete') }}
                                                            @elseif ($child->status === 'cancel')
                                                                {{ __('messages.cancel') }}
                                                            @elseif ($child->status === 'stop')
                                                                {{ __('messages.stop') }}
                                                            @elseif ($child->status === 'pending')
                                                                {{ __('messages.pending ') }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <div class="mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
