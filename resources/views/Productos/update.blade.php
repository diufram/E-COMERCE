<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 
    
</body>
</html> 






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
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">EDITAR PRODUCTO</h1>
                    </div>

                        <form action="{{route('productos.update',$producto)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                    <input name="nombre" type="text" class="form-control form-control-user" 
                                        value="{{$producto->nombre}}">               
                            </div>

                            <div>
                                <select class="form-control form-control-user" name="talla_id" id="">
                                    <option disabled selected>{{$producto->talla->size}}</option>
                                    @foreach ($tallas as $talla)
                                        <option value="{{$talla->id}}">{{$talla->size}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <br>

                            <div class="form-group">
                                <input name="precio" type="text" class="form-control form-control-user" 
                                    value="{{$producto->precio}}">
                            </div>

                            <div class="form-group">
                                <input name="color" type="text" class="form-control form-control-user" 
                                    value="{{$producto->color}}">
                            </div>

                            <div class="form-group">
                                <input name="cantidad" type="text" class="form-control form-control-user" 
                                    value="{{$producto->cantidad}}">
                            </div>

                                        
                            <select class="form-control form-control-user" name="categoria_id" id="">
                                <option disabled selected> {{$producto->categoria->nombre}}</option>
                                @foreach ($categorias as $categoria)
                                    
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                @endforeach
                            </select>
                            <br>
                            <select class="form-control form-control-user" name="sucursal_id" id="">
                                <option disabled selected>{{$producto->sucursal->nombre}}</option>
                                @foreach ($sucursales as $sucursal)
                                    <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                @endforeach
                            </select>
                            <br>

                            


                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input  type="file" name="files[]" accept="image/*" multiple class="custom-file-input" >
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <br>
                    
                            <button type="submit" class="btn btn-primary btn-user btn-block">ACTUALIZAR</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    @include('cierre')
@include('scripts')

</body>

</html>