@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.usersessions')</h1>
			<ol class="breadcrumb">
				<li ><a href="{{route('users.main.index')}}"><i class="fa fa-dashboard"></i>@lang('site.main')</a></li>
        <li ><a href="{{route('users.patients.index')}}"><i class="fa fa-dashboard"></i>@lang('site.patients')</a></li>
				<li class="active">@lang('site.usersessions')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			<div class="box box-primary">
		    	<div class="box-header with-border">
		    		<h3 class="box-title"  style="margin-bottom: 15px">{{$patient->name}}<small></small></h3>

		    		<form action="{{route('users.patient_sessions.index')}}" method="get">
		    			
		    			<div class="row">
		    				<div class="col-md-4">
                  <select name="search" class="form-control">
                          <option disabled selected value>@lang('site.choose')</option>
                          @foreach($patient->sessions as $session)
                             <option >{{$session->Date}}</option>
                          @endforeach
                  </select>
		    					<input type="hidden" name="id" class="form-control" placeholder="@lang('site.search')" value="{{$patient->id}}" >
		    			</div>
		    			<div class="col-md-4">
		    				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>

		    				<a href="{{route('users.patient_sessions.create',$patient->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>

		    			</div>

		    		</div>
		    			
		    		</form> <!--end of form  -->
		    		
		    	</div>

                <div class="box-body">

		@if ($patient->sessions->count()>0)
					
					<table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.Date')</th>
                                <th>@lang('site.totalfee')</th>
                                <th>@lang('site.Paid')</th>
                                <th>@lang('site.Remaining')</th>
                                <th>@lang('site.Procedure')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                         
                          @if(isset($_GET['search']))
                            @php
                              $data = $x;
                            @endphp
                          @else
                            @php
                             $data = $patient->sessions;
                            @endphp
                          @endif

                      		@foreach ($data as $index=>$session)
                          
                      			<tr>
                      				<td>{{$index + 1}}</td>
                      				<td>{{$session->Date}}</td>
                      				<td>{{$session->TotalFee}}</td>
                      				<td>{{$session->Paid}}</td>
                              <td>{{$session->Remaining}}</td>
                              <td>
                                  <div>
                                    <textarea id="compose-textarea" class="form-control text-left" style="height: 100px" disabled>{{$session->Procedure}}</textarea>
                                  </div>
                              </td>
                      			<td>
                              <!-- update patient -->
                                  @if (auth()->user()->hasPermission('updatedoc_patients'))
                                  <a href="{{route('users.patient_sessions.edit',$session->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>
                                  @endif
                                  <!-- delete patient -->
                                  @if (auth()->user()->hasPermission('delete_patients'))
                                  <form action="{{route('users.patient_sessions.destroy',$session->id)}}" method="post" style="display: inline-block;">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                    <input type="hidden" name="patient_id" class="form-control" value="{{$patient->id}}">
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>@lang('site.delete')</button>
                                  </form>
                                  @endif
                      			</td>
                      			</tr>

                      		@endforeach
                        </tbody>

                    </table><!-- end of table -->      
    	
        @else

                	<h2>@lang('site.no_data_found')</h2>

        @endif


                </div><!-- end of box body -->


            </div><!-- end of box -->

		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection