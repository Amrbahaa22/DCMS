@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.patients')</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
                <li><a href="{{ route('users.patients.index') }}"> @lang('site.patients')</a></li>
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

	               		<form action="{{route('users.patients.update',$patient->id)}}" method="post">
	               			{{csrf_field()}}
	               			{{method_field('PUT')}}

	               			<div class="form-group">
			                	<label>@lang('site.nextdate')</label>
					            <div class="input-group date col-xs-4" data-provide="datepicker">
		   							<div class="input-group-addon">
		  						      <span class="glyphicon glyphicon-th"></span>
		 						    </div>
		   							<input type="text" name="NextAppointment" class="form-control datepicker" value="{{$patient->NextAppointment}}">
		   							
								</div>			                	
			                </div>
	               			<!-- patient name -->
	               			<div class="form-group">
	               				<label>@lang('site.name')</label>
	               				<input type="text" name="name" class="form-control" value="{{$patient->name}}">
	               			</div>
	               			<!-- patient age -->
	               			<div class="form-group">
	               				<label>@lang('site.age')</label>
	               				<input type="number" name="age" class="form-control" value="{{$patient->age}}" min="1" max="120" step="1">
	               			</div>
	               			<!-- patient address -->
	               			<div class="form-group">
	               				<label>@lang('site.address')</label>
	               				<input type="text" name="address" class="form-control" value="{{$patient->address}}">
	               			</div>
	               			<!-- patient cellphone -->
	               			<div class="form-group">
	               				<label>@lang('site.cellphone')</label>
	               				<input type="text" name="cellphone" class="form-control" value="{{$patient->cellphone}}">
	               			</div>
	               			<!-- patient telephone -->
	               			<div class="form-group">
	               				<label>@lang('site.telephone')</label>
	               				<input type="text" name="telephone" class="form-control" value="{{$patient->telephone}}">
	               			</div>
	               			<!-- patient job -->
	               			<div class="form-group">
	               				<label>@lang('site.job')</label>
	               				<input type="text" name="job" class="form-control" value="{{$patient->job}}">
	               			</div>
	               			<!-- patient doctor -->
							<div class="form-group">
			                  <label>@lang('site.doctorName')</label>
			                  <select name="doctorName" class="form-control">
			                    <option>{{$patient->doctorName}}</option>
			                    @foreach($doctors as $doc)
				                    @if($doc->name != $patient->doctorName)
				                     <option>{{$doc->name}}</option>
				                    @endif
			                    @endforeach
			                  </select>
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