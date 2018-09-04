<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make("partials._head", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <?php echo $__env->make("partials._header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</header><!--/header-->

<section id="slider"><!--slider-->
    
    <?php echo $__env->yieldContent('slider'); ?>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php echo $__env->make("partials._leftSidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="col-sm-9 padding-right">

                <?php echo $__env->yieldContent("content"); ?>

            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <?php echo $__env->make("partials._footer", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</footer><!--/Footer-->



    <?php echo $__env->make("partials._scripts", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>