@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.report')</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i> @lang('site.main')</a></li>
				<li class="active">@lang('site.report')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
						<div class="box box-primary">
		    	<div class="box-header with-border">
		    		<h3 class="box-title"  style="margin-bottom: 15px"><small></small></h3>

		    		<form action="{{route('report.index')}}" method="get">
		    			
		    			<!-- <div class="row">
		    				<div class="col-md-5"> -->
                 			<!-- date -->
			                <div class="form-group">
			                	  <label>@lang('site.from')</label>
					            <div class="input-group date col-xs-4" data-provide="datepicker">
		   							<div class="input-group-addon">
		  						      <span class="glyphicon glyphicon-th"></span>
		 						    </div>
		   							 <input type="text" name="Date1" class="form-control datepicker" >	
								</div>			                	
			                </div>
			            <!--</div>
			            <div class="col-md-5"> -->
			                <!-- date -->
			                <div class="form-group">
			                	  <label>@lang('site.to')</label>
					            <div class="input-group date col-xs-4" data-provide="datepicker">
		   							<div class="input-group-addon">
		  						      <span class="glyphicon glyphicon-th"></span>
		 						    </div>
		   							 <input type="text" name="Date2" class="form-control datepicker" >	
								</div>			                	
			                </div>
			            <!-- </div>
			            <div class="col-md-2"> -->
		    				<div class="form-group">
								<button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>
		    				</div>
		    			<!-- </div> -->
		    		
		    		</div>
		    			
		    		</form> <!--end of form  -->
		    		
		    	</div>

                <div class="box-body">

		<div><h1>@lang('site.doctorsalary')</h1></div>
					
					<table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.totalfee')</th>
                                <th>@lang('site.percentage')</th>
                                <th>@lang('site.salary')</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                         @if(isset($_GET['search']))
                        	@for($i=0 ; $i < count($doctorsdata) ; $i++)
                        	 <tr>
	                      		<td>{{$i+1}}</td>
	                      		<td>{{$doctorsdata[$i][0]}}</td>
	                      		<td>{{$doctorsdata[$i][1]}}</td>
	                      		<td>{{$doctorsdata[$i][2]}}</td>
	                            <td>{{$doctorsdata[$i][3]}}</td>
	                      	 </tr>

                        	@endfor
	                      @endif
                        </tbody>

                    </table><!-- end of table --> 
        <div><h1>@lang('site.employeesalary')</h1></div> 
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.hours')</th>
                                <th>@lang('site.HourSalary')</th>
                                <th>@lang('site.salary')</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                        @if(isset($_GET['search']))
                        	@for($j=0 ; $j < count($employeesdata) ; $j++)
                        	 <tr>
	                      		<td>{{$i+1}}</td>
	                      		<td>{{$employeesdata[$j][0]}}</td>
	                      		<td>{{$employeesdata[$j][1]}}</td>
	                      		<td>{{$employeesdata[$j][2]}}</td>
	                            <td>{{$employeesdata[$j][3]}}</td>
	                      	 </tr>

                        	@endfor
                        @endif
                        </tbody>

                    </table><!-- end of table -->   
        <div><h1>@lang('site.totalprofit')</h1></div>    
                    <table class="table table-hover ">
             @if(isset($_GET['search']))
                <tr>
                  <th style="width: 10px">#</th>
                  <th>@lang('site.field')</th>
                  <th>@lang('site.data')</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>@lang('site.totalprofit')</td>
                  <td>
                    <div>
                      <div>{{$reportdata[0]}}</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>@lang('site.labsunpaidmoney')</td>
                  <td>
                    <div>
                      <div>{{$reportdata[1]}}</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>@lang('site.labspaidmoney')</td>
                  <td>
                    <div>
                      <div>{{$reportdata[2]}}</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>@lang('site.totalofdoctorsalary')</td>
                  <td>
                    <div>
                      <div>{{$reportdata[3]}}</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>@lang('site.totalofemployeesalary')</td>
                  <td>
                    <div>
                      <div>{{$reportdata[4]}}</div>
                    </div>
                  </td>
                </tr>
                 <tr>
                  <td>6.</td>
                  <td>@lang('site.totalexpenses')</td>
                  <td>
                    <div>
                      <div>{{$reportdata[5]}}</div>
                    </div>
                  </td>
                </tr>
            @endif
              </table>   
        <div><h1>@lang('site.expenses')</h1></div>    
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.type')</th>
                                <th>@lang('site.cach')</th>
                                <th>@lang('site.comment')</th>

                            </tr>
                        </thead>
                            
                        <tbody>
                        @if(isset($_GET['search']))
                        	@foreach($expenses as $index=>$expense)
	                         <tr>
	                      		<td>{{$index+1}}</td>
	                      		<td>{{$expense->type}}</td>
	                      		<td>{{$expense->cost}}</td>
	                      		<td>{{$expense->comment}}</td>
	                      	 </tr>
	                      	@endforeach
	                      @endif
                        </tbody>

                    </table><!-- end of table -->      



                </div><!-- end of box body -->


            </div><!-- end of box -->

		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection

