<?php
session_start();
$msg4 = "";
        include 'google_translater.php';
		include 'connection.php';
    ?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <title>Musicos</title>
    <meta charset="UTF-8">
    <meta name="description" content="Musicos">
    <meta name="keywords" content="music, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="img/favicon.ico" rel="shortcut icon" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css+font-awesome.min.css+owl.carousel.min.css+slicknav.min.css+style.css.pagespeed.cc.Caon0wkg6W.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <script nonce="887b0d2c-c22b-44fd-8292-349f9fb2ed74">
        (function(w, d) {
            ! function(a, e, t, r) {
                a.zarazData = a.zarazData || {};
                a.zarazData.executed = [];
                a.zaraz = {
                    deferred: []
                };
                a.zaraz.q = [];
                a.zaraz._f = function(e) {
                    return function() {
                        var t = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({
                            m: e,
                            a: t
                        })
                    }
                };
                for (const e of["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
                a.zaraz.init = () => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    n && (a.zarazData.t = e.getElementsByTagName("title")[0].text);
                    a.zarazData.x = Math.random();
                    a.zarazData.w = a.screen.width;
                    a.zarazData.h = a.screen.height;
                    a.zarazData.j = a.innerHeight;
                    a.zarazData.e = a.innerWidth;
                    a.zarazData.l = a.location.href;
                    a.zarazData.r = e.referrer;
                    a.zarazData.k = a.screen.colorDepth;
                    a.zarazData.n = e.characterSet;
                    a.zarazData.o = (new Date).getTimezoneOffset();
                    a.zarazData.q = [];
                    for (; a.zaraz.q.length;) {
                        const e = a.zaraz.q.shift();
                        a.zarazData.q.push(e)
                    }
                    z.defer = !0;
                    for (const e of[localStorage, sessionStorage]) Object.keys(e || {}).filter((a => a.startsWith("_zaraz_"))).forEach((t => {
                        try {
                            a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
                        } catch {
                            a.zarazData["z_" + t.slice(7)] = e.getItem(t)
                        }
                    }));
                    z.referrerPolicy = "origin";
                    z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData)));
                    t.parentNode.insertBefore(z, t)
                };
                ["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, 0, "script");
        })(window, document);
    </script>
	<script type="text/javascript">
    (function(d, m){
        var kommunicateSettings = 
            {"appId":"1ec89385134e5a72c82b7828adb571872","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "kommuni.json";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
/* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
</script>
<style>


.feedform button[type=submit] {
  background: #1acc8d;
  border: 0;
  padding: 10px 30px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;
}

.feedform button[type=submit]:hover {
  background: #34e5a6;
}
</style>
</head>

<body>


    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header-section clearfix">
        <a href="index.html" class="site-logo">
            <h3 style="color:red ;">MUSICOS</h3>
        </a>
        <div class="header-right">
            <a href="#" class="hr-btn">Help</a>
            <span>|</span>
            <div class="user-panel">
                <a href="lp.php" class="login">Login</a>
                <a href="regp.php" class="register">Create an account</a>
            </div>
        </div>
        <ul class="main-menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="#">Pages</a>
                <ul class="sub-menu">
                    <li><a href="category.html">Category</a></li>
                    <li><a href="playlist.html">Playlist</a></li>
                    <li><a href="artist.html">Artist</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </li>

            <li><a href="contact.html">Contact</a></li>
        </ul>
    </header>


    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            <div class="hs-item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hs-text">
                                <h2><span>Music</span> for everyone.</h2>
                                <p>Music is all around us, You just have to open up</p>
                                <a href="#" class="site-btn">Download Now</a>
                                <a href="#" class="site-btn sb-c2">Start free trial</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hr-img">
                                <img src="img/xhero-bg.png.pagespeed.ic.GoIKFhhe_u.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hs-text">
                                <h2><span>Listen </span> to new music.</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                                <a href="#" class="site-btn">Download Now</a>
                                <a href="#" class="site-btn sb-c2">Start free trial</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hr-img">
                                <img src="img/xhero-bg.png.pagespeed.ic.GoIKFhhe_u.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="intro-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Unlimited Access to 100K tracks</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem
                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    <a href="#" class="site-btn">Try it now</a>
                </div>
            </div>
        </div>
    </section>


    <section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg">
        <div class="container text-white">
            <div class="section-title">
                <h2>How it works</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="how-item">
                        <div class="hi-icon">
                            <img src="img/icons/xbrain.png.pagespeed.ic.M3TF7rgkpi.webp" alt="">
                        </div>
                        <h4>Create an account</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipi-scing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="how-item">
                        <div class="hi-icon">
                            <img src="img/icons/xpointer.png.pagespeed.ic.DHY2p1fSP-.webp" alt="">
                        </div>
                        <h4>Choose a plan</h4>
                        <p>Donec in sodales dui, a blandit nunc. Pellen-tesque id eros venenatis, sollicitudin neque sodales, vehicula nibh. Nam massa odio, portti-tor vitae efficitur non. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="how-item">
                        <div class="hi-icon">
                            <img src="img/icons/xsmartphone.png.pagespeed.ic.1vQk_uH3GA.webp" alt="">
                        </div>
                        <h4>Download Music</h4>
                        <p>Ablandit nunc. Pellentesque id eros venenatis, sollicitudin neque sodales, vehicula nibh. Nam massa odio, porttitor vitae efficitur non, ultric-ies volutpat tellus. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="concept-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Our Concept & artists</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="concept-item">
                        <img src="img/concept/x1.jpg.pagespeed.ic.TX12NoLeZf.webp" alt="">
                        <h5>Soul Music</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="concept-item">
                        <img src="img/concept/x2.jpg.pagespeed.ic.pMEZRK48O1.webp" alt="">
                        <h5>Live Concerts</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="concept-item">
                        <img src="img/concept/x3.jpg.pagespeed.ic.AQHPO42aaK.webp" alt="">
                        <h5>Dj Sets</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="concept-item">
                        <img src="img/concept/x4.jpg.pagespeed.ic.R5UVGSg83F.webp" alt="">
                        <h5>Live Streems</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="subscription-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sub-text">
                        <h2>Subscription from $15/month</h2>
                        <h3>Start a free trial now</h3>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="site-btn">Try it now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="sub-list">
                        <li><img src="img/icons/xcheck-icon.png.pagespeed.ic.1VIzXPVCtY.webp" alt="">Play any track</li>
                        <li><img src="img/icons/xcheck-icon.png.pagespeed.ic.1VIzXPVCtY.webp" alt="">Listen offline</li>
                        <li><img src="img/icons/xcheck-icon.png.pagespeed.ic.1VIzXPVCtY.webp" alt="">No ad interruptions</li>
                        <li><img src="img/icons/xcheck-icon.png.pagespeed.ic.1VIzXPVCtY.webp" alt="">Unlimited skips</li>
                        <li><img src="img/icons/xcheck-icon.png.pagespeed.ic.1VIzXPVCtY.webp" alt="">High quality audio</li>
                        <li><img src="img/icons/xcheck-icon.png.pagespeed.ic.1VIzXPVCtY.webp" alt="">Shuffle play</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="premium-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Why go Premium</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="img/premium/x1.jpg.pagespeed.ic.xtMAgeYcR3.webp" alt="">
                        <h4>No ad interruptions </h4>
                        <p>Consectetur adipiscing elit</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="img/premium/x2.jpg.pagespeed.ic.DaIGXkssNb.webp" alt="">
                        <h4>High Quality</h4>
                        <p>Ectetur adipiscing elit</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="img/premium/x3.jpg.pagespeed.ic.qURlkZvCfp.webp" alt="">
                        <h4>Listen Offline</h4>
                        <p>Sed do eiusmod tempor </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="img/premium/x4.jpg.pagespeed.ic.W-wV8wmpu6.webp" alt="">
                        <h4>Download Music</h4>
                        <p>Adipiscing elit</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="intro-section spad" id="contact">
        <div class="container">

          <h2 style="margin-left:34%;">Feedback</h2>

        <div class="row">

          
<?php 
if (isset($_POST['feed'])){
	$name1= mysqli_real_escape_string($conn, $_POST['name']);
    $feed1= mysqli_real_escape_string($conn, $_POST['subject']);
	$sql4="INSERT INTO `tbl_feedback`(`id`, `Name`, `text`) VALUES (DEFAULT,'$name1','$feed1')";
    $result4=$conn->query($sql4);
	if($result4){
				     $msg4 = "<div class='alert alert-success'>Your feedback has been recorded successfully</div>";
					 echo "<script>window.location.href='index.php#contact'</script>";
	}
	else{
		$msg4 = "<div class='alert alert-danger'>Something went wrong</div>";
		echo "<script>window.location.href='index.php#contact'</script>";
	}
}
?>
          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

            <form action="#" method="POST" style="margin-left:50%;" class="feedform">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
              
              </div>
			    <br>
              <div class="form-group mt-3">
                <textarea class="form-control"  name="subject" rows="5" placeholder="Please enter your feedback" required></textarea>
              </div>
              <div class="my-3">
                <?php echo $msg4; ?>
              </div>
			  <br>
             <button  type="submit" name="feed" >Send Feedback</button>
            </form>

          </div>

        </div>

      </div>
    </section>

    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 order-lg-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="footer-widget">
                                <h2>About us</h2>
                                <ul>
                                    <li><a href="">Our Story</a></li>
                                    <li><a href="">Sol Music Blog</a></li>
                                    <li><a href="">History</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="footer-widget">
                                <h2>Products</h2>
                                <ul>
                                    <li><a href="">Music</a></li>
                                    <li><a href="">Subscription</a></li>
                                    <li><a href="">Custom Music</a></li>
                                    <li><a href="">Footage</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="footer-widget">
                                <h2>Playlists</h2>
                                <ul>
                                    <li><a href="">Newsletter</a></li>
                                    <li><a href="">Careers</a></li>
                                    <li><a href="">Press</a></li>
                                    <li><a href="">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 order-lg-1">
                    <img src="data:image/webp;base64,UklGRogCAABXRUJQVlA4THsCAAAvgoAEEPdAJm2T+Re9sxbmXyCQ5Lk/xwIBwoL/SAkS/KOYgAEIsm21bf5DQhg1FBH3sv91hvc/yJMFRPTfgdu2keTsjPfsKun5BqHY8o/U4idv8k9indd2oNlg2K6vz1/czwbJ+V5A3resOB6Px9ViPnnvB4Ni9t77RURG70cN4/2J0wsOAIZRAy+adiCgnoH290fFK3MpHh8dd/76H8HDkgeAsUJR6hiBqGEAX1paHFT0CyNywdOACtDrY8SV2nl/rHhuzep0GXFIHdDFGD3gkqnUA3A+Dj2IKJeu/s358lJ5PgvIJUu+0dNWGeYPiMrSJWp6mMWUBxwjzj2CyOXz+VyI47LT78pFBJJLP+Q2eVVeWQGEAzJJTE2A038nBezMJTbipdLVZbi3aXKqkAEI8Qu3mny1IrJT+9dsYjwNqGJtmiPgla8HlFDeXusCkKQSNO+Mqf9L48Fm2tuUyMilXYRS3giTrRnw9kVz3/7lxRZR5DYJGfkhyej0lD8okXxT8//yxZuQkR+TyBQ6gMb9AemhRyvz+4tvCxm51mwpVbJbowMGAzi1vL3t3FJ57M0/axEZualBkU0WgggjOesrff1ncn9fjM7OlfVoP7AecYeTGxLHGOZ0H3WLACzgEYBej1JZWa+lrXPeLx/u7M1Yla/2qvzMHDoDMnJDAegp15PaCBa4URRZb67KvbEqTw4jZ1rZm/a2vckIM4MIrIZULVyIpw7KexBIHACM9b2pG2LowDW5VPJs3KFbleIotmTpoIJrmwJ0BKns0N4CSrQl8znldeCc0ioVhqgY9GQwsJZgHEdqwOOAGqFsOW//5bSW5qUOMrcSLopQAAA="
                        alt="">
                    <div class="copyright">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </div>
                    <div class="social-links">
                        <a href=""><i class="fa fa-instagram"></i></a>
                        <a href=""><i class="fa fa-pinterest"></i></a>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js+jquery.slicknav.min.js.pagespeed.jc.TEhxTNXYgJ.js"></script>
    <script>
        eval(mod_pagespeed_A0_FcMhLSk);
    </script>
    <script>
        eval(mod_pagespeed_pCwMCSN3pf);
    </script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script>
        //<![CDATA[
        /* ===================================
        --------------------------------------
          SolMusic HTML Template
          Version: 1.0
        --------------------------------------
        ======================================*/


        'use strict';

        $(window).on('load', function() {
            /*------------------
            	Preloder
            --------------------*/
            $(".loader").fadeOut();
            $("#preloder").delay(400).fadeOut("slow");

            if ($('.playlist-area').length > 0) {
                var containerEl = document.querySelector('.playlist-area');
                var mixer = mixitup(containerEl);
            }

        });

        (function($) {
            /*------------------
            	Navigation
            --------------------*/
            $(".main-menu").slicknav({
                appendTo: '.header-section',
                allowParentLinks: true,
                closedSymbol: '<i class="fa fa-angle-right"></i>',
                openedSymbol: '<i class="fa fa-angle-down"></i>'
            });

            $('.slicknav_nav').prepend('<li class="header-right-warp"></li>');
            $('.header-right').clone().prependTo('.slicknav_nav > .header-right-warp');

            /*------------------
            	Background Set
            --------------------*/
            $('.set-bg').each(function() {
                var bg = $(this).data('setbg');
                $(this).css('background-image', 'url(' + bg + ')');
            });


            $('.hero-slider').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                mouseDrag: false,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                items: 1,
                autoplay: true
            });

        })(jQuery);


        //]]>
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"73ecd7928cc5a908","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.8.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>