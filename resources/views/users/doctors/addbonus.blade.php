@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.doctors')</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
                <li><a href="{{ route('users.doctors.index') }}"> @lang('site.doctors')</a></li>
                <li class="active">@lang('site.addbonus')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			    <div class="box box-primary">

               		<div class="box-header">
               				
               			<h3 class="box-title">@lang('site.addbonus')</h3>
               		</div><!-- end of box header-->
               		
               		<div class="box-body">
               			
               			@include('partials._errors')

	               		<form action="{{route('users.bonus.store')}}" method="post" enctype="multipart/form-data">
	               			{{csrf_field()}}
	               			{{method_field('post')}}
	               			<!-- user id -->
	               			<input type="hidden" name="user_id" class="form-control" value="{{$id}}">
	               			<!--  -->
							<div class="form-group">
			                  <label>@lang('site.bonustype')</label>
			                  <select name="typeofreward" class="form-control">
			                  	 <option disabled selected value>@lang('site.choose')</option>
			                     <option>Bonus</option>
			                     <option>Penalty</option>
			                  </select>
			                </div>
	               			<div class="form-group">
	               				<label>@lang('site.cach')</label>
	               				<input type="number" name="cach" class="form-control" value="{{old('cach')}}" min="1" max="120" step="0.01">
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
	               				<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</button>
	               			</div>
	               		</form>	

               		</div><!-- end of box body-->
               	
               	</div><!-- end of box-->
		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection