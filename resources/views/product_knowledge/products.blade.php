@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.css') }}">
    <style>
        .ms-auto {
            margin-left: 0px !important;
        }

        .slide .side-menu__item {
            text-decoration-line: none !important;
        }
    </style>
@endsection
@section('content')
    <section class="bg-white shadow sm:rounded-lg p-4 last-ui">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">

                <h4>المنتجات الخاصة بـ: {{ $subcategory->name }}</h4>

                <form method="GET" class="mb-4 d-flex gap-2 align-items-center">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="ابحث باستخدام الاسم - اسم الجملة - الكود">
                    <button type="submit" class="btn btn-primary">ابحث</button>
                    <a href="{{ route('product-knowledge.products', $subcategory->id) }}"
                        class="btn btn-secondary">العودة</a>
                </form>

            </div>
            @forelse($products as $group)
                @php
                    $parent = $group->firstWhere('image_url') ?? $group->first();
                    $mainImage = $group->firstWhere('image_url')?->image_url;

                @endphp
                <div class="main-product m-2 border border-1 pe-0 ps-0 pt-0 rounded-1 pb-3"
                    data-variants='@json($group)' data-bs-toggle="modal" data-bs-target="#productModal"
                    style="cursor: pointer;">
                    <div class="position-relative">
                        @if ($mainImage)
                            <img src="{{ $mainImage }}" class="main-image rounded-top-1">
                        @else
                            <img src="{{ asset('assets/images/comming.png') }}" class="main-image rounded-top-1">
                        @endif
                        <div class="position-absolute top-0 end-0 me-1 mt-1">
                            <small
                                class="fw-semibold back-ground text-white  rounded-1 p-1">{{ $parent->unit_price }}</small>
                        </div>
                        <div class="position-absolute top-0 start-0 ms-1 mt-1">
                            <small class="fw-semibold back-ground text-white rounded-1 p-1">{{ count($group) }}
                                colors</small>
                        </div>
                        <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                            <small
                                class="fw-semibold back-ground text-white  rounded-1 p-1">{{ $parent->material ?? 'لا يوجد خامه' }}</small>
                        </div>
                        <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                            <small
                                class="fw-semibold back-ground text-white rounded-1 p-1">{{ $parent->product_code }}</small>
                        </div>
                    </div>
                    {{-- <h4>
                        {{ $parent->no_code }}
                    </h4> --}}
                    <h4>
                        {{ $parent->description }}
                    </h4>
                    <p>
                        {{ $parent->gomla }}
                    </p>
                    <p>
                        {{ $parent->website_description }}
                    </p>
                    <div class="row justify-content-center">
                        @foreach ($group->where('image_url', '!=', null)->take(6) as $variant)
<div class="sub-color position-relative">
                                <img src="{{ $variant->image_url ?? asset('assets/images/comming.png') }}"
                                    class="rounded-1">
                                <div class="position-absolute top-0 end-0 me-1">
                                    @php
                                        $variantQty = $variant->stockEntries->sum('quantity');
                                    @endphp
                                    <img src="{{ asset('assets/images/' . ($variantQty > 0 ? 'right.png' : 'wrong.png')) }}"
                                        class="icon-mark">
                                </div>
                                <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                    <small
                                        class="fw-semibold back-ground text-white rounded-1 p-1">{{ $variant->color }}</small>
                                </div>
                            </div>
