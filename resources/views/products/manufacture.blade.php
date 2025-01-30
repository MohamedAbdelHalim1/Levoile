@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                @if (session('success'))
                    <div class="alert alert-primary" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                        {{ session('success') }}
                    </div>
                @endif

                <h1>{{ __('بدا التصنيع') }}</h1>
                <form id="update-product-form" action="{{ route('products.update.manufacture', $product->id) }}" method="POST">
                    @csrf

                    <!-- Color Details Table -->
                    <div class="mb-3">
                        <table class="table table-bordered" id="color-details-table">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ __('اللون') }}</th>
                                    <th>{{ __('تاريخ الاستلام') }}</th>
                                    <th>{{ __('الكمية') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->productColors as $productColor)
                                    @php
                                        $variant = $productColor->productcolorvariants->last(); // Get the latest variant
                                    @endphp
                                    <tr data-color-id="{{ $productColor->color_id }}">
                                        <td>
                                            <input type="hidden" name="colors[{{ $productColor->color_id }}][color_id]"
                                                value="{{ $productColor->color_id }}">
                                            {{ $productColor->color->name }}
                                        </td>
                                        <td>
                                            <input type="date" class="form-control"
                                                name="colors[{{ $productColor->color_id }}][expected_delivery]"
                                                value="{{ $variant ? $variant->expected_delivery : '' }}" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control"
                                                name="colors[{{ $productColor->color_id }}][quantity]"
                                                value="{{ $variant ? $variant->quantity : '' }}" min="1" required>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('بدأ التصنيع') }}</button>
                </form>
            </div>
        </div>
    </div>



@endsection
