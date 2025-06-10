@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
            <h1>{{ __('messages.edit_sample_product') }}</h1>
            <form action="{{ route('design-sample-products.update', $sample->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('messages.name') }}</label>
                    <textarea class="form-control" id="description" name="description" required>{{ old('description', $sample->description) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="category_id" class="form-label">{{ __('messages.category') }}</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($sample->category_id == $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="season_id" class="form-label">{{ __('messages.season') }}</label>
                        <select class="form-control" id="season_id" name="season_id" required>
                            @foreach ($seasons as $season)
                                <option value="{{ $season->id }}" @if($sample->season_id == $season->id) selected @endif>
                                    {{ $season->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">{{ __('messages.image') }}</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                    @if($sample->image)
                        <img src="{{ asset($sample->image) }}" alt="{{ __('messages.image') }}" width="80" class="mt-2">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">{{ __('messages.edit') }}</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new TomSelect('#category_id', {
            placeholder: "{{ __('messages.choose_category') }} "
        });
        new TomSelect('#season_id', {
            placeholder: "{{ __('messages.choose_season') }} "
        });
    });
</script>
@endsection
