<!DOCTYPE html>
<html lang="en">
 @section('title')
    HOME
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
                    <h1 class="h3 mb-2 text-gray-800">ventas</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>USUARIO</th>
                                            <th>TIPO DE PAGO</th>
                                            <th>TOTAL</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    @foreach ($ventas as $venta)
                                        
                                    
                                    <tbody>
                                        <tr>
                                            <td>{{$venta->id}}</td>
                                            <td>{{$venta->user->name}}</td>
                                            <td>{{$venta->pago->nombre}}</td>
                                            <td>{{$venta->total}} BOB.</td>

                                            
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" class="btn btn-primary" href="{{route('ventas.show',$venta->id)}}">DETALLES</a>
                                                    <form  method="POST" action="{{route('ventas.delete',$venta)}}">
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
    </div>
    @include('cierre')
@include('scripts')

</body>

</html>