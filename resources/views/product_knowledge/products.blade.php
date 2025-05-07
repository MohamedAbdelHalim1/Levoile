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
                                <div class="card-body text-center position-relative">

                                    {{-- الكود فوق الصورة - شمال --}}
                                    <div class="position-absolute start-0 top-0 m-2">
                                        <span class="badge bg-primary">Code: {{ $parent->product_code }}</span>
                                    </div>

                                    {{-- الصورة --}}
                                    @if($mainImage)
                                        <img src="{{ $mainImage }}" class="img-fluid mb-3"
                                             style="max-height: 250px; object-fit: contain;">
                                    @endif

                                    {{-- السعر تحت الصورة - يمين --}}
                                    <div class="position-absolute end-0 bottom-0 me-2 mb-2">
                                        <span class="badge bg-dark">Price: {{ $parent->unit_price }}</span>
                                    </div>

                                    <h5 class="mb-1 mt-2">{{ $parent->description }}</h5>
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
@endsection
