<nav class="sb-topnav navbar navbar-expand-lg bg-warning p-0">
   
  <div class="container-fluid ps-0 pe-0 p-0" style="margin-top: 1px;margin-bottom: 1px;">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3 text-white" href="#">
          <span> <img src="{{ asset('pinata.png')}}" width="40"></span>
          Piñatas
          <span id="sidebarToggle" style="float: right;padding-top:2%;"><i class="bi bi-list text-white"></i></span>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      </a>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
          <ul class="navbar-nav ms-auto mt-2 mt-lg-0 w-100">
              <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
          </ul>

          <span class="navbar-text dropdown pe-1" >
                <a class="nav-link dropdown-toggle p-0 text-white fs-5 fw-bold" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person-circle fs-3 p-0"></i> &nbsp;{{ Auth::user()->login }}
                </a>

                <div class="dropdown-menu dropdown-menu-end me-1" style="margin-top: -10px;" aria-labelledby="navbarDropdown">
                    <form action="/logout" method="POST" id="logout">
                      @csrf                                            
                      <a class="dropdown-item" href="javascript:void(0)" onclick="$('#logout').submit();">Logout</a>
                    </form>                      
                    
                    <div class="dropdown-divider"></div>
                    
                </div>            
          </span>

      </div>

  </div>
</nav>