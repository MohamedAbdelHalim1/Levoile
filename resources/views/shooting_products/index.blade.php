@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div class="alert alert-primary" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                    {{ session('success') }}
                </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-4">
                <form method="GET" action="{{ route('shooting-products.index') }}" class="mb-4">
                    <div class="row">
                        <!-- Text & Dropdown Filters -->
                        <div class="col-md-3">
                            <label>اسم المنتج</label>
                            <input type="text" name="name" class="form-control" value="{{ request('name') }}">
                        </div>

                        <div class="col-md-3">
                            <label>الحالة</label>
                            <select name="status" class="form-control">
                                <option value="">كل الحالات</option>
                                <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>جديد</option>
                                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>قيد
                                    التنفيذ</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>مكتمل
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>نوع التصوير</label>
                            <select name="type_of_shooting" class="form-control">
                                <option value="">الكل</option>
                                <option value="تصوير منتج"
                                    {{ request('type_of_shooting') == 'تصوير منتج' ? 'selected' : '' }}>تصوير منتج</option>
                                <option value="تصوير موديل"
                                    {{ request('type_of_shooting') == 'تصوير موديل' ? 'selected' : '' }}>تصوير موديل
                                </option>
                                <option value="تعديل لون"
                                    {{ request('type_of_shooting') == 'تعديل لون' ? 'selected' : '' }}>تعديل لون</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>الموقع</label>
                            <select name="location" class="form-control">
                                <option value="">الكل</option>
                                <option value="تصوير بالداخل"
                                    {{ request('location') == 'تصوير بالداخل' ? 'selected' : '' }}>تصوير بالداخل</option>
                                <option value="تصوير بالخارج"
                                    {{ request('location') == 'تصوير بالخارج' ? 'selected' : '' }}>تصوير بالخارج</option>
                            </select>
                        </div>

                        <!-- Date Range: تصوير -->
                        <div class="col-md-6 mt-3">
                            <label>تاريخ التصوير</label>
                            <div class="input-group">
                                <input type="date" name="date_of_shooting_start" class="form-control"
                                    value="{{ request('date_of_shooting_start') }}">
                                <span class="input-group-text">-</span>
                                <input type="date" name="date_of_shooting_end" class="form-control"
                                    value="{{ request('date_of_shooting_end') }}">
                            </div>
                        </div>

                        <!-- Date Range: تسليم -->
                        <div class="col-md-6 mt-3">
                            <label>تاريخ التسليم</label>
                            <div class="input-group">
                                <input type="date" name="date_of_delivery_start" class="form-control"
                                    value="{{ request('date_of_delivery_start') }}">
                                <span class="input-group-text">-</span>
                                <input type="date" name="date_of_delivery_end" class="form-control"
                                    value="{{ request('date_of_delivery_end') }}">
                            </div>
                        </div>

                        <!-- Date Range: تعديل -->
                        <div class="col-md-6 mt-3">
                            <label>تاريخ التعديل</label>
                            <div class="input-group">
                                <input type="date" name="date_of_editing_start" class="form-control"
                                    value="{{ request('date_of_editing_start') }}">
                                <span class="input-group-text">-</span>
                                <input type="date" name="date_of_editing_end" class="form-control"
                                    value="{{ request('date_of_editing_end') }}">
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="col-md-6 mt-4 d-flex align-items-end justify-content-start">
                            <button type="submit" class="btn btn-primary me-2">فلتر</button>
                            <a href="{{ route('shooting-products.index') }}" class="btn btn-success">إلغاء</a>
                        </div>
                    </div>
                </form>
            </div>


            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="row mb-4">
                    <div class="m-2">
                        @if (auth()->user()->hasPermission('إضافة منتج'))
                            <a href="{{ route('shooting-products.create') }}" class="btn btn-primary">
                                {{ __('إضافة منتج') }}
                            </a>
                        @endif
                    </div>
                    <div class="m-2">
                        <a href="{{ route('shooting-products.manual') }}" class="btn btn-dark">
                            التصوير اليدوي
                        </a>
                    </div>
                    <div id="startShootingContainer" style="display: none;" class="m-2">
                        <form method="POST" action="{{ route('shooting-products.multi.start.page') }}">
                            @csrf
                            <input type="hidden" name="selected_products" id="selectedProducts">
                            <button type="submit" class="btn btn-success">بدء التصوير</button>
                        </form>
                    </div>

                </div>



                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="checkbox" id="checkAll"> اختر المنتج
                            </th>
                            <th>اسم المنتج</th>
                            <th>الحالة</th>
                            <th>عدد الألوان</th>
                            <th>عدد المقاسات</th>
                            <th>عدد السيشنات</th>
                            <th>السيشنات</th>
                            <th>حاله السيشن</th>
                            <th>نوع التصوير</th>
                            <th>الموقع</th>
                            <th>تاريخ التصوير</th>
                            <th>المصور</th>
                            <th>تاريخ التعديل</th>
                            <th>المحرر</th>
                            <th>تاريخ التسليم</th>
                            <th>الوقت المتبقي</th>
                            <th>طريقه التصوير</th>
                            <th>حاله البيانات</th>
                            <th>المراجعة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shooting_products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <input type="checkbox" name="selected_products[]" value="{{ $product->id }}">
                                </td>
                                <td>
                                    <a href="{{ route('shooting-products.show', $product->id) }}"
                                        class="text-primary text-decoration-underline">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                {{-- <td>
                                    @if ($product->status == 'new')
                                        <span class="badge bg-warning">جديد</span>
                                    @elseif ($product->status == 'partial' || $product->status == 'in_progress')
                                        <span class="badge bg-secondary text-white">جزئي</span>
                                    @elseif ($product->status == 'completed')
                                        <span class="badge bg-success">مكتمل</span>
                                    @endif
                                </td> --}}
                                <td>
                                    @php
                                        $tooltipContent =
                                            '<div class="table-responsive"><table class=\'table table-sm table-bordered mb-0\' style=\'font-size: 13px;\'><thead class=\'table-light\'><tr><th>اللون</th><th>الكود</th><th>الحالة</th></tr></thead><tbody>';

                                        $statuses = ['new' => 0, 'in_progress' => 0, 'completed' => 0];

                                        foreach ($product->shootingProductColors as $color) {
                                            $statuses[$color->status] = ($statuses[$color->status] ?? 0) + 1;

                                            $colorStatus = match ($color->status) {
                                                'completed' => 'مكتمل',
                                                'in_progress' => 'قيد التصوير',
                                                default => 'جديد',
                                            };

                                            $tooltipContent .=
                                                "<tr>
                                                <td>" .
                                                ($color->name ?? '-') .
                                                "</td>
                                                <td>" .
                                                ($color->code ?? '-') .
                                                "</td>
                                                <td>" .
                                                $colorStatus .
                                                "</td>
                                            </tr>";
                                        }

                                        $tooltipContent .= '</tbody></table></div>';

                                        // منطق تحديد الحالة النهائية للمنتج
                                        $total = array_sum($statuses);
                                        if ($statuses['completed'] === $total) {
                                            $productStatus = 'completed';
                                        } elseif ($statuses['new'] === $total) {
                                            $productStatus = 'new';
                                        } elseif ($statuses['in_progress'] + $statuses['completed'] === $total) {
                                            $productStatus = 'in_progress';
                                        } elseif (
                                            $statuses['new'] > 0 &&
                                            ($statuses['in_progress'] > 0 || $statuses['completed'] > 0)
                                        ) {
                                            $productStatus = 'partial';
                                        } else {
                                            $productStatus = 'unknown';
                                        }

                                        $badgeClass = match ($productStatus) {
                                            'new' => 'bg-warning',
                                            'completed' => 'bg-success',
                                            'in_progress' => 'bg-info text-dark',
                                            'partial' => 'bg-secondary text-white',
                                            default => 'bg-dark',
                                        };

                                        $statusText = match ($productStatus) {
                                            'new' => 'جديد',
                                            'completed' => 'مكتمل',
                                            'in_progress' => 'قيد التصوير',
                                            'partial' => 'جزئي',
                                            default => 'غير معروف',
                                        };
                                    @endphp

                                    <span class="badge {{ $badgeClass }}" tabindex="0" data-bs-toggle="popover"
                                        data-bs-trigger="hover focus" data-bs-html="true"
                                        data-bs-content="{!! htmlentities($tooltipContent, ENT_QUOTES, 'UTF-8') !!}">
                                        {{ $statusText }}
                                    </span>
                                </td>


                                {{-- عدد الألوان --}}
                                <td>{{ $product->number_of_colors }}</td>

                                <td>{{ $product->shootingProductColors->groupBy('color_code')->map->count() }}</td>
                                {{-- عدد السيشنات --}}
                                <td>
                                    {{ $product->shootingProductColors->flatMap(fn($color) => $color->sessions ?? collect())->pluck('reference')->unique()->count() }}
                                </td>

                                {{-- السيشنات --}}
                                <td>
                                    @php
                                        $displayedSessions = [];
                                    @endphp

                                    @foreach ($product->shootingProductColors as $color)
                                        @foreach ($color->sessions as $session)
                                            @if (!in_array($session->reference, $displayedSessions))
                                                @php $displayedSessions[] = $session->reference; @endphp
                                                <a href="{{ route('shooting-sessions.show', $session->reference) }}"
                                                    class="session-link">
                                                    {{ $session->reference }}
                                                </a>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </td>

                                <td>
                                    @php
                                        $shownSessionStatuses = [];
                                    @endphp
                                    @foreach ($product->shootingProductColors as $color)
                                        @foreach ($color->sessions as $session)
                                            @if (!in_array($session->reference, $shownSessionStatuses))
                                                @php $shownSessionStatuses[] = $session->reference; @endphp
                                                <div
                                                    style="border: 1px solid #bce0fd; border-radius: 6px; padding: 4px; margin-bottom: 6px;">
                                                    @if ($session->status == 'completed')
                                                        <span>مكتمل</span>
                                                    @else
                                                        <span>جديد</span>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </td>


                                {{-- باقي الأعمدة داخل box منظم لكل session --}}
                                @php
                                    $sessionsGrouped = [];
                                    foreach ($product->shootingProductColors as $color) {
                                        foreach ($color->sessions as $session) {
                                            $sessionsGrouped[$session->reference][] = $color;
                                        }
                                    }
                                @endphp

                                @foreach (['type_of_shooting', 'location', 'date_of_shooting', 'photographer', 'date_of_editing', 'editor', 'date_of_delivery', 'time_left', 'shooting_method'] as $field)
                                    <td>
                                        @foreach ($sessionsGrouped as $ref => $colors)
                                            @php
                                                $firstColor = $colors[0] ?? null;
                                            @endphp
                                            <div
                                                style="border: 1px solid #bce0fd; border-radius: 6px; padding: 4px; margin-bottom: 6px;">
                                                @switch($field)
                                                    @case('type_of_shooting')
                                                        <span class="d-block">{{ $firstColor?->type_of_shooting ?? '-' }}</span>
                                                    @break

                                                    @case('location')
                                                        <span class="d-block">{{ $firstColor?->location ?? '-' }}</span>
                                                    @break

                                                    @case('date_of_shooting')
                                                        <span class="d-block">{{ $firstColor?->date_of_shooting ?? '-' }}</span>
                                                    @break

                                                    @case('photographer')
                                                        @php $photographers = json_decode($firstColor?->photographer, true); @endphp
                                                        @if (is_array($photographers))
                                                            <span class="d-block">
                                                                @foreach ($photographers as $id)
                                                                    <span>{{ optional(\App\Models\User::find($id))->name }}</span>
                                                                @endforeach
                                                            </span>
                                                        @else
                                                            <span class="d-block">-</span>
                                                        @endif
                                                    @break

                                                    @case('date_of_editing')
                                                        <span class="d-block">{{ $firstColor?->date_of_editing ?? '-' }}</span>
                                                    @break

                                                    @case('editor')
                                                        @php $editors = json_decode($firstColor?->editor, true); @endphp
                                                        @if (is_array($editors))
                                                            <span class="d-block">
                                                                @foreach ($editors as $id)
                                                                    <span>{{ optional(\App\Models\User::find($id))->name }}</span>
                                                                @endforeach
                                                            </span>
                                                        @else
                                                            <span class="d-block">-</span>
                                                        @endif
                                                    @break

                                                    @case('date_of_delivery')
                                                        <span class="d-block">{{ $firstColor?->date_of_delivery ?? '-' }}</span>
                                                    @break

                                                    @case('time_left')
                                                        @php
                                                            $date = $firstColor?->date_of_delivery
                                                                ? \Carbon\Carbon::parse($firstColor->date_of_delivery)
                                                                : null;
                                                            $remaining = $date
                                                                ? \Carbon\Carbon::now()->diffInDays($date, false)
                                                                : null;
                                                        @endphp
                                                        @if (is_null($date))
                                                            <span class="d-block">-</span>
                                                        @else
                                                            <span class="d-block">
                                                                @if ($remaining > 0)
                                                                    <span>{{ $remaining }} يوم
                                                                        متبقي</span>
                                                                @elseif ($remaining == 0)
                                                                    <span>ينتهي اليوم</span>
                                                                @else
                                                                    <span>متأخر بـ {{ abs($remaining) }}
                                                                        يوم</span>
                                                                @endif
                                                            </span>
                                                        @endif
                                                    @break

                                                    @case('shooting_method')
                                                        @if (!empty($firstColor?->shooting_method))
                                                            <a href="{{ $firstColor->shooting_method }}" target="_blank"
                                                                class="d-block text-success">
                                                                <i class="fe fe-link"></i>
                                                            </a>
                                                        @else
                                                            <span class="d-block">-</span>
                                                        @endif
                                                    @break
                                                @endswitch
                                            </div>
                                        @endforeach
                                    </td>
                                @endforeach

                                @php
                                    $hasAllColorNames = $product->shootingProductColors->every(function ($color) {
                                        return !is_null($color->name) && $color->name !== '';
                                    });
                                @endphp

                                @if ($product->main_image != null && $product->price != null && $hasAllColorNames)
                                    <td>البيانات مكتملة</td>
                                @else
                                    <td>البيانات غير مكتملة</td>
                                @endif


                                <td>
                                    @if ($product->is_reviewed)
                                        <span class="badge bg-success">تم التكويد</span>
                                    @else
                                        <input type="checkbox" class="form-check-input review-toggle"
                                            data-id="{{ $product->id }}">
                                    @endif
                                </td>


                                <td>
                                    <a href="{{ route('shooting-products.complete.page', $product->id) }}"
                                        class="btn btn-warning">
                                        اكمال البيانات
                                    </a>
                                    @if (auth()->user()->role->name == 'admin')
                                        <!-- edit btn and delete form -->
                                        {{-- <a href="{{ route('shooting-products.edit', $product->id) }}"
                                            class="btn btn-secondary">
                                            تعديل
                                        </a> --}}
                                        <form action="{{ route('shooting-products.destroy', $product->id) }}"
                                            method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('هل انت متاكد من حذف هذا المنتج؟')">
                                                حذف
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>






            </div>
        </div>
    </div>

    <style>
        .session-link {
            display: block;
            border: 1px solid #bce0fd;
            border-radius: 6px;
            padding: 4px;
            margin-bottom: 6px;
            text-decoration: none;
            color: #000;
            transition: 0.3s ease;
        }

        .session-link:hover {
            background-color: #bce0fd;
            color: white;
        }
    </style>
