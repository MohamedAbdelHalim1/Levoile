@extends('layouts.app')

@section('styles')

@endsection

@section('content')

							<!-- PAGE-HEADER -->
							<div class="page-header d-sm-flex d-block">
								<ol class="breadcrumb mb-sm-0 mb-3">
									<!-- breadcrumb -->
									<li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
									<li class="breadcrumb-item active" aria-current="page">Content Scroll Bar</li>
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
								<div class="col-md-12">
									<div class="card overflow-hidden">
										<div class="card-header">
											<h3 class="card-title">Default-scroll</h3>
										</div>
										<div class="card-body">
											<!-- content -->
											<div class="content vscroll h-200">
												<p>It seems that only fragments of the original text remain in the Lorem
													Ipsum
													texts used today. One may speculate that over the course of time certain
													lettersm</p>
												<p>The spread of computers and layout programmes thus made dummy text better
													known. While in earlier times several lines of the Lorem Ipsum text were
													repeated in the creation of dummy texts, today the full text of Cicero's
													'De
													finibus' serves as the basis for many dummy </p>
												<p>omnis iste natus error sit voluptatem accusantium doloremque laudantium,
													totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
													architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
													quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
													magni
													dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
													est,
													qui dolorem ipsum quia dolor sit amet, consectetur,</p>
												<p>adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
													et
													dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis
													nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
													aliquid
													ex ea commodi consequatur</p>
												<p>explain to you need to be sure there isn't anything embarrassing hidden
													in
													the middle of text. All the Lorem Ipsum generators on the Internet tend
													to
													repeat predefined chunks as necessary, making this the first true
													generator
													on the Internet. It uses a dictionary oyou how all this mistaken idea of
													denouncing pleasure and praising pain was born and I will give you a
													complete account of the system, and expound the actual teachings of the
													great explorer of the truth, the master-builder of human happiness. No
													one
													rejects, dislikes, or avoids pleasure itself, because it is pleasure</p>
												<p>There are many variations of passages of Lorem Ipsum available, but the
													majority have suffered alteration in some form, by injected humour, or
													randomised words which don't look even slightly believable. If you are
													going
													to use a passage of Lorem Ipsum</p>
												<p> you need to be sure there isn't anything embarrassing hidden in the
													middle
													of text. All the Lorem Ipsum generators on the Internet tend to repeat
													predefined chunks as necessary, making this the first true generator on
													the
													Internet. It uses a dictionary of over 200 Latin words, combined with a
													handful of model sentence structures, to generate Lorem Ipsum which
													looks
													reasonable. The generated Lorem Ipsum is therefore always free from
													repetition, injected humour, or non-characteristic words etc</p>
												<p>omnis iste natus error sit voluptatem accusantium doloremque laudantium,
													totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
													architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
													quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
													magni
													dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
													est,
													qui dolorem ipsum quia dolor sit amet, consectetur,</p>
												<p>adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
													et
													dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis
													nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
													aliquid
													ex ea commodi consequatur</p>
												<p>explain to you how all this mistaken idea of denouncing pleasure and
													praising
													pain was born and I will give you a complete account of the system, and
													expound the actual teachings of the great explorer of the truth, the
													master-builder of human happiness. No one rejects, dislikes, or avoids
													pleasure itself, because it is pleasure</p>

											</div>
										</div>
									</div>
									<div class="card overflow-hidden">
										<div class="card-header">
											<h3 class="card-title">Minimal-scroll</h3>
										</div>
										<div class="card-body">
											<!-- content -->
											<div class="content scroll-1 h-200">
												<p>Certain internet providers exploit the fact that fill text cannot be
													recognized by automatic search engines - meaningful information cannot
													be
													distinguished from meaningless: Target-generated dummy text mixed with a
													certain combination of search terms can lead to an increased frequency
													of
													visits by search machine users.</p>
												<p>There are many variations of passages of Lorem Ipsum available, but the
													majority have suffered alteration in some form, by injected humour, or
													randomised words which don't look even slightly believable. If you are
													going
													to use a passage of Lorem Ipsum</p>
												<p> you need to be sure there isn't anything embarrassing hidden in the
													middle
													of text. All the Lorem Ipsum generators on the Internet tend to repeat
													predefined chunks as necessary, making this the first true generator on
													the
													Internet. It uses a dictionary of over 200 Latin words, combined with a
													handful of model sentence structures, to generate Lorem Ipsum which
													looks
													reasonable. The generated Lorem Ipsum is therefore always free from
													repetition, injected humour, or non-characteristic words etc</p>
												<p>omnis iste natus error sit voluptatem accusantium doloremque laudantium,
													totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
													architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
													quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
													magni
													dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
													est,
													qui dolorem ipsum quia dolor sit amet, consectetur,</p>
												<p>adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore
													et
													dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis
													nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
													aliquid
													ex ea commodi consequatur</p>
												<p>explain to you how all this mistaken idea of denouncing pleasure and
													praising
													pain was born and I will give you a complete account of the system, and
													expound the actual teachings of the great explorer of the truth, the
													master-builder of human happiness. No one rejects, dislikes, or avoids
													pleasure itself, because it is pleasure</p>
											</div>
										</div>
									</div>

									<div class="card overflow-hidden">
										<div class="card-header">
											<h3 class="card-title">Image Horizontal scroll Bar</h3>
										</div>
										<div class="card-body">
											<div class="imagescroll">
												<ul>
													<li><img src="{{asset('build/assets/images/photos/3.jpg')}}" class="item br-7"
															alt="image"></li>
													<li><img src="{{asset('build/assets/images/photos/5.jpg')}}" class="item br-7"
															alt="image"></li>
													<li><img src="{{asset('build/assets/images/photos/13.jpg')}}" class="item br-7"
															alt="image"></li>
													<li><img src="{{asset('build/assets/images/photos/17.jpg')}}" class="item br-7"
															alt="image"></li>
													<li><img src="{{asset('build/assets/images/photos/3.jpg')}}" class="item br-7"
															alt="image"></li>
													<li><img src="{{asset('build/assets/images/photos/5.jpg')}}" class="item br-7"
															alt="image"></li>
													<li><img src="{{asset('build/assets/images/photos/13.jpg')}}" class="item br-7"
															alt="image"></li>
													<!-- etc. -->
												</ul>
											</div>
										</div>
									</div>
								</div><!-- col end -->
							</div>
							<!-- END ROW -->

@endsection

@section('scripts')

        <!-- PERFECT-SCROLLBAR JS  -->
        <script src="{{asset('build/assets/plugins/pscrollbar/p-scroll-3.js')}}"></script>

@endsection