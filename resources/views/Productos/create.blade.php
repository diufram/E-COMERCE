<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .img-container {
        text-align: center;
      }
    </style>
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
                        <h1 class="h4 text-gray-900 mb-4">CREAR PRODUCTO</h1>
                    </div>

                        <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                    <input name="nombre" type="text" class="form-control form-control-user" 
                                        placeholder="NOMBRE">               
                            </div>

                            <div>
                                <select class="form-control form-control-user" name="talla_id" id="">
                                    <option disabled selected> SELECCIONA UNA TALLA</option>
                                    @foreach ($tallas as $talla)
                                        <option value="{{$talla->id}}">{{$talla->size}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <br>

                            <div class="form-group">
                                <input name="precio" type="text" class="form-control form-control-user" 
                                    placeholder="PRECIO">
                            </div>

                            <div class="form-group">
                                <input name="color" type="text" class="form-control form-control-user" 
                                    placeholder="COLOR">
                            </div>

                            <div class="form-group">
                                <input name="cantidad" type="text" class="form-control form-control-user" 
                                    placeholder="CANTIDAD">
                            </div>

                                        
                            <select class="form-control form-control-user" name="categoria_id" id="">
                                <option disabled selected> SELECCIONA UNA CATEGORIA</option>
                                @foreach ($categorias as $categoria)
                                    
                                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                @endforeach
                            </select>
                            <br>
                            <select class="form-control form-control-user" name="sucursal_id" id="">
                                <option disabled selected> SELECCIONA UNA SUCURSAL</option>
                                @foreach ($sucursales as $sucursal)
                                    <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                @endforeach
                            </select>
                            <br>                         

                            <div  class="input-group">
                                <div class="custom-file">
                                  <input  id="files" type="file" name="files[]" accept="image/*" multiple class="custom-file-input" >

                                  
                                  <label class="custom-file-label" >SELECCIONAR IMAGENES</label>
                                </div>
                                    
                                
                            </div>
                            <br>
                            <div  id="preview">
                            </div>
                            <br>
                    
                            <button type="submit" class="btn btn-primary btn-user btn-block">AGREGAR</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    @include('cierre')
@include('scripts')

<script>
    document.getElementById('files').onchange=function(e){
        for(var i =0; i< files.files.length;i++){

            let reader = new FileReader();
            reader.readAsDataURL(e.target.files[i]);
            reader.onload=function(){
            let preview=document.getElementById('preview');
            imagen= document.createElement('img');
            imagen.src=reader.result;
            imagen.height= "100";
            imagen.width="100";
            //espacio = document.createElement('br');
            preview.append(imagen);
            //preview.append(espacio);
        }
        }
        
    }

</script>
</body>

</html>