<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{auth()->user()->image_path}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            
            <li><a href="{{ route('users.main.index') }}"><i class="fa fa-th"></i><span>@lang('site.main')</span></a></li>
            @if (auth()->user()->hasPermission('read_users'))
            <li><a href="{{route('users.doctors.index')}}"><i class="fa fa-th"></i><span>@lang('site.doctors')</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('read_users'))
            <li><a href="{{route('users.employees.index')}}"><i class="fa fa-th"></i><span>@lang('site.employees')</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('read_patients'))
            <li><a href="{{route('users.patients.index')}}"><i class="fa fa-th"></i><span>@lang('site.patients')</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('read_users'))
            <li><a href="{{route('labs.index')}}"><i class="fa fa-th"></i><span>@lang('site.labs')</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('read_users'))
            <li><a href="{{route('expenses.create')}}"><i class="fa fa-th"></i><span>@lang('site.addexpenses')</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('updatesec_patients'))
            <li><a href="{{route('patients.index')}}"><i class="fa fa-th"></i><span>@lang('site.Todaypatients')</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('create_users'))
            <li><a href="{{route('report.index')}}"><i class="fa fa-th"></i><span>@lang('site.report')</span></a></li>
            @endif
            @if (auth()->user()->hasPermission('create_users'))
            <li><a href="{{route('workhours.index')}}"><i class="fa fa-th"></i><span>@lang('site.workhours')</span></a></li>
            @endif
        </ul>

    </section>

</aside>

