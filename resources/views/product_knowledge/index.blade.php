@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>اختر كاتيجوري</h4>
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('product-knowledge.subcategories', $category->id) }}" class="text-center shadow-sm p-3 d-block">
                                <div class="card h-100 shadow text-center">
                                    <img src="{{ asset('images/category/') . $category->image) ?? asset('assets/images/comming.png') }}" class="card-img-top p-2" style="height: 200px; object-fit: contain;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $category->name }}</h5>
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
