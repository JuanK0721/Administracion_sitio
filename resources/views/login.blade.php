<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="{{ asset('/dash2/css/bootstrap.min.css')}}" rel="stylesheet" />
                
  <link rel="stylesheet" href="{{ asset('/dash2/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css')}}">

  <title>Document</title>
</head>
<body>

<div class="container">

  <div class="row justify-content-center align-items-center vh-100">

      <div class="card col-lg-4 col-md-6 col-sm-12 p-0 align-items-center">         
       
          <div class="card-body text-center">
              <div class="rounded-circle ps-3 pe-3 shadow-sm">                
                  <i class="bi bi-house-gear-fill text-warning p-0" style="font-size: 65px;"></i>
              </div>
              <h5 class="card-title text-warning">Admin</h5>
                                   
          </div>

          <h4 class="card-title">Login</h4>   

          <div class="card-body text-center w-100 pt-0">
              <form action="/login" method="POST">
                  @csrf
                <div class="form-group">
                    
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control text-center" id="email" name="email" placeholder="name@example.com">
                      <label for="email">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="password" class="form-control text-center" id="password" name="password" placeholder="Password" autocomplete="off">
                      <label for="password">Password</label>
                    </div>

                    <button type="submit" class="btn btn-outline-warning "><b>Iniciar Sesion</b></button>

                </div>
              </form> 
          </div>
          
      </div>
        
   </div>

</div>
  
  <!-- Bootstrap core JS-->
  <script src="{{ asset('/dash2/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>

