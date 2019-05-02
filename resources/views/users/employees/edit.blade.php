@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.employees')</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
                <li><a href="{{ route('users.doctors.index') }}"> @lang('site.employees')</a></li>
                <li class="active">@lang('site.edit')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			    <div class="box box-primary">

               		<div class="box-header">
               				
               			<h3 class="box-title">@lang('site.edit')</h3>
               		</div><!-- end of box header-->
               		
               		<div class="box-body">
               			
               			@include('partials._errors')

	               		<form action="{{route('users.employees.update',$user->id)}}" method="post" enctype="multipart/form-data">
	               			{{csrf_field()}}
	               			{{method_field('patch')}}

	               			<div class="form-group">
	               				<label>@lang('site.name')</label>
	               				<input type="text" name="name" class="form-control" value="{{$user->name}}">
	               			</div>
	               				<div class="form-group">
	               				<label>@lang('site.age')</label>
	               				<input type="number" name="age" value="{{$user->age}}" class="form-control" min="1" max="120" step="1">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.phone')</label>
	               				<input type="text" name="phone" class="form-control" value="{{$user->phone}}">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.email')</label>
	               				<input type="email" name="email" class="form-control" value="{{$user->email}}">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.image')</label>
	               				<input type="file" name="image" class="form-control" >
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.HourSalary')</label>
	               				<input type="text" name="HourSalary" class="form-control" value="{{$user->HourSalary}}">
	               			</div>
	             
	               			<div class="form-group">
	               				<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.edit')</button>
	               			</div>
	               		</form>	

               		</div><!-- end of box body-->
               	
               	</div><!-- end of box-->
		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection