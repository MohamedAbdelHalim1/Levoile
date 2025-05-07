@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>المنتجات الخاصة بـ: {{ $subcategory->name }}</h4>

                @forelse($products as $group)
                    @php $parent = $group->first(); @endphp

                    <div class="card mb-4 border border-gray-200 shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-3">اسم المنتج: {{ $parent->description }}</h5>
                            <p><strong>الكود:</strong> {{ $parent->product_code }}</p>

                            <div class="row">
                                @foreach($group as $variant)
                                    <div class="col-md-3 mb-3">
                                        <div class="card text-center p-2">
                                            @if($variant->image_url)
                                                <img src="{{ $variant->image_url }}" class="img-fluid mb-2"
                                                    style="height: 150px; object-fit: contain;" />
                                            @endif
                                            <div class="small">
                                                <p>اللون: {{ $variant->color }}</p>
                                                <p>المقاس: {{ $variant->size }}</p>
                                                <p>السعر: {{ $variant->unit_price }}</p>
                                                <p>الكمية: {{ $variant->quantity }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center">لا يوجد منتجات لهذه الصب كاتيجوري</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
