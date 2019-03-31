<?php $__env->startSection('content'); ?>

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1><?php echo app('translator')->getFromJson('site.main'); ?></h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i><?php echo app('translator')->getFromJson('site.main'); ?></li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			<h1><?php echo app('translator')->getFromJson('site.content'); ?></h1>

		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.DentalClinic.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\Users\amr-bahaa\sw2\newproj\resources\views/users/index.blade.php */ ?>