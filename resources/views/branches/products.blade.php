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
                            <small
                                class="fw-semibold back-ground text-white rounded-1 p-1">{{ $parent->product_code }}</small>
                        </div>
                        <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                            <small
                                class="fw-semibold back-ground text-white  rounded-1 p-1">{{ $parent->material ?? 'لا يوجد خامه' }}</small>
                        </div>
                        <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                            <small class="fw-semibold back-ground text-white rounded-1 p-1">{{ count($group) }}
                                colors</small>
                        </div>
                    </div>
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
                                    <img src="{{ asset('assets/images/' . ($variant->quantity > 0 ? 'right.png' : 'wrong.png')) }}"
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
        document.querySelectorAll('[data-bs-target="#productModal"]').forEach(card => {
            card.addEventListener('click', () => {
                const variants = JSON.parse(card.dataset.variants);
                const container = document.querySelector('#productModal .modal-body .row');
                container.innerHTML = '';

                variants.forEach(variant => {
                    const box = document.createElement('div');
                    box.className = 'sub-img text-center mb-4';

                    box.innerHTML = `
                <div class="position-relative">
                    <img src="${variant.image_url || '/assets/images/comming.png'}" class="rounded-1 mb-2">
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
                        <small class="fw-semibold back-ground text-white rounded-1 p-1">${variant.quantity}</small>
                    </div>
                </div>
                <input type="number" min="0" name="quantities[${variant.id}]" class="form-control mt-2" placeholder="الكمية المطلوبة">
            `;

                    container.appendChild(box);
                });
            });
        });
    </script>
@endsection

)
