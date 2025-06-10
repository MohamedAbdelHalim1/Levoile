@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <h3 class="mb-4">{{ __('messages.upload_result') }}</h3>

        <div id="reportBox" class="alert alert-info" style="display: none;"></div>
        <div id="duplicatesTable" style="display: none;">
            <h5 class="mt-4">{{ __('messages.repeated_product_details') }}:</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>{{ __('messages.code') }}</th>
                        <th>{{ __('messages.description') }}</th>
                        <th>{{ __('messages.color') }}</th>
                        <th>{{ __('messages.size') }}</th>
                        <th>{{ __('messages.added_date') }} </th>
                        <th>{{ __('messages.division') }}</th>
                        <th>{{ __('messages.subcategory') }}</th>
                    </tr>
                </thead>
                <tbody id="duplicatesBody"></tbody>
            </table>
        </div>



        <a href="{{ route('product-knowledge.lists') }}" class="btn btn-primary mt-4">{{ __('messages.back') }}</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const data = JSON.parse(localStorage.getItem('upload_summary'));

            if (data) {
                document.getElementById('reportBox').style.display = 'block';
                document.getElementById('reportBox').innerHTML = `
            ✅ تم إضافة <strong>${data.new_products}</strong> منتج بـ <strong>${data.new_count}</strong> لون<br>
            ⛔ تم تجاهل <strong>${data.duplicate_count}</strong> منتج مكرر
        `;

                if (data.duplicates.length > 0) {
                    document.getElementById('duplicatesTable').style.display = 'block';
                    document.getElementById('duplicatesBody').innerHTML = data.duplicates.map(item => `
                    <tr>
                        <td>${item.no_code}</td>
                        <td>${item.description}</td>
                        <td>${item.color}</td>
                        <td>${item.size}</td>
                        <td>${item.created_at}</td>
                        <td>${item.division}</td>
                        <td>${item.subcategory}</td>
                    </tr>
                `).join('');
                            }


                // clear after showing
                localStorage.removeItem('upload_summary');
            }
        });



    </script>
@endsection
