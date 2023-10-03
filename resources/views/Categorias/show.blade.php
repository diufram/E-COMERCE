<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('categorias.index')}}">Volver a Categorias</a>
    <br>
    <a href="{{route('categorias.edit',$categoria)}}">Editar</a>
    
    <h1>{{$categoria->nombre}}</h1>
</body>
</html>