@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <h3 class="mb-4">نتيجة رفع الشيت</h3>

        <div id="reportBox" class="alert alert-info" style="display: none;"></div>

        {{-- <div id="duplicatesTable" style="display: none;">
        <h5 class="mt-4">الأكواد المكررة:</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الكود</th>
                </tr>
            </thead>
            <tbody id="duplicatesBody"></tbody>
        </table>
    </div> --}}
        <div id="duplicatesTable" style="display: none;">
            <h5 class="mt-4">الأكواد المكررة:</h5>
            <div class="row" id="duplicatesBody"></div>
        </div>


        <a href="{{ route('product-knowledge.lists') }}" class="btn btn-primary mt-4">العودة إلى المنتجات</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const data = JSON.parse(localStorage.getItem('upload_summary'));

            if (data) {
                document.getElementById('reportBox').style.display = 'block';
                document.getElementById('reportBox').innerHTML = `
            ✅ تم إضافة <strong>${data.new_count}</strong> منتج جديد<br>
            ⛔ تم تجاهل <strong>${data.duplicate_count}</strong> منتج مكرر
        `;

                if (data.duplicates.length > 0) {
                    document.getElementById('duplicatesTable').style.display = 'block';
                    document.getElementById('duplicatesBody').innerHTML = data.duplicates.map(code => `
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm border-1">
                        <div class="card-body text-center">
                            <h6 class="mb-0">${code}</h6>
                        </div>
                    </div>
                </div>
            `).join('');
                }

                // clear after showing
                localStorage.removeItem('upload_summary');
            }
        });


        // document.addEventListener('DOMContentLoaded', function() {
        //     const data = JSON.parse(localStorage.getItem('upload_summary'));

        //     if (data) {
        //         document.getElementById('reportBox').style.display = 'block';
        //         document.getElementById('reportBox').innerHTML = `
    //         ✅ تم إضافة <strong>${data.new_count}</strong> منتج جديد<br>
    //         ⛔ تم تجاهل <strong>${data.duplicate_count}</strong> منتج مكرر
    //     `;

        //         if (data.duplicates.length > 0) {
        //             document.getElementById('duplicatesTable').style.display = 'block';
        //             document.getElementById('duplicatesBody').innerHTML = data.duplicates.map(code => `
    //             <tr><td>${code}</td></tr>
    //         `).join('');
        //         }

        //         // clear after showing
        //         localStorage.removeItem('upload_summary');
        //     }
        // });
    </script>
@endsection
