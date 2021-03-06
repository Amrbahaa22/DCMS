<!DOCTYPE html>
<html dir="<?php echo e(LaravelLocalization::getCurrentLocaleScript()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dental Clinic</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/skin-blue.min.css')); ?>">

    <?php if(app()->getLocale() == 'ar'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/font-awesome-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/AdminLTE-rtl.min.css')); ?>">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/bootstrap-rtl.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/rtl.css')); ?>">

        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    <?php else: ?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/AdminLTE.min.css')); ?>">
    <?php endif; ?>

    <style>
        .mr-2{
            margin-right: 5px;
        }

    </style>
    
    <script src="<?php echo e(asset('dashboard/js/jquery.min.js')); ?>"></script>

    
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/plugins/noty/noty.css')); ?>">
    <script src="<?php echo e(asset('dashboard/plugins/noty/noty.min.js')); ?>"></script>

    
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/plugins/icheck/all.css')); ?>">

    
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <header class="main-header">

        
        <a href="<?php echo e(route('users.index')); ?>" class="logo">
            
            <span class="logo-mini"><b>D</b>CL</span>
            <span class="logo-lg"><b>Dental</b>Clinic</span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="<?php echo e(asset('dashboard/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small>
                                                    <i class="fa fa-clock-o"></i> 5 mins
                                                </small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">See All Messages</a>
                            </li>
                        </ul>
                    </li>

                    
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>

                    
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-flag-o"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                
                                <ul class="menu">
                                    <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <li>
                                        <a rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                                            <?php echo e($properties['native']); ?>

                                        </a>
                                      </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </ul>
                            </li>
                        </ul>
                    </li>

                    
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo e(asset('dashboard/img/user2-160x160.jpg')); ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs">Manaa</span>
                        </a>
                        <ul class="dropdown-menu">

                            
                            <li class="user-header">
                                <img src="<?php echo e(asset('dashboard/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">

                                <p>
                                    Admin
                                    <small>Member since 2 days</small>
                                </p>
                            </li>

                            
                            <li class="user-footer">


                                <a href="<?php echo e(route('logout')); ?>" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><?php echo app('translator')->getFromJson('site.logout'); ?></a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <?php echo $__env->make('layouts.Dentalclinic._aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('partials._session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2018-2019
            <a href="https://www.facebook.com/Doomana3">Doo Manaa</a>.</strong> All rights
        reserved.
    </footer>

</div><!-- end of wrapper -->


<script src="<?php echo e(asset('dashboard/js/bootstrap.min.js')); ?>"></script>


<script src="<?php echo e(asset('dashboard/plugins/icheck/icheck.min.js')); ?>"></script>


<script src="<?php echo e(asset('dashboard/js/fastclick.js')); ?>"></script>


<script src="<?php echo e(asset('dashboard/js/adminlte.min.js')); ?>"></script>


<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree();

        //icheck
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        //delete
        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "<?php echo app('translator')->getFromJson('site.confirm_delete'); ?>",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("<?php echo app('translator')->getFromJson('site.yes'); ?>", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("<?php echo app('translator')->getFromJson('site.no'); ?>", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete

        // image preview
        $(".image").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });

    })


</script>
</body>
</html>

<?php /* C:\xamp\htdocs\Laravel\newproj\resources\views/layouts/DentalClinic/app.blade.php */ ?>