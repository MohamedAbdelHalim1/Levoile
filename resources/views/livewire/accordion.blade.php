@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Bootstrap</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Accordions</li>
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
                            <div class="row ">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Default Accordion</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="panel-group" id="accordion" role="tablist"
                                                aria-multiselectable="true">
                                                <div class="panel panel-default active">
                                                    <div class="panel-heading " role="tab" id="headingOne1">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-bs-toggle="collapse"
                                                                data-bs-parent="#accordion" href="#collapse1"
                                                                aria-expanded="true" aria-controls="collapse1">

                                                                Collapsible Group Item #1
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel"
                                                        aria-labelledby="headingOne1">
                                                        <div class="panel-body border-top-0">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch et.
                                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                                            vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default mt-2">
                                                    <div class="panel-heading" role="tab" id="headingTwo2">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-bs-toggle="collapse"
                                                                data-bs-parent="#accordion" href="#collapse2"
                                                                aria-expanded="false" aria-controls="collapse2">

                                                                Collapsible Group Item #2
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel"
                                                        aria-labelledby="headingTwo2">
                                                        <div class="panel-body border-top-0">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch et.
                                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                                            vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default mt-2">
                                                    <div class="panel-heading" role="tab" id="heading3">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-bs-toggle="collapse"
                                                                data-bs-parent="#accordion" href="#collapse3"
                                                                aria-expanded="false" aria-controls="collapse3">

                                                                Collapsible Group Item #3
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel"
                                                        aria-labelledby="headingThree">
                                                        <div class="panel-body border-top-0">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch et.
                                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                                            vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- PANEL-GROUP -->
                                        </div>
                                    </div>
                                </div>
                                <!-- COL-END -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Accordion style 1</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item border-bottom-0">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            Accordion Item #1
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch et.
                                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                                            vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item border-bottom-0">
                                                    <h2 class="accordion-header" id="headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            Accordion Item #2
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch et.
                                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                                            vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                            aria-expanded="false" aria-controls="collapseThree">
                                                            Accordion Item #3
                                                        </button>
                                                    </h2>
                                                    <div id="collapseThree" class="accordion-collapse collapse"
                                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch et.
                                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                                            vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- COL-END -->
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Accordion With Icons</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="panel-group" id="accordion01" role="tablist"
                                                aria-multiselectable="true">
                                                <div class="panel panel-default active">
                                                    <div class="panel-heading " role="tab" id="headingOne01">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-bs-toggle="collapse"
                                                                data-bs-parent="#accordion01" href="#collapse01"
                                                                aria-expanded="true" aria-controls="collapse01">
                                                                <i class="fe fe-plus-circle me-2 float-start"></i>
                                                                <span>Collapsible Group Item #1</span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse01" class="panel-collapse collapse" role="tabpanel"
                                                        aria-labelledby="headingOne01">
                                                        <div class="panel-body border-top-0">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch et.
                                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                                            vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default mt-2">
                                                    <div class="panel-heading" role="tab" id="headingTwo02">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-bs-toggle="collapse"
                                                                data-bs-parent="#accordion" href="#collapse02"
                                                                aria-expanded="false" aria-controls="collapse02">
                                                                <i class="fe fe-plus-circle me-2 float-start"></i>
                                                                <span>Collapsible Group Item #2</span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse02" class="panel-collapse collapse" role="tabpanel"
                                                        aria-labelledby="headingTwo02">
                                                        <div class="panel-body border-top-0">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch et.
                                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                                            vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default mt-2">
                                                    <div class="panel-heading" role="tab" id="heading03">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-bs-toggle="collapse"
                                                                data-bs-parent="#accordion" href="#collapse03"
                                                                aria-expanded="false" aria-controls="collapse03">
                                                                <i class="fe fe-plus-circle me-2 float-start"></i>
                                                                <span>Collapsible Group Item #3</span>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse03" class="panel-collapse collapse" role="tabpanel"
                                                        aria-labelledby="headingThree">
                                                        <div class="panel-body border-top-0">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird
                                                            on it squid single-origin coffee nulla assumenda shoreditch et.
                                                            Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                                            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                                            vice lomo.
                                                            Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                                            synth nesciunt you probably haven't heard of them accusamus
                                                            labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- PANEL-GROUP -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Accordion style 2</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="panel-group1" id="accordion1">
                                                <div class="panel panel-default mb-4">
                                                    <div class="panel-heading1 br-7">
                                                        <h4 class="panel-title1">
                                                            <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                                                data-bs-parent="#accordion" href="#collapseFour"
                                                                aria-expanded="false">Section 1</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                                        aria-expanded="false">
                                                        <div class="panel-body">
                                                            <p>All the Lorem Ipsum generators on the Internet tend to repeat
                                                                predefined chunks as necessary, making this the first true
                                                                generator on the Internet. It uses a dictionary of over 200
                                                                Latin words </p>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the industry's
                                                                standard dummy text ever since the 1500s, when an unknown
                                                                printer took a galley of type
                                                                and scrambled.Nor again is there anyone who loves or pursues
                                                                or desires to obtain pain of itself, because it is pain, but
                                                                because occasionally circumstances occur in which toil and
                                                                pain can procure
                                                                him some great pleasure. To take a trivial example, which of
                                                                us ever undertakes laborious physical exercise</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading1 br-7">
                                                        <h4 class="panel-title1">
                                                            <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                                                data-bs-parent="#accordion" href="#collapseFive"
                                                                aria-expanded="false">Section 2</a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
                                                        aria-expanded="false">
                                                        <div class="panel-body">
                                                            <p>All the Lorem Ipsum generators on the Internet tend to repeat
                                                                predefined chunks as necessary, making this the first true
                                                                generator on the Internet. It uses a dictionary of over 200
                                                                Latin words </p>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and
                                                                typesetting industry. Lorem Ipsum has been the industry's
                                                                standard dummy text ever since the 1500s, when an unknown
                                                                printer took a galley of type
                                                                and scrambled.Nor again is there anyone who loves or pursues
                                                                or desires to obtain pain of itself, because it is pain, but
                                                                because occasionally circumstances occur in which toil and
                                                                pain can procure
                                                                him some great pleasure. To take a trivial example, which of
                                                                us ever undertakes laborious physical exercise</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

@endsection