<?php
/**
 * Created by PhpStorm.
 * User: nerd
 * Date: 9/17/2018
 * Time: 1:11 PM
 */
?>

<script type="text/javascript">
    jssor_1_slider_init = function() {

        var jssor_1_SlideshowTransitions = [
            {$Duration:500,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$Jease$.$OutQuad},
            {$Duration:500,$Delay:80,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Easing:$Jease$.$OutQuad},
            {$Duration:1000,x:-0.2,$Delay:40,$Cols:12,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
            {$Duration:2000,y:-1,$Delay:60,$Cols:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$Jease$.$OutJump,$Round:{$Top:1.5}},
            {$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InWave,$Top:$Jease$.$InWave,$Clip:$Jease$.$OutQuad},$Round:{$Left:1.3,$Top:2.5}}
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
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 1133;

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
    /* jssor slider loading skin spin css */
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }


    .jssorb053 .i {position:absolute;cursor:pointer;}
    .jssorb053 .i .b {fill:#fff;fill-opacity:0.5;}
    .jssorb053 .i:hover .b {fill-opacity:.7;}
    .jssorb053 .iav .b {fill-opacity: 1;}
    .jssorb053 .i.idn {opacity:.3;}

    .jssora093 {display:block;position:absolute;cursor:pointer;}
    .jssora093 .c {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
    .jssora093 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;}
    .jssora093:hover {opacity:.8;}
    .jssora093.jssora093dn {opacity:.6;}
    .jssora093.jssora093ds {opacity:.3;pointer-events:none;}
</style>
<link rel="stylesheet" href="/assets/css/style.css" type="text/css" />
<link rel="stylesheet" href="/assets/css/home-slider.css" type="text/css" />


<div class="nav">
    <header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">




        <a href="index.php" id="branding">
            <img src="dummy/logo.png" alt="School logo">
            <small class="site-description">Sunshine boys high school</small>
        </a> <!-- #branding -->

        <nav class="main-navigation">
            <button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
            <ul class="menu">
                <li class="menu-item"><a href="index.php">Home</a></li>
                <li class="menu-item"><a href="about.php">About</a></li>
                <li class="menu-item"><a href="#">Admission & Fees</a></li>
                <li class="menu-item"><a href="gallery.php">Gallery</a></li>
                <li class="menu-item"><a href="contact.php">Contact us</a></li>
                <li class="menu-item"><a href="tender.php">Tenders</a></li>

            </ul> <!-- .menu -->
        </nav> <!-- .main-navigation -->
        <div class="mobile-menu"></div>
</div>
<!-- /main nav -->


</header>


<div id="jssor_1" style="position:relative;margin:0 auto;top:70px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/svg/q.svg" />
    </div>
    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
        <div>
            <img data-u="image" src="img/sunshine.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/b.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/c.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/d.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/e.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/f.jpg" />
        </div>
        <div>
            <img data-u="image" src="img/g.jpg"/>
        </div>


    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
        <div data-u="prototype" class="i" style="width:16px;height:16px;">
            <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
            </svg>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
            <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <circle class="c" cx="8000" cy="8000" r="5920"></circle>
            <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
            <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
        </svg>
    </div>
</div>
<script type="text/javascript">jssor_1_slider_init();</script>
<div class="fullwidth-block testimonial-section">

    <div class="quote-slider">
        <ul class="slides">
            <li>
                <blockquote>
                    <p>"Testimonial 1Testimonial 1"</p>
                    <cite>Mr. Parent</cite>
                    <span>PTA</span>
                </blockquote>
            </li>
            <li>
                <blockquote>
                    <p>"Testimonial 2"</p>
                    <cite>Mrs. Parent</cite>
                    <span>BOG</span>
                </blockquote>
            </li>
            <li>
                <blockquote>
                    <p>"Testimonial 3"</p>
                    <cite>Teacher</cite>
                    <span>Chemistry</span>
                </blockquote>
            </li>
        </ul>
    </div>
</div>
<div class="fullwidth-block upcoming-event-section" data-bg-color="#4b4980">

    <header class="section-header">
        <h2 class="section-title">Upcoming events</h2>

        <div class="event-nav">
            <a class="prev" id="event-prev" href="#"><i class="fa fa-caret-left"></i></a>
            <a class="next" id="event-next" href="#"><i class="fa fa-caret-right"></i></a>
        </div>

    </header>
    <div class="event-carousel">

        <div class="event">

            <h2 class="entry-title"><a href="#">Event Date</a></h2>
            <h2>Event Title</h2>
            <p>Details about the eventDetails about the eventDetails about the eventDetails about the eventDetails about the eventDetails about the eventDetails about the eventDetails about the eventDetails about the event</p>
            <p>Details about the event</p>
        </div>


        <div class="event">

            <h2 class="entry-title"><a href="#">Event Date</a></h2>
            <p>About event 2Details about the eventDetails about the eventDetails about the eventDetails about the event</p>
        </div>


        <div class="event">

            <h2 class="entry-title"><a href="#">Event date </a></h2>
            <p>Event 3 detailsDetails about the eventDetails about the eventDetails about the eventDetails about the event</p>
        </div>


        <div class="event">

            <h2 class="entry-title"><a href="#">Event Date</a></h2>
            <p>Event 4 detailsDetails about the eventDetails about the eventDetails about the eventDetails about the event </p>

        </div>


        <div class="event">

            <h2 class="entry-title"><a href="#">event 5</a></h2>
            <p>Event 5 details</p>
        </div>

    </div>
</div>
<footer class="site-footer">

    <img src="dummy/logo-footer.png" alt="Sunshine logo">

    <address>
        <p>Location <br><a href="tel:9488487853">Telephone</a> <br> <a href="#">email</a></p>
    </address>
    <form action="email_submit.php" method="POST"  ROLE="form"class="newsletter-form">
        <input type="email" name="email"  onchange="email_validate(this.value);" required placeholder="Enter your email to get newsletter...">
        <input type="submit" name="submit_email" class="button cut-corner" value="Subscribe">
    </form> <!-- .newsletter-form -->




    <div class="social-links">
        <a href="#"><i class="fa fa-facebook-square"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-pinterest"></i></a>
    </div>

    <p class="copy">Sunshine Boy's High School @ Copyright 2018. All right reserved. Designed by <a href="http://zalego.ac.ke">Zalego Institute</a></p>

</footer>

</div>
<script src="/assets/js/jssor.slider.min.js"></script>

