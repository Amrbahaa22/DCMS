@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.patients')</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
                <li><a href="{{ route('users.patients.index') }}"><i class="fa fa-dashboard"></i> @lang('site.patients')</a></li>
                <li ><a href="{{route('users.patient_sessions.show',$id)}}"><i class="fa fa-dashboard"></i>@lang('site.usersessions')</a></li>
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

	               		<form action="{{route('users.patient_sessions.store')}}" method="post">
	               			{{csrf_field()}}
	               			{{method_field('post')}}
	               			<!-- patient id -->
	               			<input type="hidden" name="patient_id" class="form-control" value="{{$id}}">
			                <!-- date -->
			                <div class="form-group">
			                	  <label>@lang('site.sessiondate')</label>
					            <div class="input-group date col-xs-4" data-provide="datepicker">
		   							<div class="input-group-addon">
		  						      <span class="glyphicon glyphicon-th"></span>
		 						    </div>
		   							 <input type="text" name="Date" class="form-control datepicker" value="{{old('Date')}}">	
								</div>			                	
			                </div>
			                <!-- procedure -->
	               			<div class="form-group">
	               				<label>@lang('site.Procedure')</label>
			                    <div>
			                    <textarea id="compose-textarea" class="form-control text-left" style="height: 100px"  name="Procedure"></textarea>
			                    </div>
	               			</div>

	               			<!-- total fee-->
	               			<div class="form-group">
	               				<label>@lang('site.totalfee')</label>
	               				<input type="number" name="TotalFee" class="form-control" value="{{old('TotalFee')}}" min="1" max="10000" step="1">
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