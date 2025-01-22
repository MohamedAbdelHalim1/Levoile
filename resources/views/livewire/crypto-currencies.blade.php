@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Crypto Currencies</li>
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
                            <!-- END PAGE HEADER -->

                            <!-- ROW -->
                            <div class="card overflow-hidden">
                                <div class="card-header">
                                    <h3 class="card-title">Crypto Currencies</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap crypto-currencies">
                                            <tbody class="text-dark">
                                                <tr class="border-bottom">
                                                    <th class="fw-semibold">Name</th>
                                                    <th class="fw-semibold">Icon</th>
                                                    <th class="fw-semibold">Price</th>
                                                    <th class="fw-semibold">% 24h</th>
                                                    <th class="fw-semibold">Market Cap</th>
                                                    <th class="fw-semibold">Circulating Supply</th>
                                                    <th class="fw-semibold">Volume 24H</th>
                                                    <th class="fw-semibold">CMGR/Month</th>
                                                    <th class="fw-semibold">Inflation</th>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Bitcoin</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/bitcoin.svg')}}"
                                                            alt="Bitcoin" class="w-5 h-5"></td>
                                                    <td>$10513.00</td>
                                                    <td class="text-red">-7%</td>
                                                    <td class="">$179,470,305,923</td>
                                                    <td class="d-flex border-0">16,819,612 <span class="text-secondary ms-2">BTC</span></td>
                                                    <td class="">$9,578,830,000</td>
                                                    <td>8.11% / 57</td>
                                                    <td class="">
                                                        <span>0.36%</span>
                                                        <i class="fe fe-arrow-up text-success mx-1"></i>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Ethereum</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/ethereum.svg')}}"
                                                            alt="Ethereum" class="w-5 h-5"></td>
                                                    <td>$966.61</td>
                                                    <td class="text-red">-6%</td>
                                                    <td class="">$95,270,125,036</td>
                                                    <td class="d-flex border-0">97,145,024 <span class="text-orange ms-2">ETH</span></td>
                                                    <td class="">$3,466,060,000</td>
                                                    <td>22.62% / 29</td>
                                                    <td class="">
                                                        <span>0.64%</span>
                                                        <i class="fe fe-arrow-up text-success mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Ripple</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/ripple.svg')}}"
                                                            alt="Ripple" class="w-5 h-5"></td>
                                                    <td>$1.2029</td>
                                                    <td class="text-red">-11%</td>
                                                    <td class="">$47,649,145,657</td>
                                                    <td class="d-flex border-0">38,739,144,704 <span class="text-info ms-2">XRP</span></td>
                                                    <td class="">$2,081,450,000</td>
                                                    <td>10.85% / 53</td>
                                                    <td class="">
                                                        <span>0.06%</span>
                                                        <i class="fe fe-arrow-down text-danger mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Bitcoin Cash</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/bitcoincash.svg')}}"
                                                            alt="Bitcoin" class="w-5 h-5"></td>
                                                    <td>$1547.00</td>
                                                    <td class="text-red">-11%</td>
                                                    <td class="">$26,720,210,956</td>
                                                    <td class="d-flex border-0">16,925,988<span class="text-danger ms-2">BCH</span></td>
                                                    <td class="">$598,337,000</td>
                                                    <td>21.30% / 6</td>
                                                    <td class="">
                                                        <span>0.32%</span>
                                                        <i class="fe fe-arrow-up text-success mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Cardano</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/cardano.svg')}}"
                                                            alt="Cardano" class="w-5 h-5"></td>
                                                    <td>$0.550768</td>
                                                    <td class="text-red">-9%</td>
                                                    <td class="">$14,279,800,786</td>
                                                    <td class="d-flex border-0">25,927,069,696<span class="text-warning ms-2">ADA</span></td>
                                                    <td class="">$466,381,000</td>
                                                    <td>205.35% / 3</td>
                                                    <td class="">
                                                        <span>0.00%</span>
                                                        <i class="fe fe-arrow-down text-danger mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Litecoin</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/litecoin.svg')}}"
                                                            alt="Litecoin" class="w-5 h-5"></td>
                                                    <td>$173.86</td>
                                                    <td class="text-red">-7%</td>
                                                    <td class="">$9,670,920,267</td>
                                                    <td class="d-flex border-0">54,873,584<span class="text-success ms-2">LTC</span></td>
                                                    <td class="">$430,524,000</td>
                                                    <td>6.87% / 57</td>
                                                    <td class="">
                                                        <span>0.80%</span>
                                                        <i class="fe fe-arrow-up text-success mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>EOS</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/eos.svg')}}" alt="EOS"
                                                            class="w-5 h-5"></td>
                                                    <td>$13.394</td>
                                                    <td class="text-green">5%</td>
                                                    <td class="">$8,420,143,033</td>
                                                    <td class="d-flex border-0">621,412,800<span class="text-secondary ms-2">EOS</span></td>
                                                    <td class="">$2,864,780,000</td>
                                                    <td>53.25% / 6</td>
                                                    <td class="">
                                                        <span>11.56%</span>
                                                        <i class="fe fe-arrow-down text-danger mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>NEM</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/nem.svg')}}" alt="NEM"
                                                            class="w-5 h-5"></td>
                                                    <td>$0.935049</td>
                                                    <td class="text-red">-11%</td>
                                                    <td class="">$8,415,440,999</td>
                                                    <td class="d-flex border-0">8,999,999,488<span class="text-orange ms-2">XEM</span></td>
                                                    <td class="">$66,061,000</td>
                                                    <td>26.99% / 33</td>
                                                    <td class="">
                                                        <span>0.24%</span>
                                                        <i class="fe fe-arrow-up text-success mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Stellar</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/stellar.svg')}}"
                                                            alt="Bitcoin" class="w-5 h-5"></td>
                                                    <td>$0.467813</td>
                                                    <td class="text-green">2%</td>
                                                    <td class="">$8,358,735,080</td>
                                                    <td class="d-flex border-0">17,867,683,840<span class="text-info ms-2">XLM</span></td>
                                                    <td class="">$370,297,000</td>
                                                    <td>13.12% / 41</td>
                                                    <td class="">
                                                        <span>0.19%</span>
                                                        <i class="fe fe-arrow-up text-success mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>NEO</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/neo.svg')}}" alt="Bitcoin"
                                                            class="w-5 h-5"></td>
                                                    <td>$118.61</td>
                                                    <td class="text-red">-9%</td>
                                                    <td class="">$7,693,400,000</td>
                                                    <td class="d-flex border-0">65,000,000<span class="text-pink ms-2">NEO</span></td>
                                                    <td class="">$318,308,000</td>
                                                    <td>62.68% / 15</td>
                                                    <td class="">
                                                        <span>0.00%</span>
                                                        <i class="fe fe-arrow-down text-danger mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>IOTA</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/iota.svg')}}" alt="Bitcoin"
                                                            class="w-5 h-5"></td>
                                                    <td>$2.34</td>
                                                    <td class="text-red">-14%</td>
                                                    <td class="">$6,504,100,862</td>
                                                    <td class="d-flex border-0">2,779,530,240<span class="text-warning ms-2">MIOTA</span></td>
                                                    <td class="">$103,132,000</td>
                                                    <td>23.27% / 7</td>
                                                    <td class="">
                                                        <span>-0.02%</span>
                                                        <i class="fe fe-arrow-down text-danger mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Dash</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/dash.svg')}}" alt="Dash"
                                                            class="w-5 h-5"></td>
                                                    <td>$747.222</td>
                                                    <td class="text-red">-8%</td>
                                                    <td class="">$5,881,413,815</td>
                                                    <td class="d-flex border-0">7,833,738<span class="text-danger ms-2">DASH</span></td>
                                                    <td class="">$96,147,900</td>
                                                    <td>19.19% / 47</td>
                                                    <td class="">
                                                        <span>0.81%</span>
                                                        <i class="fe fe-arrow-up text-success mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Monero</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/monero.svg')}}" alt=""
                                                            class="w-5 h-5"></td>
                                                    <td>$305.16</td>
                                                    <td class="text-red">-11%</td>
                                                    <td class="">$4,778,157,533</td>
                                                    <td class="d-flex border-0">15,633,286<span class="text-success ms-2">XMR</span></td>
                                                    <td class="">$100,788,000</td>
                                                    <td>11.88% / 44</td>
                                                    <td class="">
                                                        <span>0.78%</span>
                                                        <i class="fe fe-arrow-up text-success mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>TRON</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/tron.svg')}}" alt=""
                                                            class="w-5 h-5"></td>
                                                    <td>$0.067691</td>
                                                    <td class="text-red">-5%</td>
                                                    <td class="">$4,450,560,896</td>
                                                    <td class="d-flex border-0">65,748,193,280<span class="text-primary ms-2">TRX</span></td>
                                                    <td class="">$581,651,000</td>
                                                    <td>142.69% / 4</td>
                                                    <td class="">
                                                        <span>0.00%</span>
                                                        <i class="fe fe-arrow-down text-danger mx-1"></i></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>Bitcoin Gold</td>
                                                    <td><img src="{{asset('build/assets/images/crypto-currencies/bitcoinglod.svg')}}" alt=""
                                                            class="w-5 h-5"></td>
                                                    <td>$181.39</td>
                                                    <td class="text-red">-7%</td>
                                                    <td class="">$3,084,108,676</td>
                                                    <td class="d-flex border-0">16,779,700<span class="text-secondary ms-2">BTG</span></td>
                                                    <td class="">$199,652,000</td>
                                                    <td>-25.44% / 3</td>
                                                    <td class="">
                                                        <span>0.34%</span>
                                                        <i class="fe fe-arrow-down text-danger mx-1"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection