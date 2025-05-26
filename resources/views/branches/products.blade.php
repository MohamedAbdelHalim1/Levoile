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
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

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
                    $imageSrc = $mainImage
                        ? (Str::startsWith($mainImage, 'http') ? $mainImage : asset($mainImage))
                        : asset('assets/images/comming.png');
                @endphp
                <div class="main-product m-2 border border-1 pe-0 ps-0 pt-0 rounded-1 pb-3"
                    data-variants='@json($group)' data-bs-toggle="modal" data-bs-target="#productModal"
                    style="cursor: pointer;">
                    <div class="position-relative">
                        <img src="{{ $imageSrc }}" class="main-image rounded-top-1">

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
                            
                                @php
                                    $requestedQty = $requestedItems[$variant->id]->requested_quantity ?? null;
                                @endphp

                                @if ($requestedQty)
                                <div class="sub-color position-relative">
                                        @php
                                            $variantImage = $variant->image_url
                                                ? (Str::startsWith($variant->image_url, 'http')
                                                    ? $variant->image_url
                                                    : asset($variant->image_url))
                                                : asset('assets/images/comming.png');
                                        @endphp

                                        <img src="{{ $variantImage }}" class="rounded-1">
                                        <div class="position-absolute top-0 end-0 me-1">
                                            <img src="{{ asset('assets/images/' . ($variant->stock_entries->sum('quantity') > 0 ? 'right.png' : 'wrong.png')) }}" class="icon-mark">
                                        </div>
                                        <div class="position-absolute top-0 end-0 me-1 mt-1">
                                            <small class="fw-semibold back-ground text-white rounded-1 p-1">
                                                الكمية: {{ $requestedQty }}
                                            </small>
                                        </div>
                                        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                            <small class="fw-semibold back-ground text-white rounded-1 p-1">{{ $variant->color }}</small>
                                        </div>
                                    </div>
                                @endif
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
        <form method="POST" action="{{ route('branch.orders.save.items') }}">
            @csrf
            <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fe fe-save"></i> إرسال الطلب
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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

        .alert.fade {
            opacity: 0;
            transition: opacity 0.5s ease-out;
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
    </script>

                <script>
                    const requestedItems = @json($requestedItems);

                    document.querySelectorAll('[data-bs-target="#productModal"]').forEach(card => {
                        card.addEventListener('click', () => {
                            const variants = JSON.parse(card.dataset.variants);
                            const container = document.querySelector('#productModal .modal-body .row');
                            container.innerHTML = '';

                            variants.sort((a, b) => (a.color || '').localeCompare(b.color || ''));


                            const groupedByNoCode = variants.reduce((acc, variant) => {
                                if (!acc[variant.no_code]) acc[variant.no_code] = [];
                                acc[variant.no_code].push(variant);
                                return acc;
                            }, {});

                            Object.values(groupedByNoCode).forEach(group => {
                                // sort to show مخزن فوق
                                // group.sort((a, b) => a.stock_id - b.stock_id);

                                const first = group[0];
                                const box = document.createElement('div');
                                box.className = 'sub-img text-center mb-4';

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
                                    return `<div class="mt-1"><small class="fw-semibold back-ground text-white rounded-1 p-1">${label} - ${quantity}</small></div>`;
                                }).join('');


                                const totalQty = (first.stock_entries || []).reduce((sum, q) => sum + q
                                    .quantity, 0);

                                    let imgSrc = first.image_url
                                    ? (first.image_url.startsWith('http') ? first.image_url : `/${first.image_url}`)
                                    : '/assets/images/comming.png';



                                box.innerHTML = `
                    <div class="position-relative">
                        <img src="${imgSrc}" class="rounded-1 mb-2">
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
                                                                    <div class="position-absolute bottom-0 end-0 me-1 mb-1 text-end" style="z-index: 5;">
                                                                        ${lines}
                                                                    </div>` 
                            : `
                                                                    <div class="position-absolute bottom-0 end-0 me-1 mb-1 text-end" style="z-index: 5;">
                                                                        <small class="fw-semibold back-ground text-white rounded-1 p-1">
                                                                            ${group.reduce((sum, v) => sum + (v.quantity ?? 0), 0)}
                                                                        </small>
                                                                    </div>`
                        }

                    </div>
                    <h4 class="text-center mt-2">${first.no_code}</h4>


                    <input type="number" min="0" name="quantities[${first.id}]" class="form-control mt-2" placeholder="الكمية المطلوبة">
                    ${requestedItems[first.id] ? `
                                                                <span class="badge bg-success mt-2">
                                                                    ✅ تم الطلب (${requestedItems[first.id].requested_quantity})
                                                                </span>` : ''}
                `;

                                container.appendChild(box);
                            });

                        });
                    });
                </script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const alerts = document.querySelectorAll('.alert');
                        alerts.forEach(alert => {
                            setTimeout(() => {
                                alert.classList.add('fade');
                                setTimeout(() => alert.remove(), 500); // Remove from DOM
                            }, 3000); // بعد 3 ثواني
                        });
                    });
                </script>
@endsection
)
