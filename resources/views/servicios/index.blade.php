@extends('layouts.admin')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="/assets/css/Bootstrap-Image-Uploader.css">
    <link rel="stylesheet" href="/assets/css/Navigation-Clean.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-image: url(&quot;assets/img/gradient%20image.jpg&quot;);">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Home service</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">

                <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('servicios.index')}}"><i class="fas fa-screwdriver"></i><span>Servicios</span></a></li>
                    @if(Auth::user()->id_tipo_usuario == 1)
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('admin.index')}}"><i class="fas fa-user-friends"></i><span>Usuarios</span></a></li>
                    @endif

                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content" style="background-color: #ffffff;">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Usuario</span><img class="border rounded-circle img-profile" src="assets/img/1767670.svg"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                        <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                    </li>
                    <li class="nav-item dropdown no-arrow" role="presentation"></li>
                    </ul>
            </div>
            </nav>
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Servicios</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Vista General</p>
                    </div>
                    <div class="card-body">
                        
                    <form>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Estado</label>
                                    <select name="estado" class="form-control" data-toggle="dropdown" aria-expanded="false" id="slcEstado">
                                            <option value="Pendiente" class="dropdown-item form-control" role="presentation">Pendiente</option>
                                            <option value="En proceso" class="dropdown-item form-control" role="presentation">En proceso</option>
                                            <option value="Terminado" class="dropdown-item form-control" role="presentation">Terminado</option>
                                    </select>                                     
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>

                    <form>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Servicio</label>
                                    <select name="servicio" class="form-control" data-toggle="dropdown" aria-expanded="false" id="slcEstado">
                                        <option value="Reparación" class="dropdown-item form-control" role="presentation">reparación</option>
                                        <option value="Instalación" class="dropdown-item form-control" role="presentation">instalación</option>
                                        <option value="Mudanza" class="dropdown-item form-control" role="presentation">mudanza</option>
                                        <option value="Otro" class="dropdown-item form-control" role="presentation">otro</option>
                                    </select>                                     
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>
                        </div>
                </form>


                    
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        
                                        
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Servicio</th>
                                        <th>Imagen</th>
                                        <th>Telefono</th>
                                        <th>Estado</th>
                                        <th>Dirección</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>




                                    @foreach ($servicios as $servicio)
                                    <tr>
                                        
                                        <td>{{$servicio->id}}</td>
                                        <td>{{$servicio->nombre_cliente}}</td>
                                        <td>{{$servicio->servicio}}</td>
                                        <td class="nombre"><img class="rounded-circle mr-2" width="30" height="30" 
                                        src="/storage/assets/img/imgServicios/{{$servicio->foto}}">{{$servicio->nombre}}</td>
                                        <td>{{$servicio->telefono}}</td>
                                        <td>{{$servicio->estado}}</td>
                                        <td>{{$servicio->direccion}}</td>
                                        <td>
                                        <form method="POST" 
                                            action="{{route('servicios.destroy',$servicio->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group" role="group">
                                            <!-- Show -->
                                            <a class="btn btn-info" type="button" href="{{route('servicios.show',$servicio->id)}}">
                                            <i class="fas fa-eye"></i>
                                            </a>

                                            
                                            <!-- Edit -->
                                            <a href="{{route('servicios.edit',$servicio->id)}}" class="btn btn-primary" type="button">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            
                                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$servicio->id}})" 
                                            data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>                                        </form>
                                            
                                            </div>
                                            
                                    </td>                                        
                                    </tr>
                                @endforeach

                                        
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>ID</strong></td>
                                        <td><strong>Cliente</strong></td>
                                        <td><strong>Servicio</strong></td>
                                        <td><strong>Imagen</strong></td>
                                        <td><strong>Telefono</strong></td>
                                        <td><strong>Estado</strong></td>
                                        <td><strong>Dirección</strong></td>
                                        <td><strong>Opciones</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <a class="btn btn-primary" href="{{route('servicios.create')}}" type="button"><i class="fa fa-star"></i>&nbsp;Agregar nuevo servicio</a>
                    </div>
                        

                </div>
            </div>
        </div>

    




        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Home Service © Brand 2020</span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Bootstrap-Image-Uploader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>


    <div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog">
     <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 <p class="text-center">Are You Sure Want To Delete? <span id="spn_nombre"></span></p>
             </div>
             <div class="modal-footer">
             <form action="#" id="deleteForm" method="post">
             @csrf
            @method('DELETE')
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
             </div>
         </div>
     </form>
   </div>
  </div>
</div>
            
        </div>

    @section('scripts')
    <script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')})
    </script>

    <script type="text/javascript">
     function deleteData(id)
     {
         var id = id;
         var url = '{{route("servicios.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
         $("#spn_nombre").text(id);
     }
     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>  
  @endsection
