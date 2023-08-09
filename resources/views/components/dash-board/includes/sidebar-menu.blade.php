<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    الفواتير
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info mr-3 right">6</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.invoices.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>قائمه الفواتير</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>الفواتير المدفوعه</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/boxed.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>الفواتير الغير مدفوعه</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>الفواتير المدفوعه جزئيا</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    التقارير
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/charts/chartjs.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>ChartJS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/charts/flot.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Flot</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/charts/inline.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inline</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/charts/uplot.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>uPlot</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    المستخدمين
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/UI/general.html" class="nav-link">
                        <i class="nav-icon fas fa-users "></i>
                        <p>قائمه المستخدمين </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/UI/icons.html" class="nav-link">
                        <i class="far fa-file nav-icon"></i>
                        <p>قائمه الصلاحيات</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    الاقسام
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>اضافه قسم </p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Simple Link
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
