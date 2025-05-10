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
                                            <div class="sub-color">
                                                <img src="{{ $variant->image_url }}" alt="variant">
                                                <img src="{{ asset('assets/images/' . ($variant->quantity > 0 ? 'check' : 'cross') . '.png') }}"
                                                     class="icon-mark">
                                                <small class="badge-color back-ground text-white rounded-1">{{ $variant->color }}</small>
                                                <small class="badge-code back-ground text-white rounded-1">{{ $variant->no_code }}</small>
                                                <small class="badge-qty back-ground text-white rounded-1">{{ $variant->quantity }}</small>
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
        .main-image { width: 100%; }
        .last-ui h4 {
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            margin: 10px 0;
            color: black;
        }
        .last-ui p {
            text-align: center;
            font-size: 15px;
            color: rgb(113, 112, 112);
        }
        .sub-color {
            width: 28%;
            margin: 6px;
            position: relative;
        }
        .sub-color img {
            width: 100%;
            display: block;
            border-radius: 0.25rem;
        }
        .icon-mark {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 18px;
            height: 18px;
        }
        .badge-color {
            position: absolute;
            top: 5px;
            left: 5px;
        }
        .badge-code {
            position: absolute;
            bottom: 5px;
            left: 5px;
        }
        .badge-qty {
            position: absolute;
            bottom: 5px;
            right: 5px;
        }
        small {
            font-size: 0.7rem;
            padding: 3px 6px;
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
                            <img src="/assets/images/${variant.quantity > 0 ? 'check' : 'cross'}.png" class="icon-mark">
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
