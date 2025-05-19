@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>قائمة المنتجات</h4>
                <a href="{{ route('product-knowledge.stock.upload') }}" class="btn btn-success mb-3">
                    + إضافة ستوك
                </a>

                <div class="table-responsive">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-light">
                            <tr>
                                <th>صورة</th>
                                <th>كود المنتج</th>
                                <th>اسم ديناميك</th>
                                <th>اسم الجمله</th>
                                <th>اسم الويبسايت</th>
                                <th>الفئة</th>
                                <th>الفئة الفرعية</th>
                                <th>السعر</th>
                                <th>الألوان</th>
                                <th>عدد الصور المتبقية</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $group)
                                @php
                                    $parent = $group->firstWhere('image_url') ?? $group->first();
                                    $mainImage = $group->firstWhere('image_url')?->image_url;
                                    $colors = $group->groupBy('color')->count();
                                    $missing = $group->whereNull('image_url');
                                @endphp
                                <tr>
                                    <td>
                                        @if ($mainImage)
                                            <img src="{{ $mainImage }}" width="60" height="60"
                                                style="object-fit: contain" loading="lazy">
                                        @else
                                            <img src="{{ asset('assets/images/comming.png') }}" width="60"
                                                height="60" style="object-fit: contain" loading="lazy">
                                        @endif
                                    </td>
                                    <td>{{ $parent->product_code }}</td>
                                    <td>{{ $parent->description }}</td>
                                    <td>{{ $parent->gomla }}</td>
                                    <td>{{ $parent->website_description }}</td>
                                    <td>{{ optional($parent->subcategory?->category)->name ?? '-' }}</td>
                                    <td>{{ optional($parent->subcategory)->name ?? '-' }}</td>

                                    <td>{{ $parent->unit_price }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-info open-product-modal"
                                            @php
$latestGroup = $group->groupBy('color')->map(function ($items) {
                                                    return $items->sortByDesc('created_at_excel')->first();
                                                })->values(); @endphp
                                            data-group='@json($latestGroup)' data-image="{{ $mainImage }}">
                                            {{ $colors }}
                                        </a>
                                    </td>
                                    <td>
                                        @php $missingKey = 'missing_' . $loop->index; @endphp
                                        <a href="#" class="btn btn-sm btn-outline-warning show-missing-images"
                                            data-missing-key="{{ $missingKey }}">
                                            {{ $missing->count() }}
                                        </a>

                                        <script>
                                            window.missingImagesData = window.missingImagesData || {};
                                            window.missingImagesData["{{ $missingKey }}"] = {!! json_encode($missing) !!};
                                        </script>
                                    </td>


                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">لا توجد منتجات</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="missingImagesModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تفاصيل المنتجات بدون صور</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>كود المنتج</th>
                                <th>الوصف</th>
                                <th>اللون</th>
                            </tr>
                        </thead>
                        <tbody id="missingImagesTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for full product -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen-md-down modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تفاصيل المنتج</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img id="modalImage" src="" class="img-fluid" style="max-height: 300px;">
                    </div>
                    <h5 id="modalDescription"></h5>
                    <p><strong>Gomla:</strong> <span id="modalGomla"></span></p>
                    <p><strong>Code:</strong> <span id="modalCode"></span></p>
                    <p><strong>Price:</strong> <span id="modalPrice"></span></p>
                    <p><strong>material:</strong> <span id="modalMaterial"></span></p>
                    <p><strong>Item Family:</strong> <span id="modalFamily"></span></p>
                    <p><strong>Season:</strong> <span id="modalSeason"></span></p>
                    <p><strong>Created At:</strong> <span id="modalCreated"></span></p>
                    <p><strong>Category:</strong> <span id="modalCategory"></span></p>
                    <p><strong>Subcategory:</strong> <span id="modalSubcategory"></span></p>

                    <hr>
                    <h6>Variants:</h6>
                    <div class="row" id="modalVariants"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal-xl {
            max-width: 75% !important;
        }
    </style>
@endsection

@section('scripts')
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.open-product-modal').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const group = JSON.parse(this.dataset.group);
                    const image = this.dataset.image;
                    const parent = group[0];

                    document.getElementById('modalImage').src = image || '';
                    document.getElementById('modalDescription').innerText = parent.description;
                    document.getElementById('modalGomla').innerText = parent.gomla;
                    document.getElementById('modalCode').innerText = parent.product_code;
                    document.getElementById('modalPrice').innerText = parent.unit_price;
                    document.getElementById('modalMaterial').innerText = parent.material;
                    document.getElementById('modalFamily').innerText = parent.item_family_code;
                    document.getElementById('modalSeason').innerText = parent.season_code;
                    document.getElementById('modalCreated').innerText = parent.created_at_excel;
                    document.getElementById('modalCategory').innerText = parent.category_name;
                    document.getElementById('modalSubcategory').innerText = parent.subcategory_name;

                    const container = document.getElementById('modalVariants');
                    container.innerHTML = '';
                    group.forEach(item => {
                        let stocks = item.stock_entries || [];

                        // جهز الإنبوكس بتاع الكمية (editable فقط لو في جملة أو مخزن)
                        let stockHtml = '';
                        let editableQty = 0;

                        if (stocks.length) {
                            stocks.forEach(stock => {
                                let label = stock.stock_id === 1 ? 'مخزن' : (stock
                                    .stock_id === 2 ? 'جملة' : 'غير محدد');
                                stockHtml += `
                                    <div class="mt-1">
                                        <strong>${label}:</strong>
                                        <div class="d-flex justify-content-center gap-1 align-items-center mt-1">
                                            <input type="number"
                                                class="form-control form-control-sm text-center qty-input"
                                                value="${stock.quantity}"
                                                data-id="${item.id}"
                                                data-stock="${stock.stock_id}"
                                                style="width: 60px;">
                                            <button class="btn btn-sm btn-outline-secondary toggle-edit">✏️</button>
                                        </div>
                                    </div>
                                `;
                            });
                        } else {
                            stockHtml =
                                `<div class="mt-2 text-muted"><strong>غير محدد - 0</strong></div>`;
                        }

                        container.innerHTML += `
                            <div class='col-md-3 text-center mb-3'>
                                <img src="${item.image_url ? item.image_url : '{{ asset('assets/images/comming.png') }}'}"
                                    class="img-fluid mb-1"
                                    style="height: 80px; object-fit: contain;" loading="lazy">
                                <div><strong>Code:</strong> ${item.no_code}</div>
                                <div><strong>Color:</strong> ${item.color}</div>
                                <div><strong>Size:</strong> ${item.size}</div>
                                ${stockHtml}
                            </div>
                        `;
                    });

                    // group.forEach(item => {
                    //     container.innerHTML += `
                //         <div class='col-md-3 text-center mb-3'>
                //         <img src="${item.image_url ? item.image_url : '{{ asset('assets/images/comming.png') }}'}" 
                //                     class="img-fluid mb-1" 
                //                     style="height: 80px; object-fit: contain;" 
                //                     loading="lazy">                                <div><strong>Code:</strong> ${item.no_code}</div>
                //             <div><strong>Color:</strong> ${item.color}</div>
                //             <div><strong>Size:</strong> ${item.size}</div>
                //                 <div>
                //                     <strong>Stock:</strong>
                //                     ${
                //                         (item.stock_entries || []).length > 0
                //                         ? item.stock_entries.map(e => {
                //                             let label = 'غير محدد';
                //                             if (e.stock_id === 1) label = 'مخزن';
                //                             else if (e.stock_id === 2) label = 'جملة';
                //                             return `${label} - ${e.quantity}`;
                //                         }).join('<br>')
                //                         : 'غير محدد - 0'
                //                     }
                //                 </div>



                //             <div class="d-flex align-items-center justify-content-center gap-1 mt-1">
                //                 <input type="number" class="form-control form-control-sm text-center qty-input" 
                //                     value="${item.quantity}" 
                //                     data-id="${item.id}" 
                //                     disabled style="width: 60px;">
                //                 <button class="btn btn-sm btn-outline-secondary toggle-edit">
                //                     ✏️
                //                 </button>
                //             </div>

                //             <span class="badge ${item.quantity > 0 ? 'bg-success' : 'bg-danger'} mt-2">
                //                 ${item.quantity > 0 ? 'Active' : 'Not Active'}
                //             </span>
                //         </div>
                //         `;
                    // });

                    const modal = new bootstrap.Modal(document.getElementById('productModal'));
                    modal.show();
                });
            });
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('toggle-edit')) {
                const btn = e.target;
                const wrapper = btn.closest('.d-flex');
                const input = wrapper.querySelector('.qty-input');
                const stockId = input.dataset.stock;
                const id = input.dataset.id;
                const newQty = input.value;
                const isEditing = !input.disabled;

                if (isEditing) {
                    // Save via AJAX
                    const id = input.dataset.id;
                    const newQty = input.value;

                    btn.disabled = true;
                    btn.innerText = '...';

                    fetch(`/product-knowledge/update-quantity/${id}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                quantity: newQty,
                                stock_id: stockId
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            btn.innerText = '✏️';
                            input.disabled = true;
                            btn.disabled = false;
                        })
                        .catch(err => {
                            alert('حصل خطأ');
                            btn.innerText = '✏️';
                            btn.disabled = false;
                        });
                } else {
                    // Enable input
                    input.disabled = false;
                    input.focus();
                    btn.innerText = '✔️';
                }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.show-missing-images').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const key = this.dataset.missingKey;
                    const raw = window.missingImagesData?.[key] || [];
                    const data = Array.isArray(raw) ? raw : Object.values(raw);

                    const tbody = document.getElementById('missingImagesTableBody');
                    tbody.innerHTML = '';

                    data.forEach(item => {
                        tbody.innerHTML += `
                            <tr>
                                <td>${item.no_code}</td>
                                <td>${item.description || '-'}</td>
                                <td>${item.color || '-'}</td>
                            </tr>
                        `;
                    });

                    const modalElement = document.getElementById('missingImagesModal');
                    const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
                    modal.show();
                });
            });
        });
    </script>
@endsection
