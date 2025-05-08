@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>قائمة المنتجات</h4>
                <div class="table-responsive">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-light">
                            <tr>
                                <th>صورة</th>
                                <th>كود المنتج</th>
                                <th>الاسم</th>
                                <th>اسم الجمله</th>
                                <th>الفئة</th>
                                <th>الفئة الفرعية</th>
                                <th>السعر</th>
                                <th>الألوان</th>
                                <th>الكمية</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $group)
                                @php
                                    $parent = $group->first();
                                    $mainImage = $group->firstWhere('image_url')?->image_url;
                                    $colors = $group->groupBy('color')->count();
                                @endphp
                                <tr>
                                    <td>
                                        @if ($mainImage)
                                            <img src="{{ $mainImage }}" width="60" height="60"
                                                style="object-fit: contain">
                                        @endif
                                    </td>
                                    <td>{{ $parent->product_code }}</td>
                                    <td>{{ $parent->description }}</td>
                                    <td>{{ $parent->gomla }}</td>
                                    <td>{{ optional($parent->subcategory?->category)->name ?? '-' }}</td>
                                    <td>{{ optional($parent->subcategory)->name ?? '-' }}</td>

                                    <td>{{ $parent->unit_price }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-info open-product-modal"
                                            data-group='@json($group)' data-image="{{ $mainImage }}">
                                            {{ $colors }}
                                        </a>
                                    </td>
                                    <td>{{ $group->sum('quantity') }}</td>
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
                    document.getElementById('modalFamily').innerText = parent.item_family_code;
                    document.getElementById('modalSeason').innerText = parent.season_code;
                    document.getElementById('modalCreated').innerText = parent.created_at_excel;
                    document.getElementById('modalCategory').innerText = parent.category_name;
                    document.getElementById('modalSubcategory').innerText = parent.subcategory_name;

                    const container = document.getElementById('modalVariants');
                    container.innerHTML = '';
                    group.forEach(item => {
                        container.innerHTML += `
                <div class='col-md-3 text-center mb-3'>
                    <img src="${item.image_url}" class="img-fluid mb-1" style="height: 80px; object-fit: contain;" loading="lazy">
                    <div><strong>No Code:</strong> ${item.no_code}</div>
                    <div><strong>Color:</strong> ${item.color}</div>
                    <div><strong>Size:</strong> ${item.size}</div>
                    <div><strong>Qty:</strong> ${item.quantity}</div>
                    <span class="badge ${item.quantity > 0 ? 'bg-success' : 'bg-danger'}">
                        ${item.quantity > 0 ? 'Active' : 'Not Active'}
                    </span>
                </div>`;
                    });

                    const modal = new bootstrap.Modal(document.getElementById('productModal'));
                    modal.show();
                });
            });
        });
    </script>
@endsection