@endforeach

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

        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            {{-- <div class="sub-img position-relative">
                                <img src="assets/images/16_c06460f5-9f1a-470e-bf27-411c597e8ab9.webp" class="rounded-1">
                                <div class="position-absolute top-0 end-0 me-1">
                                    <img src="assets/images/square_14034444.png" class="icon-mark">
                                </div>
                                <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                    <small class="fw-semibold back-ground text-white rounded-1 p-1">Navy_215</small>
                                </div>
                                <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                    <small class="fw-semibold back-ground text-white rounded-1 p-1">10512002308298</small>
                                </div>
                                <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                    <small class="fw-semibold back-ground text-white rounded-1 p-1">25</small>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

        .last-ui {
            width: 100%;
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

        .main-product {
            width: 28%;
        }

        @media screen & (max-width: 1000px) {
            .last-ui .sub-img {
                width: 40%;
                margin: 10px 10px;
                padding: 0px;
            }

            .main-product {
                width: 100%;
            }
        }
    </style>
@endsection


@section('scripts')
    <script>
        const isAdmin = {{ auth()->user()->id == 1 ? 'true' : 'false' }};

        document.querySelectorAll('[data-bs-target="#productModal"]').forEach(card => {
            card.addEventListener('click', () => {
                const variants = JSON.parse(card.dataset.variants);
                const container = document.querySelector('#productModal .modal-body .row');
                container.innerHTML = '';

                // Group by no_code
                const grouped = variants.reduce((acc, item) => {
                    if (!acc[item.no_code]) acc[item.no_code] = [];
                    acc[item.no_code].push(item);
                    return acc;
                }, {});

                Object.values(grouped).forEach(group => {
                    // sort to show المخزن فوق
                    // group.sort((a, b) => a.stock_id - b.stock_id);

                    const first = group[0]; // use one for image/color display

                    const box = document.createElement('div');
                    box.className = 'sub-img position-relative';

                    let stockMap = {
                        1: 'مخزن',
                        2: 'جملة'
                    };

                    // خريطة فيها الكميات حسب stock_id
                    let entryMap = {};
                    (first.stock_entries || []).forEach(q => {
                        entryMap[q.stock_id] = q.quantity;
                    });

                    // نحضر القيم الثابتة (1 للمخزن، 2 للجملة)
                    let lines = [1, 2].map(id => {
                        let label = stockMap[id] || 'غير محدد';
                        let quantity = entryMap[id] !== undefined ? entryMap[id] : 0;
                        return `<div><small class="fw-semibold back-ground text-white rounded-1 p-1 mb-1">${label} - ${quantity}</small></div>`;
                    }).join('');


                    const totalQty = (first.stockEntries || []).reduce((sum, q) => sum + q.quantity,
                        0);


                    box.innerHTML = `
                    <div class="position-relative">
                        <img src="${first.image_url || '/assets/images/comming.png'}" class="rounded-1">
                        <div class="position-absolute top-0 end-0 me-1">
                            <img src="/assets/images/${totalQty > 0 ? 'right.png' : 'wrong.png'}" class="icon-mark">
                        </div>
                        <div class="position-absolute top-0 start-0 ms-1 mt-1">
                            <small class="fw-semibold back-ground text-white rounded-1 p-1">${first.color}</small>
                        </div>
                        <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                            <small class="fw-semibold back-ground text-white rounded-1 p-1">${first.product_code}</small>
                        </div>
                        ${isAdmin ? `
                                            <div class="position-absolute bottom-0 end-0 me-1 mb-1 text-end">
                                                ${lines}
                                            </div>` : ''}
                    </div>
                    <h4 class="text-center mt-2">${first.no_code}</h4>
                `;

                    container.appendChild(box);
                });
            });
        });
    </script>
@endsection

{{-- @section('scripts')
    <script>
        document.querySelectorAll('[data-bs-target="#productModal"]').forEach(card => {
            card.addEventListener('click', () => {
                const variants = JSON.parse(card.dataset.variants);
                const container = document.querySelector('#productModal .modal-body .row');
                container.innerHTML = '';

                variants.forEach(variant => {
                    const box = document.createElement('div');
                    box.className = 'sub-img position-relative';

                    box.innerHTML = `
                        <div class="position-relative">
                            <img src="${variant.image_url || '/assets/images/comming.png'}" class="rounded-1">
                            <div class="position-absolute top-0 end-0 me-1">
                                <img src="/assets/images/${variant.quantity > 0 ? 'right.png' : 'wrong.png'}" class="icon-mark">
                            </div>
                            <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                <small class="fw-semibold back-ground text-white rounded-1 p-1">${variant.color}</small>
                            </div>
                            <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                <small class="fw-semibold back-ground text-white rounded-1 p-1">${variant.product_code}</small>
                            </div>
                            <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                <small class="fw-semibold back-ground text-white rounded-1 p-1">
                                    ${variant.stock_id == 1 ? 'مخزن' : 'جملة'} - ${variant.quantity}
                                </small>
                            </div>
                        </div>
                        <h4 class="text-center mt-2">${variant.no_code}</h4>
                    `;


                    container.appendChild(box);
                });
            });
        });
    </script>
@endsection --}}
)
