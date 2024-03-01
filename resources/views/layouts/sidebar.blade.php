<style> 
:root{
  --color-bg-focus : #0D6EFD!important;
  --color-font : #fd7e14!important;
}
  /*#sidebar-wrapper  > div > a.list-group-item-action:focus{ 
      background-color: var(--bs-primary)!important;
      color: var(--bs-white)!important;
      font-weight: bold;
  }
  #sidebar-wrapper  > div > ul > li > a.list-group-item-action:focus{ 
      background-color: var(--bs-primary) !important;
      color: var(--bs-white) !important;
      font-weight: bold;
  } */
  #layoutSidenav_nav{ background-color: var(--bs-light-bg-subtle)!important; }
  #divGr > a.list-group-item-action{ 
      background-color: var(--bs-light-bg-subtle)!important;
      color: var(--color-font)!important;
      -webkit-text-stroke-width: 0.5px;
      -webkit-text-stroke-color: #CA6510;
      font-weight: bold;
      
  }
  #divGr > a.list-group-item-action:hover{ 
      background-color: var(--bs-warning)!important;
      color: var(--bs-white)!important;
      -webkit-text-stroke-width: 0px;
      font-weight: bold;
  }
  #divGr > a.list-group-item-action:focus{ 
      background-color: var(--bs-warning)!important;
      color: var(--bs-white)!important;
      font-weight: bold;
  }
  #divGr > ul > li > a.list-group-item-action:focus{
      background-color: var(--bs-warning)!important;
      color: var(--bs-white) !important;
      font-weight: bold;
  }
  /*.nav-pills li a:hover{
      background-color: var(--bs-primary);
      font-weight: bold;
  }*/
</style>

<!--<div class="border-end bg-light" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light "><i class="bi bi-gear"></i> Administrador</div>

    <div class="list-group list-group-flush" id='divGr'>
        <a href="/admin/usuarios" class="list-group-item list-group-item-action list-group-item-light p-3" >Usuarios</a>
        <a href="/admin/roles" class="list-group-item list-group-item-action list-group-item-light p-3">Roles</a>
        <a href="/admin/permisos" class="list-group-item list-group-item-action list-group-item-light p-3">Permisos</a>
        <a href="/admin/menus" class="list-group-item list-group-item-action list-group-item-light p-3">Menu</a>

        <a href="#sidermenu" data-bs-toggle="collapse" class="list-group-item list-group-item-action list-group-item-light p-3">Admin</a>
        
        <ul class="nav collapse ms-0 flex-column w-100" id="sidermenu">                  
            <li class="list-group-item w-100 p-0 ps-2  bg-primary">
              <a class="nav-link list-group-item list-group-item-action list-group-item-light p-3" href="#" aria-current="page">Admin</a>
            </li>
            <li class="list-group-item w-100 p-0 ps-2  bg-primary">
              <a class="nav-link list-group-item list-group-item-action list-group-item-light p-3" href="#" aria-current="page">item</a>
            </li>
        </ul>
    </div>

</div> -->

<div id="layoutSidenav">
  <div id="layoutSidenav_nav" class="shadow">

    <nav class="sb-sidenav accordion sb-sidenav pe-1 ps-1" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="list-group list-group-flush" id='divGr'>
                <a href="/admin/usuarios" class="list-group-item list-group-item-action p-3">Usuarios</a>
                <a href="/admin/roles" class="list-group-item list-group-item-action p-3">Roles</a>
                <a href="/admin/permisos" class="list-group-item list-group-item-action p-3">Permisos</a>
                <a href="/admin/menus" class="list-group-item list-group-item-action p-3">Menu</a>
        
                <a href="#sidermenu" data-bs-toggle="collapse" class="list-group-item list-group-item-action p-3">Admin <i class="bi bi-caret-down float-end"></i></a>
                
                <ul class="nav collapse ms-0 flex-column w-100" id="sidermenu">                  
                    <li class="list-group-item w-100 p-0 ps-2  bg-warning">
                      <a class="nav-link list-group-item list-group-item-action list-group-item-light p-3" href="#" aria-current="page">Admin</a>
                    </li>
                    <li class="list-group-item w-100 p-0 ps-2  bg-warning">
                      <a class="nav-link list-group-item list-group-item-action list-group-item-light p-3" href="#" aria-current="page">item</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  </div>
</div>
