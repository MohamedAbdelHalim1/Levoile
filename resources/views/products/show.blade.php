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
</style>
@endsection

@section('content')
<div class="p-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1 class="text-center mb-4">Product Details</h1>
            <div>
                <div class="row">
                    <div class="col-md-6">
                        @if($product->photo)
                            <img src="{{ asset($product->photo) }}" alt="Product Image" class="product-image" style="width:400px; height: auto; ">
                        @else
                            <p><i>No Image Available</i></p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h3>Description:</h3>
                        <p>{{ $product->description }}</p>

                        <h3>Code:</h3>
                        <p>{{ $product->code ?? 'N/A' }}</p>

                        <h3>Category:</h3>
                        <p>{{ $product->category->name ?? 'N/A' }}</p>

                        <h3>Season:</h3>
                        <p>{{ $product->season->name ?? 'N/A' }}</p>

                        <h3>Factory:</h3>
                        <p>{{ $product->factory->name ?? 'N/A' }}</p>

                        <h3>Marker Number:</h3>
                        <p>{{ $product->marker_number }}</p>

                        <h3>Material Availability:</h3>
                        <p>{{ $product->have_stock ? 'Yes' : 'No' }} - {{ $product->material_name ?? 'No material Identified' }}</p>
                    </div>
                </div>

                <hr>

                <h2>Colors</h2>
                @if($product->productColors->isEmpty())
                    <p>No colors available for this product.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Color Name</th>
                                    <th>Expected Delivery</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->productColors as $productColor)
                                    <tr>
                                        <td>{{ $productColor->color->name ?? 'N/A' }}</td>
                                        <td>{{ $productColor->expected_delivery ?? 'N/A' }}</td>
                                        <td>{{ $productColor->quantity ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div class="mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>
    </div>
</div>
@endsection
