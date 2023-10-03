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
                        <h1 class="h4 text-gray-900 mb-4">EDITAR TALLA</h1>
                    </div>
                
                    <form class="user" action="{{ route('tallas.update',$talla)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                                <input name="size" type="text" class="form-control form-control-user" 
                                    value="{{$talla->size}}">               
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