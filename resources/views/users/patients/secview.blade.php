@extends('layouts.DentalClinic.app')


@section('content')

  
  <div class="content-wrapper">
    <section class="content-header">

      <h1>@lang('site.patients')</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
                <li><a href="{{ route('users.patients.index') }}"> @lang('site.patients')</a></li>
                <li class="active">@lang('site.view')</li>
      </ol>   
    </section><!-- end of content header --> 
    <section class="content">
          <div class="box box-primary">

                  <div class="box-header">
                      
                    <h3 class="box-title">@lang('site.view')</h3>
                  </div><!-- end of box header-->
                  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$patient->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed col-xs-4">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>@lang('site.field')</th>
                  <th>@lang('site.data')</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>@lang('site.name')</td>
                  <td>
                    <div>
                      <div>{{$patient->name}}</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>@lang('site.age')</td>
                  <td>
                    <div>
                      <div>{{$patient->age}}</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>@lang('site.address')</td>
                  <td>
                    <div>
                      <div>{{$patient->address}}</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>@lang('site.cellphone')</td>
                  <td>
                    <div>
                      <div>{{$patient->cellphone}}</div>
                    </div>
                  </td>
                </tr> 
                <tr>
                  <td>5.</td>
                  <td>@lang('site.telephone')</td>
                  <td>
                    <div>
                      <div>{{$patient->telephone}}</div>
                    </div>
                  </td>
                </tr> 
                <tr>
                  <td>6.</td>
                  <td>@lang('site.job')</td>
                  <td>
                    <div>
                      <div>{{$patient->job}}</div>
                    </div>
                  </td>
                </tr> 
                <tr>
                  <td>7.</td>
                  <td>@lang('site.doctorName')</td>
                  <td>
                    <div>
                      <div>{{$patient->doctorName}}</div>
                    </div>
                  </td>
                </tr> 
                <tr>
                  <td>8.</td>
                  <td>@lang('site.nextdate')</td>
                  <td>
                    <div>
                      <div>{{$patient->NextAppointment}}</div>
                    </div>
                  </td>
                </tr> 
                <tr>
                  <td>9.</td>
                  <td>@lang('site.SubmitDate')</td>
                  <td>
                    <div>
                      <div>{{$patient->SubmitDate}}</div>
                    </div>
                  </td>
                </tr> 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
                
                </div><!-- end of box-->
    </section> <!-- end of content -->
    
  </div>  <!-- end of content wrapper -->




@endsection