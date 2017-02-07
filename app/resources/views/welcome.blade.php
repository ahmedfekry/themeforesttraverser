@extends('layouts.app')
@section('mainContent')
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
            <div class="inner-content">
                <div class="portfolio-page">
                    <div class="portfolio-box">
                    @foreach($items as $item)
                        <div class="project-post">
                            <img alt="" src="{{url($item->big_picture_link)}}">
                            <div class="hover-box">
                                <div class="project-title">
                                    <h2>{{ $item->title }}</h2>
                                    <span>development, mobile</span>
                                    <div><a href="{{url('/items/'.$item->id)}}"><i class="fa fa-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                    <div class="col-md-10 col-md-offset-4">
                        {{$items->links()}}
                    </div> 
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
@endsection