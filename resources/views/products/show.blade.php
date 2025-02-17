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
                                <p class="text-muted"><i>لا يوجد صورة</i></p>
                            @endif
                        </div>
                    
                        <!-- Product Details -->
                        <div class="col-md-6">
                            <h3 class="mb-4 text-center">تفاصيل المنتج</h3>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th class="text-end">الوصف:</th>
                                            <td style="font-weight: bold;">{{ $product->description }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-end">الكود:</th>
                                            <td style="font-weight: bold;">{{ $product->code ?? 'لا يوجد' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-end">القسم:</th>
                                            <td style="font-weight: bold;">{{ $product->category->name ?? 'لا يوجد' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-end">الموسم:</th>
                                            <td style="font-weight: bold;">{{ $product->season->name ?? 'لا يوجد' }}</td>
                                        </tr>
                         
                                        <tr>
                                            <th class="text-end">حالة مخزون الخامات:</th>
                                            <td style="font-weight: bold;">
                                                {{ $product->have_stock ? 'متوفر' : 'غير متوفر' }} -
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
                                                @if ($product->status === 'new') جديد 
                                                @elseif ($product->status === 'complete') مكتمل 
                                                @elseif ($product->status === 'partial') جزئي 
                                                @elseif ($product->status === 'pending') قيد الانتظار
                                                @elseif ($product->status === 'processing') قيد التنصيع
                                                @elseif ($product->status === 'cancel') ملغي
                                                @elseif ($product->status === 'stop') توقف
                                                @elseif ($product->status === 'postponed') مؤجل
                                                @else لا يوجد @endif
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <hr>

                    <h2>الالوان</h2>
                    @if ($product->productColors->isEmpty())
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
                                        <th>ملاحظات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->productColors as $productColor)
                                        @foreach ($productColor->productcolorvariants->where('parent_id', null) as $variant)
                                            <tr>
                                                <td>{{ $productColor->color->name ?? 'لا يوجد' }}</td>
                                                <td>{{ $variant->expected_delivery ?? 'لا يوجد' }}</td>
                                                <td>{{ $variant->quantity ?? 'لا يوجد' }}</td>
                                                <td>
                                                    @switch($variant->status)
                                                        @case('new')
                                                            {{ __('لم يتم البدء') }}
                                                        @break

                                                        @case('processing')
                                                            {{ __('جاري التصنيع') }}
                                                        @break

                                                        @case('postponed')
                                                            {{ __('مؤجل ') }}
                                                        @break

                                                        @case('partial')
                                                            {{ __('جزئي الاستلام') }}
                                                        @break

                                                        @case('complete')
                                                            {{ __('تم التصنيع') }}
                                                        @break

                                                        @case('cancel')
                                                            {{ __('تم الغاء التصنيع') }}
                                                        @break

                                                        @case('stop')
                                                            {{ __('تم ايقاف التصنيع') }}
                                                        @break

                                                        @default
                                                            {{ __('غير معروف') }}
                                                    @endswitch
                                                </td>
                                                <td>{{ $variant->note ?? 'لا يوجد' }}</td>
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
                                                            {{ $child->productcolor->color->name ?? 'لا يوجد' }}
                                                        </td>
                                                        <td>{{ $child->expected_delivery ?? 'لا يوجد' }}</td>
                                                        <td>{{ $child->quantity ?? 'لا يوجد' }}</td>
                                                        <td>
                                                            @if ($child->status === 'new')
                                                                {{ __('لم يتم البدء') }}
                                                            @elseif ($child->status === 'processing')
                                                                {{ __('جاري التصنيع') }}
                                                            @elseif ($child->status === 'postponed')
                                                                {{ __('مؤجل ') }}
                                                            @elseif ($child->status === 'partial')
                                                                {{ __('جزئي الاستلام') }}
                                                            @elseif ($child->status === 'complete')
                                                                {{ __('تم التصنيع') }}
                                                            @elseif ($child->status === 'cancel')
                                                                {{ __('تم الغاء التصنيع') }}
                                                            @elseif ($child->status === 'stop')
                                                                {{ __('تم ايقاف التصنيع') }}
                                                            @elseif ($child->status === 'pending')
                                                                {{ __('قيد الانتظار') }}
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
