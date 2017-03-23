<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="{{URL::to(Helper::admin_slug().'/dashboard')}}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  @if(Auth::user()->hasRole(Config::get('constants.All-privileges')))   
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-users" aria-hidden="true"></i>
                          <span>Agents</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">  
                      <li><a class="" href="{{URL::to(Helper::admin_slug().'/agent')}}"><i class="fa fa-users" aria-hidden="true"></i>Agents List</a></li>
                      <li><a class="" href="{{URL::to(Helper::admin_slug().'/agent/new')}}"><i class="fa fa-plus" aria-hidden="true"></i><span>New Agent</span></a></li>
                      </ul>
                  </li>
                  @endif
                  @if(Auth::user()->hasRole(array('root','agent','administrator')))   
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-list-ol" aria-hidden="true"></i>
                          <span>Orders</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">  
                      <li><a class="" href="{{URL::to(Helper::admin_slug().'/agent/order')}}"><i class="fa fa-list-ol" aria-hidden="true"></i>Orders List</a></li>
                      @if(Auth::user()->hasRole(array('agent')))
                      <li><a class="" href="{{URL::to(Helper::admin_slug().'/agent/order/new')}}"><i class="fa fa-plus" aria-hidden="true"></i>
                      <span>New Order</span></a></li>
                       @endif   
                      </ul>
                  </li>
                  @endif
                  
                 @if(Auth::user()->hasRole('fffff'))    
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="fa fa-user" aria-hidden="true"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{URL::to(Helper::admin_slug().'/user')}}"><i class="fa fa-list" aria-hidden="true"></i>User List</a></li>
                          <li><a class="" href="{{URL::to(Helper::admin_slug().'/user/new')}}"><i class="fa fa-plus" aria-hidden="true"></i><span>New User</span></a></li>
                      </ul>
                  </li>
                  @endif
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
