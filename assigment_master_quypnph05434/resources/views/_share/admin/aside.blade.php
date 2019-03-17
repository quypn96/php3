<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset(Auth::user()->image) }}" style="max-width: 50px;max-height: 50px;">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route('dashboard') }}"><i class="fa fa-circle-o"></i> Thống kê</a></li>
            
          </ul>
        </li>
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-file-word-o"></i> <span>Quản lý bài viết</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route('post.list') }}"><i class="fa fa-circle-o"></i> Danh sách bài viết</a></li>
            <li class=""><a href="{{ route('post.add') }}"><i class="fa fa-circle-o"></i> Thêm bài viết</a></li>
            
          </ul>
        </li>
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>Quản lý danh mục</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route('cate.list') }}"><i class="fa fa-circle-o"></i> Danh sách danh mục</a></li>
            <li class=""><a href="{{ route('cate.add') }}"><i class="fa fa-circle-o"></i> Thêm danh mục</a></li>
            
          </ul>
        </li>
        @if (Auth::user()->role >=500 )
          <li class=" treeview">
          <a href="#">
            <i class="ion ion-person-add"></i> <span>Quản lý user</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route('user.list') }}"><i class="fa fa-circle-o"></i>Danh sách user</a></li>
            <li class=""><a href="{{ route('user.add') }}"><i class="fa fa-circle-o"></i> Thêm thành viên</a></li>
            
          </ul>
        </li>
        @endif
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>