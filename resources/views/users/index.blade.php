@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.main')</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i>@lang('site.main')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			<div class="box-body">

			@if (auth()->user()->hasPermission('updatesec_patients'))
					<table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.paid')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                        	@foreach ($sessions as $index=>$session)
	                      		<form action="{{ route('users.main.update',$session->id) }}" method="post" enctype="multipart/form-data">
		               			{{csrf_field()}}
		               			{{method_field('patch')}}

	                      			<tr>
	                      				<td>{{$index + 1}}</td>
	                      				<td>{{$session->patient->name}}</td>
	                      				<td>{{$session->patient->cellphone}}</td>
	                      				<td><input type="number" name="Paid" value="{{$session->TotalFee}}" class="form-control" min="1" max="120" step="1"></td>
	                      			<td>

											<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.confirm')</button>

	                      			</td>
	                      			</tr>

	                      		</form>
                      		@endforeach
                        </tbody>

                    </table><!-- end of table -->    
           @endif
                </div><!-- end of box body -->


		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection

