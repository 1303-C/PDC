<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../assets/lte/index3.html" class="brand-link">
        <img src="../assets/lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-wrap">{{auth()->user()->name}}</a>
            </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-block btn-info">
                    <div class="ace-icon fa fa-power-off"></div>
                    Logout
                </button>
            </form>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('Procesos_Calidad') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Analisis Indicador
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('percepcion_cliente') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Percepcion Cliente Interno
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('estado_acciones') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Estado Acciones
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('caag') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            CAAG
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
