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

                <h4>
                    @if (auth()->user()->current_lang == 'ar')
                        المنتجات الخاصة بـ
                    @else
                        Products of
                    @endif: {{ $subcategory->name }}
                </h4>

                <form method="GET" class="mb-4 d-flex gap-2 align-items-center">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="@if (auth()->user()->current_lang == 'ar') ابحث باستخدام الاسم - اسم الجملة - الكود @else Search by name - Gomla - code @endif">
                    <button type="submit" class="btn btn-primary">{{ __('messages.search') }}</button>
                    <a href="{{ route('product-knowledge.products', $subcategory->id) }}"
                        class="btn btn-secondary">{{ __('messages.reset') }}</a>
                </form>

            </div>
            @forelse($products as $group)
                @php
                    $parent = $group->firstWhere('image_url') ?? $group->first();
                    $mainImage = $group->firstWhere('image_url')?->image_url;
                    $imageSrc = $mainImage
                        ? (Str::startsWith($mainImage, 'http')
                            ? $mainImage
                            : asset($mainImage))
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
                                {{ __('messages.colors') }}</small>
                        </div>
                        <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                            <small class="fw-semibold back-ground text-white  rounded-1 p-1">
                                @if ($parent->material)
                                    {{ $parent->material }}
                                @else
                                    @if (auth()->user()->current_lang == 'ar')
                                        لا يوجد خامه
                                    @else
                                        No Material
                                    @endif
                                @endif
                            </small>
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

                        @foreach ($group->filter(fn($v) => isset($requestedItems[$v->id]) && $v->image_url)->take(6) as $variant)
                            @php
                                $requestedQty = $requestedItems[$variant->id]->requested_quantity ?? null;
                                $variantImage = Str::startsWith($variant->image_url, 'http')
                                    ? $variant->image_url
                                    : asset($variant->image_url);
                            @endphp

                            <div class="sub-color position-relative">
                                <img src="{{ $variantImage }}" class="rounded-1">
                                <div class="position-absolute top-0 end-0 me-1">
                                    <img src="{{ asset('assets/images/' . ($variant->stock_entries->sum('quantity') > 0 ? 'right.png' : 'wrong.png')) }}"
                                        class="icon-mark">
                                </div>
                                <div class="position-absolute top-0 end-0 me-1 mt-1">
                                    <small class="fw-semibold back-ground text-white rounded-1 p-1">
                                        الكمية: {{ $requestedQty }}
                                    </small>
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
                    <div class="alert alert-info text-center">
                        @if (auth()->user()->current_lang == 'ar')
                            لا يوجد منتجات لهذه الصب كاتيجوري
                        @else
                            There are no products for this subcategory
                        @endif
                    </div>
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
                                <i class="fe fe-save"></i> {{ __('messages.send_request') }}
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

        /* .last-ui .sub-img {
                width: 20%;
                margin: 10px 10px;
                padding: 0px;
            } */

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


        #productModal .modal-body .row {
            gap: 20px 0;
            /* Vertical spacing */
        }

        .sub-img img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
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

                // Group by color_code
                const grouped = variants.reduce((acc, item) => {
                    if (!acc[item.color_code]) acc[item.color_code] = [];
                    acc[item.color_code].push(item);
                    return acc;
                }, {});

                Object.values(grouped).forEach(group => {
                    const display = group.find(v => v.image_url) || group[0];
                    const image = display.image_url ?
                        (display.image_url.startsWith('http') ? display.image_url :
                            `/${display.image_url}`) :
                        '/assets/images/comming.png';

                    const box = document.createElement('div');
                    box.className =
                        'sub-img col-md-4 px-3 mb-4 d-flex flex-column align-items-center';

                    const tableRows = group.map(variant => {
                        let size = variant.size;
                        const standardSizes = ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL',
                            'XXXL'
                        ];
                        if (!size || !standardSizes.includes(size)) {
                            size = variant.size_code || '-';
                        }

                        const stockMap = {
                            1: 0,
                            2: 0
                        };
                        (variant.stock_entries || []).forEach(e => {
                            if (e.stock_id === 1 || e.stock_id === 2) {
                                stockMap[e.stock_id] = e.quantity;
                            }
                        });

                        const requested = requestedItems[variant.id]?.requested_quantity ||
                            '';

                        return `
                        <tr>
                            <td>${variant.no_code}</td>
                            <td>${size}</td>
                            <td>${stockMap[1]}</td>
                            <td>${stockMap[2]}</td>
                            <td>
                                <input type="number" name="quantities[${variant.id}]" min="0" class="form-control form-control-sm" placeholder="0" value="${requested}">
                            </td>
                        </tr>
                    `;
                    }).join('');

                    box.innerHTML = `
                    <div class="text-center mb-3">
                        <img src="${image}" class="rounded-1 w-100 mb-2" style="max-height: 250px; object-fit: contain;">
                        <div class="badge bg-dark">${display.color}</div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ __('messages.code') }}</th>
                                    <th>{{ __('messages.size') }}</th>
                                    <th>{{ __('messages.stock') }}</th>
                                    <th>{{ __('messages.gomla') }}</th>
                                    <th>{{ __('messages.quantity') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                ${tableRows}
                            </tbody>
                        </table>
                    </div>
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
