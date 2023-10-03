
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
                
                @include('table')



            </div>
        </div>
    </div>
    @include('cierre')
@include('scripts')

</body>

</html>