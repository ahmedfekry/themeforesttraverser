@extends('layouts.app')
@section('mainContent')
		<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header>
			<div class="logo-box">
				<a class="logo" href="{{url('/')}}"><img alt="" src="{{url('images/logo.png')}}"></a>
			</div>
			
			<a class="elemadded responsive-link" href="#">Menu</a>

			<div class="menu-box">
				<ul class="menu">
					<li><a class="active" href="{{url('/')}}"><span>Home</span></a></li>
					<li><a href="#"><span>About</span></a></li>
					<li><a href="#"><span>blog</span></a></li>
					<li><a href="#"><span>Single Post</span></a></li>
					<li class="drop"><a href="#"><span>Go To Level 2</span></a>
						<ul class="drop-down">
							<li><a href="#"><span>Level 2</span></a></li>
							<li class="drop"><a href="#"><span>Go To Level 3</span></a>
								<ul class="drop-down">
									<li><a href="#"><span>Level 3</span></a></li>
									<li><a href="#"><span>Level 3</span></a></li>
								</ul>
							</li>
							<li><a href="#"><span>Level 2</span></a></li>
						</ul>
					</li>
					<li><a href="#"><span>Contact</span></a></li>
				</ul>				
			</div>

			<div class="social-box">
				<ul class="social-icons">
					<li><a href="#" class="facebook" ><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" class="twitter" ><i class="fa fa-twitter"></i></a></li>
					<li><a href="#" class="google" ><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#" class="linkedin" ><i class="fa fa-linkedin"></i></a></li>
					<li><a href="#" class="pinterest" ><i class="fa fa-pinterest"></i></a></li>
					<li><a href="#" class="youtube" ><i class="fa fa-youtube"></i></a></li>
					<li><a href="#" class="github" ><i class="fa fa-github"></i></a></li>
				</ul>
				<p class="copyright">&#169; 2014 Kappe, All Rights Reserved</p>
			</div>
		</header>
		<!-- End Header -->

		<!-- content 
			================================================== -->
		<div id="content">
			<div class="inner-content">
				<div class="single-project">

					<div class="single-box">
						<div class="single-box-content">
							<div class="project-post-content">

								<div class="flexslider">
									<ul class="slides">
										<li>
											<img alt="" src="{{url($item->big_picture_link)}}" />
										</li>
										{{-- <li>
											<img alt="" src="{{url('upload/photo2.jpg')}}" />
										</li>
										<li>
											<img alt="" src="{{url('upload/photo1.jpg')}}" />
										</li>
										<li>
											<img alt="" src="{{url('upload/photo2.jpg')}}" />
										</li> --}}
									</ul>
								</div>

								<div class="project-text">
									<?php echo html_entity_decode(htmlspecialchars_decode($item->description)); ?>			
								</div>

								<div class="similar-projects">
									<h1>Similar Projects</h1>
									<div class="portfolio-box">
										<div class="project-post">
											<img alt="" src="{{url($rand[0]->big_picture_link)}}">
											<div class="hover-box">
												<div class="project-title">
													<h2>{{$rand[0]->title}}</h2>
													<div><a href="{{$rand[0]->link}}"><i class="fa fa-arrow-right"></i></a></div>
												</div>
											</div>
										</div>

										<div class="project-post">
											<img alt="" src="{{url($rand[1]->big_picture_link)}}">
											<div class="hover-box">
												<div class="project-title">
													<h2>{{$rand[0]->title}}</h2>
													<div><a href="{{$rand[0]->link}}"><i class="fa fa-arrow-right"></i></a></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>						
						</div>
						<div class="sidebar">
							<div class="post-info">
								<h1>Project Info</h1>
								<ul>
									<li>
										<span><i class="fa fa-user"></i></span><a href="#">{{$item->category->name}}</a>
									</li>
									<li>
										<span><i class="fa fa-money"></i></span><a href="#">{{$item->price}} $</a>
									</li>
									<li>
										<span><i class="fa fa-link"></i></span><a target="_blank" href="{{$item->link}}">themeforest</a>
									</li>
								</ul>
							</div>
							<div class="box">
								<?php echo html_entity_decode(htmlspecialchars_decode($item->meta_data)); ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End content -->

	</div>
	<!-- End Container -->

	<div class="preloader">
		<img alt="" src="{{url('images/preloader.gif')}}{{url('">
	</div>

@endsection

