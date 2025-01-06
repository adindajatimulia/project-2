      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
          <div class="sidebar-user text-center"><img class="img-90 rounded-circle" src="{{asset('template-admin')}}/assets/images/dashboard/1.png" alt="">
            {{-- <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html"> --}}
              <h6 class="mt-3 f-14 f-w-600">{{ucfirst(Auth::user()->name)}}</h6></a>
            <p class="mb-0 font-roboto">{{Auth::user()->getRoleNames()[0]}}</p>
          </div>
          <nav>
            <div class="main-navbar">
              <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  @can('read-dashboard')
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('dashboard')}}"><i data-feather="home"></i><span>Dashboard</span></a></li>
                  @endcan
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('tables')}}"><i data-feather="grid"></i><span>Table</span></a></li>
                  <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="book-open"></i><span>Menu Item</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="{{route('vendors')}}">Vendor</a></li>
                      <li><a href="{{route('categories')}}">Category</a></li>
                      <li><a href="{{route('menuitems')}}">Item</a></li>
                    </ul>
                  </li>

                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('transaction')}}"><i data-feather="file-text"></i><span>Transaction</span></a></li>
                  
                  @canany(['read-users']) 
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('users')}}"><i data-feather="users"></i><span>Manajemen User</span></a></li>
                  {{-- <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>Management Users</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="#">Roles</a></li>
                      <li><a href="{{route('users')}}">User</a></li>
                    </ul>
                  </li> --}}
                  @endcanany

                </ul>
              </div>
            </div>
          </nav>
        </header>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                
                @include('admins.layouts.partials.base')
                
                
              </div>
            </div>
          </div>