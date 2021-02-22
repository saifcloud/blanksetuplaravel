

    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <!-- <a href="{{ url('admin/dashboard')}}"> -->
                <!--<img src="http://www.wrraptheme.com/templates/hexabit/html/assets/images/icon-dark.svg" alt="HexaBit Logo" class="img-fluid logo">-->
                <!-- <span>Admin -->
                <!--<img {{URL::asset('public/uploads/'.Auth::guard('admin')->user()->image)}}  alt="" />-->
                <!-- </span></a> -->
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
              <!--   <div class="user_div">
                    <img src="{{URL::asset('public/uploads/'.Auth::guard('admin')->user()->image)}}" class="user-photo" alt="User Profile Picture">
                    
                </div> -->
                <!--   <a href="{{ url('admin/dashboard')}}"><img src="{{URL::asset('public/blacklogo.png')}}" alt="Dynamate" class="img-fluid logo" width="60" height="60"></a> -->
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{Auth::guard('admin')->user()->firstname}}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                         <li><a href="{{ url('admin/change-password')}}"><i class="icon-user"></i>Change Password</a></li>
                        <!--<li><a href="{{ url('admin/profile')}}"><i class="icon-user"></i>My Profile</a></li>-->
                       <!--  <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li> -->
                      <!--   <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li> -->
                        <li class="divider"></li>
                        <li><a href="{{ url('admin/logout')}}"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">

                    <li class="{{ $page_title == 'dashboard' ? "active":''}}"><a href="{{ url('admin/dashboard')}}"><span>Dashboard</span></a></li>

                      <!-- <li class="{{ $page_title == 'Notification List' ? "active":''}}"><a href="{{ url('admin/show-all-notification')}}"><span>Notifications</span></a></li> -->


                      <li class="{{ $page_title == 'Category' ? "active":''}}"><a href="{{ url('admin/category')}}">Category</a></li>

                      <li class="{{ $page_title == 'Size' ? "active":''}}"><a href="{{ url('admin/size')}}">Size</a></li>
                      
                      
                      
                      <li class="{{ $page_title == 'Banner' ? "active":''}}"><a href="{{ url('admin/banner')}}">Banner</a></li>


                     <li class="{{ $page_title == 'Products' ? "active":''}}"><a href="{{ url('admin/product-list')}}">Products</a></li>

                     <li class="{{ $page_title == 'Client' ? "active":''}}"><a href="{{ url('admin/client')}}">Clients</a></li>


                    <li class="{{ $page_title == 'Order' || $page_title=='Order Details' ? "active":''}}"><a href="{{ url('admin/order')}}">Orders</a></li>

                     <li class="{{ $page_title == 'Profile' ? "active":''}}"><a href="{{ url('admin/profile-setting')}}">Profile Setting</a></li>
                     
                     <li class="{{ $page_title == 'Website' ? "active":''}}"><a href="{{ url('admin/website-setting')}}">Website Setting</a></li>




                

                   



                   <!--  <li class="{{ $page_title == 'Category' || $page_title == 'Pack' || $page_title == 'Items' ? "active":''}}">
                        <a href="#Maps" class="has-arrow "><span>Investment Plan</span></a>
                        <ul>
                            <li class="{{ $page_title == 'Category' ? "active":''}}"><a href="{{ url('admin/category')}}">Categories</a></li>

                            <li class="{{ $page_title == 'Items' ? "active":''}}"><a href="{{ url('admin/subcategory')}}">Items</a></li>

                            <li class="{{ $page_title == 'Pack' ? "active":''}}"><a href="{{ url('admin/pack')}}">Packs</a></li>                            
                        </ul>
                    </li> -->

                    <!--  <li class="{{ $page_title == 'Setting' ? "active":''}}"><a href="{{ url('admin/setting')}}"><i class="icon-settings"></i><span>Setting</span></a></li> -->


<!-- 
                      <li class="{{ $page_title == 'Social' || $page_title == 'Website' ? "active":''}}">
                        <a href="#Maps"  ><span>Settings</span></a>
                        <ul>
                            <li class="{{ $page_title == 'Social' ? "active":''}}"><a href="{{ url('admin/social')}}">Social links</a></li>
                            
                            <li class="{{ $page_title == 'Mail' ? "active":''}}"><a href="{{ url('admin/mail-setting')}}">Mail Setting</a></li>  

                            <li class="{{ $page_title == 'Website' ? "active":''}}"><a href="{{ url('admin/website-setting')}}">Website Setting</a></li>

                             
                        </ul>
                    </li> -->


                     <!--    <li class="{{ $page_title == 'Transactions' ? "active":''}}"><a href="{{ url('admin/transactions')}}"><span>Transactions</span></a></li>


                      @if(Auth::guard('admin')->user()->role_type==1)
                      <li class="{{ $page_title == 'Sub-Admins' ? "active":''}}"><a href="{{ url('admin/subadmins')}}"><span>Manage Sub-Admin</span></a></li>
                      @endif -->
                </ul>
            </nav>     
        </div>
    </div>
