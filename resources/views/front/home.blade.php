@extends('welcome')

@section('content')
    <!--==========================slider============================-->
    <div id="imageSlider" style="width: 82%; margin: 0 auto;">
        <script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            jssor_1_slider_init = function() {

                var jssor_1_SlideshowTransitions = [
                    {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
                ];

                var jssor_1_options = {
                    $AutoPlay: 1,
                    $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_1_SlideshowTransitions,
                        $TransitionsOrder: 1
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $ThumbnailNavigatorOptions: {
                        $Class: $JssorThumbnailNavigator$,
                        $Orientation: 2,
                        $NoDrag: true
                    }
                };

                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                /*#region responsive code begin*/

                var MAX_WIDTH;

                function ScaleSlider() {
                    var containerElement = jssor_1_slider.$Elmt.parentNode;
                    var containerWidth = containerElement.clientWidth;

                    if (containerWidth) {

                        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                        jssor_1_slider.$ScaleWidth(expectedWidth);
                    }
                    else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }

                ScaleSlider();

                $Jssor$.$AddEvent(window, "load", ScaleSlider);
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                /*#endregion responsive code end*/
            };
        </script>
        <style>
            /*jssor slider loading skin spin css*/
            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 1.6s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }

            .jssora061 {display:block;position:absolute;cursor:pointer;}
            .jssora061 .a {fill:none;stroke:#fff;stroke-width:360;stroke-linecap:round;}
            .jssora061:hover {opacity:.8;}
            .jssora061.jssora061dn {opacity:.5;}
            .jssora061.jssora061ds {opacity:.3;pointer-events:none;}
        </style>
        <div id="jssor_1" style="position:relative;top:0px;left:0px;width:auto;height:380px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="imageSlider/spin.svg" />
            </div>
            <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1500px;height:700px;overflow:hidden;">
                <div data-p="170.00">
                    <img data-u="image" src="imageSlider/045.jpg" />
                    <div u="thumb">Slide Description 001</div>
                </div>
                <div data-p="170.00">
                    <img data-u="image" src="imageSlider/043.jpg" />
                    <div u="thumb">Slide Description 002</div>
                </div>
                <div data-p="170.00">
                    <img data-u="image" src="imageSlider/046.jpg" />
                    <div u="thumb">Slide Description 003</div>
                </div>
                <div data-p="170.00">
                    <img data-u="image" src="imageSlider/047.jpg" />
                    <div u="thumb">Slide Description 004</div>
                </div>
                <div data-p="170.00">
                    <img data-u="image" src="imageSlider/048.jpg" />
                    <div u="thumb">Slide Description 005</div>
                </div>
                <div data-p="170.00">
                    <img data-u="image" src="imageSlider/044.jpg" />
                    <div u="thumb">Slide Description 006</div>
                </div>
                <div data-p="170.00">
                    <img data-u="image" src="imageSlider/050.jpg" />
                    <div u="thumb">Slide Description 007</div>
                </div>
                <div data-p="170.00">
                    <img data-u="image" src="imageSlider/049.jpg" />
                    <div u="thumb">Slide Description 008</div>
                </div>
                <div data-p="170.00">
                    <img data-u="image" src="imageSlider/052.jpg" />
                    <div u="thumb">Slide Description 009</div>
                </div>
                <div data-p="170.00">
                    <img data-u="image" src="imageSlider/051.jpg" />
                    <div u="thumb">Slide Description 010</div>
                </div>
            </div>
            <!-- Thumbnail Navigator -->
            <div u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:1500px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
                <div u="slides">
                    <div u="prototype" style="position:absolute;top:0;left:0;width:1500px;height:50px;">
                        <div u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:arial,helvetica,verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                    </div>
                </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
                </svg>
            </div>
        </div>
        <script type="text/javascript">jssor_1_slider_init();</script>
    </div>
    <!--========================== New product ============================-->
    <section id="testimonials" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2 class="{{Lang::locale()=='kh'? 'kh-os' : ''}}">{{trans('label.new_product')}}</h2>
            </div>
            <div class="owl-carousel testimonials-carousel">
                @if(count($pro))
                    @foreach($pro as $p)
                        <a href="{{url('/product-detail/'.$p->id)}}">
                        <div class="testimonial-item">
                            <img src="{{asset('mainProduct/'.$p->photo)}}" class="new-product" alt="">
                            <h3 class="{{Lang::locale()=='kh'? 'kh-os' : ''}}">{{$p->pivot->name}}</h3>
                            <small class="margin-top {{Lang::locale()=='kh'? 'kh-os-no-bold orange' : 'orange'}}" >{{trans('label.brand')}} : {{$p->brand->name}}</small>
                            <p class="margin-top">
                                {{str_limit($p->pivot->summary,50)}}
                            </p>
                        </div>
                        </a>
                    @endforeach
                @else
                    <h2>{{trans('label.no_record')}}</h2>
                @endif
            </div>

        </div>
    </section>

    <!--==========================
      Services Section
    ============================-->
    {{--<section id="services">--}}
        {{--<div class="container">--}}
            {{--<div class="section-header">--}}
                {{--<h2>Services</h2>--}}
                {{--<p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>--}}
            {{--</div>--}}

            {{--<div class="row">--}}

                {{--<div class="col-lg-6">--}}
                    {{--<div class="box wow fadeInLeft">--}}
                        {{--<div class="icon"><i class="fa fa-bar-chart"></i></div>--}}
                        {{--<h4 class="title"><a href="">Lorem Ipsum</a></h4>--}}
                        {{--<p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-6">--}}
                    {{--<div class="box wow fadeInRight">--}}
                        {{--<div class="icon"><i class="fa fa-picture-o"></i></div>--}}
                        {{--<h4 class="title"><a href="">Dolor Sitema</a></h4>--}}
                        {{--<p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-6">--}}
                    {{--<div class="box wow fadeInLeft" data-wow-delay="0.2s">--}}
                        {{--<div class="icon"><i class="fa fa-shopping-bag"></i></div>--}}
                        {{--<h4 class="title"><a href="">Sed ut perspiciatis</a></h4>--}}
                        {{--<p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-6">--}}
                    {{--<div class="box wow fadeInRight" data-wow-delay="0.2s">--}}
                        {{--<div class="icon"><i class="fa fa-map"></i></div>--}}
                        {{--<h4 class="title"><a href="">Magni Dolores</a></h4>--}}
                        {{--<p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}
    {{--</section><!-- #services -->--}}

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2 class="{{Lang::locale()=='kh'? 'kh-os' : ''}}">{{trans('label.client')}}</h2>
            </div>
            <div class="owl-carousel clients-carousel">
                @foreach($client as $c)
                    <?php $logo = $c->pivot->logo;?>
                    <img src='{{asset("clientlogo/$logo")}}' alt="y">
                @endforeach
            </div>

        </div>
    </section><!-- #clients -->

    <!--==========================
      Our Portfolio Section
    ============================-->
    {{--<section id="portfolio" class="wow fadeInUp">--}}
        {{--<div class="container">--}}
            {{--<div class="section-header">--}}
                {{--<h2>Our Portfolio</h2>--}}
                {{--<p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="container-fluid">--}}
            {{--<div class="row no-gutters">--}}

                {{--<div class="col-lg-3 col-md-4">--}}
                    {{--<div class="portfolio-item wow fadeInUp">--}}
                        {{--<a href="img/portfolio/1.jpg" class="portfolio-popup">--}}
                            {{--<img src="img/portfolio/1.jpg" alt="">--}}
                            {{--<div class="portfolio-overlay">--}}
                                {{--<div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 1</h2></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-4">--}}
                    {{--<div class="portfolio-item wow fadeInUp">--}}
                        {{--<a href="img/portfolio/2.jpg" class="portfolio-popup">--}}
                            {{--<img src="img/portfolio/2.jpg" alt="">--}}
                            {{--<div class="portfolio-overlay">--}}
                                {{--<div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 2</h2></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-4">--}}
                    {{--<div class="portfolio-item wow fadeInUp">--}}
                        {{--<a href="img/portfolio/3.jpg" class="portfolio-popup">--}}
                            {{--<img src="img/portfolio/3.jpg" alt="">--}}
                            {{--<div class="portfolio-overlay">--}}
                                {{--<div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 3</h2></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-4">--}}
                    {{--<div class="portfolio-item wow fadeInUp">--}}
                        {{--<a href="img/portfolio/4.jpg" class="portfolio-popup">--}}
                            {{--<img src="img/portfolio/4.jpg" alt="">--}}
                            {{--<div class="portfolio-overlay">--}}
                                {{--<div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 4</h2></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-4">--}}
                    {{--<div class="portfolio-item wow fadeInUp">--}}
                        {{--<a href="img/portfolio/5.jpg" class="portfolio-popup">--}}
                            {{--<img src="img/portfolio/5.jpg" alt="">--}}
                            {{--<div class="portfolio-overlay">--}}
                                {{--<div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 5</h2></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-4">--}}
                    {{--<div class="portfolio-item wow fadeInUp">--}}
                        {{--<a href="img/portfolio/6.jpg" class="portfolio-popup">--}}
                            {{--<img src="img/portfolio/6.jpg" alt="">--}}
                            {{--<div class="portfolio-overlay">--}}
                                {{--<div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 6</h2></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-4">--}}
                    {{--<div class="portfolio-item wow fadeInUp">--}}
                        {{--<a href="img/portfolio/7.jpg" class="portfolio-popup">--}}
                            {{--<img src="img/portfolio/7.jpg" alt="">--}}
                            {{--<div class="portfolio-overlay">--}}
                                {{--<div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 7</h2></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-4">--}}
                    {{--<div class="portfolio-item wow fadeInUp">--}}
                        {{--<a href="img/portfolio/8.jpg" class="portfolio-popup">--}}
                            {{--<img src="img/portfolio/8.jpg" alt="">--}}
                            {{--<div class="portfolio-overlay">--}}
                                {{--<div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 8</h2></div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}
    {{--</section><!-- #portfolio -->--}}

    <!--==========================
      Testimonials Section
    ============================-->
    {{--<section id="testimonials" class="wow fadeInUp">--}}
        {{--<div class="container">--}}
            {{--<div class="section-header">--}}
                {{--<h2>Testimonials</h2>--}}
                {{--<p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>--}}
            {{--</div>--}}
            {{--<div class="owl-carousel testimonials-carousel">--}}

                {{--<div class="testimonial-item">--}}
                    {{--<p>--}}
                        {{--<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">--}}
                        {{--Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.--}}
                        {{--<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">--}}
                    {{--</p>--}}
                    {{--<img src="img/testimonial-1.jpg" class="testimonial-img" alt="">--}}
                    {{--<h3>Saul Goodman</h3>--}}
                    {{--<h4>Ceo &amp; Founder</h4>--}}
                {{--</div>--}}

                {{--<div class="testimonial-item">--}}
                    {{--<p>--}}
                        {{--<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">--}}
                        {{--Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.--}}
                        {{--<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">--}}
                    {{--</p>--}}
                    {{--<img src="img/testimonial-2.jpg" class="testimonial-img" alt="">--}}
                    {{--<h3>Sara Wilsson</h3>--}}
                    {{--<h4>Designer</h4>--}}
                {{--</div>--}}

                {{--<div class="testimonial-item">--}}
                    {{--<p>--}}
                        {{--<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">--}}
                        {{--Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.--}}
                        {{--<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">--}}
                    {{--</p>--}}
                    {{--<img src="img/testimonial-3.jpg" class="testimonial-img" alt="">--}}
                    {{--<h3>Jena Karlis</h3>--}}
                    {{--<h4>Store Owner</h4>--}}
                {{--</div>--}}

                {{--<div class="testimonial-item">--}}
                    {{--<p>--}}
                        {{--<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">--}}
                        {{--Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.--}}
                        {{--<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">--}}
                    {{--</p>--}}
                    {{--<img src="img/testimonial-4.jpg" class="testimonial-img" alt="">--}}
                    {{--<h3>Matt Brandon</h3>--}}
                    {{--<h4>Freelancer</h4>--}}
                {{--</div>--}}

                {{--<div class="testimonial-item">--}}
                    {{--<p>--}}
                        {{--<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">--}}
                        {{--Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.--}}
                        {{--<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">--}}
                    {{--</p>--}}
                    {{--<img src="img/testimonial-5.jpg" class="testimonial-img" alt="">--}}
                    {{--<h3>John Larson</h3>--}}
                    {{--<h4>Entrepreneur</h4>--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}
    {{--</section><!-- #testimonials -->--}}

    <!--==========================
      Call To Action Section
    ============================-->
    {{--<section id="call-to-action" class="wow fadeInUp">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-9 text-center text-lg-left">--}}
                    {{--<h3 class="cta-title">Call To Action</h3>--}}
                    {{--<p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
                {{--</div>--}}
                {{--<div class="col-lg-3 cta-btn-container text-center">--}}
                    {{--<a class="cta-btn align-middle" href="#">Call To Action</a>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</section><!-- #call-to-action -->--}}

    <!--==========================
      Our Team Section
    ============================-->
    {{--<section id="team" class="wow fadeInUp">--}}
        {{--<div class="container">--}}
            {{--<div class="section-header">--}}
                {{--<h2>Our Team</h2>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="member">--}}
                        {{--<div class="pic"><img src="img/team-1.jpg" alt=""></div>--}}
                        {{--<div class="details">--}}
                            {{--<h4>Walter White</h4>--}}
                            {{--<span>Chief Executive Officer</span>--}}
                            {{--<div class="social">--}}
                                {{--<a href=""><i class="fa fa-twitter"></i></a>--}}
                                {{--<a href=""><i class="fa fa-facebook"></i></a>--}}
                                {{--<a href=""><i class="fa fa-google-plus"></i></a>--}}
                                {{--<a href=""><i class="fa fa-linkedin"></i></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="member">--}}
                        {{--<div class="pic"><img src="img/team-2.jpg" alt=""></div>--}}
                        {{--<div class="details">--}}
                            {{--<h4>Sarah Jhinson</h4>--}}
                            {{--<span>Product Manager</span>--}}
                            {{--<div class="social">--}}
                                {{--<a href=""><i class="fa fa-twitter"></i></a>--}}
                                {{--<a href=""><i class="fa fa-facebook"></i></a>--}}
                                {{--<a href=""><i class="fa fa-google-plus"></i></a>--}}
                                {{--<a href=""><i class="fa fa-linkedin"></i></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="member">--}}
                        {{--<div class="pic"><img src="img/team-3.jpg" alt=""></div>--}}
                        {{--<div class="details">--}}
                            {{--<h4>William Anderson</h4>--}}
                            {{--<span>CTO</span>--}}
                            {{--<div class="social">--}}
                                {{--<a href=""><i class="fa fa-twitter"></i></a>--}}
                                {{--<a href=""><i class="fa fa-facebook"></i></a>--}}
                                {{--<a href=""><i class="fa fa-google-plus"></i></a>--}}
                                {{--<a href=""><i class="fa fa-linkedin"></i></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-lg-3 col-md-6">--}}
                    {{--<div class="member">--}}
                        {{--<div class="pic"><img src="img/team-4.jpg" alt=""></div>--}}
                        {{--<div class="details">--}}
                            {{--<h4>Amanda Jepson</h4>--}}
                            {{--<span>Accountant</span>--}}
                            {{--<div class="social">--}}
                                {{--<a href=""><i class="fa fa-twitter"></i></a>--}}
                                {{--<a href=""><i class="fa fa-facebook"></i></a>--}}
                                {{--<a href=""><i class="fa fa-google-plus"></i></a>--}}
                                {{--<a href=""><i class="fa fa-linkedin"></i></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</section><!-- #team -->--}}

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Contact Us</h2>
            </div>

            <div class="row contact-info">

                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="ion-ios-location-outline"></i>
                        <h3>Address</h3>
                        <address>A108 Adam Street, NY 535022, USA</address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>Phone Number</h3>
                        <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="ion-ios-email-outline"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                </div>

            </div>
        </div>
        {{--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>--}}
    </section><!-- #contact -->
@endsection