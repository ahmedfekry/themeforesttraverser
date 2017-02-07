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
									{{-- <h1>Amazing Car Wallpaper</h1>
									<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.</p>
									<p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. </p> --}}
								{{-- echo html_entity_decode(htmlspecialchars_decode($htmlcode)); --}}
								{{-- <div class="custom-content"> --}}
									<?php echo html_entity_decode(htmlspecialchars_decode($item->description)); ?>			
									
								{{-- </div> --}}
								</div>

								<div class="similar-projects">
									<h1>Similar Projects</h1>
									<div class="portfolio-box">
										<div class="project-post">
											<img alt="" src="{{url('upload/image1.jpg')}}">
											<div class="hover-box">
												<div class="project-title">
													<h2>Cool App Design</h2>
													<span>development, mobile</span>
													<div><a href="#"><i class="fa fa-arrow-right"></i></a></div>
												</div>
											</div>
										</div>

										<div class="project-post">
											<img alt="" src="{{url('upload/image2.jpg')}}">
											<div class="hover-box">
												<div class="project-title">
													<h2>Cool App Design</h2>
													<span>development, mobile</span>
													<div><a href="#"><i class="fa fa-arrow-right"></i></a></div>
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
										<span><i class="fa fa-user"></i></span><a href="#">Premium Layers</a>
									</li>
									<li>
										<span><i class="fa fa-heart"></i></span><a href="#">138 Likes</a>
									</li>
									<li>
										<span><i class="fa fa-calendar"></i></span><a href="#">14 Jannuary, 2014</a>
									</li>
									<li>
										<span><i class="fa fa-link"></i></span><a href="#">http:www.themeforest.net</a>
									</li>
								</ul>
							</div>
							<div class="project-gallery">
								<h1>Project Gallery</h1>
								<ul>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb1.jpg')}}"></a>
									</li>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb2.jpg')}}"></a>
									</li>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb3.jpg')}}"></a>
									</li>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb4.jpg')}}"></a>
									</li>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb5.jpg')}}"></a>
									</li>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb6.jpg')}}"></a>
									</li>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb7.jpg')}}"></a>
									</li>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb8.jpg')}}"></a>
									</li>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb9.jpg')}}"></a>
									</li>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb10.jpg')}}"></a>
									</li>
									<li>
										<a href="#"><img alt="" src="{{url('upload/thumb11.jpg')}}"></a>
									</li>
								</ul>
							</div>
							<div class="project-feature">
								<h1>Project Feature</h1>
								<ul>
									<li>
										Responsive Layout
									</li>
									<li>
										Font Awesome Icons
									</li>
									<li>
										Clean &#38; Commented Code
									</li>
									<li>
										Pixel perfect Design
									</li>
									<li>
										Highly Customizable
									</li>
								</ul>
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

