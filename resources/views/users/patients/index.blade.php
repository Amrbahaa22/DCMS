@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.patients')</h1>
			<ol class="breadcrumb">
				<li ><a href="{{route('users.index')}}"><i class="fa fa-dashboard"></i>@lang('site.main')</a></li>
				<li class="active">@lang('site.patients')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			<div class="box box-primary">
		    	<div class="box-header with-border">
		    		<h3 class="box-title"  style="margin-bottom: 15px">@lang('site.patients')</h3>

		    		<form action="" method="">
		    			
		    			<div class="row">
		    				<div class="col-md-4">
		    					<input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="">
		    			</div>
		    			<div class="col-md-4">
		    				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>

		    				<a href="{{route('users.patients.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>

		    			</div>

		    		</div>
		    			
		    		</form> <!--end of form  -->
		    		
		    	</div>

                <div class="box-body">

		@if ($patients->count()>0)
					
					<table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.doctorName')</th>
                              
                            </tr>
                        </thead>
                            
                        <tbody>
                      
                        </tbody>

                    </table><!-- end of table -->                	
        @else

                	<h2>@lang('site.no_data_found')</h2>

        @endif


                </div><!-- end of box body -->


            </div><!-- end of box -->

		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection