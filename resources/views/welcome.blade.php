<!DOCTYPE html>
<html lang="en">
<head>
    @include("partials._head")
</head><!--/head-->

<body>
<header id="header"><!--header-->
    @include("partials._header")

</header><!--/header-->

<section id="slider"><!--slider-->
    {{--@include("partials._slider");--}}
    @yield('slider')
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include("partials._leftSidebar")
            </div>

            <div class="col-sm-9 padding-right">

                @yield("content")

            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    @include("partials._footer")

</footer><!--/Footer-->



    @include("partials._scripts")
</body>
</html>