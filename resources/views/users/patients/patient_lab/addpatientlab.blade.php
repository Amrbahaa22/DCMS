@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.patients')</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
                <li><a href="{{ route('users.patients.index') }}"><i class="fa fa-dashboard"></i> @lang('site.patients')</a></li>
                <li class="active">@lang('site.AddLab')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			    <div class="box box-primary">

               		<div class="box-header">
               				
               			<h3 class="box-title">@lang('site.add')</h3>
               		</div><!-- end of box header-->
               		
               		<div class="box-body">
               			
               			@include('partials._errors')

	               		<form action="{{route('users.AddLab.store')}}" method="post">
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
	               			<!-- labs -->
							<div class="form-group">
			                  <label>@lang('site.Lab')</label>
			                  <select name="labName" class="form-control">
			                  	 <option disabled selected value>@lang('site.choose')</option>
			                    @foreach($labs as $lab)
			                     <option>{{$lab->Name}}</option>
			                    @endforeach
			                  </select>
			                </div>
			                <!-- Type -->
	               			<div class="form-group">
	               				<label>@lang('site.type')</label>
	               				<input type="text" name="type" class="form-control" value="{{old('type')}}">
	               			</div>
			                <!-- total fee-->
	               			<div class="form-group">
	               				<label>@lang('site.totalfee')</label>
	               				<input type="number" name="expenses" class="form-control" value="{{old('expenses')}}" >
	               			</div>
			                <!-- procedure -->
	               			<div class="form-group">
	               				<label>@lang('site.comment')</label>
			                    <div>
			                    <textarea id="compose-textarea" class="form-control text-right" style="height: 100px"  name="comment" value="{{old('comment')}}"></textarea>
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