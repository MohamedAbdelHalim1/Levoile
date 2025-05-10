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

                <section class="mt-5 last-ui">
                    <div class="container">
                        <div class="row justify-content-center">
                            @forelse($products as $group)
                                @php
                                    $parent = $group->first();
                                    $mainImage = $group->firstWhere('image_url')?->image_url;
                                @endphp
                                <div class="col-xl-3 col-lg-3 col-md-4 border border-1 pe-0 ps-0 rounded-1 pb-3 product-card"
                                    style="cursor: pointer;"
                                    data-description="{{ $parent->description }}"
                                    data-gomla="{{ $parent->gomla }}"
                                    data-price="{{ $parent->unit_price }}"
                                    data-code="{{ $parent->product_code }}"
                                    data-family="{{ $parent->item_family_code }}"
                                    data-season="{{ $parent->season_code }}"
                                    data-created="{{ $parent->created_at_excel }}"
                                    data-image="{{ $mainImage }}"
                                    data-variants='@json($group)'
                                    data-bs-toggle="modal" data-bs-target="#productModal">

                                    <div class="position-relative">
                                        <img src="{{ $mainImage }}" class="main-image rounded-top-1">
                                        <div class="position-absolute top-0 end-0 me-1 mt-1">
                                            <small class="fw-semibold back-ground text-white rounded-1 p-1">{{ $parent->unit_price }} L.E</small>
                                        </div>
                                        <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                            <small class="fw-semibold back-ground text-white rounded-1 p-1">{{ $parent->product_code }}</small>
                                        </div>
                                        <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                            <small class="fw-semibold back-ground text-white rounded-1 p-1">{{ $parent->item_family_code }}</small>
                                        </div>
                                        <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                            <small class="fw-semibold back-ground text-white rounded-1 p-1">{{ $group->count() }} colors</small>
                                        </div>
                                    </div>
                                    <h4 class="text-center mt-2">{{ $parent->description }}</h4>
                                    <p class="text-center">Gomla: {{ $parent->gomla }}</p>
                                    <div class="row justify-content-center">
                                        @foreach ($group as $variant)
                                            <div class="sub-color position-relative">
                                                <img src="{{ $variant->image_url }}" class="rounded-1">
                                                <div class="position-absolute top-0 end-0 me-1">
                                                    <img src="{{ asset('assets/images/square_14034444.png') }}" class="icon-mark">
                                                </div>
                                                <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                                    <small class="fw-semibold back-ground text-white rounded-1 p-1">{{ $variant->color }}</small>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <div class="alert alert-info">لا يوجد منتجات</div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="productModal" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-center" id="modalVariants"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>

    <style>
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
                const variants = JSON.parse(card.dataset.variants);
                const container = document.getElementById('modalVariants');
                container.innerHTML = '';

                variants.forEach(variant => {
                    const box = document.createElement('div');
                    box.className = 'sub-img position-relative';
                    box.innerHTML = `
                        <img src="${variant.image_url}" class="rounded-1">
                        <div class="position-absolute top-0 end-0 me-1">
                            <img src="/assets/images/square_14034444.png" class="icon-mark">
                        </div>
                        <div class="position-absolute top-0 start-0 ms-1 mt-1">
                            <small class="fw-semibold back-ground text-white rounded-1 p-1">${variant.color}</small>
                        </div>
                        <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                            <small class="fw-semibold back-ground text-white rounded-1 p-1">${variant.no_code}</small>
                        </div>
                        <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                            <small class="fw-semibold back-ground text-white rounded-1 p-1">${variant.quantity}</small>
                        </div>
                    `;
                    container.appendChild(box);
                });
            });
        });
    </script>
@endsection
