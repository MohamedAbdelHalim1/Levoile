@extends('layouts.app')

@section('styles')

@endsection

@section('content')

                            <!-- PAGE-HEADER -->
                            <div class="page-header d-sm-flex d-block">
								<ol class="breadcrumb mb-sm-0 mb-3">
									<!-- breadcrumb -->
									<li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
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
							<!-- END PAGE-HEADER -->

							<!-- ROW -->
							<div class="row">
								<div class="col-xl-12">
									<div class="card overflow-hidden">
										<div class="card-body">
											<div class="profile-bg h-250 cover-image" data-bs-image-src="{{asset('build/assets/images/photos/30.jpg')}}"></div>
											<div class="py-4 position-relative">
												<div class="profile-img">
													<img src="{{asset('build/assets/images/users/male/24.jpg')}}" class="avatar avatar-xxl br-7" alt="person-image">
												</div>
												<div class="mt-5 d-sm-flex align-items-center">
													<div>
														<h3 class="fw-semibold mb-1">Alison Robert</h3>
														<p class="mb-0 fw-semibold text-muted-dark">Coder Space : Senior Software Developer</p>
														<p class="mb-0 my-1 fw-semibold text-muted-dark fs-13">San Francisco, CA USA</p>
														<div class="mb-2">
															<span class="badge badge-light fw-semibold text-dark fs-12 me-2">UX / UI Research</span>
															<span class="badge badge-light fw-semibold text-dark fs-12">Project Management</span>
														</div>
													</div>
													<div class="ms-auto">
														<div class="d-md-flex">
															<div class="d-flex align-items-center me-5 mb-2">
																<span class="avatar avatar-md br-7 bg-gradient-primary"><i class="fe fe-briefcase"></i></span>
																<div class="ms-2">
																	<p class="mb-0 fw-semibold">Reviews</p>
																	<span class="text-muted">256</span>
																</div>
															</div>
															<div class="d-flex align-items-center me-5 mb-2">
																<span class="avatar avatar-md br-7 bg-gradient-warning"><i class="fe fe-cast"></i></span>
																<div class="ms-2">
																	<p class="mb-0 fw-semibold">Photos</p>
																	<span class="text-muted">204</span>
																</div>
															</div>
															<div class="d-flex align-items-center mb-2">
																<span class="avatar avatar-md br-7 bg-gradient-success"><i class="fe fe-users"></i></span>
																<div class="ms-2">
																	<p class="mb-0 fw-semibold">Followers</p>
																	<span class="text-muted">3.2K</span>
																</div>
															</div>
														</div>
													</div>
												</div>

											</div>
											<div class="text-wrap">
												<div class="panel tabs-style6">
													<div class="panel-head d-flex">
														<ul class="nav nav-tabs d-block d-sm-inline-flex">
															<li class="nav-item"><a class="nav-link active fw-bold" data-bs-toggle="tab" href="#style6tab1">About</a></li>
															<li class="nav-item"><a class="nav-link fw-bold" data-bs-toggle="tab" href="#style6tab2">Edit Profile</a></li>
															<li class="nav-item"><a class="nav-link fw-bold" data-bs-toggle="tab" href="#style6tab3">Timeline</a></li>
															<li class="nav-item"><a class="nav-link fw-bold" data-bs-toggle="tab" href="#style6tab4">Gallery</a></li>
															<li class="nav-item"><a class="nav-link fw-bold" data-bs-toggle="tab" href="#style6tab5">Friends</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-12 p-0">
										<div class="panel-body p-0">
											<div class="tab-content">
												<div class="tab-pane active p-0" id="style6tab1">
													<div class="card border-0">
														<div class="card-body p-0">
															<div class="p-4">
																<h3 class="card-title mb-0">Personal Information</h3>
															</div>
															<div class="border-top"></div>
															<div class="p-4">
																<p class="mb-0 fw-semibold">
																	Hi, my name is Alison Robert.
																</p>
																<p class="mb-0 fw-semibold">
																	I'M the Co-founder and Head of designer at GHM agency.
																</p>
																<p class="fw-semibold mb-0">
																	Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse numquam minima porro deserunt ducimus reprehenderit obcaecati, iusto consequuntur accusamus corrupti facere iure necessitatibus tempore velit?
																	Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus sit, non rerum eum, doloribus laborum aspernatur id quam deleniti molestiae possimus assumenda impedit quae ipsa quis nulla error sequi architecto!
																</p>
															</div>
															<div class="border-top"></div>
															<div class="p-4">
																<h6 class="text-uppercase fw-semibold mb-3">Skills</h6>
																<span class="badge badge-gradient-primary mb-3 mb-sm-0">HTML</span>
																<span class="badge badge-gradient-primary mb-3 mb-sm-0">CSS</span>
																<span class="badge badge-gradient-primary mb-3 mb-sm-0">Javascript</span>
																<span class="badge badge-gradient-primary mb-3 mb-sm-0">Jquery</span>
																<span class="badge badge-gradient-primary mb-3 mb-sm-0">Adobe Photoshop</span>
																<span class="badge badge-gradient-primary mb-3 mb-sm-0">Figma</span>
															</div>
															<div class="border-top">
																<div class="p-4">
																	<h6 class="text-uppercase fw-semibold mb-3">Languages</h6>
																	<div class="d-sm-flex">
																		<div class="d-flex align-items-center me-5 mb-sm-0">
																			<img src="{{asset('build/assets/images/flag-images/6.png')}}" class="language-img" alt="country-image">
																			<p class="mb-0 fw-semibold ms-3">English</p>
																		</div>
																		<div class="d-flex align-items-center me-5 mb-sm-0">
																			<img src="{{asset('build/assets/images/flag-images/3.png')}}" class="language-img" alt="country-image">
																			<p class="mb-0 fw-semibold ms-3">German</p>
																		</div>
																		<div class="d-flex align-items-center mb-sm-0">
																			<img src="{{asset('build/assets/images/flag-images/5.png')}}" class="language-img" alt="country-image">
																			<p class="mb-0 fw-semibold ms-3">Russia</p>
																		</div>
																	</div>
																</div>
															</div>
															<div class="border-top"></div>
															<div class="p-4">
																<h6 class="text-uppercase fw-semibold mb-3">Contact Details</h6>
																<div class="d-md-flex">
																	<div class="d-flex align-top me-5 mb-3 mb-sm-0">
																		<span><i class="fe fe-phone border p-3 rounded-circle fs-6 op7 text-dark"></i></span>
																		<div class="ms-3 mb-2">
																			<p class="mb-0 fw-semibold">Mobile</p>
																			<span class="text-muted">+(56)-42013206</span>
																		</div>
																	</div>
																	<div class="d-flex align-top me-5 mb-3 mb-sm-0">
																		<span><i class="fe fe-mail border p-3 rounded-circle fs-6 op7 text-dark"></i></span>
																		<div class="ms-3 mb-2">
																			<p class="mb-0 fw-semibold">Alison</p>
																			<span class="text-muted">alisonrobert@gmail.com</span>
																		</div>
																	</div>
																	<div class="d-flex align-top">
																		<span><i class="fe fe-map border p-3 rounded-circle fs-6 op7 text-dark"></i></span>
																		<div class="ms-3  mb-2">
																			<p class="mb-0 fw-semibold">Current Address</p>
																			<span class="text-muted">San Francisco, CA</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="border-top"></div>
															<div class="p-4">
																<h6 class="text-uppercase fw-semibold mb-3">Social Media</h6>
																<div class="d-md-flex">
																	<div class="d-flex align-top me-4 mb-3 mb-md-0">
																		<span><i class="fe fe-gitlab border text-dark p-3 rounded-circle fs-6 op7"></i></span>
																		<div class="ms-3  mb-2">
																			<p class="mb-0 fw-semibold">Github</p>
																			<a href="javascript:void(0);" class="text-muted-dark">github.com/spruko</a>
																		</div>
																	</div>
																	<div class="d-flex align-top me-4 mb-3 mb-md-0">
																		<span><i class="fe fe-twitter border text-dark p-3 rounded-circle fs-6 op7"></i></span>
																		<div class="ms-3  mb-2">
																			<p class="mb-0 fw-semibold">Twitter</p>
																			<a href="javascript:void(0);" class="text-muted-dark">twitter.com/spruko.me</a>
																		</div>
																	</div>
																	<div class="d-flex align-top">
																		<span><i class="fe fe-linkedin border text-dark p-3 rounded-circle fs-6 op7"></i></span>
																		<div class="ms-3  mb-2">
																			<p class="mb-0 fw-semibold">Linkedin</p>
																			<a href="javascript:void(0);" class="text-muted-dark">spruko.com/</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane p-0" id="style6tab2">
													<div class="card overflow-hidden border-0">
														<div class="card-body">
															<div class="d-flex">
																<div class="ms-auto">
																	<a href="javascript:void(0);" class="btn btn-sm btn-success mx-1">Update</a>
																	<a href="javascript:void(0);" class="btn btn-sm btn-danger">Discard</a>
																</div>
															</div>
															<form class="form-horizontal">
																<h6 class="text-uppercase fw-semibold mb-3">User Name</h6>
																<div class="form-group">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">First Name</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control"
																				placeholder="First Name" value="Alison">
																		</div>
																	</div>
																</div>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">last Name</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control"
																				placeholder="Last Name" value="Robert">
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Nick Name</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control"
																				placeholder="Nick Name" value="Rob">
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<h6 class="text-uppercase fw-semibold mb-0">Your Photo</h6>
																			<span class="text-muted-dark">This will be displayed on Your Profile</span>
																		</div>
																		<div class="col-md-9 d-flex justify-content-between">
																			<img src="{{asset('build/assets/images/users/male/24.jpg')}}" class="avatar avatar-xl br-7" alt="person-image">
																			<div class="d-flex">
																				<a href="javascript:void(0);" class="mb-0 fw-semibold mx-2">Change</a>
																				<a href="javascript:void(0);" class="mb-0 fw-semibold">Delete</a>
																			</div>
																		</div>
																	</div>
																</div>
																<h6 class="text-uppercase fw-semibold mb-3">About Yourself</h6>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">About</label>
																		</div>
																		<div class="col-md-9">
																			<textarea class="form-control" name="example-textarea-input" rows="4" placeholder="about..">Labore sadipscing amet ea ipsum ipsum, diam amet voluptua clita sea takimata labore, et duo et tempor vero dolores ipsum. Kasd rebum tempor lorem dolor at, et ut magna lorem. Labore sadipscing amet ea ipsum ipsum, diam amet voluptua clita sea takimata labore, et duo et tempor vero dolores ipsum. Kasd rebum tempor lorem dolor at, et ut magna lorem.</textarea>
																		</div>
																	</div>
																</div>
																<h6 class="text-uppercase fw-semibold mb-3">Work</h6>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Designation</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control"
																				placeholder="Designation" value="UI/UX Designer">
																		</div>
																	</div>
																</div>
																<h6 class="text-uppercase fw-semibold mb-3">Contact</h6>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Email<i>(required)</i></label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control" placeholder="Email"
																				value="info@Rob.in">
																		</div>
																	</div>
																</div>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Website</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control"
																				placeholder="Website" value="@spruko.w">
																		</div>
																	</div>
																</div>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Phone</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control"
																				placeholder="phone number" value="+125 3545654">
																		</div>
																	</div>
																</div>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Address</label>
																		</div>
																		<div class="col-md-9">
																			<textarea class="form-control" name="example-textarea-input"
																				rows="2"
																				placeholder="Address">San Francisco, CA</textarea>
																		</div>
																	</div>
																</div>
																<h6 class="text-uppercase fw-semibold mb-3">Social Info</h6>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Twitter</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control"
																				placeholder="twitter" value="twitter.com/spruko.me">
																		</div>
																	</div>
																</div>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Facebook</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control"
																				placeholder="facebook"
																				value="https://www.facebook.com/Spruha">
																		</div>
																	</div>
																</div>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Google+</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control" placeholder="google"
																				value="Robert.com">
																		</div>
																	</div>
																</div>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Linked in</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control"
																				placeholder="linkedin" value="linkedin.com/in/spruko">
																		</div>
																	</div>
																</div>
																<div class="form-group ">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Github</label>
																		</div>
																		<div class="col-md-9">
																			<input type="text" class="form-control" placeholder="github"
																				value="github.com/sprukos">
																		</div>
																	</div>
																</div>
																<h6 class="text-uppercase fw-semibold mb-3">Email Preferences</h6>
																<div class="form-group mb-0">
																	<div class="row row-sm">
																		<div class="col-md-3">
																			<label class="form-label fw-semibold text-muted-dark">Verified User</label>
																		</div>
																		<div class="col-md-9 profile-editing">
																			<label class="d-flex align-items-center">
																				<input type="checkbox" checked>
																				<span>Accept to receive post or page notification emails</span>
																			</label>
																			<label class="d-flex align-items-center">
																				<input type="checkbox" checked>
																				<span> Accept to receive email sent to multiple recipients</span>
																			</label>
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="style6tab3">
													<div class="row">
														<div class="col-xl-3">
															<div class="row">
																<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6">
																	<div class="card overflow-hidden">
																		<div class="card-body p-0">
																			<img src="{{asset('build/assets/images/photos/31.jpg')}}" class="h-200 w-100" alt="travel-image">
																			<diV class="post-date">
																				<h5 class="fw-semibold mb-0 px-3 py-1 bg-white br-tr-7 br-tl-7">01</h5>
																				<h5 class="fw-semibold mb-0 px-3 py-1 bg-primary br-br-7 br-bl-7">Jan</h5>
																			</diV>
																			<div class="my-3 px-5">
																				<h4 class="fw-semibold mb-0">Travel to Kalmosia</h4>
																				<span class="text-muted fs-12">31st Dec 2023 at 06:00 Am</span>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6">
																	<div class="card overflow-hidden">
																		<div class="card-header">
																			<h3 class="card-title">People You May Know</h3>
																		</div>
																		<div class="card-body p-0">
																			<ul class="list-group">
																				<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																					<div class="d-flex align-items-center">
																						<img src="{{asset('build/assets/images/users/male/14.jpg')}}" class="avatar avatar-md rounded-circle me-3" alt="person-image">
																						<p class="fw-semibold mb-0 text-dark">Jack Thomson</p>
																					</div>
																					<button class="btn btn-sm p-0"><span class="badge badge-gradient-danger fw-semibold">Remove</span></button>
																				</li>
																				<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																					<div class="d-flex align-items-center">
																						<img src="{{asset('build/assets/images/users/female/4.jpg')}}" class="avatar avatar-md rounded-circle me-3" alt="person-image">
																						<p class="fw-semibold mb-0 text-dark">Terry Aminoff</p>
																					</div>
																					<button class="btn btn-sm p-0"><span class="badge badge-gradient-danger fw-semibold">Remove</span></button>
																				</li>
																				<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																					<div class="d-flex align-items-center">
																						<img src="{{asset('build/assets/images/users/male/9.jpg')}}" class="avatar avatar-md rounded-circle me-3" alt="person-image">
																						<p class="fw-semibold mb-0 text-dark">Willson Bek</p>
																					</div>
																					<button class="btn btn-sm p-0"><span class="badge badge-gradient-danger fw-semibold">Remove</span></button>
																				</li>
																				<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																					<div class="d-flex align-items-center">
																						<img src="{{asset('build/assets/images/users/female/19.jpg')}}" class="avatar avatar-md rounded-circle me-3" alt="person-image">
																						<p class="fw-semibold mb-0 text-dark">Kett Velasacz</p>
																					</div>
																					<button class="btn btn-sm p-0"><span class="badge badge-gradient-danger fw-semibold">Remove</span></button>
																				</li>
																			</ul>
																		</div>
																		<div class="card-footer text-center">
																			<a href="javascript:void(0);" class="fw-semibold">Load More <i class="bi bi-arrow-right"></i></a>
																		</div>
																	</div>
																</div>
																<div class="col-xl-12">
																	<div class="card overflow-hidden">
																		<div class="card-header">
																			<h3 class="card-title">My Events</h3>
																		</div>
																		<div class="card-body p-0">
																			<ul class="list-group">
																				<li class="list-group-item d-flex overflow-visible border-0">
																					<img src="{{asset('build/assets/images/photos/35.jpg')}}" class="br-7 cover-image avatar avatar-xxl" alt="event-iamge">
																					<div class="ps-3 flex-column lh-1">
																						<span class="text-muted-dark fs-13">20 DECEMBER 2022</span>
																						<h6 class="text-dark fw-semibold mt-1">UI/UX California meet up</h6>
																						<span class="text-muted fs-12">150 People has join in this evnet</span>
																					</div>
																				</li>
																				<li class="list-group-item d-flex overflow-visible border-0">
																					<img src="{{asset('build/assets/images/photos/33.jpg')}}" class="br-7 cover-image avatar avatar-xxl" alt="event-iamge">
																					<div class="ps-3 flex-column lh-1">
																						<span class="text-muted-dark fs-13">10 APRIL 2022</span>
																						<h6 class="text-dark fw-semibold mt-1">Fest at USA</h6>
																						<span class="text-muted fs-12">201 People has join in this evnet</span>
																					</div>
																				</li>
																				<li class="list-group-item d-flex overflow-visible border-0">
																					<img src="{{asset('build/assets/images/photos/34.jpg')}}" class="br-7 cover-image avatar avatar-xxl" alt="event-iamge">
																					<div class="ps-3 flex-column lh-1">
																						<span class="text-muted-dark fs-13">05 SEPTEMBER 2022</span>
																						<h6 class="text-dark fw-semibold mt-1">Birthday Celebrations</h6>
																						<span class="text-muted fs-12">68 People has join in this evnet</span>
																					</div>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-xl-7">
															<div class="card">
																<div class="card-body">
																	<form class="mt ng-pristine ng-valid" action="#">
																		<div class="form-group mb-0">
																			<label class="sr-only" for="new-event">New
																				event</label>
																			<textarea class="form-control bg-light"
																				id="new-event" placeholder="Post something..."
																				rows="3"></textarea>
																		</div>
																		<div class="d-flex justify-content-between align-items-center mt-3">
																			<a href="javascript:void(0);"
																					class="btn btn-sm btn-outline-default fw-semibold me-2"><i
																					class="fa fa-camera fa-lg me-2"></i>Add photo</a>
																			<a href="javascript:void(0);" class="btn btn-sm btn-primary">Post</a>
																		</div>
																	</form>
																</div>
															</div>
															<div class="card overflow-hiddem">
																<div class="card-body">
																	<div class="d-flex justify-content-between align-items-center">
																		<div class="d-flex align-items-center">
																			<img src="{{asset('build/assets/images/users/male/24.jpg')}}" class="avatar avatar-md rounded-circle me-3" alt="person-image">
																			<div>
																				<h6 class="fw-semibold mb-0 mt-1">Alison Robert <span class="text-muted">creat new</span> <a href="javascript:void(0);" class="fs-12">Albumn</a></h6>
																				<span class="text-muted">4 hours ago</span>
																			</div>
																		</div>
																		<div class="dropdown">
																			<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="text-dark fs-14"><i class="text-dark fw-semibold fe fe-more-horizontal"></i></a>
																			<div class="dropdown-menu dropdown-menu-right">
																				<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a>
																				<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
																				<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a>
																			</div>
																		</div>
																	</div>
																	<p class="fw-semibold my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, optio.</p>
																	<div class="row">
																		<div class="col-6">
																			<div>
																				<img src="{{asset('build/assets/images/photos/32.jpg')}}" class="br-7" alt="uploaded-images">
																			</div>
																		</div>
																		<div class="col-6">
																			<div class="d-grid gap-3">
																				<img src="{{asset('build/assets/images/photos/29.jpg')}}" class="br-7" alt="uploaded-images">
																				<img src="{{asset('build/assets/images/photos/28.jpg')}}" class="br-7" alt="uploaded-images">
																			</div>
																		</div>
																	</div>
																	<div class="d-flex mt-3 justify-content-between align-items-center">
																		<div class="avatar-list my-auto avatar-list-stacked d-flex align-items-center">
																			<div class="me-4">
																				<span class="avatar avatar-sm brround cover-image mb-0"
																				data-bs-image-src="{{asset('build/assets/images/users/male/11.jpg')}}"></span>
																				<span class="avatar avatar-sm brround cover-image mb-0"
																					data-bs-image-src="{{asset('build/assets/images/users/male/13.jpg')}}"></span>
																				<a href="javascript:void(0);" class="avatar avatar-sm brround cover-image mb-0 bg-primary">+8</a>
																			</div>
																			<p class="text-dark fs-13 mb-0 fw-semibold">+ 68 Likes</p>
																		</div>
																		<div class="text-end">
																			<button type="button" class="mb-0 fw-semibold btn p-0 text-dark"><i class="fa fa-heart-o me-1"></i>46</button>
																			<button type="button" class="mx-3 mb-0 fw-semibold btn p-0 text-dark"><i class="fa fa-commenting-o me-1"></i>10</button>
																			<button type="button" class="mb-0 fw-semibold btn p-0 text-dark"><i class="fa fa-share-square-o me-1"></i>13</button>
																		</div>
																	</div>
																	<div class="mt-5 write-comment">
																		<div class="d-flex justify-content-between border p-0 br-7 align-items-center">
																			<div>
																				<img src="{{asset('build/assets/images/users/male/24.jpg')}}" class="avatar avatar-xs rounded-circle ms-2" alt="person-image">
																				<input type="text" class="form-control border-0 flex-fill ms-7" placeholder="write here">
																			</div>
																			<div class="d-flex align-items-center">
																				<a href="javascript:void(0);" class="me-3"><i class="fa fa-link text-dark fs-14"></i></a>
																				<a href="javascript:void(0);" class="me-3"><i class="fa fa-at text-dark fs-14"></i></a>
																				<button type="button" class="btn p-0">😊</button>
																			</div>
																		</div>
																	</div>
																	<div class="mt-5 mb-3 d-flex">
																		<div class="d-flex">
																			<img src="{{asset('build/assets/images/users/female/17.jpg')}}" class="avatar avatar-md rounded-circle me-2" alt="person-image">
																			<div>
																				<h6 class="fw-semibold mb-0 mt-1">Mozark Ben</h6>
																				<span class="text-muted fs-12">Today 04:40 PM</span>
																				<p class="fw-semibold mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque, blanditiis.</p>
																			</div>
																		</div>
																		<div class="ms-auto">
																			<button type="button" class="mb-0 fw-semibold btn p-0 text-dark me-2"><i class="fa fa-heart-o me-1"></i>46</button>
																			<button type="button" class="mb-0 fw-semibold btn p-0 text-dark"><i class="fa fa-mail-reply me-1"></i>10</button>
																		</div>
																	</div>
																	<div class="mb-3 d-flex px-5">
																		<div class="d-flex">
																			<img src="{{asset('build/assets/images/users/male/24.jpg')}}" class="avatar avatar-md rounded-circle me-2" alt="person-image">
																			<div>
																				<h6 class="fw-semibold mb-0 mt-1">Alison Robert</h6>
																				<span class="text-muted fs-12">Today 04:50 PM</span>
																				<p class="fw-semibold mb-0"><span class="fw-bold">Mozark Ben</span>, Thank you i really appreciate your feedback Lorem ipsum dolor sit amet.</p>
																			</div>
																		</div>
																		<div class="ms-auto">
																			<button type="button" class="mb-0 fw-semibold btn p-0 text-dark me-1"><i class="fa fa-heart-o"></i></button>|
																			<button type="button" class="mb-0 fw-semibold btn p-0 text-dark"><i class="fa fa-mail-reply"></i></button>
																		</div>
																	</div>
																	<div class="mb-3 d-flex px-5">
																		<div class="d-flex">
																			<img src="{{asset('build/assets/images/users/male/22.jpg')}}" class="avatar avatar-md rounded-circle me-2" alt="person-image">
																			<div>
																				<h6 class="fw-semibold mb-0 mt-1">Jeck Vascrod</h6>
																				<span class="text-muted fs-12">Today 04:55 PM</span>
																				<p class="fw-semibold mb-0"><span class="fw-bold">Mozark Ben</span>, Really its cool to see awesome locations</p>
																			</div>
																		</div>
																		<div class="ms-auto">
																			<button type="button" class="mb-0 fw-semibold btn p-0 text-dark me-1"><i class="fa fa-heart-o"></i></button>|
																			<button type="button" class="mb-0 fw-semibold btn p-0 text-dark"><i class="fa fa-mail-reply"></i></button>
																		</div>
																	</div>
																	<div class="mt-3 write-comment px-5">
																		<div class="d-flex justify-content-between border p-0 br-7 align-items-center">
																			<div>
																				<img src="{{asset('build/assets/images/users/male/24.jpg')}}" class="avatar avatar-xs rounded-circle ms-2" alt="person-image">
																				<input type="text" class="form-control border-0 flex-fill ms-6" placeholder="write here">
																			</div>
																			<div class="d-flex align-items-center">
																				<a href="javascript:void(0);" class="me-2"><i class="fa fa-link text-dark fs-14"></i></a>
																				<a href="javascript:void(0);" class="me-2"><i class="fa fa-at text-dark fs-14"></i></a>
																				<button type="button" class="btn p-0">😊</button>
																			</div>
																		</div>
																	</div>
																	<div class="mt-5 mb-3 d-flex">
																		<div class="d-flex">
																			<img src="{{asset('build/assets/images/users/female/12.jpg')}}" class="avatar avatar-md rounded-circle me-2" alt="person-image">
																			<div>
																				<h6 class="fw-semibold mb-0 mt-1">Mozark Ben</h6>
																				<span class="text-muted fs-12">yesterday 02:40 Am</span>
																				<p class="fw-semibold mb-0">Your Gallery was superb awesome, as always! keep it up, can't wait see more.</p>
																			</div>
																		</div>
																		<div class="ms-auto">
																			<button type="button" class="mb-0 fw-semibold btn p-0 text-dark me-2"><i class="fa fa-heart-o me-1"></i>20</button>
																			<button type="button" class="mb-0 fw-semibold btn p-0 text-dark"><i class="fa fa-mail-reply me-1"></i>5</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-xl-2">
															<div class="card overflow-hidden">
																<div class="card-header pb-0 border-bottom-0">
																	<h3 class="card-title">Contacts</h3>
																</div>
																<div class="card-body p-0">
																	<div class="p-3 contact-search">
																		<button class="btn"><i class="fe fe-search fw-semibold text-muted" aria-hidden="true"></i></button>
																		<input type="text" class="form-control h-6" id="typehead1" placeholder="Search here..." autocomplete="off">
																	</div>
																	<ul class="list-group">
																		<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																			<div class="d-flex align-items-center">
																				<span class="avatar brround avatar-md cover-image me-3"
																					data-bs-image-src="{{asset('build/assets/images/users/male/15.jpg')}}">
																					<span class="avatar-status bg-green"></span>
																				</span>
																				<p class="fw-semibold mb-0 text-dark">Robert Ani</p>
																			</div>
																		</li>
																		<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																			<div class="d-flex align-items-center">
																				<span class="avatar brround avatar-md cover-image me-3"
																					data-bs-image-src="{{asset('build/assets/images/users/female/5.jpg')}}">
																					<span class="avatar-status bg-green"></span>
																				</span>
																				<p class="fw-semibold mb-0 text-dark">Marvin Steward</p>
																			</div>
																		</li>
																		<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																			<div class="d-flex align-items-center">
																				<span class="avatar brround avatar-md cover-image me-3"
																					data-bs-image-src="{{asset('build/assets/images/users/male/13.jpg')}}">
																					<span class="avatar-status bg-green"></span>
																				</span>
																				<p class="fw-semibold mb-0 text-dark">Hakim Abdul</p>
																			</div>
																		</li>
																		<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																			<div class="d-flex align-items-center">
																				<span class="avatar brround avatar-md cover-image me-3"
																					data-bs-image-src="{{asset('build/assets/images/users/female/10.jpg')}}">
																					<span class="avatar-status bg-green"></span>
																				</span>
																				<p class="fw-semibold mb-0 text-dark">Dina Rose</p>
																			</div>
																		</li>
																		<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																			<div class="d-flex align-items-center">
																				<span class="avatar brround avatar-md cover-image me-3"
																					data-bs-image-src="{{asset('build/assets/images/users/female/11.jpg')}}">
																					<span class="avatar-status bg-green"></span>
																				</span>
																				<p class="fw-semibold mb-0 text-dark">Angel Henry</p>
																			</div>
																		</li>
																		<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																			<div class="d-flex align-items-center">
																				<span class="avatar brround avatar-md cover-image me-3"
																					data-bs-image-src="{{asset('build/assets/images/users/male/16.jpg')}}">
																					<span class="avatar-status bg-green"></span>
																				</span>
																				<p class="fw-semibold mb-0 text-dark">Bek Romes</p>
																			</div>
																		</li>
																		<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																			<div class="d-flex align-items-center">
																				<span class="avatar brround avatar-md cover-image me-3"
																					data-bs-image-src="{{asset('build/assets/images/users/male/8.jpg')}}">
																					<span class="avatar-status bg-green"></span>
																				</span>
																				<p class="fw-semibold mb-0 text-dark">Adam Jeph</p>
																			</div>
																		</li>
																		<li class="list-group-item d-flex justify-content-between align-items-center border-0">
																			<div class="d-flex align-items-center">
																				<span class="avatar brround avatar-md cover-image me-3"
																					data-bs-image-src="{{asset('build/assets/images/users/female/7.jpg')}}">
																					<span class="avatar-status bg-green"></span>
																				</span>
																				<p class="fw-semibold mb-0 text-dark">Molly Meph</p>
																			</div>
																		</li>
																	</ul>
																</div>
																<div class="card-footer text-center">
																	<a href="javascript:void(0);" class="fw-semibold">Load More <i class="bi bi-arrow-right"></i></a>
																</div>
															</div>
															<div class="card overflow-hidden">
																<div class="card-header pb-0 border-bottom-0">
																	<h3 class="card-title">Topics You Follow</h3>
																</div>
																<div class="card-body">
																	<div class="tags">
																		<span class="tag">
																			Life style
																			<a href="javascript:void(0)" class="tag-addon"><i
																					class="fe fe-x"></i></a>
																		</span>
																		<span class="tag">
																			Health
																			<a href="javascript:void(0)" class="tag-addon"><i
																					class="fe fe-x"></i></a>
																		</span>
																		<span class="tag">
																			Business
																			<a href="javascript:void(0)" class="tag-addon"><i
																					class="fe fe-x"></i></a>
																		</span>
																		<span class="tag">
																			Shopping
																			<a href="javascript:void(0)" class="tag-addon"><i
																					class="fe fe-x"></i></a>
																		</span>
																		<span class="tag">
																			Marketing
																			<a href="javascript:void(0)" class="tag-addon"><i
																					class="fe fe-x"></i></a>
																		</span>
																		<span class="tag">
																			Entertainment
																			<a href="javascript:void(0)" class="tag-addon"><i
																					class="fe fe-x"></i></a>
																		</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="style6tab4">
													<ul id="lightgallery" class="list-unstyled row">
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/1.jpg')}}"
															data-src="{{asset('build/assets/images/media/1.jpg')}}"
															data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive br-7" src="{{asset('build/assets/images/media/1.jpg')}}"
																	alt="Thumb-1">
															</a>
														</li>
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/2.jpg')}}"
															data-src="{{asset('build/assets/images/media/2.jpg')}}"
															data-sub-html="<h4>Gallery Image 2</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive br-7" src="{{asset('build/assets/images/media/2.jpg')}}"
																	alt="Thumb-2">
															</a>
														</li>
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/3.jpg')}}"
															data-src="{{asset('build/assets/images/media/3.jpg')}}"
															data-sub-html="<h4>Gallery Image 3</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive br-7" src="{{asset('build/assets/images/media/3.jpg')}}"
																	alt="Thumb-1">
															</a>
														</li>
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/4.jpg')}}"
															data-src="{{asset('build/assets/images/media/4.jpg')}}"
															data-sub-html=" <h4>Gallery Image 4</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive br-7" src="{{asset('build/assets/images/media/4.jpg')}}"
																	alt="Thumb-2">
															</a>
														</li>
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/5.jpg')}}"
															data-src="{{asset('build/assets/images/media/5.jpg')}}"
															data-sub-html="<h4>Gallery Image 5</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive br-7" src="{{asset('build/assets/images/media/5.jpg')}}"
																	alt="Thumb-1">
															</a>
														</li>
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/6.jpg')}}"
															data-src="{{asset('build/assets/images/media/6.jpg')}}"
															data-sub-html="<h4>Gallery Image 6</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive br-7" src="{{asset('build/assets/images/media/6.jpg')}}"
																	alt="Thumb-2">
															</a>
														</li>
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/7.jpg')}}"
															data-src="{{asset('build/assets/images/media/7.jpg')}}"
															data-sub-html="<h4>Gallery Image 7</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive br-7" src="{{asset('build/assets/images/media/7.jpg')}}"
																	alt="Thumb-1">
															</a>
														</li>
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/8.jpg')}}"
															data-src="{{asset('build/assets/images/media/8.jpg')}}"
															data-sub-html="<h4>Gallery Image 8</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive br-7" src="{{asset('build/assets/images/media/8.jpg')}}"
																	alt="Thumb-2">
															</a>
														</li>
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/9.jpg')}}"
															data-src="{{asset('build/assets/images/media/9.jpg')}}"
															data-sub-html="<h4>Gallery Image 9</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive mb-0 br-7" src="{{asset('build/assets/images/media/9.jpg')}}"
																	alt="Thumb-1">
															</a>
														</li>
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/10.jpg')}}"
															data-src="{{asset('build/assets/images/media/10.jpg')}}"
															data-sub-html="<h4>Gallery Image 10</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive mb-0 br-7" src="{{asset('build/assets/images/media/10.jpg')}}"
																	alt="Thumb-2">
															</a>
														</li>
														<li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0"
															data-responsive="{{asset('build/assets/images/media/11.jpg')}}"
															data-src="{{asset('build/assets/images/media/11.jpg')}}"
															data-sub-html="<h4>Gallery Image 11</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
															<a href="javascript:void(0)">
																<img class="img-responsive mb-0 br-7" src="{{asset('build/assets/images/media/11.jpg')}}"
																	alt="Thumb-1">
															</a>
														</li>
													</ul>
												</div>
												<div class="tab-pane" id="style6tab5">
													<div class="row row-sm">
														<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
															<div class="card">
																<div class="card-body text-center">
																	<div class="dropdown float-end">
																		<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="text-dark fs-14"><i class="text-dark fw-semibold fe fe-more-vertical"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a>
																		</div>
																	</div>
																	<a href="{{url('profile')}}">
																		<img alt="avatar" class="rounded-circle ms-3 avatar avatar-xxl" src="{{asset('build/assets/images/users/male/14.jpg')}}">
																		<h4 class="mb-1 mt-3 text-dark fw-semibold">James Thomas</h4>
																	</a>
																	<div>
																		<h6 class="text-muted-dark fw-semibold mb-0">Web designer</h6>
																		<span class="fs-13 text-muted">james@gmail.com</span>
																	</div>
																	<div class="mt-3 d-flex mx-auto text-center justify-content-center">
																		<a href="javascript:void(0);" class="mx-3">
																			<i class="bx bxl-facebook bg-primary-light rounded-circle p-2 fs-20"></i>
																		</a>
																		<a href="javascript:void(0);" class="mx-3">
																			<i class="bx bxl-twitter bg-primary-light rounded-circle p-2 fs-20"></i>
																		</a>
																		<a href="javascript:void(0);" class="mx-3">
																			<i class="bx bxl-linkedin bg-primary-light rounded-circle p-2 fs-20"></i>
																		</a>
																	</div>
																</div>
																<div class="card-footer text-center bg-primary-light">
																	<p class="fw-bold mb-0 text-uppercase fs-12 text-primary">Senior Creative Developer</p>
																</div>
															</div>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
															<div class="card">
																<div class="card-body text-center">
																	<div class="dropdown float-end">
																		<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="text-dark fs-14"><i class="text-dark fw-semibold fe fe-more-vertical"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a>
																		</div>
																	</div>
																	<a href="{{url('profile')}}">
																		<img alt="avatar" class="rounded-circle ms-3 avatar avatar-xxl" src="{{asset('build/assets/images/users/male/3.jpg')}}">
																		<h4 class="mb-1 mt-3 text-dark fw-semibold">Mike Edward</h4>
																	</a>
																	<div>
																		<h6 class="text-muted-dark fw-semibold mb-0">Web designer</h6>
																		<span class="fs-13 text-muted">edward@gmail.com</span>
																	</div>
																	<div class="mt-3 d-flex mx-auto text-center justify-content-center">
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-facebook bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-twitter bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-linkedin bg-primary-light rounded-circle p-2 fs-20"></i></a>
																	</div>
																</div>
																<div class="card-footer text-center bg-primary-light">
																	<p class="fw-bold mb-0 text-uppercase fs-12 text-primary">Senior Creative Developer</p>
																</div>
															</div>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
															<div class="card">
																<div class="card-body text-center">
																	<div class="dropdown float-end">
																		<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="text-dark fs-14"><i class="text-dark fw-semibold fe fe-more-vertical"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a>
																		</div>
																	</div>
																	<a href="{{url('profile')}}">
																		<img alt="avatar" class="rounded-circle ms-3 avatar avatar-xxl" src="{{asset('build/assets/images/users/male/4.jpg')}}">
																		<h4 class="mb-1 mt-3 text-dark fw-semibold">Mark Thmason</h4>
																	</a>
																	<div>
																		<h6 class="text-muted-dark fw-semibold mb-0">Web designer</h6>
																		<span class="fs-13 text-muted">mark@gmail.com</span>
																	</div>
																	<div class="mt-3 d-flex mx-auto text-center justify-content-center">
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-facebook bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-twitter bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-linkedin bg-primary-light rounded-circle p-2 fs-20"></i></a>
																	</div>
																</div>
																<div class="card-footer text-center bg-primary-light">
																	<p class="fw-bold mb-0 text-uppercase fs-12 text-primary">Senior Creative Developer</p>
																</div>
															</div>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
															<div class="card">
																<div class="card-body text-center">
																	<div class="dropdown float-end">
																		<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="text-dark fs-14"><i class="text-dark fw-semibold fe fe-more-vertical"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a>
																		</div>
																	</div>
																	<a href="{{url('profile')}}">
																		<img alt="avatar" class="rounded-circle ms-3 avatar avatar-xxl" src="{{asset('build/assets/images/users/male/7.jpg')}}">
																		<h4 class="mb-1 mt-3 text-dark fw-semibold">Jefferson</h4>
																	</a>
																	<div>
																		<h6 class="text-muted-dark fw-semibold mb-0">Web designer</h6>
																		<span class="fs-13 text-muted">jeffer@gmail.com</span>
																	</div>
																	<div class="mt-3 d-flex mx-auto text-center justify-content-center">
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-facebook bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-twitter bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-linkedin bg-primary-light rounded-circle p-2 fs-20"></i></a>
																	</div>
																</div>
																<div class="card-footer text-center bg-primary-light">
																	<p class="fw-bold mb-0 text-uppercase fs-12 text-primary">Senior Creative Developer</p>
																</div>
															</div>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
															<div class="card">
																<div class="card-body text-center">
																	<div class="dropdown float-end">
																		<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="text-dark fs-14"><i class="text-dark fw-semibold fe fe-more-vertical"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a>
																		</div>
																	</div>
																	<a href="{{url('profile')}}">
																		<img alt="avatar" class="rounded-circle ms-3 avatar avatar-xxl" src="{{asset('build/assets/images/users/male/11.jpg')}}">
																		<h4 class="mb-1 mt-3 text-dark fw-semibold">Helen Voizekh</h4>
																	</a>
																	<div>
																		<h6 class="text-muted-dark fw-semibold mb-0">Web designer</h6>
																		<span class="fs-13 text-muted">helen@gmail.com</span>
																	</div>
																	<div class="mt-3 d-flex mx-auto text-center justify-content-center">
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-facebook bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-twitter bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-linkedin bg-primary-light rounded-circle p-2 fs-20"></i></a>
																	</div>
																</div>
																<div class="card-footer text-center bg-primary-light">
																	<p class="fw-bold mb-0 text-uppercase fs-12 text-primary">Senior Creative Developer</p>
																</div>
															</div>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
															<div class="card">
																<div class="card-body text-center">
																	<div class="dropdown float-end">
																		<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="text-dark fs-14"><i class="text-dark fw-semibold fe fe-more-vertical"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a>
																		</div>
																	</div>
																	<a href="{{url('profile')}}">
																		<img alt="avatar" class="rounded-circle ms-3 avatar avatar-xxl" src="{{asset('build/assets/images/users/male/12.jpg')}}">
																		<h4 class="mb-1 mt-3 text-dark fw-semibold">Jak Scarlet</h4>
																	</a>
																	<div>
																		<h6 class="text-muted-dark fw-semibold mb-0">Web designer</h6>
																		<span class="fs-13 text-muted">scarlet@gmail.com</span>
																	</div>
																	<div class="mt-3 d-flex mx-auto text-center justify-content-center">
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-facebook bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-twitter bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-linkedin bg-primary-light rounded-circle p-2 fs-20"></i></a>
																	</div>
																</div>
																<div class="card-footer text-center bg-primary-light">
																	<p class="fw-bold mb-0 text-uppercase fs-12 text-primary">Senior Creative Developer</p>
																</div>
															</div>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
															<div class="card">
																<div class="card-body text-center">
																	<div class="dropdown float-end">
																		<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="text-dark fs-14"><i class="text-dark fw-semibold fe fe-more-vertical"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a>
																		</div>
																	</div>
																	<a href="{{url('profile')}}">
																		<img alt="avatar" class="rounded-circle ms-3 avatar avatar-xxl" src="{{asset('build/assets/images/users/male/13.jpg')}}">
																		<h4 class="mb-1 mt-3 text-dark fw-semibold">Ronald mef</h4>
																	</a>
																	<div>
																		<h6 class="text-muted-dark fw-semibold mb-0">Web designer</h6>
																		<span class="fs-13 text-muted">ronald@gmail.com</span>
																	</div>
																	<div class="mt-3 d-flex mx-auto text-center justify-content-center">
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-facebook bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-twitter bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-linkedin bg-primary-light rounded-circle p-2 fs-20"></i></a>
																	</div>
																</div>
																<div class="card-footer text-center bg-primary-light">
																	<p class="fw-bold mb-0 text-uppercase fs-12 text-primary">Senior Creative Developer</p>
																</div>
															</div>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
															<div class="card">
																<div class="card-body text-center">
																	<div class="dropdown float-end">
																		<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="text-dark fs-14"><i class="text-dark fw-semibold fe fe-more-vertical"></i></a>
																		<div class="dropdown-menu dropdown-menu-right">
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a>
																			<a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a>
																		</div>
																	</div>
																	<a href="{{url('profile')}}">
																		<img alt="avatar" class="rounded-circle ms-3 avatar avatar-xxl" src="{{asset('build/assets/images/users/male/7.jpg')}}">
																		<h4 class="mb-1 mt-3 text-dark fw-semibold">Valmdir Raksha</h4>
																	</a>
																	<div>
																		<h6 class="text-muted-dark fw-semibold mb-0">Web designer</h6>
																		<span class="fs-13 text-muted">valmdir@gmail.com</span>
																	</div>
																	<div class="mt-3 d-flex mx-auto text-center justify-content-center">
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-facebook bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-twitter bg-primary-light rounded-circle p-2 fs-20"></i></a>
																		<a href="javascript:void(0);" class="mx-3"><i class="bx bxl-linkedin bg-primary-light rounded-circle p-2 fs-20"></i></a>
																	</div>
																</div>
																<div class="card-footer text-center bg-primary-light">
																	<p class="fw-bold mb-0 text-uppercase fs-12 text-primary">Senior Creative Developer</p>
																</div>
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

@endsection

@section('scripts')

        <!-- SELECT2 JS -->
        <script src="{{asset('build/assets/plugins/select2/select2.full.min.js')}}"></script>
		@vite('resources/assets/js/select2.js')


		<!-- GALLERY JS -->
		<script src="{{asset('build/assets/plugins/gallery/picturefill.js')}}"></script>
		<script src="{{asset('build/assets/plugins/gallery/lightgallery.js')}}"></script>
		<script src="{{asset('build/assets/plugins/gallery/lightgallery-1.js')}}"></script>
		<script src="{{asset('build/assets/plugins/gallery/lg-pager.js')}}"></script>
		<script src="{{asset('build/assets/plugins/gallery/lg-autoplay.js')}}"></script>
		<script src="{{asset('build/assets/plugins/gallery/lg-fullscreen.js')}}"></script>
		<script src="{{asset('build/assets/plugins/gallery/lg-zoom.js')}}"></script>
		<script src="{{asset('build/assets/plugins/gallery/lg-hash.js')}}"></script>
		<script src="{{asset('build/assets/plugins/gallery/lg-share.js')}}"></script>

@endsection