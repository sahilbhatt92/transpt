<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                @if(Auth::check())
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('master'))
                        <li class="active">
                            <a href="#"><i class="glyphicon glyphicon-info-sign"></i> Master<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('branch.index')}}"><i class="fa fa-chevron-left"></i> Branch</a>
                                </li>
                                <li>
                                    <a href="{{route('party.index')}}"><i class="fa fa-chevron-left"></i> Party</a>
                                </li>
                                <li>
                                    <a href="{{route('driver.index')}}"><i class="fa fa-chevron-left"></i> Driver</a>
                                </li>
                                <li>
                                    <a href="{{route('truck.index')}}"><i class="fa fa-chevron-left"></i> Truck</a>
                                </li>
                                @if(Auth::user()->hasRole('admin'))
                                <li>
                                     <a href="#">Issue Books <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{route('issuegr.index')}}"><i class="fa fa-chevron-left"></i> Issue G.R.</a>
                                        </li>
                                        <li>
                                            <a href="{{route('issuechallan.index')}}"><i class="fa fa-chevron-left"></i> Issue Challan</a>
                                        </li>
                                        <li>
                                            <a href="{{route('issuebill.index')}}"><i class="fa fa-chevron-left"></i> Issue Bill</a>
                                        </li>                                        
                                        <li>
                                            <a href="{{route('issuevoucher.index')}}"><i class="fa fa-chevron-left"></i> Issue Voucher</a>
                                        </li>
                                        <li>
                                            <a href="{{route('issueloadingslip.index')}}"><i class="fa fa-chevron-left"></i> Issue Loading Slip</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Location <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{route('station.index')}}"><i class="fa fa-chevron-left"></i> Station</a>
                                        </li>
                                        <li>
                                            <a href="{{route('district.index')}}"><i class="fa fa-chevron-left"></i> District</a>
                                        </li>
                                        <li>
                                            <a href="{{route('state.index')}}"><i class="fa fa-chevron-left"></i> State</a>
                                        </li>                                        
                                    </ul>
                                </li>
                                @endif
                                <li>
                                    <a href="{{route('generalhead.index')}}"><i class="fa fa-chevron-left"></i> General Head</a>
                                </li>
                                <li>
                                    <a href="{{route('brand.index')}}"><i class="fa fa-chevron-left"></i> Brand</a>
                                </li>
                                <li>
                                    <a href="{{route('product.index')}}"><i class="fa fa-chevron-left"></i> Product</a>
                                </li>
                                <li>
                                    <a href="{{route('productdetail.index')}}"><i class="fa fa-chevron-left"></i> Product Detail</a>
                                </li>
                                <li>
                                    <a href="{{route('grstatus.index')}}"><i class="fa fa-chevron-left"></i> GR Status</a>
                                </li>
                                <li>
                                    <a href="{{route('freightprice.index')}}"><i class="fa fa-chevron-left"></i> Freight Price</a>
                                </li>
                                <li>
                                    <a href="{{route('productregistration.index')}}"><i class="fa fa-chevron-left"></i> Product Registration</a>
                                </li>
                                <li>
                                    <a href="{{route('godown.index')}}"><i class="fa fa-chevron-left"></i> Godown</a>
                                </li>
                                <li>
                                    <a href="{{route('invoice.index')}}"><i class="fa fa-chevron-left"></i> Invoice</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('transaction'))
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-info-sign"></i> Transaction<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('gr')}}"><i class="fa fa-chevron-left"></i> G.R. &amp; POD</a>
                                </li>
                                <li>
                                    <a href="{{url('challan')}}"><i class="fa fa-chevron-left"></i> Challan</a>
                                </li>
                                <li>
                                    <a href="{{url('bill')}}"><i class="fa fa-chevron-left"></i> Bill</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('accounts'))
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-info-sign"></i> Accounts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('account.index')}}"><i class="fa fa-chevron-left"></i> Manage Account</a>
                                </li>                                        
                                <li>
                                    <a href="{{url('vourhcer')}}"><i class="fa fa-chevron-left"></i> Manage Vouchers</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('reports'))
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-info-sign"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('account')}}"><i class="fa fa-chevron-left"></i> Master Report</a>
                                </li>
                                <li>
                                    <a href="{{url('vourhcer')}}"><i class="fa fa-chevron-left"></i> Transaction Report</a>
                                </li>
                                <li>
                                    <a href="{{url('vourhcer')}}"><i class="fa fa-chevron-left"></i> Pending Report</a>
                                </li>
                                <li>
                                    <a href="{{url('vourhcer')}}"><i class="fa fa-chevron-left"></i> Account Report</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif
                        <!-- <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li> -->
<!--                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                        </li>
 -->
 <!--                         <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                        </li>
  -->
                     </ul>
                </div>
            </div>
 