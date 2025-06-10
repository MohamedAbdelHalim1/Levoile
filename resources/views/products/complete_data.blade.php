@extends('layouts.app')

@section('styles')
    <style>
        .product-image {
            max-width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .product-details {
            margin-left: 20px;
        }

        .key-value {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .key-value span {
            font-weight: bold;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .form-control,
        .table {
            width: 100%;
        }

        .additional-info {
            margin-top: 20px;
        }

        @media print {
            button,
            a.btn {
                display: none !important;
            }

            .product-image {
                max-width: 50%;
            }

            body {
                background-color: white;
            }
        }
    </style>
@endsection

@section('content')
    <div class="p-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                <div class="row">
                    <!-- Left Section: Form -->
                    <div class="col-md-7">
                        <h2>{{ __('messages.complete_product_data') }}</h2>
                        <form action="{{ route('products.submitCompleteData', $product->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name">{{ __('messages.name') }}</label>
                                <input type="text" id="name" name="name" class="form-control" required
                                    value="{{ $product->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="store_launch">{{ __('messages.time_published_in_markets') }}</label>
                                <input type="text" id="store_launch" name="store_launch" class="form-control" required
                                    value="{{ $product->store_launch }}">
                            </div>
                            <div class="mb-3">
                                <label for="price">{{ __('messages.price') }}</label>
                                <input type="number" id="price" name="price" class="form-control" step="0.01" required
                                    value="{{ $product->price }}">
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                    {{ __('messages.cancel') }}</a>
                                <button id="printButton" type="button" class="btn btn-success">{{ __('messages.print') }}</button>
                            </div>
                        </form>
                    </div>

                    <!-- Right Section: Image and Details -->
                    <div class="col-md-5">
                        @if ($product->photo)
                            <img src="{{ asset($product->photo) }}" alt="Product Image" class="product-image">
                        @endif
                        <div class="product-details">
                            <div class="key-value"><span>{{ __('messages.code') }}:</span> <span>{{ $product->code ?? __('messages.N/A') }}</span></div>
                            <div class="key-value"><span>{{ __('messages.description') }}:</span> <span>{{ $product->description }}</span></div>
                            <div class="key-value"><span>{{ __('messages.category') }}:</span> <span>{{ $product->category->name ?? __('messages.N/A') }}</span></div>
                            <div class="key-value"><span>{{ __('messages.season') }}:</span> <span>{{ $product->season->name ?? __('messages.N/A') }}</span></div>
                            <div class="key-value"><span>{{ __('messages.matrials_stock') }} :</span> <span>{{ $product->have_stock ? '{{ __('messages.available') }}' : '{{ __('messages.not_available') }}' }}</span></div>
                            <div class="key-value"><span>{{ __('messages.status') }}:</span> <span>{{ $product->status }}</span></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            const buttons = document.querySelectorAll('button, a.btn');
            buttons.forEach(button => button.style.display = 'none');
            window.print();
            buttons.forEach(button => button.style.display = '');
        });
    </script>
@endsection
