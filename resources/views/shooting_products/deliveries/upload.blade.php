@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>رفع شيت تسليمات جديد</h4>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('shooting-deliveries.upload.save') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="file" class="form-label">{{ __('messages.upload_only_xlsx_or_xls') }}</label>
                        <input type="file" name="file" id="file" class="form-control" accept=".xlsx,.xls" required>
                    </div>

                    <button type="submit" class="btn btn-success">{{ __('messages.upload') }}</button>
                </form>

                <div id="sheet-preview" class="mt-4 d-none">
                    <h5 class="mb-3"><b>{{ __('messages.review_data') }} </b></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="preview-table">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('messages.item_no') }}</th>
                                    <th>{{ __('messages.description') }}</th>
                                    <th>{{ __('messages.quantity') }}</th>
                                    <th>{{ __('messages.unit') }}</th>
                                    <th>{{ __('messages.code') }}</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center p-4">
                            <div class="spinner-border text-primary mb-3" role="status"></div>
                            <h5>{{ __('messages.uploading_sheet') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal-content {
            border: none;
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.2);
        }
        #preview-table td, #preview-table th {
            vertical-align: middle;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
    <script>
        const fileInput = document.getElementById('file');
        const previewDiv = document.getElementById('sheet-preview');
        const previewTable = document.querySelector('#preview-table tbody');
        const form = document.querySelector('form');
        const submitBtn = form.querySelector('button[type="submit"]');

        fileInput.addEventListener('change', function () {
            previewTable.innerHTML = '';
            const file = this.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, { type: 'array' });
                const sheet = workbook.Sheets[workbook.SheetNames[0]];
                const rows = XLSX.utils.sheet_to_json(sheet);

                rows.forEach(row => {
                    const itemNo = row['Item No.']?.toString() || '';
                    const description = row['Description'] || '';
                    const quantity = row['Quantity'] || '';
                    const unit = row['Unit of Measure Code'] || '';
                    const primaryId = itemNo.substring(3, 9) || '';

                    const tr = `
                        <tr>
                            <td>${itemNo}</td>
                            <td>${description}</td>
                            <td>${quantity}</td>
                            <td>${unit}</td>
                            <td>${primaryId}</td>
                        </tr>`;
                    previewTable.innerHTML += tr;
                });

                previewDiv.classList.remove('d-none');
            };

            reader.readAsArrayBuffer(file);
        });

        form.addEventListener('submit', function () {
            submitBtn.disabled = true;
            $('#uploadModal').modal('show');
        });
    </script>
@endsection
