<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#a15757"> <!--   color chrome mobile -->

    <!-- lightgallery -->
    <link type="text/css" rel="stylesheet" href="lightgallery/css/lightgallery.css" />

    <!-- lightgallery plugins -->
    <link type="text/css" rel="stylesheet" href="lightgallery/css/lg-zoom.css" />
    <link type="text/css" rel="stylesheet" href="lightgallery/css/lg-thumbnail.css" />
    <!-- OR -->
    <link type="text/css" rel="stylesheet" href="lightgallery/css/lightgallery-bundle.css" />


    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">

    <title>@yield('title')</title>
</head>
<body>

<div class="o-container-site">
    @yield('menu')
    @yield('menu-edit')
    @yield('all')
</div>



<script src="lightgallery/lightgallery.umd.js"></script>
<!-- Or use the minified version -->
<script src="lightgallery/lightgallery.min.js"></script>

<!-- lightgallery plugins -->
<script src="lightgallery/plugins/thumbnail/lg-thumbnail.umd.js"></script>
<script src="lightgallery/plugins/zoom/lg-zoom.umd.js"></script>

<script type="text/javascript">
    lightGallery(document.getElementById('lightgallery'), {
        plugins: [lgZoom, lgThumbnail],
        licenseKey: 'your_license_key',
        speed: 100,
        // ... other settings
    });
// hide navbar
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-250px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>

</body>

</html>
