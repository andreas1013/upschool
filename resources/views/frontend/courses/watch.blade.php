@extends("themes.frontend.master")

@section("page_title")
:: Course
@endsection

@push("custom_css")
<link rel="stylesheet" href="{{ asset('upschool/frontend/css/learning-sequence.css') }}" />
<style type="text/css">
    /*-------------------------------*/
    /*           Wrappers            */
    /*-------------------------------*/

    #wrapper {
        padding-left: 0;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #wrapper.toggled {
        padding-left: 220px;
    }

    #sidebar-wrapper {
        z-index: 1000;
        left: 220px;
        width: 0;
        height: 100%;
        margin-left: -220px;
        overflow-y: auto;
        overflow-x: hidden;
        background: #1a1a1a;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #sidebar-wrapper::-webkit-scrollbar {
        display: none;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 220px;
    }

    #page-content-wrapper {
        width: 100%;
        padding-top: 70px;
    }

    #wrapper.toggled #page-content-wrapper {
        position: absolute;
        margin-right: -220px;
    }

    /*-------------------------------*/
    /*     Sidebar nav styles        */
    /*-------------------------------*/
    .navbar {
        padding: 0;
    }

    .sidebar-nav {
        position: absolute;
        top: 0;
        width: 220px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .sidebar-nav li {
        position: relative;
        line-height: 20px;
        display: inline-block;
        width: 100%;
    }

    .sidebar-nav li:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        height: 100%;
        width: 3px;
        background-color: #1c1c1c;
        -webkit-transition: width .2s ease-in;
        -moz-transition: width .2s ease-in;
        -ms-transition: width .2s ease-in;
        transition: width .2s ease-in;

    }

    .sidebar-nav li:hover {
        background: skyblue !important;
        border-radius: 10px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .sidebar-nav li:hover:before,
    .sidebar-nav li.open:hover:before {
        width: 100%;
        -webkit-transition: width .2s ease-in;
        -moz-transition: width .2s ease-in;
        -ms-transition: width .2s ease-in;
        transition: width .2s ease-in;

    }

    .sidebar-nav li a {
        display: block;
        color: #ddd;
        text-decoration: none;
        padding: 10px 15px 10px 30px;
    }

    .sidebar-nav li a:hover,
    .sidebar-nav li a:active,
    .sidebar-nav li a:focus,
    .sidebar-nav li.open a:hover,
    .sidebar-nav li.open a:active,
    .sidebar-nav li.open a:focus {
        color: #fff;
        text-decoration: none;
        background-color: transparent;
    }

    .sidebar-header {
        text-align: center;
        font-size: 20px;
        position: relative;
        width: 100%;
        display: inline-block;
    }

    .sidebar-brand {
        height: 65px;
        position: relative;
        background: #212531;
        background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
        padding-top: 1em;
    }

    .sidebar-brand a {
        color: #ddd;
    }

    .sidebar-brand a:hover {
        color: #fff;
        text-decoration: none;
    }

    .dropdown-header {
        text-align: center;
        font-size: 1em;
        color: #ddd;
        background: #212531;
        background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
    }

    .sidebar-nav .dropdown-menu {
        position: relative;
        width: 100%;
        padding: 0;
        margin: 0;
        border-radius: 0;
        border: none;
        background-color: #222;
        box-shadow: none;
    }

    .dropdown-menu.show {
        top: 0;
    }

    /*Fontawesome icons*/
    .nav.sidebar-nav li a::before {
        font-family: fontawesome;
        content: "\f12e";
        vertical-align: baseline;
        display: inline-block;
        padding-right: 5px;
    }

    a[href*="#home"]::before {
        content: "\f015" !important;
    }

    a[href*="#about"]::before {
        content: "\f129" !important;
    }

    a[href*="#events"]::before {
        content: "\f073" !important;
    }

    a[href*="#events"]::before {
        content: "\f073" !important;
    }

    a[href*="#team"]::before {
        content: "\f0c0" !important;
    }

    a[href*="#works"]::before {
        content: "\f0b1" !important;
    }

    a[href*="#pictures"]::before {
        content: "\f03e" !important;
    }

    a[href*="#videos"]::before {
        content: "\f03d" !important;
    }

    a[href*="#books"]::before {
        content: "\f02d" !important;
    }

    a[href*="#art"]::before {
        content: "\f1fc" !important;
    }

    a[href*="#awards"]::before {
        content: "\f02e" !important;
    }

    a[href*="#services"]::before {
        content: "\f013" !important;
    }

    a[href*="#contact"]::before {
        content: "\f086" !important;
    }

    a[href*="#followme"]::before {
        content: "\f099" !important;
        color: #0084b4;
    }

    /*-------------------------------*/
    /*       Hamburger-Cross         */
    /*-------------------------------*/

    .hamburger {
        position: fixed;
        top: 20px;
        z-index: 999;
        display: block;
        width: 32px;
        height: 32px;
        margin-left: 15px;
        background: transparent;
        border: none;
    }

    .hamburger:hover,
    .hamburger:focus,
    .hamburger:active {
        outline: none;
    }

    .hamburger.is-closed:before {
        content: '';
        display: block;
        width: 100px;
        font-size: 14px;
        color: #fff;
        line-height: 32px;
        text-align: center;
        opacity: 0;
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed:hover:before {
        opacity: 1;
        display: block;
        -webkit-transform: translate3d(-100px, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed .hamb-top,
    .hamburger.is-closed .hamb-middle,
    .hamburger.is-closed .hamb-bottom,
    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-middle,
    .hamburger.is-open .hamb-bottom {
        position: absolute;
        left: 0;
        height: 4px;
        width: 100%;
    }

    .hamburger.is-closed .hamb-top,
    .hamburger.is-closed .hamb-middle,
    .hamburger.is-closed .hamb-bottom {
        background-color: #1a1a1a;
    }

    .hamburger.is-closed .hamb-top {
        top: 5px;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed .hamb-middle {
        top: 50%;
        margin-top: -2px;
    }

    .hamburger.is-closed .hamb-bottom {
        bottom: 5px;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed:hover .hamb-top {
        top: 0;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-closed:hover .hamb-bottom {
        bottom: 0;
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-middle,
    .hamburger.is-open .hamb-bottom {
        background-color: #1a1a1a;
    }

    .hamburger.is-open .hamb-top,
    .hamburger.is-open .hamb-bottom {
        top: 50%;
        margin-top: -2px;
    }

    .hamburger.is-open .hamb-top {
        -webkit-transform: rotate(45deg);
        -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
    }

    .hamburger.is-open .hamb-middle {
        display: none;
    }

    .hamburger.is-open .hamb-bottom {
        -webkit-transform: rotate(-45deg);
        -webkit-transition: -webkit-transform .2s cubic-bezier(.73, 1, .28, .08);
    }

    .hamburger.is-open:before {
        content: '';
        display: block;
        width: 100px;
        font-size: 14px;
        color: #fff;
        line-height: 32px;
        text-align: center;
        opacity: 0;
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    .hamburger.is-open:hover:before {
        opacity: 1;
        display: block;
        -webkit-transform: translate3d(-100px, 0, 0);
        -webkit-transition: all .35s ease-in-out;
    }

    /*-------------------------------*/
    /*            Overlay            */
    /*-------------------------------*/
</style>
@endpush

@section("content")
<div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <div class="sidebar-header">
                <div class="sidebar-brand">
                    <a href="#">Brand</a>
                </div>
            </div>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#team">Team</a></li>
            <li class="dropdown">
                <a href="#works" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
                <ul class="dropdown-menu animated fadeInLeft" role="menu">
                    <div class="dropdown-header">Dropdown heading</div>
                    <li><a href="#pictures">Pictures</a></li>
                    <li><a href="#videos">Videeos</a></li>
                    <li><a href="#books">Books</a></li>
                    <li><a href="#art">Art</a></li>
                    <li><a href="#awards">Awards</a></li>
                </ul>
            </li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#followme">Follow me</a></li>
        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1>Fancy Toggle Sidebar Navigation</h1>
                    <p>Bacon ipsum dolor sit amet tri-tip shoulder tenderloin shankle. Bresaola tail pancetta ball tip doner meatloaf corned beef. Kevin pastrami tri-tip prosciutto ham hock pork belly bacon pork loin salami pork chop shank corned beef tenderloin meatball cow. Pork bresaola meatloaf tongue, landjaeger tail andouille strip steak tenderloin sausage chicken tri-tip. Pastrami tri-tip kielbasa sausage porchetta pig sirloin boudin rump meatball andouille chuck tenderloin biltong shank </p>
                    <p>Pig meatloaf bresaola, spare ribs venison short loin rump pork loin drumstick jowl meatball brisket. Landjaeger chicken fatback pork loin doner sirloin cow short ribs hamburger shoulder salami pastrami. Pork swine beef ribs t-bone flank filet mignon, ground round tongue. Tri-tip cow turducken shank beef shoulder bresaola tongue flank leberkas ball tip.</p>
                    <p>Filet mignon brisket pancetta fatback short ribs short loin prosciutto jowl turducken biltong kevin pork chop pork beef ribs bresaola. Tongue beef ribs pastrami boudin. Chicken bresaola kielbasa strip steak biltong. Corned beef pork loin cow pig short ribs boudin bacon pork belly chicken andouille. Filet mignon flank turkey tongue. Turkey ball tip kielbasa pastrami flank tri-tip t-bone kevin landjaeger capicola tail fatback pork loin beef jerky.</p>
                    <p>Chicken ham hock shankle, strip steak ground round meatball pork belly jowl pancetta sausage spare ribs. Pork loin cow salami pork belly. Tri-tip pork loin sausage jerky prosciutto t-bone bresaola frankfurter sirloin pork chop ribeye corned beef chuck. Short loin hamburger tenderloin, landjaeger venison porchetta strip steak turducken pancetta beef cow leberkas sausage beef ribs. Shoulder ham jerky kielbasa. Pig doner short loin pork chop. Short ribs frankfurter rump meatloaf.</p>
                    <p>Filet mignon biltong chuck pork belly, corned beef ground round ribeye short loin rump swine. Hamburger drumstick turkey, shank rump biltong pork loin jowl sausage chicken. Rump pork belly fatback ball tip swine doner pig. Salami jerky cow, boudin pork chop sausage tongue andouille turkey.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
@endsection

@push("custom_scripts")
<script>
    $(document).ready(function() {
        $("a.tutor_toggle").click(function() {
            $(".course_sidebar").toggleClass("course_sidebar_left_actopn");
            $(".tutor_back").toggleClass("tutor_back_vanish");
            $("section.second").toggleClass("second_next");
            $(".strech_content").toggleClass("strech_content_next");
            $(".tutor_toggle").toggleClass("tutor_toggle_action");
        });
        $("a.tutor_back").click(function() {
            $("section.second").removeClass("second_next");
            $("#sidebar").removeClass("slide_right");
            $(".course_sidebar").removeClass("course_sidebar_left_actopn");
            $(".course_sidebar").addClass("course_sidebar_back_tab");
            $(".strech_content").removeClass("strech_content_next");
        });

    });
    $(document).ready(function() {
        $(".topics_title").click(function() {
            $(this).next(".topics_ul").slideToggle("slow");
        });
    });

    $(document).ready(function() {
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function() {
            hamburger_cross();
        });

        function hamburger_cross() {

            if (isClosed == true) {
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }
        }

        $('[data-toggle="offcanvas"]').click(function() {
            $('#wrapper').toggleClass('toggled');
        });
    });
</script>

@endpush