@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-4">
                <h4>المنتجات الخاصة بـ: {{ $subcategory->name }}</h4>

                <form method="GET" class="mb-4 d-flex gap-2 align-items-center">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="ابحث باستخدام الاسم - اسم الجملة - الكود">
                    <button type="submit" class="btn btn-primary">ابحث</button>
                    <a href="{{ route('product-knowledge.products', $subcategory->id) }}"
                        class="btn btn-secondary">العودة</a>
                </form>

                {{-- <div class="row">
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
                    
                </div> --}}

                <div class="mt-5 last-ui">
                    <div class="container">
                        <div class="row justify-content-center">
                            @forelse($products as $group)
                                @php
                                    $parent = $group->first();
                                    $mainImage = $group->firstWhere('image_url')?->image_url;
                                @endphp
                                <div class="col-xl-3 col-lg-3 col-md-4 border border-1 pe-0 ps-0  rounded-1 pb-3"
                                    data-bs-toggle="modal" data-bs-target="#productModal" style="cursor: pointer;">
                                    <div class="position-relative">
                                        @if ($mainImage)
                                            <img src="{{ $mainImage }}" class="main-image rounded-top-1">
                                        @endif
                                        <div class="position-absolute top-0 end-0 me-1 mt-1">
                                            <small
                                                class="fw-semibold back-ground text-white  rounded-1 p-1">{{ $parent->unit_price }}</small>
                                        </div>
                                        <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                            <small
                                                class="fw-semibold back-ground text-white rounded-1 p-1">{{ $parent->product_code }}</small>
                                        </div>
                                        <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                            <small
                                                class="fw-semibold back-ground text-white  rounded-1 p-1">{{ $subcategory->name }}</small>
                                        </div>
                                        <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                            <small
                                                class="fw-semibold back-ground text-white rounded-1 p-1">{{ count($group) }}
                                                colors</small>
                                        </div>
                                    </div>
                                    <h4>
                                        {{ $parent->description }}
                                    </h4>
                                    <p>
                                        اسم الجمله: {{ $parent->gomla }}
                                    </p>
                                    <div class="row justify-content-center">
                                        @foreach ($group as $variant)
                                            <div class="sub-color position-relative">
                                                @if ($variant->image_url)
                                                    <img src="{{ $variant->image_url }}" class="rounded-1">
                                                @endif
                                                <div class="position-absolute top-0 end-0 me-1">
                                                    <img src="{{ asset('assets/images/' . ($variant->quantity > 0 ? 'right.png' : 'wrong.png')) }}" class="icon-mark">
                                                </div>
                                                <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">{{ $variant->color }}</small>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="sub-color position-relative">
                                            <img src="assets/images/11_27dbae41-9b4d-411d-868e-f99ed0695929.webp"
                                                class="rounded-1">
                                            <div class="position-absolute top-0 end-0 me-1">
                                                <img src="assets/images/square_14034444.png" class="icon-mark">
                                            </div>
                                            <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                                <small class="fw-semibold back-ground text-white rounded-1 p-1">blue</small>
                                            </div>
                                        </div>
                                        <div class="sub-color position-relative">
                                            <img src="assets/images/1_e820f924-a60c-48ae-be6a-4f60180a4493.webp"
                                                class="rounded-1">
                                            <div class="position-absolute top-0 end-0 me-1">
                                                <img src="assets/images/square_14034444.png" class="icon-mark">
                                            </div>
                                            <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                                <small class="fw-semibold back-ground text-white rounded-1 p-1">blue</small>
                                            </div>
                                        </div>
                                        <div class="sub-color position-relative">
                                            <img src="assets/images/2_11491a91-d0c8-41fe-9537-fad46e76da1a.webp"
                                                class="rounded-1">
                                            <div class="position-absolute top-0 end-0 me-1">
                                                <img src="assets/images/square_14034444.png" class="icon-mark">
                                            </div>
                                            <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                                <small class="fw-semibold back-ground text-white rounded-1 p-1">blue</small>
                                            </div>
                                        </div>
                                        <div class="sub-color position-relative">
                                            <img src="assets/images/3_1db01444-2a04-41af-98fb-5367921b68b3.webp"
                                                class="rounded-1">
                                            <div class="position-absolute top-0 end-0 me-1">
                                                <img src="assets/images/square_15627569.png" class="icon-mark">
                                            </div>
                                            <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                                <small class="fw-semibold back-ground text-white rounded-1 p-1">blue</small>
                                            </div>
                                        </div>
                                        <div class="sub-color position-relative">
                                            <img src="assets/images/5_bb649007-938c-4470-9630-503793e9da8c.webp"
                                                class="rounded-1">
                                            <div class="position-absolute top-0 end-0 me-1">
                                                <img src="assets/images/square_14034444.png" class="icon-mark">
                                            </div>
                                            <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                                <small class="fw-semibold back-ground text-white rounded-1 p-1">blue</small>
                                            </div>
                                        </div>
                                        <div class="sub-color position-relative">
                                            <img src="assets/images/6_43034580-6b19-4e8a-815c-193e79176a8c.webp"
                                                class="rounded-1">
                                            <div class="position-absolute top-0 end-0 me-1">
                                                <img src="assets/images/square_15627569.png" class="icon-mark">
                                            </div>
                                            <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                                <small class="fw-semibold back-ground text-white rounded-1 p-1">blue</small>
                                            </div>
                                        </div>
                                        <div class="sub-color position-relative">
                                            <img src="assets/images/9_7c3e7104-13bd-4074-9708-50f89a6f81ab.webp"
                                                class="rounded-1">
                                            <div class="position-absolute top-0 end-0 me-1">
                                                <img src="assets/images/square_14034444.png" class="icon-mark">
                                            </div>
                                            <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                                <small class="fw-semibold back-ground text-white rounded-1 p-1">blue</small>
                                            </div>
                                        </div> --}}
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
                        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <div class="sub-img position-relative">
                                                <img src="assets/images/16_c06460f5-9f1a-470e-bf27-411c597e8ab9.webp"
                                                    class="rounded-1">
                                                <div class="position-absolute top-0 end-0 me-1">
                                                    <img src="assets/images/square_14034444.png" class="icon-mark">
                                                </div>
                                                <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">Navy_215</small>
                                                </div>
                                                <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">10512002308298</small>
                                                </div>
                                                <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">25</small>
                                                </div>
                                            </div>
                                            <div class="sub-img position-relative">
                                                <img src="assets/images/11_27dbae41-9b4d-411d-868e-f99ed0695929.webp"
                                                    class="rounded-1">
                                                <div class="position-absolute top-0 end-0 me-1">
                                                    <img src="assets/images/square_14034444.png" class="icon-mark">
                                                </div>
                                                <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">Navy_215</small>
                                                </div>
                                                <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">10512002308298</small>
                                                </div>
                                                <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">25</small>
                                                </div>
                                            </div>
                                            <div class="sub-img position-relative">
                                                <img src="assets/images/1_e820f924-a60c-48ae-be6a-4f60180a4493.webp"
                                                    class="rounded-1">
                                                <div class="position-absolute top-0 end-0 me-1">
                                                    <img src="assets/images/square_14034444.png" class="icon-mark">
                                                </div>
                                                <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">Navy_215</small>
                                                </div>
                                                <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">10512002308298</small>
                                                </div>
                                                <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">25</small>
                                                </div>
                                            </div>
                                            <div class="sub-img position-relative">
                                                <img src="assets/images/2_11491a91-d0c8-41fe-9537-fad46e76da1a.webp"
                                                    class="rounded-1">
                                                <div class="position-absolute top-0 end-0 me-1">
                                                    <img src="assets/images/square_14034444.png" class="icon-mark">
                                                </div>
                                                <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">Navy_215</small>
                                                </div>
                                                <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">10512002308298</small>
                                                </div>
                                                <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">25</small>
                                                </div>
                                            </div>
                                            <div class="sub-img position-relative">
                                                <img src="assets/images/3_1db01444-2a04-41af-98fb-5367921b68b3.webp"
                                                    class="rounded-1">
                                                <div class="position-absolute top-0 end-0 me-1">
                                                    <img src="assets/images/square_15627569.png" class="icon-mark">
                                                </div>
                                                <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">Navy_215</small>
                                                </div>
                                                <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">10512002308298</small>
                                                </div>
                                                <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">0</small>
                                                </div>
                                            </div>
                                            <div class="sub-img position-relative">
                                                <img src="assets/images/5_bb649007-938c-4470-9630-503793e9da8c.webp"
                                                    class="rounded-1">
                                                <div class="position-absolute top-0 end-0 me-1">
                                                    <img src="assets/images/square_14034444.png" class="icon-mark">
                                                </div>
                                                <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">Navy_215</small>
                                                </div>
                                                <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">10512002308298</small>
                                                </div>
                                                <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">25</small>
                                                </div>
                                            </div>
                                            <div class="sub-img position-relative">
                                                <img src="assets/images/6_43034580-6b19-4e8a-815c-193e79176a8c.webp"
                                                    class="rounded-1">
                                                <div class="position-absolute top-0 end-0 me-1">
                                                    <img src="assets/images/square_15627569.png" class="icon-mark">
                                                </div>
                                                <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">Navy_215</small>
                                                </div>
                                                <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">10512002308298</small>
                                                </div>
                                                <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">0</small>
                                                </div>
                                            </div>
                                            <div class="sub-img position-relative">
                                                <img src="assets/images/9_7c3e7104-13bd-4074-9708-50f89a6f81ab.webp"
                                                    class="rounded-1">
                                                <div class="position-absolute top-0 end-0 me-1">
                                                    <img src="assets/images/square_14034444.png" class="icon-mark">
                                                </div>
                                                <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">Navy_215</small>
                                                </div>
                                                <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">10512002308298</small>
                                                </div>
                                                <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                                    <small
                                                        class="fw-semibold back-ground text-white rounded-1 p-1">25</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- مودال العرض --}}
    {{-- <div class="modal fade" id="productModal" tabindex="-1">
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
    </div> --}}

    <style>
        /* .product-image {
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
                    } */

        .main-image {
            width: 100%;
        }

        .last-ui h4 {
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            margin: 10px 0px;
            color: black;
        }

        .last-ui p {
            text-align: center;
            font-size: 15px;
            color: rgb(113, 112, 112);
        }

        .last-ui .sub-color {
            width: 28%;
            margin: 5px 3px;
            padding: 0px;
        }

        .last-ui .sub-color img {
            width: 100%;
        }

        .last-ui .sub-color .icon-mark {
            width: 20px;
            height: 20px;
        }

        .last-ui .modal-title ul {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0px;
            margin-bottom: 0px;
        }

        .last-ui .modal-title ul li {
            font-weight: 500;
            font-size: 15px;
            margin: 0px 10px;

        }

        .modal-lg,
        .modal-xl {
            --bs-modal-width: 1200px;
        }

        .last-ui .sub-img {
            width: 20%;
            margin: 10px 10px;
            padding: 0px;
        }

        .last-ui .sub-img img {
            width: 100%;
        }

        .last-ui .sub-img .icon-mark {
            width: 20px;
            height: 20px;
        }


        .last-ui .sub-img h5 {
            text-align: center;
            justify-content: center;
            font-weight: 500;
            color: rgb(45, 45, 45);
            line-height: 30px;
            font-size: 18px;
            margin: 10px 0px;
        }

        .last-ui .back-ground {
            background-color: rgb(58, 58, 58);
        }

        @media screen {
            .last-ui .sub-img {
                width: 40%;
                margin: 10px 10px;
                padding: 0px;
            }

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
                    <div><strong>Description:</strong> ${variant.description}</div>
                    <div><strong>Gomla:</strong> ${variant.gomla}</div>
                    <div><strong>Color:</strong> ${variant.color}</div>
                    <div><strong>Size:</strong> ${variant.size}</div>
                    <div class="d-flex align-items-center justify-content-center gap-1 mt-1">
                        <input type="number" class="form-control form-control-sm text-center qty-input" 
                            value="${variant.quantity}" 
                            data-id="${variant.id}" 
                            disabled style="width: 60px;">
                        <button class="btn btn-sm btn-outline-secondary toggle-edit">
                            ✏️
                        </button>
                    </div>                   
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

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('toggle-edit')) {
                const btn = e.target;
                const input = btn.previousElementSibling;
                const isEditing = !input.disabled;

                if (isEditing) {
                    // Save AJAX
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
                                quantity: newQty
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
                    input.disabled = false;
                    input.focus();
                    btn.innerText = '✔️';
                }
            }
        });
    </script>
@endsection
