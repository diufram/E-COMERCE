<!DOCTYPE html>
<html lang="en">
 @section('title')
    SUCURSALES
 @endsection

@include('head')
<body id="page-top">
    <div id="wrapper">
        @include('sidebar')    
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('topbar')
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">SUCURSALES</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{route('sucursals.create')}}" class="btn btn-primary ">
                                <span class="icon text-white-50">
                                </span>
                                <span class="text">AGREGAR</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NOMBRE</th>
                                            <th>UBICACION</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    @foreach ($sucursales as $sucursal)
                                        
                                    
                                    <tbody>
                                        <tr>
                                            <td>{{$sucursal->nombre}}</td>
                                            <td>{{$sucursal->ubicacion}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" class="btn btn-primary" href="">DETALLE</a>
                                                    <a type="button" class="btn btn-warning" href="{{route('sucursals.edit',$sucursal)}}">EDITAR</a>
                                                    <form  method="POST" action="{{route('sucursals.delete',$sucursal)}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    
                                                        <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                
                </div>


            </div>
        </div>
    </div>
    @include('cierre')
@include('scripts')

</body>

</html>