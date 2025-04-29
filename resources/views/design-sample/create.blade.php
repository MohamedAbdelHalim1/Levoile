@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-8 bg-white shadow sm:rounded-lg border border-gray-200">
                <h1>{{ __('إضافة للمنتج') }}</h1>
                <form action="{{ route('design-sample-products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('الاسم') }}</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category_id" class="form-label">{{ __('القسم') }}</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">{{ __('اختر قسم') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="season_id" class="form-label">{{ __('الموسم') }}</label>
                            <select class="form-control" id="season_id" name="season_id" required>
                                <option value="">{{ __('اختر الموسم') }}</option>
                                @foreach ($seasons as $season)
                                    <option value="{{ $season->id }}">{{ $season->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="photo" class="form-label">{{ __('الصورة') }}</label>
                        <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>
                    

                    <button type="submit" class="btn btn-primary">{{ __('اضافه') }}</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Tom Select
            new TomSelect('#category_id', {
                placeholder: "اختر الفئة"
            });
            new TomSelect('#season_id', {
                placeholder: "اختر الموسم"
            });
        });
    </script>
@endsection
