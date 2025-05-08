@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>رفع شيت ماستر شيت جديد</h4>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="mb-3">
                    <label for="file" class="form-label">اختر ملف Excel (xlsx أو xls فقط)</label>
                    <input type="file" id="file" class="form-control" accept=".xlsx,.xls" required>
                </div>

                <div id="preview-loader" class="alert alert-info d-none">جاري قراءة الملف... برجاء الانتظار</div>

                <button id="submit-btn" class="btn btn-success">رفع</button>

                <form id="hidden-upload-form" method="POST" action="{{ route('product-knowledge.upload.save') }}"
                    enctype="multipart/form-data" class="d-none">
                    @csrf
                    <input type="hidden" name="chunks" id="chunks-input">
                </form>

                <div id="sheet-preview" class="mt-4 d-none">
                    <h5 class="mb-3"><b>معاينة البيانات:</b></h5>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: scroll;">
                        <table class="table table-bordered text-center" id="preview-table">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Description</th>
                                    <th>Gomla</th>
                                    <th>Item Family</th>
                                    <th>Division Code</th>
                                    <th>Item Category</th>
                                    <th>Season</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Unit Price</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal + Progress -->
                <div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center p-4">
                            <div class="spinner-border text-primary mb-3" role="status"></div>
                            <h5 class="mb-3">جاري رفع الشيت، من فضلك لا تغلق الصفحة</h5>
                            <div class="progress w-100" style="height: 20px;">
                                <div id="uploadProgress" class="progress-bar progress-bar-striped progress-bar-animated"
                                    role="progressbar" style="width: 0%">0%</div>
                            </div>
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

        #preview-table td,
        #preview-table th {
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
        const submitBtn = document.getElementById('submit-btn');
        const progressBar = document.getElementById('uploadProgress');
        const uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
        const previewLoader = document.getElementById('preview-loader');

        function formatExcelDate(excelDate) {
            if (typeof excelDate === 'number') {
                const date = new Date((excelDate - 25569) * 86400 * 1000);
                return date.toISOString().replace('T', ' ').split('.')[0];
            }
            return excelDate || '';
        }


        let allRows = [];

        fileInput.addEventListener('change', function() {
            previewTable.innerHTML = '';
            const file = this.files[0];
            if (!file) return;

            previewLoader.classList.remove('d-none');

            const reader = new FileReader();
            reader.onload = function(e) {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, {
                    type: 'array'
                });
                const sheet = workbook.Sheets[workbook.SheetNames[0]];
                allRows = XLSX.utils.sheet_to_json(sheet);

                allRows.forEach(row => {
                    const tr = `
                    <tr>
                        <td>${row['No.'] || ''}</td>
                        <td>${row['Description'] || ''}</td>
                        <td>${row['Gomla'] || ''}</td>
                        <td>${row['Item Family Code'] || ''}</td>
                        <td>${row['Division Code'] || ''}</td>
                        <td>${row['Item Category Code'] || ''}</td>
                        <td>${row['Season Code'] || ''}</td>
                        <td>${row['Color'] || ''}</td>
                        <td>${row['Size'] || ''}</td>
                        <td>${row['Unit Price'] || ''}</td>
                        <td>${row['Column2'] || ''}</td>
                        <td>${row['quantity'] ?? ''}</td>
                        <td>${formatExcelDate(row['Created At'])}</td>
                    </tr>`;
                    previewTable.innerHTML += tr;
                });

                previewDiv.classList.remove('d-none');
                previewLoader.classList.add('d-none');
            };

            reader.readAsArrayBuffer(file);
        });

        submitBtn.addEventListener('click', async function() {
            if (!allRows.length) return alert('من فضلك اختر ملف أولاً');

            submitBtn.disabled = true;
            uploadModal.show();

            const chunkSize = Math.ceil(allRows.length / 4);
            const chunks = [];

            for (let i = 0; i < 4; i++) {
                const start = i * chunkSize;
                const end = start + chunkSize;
                chunks.push(allRows.slice(start, end));
            }

            for (let i = 0; i < chunks.length; i++) {
                try {
                    const response = await fetch("{{ route('product-knowledge.upload.save') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            chunk: chunks[i]
                        })
                    });

                    const result = await response.json();

                    if (result.status !== 'success') {
                        uploadModal.hide();

                        const alert = document.createElement('div');
                        alert.className = 'alert alert-danger mt-3';
                        alert.innerText = result.message || 'حدث خطأ أثناء رفع الشيت';

                        const container = document.querySelector('.bg-white') || document.querySelector(
                            '.max-w-7xl');
                        container?.prepend(alert);
                        return;
                    }

                    const progress = (i + 1) * 25;
                    progressBar.style.width = progress + '%';
                    progressBar.innerText = progress + '%';

                } catch (err) {
                    uploadModal.hide();

                    const alert = document.createElement('div');
                    alert.className = 'alert alert-danger mt-3';
                    alert.innerText = 'حدث خطأ غير متوقع.';

                    const container = document.querySelector('.bg-white') || document.querySelector(
                        '.max-w-7xl');
                    container?.prepend(alert);

                    submitBtn.disabled = false;

                    return;
                }
            }
            progressBar.classList.remove('bg-danger');
            progressBar.classList.add('bg-success');
            progressBar.innerText = 'اكتمل';

            setTimeout(() => {
                window.location.href = "{{ route('product-knowledge.upload') }}";
            }, 1000);
        });
    </script>
@endsection
