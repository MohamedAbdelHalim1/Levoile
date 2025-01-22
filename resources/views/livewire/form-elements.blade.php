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
                                    <li class="breadcrumb-item active" aria-current="page">Form Elements</li>
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
                                            <h3 class="mb-0 card-title">Default Form Input Fields</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="input"
                                                            placeholder="Enter Your Name" value="Enter Your Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="example-disabled-input" placeholder="Read Only Text area."
                                                            value="Read Only Text area. " readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            name="example-disabled-input" placeholder="Disabled text area.."
                                                            value="" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-success">
                                                        <input type="text" class="form-control is-valid state-valid"
                                                            name="example-text-input-valid" placeholder="Valid Email..">
                                                    </div>
                                                    <div class="form-group  has-danger">
                                                        <input type="text" class="form-control is-invalid state-invalid"
                                                            name="example-text-input-invalid"
                                                            placeholder="Invalid feedback">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control"
                                                            name="example-password-input" placeholder="Password..">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                        placeholder="Write a large text here ..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0 card-title">Default Form Input Fields with labels</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Enter Name</label>
                                                        <input type="text" class="form-control" name="example-text-input"
                                                            placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Disabled</label>
                                                        <input type="text" class="form-control"
                                                            name="example-disabled-input" placeholder="Disabled text area.."
                                                            value="" disabled="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Readonly</label>
                                                        <input type="text" class="form-control"
                                                            name="example-disabled-input" placeholder="Read Only Text area."
                                                            value="Read Only Text area. " readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Valid Email</label>
                                                        <input type="text" class="form-control is-valid state-valid"
                                                            name="example-text-input-valid" placeholder="Valid Email..">
                                                    </div>
                                                    <div class="form-group m-0">
                                                        <label class="form-label">Invalid Number</label>
                                                        <input type="text" class="form-control is-invalid state-invalid"
                                                            name="example-text-input-invalid"
                                                            placeholder="Invalid Number..">
                                                        <div class="invalid-feedback">Invalid feedback</div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" class="form-control"
                                                            name="example-password-input" placeholder="Password..">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <div class="form-group mb-0">
                                                        <label class="form-label">Message</label>
                                                        <textarea class="form-control" name="example-textarea-input"
                                                            rows="4" placeholder="text here.."></textarea>
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
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Different Input Style Forms</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Text</label>
                                                        <input type="text" class="form-control" name="example-text-input"
                                                            placeholder="Text..">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label">Country</label>
                                                        <select name="country" id="select-countries"
                                                            class="form-control form-select select2">
                                                            <option value="br">Brazil</option>
                                                            <option value="cz">Czech Republic</option>
                                                            <option value="de">Germany</option>
                                                            <option value="pl" selected="">Poland</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Input group</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Search for...">
                                                            <button class="btn btn-primary" type="button">Go!</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label class="form-label">Input group buttons</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control">
                                                            <button type="button" class="btn btn-primary">Action</button>
                                                            <button data-bs-toggle="dropdown" type="button"
                                                                class="btn btn-primary dropdown-toggle"></button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="javascript:void(0)">News</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)">Messages</a>
                                                                <a class="dropdown-item" href="javascript:void(0)">Edit
                                                                    Profile</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Separated inputs</label>
                                                        <div class="row gutters-xs">
                                                            <div class="col">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Search for...">
                                                            </div>
                                                            <span class="col-auto">
                                                                <button class="btn btn-primary" type="button"><i
                                                                        class="fe fe-search"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">ZIP Code</label>
                                                        <div class="row gutters-sm">
                                                            <div class="col">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Search for...">
                                                            </div>
                                                            <span class="col-auto align-self-center">
                                                                <span class="form-help" data-bs-toggle="popover"
                                                                    data-bs-placement="top" data-bs-content="<p>ZIP Code must be US or CDN format. You can use an extended ZIP+4 code to determine address more accurately.</p>
                                                                <p class='mb-0'><a href=''>USP ZIP codes lookup tools</a></p>
                                                                " data-bs-original-title="" title="">?</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-label">Bootstrap's Custom File Input</div>
                                                        <div class="input-group file-browser">
                                                            <input type="text"
                                                                class="form-control border-right-0 browse-file"
                                                                placeholder="Upload Images" readonly>
                                                            <label class="input-group-btn mb-0">
                                                                <span class="btn btn-primary br-tl-0 br-bl-0">
                                                                    Browse <input type="file" style="display: none;"
                                                                        multiple>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-0">
                                                        <label class="form-label">Date of birth</label>
                                                        <div class="row gutters-xs">
                                                            <div class="col-5">
                                                                <select name="user[month]" class="form-control form-select select2">
                                                                    <option value="">Month</option>
                                                                    <option value="1">January</option>
                                                                    <option value="2">February</option>
                                                                    <option value="3">March</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">May</option>
                                                                    <option selected="selected" value="6">June</option>
                                                                    <option value="7">July</option>
                                                                    <option value="8">August</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-3">
                                                                <select name="user[day]" class="form-control form-select select2">
                                                                    <option value="">Day</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option selected="selected" value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-4">
                                                                <select name="user[year]" class="form-control form-select select2">
                                                                    <option value="">Year</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2000">2000</option>
                                                                    <option value="1999">1999</option>
                                                                    <option value="1998">1998</option>
                                                                    <option value="1997">1997</option>
                                                                    <option value="1996">1996</option>
                                                                    <option value="1995">1995</option>
                                                                    <option value="1994">1994</option>
                                                                    <option value="1993">1993</option>
                                                                    <option value="1992">1992</option>
                                                                    <option value="1991">1991</option>
                                                                    <option value="1990">1990</option>
                                                                    <option selected="selected" value="1989">1989</option>
                                                                    <option value="1988">1988</option>
                                                                    <option value="1987">1987</option>
                                                                    <option value="1986">1986</option>
                                                                    <option value="1985">1985</option>
                                                                    <option value="1984">1984</option>
                                                                    <option value="1983">1983</option>
                                                                    <option value="1982">1982</option>
                                                                    <option value="1981">1981</option>
                                                                    <option value="1980">1980</option>
                                                                    <option value="1979">1979</option>
                                                                    <option value="1978">1978</option>
                                                                    <option value="1977">1977</option>
                                                                    <option value="1976">1976</option>
                                                                    <option value="1975">1975</option>
                                                                    <option value="1974">1974</option>
                                                                    <option value="1973">1973</option>
                                                                    <option value="1972">1972</option>
                                                                    <option value="1971">1971</option>
                                                                    <option value="1970">1970</option>
                                                                    <option value="1969">1969</option>
                                                                    <option value="1968">1968</option>
                                                                    <option value="1967">1967</option>
                                                                    <option value="1966">1966</option>
                                                                    <option value="1965">1965</option>
                                                                    <option value="1964">1964</option>
                                                                    <option value="1963">1963</option>
                                                                    <option value="1962">1962</option>
                                                                    <option value="1961">1961</option>
                                                                    <option value="1960">1960</option>
                                                                    <option value="1959">1959</option>
                                                                    <option value="1958">1958</option>
                                                                    <option value="1957">1957</option>
                                                                    <option value="1956">1956</option>
                                                                    <option value="1955">1955</option>
                                                                    <option value="1954">1954</option>
                                                                    <option value="1953">1953</option>
                                                                    <option value="1952">1952</option>
                                                                    <option value="1951">1951</option>
                                                                    <option value="1950">1950</option>
                                                                    <option value="1949">1949</option>
                                                                    <option value="1948">1948</option>
                                                                    <option value="1947">1947</option>
                                                                    <option value="1946">1946</option>
                                                                    <option value="1945">1945</option>
                                                                    <option value="1944">1944</option>
                                                                    <option value="1943">1943</option>
                                                                    <option value="1942">1942</option>
                                                                    <option value="1941">1941</option>
                                                                    <option value="1940">1940</option>
                                                                    <option value="1939">1939</option>
                                                                    <option value="1938">1938</option>
                                                                    <option value="1937">1937</option>
                                                                    <option value="1936">1936</option>
                                                                    <option value="1935">1935</option>
                                                                    <option value="1934">1934</option>
                                                                    <option value="1933">1933</option>
                                                                    <option value="1932">1932</option>
                                                                    <option value="1931">1931</option>
                                                                    <option value="1930">1930</option>
                                                                    <option value="1929">1929</option>
                                                                    <option value="1928">1928</option>
                                                                    <option value="1927">1927</option>
                                                                    <option value="1926">1926</option>
                                                                    <option value="1925">1925</option>
                                                                    <option value="1924">1924</option>
                                                                    <option value="1923">1923</option>
                                                                    <option value="1922">1922</option>
                                                                    <option value="1921">1921</option>
                                                                    <option value="1920">1920</option>
                                                                    <option value="1919">1919</option>
                                                                    <option value="1918">1918</option>
                                                                    <option value="1917">1917</option>
                                                                    <option value="1916">1916</option>
                                                                    <option value="1915">1915</option>
                                                                    <option value="1914">1914</option>
                                                                    <option value="1913">1913</option>
                                                                    <option value="1912">1912</option>
                                                                    <option value="1911">1911</option>
                                                                    <option value="1910">1910</option>
                                                                    <option value="1909">1909</option>
                                                                    <option value="1908">1908</option>
                                                                    <option value="1907">1907</option>
                                                                    <option value="1906">1906</option>
                                                                    <option value="1905">1905</option>
                                                                    <option value="1904">1904</option>
                                                                    <option value="1903">1903</option>
                                                                    <option value="1902">1902</option>
                                                                    <option value="1901">1901</option>
                                                                    <option value="1900">1900</option>
                                                                    <option value="1899">1899</option>
                                                                    <option value="1898">1898</option>
                                                                    <option value="1897">1897</option>
                                                                </select>
                                                            </div>
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
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Switch & Colors</h3>
                                        </div>
                                        <div class=" card-body">
                                            <div class="form-group">
                                                <div class="form-label">Toggle switch single</div>
                                                <label class="custom-switch">
                                                    <input type="checkbox" name="custom-switch-checkbox"
                                                        class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">I agree with terms and
                                                        conditions</span>
                                                </label>
                                                <div class="form-label">Toggle switch single Checked</div>
                                                <label class="custom-switch">
                                                    <input type="checkbox" name="custom-switch-checkbox"
                                                        class="custom-switch-input" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">I agree with terms and
                                                        conditions</span>
                                                </label>
                                            </div>
                                            <div class="form-group ">
                                                <label class="form-label">Your skills</label>
                                                <div class="selectgroup selectgroup-pills">
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="value" value="HTML"
                                                            class="selectgroup-input" checked="">
                                                        <span class="selectgroup-button">HTML</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="value" value="CSS"
                                                            class="selectgroup-input">
                                                        <span class="selectgroup-button">CSS</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="value" value="PHP"
                                                            class="selectgroup-input">
                                                        <span class="selectgroup-button">PHP</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="value" value="JavaScript"
                                                            class="selectgroup-input">
                                                        <span class="selectgroup-button">JavaScript</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="value" value="Angular"
                                                            class="selectgroup-input">
                                                        <span class="selectgroup-button">Angular</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="value" value="Java"
                                                            class="selectgroup-input">
                                                        <span class="selectgroup-button">Java</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="value" value="C++"
                                                            class="selectgroup-input">
                                                        <span class="selectgroup-button">C++</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group m-0">
                                                <label class="form-label">Select Color</label>
                                                <div class="row gutters-xs">
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="color" type="checkbox" value="azure"
                                                                class="colorinput-input" checked >
                                                            <span class="colorinput-color bg-azure"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="color" type="checkbox" value="indigo"
                                                                class="colorinput-input" >
                                                            <span class="colorinput-color bg-indigo"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="color" type="checkbox" value="purple"
                                                                class="colorinput-input" >
                                                            <span class="colorinput-color bg-purple"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="color" type="checkbox" value="pink"
                                                                class="colorinput-input" >
                                                            <span class="colorinput-color bg-pink"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="color" type="checkbox" value="red"
                                                                class="colorinput-input" >
                                                            <span class="colorinput-color bg-red"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="color" type="checkbox" value="orange"
                                                                class="colorinput-input" >
                                                            <span class="colorinput-color bg-orange"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="color" type="checkbox" value="yellow"
                                                                class="colorinput-input" >
                                                            <span class="colorinput-color bg-yellow"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="color" type="checkbox" value="lime"
                                                                class="colorinput-input" >
                                                            <span class="colorinput-color bg-lime"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="color" type="checkbox" value="green"
                                                                class="colorinput-input" >
                                                            <span class="colorinput-color bg-green"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="color" type="checkbox" value="teal"
                                                                class="colorinput-input" >
                                                            <span class="colorinput-color bg-teal"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Radios & Checkboxes</h3>
                                        </div>
                                        <div class=" card-body">
                                            <div class="form-group form-elements">
                                                <div class="form-label">Radios</div>
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="example-radios" value="option1" checked>
                                                        <span class="custom-control-label">Option 1</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="example-radios" value="option2">
                                                        <span class="custom-control-label">Option 2</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="example-radios" value="option3" disabled>
                                                        <span class="custom-control-label">Option Disabled</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            name="example-radios2" value="option4" disabled checked>
                                                        <span class="custom-control-label">Option Disabled Checked</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group form-elements m-0">
                                                <div class="form-label">Checkboxes</div>
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox1" value="option1" checked>
                                                        <span class="custom-control-label">Option 1</span>
                                                    </label>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox2" value="option2">
                                                        <span class="custom-control-label">Option 2</span>
                                                    </label>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox3" value="option3" disabled>
                                                        <span class="custom-control-label">Option Disabled</span>
                                                    </label>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="example-checkbox4" value="option4" checked disabled>
                                                        <span class="custom-control-label">Option Disabled Checked</span>
                                                    </label>
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
                                            <h3 class="card-title">Mutiple Select Styles</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Basic MutipleSelect</label>
                                                        <select multiple="multiple" class="multi-select">
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Disabled MutipleSelect</label>
                                                        <select multiple="multiple" class="multi-select"
                                                            disabled="disabled">
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Single Group Disabled MutipleSelect</label>
                                                        <select multiple="multiple" class="multi-select">
                                                            <optgroup label="Group 1" disabled="disabled">
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                                <option value="5">Option 5</option>
                                                            </optgroup>
                                                            <optgroup label="Group 2">
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                                <option value="5">Option 5</option>
                                                                <option value="6">Option 6</option>
                                                                <option value="7">Option 7</option>
                                                                <option value="8">Option 8</option>
                                                            </optgroup>
                                                            <optgroup label="Group 3">
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                                <option value="5">Option 5</option>
                                                                <option value="6">Option 6</option>
                                                                <option value="7">Option 7</option>
                                                                <option value="8">Option 8</option>
                                                                <option value="9">Option 9</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Multiple Items With Group-Option</label>
                                                        <select multiple="multiple" class="optmulti-select">
                                                            <optgroup label="Group 1">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </optgroup>
                                                            <optgroup label="Group 2">
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                            </optgroup>
                                                            <optgroup label="Group 3">
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Single Row</label>
                                                        <select multiple="multiple" class="single-select">
                                                            <option value="1">First</option>
                                                            <option value="2">Second</option>
                                                            <option value="3">Third</option>
                                                            <option value="4" selected="selected">Fourth</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label>Group-Option Filter</label>
                                                        <select multiple="multiple" class="group-filter">
                                                            <optgroup label="Group 1">
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                                <option value="5">Option 5</option>
                                                            </optgroup>
                                                            <optgroup label="Group 2">
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                                <option value="5">Option 5</option>
                                                                <option value="6">Option 6</option>
                                                                <option value="7">Option 7</option>
                                                                <option value="8">Option 8</option>
                                                            </optgroup>
                                                            <optgroup label="Group 3">
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                                <option value="5">Option 5</option>
                                                                <option value="6">Option 6</option>
                                                                <option value="7">Option 7</option>
                                                                <option value="8">Option 8</option>
                                                                <option value="9">Option 9</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>MutipleSelect</label>
                                                        <select multiple="multiple" class="multi-select">
                                                            <option value="1" selected="selected">January</option>
                                                            <option value="2" disabled="disabled">February</option>
                                                            <option value="3" selected="selected" disabled="disabled">March
                                                            </option>
                                                            <option value="4" disabled="disabled">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Group-Option MutipleSelect</label>
                                                        <select multiple="multiple" class="multi-select">
                                                            <optgroup label="Group 1">
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                                <option value="5">Option 5</option>
                                                            </optgroup>
                                                            <optgroup label="Group 2">
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                                <option value="5">Option 5</option>
                                                                <option value="6">Option 6</option>
                                                                <option value="7">Option 7</option>
                                                                <option value="8">Option 8</option>
                                                            </optgroup>
                                                            <optgroup label="Group 3">
                                                                <option value="1">Option 1</option>
                                                                <option value="2">Option 2</option>
                                                                <option value="3">Option 3</option>
                                                                <option value="4">Option 4</option>
                                                                <option value="5">Option 5</option>
                                                                <option value="6">Option 6</option>
                                                                <option value="7">Option 7</option>
                                                                <option value="8">Option 8</option>
                                                                <option value="9">Option 9</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Multiple Items</label>
                                                        <select multiple="multiple" class="multiselect">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                            <option value="21">21</option>
                                                            <option value="22">22</option>
                                                            <option value="23">23</option>
                                                            <option value="24">24</option>
                                                            <option value="25">25</option>
                                                            <option value="26">26</option>
                                                            <option value="27">27</option>
                                                            <option value="28">28</option>
                                                            <option value="29">29</option>
                                                            <option value="30">30</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Hide SelectAll</label>
                                                        <select multiple="multiple" class="hide-select">
                                                            <option value="1">First</option>
                                                            <option value="2">Second</option>
                                                            <option value="3">Third</option>
                                                            <option value="4">Fourth</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Select Filter</label>
                                                        <select multiple="multiple" class="filter-multi">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label>Custom Style</label>
                                                        <select multiple="multiple" class="custom-multiselect">
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
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
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Switches </div>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    Bootstrap Switch Default
                                                    <div class="material-switch pull-right">
                                                        <input id="someSwitchOptionDefault" name="someSwitchOption001"
                                                            type="checkbox" >
                                                        <label for="someSwitchOptionDefault" class="label-default"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Bootstrap Switch Primary
                                                    <div class="material-switch pull-right">
                                                        <input id="someSwitchOptionPrimary" name="someSwitchOption001"
                                                            type="checkbox" >
                                                        <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Bootstrap Switch Success
                                                    <div class="material-switch pull-right">
                                                        <input id="someSwitchOptionSuccess" name="someSwitchOption001"
                                                            type="checkbox" >
                                                        <label for="someSwitchOptionSuccess" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Bootstrap Switch Info
                                                    <div class="material-switch pull-right">
                                                        <input id="someSwitchOptionInfo" name="someSwitchOption001"
                                                            type="checkbox" >
                                                        <label for="someSwitchOptionInfo" class="label-info"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Bootstrap Switch Warning
                                                    <div class="material-switch pull-right">
                                                        <input id="someSwitchOptionWarning" name="someSwitchOption001"
                                                            type="checkbox" >
                                                        <label for="someSwitchOptionWarning" class="label-warning"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Bootstrap Switch Danger
                                                    <div class="material-switch pull-right">
                                                        <input id="someSwitchOptionDanger" name="someSwitchOption001"
                                                            type="checkbox" >
                                                        <label for="someSwitchOptionDanger" class="label-danger"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <form method="post" class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Select2 elements</h3>
                                        </div>
                                        <div class="card-body ">
                                            <div class="form-group ">
                                                <label class="form-label">Beast</label>
                                                <select class="form-control select2 form-select"
                                                    data-placeholder="Choose one">
                                                    <option label="Choose one">
                                                    </option>
                                                    <option value="1">Chuck Testa</option>
                                                    <option value="2">Sage Cattabriga-Alosa</option>
                                                    <option value="3">Nikola Tesla</option>
                                                    <option value="4">Cattabriga-Alosa</option>
                                                    <option value="5">Nikola Alosa</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Basic Select2</label>
                                                <select class="form-control select2"
                                                    data-placeholder="Choose one (with optgroup)">
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label"> Select2 with search box</label>
                                                <select class="form-control select2 select2-show-search"
                                                    data-placeholder="Choose one (with searchbox)">
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Users list</label>
                                                <select class="form-control select2" data-placeholder="Choose Browser"
                                                    multiple>
                                                    <option value="Firefox">
                                                        Firefox
                                                    </option>
                                                    <option value="Chrome selected">
                                                        Chrome
                                                    </option>
                                                    <option value="Safari">
                                                        Safari
                                                    </option>
                                                    <option selected value="Opera">
                                                        Opera
                                                    </option>
                                                    <option value="Internet Explorer">
                                                        Internet Explorer
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--div-->
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Basic Date picker
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="date"
                                                        placeholder="Choose date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Date picker With Time
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="datetime"
                                                        placeholder="Choose date with time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Human Friendly dates
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="humanfrienndlydate"
                                                        placeholder="Human friendly dates">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Date range picker
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="daterange"
                                                        placeholder="Date range picker">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--div-->

                                <!--div-->
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Basic Time picker
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="typcn typcn-stopwatch tx-24 lh--9 op-6"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="timepikcr"
                                                        placeholder="Choose time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Time Pickr with 24hr Format
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="typcn typcn-stopwatch tx-24 lh--9 op-6"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="timepickr1"
                                                        placeholder="Choose time in 24hr format">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Time Picker with Limits
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="typcn typcn-stopwatch tx-24 lh--9 op-6"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="limittime"
                                                        placeholder="choose time min 16:00 to max 22:30">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                DateTimePicker with Limited Time Range
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="typcn typcn-stopwatch tx-24 lh--9 op-6"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="limitdatetime"
                                                        placeholder="date with time limit from 16:00 to 22:00">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--div-->

                                <!--div-->
                                <div class="col-xxl-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Inline Calendar
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="inlinecalendar"
                                                    placeholder="Choose date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    Date Picker with week numbers
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group mb-0">
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="weeknum"
                                                            placeholder="Choose date">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    Inline Time Picker
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group mb-0">
                                                    <input type="text" class="form-control" id="inlinetime"
                                                        placeholder="Choose time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    Preloading time
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group mb-0">
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="typcn typcn-stopwatch tx-24 lh--9 op-6"></i>
                                                        </div>
                                                        <input type="text" class="form-control" id="pretime"
                                                            placeholder="Preloading time">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--div-->

                                <!--div-->
                                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Color Picker
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="container  p-0 p-md-5">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <div class="theme-container"></div>
                                                        <div class="pickr-container"></div>
                                                    </div>
                                                    <div>
                                                        <div class="theme-container1"></div>
                                                        <div class="pickr-container1"></div>
                                                    </div>
                                                    <div>
                                                        <div class="theme-container2"></div>
                                                        <div class="pickr-container2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/div-->
                            </div>
                            <!-- END ROW -->

