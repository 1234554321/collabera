  <?php  if( Auth::check() ){ $userid = Auth::user()->id ; $userrolid = Auth::user()->role_id ;}else{ $userid = "";$userrolid =""; } ?>
    <header class="header dark-bg">
            <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>
            <!--logo start-->
            <a href="{{URL::to(Helper::admin_slug().'/dashboard')}}" class="logo">Admin <span class="lite">Panel</span></a>
            <!--logo end-->
            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <!--  search form end -->                
            </div>
            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- task notificatoin start -->
                    <!-- task notificatoin end -->
                    <!-- inbox notificatoin start-->
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                               {!!HTML::image('img/avatar1_small.png')!!}
                            </span>
                            @if( Auth::check() )
                            <span class="username">{{ Auth::user()->name }}</span>
                            @else
                            <span class="username">Admin</span>
                            @endif
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <?php if($userrolid !="" && $userrolid !=6){ ?>
                            <li class="eborder-top">
                                <a href="{{URL::to(Helper::admin_slug().'/profile')}}"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <?php } ?>
                            @if(Auth::user()->hasRole(array('agent')))
                            <li class="eborder-top">
                                <a href="{{URL::to(Helper::admin_slug().'/agent/edit',array($userid))}}"><i class="icon_profile"></i> My Profile</a>
                            </li>
                             @endif
                            <li>
                                <a href="{{ url('/auth/logout') }}"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->