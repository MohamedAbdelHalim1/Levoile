@extends('layouts.app')

@section('content')
    <div class="p-4">
        <div class="row">

            {{-- النص اليمين: إدخال الكود --}}
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    <h5 class="mb-3">{{ __('messages.enter_color_code') }} </h5>

                    <input type="text" id="colorCodeInput" class="form-control mb-3"
                        placeholder="{{ __('messages.enter_color_code_and_press_enter') }}">

                    <div id="colorResult"></div>

                    <form id="manualShootingForm" method="POST" action="{{ url('/shooting-product/manual/save') }}">
                        @csrf


                        <table class="table table-bordered mt-4 d-none" id="selectedColorsTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('messages.code') }}</th>
                                    <th>{{ __('messages.product') }}</th>
                                    <th>{{ __('messages.delete') }}</th>
                                </tr>
                            </thead>
                            <tbody id="colorsTableBody">
                                {{-- ديناميكياً --}}
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>

            {{-- النص الشمال: إعدادات التصوير --}}
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    <h5 class="mb-3">{{ __('messages.shooting_settings') }}</h5>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>{{ __('messages.type_of_shooting') }}</label>
                            <select name="type_of_shooting" id="shootingType" class="form-control" required
                                form="manualShootingForm">
                                <option value="">{{ __('messages.all_type_of_shooting') }}</option>
                                <option value="تصوير منتج">{{ __('messages.product_shooting') }} </option>
                                <option value="تصوير موديل">{{ __('messages.model_shooting') }} </option>
                                <option value="تصوير انفلونسر">{{ __('messages.inflo_shooting') }} </option>
                                <option value="تعديل لون">{{ __('messages.change_color') }} </option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3 d-none" id="locationWrapper">
                            <label>{{ __('messages.location') }} </label>
                            <select name="location" class="form-control" form="manualShootingForm">
                                <option value="">{{ __('messages.all_locations') }}</option>
                                <option value="تصوير بالداخل">{{ __('messages.inside_shooting') }} </option>
                                <option value="تصوير بالخارج">{{ __('messages.outside_shooting') }} </option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>{{ __('messages.date_of_shooting') }} </label>
                            <input type="date" name="date_of_shooting" class="form-control" form="manualShootingForm">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>{{ __('messages.date_of_delivery') }} </label>
                            <input type="date" name="date_of_delivery" class="form-control" required
                                form="manualShootingForm">
                        </div>

                        <div class="col-md-12 mb-3 d-none" id="photographerWrapper">
                            <label>{{ __('messages.photographers') }}</label>
                            <select name="photographer[]" class="form-control" multiple form="manualShootingForm">
                                @foreach ($photographers as $photographer)
                                    <option value="{{ $photographer->id }}">{{ $photographer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3 d-none" id="editorWrapper">
                            <label>{{ __('messages.editors') }}</label>
                            <select name="editor[]" class="form-control" multiple form="manualShootingForm">
                                @foreach ($editors as $editor)
                                    <option value="{{ $editor->id }}">{{ $editor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3 d-none" id="methodWrapper">
                            <label>{{ __('messages.way_of_shooting') }}</label>
                            <input type="text" name="shooting_method" class="form-control" form="manualShootingForm">
                        </div>
                        <div class="col-md-12 mt-3 d-none" id="shootingWaySection">
                            <label>{{ __('messages.way_of_shooting') }}</label>
                            <select name="way_of_shooting_ids[]" class="form-control tom-select" multiple>
                                @foreach ($waysOfShooting as $way)
                                    <option value="{{ $way->id }}">{{ $way->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" form="manualShootingForm" class="btn btn-success">{{ __('messages.save') }}</button>
                            <a href="{{ route('shooting-products.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('scripts')
    <script>
        let counter = 1;

        $('#shootingType').on('change', function() {
            let type = $(this).val();

            $('#locationWrapper, #photographerWrapper, #editorWrapper, #methodWrapper , #shootingWaySection').addClass('d-none');

            if (type === 'تصوير منتج' || type === 'تصوير موديل' || type === 'تصوير انفلونسر') {
                $('#locationWrapper, #photographerWrapper, #methodWrapper, #shootingWaySection').removeClass(
                    'd-none');
            } else if (type === 'تعديل لون') {
                $('#editorWrapper, #methodWrapper').removeClass('d-none');
            }
        });

        $('#colorCodeInput').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();

                let code = $(this).val().trim();
                if (!code) return;

                $.ajax({
                    url: "{{ route('shooting-products.manual.findColor') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        code: code
                    },
                    success: function(res) {
                        if (!res.found) {
                            $('#colorResult').html(
                                `<div class="alert alert-danger">{{ __('messages.color_not_found') }}</div>`
                            );
                            return;
                        }

                        $('#colorResult').html('');
                        $('#selectedColorsTable').removeClass('d-none');

                        const row = `
                            <tr>
                                <td>${counter++}</td>
                                <td>${res.code}</td>
                                <td>${res.product}</td>
                                <td><button type="button" class="btn btn-sm btn-danger remove-row">X</button></td>
                                <input type="hidden" name="selected_colors[]" value="${res.id}">
                            </tr>
                        `;


                        $('#colorsTableBody').append(row);
                        $('#colorCodeInput').val('').focus();
                    }
                });
            }
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });
    </script>
@endsection
