
			<div class="app-header header sticky">
					<div class="container-fluid main-container">
						<div class="d-flex">
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
								href="javascript:void(0)"></a>
							<!-- sidebar-toggle-->
							<a class="logo-horizontal" href="{{url('index')}}">
								<img src="{{asset('build/assets/images/brand/logo.png')}}" class="header-brand-img main-logo"
									alt="Sparic logo">
								<img src="{{asset('build/assets/images/brand/logo-light.png')}}" class="header-brand-img darklogo"
									alt="Sparic logo">
							</a>
							<!-- LOGO -->
							<div class="main-header-center ms-3 d-none d-lg-block">
								<input type="text" class="form-control" id="typehead" placeholder="Search for results..."
									autocomplete="off">
								<button class="btn px-2"><i class="fe fe-search" aria-hidden="true"></i></button>
							</div>
							<div class="d-flex order-lg-2 ms-auto header-right-icons">
								<div class="dropdown d-none">
									<a href="javascript:void(0)" class="nav-link icon" data-bs-toggle="dropdown">
										<i class="fe fe-search"></i>
									</a>
									<div class="dropdown-menu header-search dropdown-menu-start">
										<div class="input-group w-100 p-2">
											<input type="text" class="form-control" placeholder="Search....">
											<div class="input-group-text btn btn-primary">
												<i class="fe fe-search" aria-hidden="true"></i>
											</div>
										</div>
									</div>
								</div>
								<!-- SEARCH -->
								<button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
									data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false"
									aria-label="Toggle navigation">
									<span class="navbar-toggler-icon fe fe-more-vertical"></span>
								</button>
								<div class="navbar navbar-collapse responsive-navbar p-0">
									<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
										<div class="d-flex order-lg-2">
											<div class="dropdown d-lg-none d-flex">
												<a href="javascript:void(0)" class="nav-link icon"
													data-bs-toggle="dropdown">
													<i class="fe fe-search"></i>
												</a>
												<div class="dropdown-menu header-search dropdown-menu-start">
													<div class="input-group w-100 p-2">
														<input type="text" class="form-control" placeholder="Search....">
														<div class="input-group-text btn btn-primary">
															<i class="fa fa-search" aria-hidden="true"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="dropdown d-flex country">
												<a class="nav-link icon text-center" data-bs-toggle="dropdown">
													<i class="ri-global-line"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
													<div class="drop-heading border-bottom">
														<h6 class="mt-1 mb-0 fs-14 fw-semibold text-dark"> Choose Language</h6>
													</div>
													<a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"> <img src="{{asset('build/assets/images/flag-images/3.png')}}" alt="img" class="me-2 country language-img"> <span class="fs-13 text-wrap text-dark fw-semibold"> Germany</span> </a>
													<a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"> <img src="{{asset('build/assets/images/flag-images/5.png')}}" alt="img" class="me-2 country language-img"> <span class="fs-13 text-wrap text-dark fw-semibold"> Russia</span> </a>
													<a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"> <img src="{{asset('build/assets/images/flag-images/6.png')}}" alt="img" class="me-2 country language-img"> <span class="fs-13 text-wrap text-dark fw-semibold"> United Kingdom</span> </a>
													<a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"> <img src="{{asset('build/assets/images/flag-images/2.png')}}" alt="img" class=" me-2 country language-img"> <span class="fs-13 text-wrap text-dark fw-semibold"> Canada</span> </a>
												</div>
											</div>
											<!-- COUNTRY -->
											<div class="d-flex country">
												<a class="nav-link icon theme-layout nav-link-bg layout-setting">
													<span class="dark-layout mt-1"><i class="ri-moon-clear-line"></i></span>
													<span class="light-layout mt-1"><i class="ri-sun-line"></i></span>
												</a>
											</div>
											<!-- Theme-Layout -->
											<div class="dropdown d-flex shopping-cart">
												<a class="nav-link icon text-center" data-bs-toggle="dropdown">
													<i class="ri-shopping-bag-line"></i><span
														class="badge bg-secondary header-badge">4</span>
												</a>
												<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
													<div class="drop-heading border-bottom">
														<h6 class="mt-1 mb-0 fs-14 fw-semibold text-dark"> My Shopping
															Cart</h6>
													</div>
													<div class="header-dropdown-list message-menu">
														<div class="dropdown-item d-flex">
															<a href="{{url('cart')}}" class="p-0">
																<img
																class="avatar avatar-lg br-7 me-3 align-self-center cover-image" alt="product-image"
																src="{{asset('build/assets/images/products/7.jpg')}}">
															</a>
															<div class="wd-50p d-flex flex-column">
																<a href="{{url('cart')}}" class="p-0 h6 text-dark fw-semibold mb-0">Flower pot home decores</a>
																<span>Qty: 1</span>
																<span>Status: <span class="text-success">In
																	Stock</span></span>
															</div>
															<div class="my-auto ms-auto text-end">
																<p class="fs-16 fw-semibold text-dark d-none d-sm-block px-3 mb-0">
																	$438
																</p>
															</div>
														</div>
														<div class="dropdown-item d-flex">
															<a href="{{url('cart')}}" class="p-0">
																<img
																class="avatar avatar-lg br-7 me-3 align-self-center cover-image" alt="product-image"
																src="{{asset('build/assets/images/products/4.jpg')}}">
															</a>
															<div class="wd-50p d-flex flex-column">
																<a href="{{url('cart')}}" class="p-0 h6 text-dark fw-semibold mb-0">Smart watch</a>
																<span>Qty: 3</span>
																<span>Status: <span class="text-danger">Out Stock</span></span>
															</div>
															<div class="my-auto ms-auto text-end">
																<p class="fs-16 fw-semibold text-dark d-none d-sm-block px-3 mb-0">
																	$323
																</p>
															</div>
														</div>
														<div class="dropdown-item d-flex">
															<a href="{{url('cart')}}" class="p-0">
																<img
																class="avatar avatar-lg br-7 me-3 align-self-center cover-image" alt="product-image"
																src="{{asset('build/assets/images/products/5.jpg')}}">
															</a>
															<div class="wd-50p d-flex flex-column">
																<a href="{{url('cart')}}" class="p-0 h6 text-dark fw-semibold mb-0">Headphones</a>
																<span>Qty: 2</span>
																<span>Status: <span class="text-success">In
																	Stock</span></span>
															</div>
															<div class="my-auto ms-auto text-end">
																<p class="fs-16 fw-semibold text-dark d-none d-sm-block px-3 mb-0">
																	$867
																</p>
															</div>
														</div>
														<div class="dropdown-item d-flex">
															<a href="{{url('cart')}}" class="p-0">
																<img
																class="avatar avatar-lg br-7 me-3 align-self-center cover-image" alt="product-image"
																src="{{asset('build/assets/images/products/30.jpg')}}">
															</a>
															<div class="wd-50p d-flex flex-column">
																<a href="{{url('cart')}}" class="p-0 h6 text-dark fw-semibold mb-0">Furniture (chair)</a>
																<span>Qty: 1</span>
																<span>Status: <span class="text-success">In
																	Stock</span></span>
															</div>
															<div class="my-auto ms-auto text-end">
																<p class="fs-16 fw-semibold text-dark d-none d-sm-block px-3 mb-0">
																	$456
																</p>
															</div>
														</div>
														<div class="dropdown-item d-flex border-bottom-0">
															<a href="{{url('cart')}}" class="p-0">
																<img
																class="avatar avatar-lg br-7 me-3 align-self-center cover-image" alt="product-image"
																src="{{asset('build/assets/images/products/8.jpg')}}">
															</a>
															<div class="wd-50p d-flex flex-column">
																<a href="{{url('cart')}}" class="p-0 h6 text-dark fw-semibold mb-0">Running Shoes</a>
																<span>Qty: 4</span>
																<span>Status: <span class="text-danger">In
																	Stock</span></span>
															</div>
															<div class="my-auto ms-auto text-end">
																<p class="fs-16 fw-semibold text-dark d-none d-sm-block px-3 mb-0">
																	$438
																</p>
															</div>
														</div>
													</div>
													<div class="dropdown-divider m-0"></div>
													<div class="dropdown-footer d-felx justify-content-between align-items-center">
														<a class="btn btn-primary btn-pill btn-sm"
															href="{{url('checkout')}}"><i class="fe fe-check-circle"></i>
															CHECKOUT</a>
														<span class="float-end fs-17 fw-semibold text-dark"><span class="text-muted-dark">Total:</span> $4206</span>
													</div>
												</div>
											</div>
											<!-- CART -->
											<div class="dropdown d-flex">
												<a class="nav-link icon full-screen-link" id="fullscreen-button">
													<i class="ri-fullscreen-exit-line fullscreen-button"></i>
												</a>
											</div>
											<!-- FULL-SCREEN -->
											<div class="dropdown d-flex notifications nav-link-notify">
												<a class="nav-link icon" data-bs-toggle="dropdown"><i
														class="ri-notification-line"></i><span class=" pulse"></span>
												</a>
												<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow ">
													<div class="drop-heading border-bottom">
														<h6 class="mt-1 mb-0 fs-14 text-dark fw-semibold">Notifications
														</h6>
													</div>
													<div class="notifications-menu header-dropdown-scroll">
														<a class="dropdown-item border-bottom d-flex" href="{{url('notify-list')}}">
															<div>
																<span class="avatar avatar-md fs-20 brround fw-semibold text-center bg-primary-transparent"><i class="fe fe-message-square text-primary"></i></span>
															</div>
															<div class="wd-80p ms-3 my-auto">
																<h5 class="text-dark mb-0 fw-semibold">Gladys Dare <span
																		class="text-muted">commented on</span>
																	Ecosystems</h5>
																<span class="notification-subtext">2m ago</span>
															</div>
														</a>
														<a class="dropdown-item border-bottom d-flex" href="{{url('notify-list')}}">
															<div>
																<span class="avatar avatar-md fs-20 brround fw-semibold text-danger bg-danger-transparent"><i class="fe fe-user"></i></span>
															</div>
															<div class="wd-80p ms-3 my-auto">
																<h5 class="text-dark mb-0 fw-semibold">Jackson Wisky
																	<span class="text-muted"> followed
																		you</span>
																</h5>
																<span class="notification-subtext">15 min ago</span>
															</div>
														</a>
														<a class="dropdown-item border-bottom d-flex" href="{{url('notify-list')}}">
															<span
																class="avatar avatar-md fs-20 brround fw-semibold text-center bg-success-transparent"><i
																	class="fe fe-check text-success"></i></span>
															<div class="wd-80p ms-3 my-auto">
																<h5 class="text-muted fw-semibold mb-0">You swapped exactly
																	<span class="text-dark fw-bold">2.054 BTC</span> for
																	<Span class="text-dark fw-bold">14,124.00</Span>
																</h5>
																<span class="notification-subtext">1 day ago</span>
															</div>
														</a>
														<a class="dropdown-item border-bottom d-flex" href="{{url('notify-list')}}">
															<div>
																<span class="avatar avatar-md fs-20 brround fw-semibold text-center bg-warning-transparent"><i class="fe fe-dollar-sign text-warning"></i></span>
															</div>
															<div class="wd-80p ms-3 my-auto">
																<h5 class="text-dark mb-0 fw-semibold">Laurel <span
																		class="text-muted">donated</span> <span
																		class="text-success fw-semibold">$100</span> <span
																		class="text-muted">for</span> carbon removal</h5>
																<span class="notification-subtext">15 min ago</span>
															</div>
														</a>
														<a class="dropdown-item d-flex" href="{{url('notify-list')}}">
															<div>
																<span class="avatar avatar-md fs-20 brround fw-semibold text-center bg-info-transparent"><i class="fe fe-thumbs-up text-info"></i></span>
															</div>
															<div class="wd-80p ms-3 my-auto">
																<h5 class="text-dark mb-0 fw-semibold">Sunny Grahm <span
																		class="text-muted">voted for</span> carbon capture
																</h5>
																<span class="notification-subtext">2 hors ago</span>
															</div>
														</a>
													</div>
													<div class="text-center dropdown-footer">
														<a class="btn btn-primary btn-sm btn-block text-center" href="{{url('notify-list')}}">VIEW ALL NOTIFICATIONS</a>
													</div>
												</div>
											</div>
											<!-- NOTIFICATIONS -->
											<div class="dropdown d-flex message">
												<a class="nav-link icon text-center" data-bs-toggle="dropdown">
													<i class="ri-chat-1-line"></i><span class="pulse-danger"></span>
												</a>
												<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
													<div class="drop-heading border-bottom">
														<h6 class="mt-1 mb-0 fs-14 fw-semibold text-dark">You have 5
														Messages</h6>
													</div>
													<div class="message-menu message-menu-scroll">
														<a class="dropdown-item border-bottom d-flex align-items-center" href="{{url('chat')}}">
															<img class="avatar avatar-md brround cover-image"
																src="{{asset('build/assets/images/users/male/28.jpg')}}" alt="person-image">
															<div class="wd-90p ms-2">
																<div class="d-flex">
																	<h5 class="mb-0 text-dark fw-semibold ">Madeleine</h5>
																	<small class="text-muted ms-auto">
																		2 min ago
																	</small>
																</div>
																<span class="fw-semibold mb-0">Just completed <span class="text-info">Project</span></span>
															</div>
														</a>
														<a class="dropdown-item border-bottom d-flex align-items-center" href="{{url('chat')}}">
															<img
																class="avatar avatar-md brround me-3 align-self-center cover-image"
																src="{{asset('build/assets/images/users/male/32.jpg')}}" alt="person-image">
															<div class="wd-90p">
																<div class="d-flex">
																	<h5 class="mb-0 text-dark fw-semibold ">Anthony</h5>
																	<small class="text-muted ms-auto text-end">
																		1 hour ago
																	</small>
																</div>
																<span class="fw-semibold">Updates the new <span class="text-info">Task Names</span></span>
															</div>
														</a>
														<a class="dropdown-item border-bottom d-flex align-items-center" href="{{url('chat')}}">
															<img class="avatar avatar-md brround me-3 cover-image"
																src="{{asset('build/assets/images/users/female/21.jpg')}}" alt="person-image">
															<div class="wd-90p">
																<div class="d-flex">
																	<h5 class="mb-0 text-dark fw-semibold ">Olivia</h5>
																	<small class="text-muted ms-auto text-end">
																		1 hour ago
																	</small>
																</div>
																<span class="fw-semibold">Added a file into <span class="text-info">Project Name</span></span>
															</div>
														</a>
														<a class="dropdown-item d-flex align-items-center" href="{{url('chat')}}">
															<img class="avatar avatar-md brround me-3 cover-image"
																src="{{asset('build/assets/images/users/male/33.jpg')}}" alt="person-image">
															<div class="wd-90p">
																<div class="d-flex">
																	<h5 class="mb-0 text-dark fw-semibold ">Sanderson</h5>
																	<small class="text-muted ms-auto text-end">
																		1 days ago
																	</small>
																</div>
																<span class="fw-semibold">Assigned 9 Upcoming <span class="text-info">Projects</span></span>
															</div>
														</a>
														<a class="dropdown-item border-bottom d-flex align-items-center border-bottom-0" href="{{url('chat')}}">
															<img class="avatar avatar-md brround cover-image"
																src="{{asset('build/assets/images/users/male/8.jpg')}}" alt="person-image">
															<div class="wd-90p ms-2">
																<div class="d-flex">
																	<h5 class="mb-0 text-dark fw-semibold ">Madeleine</h5>
																	<small class="text-muted ms-auto">
																		2 min ago
																	</small>
																</div>
																<span class="fw-semibold mb-0">Just completed <span class="text-info">Project</span></span>
															</div>
														</a>
													</div>
													<div class="dropdown-divider m-0">

													</div>
													<div class="text-center dropdown-footer">
														<a class="btn btn-primary btn-sm btn-block text-center" href="{{url('chat')}}">MARK ALL AS READ</a>
													</div>
												</div>
											</div>
											<!-- MESSAGE-BOX -->
											<div class="dropdown d-flex header-settings">
												<a class="nav-link icon siderbar-link" data-bs-toggle="sidebar-right"
													data-bs-target=".sidebar-right">
													<i class="ri-menu-fold-fill"></i>
												</a>
											</div>
											<!-- SIDE-MENU -->
											<div class="dropdown d-flex profile-1">
												<a href="javascript:void(0)" data-bs-toggle="dropdown"
													class="nav-link leading-none d-flex">
													<img src="{{asset('build/assets/images/users/male/15.jpg')}}" alt="profile-user"
														class="avatar  profile-user brround cover-image">
												</a>
												<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"
													data-bs-popper="none">
													<div class="drop-heading">
														<div class="text-center">
															<h5 class="text-dark mb-0 fw-semibold">Alison</h5>
															<span class="text-muted fs-12">Administrator</span>
														</div>
													</div>
													<a class="dropdown-item text-dark fw-semibold border-top" href="{{url('profile')}}">
														<i class="dropdown-icon fe fe-user"></i> Profile
													</a>
													<a class="dropdown-item text-dark fw-semibold" href="{{url('email-inbox')}}">
														<i class="dropdown-icon fe fe-mail"></i> Inbox
														<span class="badge bg-success float-end">3</span>
													</a>
													<a class="dropdown-item text-dark fw-semibold" href="{{url('settings')}}">
														<i class="dropdown-icon fe fe-settings"></i> Settings
													</a>
													<a class="dropdown-item text-dark fw-semibold" href="{{url('faq')}}">
														<i class="dropdown-icon fe fe-alert-triangle"></i>
														Support ?
													</a>
													<a class="dropdown-item text-dark fw-semibold" href="{{url('login')}}">
														<i class="dropdown-icon fe fe-log-out"></i> Sign
														out
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="demo-icon nav-link icon">
									<i class="fe fe-settings fa-spin text_primary"></i>
								</div>
							</div>
						</div>
					</div>
				</div>