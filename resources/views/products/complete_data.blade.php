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
                        <h2>معلومات المنتج الاضافيه</h2>
                        <form action="{{ route('products.submitCompleteData', $product->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name">ألاسم</label>
                                <input type="text" id="name" name="name" class="form-control" required
                                    value="{{ $product->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="store_launch">وقت طرح المنتج في الاسواق</label>
                                <input type="text" id="store_launch" name="store_launch" class="form-control" required
                                    value="{{ $product->store_launch }}">
                            </div>
                            <div class="mb-3">
                                <label for="price">السعر</label>
                                <input type="number" id="price" name="price" class="form-control" step="0.01" required
                                    value="{{ $product->price }}">
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">اضافه</button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">العوده
                                    للقائمه</a>
                                <button id="printButton" type="button" class="btn btn-success">طباعه</button>
                            </div>
                        </form>
                    </div>

                    <!-- Right Section: Image and Details -->
                    <div class="col-md-5">
                        @if ($product->photo)
                            <img src="{{ asset($product->photo) }}" alt="Product Image" class="product-image">
                        @endif
                        <div class="product-details">
                            <div class="key-value"><span>الكود:</span> <span>{{ $product->code ?? 'لا يوجد' }}</span></div>
                            <div class="key-value"><span>الوصف:</span> <span>{{ $product->description }}</span></div>
                            <div class="key-value"><span>القسم:</span> <span>{{ $product->category->name ?? 'لا يوجد' }}</span></div>
                            <div class="key-value"><span>الموسم:</span> <span>{{ $product->season->name ?? 'لا يوجد' }}</span></div>
                            <div class="key-value"><span>مخزون الخامات:</span> <span>{{ $product->have_stock ? 'متوفر' : 'غير متوفر' }}</span></div>
                            <div class="key-value"><span>الحالة:</span> <span>{{ $product->status }}</span></div>
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
