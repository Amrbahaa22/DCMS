@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.employees')</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
                <li><a href="{{ route('users.employees.index') }}"> @lang('site.employees')</a></li>
                <li class="active">@lang('site.add')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			    <div class="box box-primary">

               		<div class="box-header">
               				
               			<h3 class="box-title">@lang('site.add')</h3>
               		</div><!-- end of box header-->
               		
               		<div class="box-body">
               			
               			@include('partials._errors')

	               		<form action="{{route('users.employees.store')}}" method="post" enctype="multipart/form-data">
	               			{{csrf_field()}}
	               			{{method_field('post')}}

	               			<div class="form-group">
	               				<label>@lang('site.name')</label>
	               				<input type="text" name="name" class="form-control" value="{{old('name')}}">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.age')</label>
	               				<input type="number" name="age" class="form-control" value="{{old('age')}}" min="1" max="120" step="1">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.phone')</label>
	               				<input type="text" name="phone" class="form-control" value="{{old('phone')}}">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.email')</label>
	               				<input type="email" name="email" class="form-control" value="{{old('email')}}">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.image')</label>
	               				<input type="file" name="image" class="form-control">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.HourSalary')</label>
	               				<input type="text" name="HourSalary" class="form-control" value="{{old('HourSalary')}}">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.password')</label>
	               				<input type="password" name="password" class="form-control" >
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.password_confirmation')</label>
	               				<input type="password" name="password_confirmation" class="form-control" >
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