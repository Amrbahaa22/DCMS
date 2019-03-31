<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(asset('dashboard/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Doo Manaa</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="<?php echo e(route('users.index')); ?>"><i class="fa fa-th"></i><span><?php echo app('translator')->getFromJson('site.main'); ?></span></a></li>
            <li><a href="<?php echo e(route('users.doctors.index')); ?>"><i class="fa fa-th"></i><span><?php echo app('translator')->getFromJson('site.doctors'); ?></span></a></li>
            <li><a href="<?php echo e(route('users.employees.index')); ?>"><i class="fa fa-th"></i><span><?php echo app('translator')->getFromJson('site.employees'); ?></span></a></li>

         
                
      <!--       
            
            
            

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
             -->
        </ul>

    </section>

</aside>


<?php /* C:\Users\amr-bahaa\sw2\newproj\resources\views/layouts/Dentalclinic/_aside.blade.php */ ?>