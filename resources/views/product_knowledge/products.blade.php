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
                            <div class="col-xl-3 col-lg-3 col-md-4 border border-1 pe-0 ps-0  rounded-1 pb-3"
                                data-bs-toggle="modal" data-bs-target="#productModal" style="cursor: pointer;">
                                <div class="position-relative">
                                    <img src="assets/images/m_7299d987-7826-46ab-af41-2f657a3ad97b.webp"
                                        class="main-image rounded-top-1">
                                    <div class="position-absolute top-0 end-0 me-1 mt-1">
                                        <small class="fw-semibold back-ground text-white  rounded-1 p-1">210 L.E</small>
                                    </div>
                                    <div class="position-absolute top-0 start-0 ms-1 mt-1">
                                        <small class="fw-semibold back-ground text-white rounded-1 p-1">120013</small>
                                    </div>
                                    <div class="position-absolute bottom-0 start-0 ms-1 mb-1">
                                        <small class="fw-semibold back-ground text-white  rounded-1 p-1">Chiffon</small>
                                    </div>
                                    <div class="position-absolute bottom-0 end-0 me-1 mb-1">
                                        <small class="fw-semibold back-ground text-white rounded-1 p-1">8 colors</small>
                                    </div>
                                </div>
                                <h4>
                                    Pure Chiffon Crinkle Scarf
                                </h4>
                                <p>
                                    Gomla: دوبيتا كراشد الوان_ (2034)
                                </p>
                                <div class="row justify-content-center">
                                    <div class="sub-color position-relative">
                                        <img src="assets/images/16_c06460f5-9f1a-470e-bf27-411c597e8ab9.webp"
                                            class="rounded-1">
                                        <div class="position-absolute top-0 end-0 me-1">
                                            <img src="assets/images/square_14034444.png" class="icon-mark">
                                        </div>
                                        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-1">
                                            <small class="fw-semibold back-ground text-white rounded-1 p-1">blue</small>
                                        </div>
                                    </div>
                                    <div class="sub-color position-relative">
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
                                    </div>
                                </div>
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
