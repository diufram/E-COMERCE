<h1>DASHBOARD</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('cierre.Sesion')}}" method="POST">
        @csrf
        <button type="submit">CIERRE SESION</button>
    </form>
    
</body>
</html>