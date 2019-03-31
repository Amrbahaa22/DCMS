@extends('layouts.DentalClinic.app')


@section('content')

	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.patients')</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('users.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
                <li><a href="{{ route('users.patients.index') }}"> @lang('site.patients')</a></li>
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

	               		<form action="{{route('users.patients.store')}}" method="post">
	               			{{csrf_field()}}
	               			{{method_field('post')}}

	               			





	               			<div class="form-group">
	               				<label>@lang('site.name')</label>
	               				
	               				<input type="text" name="name" class="form-control" value="{{old('name')}}">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.age')</label>
	               				<input type="number" name="age" value="{{old('age')}}" class="form-control" min="1" max="120" step="1"/>
	               			</div>

	               			<div class="form-group">
	               				<label>@lang('site.address')</label>
	               				<input type="text" name="address" class="form-control" value="{{old('address')}}">
	               			</div>



	               			<div class="form-group">
	               				<label>@lang('site.cellphone')</label>
	               				<input type="text" name="cellphone" class="form-control" value="{{old('cellphone')}}">
	               			</div>
	               		
	               			<div class="form-group">
	               				<label>@lang('site.telephone')</label>
	               				<input type="text" name="telephone" class="form-control" value="{{old('telephone')}}">
	               			</div>
	               		
	               		 	<div class="form-group">
	               				<label>@lang('site.doctorName')</label>
	               				<input type="text" name="doctorName" class="form-control" value="{{old('doctorName')}}">
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