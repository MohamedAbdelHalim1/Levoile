@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>الصب كاتيجوريز لكاتيجوري: {{ $category->name }}</h4>
                <div class="row">
                    @foreach ($category->subcategories as $subcategory)
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('product-knowledge.products', $subcategory->id) }}"
                                class="text-center shadow-sm p-3 d-block">
                                <div class="card h-100 shadow text-center">
                                    <img src="{{ asset($subcategory->image ? 'images/category/' . $subcategory->image : 'assets/images/comming.png') }}"
                                        class="card-img-top p-2">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $subcategory->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
