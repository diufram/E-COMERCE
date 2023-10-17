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
                                            <th>PRODUCTO</th>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO</th>
                                            <th>SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                   
                                    @foreach ($detalles as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{$venta->id}}</td>
                                            <td>{{$venta->user->name}}</td>
                                            <td>{{$venta->pago->nombre}}</td>
                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->cantidad}}</td>
                                            <td>{{$item->precio}}</td>
                                            <td>{{$item->precio * $item->cantidad}} BOB.</td>
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