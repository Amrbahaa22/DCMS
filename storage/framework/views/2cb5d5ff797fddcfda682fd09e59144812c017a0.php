<?php $__env->startSection('content'); ?>

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1><?php echo app('translator')->getFromJson('site.employees'); ?></h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo e(route('users.index')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->getFromJson('site.main'); ?></a></li>
                <li><a href="<?php echo e(route('users.employees.index')); ?>"> <?php echo app('translator')->getFromJson('site.employees'); ?></a></li>
                <li class="active"><?php echo app('translator')->getFromJson('site.add'); ?></li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			    <div class="box box-primary">

               		<div class="box-header">
               				
               			<h3 class="box-title"><?php echo app('translator')->getFromJson('site.add'); ?></h3>
               		</div><!-- end of box header-->
               		
               		<div class="box-body">
               			
               			<?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	               		<form action="<?php echo e(route('users.employees.store')); ?>" method="post">
	               			<?php echo e(csrf_field()); ?>

	               			<?php echo e(method_field('post')); ?>


	               			<div class="form-group">
	               				<label><?php echo app('translator')->getFromJson('site.name'); ?></label>
	               				<input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
	               			</div>
	               			<div class="form-group">
	               				<label><?php echo app('translator')->getFromJson('site.age'); ?></label>
	               				<input type="text" name="age" class="form-control" value="<?php echo e(old('age')); ?>">
	               			</div>
	               			<div class="form-group">
	               				<label><?php echo app('translator')->getFromJson('site.phone'); ?></label>
	               				<input type="text" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>">
	               			</div>
	               			<div class="form-group">
	               				<label><?php echo app('translator')->getFromJson('site.email'); ?></label>
	               				<input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
	               			</div>
	               			<div class="form-group">
	               				<label><?php echo app('translator')->getFromJson('site.HourSalary'); ?></label>
	               				<input type="text" name="HourSalary" class="form-control" value="<?php echo e(old('HourSalary')); ?>">
	               			</div>
	               			<div class="form-group">
	               				<label><?php echo app('translator')->getFromJson('site.password'); ?></label>
	               				<input type="password" name="password" class="form-control" >
	               			</div>
	               			<div class="form-group">
	               				<label><?php echo app('translator')->getFromJson('site.password_confirmation'); ?></label>
	               				<input type="password" name="password_confirmation" class="form-control" >
	               			</div>
	             
	               			<div class="form-group">
	               				<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i><?php echo app('translator')->getFromJson('site.add'); ?></button>
	               			</div>
	               		</form>	

               		</div><!-- end of box body-->
               	
               	</div><!-- end of box-->
		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.DentalClinic.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xamp\htdocs\Laravel\newproj\resources\views/users/employees/create.blade.php */ ?>