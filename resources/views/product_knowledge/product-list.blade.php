@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>{{ __('messages.product_list') }} </h4>
                <a href="{{ route('product-knowledge.stock.upload') }}" class="btn btn-success mb-3">
                    + {{ __('messages.add_stock') }} 
                </a>

                <div class="table-responsive">
                    <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('messages.image') }}</th>
                                <th>{{ __('messages.code') }}</th>
                                <th>{{ __('messages.description') }}</th>
                                <th>{{ __('messages.gomla') }}</th>
                                <th>{{ __('messages.website_description') }} </th>
                                <th>{{ __('messages.category') }}</th>
                                <th>{{ __('messages.subcategory') }} </th>
                                <th>{{ __('messages.price') }}</th>
                                <th>{{ __('messages.color') }}</th>
                                <th>{{ __('messages.remaining_images') }}</th>
                                <th>{{ __('messages.quantity') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $group)
                                @php
                                    $parent = $group->firstWhere('image_url') ?? $group->first();
                                    $mainImage = $group->firstWhere('image_url')?->image_url;
                                    $colors = $group->groupBy('color')->count();
                                    $missing = $group->whereNull('image_url');
                                    $totalQty = $group->flatMap(fn($v) => $v->stockEntries)->sum('quantity');
                                    $img = $mainImage
                                        ? (Str::startsWith($mainImage, 'http')
                                            ? $mainImage
                                            : asset($mainImage))
                                        : asset('assets/images/comming.png');
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ $img }}" width="60" height="60"
                                            style="object-fit: contain" loading="lazy">
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

                                    <td>{{ $totalQty }}</td>


                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9">{{ __('messages.N/A') }}</td>
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
                    <h5 class="modal-title">{{ __('messages.products_with_missing_images') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>{{ __('messages.code') }}</th>
                                <th>{{ __('messages.description') }}</th>
                                <th>{{ __('messages.color') }}</th>
                            </tr>
                        </thead>
                        <tbody id="missingImagesTableBody"></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="uploadImagesBtn">{{ __('messages.edit') }}</button>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal for full product -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen-md-down modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('messages.product_details') }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-start mb-4">
                        <div class="col-md-4 text-center">
                            <img id="modalImage" src="" class="img-fluid rounded shadow"
                                style="max-width: 100%; max-height: 350px; object-fit: contain;">
                        </div>
                        <div class="col-md-8">
                            <h5 id="modalDescription" class="mb-2"></h5>
                            <p><strong>{{ __('messages.gomla') }}:</strong> <span id="modalGomla"></span></p>
                            <p><strong>{{ __('messages.code') }}:</strong> <span id="modalCode"></span></p>
                            <p><strong>{{ __('messages.price') }}:</strong> <span id="modalPrice"></span></p>
                            <p><strong>{{ __('messages.material') }}:</strong> <span id="modalMaterial"></span></p>
                            <p><strong>{{ __('messages.item_family_code') }}:</strong> <span id="modalFamily"></span></p>
                            <p><strong>{{ __('messages.season') }}:</strong> <span id="modalSeason"></span></p>
                            <p><strong>{{ __('messages.created_at') }}:</strong> <span id="modalCreated"></span></p>
                            <p><strong>{{ __('messages.category') }}:</strong> <span id="modalCategory"></span></p>
                            <p><strong>{{ __('messages.subcategory') }}:</strong> <span id="modalSubcategory"></span></p>
                        </div>
                    </div>

                    <hr>
                    <h6>{{ __('messages.variants') }}:</h6>
                    <div class="row" id="modalVariants"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal-xl {
            max-width: 75% !important;
        }

        #modalVariants {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        #modalVariants>div {
            flex: 1 1 calc(33.333% - 20px);
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

                    const modalImage = document.getElementById('modalImage');
                    modalImage.src = image ?
                        (image.startsWith('http') ? image : `{{ asset('') }}` + image) :
                        `{{ asset('assets/images/comming.png') }}`;
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

                    const grouped = group.reduce((acc, item) => {
                        if (!acc[item.color_code]) acc[item.color_code] = [];
                        acc[item.color_code].push(item);
                        return acc;
                    }, {});

                    Object.values(grouped).forEach(variants => {
                        const display = variants.find(v => v.image_url) || variants[0];
                        const imageSrc = display.image_url ?
                            (display.image_url.startsWith('http') ? display.image_url :
                                `{{ asset('') }}` + display.image_url) :
                            `{{ asset('assets/images/comming.png') }}`;

                        const tableRows = variants.map(variant => {
                            let stockMap = {
                                1: 0,
                                2: 0
                            };
                            (variant.stock_entries || []).forEach(e => {
                                if (e.stock_id === 1 || e.stock_id === 2) {
                                    stockMap[e.stock_id] = e.quantity;
                                }
                            });

                            return `
                            <tr>
                                <td>${variant.no_code}</td>
                                <td>${variant.size || variant.size_code || '-'}</td>
                                <td>
                                    <input type="number" class="form-control form-control-sm text-center qty-input" 
                                        value="${stockMap[1]}" data-id="${variant.id}" data-stock="1" disabled style="width: 60px;">
                                    <button class="btn btn-sm btn-outline-secondary toggle-edit mt-1">✏️</button>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm text-center qty-input" 
                                        value="${stockMap[2]}" data-id="${variant.id}" data-stock="2" disabled style="width: 60px;">
                                    <button class="btn btn-sm btn-outline-secondary toggle-edit mt-1">✏️</button>
                                </td>
                            </tr>
                        `;
                        }).join('');

                        container.innerHTML += `
                        <div class="col-md-4 mb-4 text-center">
                            <img src="${imageSrc}" class="rounded shadow mb-2" style="width: 150px; height: 150px; object-fit: cover;">
                            <h6 class="fw-bold text-muted">${display.color}</h6>
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>{{ __('messages.code') }}</th>
                                            <th>{{ __('messages.size') }}</th>
                                            <th>{{ __('messages.stock') }}</th>
                                            <th>{{ __('messages.gomla') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${tableRows}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    `;
                    });

                    const modal = new bootstrap.Modal(document.getElementById('productModal'));
                    modal.show();
                });
            });

            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('toggle-edit')) {
                    const btn = e.target;
                    const wrapper = btn.closest('td');
                    const input = wrapper.querySelector('input');
                    const stockId = input.dataset.stock;
                    const id = input.dataset.id;
                    const isEditing = !input.disabled;

                    if (isEditing) {
                        btn.disabled = true;
                        btn.innerText = '...';

                        fetch(`/product-knowledge/update-quantity/${id}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    quantity: input.value,
                                    stock_id: stockId
                                })
                            })
                            .then(res => res.json())
                            .then(() => {
                                btn.innerText = '✏️';
                                input.disabled = true;
                                btn.disabled = false;
                            })
                            .catch(() => {
                                alert('{{ __('messages.something_went_wrong') }}');
                                btn.innerText = '✏️';
                                btn.disabled = false;
                            });
                    } else {
                        input.disabled = false;
                        input.focus();
                        btn.innerText = '✔️';
                    }
                }
            });
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
                                <td>
                                    <input type="file" accept="image/*" class="form-control form-control-sm image-upload-input" 
                                        data-no-code="${item.no_code}">
                                </td>
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
    <script>
        document.getElementById('uploadImagesBtn').addEventListener('click', function() {
            const inputs = document.querySelectorAll('.image-upload-input');
            const formData = new FormData();

            inputs.forEach(input => {
                const file = input.files[0];
                const noCode = input.dataset.noCode;
                if (file) {
                    formData.append('images[]', file);
                    formData.append('no_codes[]', noCode);
                }
            });

            if (!formData.has('images[]')) {
                alert('{{ __('messages.please_select_one_image') }}');
                return;
            }

            fetch("{{ route('product-knowledge.upload-missing-images') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert('{{ __('messages.uploaded_successfully') }}');
                        location.reload();
                    } else {
                        alert('{{ __('messages.failed_to_upload') }}');
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('{{ __('messages.something_went_wrong') }}');
                });
        });
    </script>
@endsection
