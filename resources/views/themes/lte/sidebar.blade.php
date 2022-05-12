<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(15,41,58,255)">
    <!-- Brand Logo -->
    <a href="../assets/lte/index3.html" class="brand-link">
        <img src="../assets/lte/dist/img/MandoMini.png" class="brand-image img-circle elevation-2"
            style="height: 40px; width: 40px">
        <span class="brand-text font-weight-light">
            <h4>Mando</h4>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-wrap">{{ auth()->user()->name }}</a>
            </div>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-block btn-primary">
                    <div class="ace-icon fa fa-power-off"></div>
                    Logout
                </button>
            </form>
        </div>
        <nav class="mt-0">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="fa-solid fa-chart-line"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('Procesos_Calidad') }}" class="nav-link  ">
                        <i class="fa-solid fa-laptop-code"></i>
                        <p>
                            Analisis Indicador
                            <span class="right badge badge-danger"></span>
                        </p>
                    </a>
                </li>

                <li class="active">
                    <a href="{{ route('percepcion_cliente') }}" class="nav-link ">
                        <i class="fa-solid fa-building-user"></i>
                        <p>
                            Percepcion Cliente Interno
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('estado_acciones') }}" class="nav-link">
                        <i class="fa-solid fa-business-time"></i>
                        <p>
                            Estado Acciones
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="active ">
                    <a href="{{ route('caag') }}" class="nav-link">
                        <abbr title="Cumplimiento Actividades Asignadas Por Gerencia">
                            <i class="fa-solid fa-clipboard-list"></i>
                            <p>
                                CAAG
                                <span class="badge badge-info right"></span>
                            </p>
                        </abbr>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('ccgr') }}" class="nav-link">
                        <abbr title="Cumplimiento Compromisos Gestion Del Riesgo">
                            <i class="fa-solid fa-list-check"></i>
                            <p>
                                CCGR
                                <span class="badge badge-info right"></span>
                            </p>
                        </abbr>

                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
