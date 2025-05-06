@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>المنتجات الخاصة بـ: {{ $subcategory->name }}</h4>
                <div class="row">
                    @forelse($subcategory->products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card p-3 shadow-sm">
                                <h6>{{ $product->description }}</h6>
                                <p>اللون: {{ $product->color }} | المقاس: {{ $product->size }}</p>
                                <p>الكمية: {{ $product->quantity }} | السعر: {{ $product->unit_price }}</p>
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
