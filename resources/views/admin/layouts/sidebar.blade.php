    <aside class="main-sidebar sidebar-dark-success elevation-4" style="background:rgb(102, 170, 102)">
        <!-- Brand Logo -->
        {{-- <a href="{{ route('dashboard') }}" class="brand-link text-center">
            <img src="{{ asset('dist/img/logo-login-removebg.png') }}" alt="AdminLTE Logo" class="brand-image"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Pest Disease</span>
        </a> --}}
        <div class="text-center">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('dist/img/crop-logo-removebg.png') }}" alt="AdminLTE Logo"
                    class="brand-image text-center" style="opacity: 90; height:120px; width:auto">

            </a>
        </div>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div> --}}

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="{{ Request::is('admin/dashboard') ? 'nav-link active' : 'nav-link' }} acitve nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    @can('view_userList')
                        <li class="nav-item">
                            <a href="{{ route('user.list') }}"
                                class="{{ Request::is('admin/users-list') ? 'nav-link active' : 'nav-link' }} nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users List
                                </p>
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a href="{{ route('home_screen_images.index') }}"
                            class="{{ Request::is('admin/home-screen-images') ? 'nav-link active' : 'nav-link' }} nav-link">
                            <i class="fas fa-home"></i>
                            <p>
                                Home Screen Images
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('plant_types.index') }}"
                            class="{{ Request::is('admin/plant-types') ? 'nav-link active' : 'nav-link' }} nav-link">
                            <i class="nav-icon fas fa-seedling"></i>
                            <p>
                                Plant Types
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('plant_categories.index') }}"
                            class="{{ Request::is('admin/plant-categories') ? 'nav-link active' : 'nav-link' }} nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Plant Categories
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('plant_diaries.index') }}"
                            class="{{ Request::is('admin/plant-diaries') ? 'nav-link active' : 'nav-link' }} nav-link">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Plant Diaries
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('plant_identifications.index') }}"
                            class="{{ Request::is('admin/plant-identifications') ? 'nav-link active' : 'nav-link' }} nav-link">
                            <i class="nav-icon fas fa-microscope"></i>
                            <p>
                                Plant Identifier AI
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('plant_diseases.index') }}"
                            class="{{ Request::is('admin/plant-diseases') ? 'nav-link active' : 'nav-link' }} nav-link">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <p>
                                Field Officer Survey
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
