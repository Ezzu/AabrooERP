<!-- @if (is_string($item))
    <li class="header">{{ $item }}</li>
@else
    <li class="{{ $item['class'] }}">
        <a href="{{ $item['href'] }}"
           @if (isset($item['target'])) target="{{ $item['target'] }}" @endif
        >
            <i class="fa fa-fw fa-{{ isset($item['icon']) ? $item['icon'] : 'circle-o' }} {{ isset($item['icon_color']) ? 'text-' . $item['icon_color'] : '' }}"></i>
            <span>{{ $item['text'] }}</span>
            @if (isset($item['label']))
                <span class="pull-right-container">
                    <span class="label label-{{ isset($item['label_color']) ? $item['label_color'] : 'primary' }} pull-right">{{ $item['label'] }}</span>
                </span>
            @elseif (isset($item['submenu']))
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            @endif
        </a>
        @if (isset($item['submenu']))
            <ul class="{{ $item['submenu_class'] }}">
                @each('adminlte::partials.menu-item', $item['submenu'], 'item')
            </ul>
        @endif
    </li>
@endif -->
@inject('request', 'Illuminate\Http\Request')

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p> -->
        <!-- Status -->
        
        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div> -->

    <!-- search form (Optional) -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">ADMIN SECTION</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="{{ $request->segment(2) == 'home' ? 'active' : '' }}"><a href="{{ route('admin.home') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span></a></li>
      <li class="{{ $request->segment(2) == 'areas' ? 'active' : '' }}"><a href="{{ route('admin.areas.index') }}"><i class="fas fa-abc"></i> <span>Manage Areas</span></a></li>
      <li class="{{ $request->segment(2) == 'payment_types' ? 'active' : '' }}"><a href="{{ route('admin.payment_types.index') }}"><i class="fas fa-abc"></i> <span>Manage Payment Methods</span></a></li>
      <li class="{{ $request->segment(2) == 'donars_class' ? 'active' : '' }}"><a href="{{ route('admin.donars_class.index') }}"><i class="fas fa-abc"></i> <span>Manage Donars Class</span></a></li>
      <li class="{{ $request->segment(2) == 'donars' ? 'active' : '' }}"><a href="{{ route('admin.donars.index') }}"><i class="fas fa-abc"></i> <span>Manage Donars</span></a></li>
      <li class="{{ $request->segment(2) == 'students' ? 'active' : '' }}"><a href="{{ route('admin.students.index') }}"><i class="fas fa-abc"></i> <span>Manage Students</span></a></li>
      <li class="{{ $request->segment(2) == 'donars_students' ? 'active' : '' }}"><a href="{{ route('admin.students_donars.index') }}"><i class="fas fa-abc"></i> <span>Students Sponsership</span></a></li>
      <li class="{{ $request->segment(2) == 'donar_payments' ? 'active' : '' }}"><a href="{{ route('admin.donar_payments.index') }}"><i class="fas fa-abc"></i> <span>Donar Payments</span></a></li>
      <li class="{{ $request->segment(2) == 'branches' ? 'active' : '' }}"><a href="{{ route('admin.branches.index') }}"><i class="fas fa-abc"></i> <span>Manage Branches</span></a></li>
      <li class="{{ $request->segment(2) == 'departments' ? 'active' : '' }}"><a href="{{ route('admin.departments.index') }}"><i class="fas fa-abc"></i> <span>Manage Departments</span></a></li>
      <li class="{{ $request->segment(2) == 'job_titles' ? 'active' : '' }}"><a href="{{ route('admin.job_titles.index') }}"><i class="fas fa-abc"></i> <span>Manage Job Titles</span></a></li>
      <li class="{{ $request->segment(2) == 'banks' ? 'active' : '' }}"><a href="{{ route('admin.banks.index') }}"><i class="fas fa-abc"></i> <span>Manage Banks</span></a></li>
      <li class="{{ $request->segment(2) == 'employees' ? 'active' : '' }}"><a href="{{ route('admin.employees.index') }}"><i class="fas fa-abc"></i> <span>Manage Employees</span></a></li>
      <li class="{{ $request->segment(2) == 'swdonars' ? 'active' : '' }}"><a href="{{ route('admin.swdonars.index') }}"><i class="fas fa-abc"></i> <span>Manage SW Donars</span></a></li>
      <li class="{{ $request->segment(2) == 'swemployees' ? 'active' : '' }}"><a href="{{ route('admin.swemployees.index') }}"><i class="fas fa-abc"></i> <span>Manage SW Employees</span></a></li>
      <li class="{{ $request->segment(2) == 'swreport' ? 'active' : '' }}"><a href="{{ route('admin.swreport.index') }}"><i class="fas fa-abc"></i> <span>SW Management Report</span></a></li>
      <!-- <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>

          @can('users_manage')
              <li class="treeview {{ ($request->segment(2) == 'permissions' || $request->segment(2) == 'roles' || $request->segment(2) == 'users') ? 'active' : '' }}">
                  <a href="#">
                      <i class="fa fa-users"></i>
                      <span class="title">@lang('global.user-management.title')</span>
                      <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                          <a href="{{ route('admin.permissions.index') }}">
                              {{--<i class="fa fa-briefcase"></i>--}}
                              <span class="title">Permissions</span>
                          </a>
                      </li>
                      <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                          <a href="{{ route('admin.roles.index') }}">
                              {{--<i class="fa fa-briefcase"></i>--}}
                              <span class="title">Roles</span>
                          </a>
                      </li>
                      <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                          <a href="{{ route('admin.users.index') }}">
                              {{--<i class="fa fa-user"></i>--}}
                              <span class="title">Users</span>
                          </a>
                      </li>
                  </ul>
              </li>
            @endcan
        </ul>
      </li> -->
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
