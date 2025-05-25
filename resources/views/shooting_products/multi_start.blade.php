@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">

                @php
                    $productsCount = $products->count();
                    $colorsCount = 0;
                    foreach ($products as $product) {
                        $colorsCount += $product->shootingProductColors->count();
                    }
                @endphp

                <h4 class="mb-4">
                    بدء التصوير للمنتجات المحددة
                    <span class="text-muted" style="font-size:14px;">
                        (عدد المنتجات: {{ $productsCount }} | عدد الألوان: {{ $colorsCount }})
                    </span>
                </h4>

                <form method="POST" action="{{ route('shooting-products.multi.start.save') }}"
                    onsubmit="return validateColorsSelection()">
                    @csrf
                    <input type="hidden" name="selected_products"
                        value="{{ implode(',', $products->pluck('id')->toArray()) }}">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <label>نوع التصوير</label>
                            <select name="type_of_shooting" id="shootingType" class="form-control" required disabled>
                                <option value="{{ $type }}">{{ $type }}</option>
                            </select>
                            <input type="hidden" name="type_of_shooting" value="{{ $type }}">
                        </div>

                        <div class="col-md-3" style="display: none;">
                            <label>مكان التصوير</label>
                            <select name="location" id="shootingLocation" class="form-control">
                                <option value="">اختر</option>
                                <option value="تصوير بالداخل">تصوير بالداخل</option>
                                <option value="تصوير بالخارج">تصوير بالخارج</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>تاريخ التصوير</label>
                            <input type="date" name="date_of_shooting" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label>تاريخ التسليم</label>
                            <input type="date" name="date_of_delivery" class="form-control" required>
                        </div>


                        {{-- المصورين --}}
                        <div class="col-md-3 mt-3 d-none" id="photographerSection">
                            <label>المصورين</label>
                            <select name="photographer[]" class="form-control tom-select" multiple>
                                @foreach ($photographers as $photographer)
                                    <option value="{{ $photographer->id }}">{{ $photographer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- المحررين --}}
                        <div class="col-md-3 mt-3 d-none" id="editorSection">
                            <label>المحررين</label>
                            <select name="editor[]" class="form-control tom-select" multiple>
                                @foreach ($editors as $editor)
                                    <option value="{{ $editor->id }}">{{ $editor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- طريقة التصوير --}}
                        <div class="col-md-3 mt-3 d-none" id="shootingMethodSection">
                            <label>لينك التصوير </label>
                            <input type="text" name="shooting_method" class="form-control"
                                placeholder="ادخل طريقة التصوير او لينك">
                        </div>

                        <div class="col-md-3 mt-3 d-none" id="shootingWaySection">
                            <label>طرق التصوير</label>
                            <select name="way_of_shooting_ids[]" class="form-control tom-select" multiple>
                                @foreach ($waysOfShooting as $way)
                                    <option value="{{ $way->id }}">{{ $way->name }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>


                    <h5 class="mb-3">المنتجات المختارة</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    @php
                                        $allColorsAreNew = true;
                                        foreach ($products as $product) {
                                            foreach ($product->shootingProductColors as $color) {
                                                if ($color->status != 'new') {
                                                    $allColorsAreNew = false;
                                                    break 2;
                                                }
                                            }
                                        }
                                    @endphp

                                    <th>
                                        {{-- @if ($allColorsAreNew) --}}
                                        <input type="checkbox" id="checkAll">
                                        {{-- @endif --}}
                                    </th>
                                    <th>#</th>
                                    <th>اسم المنتج</th>
                                    <th>كود اللون</th>
                                    {{-- <th>الحاله</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @php $variantIndex = 1; @endphp
                                @foreach ($products as $product)
                                    @foreach ($product->shootingProductColors as $color)
                                        <tr>
                                            <td>
                                                {{-- @if ($color->status == 'new') --}}
                                                <input type="checkbox" name="selected_colors[]"
                                                    value="{{ $color->id }}">
                                                {{-- @endif --}}
                                            </td>
                                            <td>{{ $variantIndex++ }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $color->code }}</td>
                                            {{-- <td>
                                                @if ($color->status == 'new')
                                                    <span class="badge bg-warning">جديد</span>
                                                @elseif ($color->status == 'partial' || $color->status == 'in_progress')
                                                    <span class="badge bg-secondary text-white">جزئي</span>
                                                @elseif ($color->status == 'completed')
                                                    <span class="badge bg-success">مكتمل</span>
                                                @endif
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <button type="submit" class="btn btn-success mt-4">بدء التصوير</button>
                    <a href="{{ route('shooting-products.index') }}" class="btn btn-secondary mt-4">رجوع</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            const selectedType = "{{ $type }}";

            if (selectedType === 'تصوير منتج' || selectedType === 'تصوير موديل' || selectedType ===
                'تصوير انفلونسر') {
                $('#shootingLocation').parent().show();
                $('#photographerSection').removeClass('d-none');
                $('#editorSection').addClass('d-none');
                $('#shootingMethodSection').removeClass('d-none');
                $('#shootingWaySection').removeClass('d-none');
            } else if (selectedType === 'تعديل لون') {
                $('#shootingLocation').parent().hide();
                $('#editorSection').removeClass('d-none');
                $('#photographerSection').addClass('d-none');
                $('#shootingMethodSection').removeClass('d-none');
            } else {
                $('#shootingLocation').parent().hide();
                $('#photographerSection').addClass('d-none');
                $('#editorSection').addClass('d-none');
                $('#shootingMethodSection').addClass('d-none');
            }


            $('.tom-select').each(function() {
                new TomSelect(this, {
                    plugins: ['remove_button'],
                });
            });

            $('#checkAll').on('change', function() {
                $('input[name="selected_colors[]"]').prop('checked', $(this).is(':checked'));
            });

        });
    </script>
    <script>
        function validateColorsSelection() {
            const selected = document.querySelectorAll('input[name="selected_colors[]"]:checked');
            if (selected.length === 0) {
                alert('يجب اختيار على الأقل منتج واحد من الألوان');
                return false;
            }
            return true;
        }
    </script>
@endsection
