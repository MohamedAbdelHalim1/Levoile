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

                <div id="preview-loader" class="alert alert-info d-none">جاري تجهيز الملف... برجاء الانتظار</div>

                <button id="submit-btn" class="btn btn-success" disabled>رفع</button>

                <!-- Hidden Form (not used but kept for structure) -->
                <form id="hidden-upload-form" method="POST" action="{{ route('product-knowledge.upload.save') }}"
                      enctype="multipart/form-data" class="d-none">
                    @csrf
                    <input type="hidden" name="chunks" id="chunks-input">
                </form>

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
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
    <script>
        const fileInput = document.getElementById('file');
        const submitBtn = document.getElementById('submit-btn');
        const progressBar = document.getElementById('uploadProgress');
        const uploadModal = new bootstrap.Modal(document.getElementById('uploadModal'));
        const previewLoader = document.getElementById('preview-loader');

        let allRows = [];

        function formatExcelDate(excelDate) {
            if (typeof excelDate === 'number') {
                const date = new Date((excelDate - 25569) * 86400 * 1000);
                return date.toISOString().replace('T', ' ').split('.')[0];
            }
            return excelDate || '';
        }

        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;

            previewLoader.classList.remove('d-none');
            submitBtn.disabled = true;

            const reader = new FileReader();
            reader.onload = function (e) {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, { type: 'array' });
                const sheet = workbook.Sheets[workbook.SheetNames[0]];
                allRows = XLSX.utils.sheet_to_json(sheet);
                previewLoader.classList.add('d-none');
                submitBtn.disabled = false;
            };

            reader.readAsArrayBuffer(file);
        });

        submitBtn.addEventListener('click', async function () {
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
                        body: JSON.stringify({ chunk: chunks[i] })
                    });

                    const result = await response.json();

                    if (result.status !== 'success') {
                        uploadModal.hide();
                        alert(result.message || 'حدث خطأ أثناء رفع الشيت');
                        return;
                    }

                    const progress = (i + 1) * 25;
                    progressBar.style.width = progress + '%';
                    progressBar.innerText = progress + '%';

                } catch (err) {
                    uploadModal.hide();
                    alert('حدث خطأ غير متوقع');
                    submitBtn.disabled = false;
                    return;
                }
            }

            progressBar.classList.remove('bg-danger');
            progressBar.classList.add('bg-success');
            progressBar.innerText = 'اكتمل';

            setTimeout(() => {
                window.location.href = "{{ route('product-knowledge.lists') }}";
            }, 1000);
        });
    </script>
@endsection
