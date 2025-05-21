@extends('layouts.app')

@section('content')
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>المنتجات المتاحة</h4>
        </div>

        <div class="row">
            @foreach ($categories as $category)
                @php
                    $imagePath = $category->image ? 'images/category/' . $category->image : 'assets/images/comming.png';
                @endphp
                <div class="col-md-3 mb-4">
                    <a href="{{ route('branch.order.subcategories', $category->id) }}" class="text-decoration-none">
                        <div class="card h-100 shadow text-center">
                            <img src="{{ asset($imagePath) }}" class="card-img-top p-2">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
