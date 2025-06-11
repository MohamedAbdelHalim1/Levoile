@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h2 class="text-lg font-bold mb-4">{{ __('messages.edit_product') }}</h2>

                <form action="{{ route('shooting-products.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.name') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.code') }}  (Primary ID)</label>
                        <input type="number" name="custom_id" class="form-control" value="{{ $product->custom_id }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.number_of_colors') }}</label>
                        <input type="number" name="number_of_colors" value="{{ $product->number_of_colors }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.price') }}</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.quantity') }}</label>
                        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" min="1">
                    </div>
                    

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.image') }}</label>
                        <input type="file" name="main_image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.current_image') }}</label><br>
                        @if($product->main_image)
                            <img src="{{ asset('images/shooting/' . $product->main_image) }}" width="100">
                        @else
                            <span>{{ __('messages.N/A') }}</span>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">{{ __('messages.gallery') }}</label>
                        <input type="file" name="gallery_images[]" class="form-control" multiple>
                    </div>
                    
                    @if ($product->gallery->count())
                        <div class="row mt-3">
                            @foreach ($product->gallery as $image)
                                <div class="col-md-3 position-relative mb-3">
                                    <img src="{{ asset('images/shooting/' . $image->image) }}" class="img-fluid rounded border" style="max-height: 200px; object-fit: cover;">
                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-image"
                                            data-id="{{ $image->id }}" style="z-index: 10;">X</button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    

                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-image').forEach(button => {
            button.addEventListener('click', function () {
                if (!confirm('{{ __('messages.are_you_sure') }}')) return;

                const imageId = this.dataset.id;
                const imageBox = this.closest('.col-md-3');

                fetch("{{ route('gallery.delete') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: imageId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        imageBox.remove();
                    } else {
                        alert('{{ __('messages.something_went_wrong') }}');
                    }
                });
            });
        });
    });
</script>
@endsection
