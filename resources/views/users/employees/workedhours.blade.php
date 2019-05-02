@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.employees')</h1>
			<ol class="breadcrumb">
				<li ><a href="{{route('users.main.index')}}"><i class="fa fa-dashboard"></i>@lang('site.main')</a></li>
				<li class="active">@lang('site.employees')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			<div class="box box-primary">

                <div class="box-body">
                		    	<div class="box-header with-border">
		    		<h3 class="box-title"  style="margin-bottom: 15px"><small></small></h3>

		    		<form action="{{route('workhours.store')}}" method="post">
		    			{{csrf_field()}}
	               		{{method_field('post')}}

							<div class="form-group">
						        <label>@lang('site.name')</label>
						            <select name="name" class="form-control">
						                <option disabled selected value>@lang('site.choose')</option>
						                  	@foreach($employees as $employee)
						                     <option>{{$employee->name}}</option>
						                    
						            </select>
						            <input type="hidden" name="id" class="form-control" value="{{$employee->id}}">
						            @endforeach
						    </div>		

			                <div class="form-group">
						                	  <label>@lang('site.date')</label>
								              <div class="input-group date col-xs-4" data-provide="datepicker">
					   							<div class="input-group-addon">
					  						      <span class="glyphicon glyphicon-th"></span>
					 						    </div>
					   							 <input type="text" name="Date" class="form-control datepicker" value="{{old('Date')}}">
											 </div>			                	
						                </div>

			            	<div class="form-group">
				               				<label>@lang('site.hours')</label>
				               				<input type="number" name="workhours" class="form-control" value="{{old('workhours')}}" >
	               						</div>

		    				<div class="form-group">
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</button>
		    				</div>
		    		
			    		</div>
		
					</form> 
					

                	

        


                </div><!-- end of box body -->


            </div><!-- end of box -->

		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection