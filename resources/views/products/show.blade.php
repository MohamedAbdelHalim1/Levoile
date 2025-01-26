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
            <h1 class="text-center mb-4">تفاصيل المنتج</h1>
            <div>
                <div class="row">
                    <div class="col-md-6">
                        @if($product->photo)
                            <img src="{{ asset($product->photo) }}" alt="Product Image" class="product-image" style="width:400px; height: auto; ">
                        @else
                            <p><i>لا يوجد صورة</i></p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h3>الوصف:</h3>
                        <p>{{ $product->description }}</p>

                        <h3>الكود:</h3>
                        <p>{{ $product->code ?? 'N/A' }}</p>

                        <h3>الفئة:</h3>
                        <p>{{ $product->category->name ?? 'N/A' }}</p>

                        <h3>الموسم:</h3>
                        <p>{{ $product->season->name ?? 'N/A' }}</p>

                        <h3>المصنع:</h3>
                        <p>{{ $product->factory->name ?? 'N/A' }}</p>

                        <h3>العلامة التجارية:</h3>
                        <p>{{ $product->marker_number }}</p>

                        <h3>المواد متوفره؟:</h3>
                        <p>{{ $product->have_stock ? 'نعم' : 'لا' }} - {{ $product->material_name ?? 'لا مواد متوفرة' }}</p>

                        <h3>الحالة:</h3>
                        <p>{{ $product->status }}</p>
                    </div>
                </div>

                <hr>

                <h2>الالوان</h2>
                @if($product->productColors->isEmpty())
                    <p>لا يوجد ألوان لهذا المنتج</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>اللون</th>
                                    <th>تاريخ التوصيل</th>
                                    <th>الكمية</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->productColors as $productColor)
                                    @php
                                        $variant = $productColor->productcolorvariants->last();
                                    @endphp
                                    <tr>
                                        <td>{{ $productColor->color->name ?? 'لا يوجد' }}</td>
                                        @if ($variant)
                                            <td>{{ $variant->expected_delivery ?? 'لا يوجد' }}</td>
                                            <td>{{ $variant->quantity ?? 'لا يوجد' }}</td>
                                            <td>
                                                @if ($variant->status === 'Received')
                                                    <span class="badge bg-success">{{ __('تم الاستلام') }}</span>
                                                @elseif ($variant->status === 'Partially Received')
                                                    <span class="badge bg-pink">{{ __('استلام جزئي') }}</span>
                                                @elseif ($variant->status === 'Not Received')
                                                    <span class="badge bg-danger">{{ __('لم يتم الاستلام') }}</span>
                                                @endif
                                            </td>
                                        @else
                                            <td colspan="2">{{ __('لا يوجد') }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div class="mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">العوده للقائمه</a>
            </div>
        </div>
    </div>
</div>
@endsection
