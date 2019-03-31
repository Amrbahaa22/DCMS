<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Doo Manaa</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            
            <li><a href="{{route('users.index')}}"><i class="fa fa-th"></i><span>@lang('site.main')</span></a></li>
            @if(auth()->user()->hasPermission('own_users'))
            <li><a href="{{route('users.doctors.index')}}"><i class="fa fa-th"></i><span>@lang('site.doctors')</span></a></li>
            <li><a href="{{route('users.employees.index')}}"><i class="fa fa-th"></i><span>@lang('site.employees')</span></a></li>
            @endif
            

         
                
     
        </ul>

    </section>

</aside>

