<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title></title>
    <title>Kappe</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
                <a class="logo" href="index.html"><img alt="" src="images/logo.png"></a>
            </div>
            
            <a class="elemadded responsive-link" href="#">Menu</a>

            <div class="menu-box">
                <ul class="menu">
                    <li><a class="active" href="index.html"><span>Home</span></a></li>
                    <li><a href="about.html"><span>About</span></a></li>
                    <li><a href="blog.html"><span>blog</span></a></li>
                    <li><a href="single-post.html"><span>Single Post</span></a></li>
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
                    <li><a href="contact.html"><span>Contact</span></a></li>
                </ul>               
            </div>

            <div class="filter-box">
                <h3>Filter<i class="fa fa-th-large"></i></h3>
                <ul class="filter">
                    <li><a href="#" class="active" data-filter="*">All Works</a></li>
                    <li><a href="#" data-filter=".web-design">Web Design</a></li>
                    <li><a href="#" data-filter=".photography">Photography</a></li>
                    <li><a href="#" data-filter=".illustration">Illustration</a></li>
                    <li><a href="#" data-filter=".nature">Nature</a></li>
                    <li><a href="#" data-filter=".logo">Logo</a></li>
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
            <ol class="breadcrumb" style="margin: 0px;">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$items[0]->category->name}}</li>
            </ol>
            <div class="inner-content">
                <div class="portfolio-page">
                    <div class="portfolio-box">
                        @foreach($items as $item)
                            <div class="project-post ">
                                <img alt="" src="{{$item->big_picture_link}}">
                                {{-- <img alt="" src="upload/image1.jpg"> --}}
                                <div class="hover-box">
                                    <div class="project-title">
                                        <h4>{{ $item->title }}</h4>
                                        {{-- <h2>{{ substr($item->title,0,35) }}</h2> --}}
                                        <span>{{$item->category->name}}</span>
                                        <div><a href="{{url('/items/'.$item->slug)}}"><i class="fa fa-arrow-right"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="col-md-10 col-md-offset-4">
                        {{$items->links()}}
                    </div>  --}}
                </div>
            </div>
        </div>
        <!-- End content -->

    </div>
    <!-- End Container -->

    <div class="info-box">
        <a class="info-toggle" href="#"><i class="fa fa-info-circle"></i></a>
        <div class="info-content">
            <ul>
                <li><i class="fa fa-phone"></i>9930 1234 5679</li>
                <li><i class="fa fa-envelope"></i><a href="#">contact@domain.com</a></li>
                <li><i class="fa fa-home"></i>street address example</li>
            </ul>
        </div>
    </div>

    <div class="preloader">
        <img alt="" src="images/preloader.gif">
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.migrate.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

</body>
</html>