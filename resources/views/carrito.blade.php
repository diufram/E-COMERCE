

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HOME</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('carrito/css/styles.css')}}" rel="stylesheet" />


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
</head>



<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">E-COMERCE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('carrtio.index')}}">Home</a></li>
                    
                </ul>
               
                    <a class="btn btn-outline-dark" href="{{route('ir.a.carrito')}}" >
                        <i  class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">{{count((array) session('carrito'))}}</span>
                    </a>
                
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
    </div>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">CARRITO</h1>
            </div>
        </div>
    </header>

    <section class="py-5">
            
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>PRODUCTO</th>
                                    <th>PRECIO</th>
                                    <th>CANTIDAD</th>
                                    <th>IMAGEN</th>
                                    <th>SUBTOTAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                                
                            
                            <tbody>
                                @if (session('carrito'))
                                    @foreach (session('carrito') as $id => $detalles)
                                        <tr rowId="{{$id}}">
                                            <td>{{$detalles['nombre']}}</td>
                                            <td>{{$detalles['precio']}} BOB</td>
                                            <td>{{$detalles['cantidad']}}</td>
                                            <td>
                                                <img src="{{$detalles['image']}}" width="60" height="80"> 
                                            </td>
                                            <td oninput="calcular()" id="subtotal">
                                                {{$detalles['precio']* $detalles['cantidad']}} BOB
                                            </td>
                                            <td class="actions">
                                                <a class="btn btn-outline-danger btn-sm delete-product"> <i class="material-icons">delete_outline</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>TOTAL
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td id="total"> BOB</td>
                                    </th>

                                </tr>
                                
                            </tfoot>
                            
                            
                        </table>
                    </div>
                </div>
    
</body>

@include('scripts')
<script type="text/javascript">
    $(".delete-product").click(function(e){
        e.preventDefault();

        var ele= $(this);
        if(confirm("Deseas eliminar el producto del carrito")){
            $.ajax({
                url: `{{route('eliminar.producto.carrito')}}`,
                method: "DELETE",
                data :{
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId")
                },
                success: function(response){
                    window.location.reload();
                }
            });
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('carrito/js/scripts.js')}}"></script>

<script>
        document.getElementById('subtotal').onchange=function(e){
            var subtotal=100;
            for(var i = 0; i< 1;i++){
                subtotal+= document.getElementById('subtotal').value;
            }
            document.getElementById("total").value = subtotal;
            $

        }

</script>
</html>