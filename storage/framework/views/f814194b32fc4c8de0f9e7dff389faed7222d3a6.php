<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php echo $__env->make('partials._backendHead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

    <style type="text/css">
        body { background: url(<?php echo e(asset('public/backend/')); ?>/img/bg-login.jpg) !important; }
    </style>



</head>

<body>
<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="index.html"><i class="halflings-icon home"></i></a>
                    <a href="#"><i class="halflings-icon cog"></i></a>
                </div>

                <?php

                    use Illuminate\Support\Facades\Session;


                    $message = Session::get('message');
                    if($message){
                        echo "<p class='alert alert-danger'>$message</p>";
                        Session::put('message',null);
                    }

                ?>

                <h2>Login to your account</h2>
                
                    <?php echo Form::open(['url' => '/admin-dashboard','method'=>'post','class'=>'form-horizontal']); ?>

                    <fieldset>

                        <div class="input-prepend" title="Username">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="admin_email"  type="text" placeholder="type email adress"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="admin_password"  type="password" placeholder="type password"/>
                        </div>
                        <div class="clearfix"></div>

                        <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

                        <div class="button-login">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="clearfix"></div>
                    </fieldset>
                <?php echo Form::close(); ?>

                
                <hr>
                <h3>Forgot Password?</h3>
                <p>
                    No problem, <a href="#">click here</a> to get a new password.
                </p>
            </div><!--/span-->
        </div><!--/row-->


    </div><!--/.fluid-container-->

</div><!--/fluid-row-->

<!-- start: JavaScript-->
<?php echo $__env->make('partials._backendScripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<!-- end: JavaScript-->

</body>
</html>
