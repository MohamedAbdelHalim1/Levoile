@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>المنتجات الخاصة بـ: {{ $subcategory->name }}</h4>

                <div class="row">
                    @forelse($products as $group)
                        @php
                            $parent = $group->first();
                            $mainImage = $group->firstWhere('image_url')?->image_url;
                        @endphp

                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border border-gray-200 shadow-sm">
                                <div class="card-body text-center">

                                    {{-- الصورة --}}
                                    <div class="mb-2">
                                        @if($mainImage)
                                            <img src="{{ $mainImage }}" class="img-fluid w-100 product-image">
                                        @endif
                                    </div>

                                    {{-- الكود والسعر تحت الصورة --}}
                                    <div class="d-flex justify-content-center gap-2 mb-2">
                                        <span class="custom-badge">Code: {{ $parent->product_code }}</span>
                                        <span class="custom-badge">Price: {{ $parent->unit_price }}</span>
                                    </div>

                                    {{-- الاسم والجمله --}}
                                    <h5 class="mb-1">{{ $parent->description }}</h5>
                                    <p class="text-muted mb-3">Gomla: {{ $parent->gomla }}</p>

                                    {{-- الفاريانتس --}}
                                    <div class="row">
                                        @foreach($group as $variant)
                                            <div class="col-3 mb-3">
                                                <div class="card text-center p-2 shadow-sm h-100">
                                                    @if($variant->image_url)
                                                        <img src="{{ $variant->image_url }}"
                                                             class="img-fluid mb-2"
                                                             style="height: 80px; object-fit: contain;">
                                                    @endif
                                                    <span class="badge {{ $variant->quantity > 0 ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $variant->quantity > 0 ? 'Active' : 'Not Active' }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">لا يوجد منتجات لهذه الصب كاتيجوري</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <style>
        .product-image {
            object-fit: contain;
            max-height: 250px;
        }

        .custom-badge {
            border: 1px solid #0d6efd;
            color: #0d6efd;
            background-color: transparent;
            padding: 5px 10px;
            border-radius: 0.5rem;
            font-size: 0.75rem;
            display: inline-block;
        }
    </style>
@endsection
