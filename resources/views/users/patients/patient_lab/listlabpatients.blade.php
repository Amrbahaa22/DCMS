@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.usersessions')</h1>
			<ol class="breadcrumb">
				<li ><a href="{{route('users.main.index')}}"><i class="fa fa-dashboard"></i>@lang('site.main')</a></li>
        <li ><a href="{{route('labs.index')}}"><i class="fa fa-dashboard"></i>@lang('site.labs')</a></li>
				<li class="active">@lang('site.lab')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			<div class="box box-primary">
		    	<div class="box-header with-border">
		    		<h3 class="box-title"  style="margin-bottom: 15px">@lang('site.lab'):{{$lab->Name}}<small></small></h3>

		    		<form action="{{route('users.AddLab.index')}}" method="get">
		    			
		    			<div class="row">
		    				<div class="col-md-4">
                  <select name="search" class="form-control">
                          <option disabled selected value>@lang('site.choose')</option>
                          @foreach($dates as $date)
                             <option >{{$date->Date}}</option>
                          @endforeach
                  </select>
		    					<input type="hidden" name="id" class="form-control" placeholder="@lang('site.search')" value="{{$lab->id}}" >
		    			</div>
		    			<div class="col-md-4">
		    				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>

		    			</div>

		    		</div>
		    			
		    		</form> <!--end of form  -->
		    		
		    	</div>

                <div class="box-body">

		@if ($lab->patients->count()>0)
					
					<table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.Date')</th>
                                <th>@lang('site.patientname')</th>
                                <th>@lang('site.labexpenses')</th>
                                <th>@lang('site.type')</th>
                                <th>@lang('site.comment')</th>
                                <th>@lang('site.Paymentstatus')</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                         
                          @if(isset($_GET['search']))
                            @php
                              $data = $patients_founded;
                            @endphp
                              @foreach ($data as $index=>$p)
                          
                          <tr>
                            <tr>
                              <td>{{$index + 1}}</td>
                              <td>{{$p->Date}}</td>
                              <td>{{$p->name}}</td>
                              <td>{{$p->expenses}}</td>
                              <td>{{$p->type}}</td>
                              <td>
                                  <div>
                                    <textarea id="compose-textarea" class="form-control text-left" style="height: 100px" disabled>{{$p->comment}}</textarea>
                                  </div>
                              </td>
                              <td></td>
                            <td>
                              <div>
                                <form action="{{route('users.AddLab.update',$p->id)}}" method="post">
                                  {{csrf_field()}}
                                  {{method_field('PATCH')}}
                                  <label class="checkbox" for="completed">
                                    <input type="checkbox" name="Paymentstatus" onchange="this.form.submit()" {{ $p->Paymentstatus ? 'checked':''}}>
                                  </label>
                                </form>
                              </div>
                            </td>
                          </tr>

                          @endforeach
                            
                          @else
                            @php
                             $data = $lab->patients;
                            @endphp
                            @foreach ($data as $index=>$p)
                          
                            <tr>
                              <td>{{$index + 1}}</td>
                              <td>{{$p->pivot->Date}}</td>
                              <td>{{$p->name}}</td>
                              <td>{{$p->pivot->expenses}}</td>
                              <td>{{$p->pivot->type}}</td>
                              <td>
                                  <div>
                                    <textarea id="compose-textarea" class="form-control text-left" style="height: 50px;width:350px;" disabled>{{$p->pivot->comment}}</textarea>
                                  </div>
                              </td>
                              <td></td>
                            <td>
                              <div>
                                <form action="{{route('users.AddLab.update',$p->pivot->id)}}" method="post">
                                  {{csrf_field()}}
                                  {{method_field('PATCH')}}
                                  <label class="checkbox" for="completed">
                                    <input type="checkbox" name="Paymentstatus" onchange="this.form.submit()" {{$p->pivot->Paymentstatus ? 'checked':''}}>
                                  </label>
                                </form>
                              </div>
                            </td>
                            </tr>

                          @endforeach
                          @endif

                      		
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