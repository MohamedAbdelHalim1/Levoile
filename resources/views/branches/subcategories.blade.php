@extends('layouts.app')

@section('content')
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>{{ __('messages.subcategories') }}  - {{ $category->name }}</h4>

        </div>

        <div class="row">
            @forelse($category->subcategories as $subcategory)
                @php
                    $imagePath = $subcategory->image ? 'images/category/' . $subcategory->image : 'assets/images/comming.png';
                @endphp
                <div class="col-md-3 mb-4">
                    <a href="{{ route('branch.order.products', $subcategory->id) }}" class="text-decoration-none">
                        <div class="card h-100 shadow text-center">
                            <img src="{{ asset($imagePath) }}"
                                class="card-img-top p-2">
                            <div class="card-body">
                                <h5 class="card-title">{{ $subcategory->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="alert alert-info text-center">@if(auth()->user()->current_lang == 'ar')لا يوجد أقسام فرعية @else There are no subcategories @endif</div>
            @endforelse
        </div>
    </div>
@endsection
