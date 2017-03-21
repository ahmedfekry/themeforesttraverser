<!doctype html>


<html lang="en" class="no-js">
<head>
    <title>Kappe</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen"> 
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/flexslider.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
    
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
                <div class="home">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <img alt="" src="upload/photo1.jpg" />
                            </li>
                            <li>
                                <img alt="" src="upload/photo2.jpg" />
                            </li>
                            <li>
                                <img alt="" src="upload/photo1.jpg" />
                            </li>
                            <li>
                                <img alt="" src="upload/photo2.jpg" />
                            </li>
                        </ul>
                    </div>
                    <div class="home-page">
                    @foreach($main_categories as $main_category)
                        <div class="project-gallery">
                            <h1><a href="#">{{ucwords(str_replace('-', ' ', $main_category->name))}}</a></h1>
                            <ul>
                                <?php 
                                    $items = $main_category->items()->orderBy('created_at','desc')->take(10)->get();
                                 ?>
                                 @foreach($items as $item)
                                    <li>
                                        <a title="{{$item->title}}" href="{{url('/category/'.$item->category->name.'/items/'.$item->slug)}}"><img alt="" src="{{$item->big_picture_link}}"></a>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        <hr>
                    @endforeach
                    </div>
                </div>
                
            </div>
        </div>
        <!-- End content -->

    </div>
    <!-- End Container -->

    <div class="preloader">
        <img alt="" src="images/preloader.gif">
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.migrate.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>


</body>
</html>