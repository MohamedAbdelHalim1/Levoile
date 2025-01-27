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
                            <img src="{{ asset($product->photo) }}" alt="Product Image" class="product-image" style="width:400px; height: auto;">
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
                                    @foreach ($productColor->productcolorvariants->where('parent_id', null) as $variant)
                                        <!-- Render parent and children rows -->
                                        @php
                                            function renderRow($variant, $level = 0) {
                                                $padding = $level * 20; // Indentation based on level
                                                echo '<tr>';
                                                echo '<td style="padding-left: ' . $padding . 'px;">' . ($variant->productcolor->color->name ?? 'لا يوجد') . '</td>';
                                                echo '<td>' . ($variant->expected_delivery ?? 'لا يوجد') . '</td>';
                                                echo '<td>' . ($variant->quantity ?? 'لا يوجد') . '</td>';
                                                echo '<td>';
                                                if ($variant->status === 'Received') {
                                                    echo '<span class="badge bg-success">تم الاستلام</span>';
                                                } elseif ($variant->status === 'Partially Received') {
                                                    echo '<span class="badge bg-pink">استلام جزئي</span>';
                                                } elseif ($variant->status === 'Not Received') {
                                                    echo '<span class="badge bg-danger">لم يتم الاستلام</span>';
                                                }
                                                echo '</td>';
                                                echo '</tr>';

                                                // Render children
                                                if ($variant->children->isNotEmpty()) {
                                                    foreach ($variant->children as $child) {
                                                        renderRow($child, $level + 1);
                                                    }
                                                }
                                            }
                                            renderRow($variant);
                                        @endphp
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
