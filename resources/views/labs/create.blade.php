@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.labs')</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
                <li><a href="{{ route('labs.index') }}"> @lang('site.labs')</a></li>
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

	               		<form action="{{route('labs.store')}}" method="post" >
	               			{{csrf_field()}}
	               			{{method_field('post')}}

	               			<div class="form-group">
	               				<label>@lang('site.name')</label>
	               				<input type="text" name="Name" class="form-control" value="{{old('Name')}}">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.phone')</label>
	               				<input type="text" name="Phone" class="form-control" value="{{old('Phone')}}">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.address')</label>
	               				<input type="text" name="Address" class="form-control" value="{{old('Address')}}">
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