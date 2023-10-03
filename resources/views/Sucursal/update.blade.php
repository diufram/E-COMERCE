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
                        <h1 class="h4 text-gray-900 mb-4">EDITAR SUCURSAL</h1>
                    </div>
                
                    <form class="user" action="{{ route('sucursals.update',$sucursal)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                                <input name="nombre" type="text" class="form-control form-control-user" 
                                    value="{{$sucursal->nombre}}">               
                        </div>
                        <div class="form-group">
                            <input name="ubicacion" type="text" class="form-control form-control-user" 
                                value="{{$sucursal->ubicacion}}">
                        </div>
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