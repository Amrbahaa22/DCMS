@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.expenses')</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
                <!-- <li><a href="{{ route('labs.index') }}"> @lang('site.addexpenses')</a></li> -->
                <li class="active">@lang('site.add')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			    <div class="box box-primary">

               		<div class="box-header">
               				
               			<h3 class="box-title">@lang('site.addexpenses')</h3>
               		</div><!-- end of box header-->
               		
               		<div class="box-body">
               			
               			@include('partials._errors')

	               		<form action="{{route('expenses.store')}}" method="post" >
	               			{{csrf_field()}}
	               			{{method_field('post')}}
			                <!-- date -->
			                <div class="form-group">
			                	  <label>@lang('site.date')</label>
					            <div class="input-group date col-xs-4" data-provide="datepicker">
		   							<div class="input-group-addon">
		  						      <span class="glyphicon glyphicon-th"></span>
		 						    </div>
		   							 <input type="text" name="Date" class="form-control datepicker" value="{{old('Date')}}">	
								</div>			                	
			                </div>

	               			<!-- patient doctor -->
	               			@php

	               				$types=['Rent','Electricity','Water Billing','Material','Other'];

	               			@endphp
							<div class="form-group">
			                  <label>@lang('site.typeofexpense')</label>
			                  <select name="type" class="form-control">
			                  	 <option disabled selected value>@lang('site.choose')</option>
			                    @foreach($types as $type)
			                     <option>{{$type}}</option>
			                    @endforeach
			                  </select>
			                </div>
	               			<div class="form-group">
	               				<label>@lang('site.totalfee')</label>
	               				<input type="number" name="cost" value="{{old('cost')}}" class="form-control" min="1" max="120" step="1">
	               			</div>
	               			<div class="form-group">
	               				<label>@lang('site.comment')</label>
	               				<input type="text" name="comment" class="form-control" value="{{old('comment')}}">
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