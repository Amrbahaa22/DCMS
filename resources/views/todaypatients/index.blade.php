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

                  <div class="box-header">
                      
                    <h3 class="box-title">@lang('site.view')</h3>
                  </div><!-- end of box header-->
                  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">@lang('site.patients')</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed col-xs-4">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>@lang('site.name')</th>
                  <th>@lang('site.status')</th>
                </tr>
                @foreach($patients as $index=>$patient)
                  @if($patient->name=='default')
                    @php
                      {{continue;}}
                    @endphp
                  @endif
                <tr>
                  <form action="{{route('patients.update',$patient->id)}}" method="post">
                    {{csrf_field()}}
                              {{method_field('PATCH')}}
                             
                                <td>{{$index+1}}</td>
                                <td>{{$patient->name}}</td>
                                <td>
                                  <div>
                                   <label class="checkbox {{ $patient->attendance ? 'complete':''}}" for="completed">    
                                       <input type="checkbox" name="attendance" onchange="this.form.submit()" {{ $patient->attendance ? 'checked':''}}>
                                       {{$patient->name}}
                                   </label>
                                  </div>  
                                </td>
                              
                  </form>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
                
                </div><!-- end of box-->
    </section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection