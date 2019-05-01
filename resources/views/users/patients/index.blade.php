@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.patients')</h1>
			<ol class="breadcrumb">
				<li ><a href="{{route('users.main.index')}}"><i class="fa fa-dashboard"></i>@lang('site.main')</a></li>
				<li class="active">@lang('site.patients')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			<div class="box box-primary">
		    	<div class="box-header with-border">
		    		<h3 class="box-title"  style="margin-bottom: 15px">@lang('site.patients')<small>{{$patients->total()}}</small></h3>

		    		<form action="{{route('users.patients.index')}}" method="get">
		    			
		    			<div class="row">
		    				<div class="col-md-4">
		    					<input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{request()->search}}">
		    			</div>
		    			<div class="col-md-4">
		    				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>

		    				<a href="{{route('users.patients.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>

		    			</div>

		    		</div>
		    			
		    		</form> <!--end of form  -->
		    		
		    	</div>

                <div class="box-body">

		@if ($patients->count()>0)
					
					<table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.doctorName')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                      		@foreach ($patients as $index=>$patient)

                      			<tr>
                      				<td>{{$index + 1}}</td>
                      				<td>{{$patient->name}}</td>
                      				<td>{{$patient->cellphone}}</td>
                      				<td>{{$patient->doctorName}}</td>
                      			<td>
                              <!-- update patient -->
                                  @if (auth()->user()->hasPermission('updatesec_patients'))
                                  <a href="{{route('users.patients.edit',$patient->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>
                                  @endif
                                  @if (auth()->user()->hasPermission('updatedoc_patients'))
                                  <a href="{{route('users.docpatients.edit',$patient->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>
                                  @endif
                                  <!-- delete patient -->
                                  @if (auth()->user()->hasPermission('delete_patients'))
                                  <form action="{{route('users.patients.destroy',$patient->id)}}" method="post" style="display: inline-block;">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>@lang('site.delete')</button>
                                  </form>
                                  @endif
                                  <!-- show patient -->
                                  @if (auth()->user()->hasPermission('viewsec_patients'))
                                   <a href="{{route('users.patients.show',$patient->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>@lang('site.view')</a>
                                  @endif 
                                  @if (auth()->user()->hasPermission('viewdoc_patients'))
                                   <a href="{{route('users.docpatients.show',$patient->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>@lang('site.view')</a>
                                  @endif
                                  <!-- patient sessions -->
                                  @if (auth()->user()->hasPermission('readsession_patients'))
                                   <a href="{{route('users.patient_sessions.show',$patient->id)}}" class="btn btn-info btn-sm"><i class="fa fa-server"></i>@lang('site.usersessions')</a>
                                  @endif 
                                  <!-- patient lab -->
                                  @if (auth()->user()->hasPermission('readsession_patients'))
                                   <a href="{{route('users.AddLab.show',$patient->id)}}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>@lang('site.AddLab')</a>
                                  @endif  
                      			</td>
                      			</tr>

                      		@endforeach
                        </tbody>

                    </table><!-- end of table -->           
                    {{$patients->appends(request()->query())->links()}}      	
        @else

                	<h2>@lang('site.no_data_found')</h2>

        @endif


                </div><!-- end of box body -->


            </div><!-- end of box -->

		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection