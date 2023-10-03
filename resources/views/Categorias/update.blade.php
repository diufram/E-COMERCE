<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>EDITAR CATEGORIA</h1>
    
    <form action="{{route('categorias.update',$categoria)}}" method="POST">
        @csrf
        
        @method('put')

        <label>
            <br>
            Nombre:
            <input type="text" name ="nombre" value="{{$categoria->nombre}}">
        </label>
        <label>
            <br>
            Descripcion:
            <textarea name="descripcion" rows="5" value="">{{$categoria->descripcion}}</textarea>
        </label>
        <br>
        <button type="submit">Actualizar Formulario</button>
    </form>
</body>
</html>