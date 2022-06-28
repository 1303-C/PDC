 <nav class="navbar navbar-expand navbar-black navbar-dark m-0" style="background-color: rgb(15,41,58,255)">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="{{ route('Procesos_Calidad') }}"
                 class="nav-link {{ Route::is('Procesos_Calidad') ? 'active' : '' }}">Indicadores</a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="{{ route('Procesos_Calidad_crear') }}"
                 class="nav-link {{ Route::is('Procesos_Calidad_crear') ? 'active' : '' }}">Nuevo Indicador</a>
         </li>
     </ul>
     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <li class="nav-item">
             <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                 <i class="fas fa-expand-arrows-alt"></i>
             </a>
         </li>
     </ul>
 </nav>
