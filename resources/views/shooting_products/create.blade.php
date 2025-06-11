@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h2 class="text-lg font-bold mb-4">{{ __('messages.add_product') }}</h2>

                <form action="{{ route('shooting-products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.name') }}</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.code') }}  (Primary ID)</label>
                        <input type="number" name="custom_id" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.number_of_colors') }} </label>
                        <input type="number" name="number_of_colors" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.price') }}</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.quantity') }}</label>
                        <input type="number" name="quantity" class="form-control" required min="1">
                    </div>
                    

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.image') }} </label>
                        <input type="file" name="main_image" class="form-control">
                    </div>
                
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.gallery') }}</label>
                        <input type="file" name="gallery_images[]" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
