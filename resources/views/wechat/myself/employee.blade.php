<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Your app title -->
    <title>My App</title>
    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/wechat/common.css') !!}"/>
</head>
<body>
<!-- Status bar overlay for full screen mode (PhoneGap) -->
<div class="statusbar-overlay"></div>
<!-- Views -->
<div class="views">
    <!-- Your main view, should have "view-main" class -->
    <div class="view view-main">
        <!-- Top Navbar-->
        <div class="navbar">
            <div class="navbar-inner">
                <!-- We need cool sliding animation on title element, so we have additional "sliding" class -->
                <div class="center sliding">Awesome App</div>
            </div>
        </div>
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
            <!-- Page, "data-page" contains page name -->
            <div data-page="index" class="page">
                <!-- Scrollable page content -->
                <div class="page-content">
                    <p>Page content goes here</p>
                    <!-- Link to another page -->
                    <a href="about.html">About app</a>
                    <p>Page content goes here</p>
                    <!-- Link to another page -->
                    <a href="about.html">About app</a>
                    <p>Page content goes here</p>
                    <!-- Link to another page -->
                    <a href="about.html">About app</a>
                    <p>Page content goes here</p>
                    <!-- Link to another page -->
                    <a href="about.html">About app</a>
                    <p>Page content goes here</p>
                    <!-- Link to another page -->
                    <a href="about.html">About app</a>
                    <input type="text" />

                </div>
            </div>
        </div>
        <!-- Bottom Toolbar-->
        <div class="toolbar">
            <div class="toolbar-inner">
                <!-- Toolbar links -->
                <a href="#" class="link">Link 1</a>
                <a href="#" class="link">Link 2</a>
            </div>
        </div>
    </div>
</div>
<script src="{!! URL::asset('js/vue.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{!! URL::asset('js/kitchen-sink.js') !!}"></script>
<script src="{!! URL::asset('js/jquery.min.js') !!}"></script>

<script>
    var myApp = new Framework7({
        //hideNavbarOnPageScroll:true,
    });

    // Export selectors engine
    var $$ = Dom7;

    // Add view
    var mainView = myApp.addView('.view-main', {
        // Because we use fixed-through navbar we can enable dynamic navbar
        //dynamicNavbar: true
        domCache: true //enable inline pages
    });
</script>
<script>
    <script src="{!! URL::asset('js/vue.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{!! URL::asset('js/kitchen-sink.js') !!}"></script>
<script src="{!! URL::asset('js/jquery.min.js') !!}"></script>

<script>
    var myApp = new Framework7({
        hideNavbarOnPageScroll:true,
    });

    // Export selectors engine
    var $$ = Dom7;

    // Add view
    var mainView = myApp.addView('.view-main', {
        // Because we use fixed-through navbar we can enable dynamic navbar
        //dynamicNavbar: true
        domCache: true //enable inline pages
    });

</script>
</body>
</html>


