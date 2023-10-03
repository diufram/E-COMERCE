<!DOCTYPE html>
<html lang="en">
 @section('title')
    TALLAS
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
                    <h1 class="h3 mb-2 text-gray-800">TALLAS</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{route('tallas.create')}}" class="btn btn-primary ">
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
                                            <th>ID</th>
                                            <th>TAMAÑO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    @foreach ($tallas as $talla)
                                        
                                    
                                    <tbody>
                                        <tr>
                                            <td>{{$talla->id}}</td>
                                            <td>{{$talla->size}}</td>
                                            
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" class="btn btn-primary" href="">DETALLES</a>
                                                    <a type="button" class="btn btn-warning" href="{{route('tallas.edit',$talla)}}">EDITAR</a>

                                                    <form  method="POST" action="{{route('tallas.delete',$talla)}}">
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
                                {{$tallas->render()}}
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