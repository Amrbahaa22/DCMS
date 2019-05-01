@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.labs')</h1>
			<ol class="breadcrumb">
				<li ><a href="{{ route('users.main.index') }}"><i class="fa fa-dashboard"></i>@lang('site.main')</a></li>
				<li class="active">@lang('site.labs')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			<div class="box box-primary">
		    	<div class="box-header with-border">
		    		<h3 class="box-title"  style="margin-bottom: 15px">@lang('site.labs')<small>{{$labs->total()}}</small></h3>

		    		<form action="{{route('labs.index')}}" method="get">
		    			
		    			<div class="row">
		    				<div class="col-md-4">
		    					<input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{request()->search}}">
				    		</div>
				    		<div class="col-md-4">
				    			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>

				    		   <a href="{{route('labs.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>

				    		</div>
		    			</div>
		    			
		    		</form> <!--end of form  -->
		    		
		    	</div>

                <div class="box-body">

		@if ($labs->count()>0)
					
					<table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.address')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                      		@foreach ($labs as $index=>$lab)

                      			<tr>
                      				<td>{{$index + 1}}</td>
                      				<td>{{$lab->Name}}</td>
                      				<td>{{$lab->Phone}}</td>
                      				<td>{{$lab->Address}}</td>
                      			<td>

									  @if (auth()->user()->hasPermission('delete_users'))
									  <form method="POST" action="{{route('labs.destroy',$lab->id)}}" style="display:inline">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>@lang('site.delete')</button>
									  </form>
									  @endif

									  @if (auth()->user()->hasPermission('update_users'))
									  <a href="{{route('labs.show',$lab->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.labspatient')</a>
									  @endif
                      			</td>
                      			</tr>
                      		@endforeach
                        </tbody>

                    </table><!-- end of table -->      
                    {{$labs->appends(request()->query())->links()}}          	
        @else

                	<h2>@lang('site.no_data_found')</h2>

        @endif


                </div><!-- end of box body -->


            </div><!-- end of box -->

		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection