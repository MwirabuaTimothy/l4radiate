<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            @section('title')
            BookCheetah
            @show
        </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('assets/styles/css/main.css')}} ">
        <link rel="stylesheet" href="{{ asset('assets/styles/css/bookcheetah.css')}} ">

        <!-- JS -->
        <script src="{{ asset('assets/scripts/js/vendor/modernizr-2.6.2.min.js') }}"></script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=320691077999812";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Images -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/images/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/images/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/images/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/images/apple-touch-icon-57-precomposed.png') }}">

        <!-- ICO -->
        <link rel="shortcut icon" href="favicon.ico">


    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
    <div class="wrapper">
        <div class="middles header">
            <a href="{{ URL::to('/') }}"><img class="logo" src="{{ asset('assets/images/logo.png') }}"/></a>
            
            <a href="{{ URL::to('donate') }}">
            <div class="charity">
                <span class="charity1">Keep BookCheetah Free!</span><br/>
                <span class="charity2">Click here to donate</span>
            </div>
            </a>

            <ul class="linkbar top1">
                <a href="{{ URL::to('howitworks') }}"><li>How it Works</li></a> |
                <a href="{{ URL::to('forums') }}"><li>Forum</li></a> | 
                <a href="{{ URL::to('blog') }}"><li>Blog</li></a> | 
                <a href="{{ URL::to('contactus') }}"><li>Contact Us</li></a> | 
                <a href="{{ URL::to('customerservice') }}"><li>Customer Service</li></a>
            </ul>

            <ul class="linkbar top2">
                @if (Auth::check())
                    <li>Logged in as {{ Auth::user()->fullName() }}</li> |
                    <li>{{ Auth::user()->collegeName() }}</li> |
                    <li {{ (Request::is('mybooks') ? 'class="active"' : '') }}><a href="{{ URL::to('mybooks') }}">My Books</a></li>| 
                    <li {{ (Request::is('users') ? 'class="active"' : '') }}><a href="{{ URL::to('users') }}">My Account</a></li> | 
                    <li><a href="{{ URL::to('users/logout') }}">Log Out</a></li>
                @else
                    <li {{ (Request::is('mybooks') ? 'class="active"' : '') }}><a href="{{ URL::to('mybooks') }}">My Books</a></li>
                    <li {{ (Request::is('users/login') ? 'class="active"' : '') }}><a href="{{ URL::to('users/login') }}">Login</a></li>
                    <li {{ (Request::is('users/register') ? 'class="active"' : '') }}><a href="{{ URL::to('users/register') }}">Register</a></li>
                @endif
            </ul>
            

            <span class="searchline">
                
                <?php 
                    if(isset($_GET['booksearch'])){
                        $q=$_GET['booksearch'];
                        $c=$_GET['category'];
                        $s=$_GET['sort'];
                    }
                    else{
                        $q = 'Search for a book title, Subject, Author or ISBN...';
                        $c = 283155;
                        $s = 'relevancerank';
                    }
                ?>
                {{ Form::open(array('action' => 'SearchController@search', 'method' => 'GET', 'class' => 'search1')) }}
                    {{ Form::text('booksearch', $q, array(
                    'class' => 'searchinput searchbooks',
                    'placeholder' => 'Type a book title, Subject, Author or ISBN...',
                    'onclick' => 'if (this.value==\'Search for a book title, Subject, Author or ISBN...\') this.value=\'\'',
                    'onblur' => 'if (this.value==\'\') this.value=\'Search for a book title, Subject, Author or ISBN...\''
                    )) }}
                    <span class="buttonbabies">
                        {{ Form::select('category', array(
                            '283155' => 'All Books',
                            '465600' => 'All Textbooks',
                            '468220' => 'Business & Finance Textbooks',
                            '468226' => 'Communication & Journalism Textbooks',
                            '468204' => 'Computer Science Textbooks',
                            '468224' => 'Education Textbooks',
                            '468212' => 'Engineering Textbooks',
                            '468206' => 'Humanities Textbooks',
                            '468222' => 'Law Textbooks',
                            '468228' => 'Medicine & Health Sciences Textbooks',
                            '684283011' => 'Reference Textbooks',
                            '468216' => 'Science &amp; Mathematics Textbooks',
                            '468214' => 'Social Sciences Textbooks'

                        ), $c, array('class'=>'btn btn-primary')) }}

                        {{ Form::select('sort', array(
                            'relevancerank' => 'Relevance',
                            'titlerank' => 'Alphabetical: A to Z',
                            '-titlerank' => 'Alphabetical: Z to A',
                            'salesrank' => 'Bestselling',
                            'reviewrank' => 'Average customer review',
                            'pricerank' => 'Price: low to high',
                            'inverse-pricerank' => 'Price: high to low',
                            'daterank' => 'Publication date: newer to older'
                       
                        ), $s, array('class'=>'btn btn-primary')) }}
                       
                        {{ Form::submit('Search', array('class'=>'btn btn-primary submitbook')) }}
                    </span>
                {{ Form::close() }}

                {{ Form::open(array('method' => 'GET', 'class' => 'search2')) }}
                    {{ Form::text('collegesearch', 'Pick the college...', array(
                    'class' => 'searchinput searchcolleges', 
                    'placeholder' => 'Type a College name...',
                    'onclick' => 'if (this.value==\'Pick the college...\') this.value=\'\'',
                    'onblur' => 'if (this.value==\'\') this.value=\'Pick the college...\''
                    )) }}
                    <input name="submit" type="image"  class="submitcollege" src="assets/images/lens.png" />
                {{ Form::close() }}

            </span>

        </div>

        <!-- Add your site or application content here -->
        <!-- Container -->
        <div class="middles container">

            <!-- Notifications -->
            @include('partials.notifications')
            <!-- ./ notifications -->

            <!-- Content -->
            <div class="content">
                @yield('content')
                <!-- ./ content -->
                <!-- <div class="fb-like" data-href="http://bookcheetah.com" data-send="false" 
                data-width="450" data-show-faces="false"></div> -->
            </div>

        </div>
        <!-- ./ container -->

            <!-- jQuery -->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="assets/scripts/js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

            <script src="{{ asset('assets/scripts/js/plugins.js') }}"></script>
            <script src="{{ asset('assets/scripts/js/main.js') }}"></script>
            <script src="{{ asset('assets/scripts/js/vendor/bootstrap.min.js') }}"></script>
            <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
            <script>
                // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                // g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                // s.parentNode.insertBefore(g,s)}(document,'script'));
            </script>
            <script type="text/javascript">
                $(function() {
                      $(window).bind('resize', function()
                      {
                          resizeMe();
                          }).trigger('resize');
                    });
                percentage="";
                function resizeMe(){
                        //Standard Width, for which the body font size is correct
                      //fontsize = $("body").css("font-size").match(/\d+/);
                      preferredWidth =1200;  

                      displayWidth = $(".wrapper").width();
                      percentage = displayWidth / preferredWidth;
                      newFontSize = Math.floor(14 * percentage);
                      //$(".wrapper").css("left", Math.floor(210 * percentage)+"px");
                      $("img.logo").css("width", Math.floor(200 * percentage)+"px");
                      $(".charity").css("left", Math.floor(210 * percentage)+"px");
                      $("body").css("font-size", newFontSize+"px");
                      $("a").css("font-size", newFontSize+"px");
                      $("select").css("font-size", newFontSize+"px");
                      $("input").css("font-size", newFontSize+"px");
                      // $("ul.top1").css("font-size", newFontSize+"px");
                      // $(".footer").css("font-size", newFontSize+"px");
                      // $(".charity").css("font-size", newFontSize+"px");
                      // $("#bx-pager2 span").css("font-size", newFontSize+"px");
                      // $("#bx-pager2 a").css("font-size", newFontSize+"px");
                      // $("#bx-pager a").css("font-size", newFontSize+"px");
                      // $("span.bookactions a").css("font-size", newFontSize+"px");

                      

                };
                /*function autoResizeFont(){
                    this.css("font-size", (this.css("font-size")*percentage)+"px");
                };*/

            </script>

            <!-- page-specific assets-->
            @yield('assets')


        <div class="footer">
            <div class="middles footerstuff">
                <div class="bottom_left">

                    <ul class="footer_links_space">
                        <a href="{{ URL::to('howitworks') }}"><li class="link">How it Works</li></a> | 
                        <a href="{{ URL::to('termsofuse') }}"><li class="link">Terms of Use</li></a> | 
                        <a href="{{ URL::to('privacypolicy') }}"><li class="link">Privacy Policy</li></a> | 
                        <a href="{{ URL::to('contactus') }}"><li class="link">Contact Us</li></a>
                    </ul>
                    <br/>
                    <span class="devs_space">Designed by <a class="dev" href="http://thedevs.org">TheDevs</a></span>
                    
                </div>
                        
                <div class="bottom_right">
                    <span class="social_text">Get in Touch...</span><br />

                    <ul class="social_buttons">
                        <a href="http://www.facebook.com" target="_blank"><li class="fb_btn"></li></a>
                        <a href="http://www.twitter.com" target="_blank"><li class="tw_btn"></li></a>
                        <a href="http://www.linkedin.com" target="_blank"><li class="li_btn"></li></a>
                        <a href="mailto:info@bookcheeetah.com" target="_blank"><li class="mail_btn"></li></a>
                        <a href="http://www.evernote.com" target="_blank"><li class="evernote_btn"></li></a>
                        <a href="http://www.plus.google.com" target="_blank"><li class="gplus_btn"></li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
