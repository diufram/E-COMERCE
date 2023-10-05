<!DOCTYPE html>
<html lang="en">
 @section('title')
    PRODUCTOS
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
                    <h1 class="h3 mb-2 text-gray-800">PRODUCTOS</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{route('productos.create')}}" class="btn btn-primary ">
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
                                            <th>TALLA</th>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO</th>
                                            <th>IMAGEN</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    @foreach ($productos as $producto)
                                        
                                    
                                    <tbody>
                                        <tr>
                                            <td>{{$producto->nombre}}</td>
                                            <td>{{$producto->talla->size}}</td>
                                            <td>{{$producto->cantidad}}</td>
                                            <td>{{$producto->precio}}</td>
                                            <td>
                                                <img src="{{$producto->images[0]->url}}" width="90rm" height="150"> 
                                            </td>
                                            
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" class="btn btn-primary" href="{{route('productos.show',$producto->id)}}">DETALLES</a>
                                                    <a type="button" class="btn btn-warning" href="{{route('productos.edit',$producto)}}">EDITAR</a>
                                                    <form  method="POST" action="{{route('productos.delete',$producto)}}">
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