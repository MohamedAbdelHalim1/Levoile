@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>{{ __('messages.choose_category') }} </h4>
                <div class="row">
                    @foreach ($categories as $category)
                        @php
                            $imagePath = $category->image
                                ? 'images/category/' . $category->image
                                : 'assets/images/comming.png';
                        @endphp
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('product-knowledge.subcategories', $category->id) }}"
                                class="text-decoration-none">
                                <div class="card h-100 shadow text-center">
                                    <img src="{{ asset($imagePath) }}"
                                        class="card-img-top p-2">
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
