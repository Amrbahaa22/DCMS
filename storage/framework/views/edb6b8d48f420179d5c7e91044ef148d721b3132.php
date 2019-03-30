<?php $__env->startSection('content'); ?>

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1><?php echo app('translator')->getFromJson('site.employees'); ?></h1>
			<ol class="breadcrumb">
				<li ><a href="<?php echo e(route('users.index')); ?>"><i class="fa fa-dashboard"></i><?php echo app('translator')->getFromJson('site.main'); ?></a></li>
				<li class="active"><?php echo app('translator')->getFromJson('site.employees'); ?></li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			<div class="box box-primary">
		    	<div class="box-header with-border">
		    		<h3 class="box-title"  style="margin-bottom: 15px"><?php echo app('translator')->getFromJson('site.employees'); ?></h3>

		    		<form action="" method="">
		    			
		    			<div class="row">
		    				<div class="col-md-4">
		    					<input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->getFromJson('site.search'); ?>" value="">
		    			</div>
		    			<div class="col-md-4">
		    				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i><?php echo app('translator')->getFromJson('site.search'); ?></button>

		    				<a href="<?php echo e(route('users.employees.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i><?php echo app('translator')->getFromJson('site.add'); ?></a>

		    			</div>

		    		</div>
		    			
		    		</form> <!--end of form  -->
		    		
		    	</div>

                <div class="box-body">

		<?php if($users->count()>0): ?>
					
					<table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->getFromJson('site.name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('site.phone'); ?></th>
                                <th><?php echo app('translator')->getFromJson('site.email'); ?></th>
                                <th><?php echo app('translator')->getFromJson('site.action'); ?></th>
                            </tr>
                        </thead>
                            
                        <tbody>
                      		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      			<tr>
                      				<td><?php echo e($index + 1); ?></td>
                      				<td><?php echo e($user->name); ?></td>
                      				<td><?php echo e($user->phone); ?></td>
                      				<td><?php echo e($user->email); ?></td>
                      			<td>
                                  <a href="#" class="btn btn-info btn-sm"><i class="fa fa-edit"></i><?php echo app('translator')->getFromJson('site.edit'); ?></a>
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i><?php echo app('translator')->getFromJson('site.delete'); ?></button>
                                    		
                      			</td>
                      			</tr>

                      		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table><!-- end of table -->                	
        <?php else: ?>

                	<h2><?php echo app('translator')->getFromJson('site.no_data_found'); ?></h2>

        <?php endif; ?>


                </div><!-- end of box body -->


            </div><!-- end of box -->

		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.DentalClinic.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xamp\htdocs\Laravel\newproj\resources\views/users/employees/index.blade.php */ ?>