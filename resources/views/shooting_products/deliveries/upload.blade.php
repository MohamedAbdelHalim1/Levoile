@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>رفع شيت تسليمات جديد</h4>

                <form method="POST" action="{{ route('shooting-deliveries.upload.save') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="file" class="form-label">اختر ملف Excel</label>
                        <input type="file" name="file" id="file" class="form-control" accept=".xlsx,.xls"
                            required>
                    </div>

                    <button type="submit" class="btn btn-success">رفع</button>
                </form>

                <div id="sheet-preview" class="mt-4 d-none">
                    <h5>معاينة البيانات</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="preview-table">
                            <thead class="table-light">
                                <tr>
                                    <th>Item No</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>PrimaryId</th>
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
                            <h5>جاري رفع الشيت، من فضلك لا تغلق الصفحة</h5>
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
                const primaryId = row['Item No.(SKU-CODE)']?.toString().substr(3, 6);
                const tr = `
                    <tr>
                        <td>${row['Item No.(SKU-CODE)'] || ''}</td>
                        <td>${row['Description'] || ''}</td>
                        <td>${row['Quantity'] || ''}</td>
                        <td>${primaryId || ''}</td>
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
