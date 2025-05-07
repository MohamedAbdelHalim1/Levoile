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
                                    {{-- الصورة الرئيسية --}}
                                    @if($mainImage)
                                        <img src="{{ $mainImage }}" class="img-fluid mb-3"
                                             style="max-height: 250px; object-fit: contain;">
                                    @endif

                                    <h5 class="mb-2">{{ $parent->description }}</h5>
                                    <span class="badge bg-primary mb-2">Code: {{ $parent->product_code }}</span>
                                    <br>
                                    <span class="badge bg-dark mb-3">Price: {{ $parent->unit_price }}</span>

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
                                                    {{-- <p class="mb-0 mt-1 small">Color: {{ $variant->color }}</p>
                                                    <p class="mb-0 small">Size: {{ $variant->size }}</p> --}}
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
@endsection
