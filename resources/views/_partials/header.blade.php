        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><span class="sp1">BSS</span><span class="sp2">TPT</span></a>
            </div>
            <!-- /.navbar-header -->
@if(Auth::check())
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} | {{Auth::user()->company->name}} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    @if(Auth::user()->hasRole('admin'))
                        <li><a href="{{route('user.index')}}"><i class="fa fa-users fa-fw"></i> Manage Users</a>
                        </li>
                    @endif
                        <li><a href="{{url('user/'.Auth::user()->id)}}"><i class="fa fa-user fa-fw"></i> View Profile</a>
                        </li>
<!--                         <li><a href="#"><i class="fa fa-gear fa-fw"></i> DB Backup</a>
                        </li> -->
                        <li class="divider"></li>
                        <li><a href="{{url('auth/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
@endif
            @include('_partials.sidebar')

            
        </nav>