


<!DOCTYPE html>
<html lang="en">
 @section('title')
    CATEGORIA
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
                        <h1 class="h4 text-gray-900 mb-4">CREAR CATEGORIA</h1>
                    </div>
                
                    <form class="user" action="{{ route('categorias.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                                <input name="nombre" type="text" class="form-control form-control-user" 
                                    placeholder="NOMBRE">               
                        </div>

                        <div class="form-group">
                            <textarea placeholder="DESCRIPCION" class="form-control form-control-user" name="descripcion" rows="5"></textarea>      
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">AGREGAR</button> 
                    
                    </form>

                </div>
            </div>
        </div>
    </div>
    @include('cierre')
@include('scripts')

</body>

</html>