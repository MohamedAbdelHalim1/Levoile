@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>المنتجات الخاصة بـ: {{ $subcategory->name }}</h4>

                <form method="GET" class="mb-4 d-flex gap-2 align-items-center">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="ابحث باستخدام الاسم - اسم الجملة - الكود">
                    <button type="submit" class="btn btn-primary">ابحث</button>
                    <a href="{{ route('product.knowledge.subcategory', $subcategory->id) }}" class="btn btn-secondary">العودة</a>
                </form>
                
                <div class="row">
                    @forelse($products as $group)
                        @php
                            $parent = $group->first();
                            $mainImage = $group->firstWhere('image_url')?->image_url;
                        @endphp

                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border border-gray-200 shadow-sm cursor-pointer product-card"
                                data-description="{{ $parent->description }}" data-gomla="{{ $parent->gomla }}"
                                data-code="{{ $parent->product_code }}" data-price="{{ $parent->unit_price }}"
                                data-image="{{ $mainImage }}" data-family="{{ $parent->item_family_code }}"
                                data-season="{{ $parent->season_code }}" data-created="{{ $parent->created_at_excel }}"
                                data-variants='@json($group)'>

                                <div class="card-body text-center">
                                    <div class="mb-2">
                                        @if ($mainImage)
                                            <img src="{{ $mainImage }}" class="img-fluid w-100 product-image" loading="lazy">
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-center gap-2 mb-2">
                                        <span class="custom-badge">Code: {{ $parent->product_code }}</span>
                                        <span class="custom-badge">Price: {{ $parent->unit_price }}</span>
                                    </div>

                                    <h5 class="mb-1">{{ $parent->description }}</h5>
                                    <p class="text-muted mb-3">Gomla: {{ $parent->gomla }}</p>

                                    <div class="row">
                                        @foreach ($group as $variant)
                                            <div class="col-3 mb-3">
                                                <div class="card text-center p-2 shadow-sm h-100">
                                                    @if ($variant->image_url)
                                                        <img src="{{ $variant->image_url }}" class="img-fluid mb-2"
                                                            style="height: 80px; object-fit: contain;">
                                                    @endif
                                                    <span
                                                        class="badge {{ $variant->quantity > 0 ? 'bg-success' : 'bg-danger' }}">
                                                        {{ $variant->quantity > 0 ? 'Active' : 'Not Active' }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">لا يوجد منتجات لهذه الصب كاتيجوري</div>
                        </div>
                    @endforelse
                    <div class="d-flex justify-content-center mt-4">
                        {{ $pagination->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    {{-- مودال العرض --}}
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

                    <hr>
                    <h6>Variants:</h6>
                    <div class="row" id="modalVariants"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .product-image {
            object-fit: contain;
            max-height: 250px;
        }

        .custom-badge {
            border: 1px solid #0d6efd;
            color: #0d6efd;
            background-color: transparent;
            padding: 5px 10px;
            border-radius: 0.5rem;
            font-size: 0.75rem;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .modal-xl {
            max-width: 75% !important;
        }
    </style>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.product-card').forEach(card => {
            card.addEventListener('click', () => {
                document.getElementById('modalImage').src = card.dataset.image;
                document.getElementById('modalDescription').innerText = card.dataset.description;
                document.getElementById('modalGomla').innerText = card.dataset.gomla;
                document.getElementById('modalCode').innerText = card.dataset.code;
                document.getElementById('modalPrice').innerText = card.dataset.price;
                document.getElementById('modalFamily').innerText = card.dataset.family;
                document.getElementById('modalSeason').innerText = card.dataset.season;
                document.getElementById('modalCreated').innerText = card.dataset.created;

                const variants = JSON.parse(card.dataset.variants);
                const variantsContainer = document.getElementById('modalVariants');
                variantsContainer.innerHTML = '';

                variants.forEach(variant => {
                    const box = document.createElement('div');
                    box.className = 'col-md-3 text-center mb-3';
                    box.innerHTML = `
                    <img src="${variant.image_url}" class="img-fluid mb-1" style="height: 80px; object-fit: contain;" loading="lazy">
                    <div><strong>No Code:</strong> ${variant.no_code}</div>
                    <div><strong>Color:</strong> ${variant.color}</div>
                    <div><strong>Size:</strong> ${variant.size}</div>
                    <div><strong>Qty:</strong> ${variant.quantity}</div>
                    <span class="badge ${variant.quantity > 0 ? 'bg-success' : 'bg-danger'}">
                        ${variant.quantity > 0 ? 'Active' : 'Not Active'}
                    </span>
                `;
                    variantsContainer.appendChild(box);
                });

                const modal = new bootstrap.Modal(document.getElementById('productModal'));
                modal.show();
            });
        });
    </script>
@endsection
