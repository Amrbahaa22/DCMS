@extends('layouts.DentalClinic.app')


@section('content')

	
	<div class="content-wrapper">
		<section class="content-header">

			<h1>@lang('site.doctors')</h1>
			<ol class="breadcrumb">
				<li ><a href="{{route('users.main.index')}}"><i class="fa fa-dashboard"></i>@lang('site.main')</a></li>
				<li class="active">@lang('site.doctors')</li>
			</ol>		
		</section><!-- end of content header --> 
		<section class="content">
			<div class="box box-primary">
		    	<div class="box-header with-border">
		    		<h3 class="box-title"  style="margin-bottom: 15px">@lang('site.doctors')<small>{{$users->total()}}</small></h3>

		    		<form action="{{route('users.doctors.index')}}" method="get">
		    			
		    			<div class="row">
		    				<div class="col-md-4">
		    					<input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{request()->search}}">
				    		</div>
				    		<div class="col-md-4">
				    			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>

				    		   <a href="{{route('users.doctors.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>

				    		</div>
		    			</div>
		    			
		    		</form> <!--end of form  -->
		    		
		    	</div>

                <div class="box-body">

		@if ($users->count()>0)
					
					<table class="table table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.email')</th>
                                <th>@lang('site.image')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                      		@foreach ($users as $index=>$user)

                      			<tr>
                      				<td>{{$index + 1}}</td>
                      				<td>{{$user->name}}</td>
                      				<td>{{$user->phone}}</td>
                      				<td>{{$user->email}}</td>
                      				<td><img src="{{$user->image_path}}" style="width:100px;" class="img-thumbnail" alt=""> </td>
                      			<td>
                      				  @if (auth()->user()->hasPermission('update_users'))
									  <a href="{{route('users.bonus.show',$user->id)}}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>@lang('site.addbonus')</a>
									  @endif

                      				  @if (auth()->user()->hasPermission('update_users'))
									  <a href="{{route('users.doctors.edit',$user->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>
									  @endif

									  @if (auth()->user()->hasPermission('delete_users'))
									  <form method="POST" action="{{route('users.doctors.destroy',$user->id)}}" style="display:inline">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>@lang('site.delete')</button>
									  </form>
									  @endif
                      			</td>
                      			</tr>

                      		@endforeach
                        </tbody>

                    </table><!-- end of table -->      
                    {{$users->appends(request()->query())->links()}}          	
        @else

                	<h2>@lang('site.no_data_found')</h2>

        @endif


                </div><!-- end of box body -->


            </div><!-- end of box -->

		</section> <!-- end of content -->
		
	</div>  <!-- end of content wrapper -->




@endsection