@endsection

@section('scripts')
    <!-- SELECT2 JS -->
    <script src="{{ asset('build/assets/plugins/select2/select2.full.min.js') }}"></script>
    @vite('resources/assets/js/select2.js')

    <!-- DATA TABLE JS -->
    <script src="{{ asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    @vite('resources/assets/js/table-data.js')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.forEach(function(popoverTriggerEl) {
                new bootstrap.Popover(popoverTriggerEl, {
                    html: true,
                    sanitize: false, // ضروري عشان HTML زي الجدول يشتغل
                    trigger: 'hover focus'
                });
            });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let step = 1;
            let selectedType = "";

            // Initialize Tom Select
            $(".tom-select").each(function() {
                new TomSelect(this, {
                    plugins: ["remove_button"]
                });
            });

            $(".start-shooting").on("click", function() {
                $("#product_id").val($(this).data("id"));
                $("#shootingModal").modal("show");
            });

            $(".shooting-type").on("change", function() {
                $(".next-btn").prop("disabled", false);
                selectedType = $("input[name='type_of_shooting']:checked").val();
            });

            $(".next-btn").on("click", function() {
                if ($(this).text() === "حفظ") {
                    submitForm(); // Call function to submit form only on "حفظ"
                    return;
                }

                if (!validateStep()) {
                    alert("يرجى ملء جميع الحقول المطلوبة قبل المتابعة.");
                    return;
                }

                $(".step").addClass("d-none");

                if (step === 1) {
                    if (selectedType === "تصوير منتج" || selectedType === "تصوير موديل") {
                        $(".step-2").removeClass("d-none");
                    } else {
                        $(".step-4").removeClass("d-none");
                        $(".next-btn").text("حفظ");
                    }
                } else if (step === 2) {
                    $(".step-3").removeClass("d-none");
                    $(".next-btn").text("حفظ");
                }

                step++;
                $(".prev-btn").prop("disabled", false);
            });

            $(".prev-btn").on("click", function() {
                clearInputs(step);

                step--;
                $(".step").addClass("d-none");

                if (step === 1) {
                    $(".step-1").removeClass("d-none");
                    $(".next-btn").text("التالي");
                } else if (step === 2) {
                    $(".step-2").removeClass("d-none");
                    $(".next-btn").text("التالي");
                } else if (step === 3) {
                    $(".step-3").removeClass("d-none");
                    $(".next-btn").text("حفظ");
                }

                if (step === 1) $(".prev-btn").prop("disabled", true);
            });

            function submitForm() {
                let formData = $("#shootingForm").serializeArray(); // Converts to array format

                let dateOfDelivery = selectedType === "تعديل لون" ?
                    $("input[name='date_of_delivery_editing']").val() :
                    $("input[name='date_of_delivery_shooting']").val();

                if (!dateOfDelivery) {
                    alert("يجب إدخال تاريخ التسليم.");
                    return;
                }


                // Ensure date_of_delivery is included
                formData.push({
                    name: "date_of_delivery",
                    value: dateOfDelivery
                });


                $.ajax({
                    url: "{{ route('shooting-products.start') }}",
                    type: "POST",
                    data: formData, // No need for $.param()
                    success: function(response) {
                        alert(response.message);
                        $("#shootingModal").modal("hide");
                        location.reload();
                    },
                    error: function(xhr) {
                        alert("خطأ أثناء بدء التصوير. حاول مرة أخرى!");
                        console.error(xhr.responseText);
                    }
                });
            }


            function validateStep() {
                let valid = true;

                // فقط تحقق من الحقول الظاهرة حاليًا
                $(".step:visible .required-input").each(function() {
                    if (!$(this).val()) {
                        valid = false;
                    }
                });

                return valid;
            }


            function clearInputs(currentStep) {
                $(".step-" + currentStep + " input, .step-" + currentStep + " select").val("").trigger("change");
            }
        });
    </script>



    <script>
        $('#checkAll').on('change', function() {
            const isChecked = $(this).is(':checked');

            // حدد فقط العناصر الظاهرة حاليًا في الصفحة
            $('#file-datatable')
                .find('tbody tr:visible input[name="selected_products[]"]')
                .prop('checked', isChecked);

            toggleStartButton(); // حدث زر بدء التصوير
        });

        $('input[name="selected_products[]"]').on('change', function() {
            toggleStartButton();
        });

        function toggleStartButton() {
            const selected = $('input[name="selected_products[]"]:checked').length;
            if (selected > 0) {
                $('#startShootingContainer').show();
            } else {
                $('#startShootingContainer').hide();
            }

            let selectedProducts = [];
            $('input[name="selected_products[]"]:checked').each(function() {
                selectedProducts.push($(this).val());
            });
            $('#selectedProducts').val(selectedProducts.join(','));
        }
    </script>

    <script>
        $(document).on('change', '.review-toggle', function() {
            const checkbox = $(this);
            const productId = checkbox.data('id');

            if (!confirm('هل أنت متأكد من مراجعة هذا المنتج؟')) {
                checkbox.prop('checked', false);
                return;
            }

            $.ajax({
                url: "{{ route('shooting-products.review') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
                },
                success: function(response) {
                    if (response.success) {
                        checkbox.prop('checked', true).attr('disabled', true);
                        alert('تم مراجعة المنتج وإرساله لموقع الادمن بنجاح');
                        location.reload();
                    } else {
                        alert('فشل في تنفيذ المراجعة');
                        checkbox.prop('checked', false);
                    }
                },
                error: function() {
                    alert('حدث خطأ أثناء التنفيذ');
                    checkbox.prop('checked', false);
                }
            });
        });
    </script>
@endsection
