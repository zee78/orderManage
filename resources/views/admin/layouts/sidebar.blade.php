<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <!-- <li>
                    <a href="{{url('admin')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>
                </li> -->

                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="">Categories</a></li>
                        <li><a href="">Add Categories</a></li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Skills</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="">Skills</a></li>
                        <li><a href="">Add Skills</a></li>
                    </ul>
                </li> -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.orders.index')}}">Orders</a></li>
                        <li><a href="{{route('admin.orders.monthly-orders')}}">Monthly Orders</a></li>
                        <li><a href="{{route('admin.orders.monthly-sale')}}">Monthly Sale</a></li>
                        
                        <li><a href="{{route('admin.orders.create')}}">Create New</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <!-- <li><a href="">Freelancers</a></li> -->
                        <li><a href="{{route('admin.clients-list')}}">Users</a></li>
                        <!-- <li><a href="contacts-profile">Profile</a></li> -->
                        <li><a href="{{route('admin.users.create')}}">Add User</a></li>
                    </ul>
                </li>



               <!--  <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bxs-eraser"></i>
                        <span class="badge badge-pill badge-danger float-right">10</span>
                        <span>Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="form-elements">Form Elements</a></li>
                        <li><a href="form-layouts">Form Layouts</a></li>
                        <li><a href="form-validation">Form Validation</a></li>
                        <li><a href="form-advanced">Form Advanced</a></li>
                        <li><a href="form-editors">Form Editors</a></li>
                        <li><a href="form-uploads">Form File Upload</a></li>
                        <li><a href="form-xeditable">Form Xeditable</a></li>
                        <li><a href="form-repeater">Form Repeater</a></li>
                        <li><a href="form-wizard">Form Wizard</a></li>
                        <li><a href="form-mask">Form Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="tables-basic">Basic Tables</a></li>
                        <li><a href="tables-datatable">Data Tables</a></li>
                        <li><a href="tables-responsive">Responsive Table</a></li>
                        <li><a href="tables-editable">Editable Table</a></li>
                    </ul>
                </li> -->


                <!-- <li>
                    <a href="" class="waves-effect">
                        <i class="bx bx-aperture"></i>
                        <span>Supports</span>
                    </a>
                </li> -->


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End