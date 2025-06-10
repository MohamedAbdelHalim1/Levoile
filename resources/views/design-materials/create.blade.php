@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4 class="mb-4">{{ __('messages.create_material') }}</h4>
                <form action="{{ route('design-materials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>{{ __('messages.name') }}</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('messages.image') }}</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <hr>
                    <h5>{{ __('messages.colors_of_material') }}</h5>
                    <div id="colors-area">
                        <div class="row mb-2 color-row">
                            <div class="col-md-2">
                                <select name="colors[0][name]" class="form-control color-name-select" required>
                                    <option value="">{{ __('messages.choose_color') }}</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->name }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" name="colors[0][code]" class="form-control"
                                    placeholder="{{ __('messages.color_code') }}">
                                <!-- أو استبدلها بـ <input type="color"... لو تحب -->
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="colors[0][required_quantity]" class="form-control"
                                    placeholder="{{ __('messages.required_quantity') }}" step="any">
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="colors[0][received_quantity]" class="form-control"
                                    placeholder="{{ __('messages.received_quantity') }}" step="any">
                            </div>
                            <div class="col-md-2">
                                <input type="date" name="colors[0][delivery_date]" class="form-control"
                                    placeholder="{{ __('messages.delivery_date') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-color">{{ __('messages.detele') }}</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-color" class="btn btn-secondary mt-2 mb-4">+ {{ __('messages.add_color') }} </button>
                    <div>
                        <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                        <a href="{{ route('design-materials.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet" />

<script>
    let colorIndex = 1;

    function applyTomSelect() {
        document.querySelectorAll('.color-name-select').forEach(el => {
            if (!el.classList.contains('ts-hidden')) {
                new TomSelect(el, {
                    create: false,
                    placeholder: "{{ __('messages.choose_color') }}",
                });
            }
        });
    }

    applyTomSelect(); // أول تحميل

    $('#add-color').click(function () {
        let row = `
            <div class="row mb-2 color-row">
                <div class="col-md-2">
                    <select name="colors[${colorIndex}][name]" class="form-control color-name-select" required>
                        <option value="">اختر اللون</option>
                        @foreach ($colors as $color)
                            <option value="{{ $color->name }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" name="colors[${colorIndex}][code]" class="form-control" placeholder="{{ __('messages.color_code') }} ">
                </div>
                <div class="col-md-2">
                    <input type="number" name="colors[${colorIndex}][required_quantity]" class="form-control" placeholder="{{ __('messages.required_quantity') }} " step="any">
                </div>
                <div class="col-md-2">
                    <input type="number" name="colors[${colorIndex}][received_quantity]" class="form-control" placeholder="{{ __('messages.received_quantity') }} " step="any">
                </div>
                <div class="col-md-2">
                    <input type="date" name="colors[${colorIndex}][delivery_date]" class="form-control">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-color">{{ __('messages.detele') }}</button>
                </div>
            </div>
        `;
        $('#colors-area').append(row);
        colorIndex++;

        applyTomSelect(); // فعل التوم سليكت على العنصر الجديد
    });

    $(document).on('click', '.remove-color', function () {
        $(this).closest('.color-row').remove();
    });
</script>
@endsection
