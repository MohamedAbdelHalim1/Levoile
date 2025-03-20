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

            <div class="table-responsive export-table p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @if (auth()->user()->hasPermission('إضافة منتج'))
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('shooting-products.create') }}" class="btn btn-success">
                            {{ __('إضافة منتج') }}
                        </a>
                    </div>
                @endif
                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المنتج</th>
                            <th>عدد الألوان</th>
                            <th>الحالة</th>
                            <th>نوع التصوير</th>
                            <th>الموقع</th>
                            <th>تاريخ التصوير</th>
                            <th>المصور</th>
                            <th>تاريخ التعديل</th>
                            <th>المحرر</th>
                            <th>تاريخ التسليم</th>
                            <th>لينك درايف</th> <!-- New Column for Drive Link -->
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shooting_products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->number_of_colors }}</td>
                                <td>
                                    @if ($product->status == 'new')
                                        <span class="badge bg-warning">جديد</span>
                                    @elseif($product->status == 'in_progress')
                                        <span class="badge bg-info">قيد التنفيذ</span>
                                    @elseif($product->status == 'completed')
                                        <span class="badge bg-success">مكتمل</span>
                                    @endif
                                </td>
                                <td>{{ $product->type_of_shooting ?? '-' }}</td>
                                <td>{{ $product->location ?? '-' }}</td>
                                <td>{{ $product->date_of_shooting ?? '-' }}</td>
                                <td>
                                    {{-- Photographer (IDs stored as an array) --}}
                                    @if (!empty($product->photographer))
                                        @php
                                            $tmp_photographers = json_decode($product->photographer, true);
                                        @endphp
                                        @foreach ($tmp_photographers as $photographerId)
                                            @php
                                                $photographerId = (int) $photographerId;
                                            @endphp
                                            <span
                                                class="badge bg-primary">{{ optional(\App\Models\User::find($photographerId))->name }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $product->date_of_editing ?? '-' }}</td>
                                <td>
                                    {{-- Editor (IDs stored as an array) --}}
                                    @if (!empty($product->editor))
                                        @php
                                            $tmp_editors = json_decode($product->editor, true);
                                        @endphp
                                        @foreach ($tmp_editors as $editorId)
                                            @php
                                                $editorId = (int) $editorId;
                                            @endphp
                                            <span
                                                class="badge bg-secondary">{{ optional(\App\Models\User::find($editorId))->name }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $product->date_of_delivery ?? '-' }}</td>
                                <!-- New Column for Drive Link -->
                                <td class="text-center">
                                    @if (!empty($product->drive_link))
                                        <a href="{{ $product->drive_link }}" target="_blank" class="text-success">
                                            <i class="fa-brands fa-google-drive fa-2x"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-primary start-shooting" data-id="{{ $product->id }}">
                                        التصوير
                                    </button>
                                    @if ($product->status == 'in_progress' || $product->status == 'completed')
                                        <button class="btn btn-success open-drive-link-modal" data-id="{{ $product->id }}"
                                            data-drive-link="{{ $product->drive_link }}">
                                            لينك درايف
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Drive Link Modal -->
    <div class="modal fade" id="driveLinkModal" tabindex="-1" aria-labelledby="driveLinkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة لينك درايف</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="driveLinkForm">
                        @csrf
                        <input type="hidden" name="product_id" id="drive_product_id">

                        <div class="mb-3">
                            <label class="form-label">لينك درايف</label>
                            <input type="url" name="drive_link" id="drive_link_input" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Shooting Modal -->
    <div class="modal fade" id="shootingModal" tabindex="-1" aria-labelledby="shootingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">بدء التصوير</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="shootingForm">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id">

                        <!-- Step 1: Choose Shooting Type -->
                        <div class="step step-1">
                            <h5>ما هو نوع التصوير؟</h5>
                            <div class="form-check">
                                <input class="form-check-input shooting-type" type="radio" name="type_of_shooting"
                                    value="تصوير منتج" id="productShooting">
                                <label class="form-check-label ms-5" for="productShooting">تصوير منتج</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input shooting-type" type="radio" name="type_of_shooting"
                                    value="تصوير موديل" id="modelShooting">
                                <label class="form-check-label ms-5" for="modelShooting">تصوير موديل</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input shooting-type" type="radio" name="type_of_shooting"
                                    value="تعديل لون" id="colorEditing">
                                <label class="form-check-label ms-5" for="colorEditing">تعديل لون</label>
                            </div>
                        </div>

                        <!-- Step 2: Choose Shooting Location -->
                        <div class="step step-2 d-none">
                            <h5>ماهو مكان التصوير؟</h5>
                            <div class="form-check">
                                <input class="form-check-input shooting-location" type="radio" name="location"
                                    value="تصوير بالداخل">
                                <label class="form-check-label ms-5">تصوير بالداخل</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input shooting-location" type="radio" name="location"
                                    value="تصوير بالخارج">
                                <label class="form-check-label ms-5">تصوير بالخارج</label>
                            </div>
                        </div>

                        <!-- Step 3: Dates & Users (For تصوير منتج & تصوير موديل) -->
                        <div class="step step-3 d-none">
                            <h5>تفاصيل التصوير</h5>
                            <div class="mb-3">
                                <label class="form-label">تاريخ التصوير</label>
                                <input type="date" name="date_of_shooting" class="form-control required-input">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">المصورون</label>
                                <select name="photographer[]" class="form-control tom-select required-input" multiple>
                                    @foreach ($photographers as $photographer)
                                        <option value="{{ $photographer->id }}">{{ $photographer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">تاريخ التسليم</label>
                                <input type="date" name="date_of_delivery" class="form-control required-input">
                            </div>
                        </div>

                        <!-- Step 4: Editing Details (For تعديل لون) -->
                        <div class="step step-4 d-none">
                            <h5>تفاصيل التعديل</h5>
                            <div class="mb-3">
                                <label class="form-label">تاريخ التعديل</label>
                                <input type="date" name="date_of_editing" class="form-control required-input">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">المحررون</label>
                                <select name="editor[]" class="form-control tom-select required-input" multiple>
                                    @foreach ($editors as $editor)
                                        <option value="{{ $editor->id }}">{{ $editor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">تاريخ التسليم</label>
                                <input type="date" name="date_of_delivery" class="form-control required-input">
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary prev-btn" disabled>السابق</button>
                    <button type="button" class="btn btn-primary next-btn" disabled>التالي</button>
                </div>
            </div>
        </div>
    </div>
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

                let dateOfDelivery = $("input[name='date_of_delivery']").val();
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
                $(".step:not(.d-none) .required-input").each(function() {
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
        $(document).ready(function() {
            // Open Drive Link Modal and Populate Input
            $(".open-drive-link-modal").on("click", function() {
                let productId = $(this).data("id");
                let driveLink = $(this).data("drive-link") || '';

                $("#drive_product_id").val(productId);
                $("#drive_link_input").val(driveLink);
                $("#driveLinkModal").modal("show");
            });

            // Handle Drive Link Submission
            $("#driveLinkForm").on("submit", function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('shooting-products.updateDriveLink') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        alert(response.message);
                        $("#driveLinkModal").modal("hide");
                        location.reload();
                    },
                    error: function(xhr) {
                        alert("خطأ أثناء حفظ لينك درايف. حاول مرة أخرى!");
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
