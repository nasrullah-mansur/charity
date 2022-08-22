<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img
                @if(Auth::guard(GUARD_ADMIN)->user()->image) src="{{Auth::guard(GUARD_ADMIN)->user()->image}}"
                @else src="{{asset('assets/admin/dist/img/user2-160x160.jpg')}}"
                @endif class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="{{route('admin.profile')}}" class="d-block"> @if(Auth::guard('admin')->check())
                    {{Auth::guard('admin')->user()->name  }}
                @endif</a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">

                <a href="{{route('admin.dashboard')}}"
                   class="nav-link {{isset($menu) && $menu == 'Dashboard' ?'active open':''}}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                        <span class="right badge badge-danger"></span>
                    </p>
                </a>
            </li>
            <!--end dashboard  Menu -->

            {{--    GGeneral Settings Start--}}
            <li class="nav-item has-treeview {{isset($menu) && $menu == 'Settings' ?'menu-open':''}}">
                <a href="#"
                    class="nav-link {{isset($menu) && $menu == 'Settings' ?'active':''}} ">
                    <i class="nav-icon fa fa-cog text-info" aria-hidden="true"></i>
                    <p>
                        Settings
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('admin.general.settings')}}"
                            class="nav-link {{isset($page_title) && $page_title == 'General Settings' ?'active open':''}}">
                            <i class="nav-icon fab fa-circle"></i>
                            <p>
                                General Settings
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.seo.settings')}}"
                            class="nav-link {{isset($page_title) && $page_title == 'SEO Settings' ?'active open':''}}">
                            <i class="nav-icon fab fa-circle"></i>
                            <p>
                                SEO Settings
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('admin.contact.us.settings')}}"

                        class="nav-link {{isset($page_title) && $page_title == 'Contact us' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Contact us
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.social.link.settings')}}"

                        class="nav-link {{isset($page_title) && $page_title == 'Social link' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Social link
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.donation.settings')}}"

                        class="nav-link {{isset($page_title) && $page_title == 'Donation' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                            <p>
                               Donation
                            </p>
                        </a>
                    </li>

                </ul>
            </li>
            <!--   General Settings End-->

            <!--   Translation start -->
            <li class="nav-item has-treeview {{isset($menu) && $menu == 'Language' ?'menu-open':''}}">
                <a href="#"
                    class="nav-link {{isset($menu) && $menu == 'Language' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-language"></i>
                    <p>
                        Languages
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('admin.translation.home')}}"
                        class="nav-link {{isset($page_title) && $page_title == 'Home' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                        <p>
                                Home
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.translation.about')}}"
                        class="nav-link {{isset($page_title) && $page_title == 'About' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                        <p>
                                About Us
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.translation.blog')}}"
                        class="nav-link {{isset($page_title) && $page_title == 'Blog' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                        <p>
                                Blog
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.translation.signin_signup')}}"
                        class="nav-link {{isset($page_title) && $page_title == 'Signin Signup' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                        <p>
                                SIgnIn SignUp
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.translation.profile')}}"
                        class="nav-link {{isset($page_title) && $page_title == 'Profile' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                        <p>
                               Profile
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.translation.others')}}"
                        class="nav-link {{isset($page_title) && $page_title == 'Others' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                        <p>
                              Others
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>

                </ul>
            </li>
            <!--   Translation End-->

            {{--    Home Settings Start--}}
            <li class="nav-item has-treeview {{isset($menu) && $menu == 'Home' ?'menu-open':''}}">
                <a href="#"
                    class="nav-link {{isset($menu) && $menu == 'Home' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Home
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('admin.slider')}}"
                        class="nav-link {{isset($page_title) && $page_title == 'Slider' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                        <p>
                                Slider
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>

                     <li class="nav-item">
                        <a href="{{route('admin.charity')}}"
                        class="nav-link {{isset($page_title) && $page_title == 'Charity Features' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                        <p>
                                Charity Feature
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.talent.team')}}"

                           class="nav-link {{isset($page_title) && $page_title == 'Team Member' ?'active open':''}}">
                           <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Team Member
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.donar.feedback')}}"

                           class="nav-link {{isset($page_title) && $page_title == 'Donar Feedback' ?'active open':''}}">
                           <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Donar Feedback
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.partner')}}"
                           class="nav-link {{isset($page_title) && $page_title == 'Partner' ?'active open':''}}">
                           <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Partners
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.page.help.area')}}"
                           class="nav-link {{isset($page_title) && $page_title == 'Help Area' ?'active open':''}}">
                           <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Help Area
                            </p>
                        </a>
                    </li>

                </ul>
            </li>
            <!--   Home Settings End-->
            {{--    About page Start--}}
            <li class="nav-item has-treeview {{isset($menu) && $menu == 'About'  ? 'menu-open': ''}} ">
                <a href="#" class="nav-link {{isset($menu) && $menu == 'About'  ?  'active' : ''}} ">

                    <i class="nav-icon fab fa-accusoft"></i>
                    <p>
                        About
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('admin.page.about_us')}}"

                            class="nav-link {{isset($page_title) && $page_title == 'About Us' ?'active open':''}}">
                            <i class="nav-icon fab fa-circle"></i>
                            <p>
                                About Us
                            </p>
                        </a>
                    </li>

                    <li class="nav-item ">

                        <a href="{{route('admin.page.our.journey')}}"
                            class="nav-link {{isset($page_title) && $page_title == 'Our Journey' ?'active open':''}}">
                            <i class="nav-icon fab fa-circle"></i>
                            <p> Our Journey
                            <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <!--    About page  End-->

            <!--    Campaign Start  -->
            <li class="nav-item has-treeview {{isset($menu) && $menu == 'Campaign'  ? 'menu-open': ''}} ">
                <a href="#" class="nav-link {{isset($menu) && $menu == 'Campaign'  ?  'active' : ''}} ">

                    <i class="nav-icon fas fa-map-marked-alt"></i>
                    <p>
                        Campiagn
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('admin.campaign.approval')}}"

                            class="nav-link {{isset($page_title) && $page_title == 'Under Approval' ?'active open':''}}">
                            <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Under Approval
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.campaign.running')}}"

                            class="nav-link {{isset($page_title) && $page_title == 'Running' ?'active open':''}}">
                            <i class="nav-icon fab fa-circle"></i>
                            <p>
                               Running
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.campaign.completed')}}"

                            class="nav-link {{isset($page_title) && $page_title == 'Completed' ?'active open':''}}">
                            <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Completed
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <!--    Campaign End  -->
            <li class="nav-item has-treeview {{isset($menu) && $menu == 'Transaction' ?'menu-open':''}}">
                <a href="#"
                   class="nav-link {{isset($menu) && $menu == 'Transaction' ?'active':''}} ">
                   <i class="nav-icon fas fa-hand-holding-usd"></i>
                    <p>
                        Transactions
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{route('admin.donations')}}"
                           class="nav-link {{isset($page_title) && $page_title == 'Donation' ?'active open':''}}">
                           <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Donations
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('admin.withdraw')}}"
                           class="nav-link {{isset($page_title) && $page_title == 'Withdraw' ?'active open':''}}">
                           <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Withdraw
                            </p>
                        </a>
                    </li>

                </ul>
            </li>


            <!--start users  Menu -->
            <li class="nav-item has-treeview {{isset($menu) && $menu == 'CRM' ?'menu-open':''}}">
                <a href="#"
                   class="nav-link {{isset($menu) && $menu == 'CRM' ?'active':''}} ">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        CRM
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('admin.subscribers')}}"
                           class="nav-link {{isset($page_title) && $page_title== 'Subscriber' ? 'active open':''}}">
                           <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Subscriber
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.contacts')}}"
                           class="nav-link {{isset($page_title) && $page_title== 'Contact' ? 'active open':''}}">
                           <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Contacts
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.all.users')}}"
                           class="nav-link {{isset($page_title) && $page_title== 'All Users' ? 'active open':''}}">
                           <i class="nav-icon fab fa-circle"></i>
                            <p>
                                All Users
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>


                </ul>
            </li>

            <!--end users  Menu -->


            <!--start Sidebar Menu -->

            <li class="nav-item has-treeview {{isset($menu) && $menu == 'News' ?'menu-open':''}}">
                <a href="#"
                    class="nav-link {{isset($menu) && $menu == 'News' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-newspaper"></i>
                    <p>
                        News
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('admin.blog')}}"
                           class="nav-link {{isset($page_title) && $page_title == 'News' ?'active open':''}}">
                           <i class="nav-icon fab fa-circle"></i>
                           <p>
                                News
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                     <!--start Sidebar Menu -->
                    <li class="nav-item">
                        <a href="{{route('admin.category')}}"
                        class="nav-link {{isset($page_title) && $page_title == 'Category' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Category
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.tag')}}"
                        class="nav-link {{isset($page_title) && $page_title == 'Tag' ?'active open':''}}">
                        <i class="nav-icon fab fa-circle"></i>
                            <p>
                                Tag
                                <span class="right badge badge-danger"></span>
                            </p>
                        </a>
                    </li>
                 </ul>
            </li>
            <!--end Sidebar Menu -->

            <!--end profile Menu -->
            <li class="nav-item">
                <a href="{{route('admin.profile')}}"

                   class="nav-link {{isset($menu) && $menu == 'profile' ?'active open':''}}">
                    <i class="nav-icon fas fa-user-circle"></i>
                    <p>
                        Profile
                    </p>
                </a>
            </li>
            <!--end profile Menu -->
            <li class="nav-item">
                <a href="{{route('admin.logout')}}"
                    class="nav-link {{ isset($pageSettings['page_title']) && $pageSettings['page_title'] == 'logout' ?'active':''}}">
                    <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
