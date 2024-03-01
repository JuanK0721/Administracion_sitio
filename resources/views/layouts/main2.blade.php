
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Piñatas</title>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('/dash3/css/styles.css') }}" rel="stylesheet"/>
        <link href="{{ asset('/bootstrap/bootstrap.min.css')}}" rel="stylesheet" />
                
        <link rel="stylesheet" href="{{ asset('/bootstrap/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css')}}">
        
        <style>
          table{
            box-shadow: 0px 3px 10px 2px #aaa;
          }          
          th{
            background: var(--bs-primary)!important;
            /*background : #031633!important;*/
            color : #ffffff!important;
            border: 2px solid var(--bs-primary);
          }
        </style>
        @yield('style')
    </head>
    <body class="sb-nav-fixed">
 
            <!-- Sidebar-->
            @include('layouts.sidebar')
            <!--fin Sidebar-->

            <!-- Page content wrapper-->
          
                <!-- Top navigation-->
                @include('layouts.header')
                <!--fin Top navigation-->

                <!-- Page content-->             
                <div id="layoutSidenav" style="background: #F6F9FF;">   
                  <div id="layoutSidenav_content" class="container-fluid pe-1">
                      <main>
                          <div class="container-fluid px-4">
                              @yield('contenido')
                          </div>
                      </main>
                  </div>        
                </div>        
                <!--fin Page content-->
    
            <!--fin Page content wrapper-->
             
        <!-- Bootstrap core JS-->
        <script src="{{ asset('/bootstrap/bootstrap.bundle.min.js') }}"></script>

        <!-- Core theme JS-->
        <script src="{{ asset('/dash3/js/scripts.js') }}"></script>

        <!-- JQuery JS-->
        <script src="{{ asset('/bootstrap/jquery-3.7.1.min.js') }}"></script>

        @yield('scripts')
    </body>
</html>
