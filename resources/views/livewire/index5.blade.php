@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard05</li>
                                </ol><!-- End breadcrumb -->
                                <div class="ms-auto">
                                    <div>
                                        <a href="javascript:void(0);" class="btn bg-secondary-transparent text-secondary btn-sm"
                                            data-bs-toggle="tooltip" title="" data-bs-placement="bottom"
                                            data-bs-original-title="Rating">
                                            <span>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </a>
                                        <a href="{{url('lockscreen')}}" class="btn bg-primary-transparent text-primary mx-2 btn-sm"
                                            data-bs-toggle="tooltip" title="" data-bs-placement="bottom"
                                            data-bs-original-title="lock">
                                            <span>
                                                <i class="fa fa-lock"></i>
                                            </span>
                                        </a>
                                        <a href="javascript:void(0);" class="btn bg-warning-transparent text-warning btn-sm" data-bs-toggle="tooltip"
                                            title="" data-bs-placement="bottom" data-bs-original-title="Add New">
                                            <span>
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End PAGE HEADER -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-xxl-3 col-xl-4 col-md-12">
                                    <div class="row row-cols-xxl-5 row-cols-xl-3 row-cols-md-2">
                                        <div class="col">
                                            <div class="card overflow-hidden text-nowrap">
                                                <div class="card-body d-flex justify-content-between align-items-center">
                                                    <div class="bitcoin d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"  class="bg-primary-transparent p-2 br-7"><circle cx="50" cy="50" r="49" fill="#345d9d"/><path fill="#fff" d="M78.929 67.257a1.501 1.501 0 0 0-1.15-.604c-9.834-.348-19.475-.528-28.824-.694 1.015-4.214 2.219-8.517 3.378-12.788.111-.132.297-.308.325-.331 1.263-.518 2.568-1.052 3.769-1.381 3.707-.887 5.815-3.083 6.262-6.502.192-1.207.79-2.563 1.107-3.835.328-1.108-.846-2.209-1.931-1.801a129.752 129.752 0 0 0-6.411 2.344c.423-1.595.84-3.177 1.254-4.748 1.362-5.167 2.648-10.048 4.042-15.012A1.5 1.5 0 0 0 59.305 20H42.024c-1.981 0-3.021.807-3.362 2.614l-7.957 28.25c-.024.102-.03.225-.151.248-1.658.693-3.508 1.249-5.212 1.946-.961.113-1.886.688-2.067 1.668a92.007 92.007 0 0 0-2.445 7.577 1.5 1.5 0 0 0 2.014 1.791 166.4 166.4 0 0 1 4.828-1.912c-.604 2.211-1.207 4.39-1.81 6.568-.855 3.09-1.711 6.179-2.567 9.359A1.503 1.503 0 0 0 24.743 80h48.996c.687 0 2.51 0 2.987-2.282.292-1.394.712-2.707 1.156-4.097l.326-1.025a1.45 1.45 0 0 0 .052-.228c.139-.928.392-1.871.685-2.963l.232-.873a1.5 1.5 0 0 0-.248-1.275z"/></svg>
                                                        <div>
                                                            <p class="mb-1 ms-3 fw-semibold">Litecoin</p>
                                                            <h6 class="mb-0 text-dark ms-3 fw-bold">$ 364,248</h6>
                                                        </div>
                                                    </div>
                                                    <div id="litcoinChart"></div>
                                                    <span class="text-primary fw-semibold fs-13 mt-2">+2.12%<i class="bi bi-arrow-up-right ms-1 fs-10"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card overflow-hidden text-nowrap">
                                                <div class="card-body d-flex justify-content-between align-items-center">
                                                    <div class="bitcoin d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="2500" height="2500"
                                                            viewBox=".004 0 63.993 64" class="bg-orange-transparent p-2 br-7">
                                                            <path fill="#f7931a"
                                                                d="M63.04 39.741c-4.274 17.143-21.638 27.575-38.783 23.301C7.12 58.768-3.313 41.404.962 24.262 5.234 7.117 22.597-3.317 39.737.957c17.144 4.274 27.576 21.64 23.302 38.784z" />
                                                            <path fill="#fff"
                                                                d="M46.11 27.441c.636-4.258-2.606-6.547-7.039-8.074l1.438-5.768-3.512-.875-1.4 5.616c-.922-.23-1.87-.447-2.812-.662l1.41-5.653-3.509-.875-1.439 5.766c-.764-.174-1.514-.346-2.242-.527l.004-.018-4.842-1.209-.934 3.75s2.605.597 2.55.634c1.422.355 1.68 1.296 1.636 2.042l-1.638 6.571c.098.025.225.061.365.117l-.37-.092-2.297 9.205c-.174.432-.615 1.08-1.609.834.035.051-2.552-.637-2.552-.637l-1.743 4.02 4.57 1.139c.85.213 1.683.436 2.502.646l-1.453 5.835 3.507.875 1.44-5.772c.957.26 1.887.5 2.797.726L27.504 50.8l3.511.875 1.453-5.823c5.987 1.133 10.49.676 12.383-4.738 1.527-4.36-.075-6.875-3.225-8.516 2.294-.531 4.022-2.04 4.483-5.157zM38.087 38.69c-1.086 4.36-8.426 2.004-10.807 1.412l1.928-7.729c2.38.594 10.011 1.77 8.88 6.317zm1.085-11.312c-.99 3.966-7.1 1.951-9.083 1.457l1.748-7.01c1.983.494 8.367 1.416 7.335 5.553z" />
                                                        </svg>
                                                        <div>
                                                            <p class="mb-1 ms-3 fw-semibold">Bitcoin</p>
                                                            <h6 class="mb-0 text-dark ms-3 fw-bold">$ 942,689</h6>
                                                        </div>
                                                    </div>
                                                    <div id="bitcoinChart"></div>
                                                    <span class="text-orange fw-semibold fs-13 mt-2">+0.12%<i class="bi bi-arrow-up-right ms-1 fs-10"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card overflow-hidden text-nowrap">
                                                <div class="card-body d-flex justify-content-between align-items-center">
                                                    <div class="bitcoin d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1174.81 1174.81"  class="bg-warning-transparent p-2 br-7">
                                                            <g data-name="Layer 2">
                                                                <g data-name="Layer 1">
                                                                    <path fill="#efac4a"
                                                                        d="M1174.81,586.87c0,325.08-262.86,587.94-587.94,587.94a608.78,608.78,0,0,1-77.25-5.36C222.09,1131.9,0,885.13,0,586.87S222.09,42.93,509.62,5.36A610.63,610.63,0,0,1,586.87,0C912,0,1174.81,262.87,1174.81,586.87Z" />
                                                                    <path fill="#ffcb72"
                                                                        d="M1073.79,586.63c0,307.21-233.79,558-533.37,585.64-10.57-.59-20.56-1.76-30.54-2.94C222.05,1131.74,0,885,0,586.63S222.05,42.7,509.88,5.09c10-1.17,20-2.34,30.54-2.93C840,29.77,1073.79,280.59,1073.79,586.63Z" />
                                                                    <path fill="#faa526"
                                                                        d="M776.22,817.63H367.14a29.38,29.38,0,1,1,0-58.75H750.42L793.15,427.4h-382a29.37,29.37,0,1,1,0-58.74H826.56a29.4,29.4,0,0,1,29.14,33.12L805.36,792A29.37,29.37,0,0,1,776.22,817.63Z" />
                                                                    <path fill="#faa526"
                                                                        d="M509.62,622.51H316.79a29.38,29.38,0,0,1,0-58.75H509.62a29.38,29.38,0,0,1,0,58.75Z" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <div>
                                                            <p class="mb-1 ms-3	 fw-semibold">Enthereum</p>
                                                            <h6 class="mb-0 text-dark ms-3 fw-bold">$ 642,424</h6>
                                                        </div>
                                                    </div>
                                                    <div id="enthereumChart"></div>
                                                    <span class="text-warning fw-semibold fs-13 mt-2">+8.12%<i class="bi bi-arrow-up-right ms-1 fs-10"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12  col-lg-12 col-md-12 col-sm-12">
                                            <div class="card overflow-hidden">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h3 class="card-title">Trade Activity</h3>
                                                    <div class="dropdown">
                                                        <button type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" class="btn btn-outline-default fs-13 text-dark btn-sm fw-semibold d-flex align-items-center dropdown-toggle" aria-expanded="false">Today</button>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Minutes</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Hours</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body trading-activity">
                                                    <div class="table-responsive">
                                                        <table class="table text-nowrap mb-0">
                                                            <thead class="tabel-row-heading bg-light">
                                                                <tr>
                                                                    <th class="fw-bold text-muted fs-13 border-0">
                                                                        Type</th>
                                                                    <th class="fw-bold text-muted fs-13 border-0">
                                                                        Bet</th>
                                                                    <th class="fw-bold text-muted fs-13 border-0">
                                                                        Time</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-dark">
                                                                <tr class="border-bottom-0">
                                                                    <td class="fw-semibold">Short</td>
                                                                    <td class="fw-semibold text-success">+ $2,943.00 <i class="fe fe-arrow-up"></i></td>
                                                                    <td class="fw-semibold">19:34:13</td>
                                                                </tr>
                                                                <tr class="border-bottom-0 bg-light text-dark br-7">
                                                                    <td class="fw-semibold">Long</td>
                                                                    <td class="fw-semibold text-danger">- $8,291.00 <i class="fe fe-arrow-down"></i></td>
                                                                    <td class="fw-semibold">19:34:13</td>
                                                                </tr>
                                                                <tr class="border-bottom-0">
                                                                    <td class="fw-semibold">Short</td>
                                                                    <td class="fw-semibold text-success">+ $5,375.00 <i class="fe fe-arrow-up"></i></td>
                                                                    <td class="fw-semibold">19:34:13</td>
                                                                </tr>
                                                                <tr class="border-bottom-0 bg-light text-dark br-7">
                                                                    <td class="fw-semibold">Long</td>
                                                                    <td class="fw-semibold text-danger">- $8,508.00 <i class="fe fe-arrow-down"></i></td>
                                                                    <td class="fw-semibold">19:34:13</td>
                                                                </tr>
                                                                <tr class="border-bottom-0">
                                                                    <td class="fw-semibold">Short</td>
                                                                    <td class="fw-semibold text-success">+ $2,943.00 <i class="fe fe-arrow-up"></i></td>
                                                                    <td class="fw-semibold">19:34:13</td>
                                                                </tr>
                                                                <tr class="border-bottom-0 bg-light text-dark br-7">
                                                                    <td class="fw-semibold">Long</td>
                                                                    <td class="fw-semibold text-danger">- $8,291.00 <i class="fe fe-arrow-down"></i></td>
                                                                    <td class="fw-semibold">19:34:13</td>
                                                                </tr>
                                                                <tr class="border-bottom-0">
                                                                    <td class="fw-semibold">Short</td>
                                                                    <td class="fw-semibold text-success">+ $5,375.00 <i class="fe fe-arrow-up"></i></td>
                                                                    <td class="fw-semibold">19:34:13</td>
                                                                </tr>
                                                                <tr class="border-bottom-0 bg-light text-dark br-7">
                                                                    <td class="fw-semibold">Long</td>
                                                                    <td class="fw-semibold text-danger">- $8,508.00 <i class="fe fe-arrow-down"></i></td>
                                                                    <td class="fw-semibold">19:34:13</td>
                                                                </tr>
                                                                <tr class="border-bottom-0">
                                                                    <td class="fw-semibold">Short</td>
                                                                    <td class="fw-semibold text-success">+ $8,291.00 <i class="fe fe-arrow-up"></i></td>
                                                                    <td class="fw-semibold">19:34:13</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-9 col-xl-8 col-md-12">
                                    <div class="row row-sm">
                                        <div class="col-xxl-8 col-xl-7 col-md-12">
                                            <div class="card overflow-hidden">
                                                <div
                                                    class="card-header border-bottom-light">
                                                    <h3 class="card-title">Market Graph</h3>
                                                    <div class="d-sm-flex ms-auto">
                                                        <div class="btn-group mx-3">
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-light">Day</a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-light">Week</a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary active" aria-current="page">Month</a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-light">Year</a>
                                                        </div>
                                                        <div class="dropdown mt-2 mt-sm-0 ms-2">
                                                            <button
                                                                class="btn btn-outline-default btn-sm fw-semibold d-flex align-items-center dropdown-toggle"
                                                                type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                Bitcoin
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                                                <li><a class="dropdown-item" href="javascript:void(0);">Litecoin</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);">Enthereum</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div id="marketChart"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-5 col-md-12">
                                            <div class="card overflow-hidden">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h3 class="card-title">Trading</h3>
                                                    <ul class="nav nav-pills nav-fill trade-tabs bg-light br-7">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" aria-current="page" href="#Active"
                                                                data-bs-toggle="tab">Buy</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#Complete"
                                                                data-bs-toggle="tab">Sell</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="Active">
                                                            <div
                                                                class="d-flex fw-semibold px-5 my-4 justify-content-between align-items-center">
                                                                <p class="mb-0 fw-semibold text-success">Buy Coin</p>
                                                                <span class="fw-bold"><i
                                                                        class="fe text-info me-2 fe-credit-card"></i>
                                                                    $4235.68</span>
                                                            </div>
                                                            <div class="form-group mb-2 px-5">
                                                                <label>Payment Method:</label>
                                                                <select class="form-select select2">
                                                                    <option>Credit / Debit Card</option>
                                                                    <option>Paypal</option>
                                                                </select>
                                                            </div>
                                                            <div class="px-5">
                                                                <label>Add Amount:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        aria-label="Text input with dropdown button">
                                                                    <button class="btn amount-drop-down dropdown-toggle"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">BTC</button>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);">ETH</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);">LTC</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3 px-5">
                                                                <span class="input-group-text bg-primary">Price</span>
                                                                <input type="text" class="form-control"
                                                                    aria-label="Amount (to the nearest dollar)">
                                                                <span class="input-group-text bg-primary">$</span>
                                                            </div>
                                                            <div class="input-group mb-4 px-5">
                                                                <span class="input-group-text bg-primary">Total</span>
                                                                <input type="text" class="form-control"
                                                                    aria-label="Amount (to the nearest dollar)">
                                                            </div>
                                                            <div class="text-center mb-4">
                                                                <button type="button" class="button-buy btn btn-sm btn-success">Buy Coin</button>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="Complete">
                                                            <div
                                                                class="d-flex fw-semibold px-5 my-4 justify-content-between align-items-center">
                                                                <p class="mb-0 fw-semibold text-danger">Sell Coin</p>
                                                                <span class="fw-bold"><i
                                                                        class="fe text-primary me-2 fe-credit-card"></i>
                                                                    $4235.68</span>
                                                            </div>
                                                            <div class="form-group mb-2 px-5">
                                                                <label>Email:</label>
                                                                <input type="text" class="form-control" placeholder="">
                                                            </div>
                                                            <div class="px-5">
                                                                <label>Add Amount:</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        aria-label="Text input with dropdown button">
                                                                    <button class="btn amount-drop-down dropdown-toggle"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false">ETH</button>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);">BTC</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);">LTC</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="input-group mb-3 px-5">
                                                                <span class="input-group-text">Price</span>
                                                                <input type="text" class="form-control"
                                                                    aria-label="Amount (to the nearest dollar)">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <div class="input-group mb-4 px-5">
                                                                <span class="input-group-text">Total</span>
                                                                <input type="text" class="form-control"
                                                                    aria-label="Amount (to the nearest dollar)">
                                                            </div>
                                                            <div class="text-center mb-4">
                                                                <button type="button" class="button-sell btn btn-sm btn-danger">Sell Coin</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-md-12 col-lg-12 col-sm-12">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center border-bottom-0">
                                                    <h3 class="card-title">Market Value</h3>
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-outline-default fs-13 fw-semibold btn-sm dropdown-toggle"
                                                            type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Last Month
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Yearly</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="table-responsive">
                                                        <table class="table border text-nowrap mb-0">
                                                            <thead class="tabel-row-heading bg-light">
                                                                <tr>
                                                                    <th class="fw-semibold text-dark border-bottom-0 fs-13">
                                                                        Coin</th>
                                                                    <th class="fw-semibold text-dark border-bottom-0 fs-13">
                                                                        Assets Price</th>
                                                                    <th class="fw-semibold text-dark border-bottom-0 fs-13">
                                                                        Change</th>
                                                                    <th class="fw-semibold text-end text-dark border-bottom-0 fs-13">
                                                                        Action</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody class="text-dark">
                                                                <tr class="border-bottom">
                                                                    <td>
                                                                        <div class="bitcoin d-flex align-items-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="2500"
                                                                                height="2500" viewBox=".004 0 63.993 64">
                                                                                <path fill="#f7931a"
                                                                                    d="M63.04 39.741c-4.274 17.143-21.638 27.575-38.783 23.301C7.12 58.768-3.313 41.404.962 24.262 5.234 7.117 22.597-3.317 39.737.957c17.144 4.274 27.576 21.64 23.302 38.784z" />
                                                                                <path fill="#fff"
                                                                                    d="M46.11 27.441c.636-4.258-2.606-6.547-7.039-8.074l1.438-5.768-3.512-.875-1.4 5.616c-.922-.23-1.87-.447-2.812-.662l1.41-5.653-3.509-.875-1.439 5.766c-.764-.174-1.514-.346-2.242-.527l.004-.018-4.842-1.209-.934 3.75s2.605.597 2.55.634c1.422.355 1.68 1.296 1.636 2.042l-1.638 6.571c.098.025.225.061.365.117l-.37-.092-2.297 9.205c-.174.432-.615 1.08-1.609.834.035.051-2.552-.637-2.552-.637l-1.743 4.02 4.57 1.139c.85.213 1.683.436 2.502.646l-1.453 5.835 3.507.875 1.44-5.772c.957.26 1.887.5 2.797.726L27.504 50.8l3.511.875 1.453-5.823c5.987 1.133 10.49.676 12.383-4.738 1.527-4.36-.075-6.875-3.225-8.516 2.294-.531 4.022-2.04 4.483-5.157zM38.087 38.69c-1.086 4.36-8.426 2.004-10.807 1.412l1.928-7.729c2.38.594 10.011 1.77 8.88 6.317zm1.085-11.312c-.99 3.966-7.1 1.951-9.083 1.457l1.748-7.01c1.983.494 8.367 1.416 7.335 5.553z" />
                                                                            </svg>
                                                                            <p class="mb-0 ms-2 fw-semibold">Bitcoin/BTC</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="fs-13 fw-semibold">$58,493.09</td>
                                                                    <td class="text-success fs-13 fw-semibold">+2.46%</td>
                                                                    <td class="text-end">
                                                                        <span class="badge bg-info fs-12">
                                                                            Trade</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border-bottom">
                                                                    <td>
                                                                        <div class="bitcoin d-flex align-items-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="64"
                                                                                height="65" viewBox="0 0 64 65">
                                                                                <path fill="#3A74BE" fill-rule="nonzero"
                                                                                    d="M31.7.8C14.2.8 0 15 0 32.5s14.2 31.7 31.7 31.7S63.4 50 63.4 32.5 49.2.8 31.7.8zm-19 34.3v-.2c.3-.8.6-1.6.9-2.5.3-.8.5-1.6.8-2.4.1-.2.2-.3.4-.3h13.5c0 .1-.1.3-.1.4l-1.5 4.5c-.1.3-.2.4-.6.4h-13c-.1.1-.3.1-.4.1zm38-9.2c-1.3 4-2.6 8-3.9 12.1-.8 2.5-4.2 5.8-7.9 5.7-8.3-.1-16.6 0-24.8 0h-.5c.1-.3.2-.6.3-.8.5-1.4 1-2.9 1.4-4.3.1-.4.3-.4.6-.4h22.4c.3 0 .5-.1.6-.4 1.1-3.5 2.3-7 3.4-10.5 0-.1.1-.2.1-.4H19.1c0-.2.1-.3.1-.4.5-1.6 1.1-3.2 1.6-4.8.1-.3.2-.4.5-.4h25.2c.5 0 1.1.1 1.6.2 1.4.5 2.2 1.5 2.5 2.9 0 .1.1.2.1.3v1.2z" />
                                                                            </svg>
                                                                            <p class="mb-0 ms-2 fw-semibold">Dash</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="fs-13 fw-semibold">$35,493.11</td>
                                                                    <td class="text-success fs-13 fw-semibold">+3.25%</td>
                                                                    <td class="text-end">
                                                                        <span class="badge bg-info fs-12">Trade</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border-bottom">
                                                                    <td>
                                                                        <div class="bitcoin d-flex align-items-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="512"
                                                                                height="512" viewBox="0 0 512 512">
                                                                                <defs>
                                                                                    <linearGradient id="a" x1=".5" x2=".5" y2="1"
                                                                                        gradientUnits="objectBoundingBox">
                                                                                        <stop offset="0" stop-color="#ffb508" />
                                                                                        <stop offset="1" stop-color="#fc2a02" />
                                                                                    </linearGradient>
                                                                                </defs>
                                                                                <g transform="translate(-14960 -4001)">
                                                                                    <circle cx="256" cy="256" r="256" fill="url(#a)"
                                                                                        data-name="Ellipse 22-2"
                                                                                        transform="translate(14960 4001)" />
                                                                                    <g transform="translate(12886 402.909)">
                                                                                        <path fill="#fff"
                                                                                            d="M2264.252,3826.919l65.555-65.528,65.582,65.582,38.123-38.15-103.705-103.732-103.7,103.7Z"
                                                                                            data-name="Path 323" />
                                                                                        <path fill="#fff"
                                                                                            d="M2161,3853.872l38.123-38.15,38.15,38.15L2199.123,3892Z"
                                                                                            data-name="Path 324" />
                                                                                        <path fill="#fff"
                                                                                            d="M2264.252,3880.8l65.556,65.556,65.582-65.583,38.15,38.1L2329.834,4022.6,2226.1,3918.948Z"
                                                                                            data-name="Path 325" />
                                                                                        <path fill="#fff"
                                                                                            d="M2422.263,3853.872l38.123-38.15,38.15,38.123-38.15,38.177Z"
                                                                                            data-name="Path 326" />
                                                                                        <path fill="#fff"
                                                                                            d="M2368.491,3853.846l-38.683-38.71-28.606,28.606-3.306,3.279-6.771,6.771,38.683,38.656,38.683-38.576Z"
                                                                                            data-name="Path 327" />
                                                                                    </g>
                                                                                </g>
                                                                            </svg>
                                                                            <p class="mb-0 ms-2 fw-semibold">Binance coin/BNB</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="fs-13 fw-semibold">$48,483.56</td>
                                                                    <td class="text-success fs-13 fw-semibold">+3.60%</td>
                                                                    <td class="text-end">
                                                                        <span class="badge bg-info fs-12">Trade</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border-bottom">
                                                                    <td>
                                                                        <div class="bitcoin d-flex align-items-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="49" fill="#345d9d"/><path fill="#fff" d="M78.929 67.257a1.501 1.501 0 0 0-1.15-.604c-9.834-.348-19.475-.528-28.824-.694 1.015-4.214 2.219-8.517 3.378-12.788.111-.132.297-.308.325-.331 1.263-.518 2.568-1.052 3.769-1.381 3.707-.887 5.815-3.083 6.262-6.502.192-1.207.79-2.563 1.107-3.835.328-1.108-.846-2.209-1.931-1.801a129.752 129.752 0 0 0-6.411 2.344c.423-1.595.84-3.177 1.254-4.748 1.362-5.167 2.648-10.048 4.042-15.012A1.5 1.5 0 0 0 59.305 20H42.024c-1.981 0-3.021.807-3.362 2.614l-7.957 28.25c-.024.102-.03.225-.151.248-1.658.693-3.508 1.249-5.212 1.946-.961.113-1.886.688-2.067 1.668a92.007 92.007 0 0 0-2.445 7.577 1.5 1.5 0 0 0 2.014 1.791 166.4 166.4 0 0 1 4.828-1.912c-.604 2.211-1.207 4.39-1.81 6.568-.855 3.09-1.711 6.179-2.567 9.359A1.503 1.503 0 0 0 24.743 80h48.996c.687 0 2.51 0 2.987-2.282.292-1.394.712-2.707 1.156-4.097l.326-1.025a1.45 1.45 0 0 0 .052-.228c.139-.928.392-1.871.685-2.963l.232-.873a1.5 1.5 0 0 0-.248-1.275z"/>
                                                                            </svg>
                                                                            <p class="mb-0 ms-2 fw-semibold">Litecoin/LTC</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="fs-13 fw-semibold">$58,493.09</td>
                                                                    <td class="text-success fs-13 fw-semibold">+4.65%</td>
                                                                    <td class="text-end">
                                                                        <span class="badge bg-info fs-12">Trade</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="bitcoin d-flex align-items-center">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="64"
                                                                                height="65" viewBox="0 0 64 65">
                                                                                <g fill="none" fill-rule="nonzero">
                                                                                    <circle cx="32.2" cy="32.4" r="31.7"
                                                                                        fill="#F8BF1A" />
                                                                                    <path fill="#FFF"
                                                                                        d="M14.6 50.2v-8.4h4.9V22.6h-4.9v-8.1h20.5c1.4 0 2.8.4 4.1.9 2.6 1 4.9 2.5 6.7 4.7 1.6 1.9 2.7 4.1 3.3 6.6 1 4.2 1 8.5-.2 12.7-1.6 5.5-5 9.2-10.8 10.5-1 .2-2.1.3-3.1.4H15.4c-.3-.1-.5-.1-.8-.1zm14.9-8.4c1.1 0 2.2.1 3.3 0 1.4-.1 2.7-.6 3.6-1.8.8-1 1.5-2.1 1.9-3.3.8-2.7.5-5.4-.1-8.1-.3-1.6-1.1-3.1-2.1-4.3-.6-.7-1.4-1.5-2.3-1.6-1.4-.3-2.9-.1-4.3-.1v19.2z" />
                                                                                </g>
                                                                            </svg>
                                                                            <p class="mb-0 ms-2 fw-semibold">Dogecoin/DOGE</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="fs-13 fw-semibold">$68,423.16</td>
                                                                    <td class="text-success fs-13 fw-semibold">+2.48%</td>
                                                                    <td class="text-end">
                                                                        <span class="badge bg-info fs-12">Trade</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-md-12 col-lg-12 col-sm-12">
                                            <div class="card overflow-hidden">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h3 class="card-title">Recent Activity</h3>
                                                    <div class="dropdown">
                                                        <button type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" class="btn btn-outline-default fs-13 text-dark btn-sm fw-semibold d-flex align-items-center dropdown-toggle" aria-expanded="false">Today</button>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton4">
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Minutes</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Hours</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table border-0 mb-0 text-nowrap text-dark">
                                                            <tr class="border-bottom">
                                                                <td class="recent-activity d-inline-flex border-bottom-0 ps-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
                                                                        <path fill="#f89f36"
                                                                            d="M109.8 75.7c-.8-5.7-3.6-10.1-8.6-13-2.3-1.3-4.8-2.2-7.4-3.3.3-.2.5-.4.7-.5 12.5-6.4 11.4-25.7 2.3-32.3-3.7-2.7-7.8-4.4-12.1-5.4-3.1-.7-6.2-1.2-9.4-1.7 0-5.6.1-13.3.1-19.5H63.7c-.1 6.1-.1 13.6-.2 19.1h-9.4c0-5.5.1-13 .1-19.1H42.6c-.1 6.2-.1 13.9-.2 19.4-8-.1-15.7-.1-23.7-.2 0 4.3-.1 8.3-.1 12.5 1.7 0 3.2 0 4.6.1 1.5 0 3 0 4.4.1 4.1.3 6.2 2.6 6.2 6.6-.2 16.7-.4 33.5-.5 50.2 0 3.7-1.6 5.1-5.2 5.1h-7.8c-.8 4.7-1.6 9.2-2.4 13.9 7.9.1 15.7.2 23.7.3 0 6-.1 13.6-.1 19.9h11.7c.1-6.3.1-13.7.2-19.6 3.3.1 6.3.2 9.4.3 0 6-.1 13.3-.1 19.4h11.7c.1-6.3.1-13.7.2-19.5.4-.1.7-.1 1-.2 5.6-.9 11.3-1.4 16.7-2.7 7.1-1.8 12.7-5.9 15.7-12.9 2.1-5.4 2.6-11.1 1.8-17zM54.3 32.9c7.3 0 14.4-.6 21 2.4 4.4 1.9 6.6 5.5 6.3 9.8-.3 4.6-2.9 7.9-7.6 9.4-6.4 2.1-13.1 2-20 1.7.1-7.6.2-15.2.3-23.3zm25.5 58.4c-6.5 2.9-13.3 2.9-20.2 3-1.9 0-3.8-.1-5.9-.1l.3-25.9c8.9 0 17.7-.7 26 3 4.3 1.9 6.8 5.2 6.8 10.1-.1 4.9-2.7 8-7 9.9z" />
                                                                    </svg>
                                                                    <div class="ms-3">
                                                                        <p class="mb-0 fw-semibold">Bitcoin</p>
                                                                        <span class="text-muted fs-12">20/04/2020, 14:24:00</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="pe-2">
                                                                        <p class="mb-0 fw-semibold fs-13">$12,486.04</p>
                                                                        <span class="text-success ms-1 fs-12 fw-semibold">+0.57% <i class="fe fe-arrow-up ms-1"></i></span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="border-bottom">
                                                                <td class="recent-activity d-inline-flex border-bottom-0 ps-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="49" fill="#345d9d"/><path fill="#fff" d="M78.929 67.257a1.501 1.501 0 0 0-1.15-.604c-9.834-.348-19.475-.528-28.824-.694 1.015-4.214 2.219-8.517 3.378-12.788.111-.132.297-.308.325-.331 1.263-.518 2.568-1.052 3.769-1.381 3.707-.887 5.815-3.083 6.262-6.502.192-1.207.79-2.563 1.107-3.835.328-1.108-.846-2.209-1.931-1.801a129.752 129.752 0 0 0-6.411 2.344c.423-1.595.84-3.177 1.254-4.748 1.362-5.167 2.648-10.048 4.042-15.012A1.5 1.5 0 0 0 59.305 20H42.024c-1.981 0-3.021.807-3.362 2.614l-7.957 28.25c-.024.102-.03.225-.151.248-1.658.693-3.508 1.249-5.212 1.946-.961.113-1.886.688-2.067 1.668a92.007 92.007 0 0 0-2.445 7.577 1.5 1.5 0 0 0 2.014 1.791 166.4 166.4 0 0 1 4.828-1.912c-.604 2.211-1.207 4.39-1.81 6.568-.855 3.09-1.711 6.179-2.567 9.359A1.503 1.503 0 0 0 24.743 80h48.996c.687 0 2.51 0 2.987-2.282.292-1.394.712-2.707 1.156-4.097l.326-1.025a1.45 1.45 0 0 0 .052-.228c.139-.928.392-1.871.685-2.963l.232-.873a1.5 1.5 0 0 0-.248-1.275z"/>
                                                                    </svg>
                                                                    <div class="ms-3">
                                                                        <p class="mb-0 fw-semibold">Litcoin</p>
                                                                        <span class="text-muted fs-12">20/04/2020, 14:24:00</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="pe-2">
                                                                        <p class="mb-0 fw-semibold fs-13">$8,242.26</p>
                                                                        <span class="text-success ms-1 fs-12 fw-semibold">+2.04% <i class="fe ms-1 fe-arrow-up"></i></span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="border-bottom">
                                                                <td class="recent-activity d-inline-flex border-bottom-0 ps-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128">
                                                                        <path fill="#6d75b6"
                                                                            d="M65.7 96.4V128l39.2-55.1zM103.4 62.7L65.7 0v45.6zM65.7 49.2v38.9l37.4-21.9zM24.7 62.7L62.4 0v45.6zM62.4 49.2v38.9L24.9 66.2zM62.3 96.4V128L23.1 72.9z" />
                                                                    </svg>
                                                                    <div class="ms-3">
                                                                        <p class="mb-0 fw-semibold">Enthereum</p>
                                                                        <span class="text-muted fs-12">20/04/2020, 14:24:00</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="pe-2">
                                                                        <p class="mb-0 fw-semibold fs-13">$10,429.00</p>
                                                                        <span class="text-success ms-1 fs-12 fw-semibold">+0.86% <i class="fe ms-1 fe-arrow-up"></i></span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="border-bottom">
                                                                <td class="recent-activity d-inline-flex border-bottom-0 ps-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><path fill="#60bcc3" d="m94.215 63.993 12.982-12.983 12.983 12.983-12.983 12.982zM7.828 64 20.81 51.018 33.792 64 20.81 76.982zM64 94.22 42.48 72.7 29.5 85.68l34.5 34.5 34.5-34.5L85.52 72.7 64 94.22zM64 33.78 85.52 55.3 98.5 42.32 64 7.82l-34.5 34.5L42.48 55.3 64 33.78z" class="color000 svgShape"/><path fill="#60bcc3" d="m51.173 64 12.82-12.82L76.813 64l-12.82 12.82z" class="color000 svgShape"/></svg>
                                                                    <div class="ms-3">
                                                                        <p class="mb-0 fw-semibold">Bainance</p>
                                                                        <span class="text-muted fs-12">20/04/2020, 14:24:00</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="pe-2">
                                                                        <p class="mb-0 fw-semibold fs-13">$6,326.09</p>
                                                                        <span class="text-success ms-1 fs-12 fw-semibold">+2.00% <i class="fe ms-1 fe-arrow-up"></i></span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="border-bottom">
                                                                <td class="recent-activity d-inline-flex border-bottom-0 ps-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128"><path fill="#03a1dc" d="M123 26.8c0 12.5-9.3 24.6-22.9 26.2-2.4.3-4.9.3-7.3.8-7.8 1.6-11.2 11.1-6 17.1 2.1 2.5 5.1 3.4 8.3 3.7 3.3.4 6.8.5 9.9 1.6 10.1 3.4 15.9 10.7 17.6 21.2 2.3 14.2-7.3 27-20.6 30-14.5 3.3-29.5-6.5-32.1-21.1-1.2-6.4.1-12.3 3-17.9 1.2-2.4 2.2-4.7 2.1-7.5-.2-4.4-3-8-7.4-9.5-3.8-1.3-8.1-.1-10.8 3.2-1.7 2.1-3.1 4.5-4.8 6.6-6.9 8.3-15.9 11.2-26.3 8.9-10.5-2.5-17.3-9.3-19.9-19.7C2 55.6 11.4 40.6 26.4 37.8c11-2.1 20 1.5 26.8 10.5 1.4 1.9 2.7 4.1 4.4 5.7 5.5 5.5 15.4 2.8 17.3-4.7.7-2.9.1-5.7-1.3-8.4-2.5-4.8-4.3-9.9-4.1-15.4C69.9 12.8 80 1.9 92.6.2c14.2-1.8 27.3 7.5 30 21.7.2 1.6.3 3.3.4 4.9z"/></svg>
                                                                    <div class="ms-3">
                                                                        <p class="mb-0 fw-semibold">Ripple</p>
                                                                        <span class="text-muted fs-12">06/04/2022, 10:10:20</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">
                                                                    <div class="pe-2">
                                                                        <p class="mb-0 fw-semibold fs-13">$4,023.42</p>
                                                                        <span class="text-success ms-1 fs-12 fw-semibold">+1.04% <i class="fe ms-1 fe-arrow-up"></i></span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="card data-table5">
                                        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                                            <h3 class="card-title">Transaction History</h3>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm btn-primary fw-semibold"> <i class="fa fa-eye"></i> View Report</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="data-table5" class="table table-bordered p-0 text-nowrap mb-0">
                                                    <thead class="bg-light text-dark">
                                                        <tr>
                                                            <th
                                                                class="fw-semibold fs-14 w-9">
                                                                Date</th>
                                                            <th
                                                                class="fw-semibold fs-14">
                                                                Type</th>
                                                            <th
                                                                class="fw-semibold fs-14">
                                                                Asset</th>
                                                            <th
                                                                class="fw-semibold fs-14">
                                                                Amount</th>
                                                            <th
                                                                class="fw-semibold fs-14">
                                                                Address</th>
                                                            <th
                                                                class="fw-semibold fs-14">
                                                                Status</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-dark">
                                                        <tr>
                                                            <td class="fw-semibold">
                                                                12-05-2020
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fe fe-download p-2 bg-gradient-primary rounded-circle"></i>
                                                                    <h6 class="mb-0 fw-semibold text-dark ms-2">Buy</h6>
                                                                </div>
                                                            </td>
                                                            <td class="fw-semibold">ETH </td>
                                                            <td class="fw-semibold">10 ETH <i class="fe fe-dollar-sign fs-10 text-muted"></i></td>
                                                            <td class="fw-semibold">
                                                                Nyc0124thgsv
                                                                <a href="javascript:void(0);"><i class="fe fe-link-2 text-primary ms-1"></i></a>
                                                            </td>
                                                            <td class="fs-15 fw-semibold">
                                                                <span class="badge badge-primary-transparent fw-semibold fs-12">Pending</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">
                                                                20-02-2019
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fe fe-repeat p-2 bg-gradient-success rounded-circle"></i>
                                                                    <h6 class="mb-0 fw-semibold text-dark ms-2">Exchange</h6>
                                                                </div>
                                                            </td>
                                                            <td class="fw-semibold">BTC</td>
                                                            <td class="fw-semibold">05 BTC <i class="fe fe-dollar-sign fs-10 text-muted"></i></td>
                                                            <td class="fw-semibold">
                                                                Nyc0124thgsv
                                                                <a href="javascript:void(0);"><i class="fe fe-link-2 text-primary ms-1"></i></a>
                                                            </td>
                                                            <td class="fs-15 fw-semibold">
                                                                <span class="badge badge-danger-transparent fw-semibold fs-12">Failed</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">
                                                                22-05-2020
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fe fe-download p-2 bg-gradient-primary rounded-circle"></i>
                                                                    <h6 class="mb-0 fw-semibold text-dark ms-2">Buy</h6>
                                                                </div>
                                                            </td>
                                                            <td class="fw-semibold">DOGE </td>
                                                            <td class="fw-semibold">2,64 DOGE <i class="fe fe-dollar-sign fs-10 text-muted"></i></td>
                                                            <td class="fw-semibold">
                                                                Nyc0124thgsv
                                                                <a href="javascript:void(0);"><i class="fe fe-link-2 text-primary ms-1"></i></a>
                                                            </td>
                                                            <td class="fs-15 fw-semibold">
                                                                <span class="badge badge-secondary-transparent fw-semibold fs-12">Completed</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">
                                                                24-01-2021
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fe fe-x-circle p-2 bg-gradient-danger rounded-circle"></i>
                                                                    <h6 class="mb-0 fw-semibold text-dark ms-2">Discard</h6>
                                                                </div>
                                                            </td>
                                                            <td class="fw-semibold">AVAX</td>
                                                            <td class="fw-semibold">5,77 AVAX <i class="fe fe-dollar-sign fs-10 text-muted"></i></td>
                                                            <td class="fw-semibold">
                                                                Nyc0124thgsv
                                                                <a href="javascript:void(0);"><i class="fe fe-link-2 text-primary ms-1"></i></a>
                                                            </td>
                                                            <td class="fs-15 fw-semibold">
                                                                <span class="badge badge-info-transparent fw-semibold fs-11">in progress</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">
                                                                26-05-2020
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fe fe-download p-2 bg-gradient-primary rounded-circle"></i>
                                                                    <h6 class="mb-0 fw-semibold text-dark ms-2">Buy</h6>
                                                                </div>
                                                            </td>
                                                            <td class="fw-semibold">BNB</td>
                                                            <td class="fw-semibold">10 BNB <i class="fe fe-dollar-sign fs-10 text-muted"></i></td>
                                                            <td class="fw-semibold">
                                                                Nyc0124thgsv
                                                                <a href="javascript:void(0);"><i class="fe fe-link-2 text-primary ms-1"></i></a>
                                                            </td>
                                                            <td class="fs-15 fw-semibold">
                                                                <span class="badge badge-danger-transparent fw-semibold fs-12">Pending</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-semibold">
                                                                25-02-2019
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="fe fe-repeat p-2 bg-gradient-success rounded-circle"></i>
                                                                    <h6 class="mb-0 fw-semibold text-dark ms-2">Exchange</h6>
                                                                </div>
                                                            </td>
                                                            <td class="fw-semibold">BTC</td>
                                                            <td class="fw-semibold">05 BTC <i class="fe fe-dollar-sign fs-10 text-muted"></i></td>
                                                            <td class="fw-semibold">
                                                                Nyc0124thgsv
                                                                <a href="javascript:void(0);"><i class="fe fe-link-2 text-primary ms-1"></i></a>
                                                            </td>
                                                            <td class="fs-15 fw-semibold">
                                                                <span class="badge badge-primary-transparent fw-semibold fs-12">Failed</span>
                                                            </td>
                                                        </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
        @vite('resources/assets/js/select2.js')


        <!-- APEXCHART JS -->
        <script src="{{asset('build/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>

        <!-- DATA TABLES JS -->
        <script src="{{asset('build/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('build/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>

        <!-- INDEX JS -->
        @vite('resources/assets/js/index5.js')


@endsection