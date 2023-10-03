<!DOCTYPE html>
<html lang="en">
 @section('title')
    CATEGORIAS
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
                    <h1 class="h3 mb-2 text-gray-800">CATEGORIAS</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{route('categorias.create')}}" class="btn btn-primary ">
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
                                            <th>DESCRIPCION</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    @foreach ($categorias as $categoria)
                                        
                                    
                                    <tbody>
                                        <tr>
                                            <td>{{$categoria->nombre}}</td>
                                            <td>{{$categoria->descripcion}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" class="btn btn-primary" href="">DETALLES</a>
                                                    <a type="button" class="btn btn-warning" href="">EDITAR</a>
                                                    <form  method="POST" action="{{route('categorias.delete',$categoria)}}">
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