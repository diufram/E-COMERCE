<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('categorias.create')}}">Crear Categoria</a>
    <ul>
        @foreach ($categorias as $categoria)
        <li>
            <a href="{{route('categorias.show',$categoria->id)}}">{{$categoria->id}} {{$categoria->nombre}}</a>    
        </li>        
        @endforeach
    </ul>
     {{ $categorias->links() }}
</body>
</html> 