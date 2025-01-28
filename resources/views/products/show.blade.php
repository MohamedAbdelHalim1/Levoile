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
            <h1 class="text-center mb-4">تفاصيل المنتج</h1>
            <div>
                <div class="row">
                    <div class="col-md-6">
                        @if($product->photo)
                            <img src="{{ asset($product->photo) }}" alt="Product Image" class="product-image" style="width:400px; height: auto;">
                        @else
                            <p><i>لا يوجد صورة</i></p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h3>الوصف:</h3>
                        <p>{{ $product->description }}</p>

                        <h3>الكود:</h3>
                        <p>{{ $product->code ?? 'لا يوجد' }}</p>

                        <h3>القسم:</h3>
                        <p>{{ $product->category->name ?? 'لا يوجد' }}</p>

                        <h3>الموسم:</h3>
                        <p>{{ $product->season->name ?? 'لا يوجد' }}</p>

                        <h3>المصنع:</h3>
                        <p>{{ $product->factory->name ?? 'لا يوجد' }}</p>

                        <h3> رقم الماركر:</h3>
                        <p>{{ $product->marker_number }}</p>

                        <h3> حالة مخزون الخامات:</h3>
                        <p>{{ $product->have_stock ? 'متوفر' : 'غير متوفر' }} - {{ $product->material_name ?? 'لا مواد متوفرة' }}</p>

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
                                    @foreach ($productColor->productcolorvariants->where('parent_id', null) as $variant)
                                        <tr>
                                            <td>{{ $productColor->color->name ?? 'لا يوجد' }}</td>
                                            <td>{{ $variant->expected_delivery ?? 'لا يوجد' }}</td>
                                            <td>{{ $variant->quantity ?? 'لا يوجد' }}</td>
                                            <td>
                                                @if ($variant->status === 'Received')
                                                    <span class="badge bg-success">تم الاستلام</span>
                                                @elseif ($variant->status === 'Partially Received')
                                                    <span class="badge bg-pink">استلام جزئي</span>
                                                @elseif ($variant->status === 'Not Received')
                                                    <span class="badge bg-danger">لم يتم الاستلام</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @if ($variant->children && $variant->children->isNotEmpty())
                                            @foreach ($variant->children as $child)
                                                <tr>
                                                    <td class="arrow">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M10.146 4.146a.5.5 0 0 1 .708.708L7.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5z"/>
                                                        </svg>
                                                        {{ $child->productcolor->color->name ?? 'لا يوجد' }}
                                                    </td>
                                                    <td>{{ $child->expected_delivery ?? 'لا يوجد' }}</td>
                                                    <td>{{ $child->quantity ?? 'لا يوجد' }}</td>
                                                    <td>
                                                        @if ($child->status === 'Received')
                                                            <span class="badge bg-success">تم الاستلام</span>
                                                        @elseif ($child->status === 'Partially Received')
                                                            <span class="badge bg-pink">استلام جزئي</span>
                                                        @elseif ($child->status === 'Not Received')
                                                            <span class="badge bg-danger">لم يتم الاستلام</span>
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
                <a href="{{ route('products.index') }}" class="btn btn-secondary">العوده للقائمه</a>
            </div>
        </div>
    </div>
</div>
@endsection
