<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title></title>
    <title>Kappe</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="keywords" content="{{$item->meta_element}}">
    <meta name="description" content="{{$item->meta_description}}">

    <link href='{{url('http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic')}}' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" type="text/css" href="{{url("css/bootstrap.css", $args = [])}}" media="screen">   
    <link rel="stylesheet" type="text/css" href="{{url("css/magnific-popup.css", $args = [])}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url("css/font-awesome.min.css", $args = [])}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url("css/flexslider.css", $args = [])}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url("css/style.css", $args = [])}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url("css/responsive.css", $args = [])}}" media="screen">

</head>
<body>
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
											<img alt="" src="{{$item->big_picture_link}}" />
										</li>
									</ul>
								</div>

								<div class="project-text">
									<h1>{{$item->title}}</h1>
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
		<img alt="" src="{{url('images/preloader.gif')}}">
	</div>
    <script src="{{url("js/jquery.min.js")}}"></script>
    <script src="{{url("js/jquery.migrate.js")}}"></script>
    <script src="{{url("js/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{url("js/bootstrap.js")}}"></script>
    <script src="{{url("js/jquery.imagesloaded.min.js")}}"></script>
    <script src="{{url("js/jquery.isotope.min.js")}}"></script>
    <script src="{{url("js/retina-1.1.0.min.js")}}"></script>
    <script src="{{url("js/jquery.nicescroll.min.js")}}"></script>
    <script src="{{url("js/script.js")}}"></script>

    <script>
        $('.project-text a,.meta-attributes__table a').attr({
            href: '#'
        });
    </script>
</body>
</html>
