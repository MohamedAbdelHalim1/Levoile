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

                                    {{-- الصورة + overlay في الأسفل --}}
                                    <div class="position-relative rounded overflow-hidden product-wrapper mb-3">
                                        @if($mainImage)
                                            <img src="{{ $mainImage }}" class="img-fluid w-100 product-image">
                                        @endif

                                        {{-- الكود والسعر فوق الصورة من تحت --}}
                                        <div class="position-absolute bottom-0 w-100 d-flex justify-content-between p-2 px-3">
                                            <span class="badge badge-overlay">Code: {{ $parent->product_code }}</span>
                                            <span class="badge badge-overlay">Price: {{ $parent->unit_price }}</span>
                                        </div>
                                    </div>

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
        .product-wrapper {
            height: 250px;
        }

        .product-image {
            object-fit: contain;
            height: 100%;
        }

        .badge-overlay {
            background-color: #0d6efd;
            color: white;
            font-size: 0.75rem;
            padding: 5px 10px;
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }
    </style>
@endsection
