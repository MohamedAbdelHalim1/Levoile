@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE HEADER -->
                            <div class="page-header d-sm-flex d-block">
                                <ol class="breadcrumb mb-sm-0 mb-3">
                                    <!-- breadcrumb -->
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Components</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Forms</li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Advanced</li>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Dropdowns Select</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="example">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-dropdown">Default Select</label>
                                                    <select name="country" class="form-control form-select"
                                                        id="default-dropdown" data-bs-placeholder="Select Country">
                                                        <option label="Choose one"></option>
                                                        <option value="br">Brazil</option>
                                                        <option value="cz">Czech Republic</option>
                                                        <option value="de">Germany</option>
                                                        <option value="pl">Poland</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Basic Select2</label>
                                                    <select class="form-control select2 form-select"
                                                        data-placeholder="Choose one">
                                                        <option label="Choose one"></option>
                                                        <option value="1">Chuck Testa</option>
                                                        <option value="2">Sage Cattabriga-Alosa</option>
                                                        <option value="3">Nikola Tesla</option>
                                                        <option value="4">Cattabriga-Alosa</option>
                                                        <option value="5">Nikola Alosa</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Select2 With Search</label>
                                                    <select class="form-control select2-show-search form-select"
                                                        data-placeholder="Choose one">
                                                        <option label="Choose one"></option>
                                                        <option value="1">Chuck Testa</option>
                                                        <option value="2">Sage Cattabriga-Alosa</option>
                                                        <option value="3">Nikola Tesla</option>
                                                        <option value="4">Cattabriga-Alosa</option>
                                                        <option value="5">Nikola Alosa</option>
                                                        <option value="6">Chuck Testa</option>
                                                        <option value="7">Sage Cattabriga-Alosa</option>
                                                        <option value="8">Nikola Tesla</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Multiple Select</label>
                                                    <select multiple class="form-control select2-show-search form-select"
                                                        data-placeholder="Choose one">
                                                        <option label="Choose one"></option>
                                                        <option value="1">Chuck Testa</option>
                                                        <option value="2">Sage Cattabriga-Alosa</option>
                                                        <option value="3">Nikola Tesla</option>
                                                        <option value="4">Cattabriga-Alosa</option>
                                                        <option value="5">Nikola Alosa</option>
                                                        <option value="6">Chuck Testa</option>
                                                        <option value="7">Sage Cattabriga-Alosa</option>
                                                        <option value="8">Nikola Tesla</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Select2 Disabled</label>
                                                    <select class="form-control select2-show-search form-select"
                                                        data-placeholder="Choose one" disabled>
                                                        <option label="Choose one"></option>
                                                        <option value="1">Chuck Testa</option>
                                                        <option value="2">Sage Cattabriga-Alosa</option>
                                                        <option value="3">Nikola Tesla</option>
                                                        <option value="4">Cattabriga-Alosa</option>
                                                        <option value="5">Nikola Alosa</option>
                                                        <option value="6">Chuck Testa</option>
                                                        <option value="7">Sage Cattabriga-Alosa</option>
                                                        <option value="8">Nikola Tesla</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Select2 Dropdown Styles</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="example">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Select2 Style-01: </label>
                                                            <ul>
                                                                <li class="select-client">
                                                                    <select class="form-control select2-style01"
                                                                        data-placeholder="Choose One">
                                                                        <option label="Choose one"></option>
                                                                        <option value="1">Angeline Julliet</option>
                                                                        <option value="2">Helena Rose</option>
                                                                        <option value="13">Daniel Obrien</option>
                                                                        <option value="15">Jorah Randy</option>
                                                                        <option value="3">Emma Watson</option>
                                                                        <option value="5">Bonny Benett</option>
                                                                        <option value="7">Jessie Spears</option>
                                                                        <option value="9">Skyler Hilda</option>
                                                                        <option value="11">Randy Orton</option>
                                                                        <option value="14">Benjamin Button</option>
                                                                    </select>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Multiple Select: </label>
                                                            <ul>
                                                                <li class="select-client">
                                                                    <select class="form-control select2-style01"
                                                                        data-placeholder="Choose One" multiple>
                                                                        <option label="Choose one"></option>
                                                                        <option value="1">Angeline Julliet</option>
                                                                        <option value="2">Helena Rose</option>
                                                                        <option value="13">Daniel Obrien</option>
                                                                        <option value="15">Jorah Randy</option>
                                                                        <option value="3">Emma Watson</option>
                                                                        <option value="5">Bonny Benett</option>
                                                                        <option value="7">Jessie Spears</option>
                                                                        <option value="9">Skyler Hilda</option>
                                                                        <option value="11">Randy Orton</option>
                                                                        <option value="14">Benjamin Button</option>
                                                                    </select>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Select2 With Result: </label>
                                                            <ul>
                                                                <li class="select-client">
                                                                    <select class="form-control select2-style01"
                                                                        data-placeholder="Choose One">
                                                                        <option label="Choose one"></option>
                                                                        <option value="1">Angeline Julliet</option>
                                                                        <option value="2">Helena Rose</option>
                                                                        <option value="13">Daniel Obrien</option>
                                                                        <option value="15">Jorah Randy</option>
                                                                        <option value="3" selected>Emma Watson</option>
                                                                        <option value="5">Bonny Benett</option>
                                                                        <option value="7">Jessie Spears</option>
                                                                        <option value="9">Skyler Hilda</option>
                                                                        <option value="11">Randy Orton</option>
                                                                        <option value="14">Benjamin Button</option>
                                                                    </select>
                                                                </li>
                                                            </ul>
                                                        </div>
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
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Bootstrap Maxlength</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-sub-title text-muted">Bootstrap-Maxlength uses a Twitter
                                                Bootstrap
                                                label to show a visual feedback to the user about the maximum length of the
                                                field where the user is inserting text. Uses the HTML5 attribute <code
                                                    class="highlighter-rouge">maxlength</code> to work.</p>
                                            <div class="example">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="defaultconfig" class="form-label">Default Usuage</label>
                                                        <input type="text" class="form-control" maxlength="25"
                                                            id="defaultconfig">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="thresholdConfig" class="form-label">Threshold
                                                            Value</label>
                                                        <input type="text" class="form-control" maxlength="25"
                                                            id="thresholdConfig">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alloptions" class="form-label">All the options</label>
                                                        <input type="text" class="form-control" maxlength="25"
                                                            id="alloptions">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-xl-3">
                                                            <div class="form-group">
                                                                <label for="place-top-left" class="form-label">Top
                                                                    Left</label>
                                                                <input type="text" class="form-control" maxlength="25"
                                                                    id="place-top-left">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-xl-3">
                                                            <div class="form-group">
                                                                <label for="place-top-right" class="form-label">Top
                                                                    Right</label>
                                                                <input type="text" class="form-control" maxlength="25"
                                                                    id="place-top-right">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-xl-3">
                                                            <div class="form-group">
                                                                <label for="place-bottom-left" class="form-label">Bottom
                                                                    Left</label>
                                                                <input type="text" class="form-control" maxlength="25"
                                                                    id="place-bottom-left">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-xl-3">
                                                            <div class="form-group">
                                                                <label for="place-bottom-right" class="form-label">Bottom
                                                                    Right</label>
                                                                <input type="text" class="form-control" maxlength="25"
                                                                    id="place-bottom-right">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="textarea" class="form-label">Textarea</label>
                                                        <textarea class="form-control" maxlength="225" id="textarea"
                                                            rows="3"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">File Upload</h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-muted card-sub-title">Dropify is a jQuery plugin to create a
                                                beautiful file uploader that converts a standard
                                                <code>input type="file"</code>
                                                into a nice drag & drop zone with previews and custom styles.
                                            </p>
                                            <div class="row mb-4">
                                                <div class="col-sm-12 col-md-4 mb-4 mb-lg-0">
                                                    <input type="file" class="dropify" data-height="200" >
                                                </div>
                                                <div class="col-sm-12 col-md-4  mb-4 mb-lg-0">
                                                    <input type="file" class="dropify"
                                                        data-default-file="{{asset('build/assets/images/photos/1.jpg')}}"
                                                        data-height="200">
                                                </div>
                                                <div class="col-sm-12 col-md-4  mb-4 mb-lg-0">
                                                    <input type="file" class="dropify" disabled="disabled" >
                                                </div>
                                            </div>
                                            <div>
                                                <input id="demo" type="file" name="files"
                                                    accept=" image/jpeg, image/png, text/html, application/zip, text/css, text/js"
                                                    multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- FORM ELEMENT ADVANCED JS -->
        @vite('resources/assets/js/formelementadvnced.js')


        <!-- BOOTSTRAP MAX-LENGTH JS -->
        <script src="{{asset('build/assets/plugins/bootstrap-maxlength/dist/bootstrap-maxlength.min.js')}}"></script>

        <!-- INTERNAL FILEUPLOADS JS -->
        <script src="{{asset('build/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fileuploads/js/file-upload.js')}}"></script>

        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>

        <!-- INTERNAL FANCY UPLOADER JS -->
        <script src="{{asset('build/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
        <script src="{{asset('build/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

@endsection