@endsection

@section('scripts')

        <!-- TIMEPICKER JS -->
        <script src="{{asset('build/assets/plugins/time-picker/jquery.timepicker.js')}}"></script>
        <script src="{{asset('build/assets/plugins/time-picker/toggles.min.js')}}"></script>

        <!-- FLATPICKER JS -->
        <script src="{{asset('build/assets/plugins/flatpickr/flatpickr.js')}}"></script>
        @vite('resources/assets/js/flatpickr.js')
        

        <!-- DATEPICKER JS -->
        <script src="{{asset('build/assets/plugins/spectrum-date-picker/spectrum.js')}}"></script>
        <script src="{{asset('build/assets/plugins/spectrum-date-picker/jquery-ui.js')}}"></script>
        <script src="{{asset('build/assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>

        <!-- MULTIPLE SELECT JS -->
        <script src="{{asset('build/assets/plugins/multipleselect/multiple-select.js')}}"></script>
        <script src="{{asset('build/assets/plugins/multipleselect/multi-select.js')}}"></script>

        <!-- INTERNAL COLOR PICKER JS -->
        <script src="{{asset('build/assets/plugins/colorpicker/pickr.es5.min.js')}}"></script>
        @vite('resources/assets/js/colorpicker.js')


        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
        @vite('resources/assets/js/select2.js')


        @vite('resources/assets/js/form-elements.js')


@endsection