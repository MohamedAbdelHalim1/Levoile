@extends('layouts.app')

@section('styles')
    <style>
        .product-image {
            max-width: 100%; /* Allow the image to scale dynamically */
            width: 100%; /* Set width as 100% */
            max-height: 500px; /* Optional, to limit height */
            object-fit: cover; /* Ensure the image maintains proportions */
            margin-bottom: 20px;
        }

        .product-details {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
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
                <div>
                    <div class="row">
                        <!-- Left Section: Image and Details -->
                        <div class="col-md-6">
                            @if ($product->photo)
                                <img src="{{ asset($product->photo) }}" alt="Product Image" class="product-image">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="product-details">
                                <div class="key-value"><span>الكود:</span> <span>{{ $product->code ?? 'N/A' }}</span></div>
                                <div class="key-value"><span>الوصف:</span> <span>{{ $product->description }}</span></div>
                                <div class="key-value"><span>الفئة:</span>
                                    <span>{{ $product->category->name ?? 'N/A' }}</span>
                                </div>
                                <div class="key-value"><span>الموسم:</span>
                                    <span>{{ $product->season->name ?? 'N/A' }}</span>
                                </div>
                                <div class="key-value"><span>المصنع:</span>
                                    <span>{{ $product->factory->name ?? 'N/A' }}</span>
                                </div>
                                <div class="key-value"><span>متوفر:</span>
                                    <span>{{ $product->have_stock ? 'Yes' : 'No' }} - {{ $product->material_name ?? 'No material Identified' }}</span>
                                </div>
                                <div class="key-value"><span>العلامة التجارية:</span>
                                    <span>{{ $product->marker_number }}</span>
                                </div>
                                <div class="key-value"><span>الحالة:</span> <span>{{ $product->status }}</span></div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Form -->
                    <div class="additional-info">
                        <h2>معلومات المنتج الاضافيه</h2>
                        <form action="{{ route('products.submitCompleteData', $product->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="name">ألاسم</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $product->name }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="store_launch">طرح المنتج</label>
                                    <input type="text" id="store_launch" name="store_launch" class="form-control"
                                        value="{{ $product->store_launch }}">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="price">السعر</label>
                                    <input type="number" id="price" name="price" class="form-control"
                                        step="0.01" value="{{ $product->price }}">
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">اضافه</button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">العوده
                                    للقائمه</a>
                                <button id="printButton" type="button" class="btn btn-success">طباعه</button>
                            </div>
                        </form>
                    </div>

                    <hr>

                    <!-- Colors Table -->
                    <h2>الالوان</h2>
                    @if ($product->productColors->isEmpty())
                        <p>لا توجد الالوان</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>اللون</th>
                                        <th>الكميه</th>
                                        <th>الكود</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productColors as $productColor)
                                        <tr>
                                            <td>{{ $productColor->color->name ?? 'N/A' }}</td>
                                            <td>{{ $productColor->quantity }}</td>
                                            <td>
                                                <input type="text"
                                                    name="colors[{{ $productColor->color_id }}][sku]"
                                                    class="form-control" value="{{ $productColor->sku }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
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
