@extends('layouts.app')

@section('styles')
    <style>
        .product-image {
            max-width: 150px;
            height: auto;
            float: left;
        }

        .product-details {
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .key-value {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .key-value span {
            font-weight: bold;
        }

        .table-responsive {
            margin-top: 20px;
        }

        @media print {

            button,
            a.btn {
                display: none !important;
                /* Hide buttons */
            }

            .product-image {
                max-width: 50%;
                /* Ensure images scale appropriately */
            }

            body {
                background-color: white;
                /* Remove background colors */
            }
        }
    </style>
@endsection

@section('content')
    <div class="p-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                <div>
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            @if ($product->photo)
                                <img src="{{ asset($product->photo) }}" alt="Product Image" class="product-image"
                                    style="width:450px;">
                            @endif
                            <div class="product-details">
                                <div class="key-value"><span>Code:</span> <span>{{ $product->code ?? 'N/A' }}</span></div>
                                <div class="key-value"><span>Description:</span> <span>{{ $product->description }}</span>
                                </div>
                                <div class="key-value"><span>Category:</span>
                                    <span>{{ $product->category->name ?? 'N/A' }}</span></div>
                                <div class="key-value"><span>Season:</span>
                                    <span>{{ $product->season->name ?? 'N/A' }}</span></div>
                                <div class="key-value"><span>Factory:</span>
                                    <span>{{ $product->factory->name ?? 'N/A' }}</span></div>
                                <div class="key-value"><span>Material Availability:</span>
                                    <span>{{ $product->have_stock ? 'Yes' : 'No' }} -
                                        {{ $product->material_name ?? 'No material Identified' }}</span></div>
                                <div class="key-value"><span>Marker Number:</span>
                                    <span>{{ $product->marker_number }}</span></div>
                                <div class="key-value"><span>Status:</span> <span>{{ $product->status }}</span></div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <form action="{{ route('products.submitCompleteData', $product->id) }}" method="POST">
                        @csrf

                        <h2>Additional Details</h2>
                        <div class="mb-4">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ $product->name }}">
                        </div>
                        <div class="mb-4">
                            <label for="store_launch">Store Launch</label>
                            <input type="text" id="store_launch" name="store_launch" class="form-control"
                                value="{{ $product->store_launch }}">
                        </div>
                        <div class="mb-4">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control" step="0.01"
                                value="{{ $product->price }}">
                        </div>

                        <h2>Colors</h2>
                        @if ($product->productColors->isEmpty())
                            <p>No colors available for this product.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Color Name</th>
                                            <th>SKU</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->productColors as $productColor)
                                            <tr>
                                                <td>{{ $productColor->color->name ?? 'N/A' }}</td>

                                                <td>
                                                    <input type="text" name="colors[{{ $productColor->color_id }}][sku]"
                                                        class="form-control" value="{{ $productColor->sku }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                            <button id="printButton" type="button" class="btn btn-success">Print</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.getElementById('printButton').addEventListener('click', function () {
        // Hide buttons before printing
        const buttons = document.querySelectorAll('button, a.btn');
        buttons.forEach(button => button.style.display = 'none');

        // Trigger print
        window.print();

        // Show buttons after printing
        buttons.forEach(button => button.style.display = '');
    });
</script>
@endsection