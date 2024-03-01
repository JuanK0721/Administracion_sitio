@extends('layouts.main2')

@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between pt-1 pb-1">
  <h1 class="h3 mb-0 text-body-secondary">Usuarios</h1>
  <a href="javascript:void(0)" class="btn btn-primary btn-md rounded-0 fw-bold" data-bs-toggle="modal" data-bs-target="#modalNuevoEditar" onclick="nuevoUsuario();">
    Nuevo <i class="bi bi-person-plus-fill"></i>
  </a>
</div>
<!-- fin Page Heading -->

<div class='row'>
  <!--Alerta-->
  @if( $message = Session::get('Listo'))
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <h4 class="alert-heading">Exito!</h4>
      <span> {{ $message }} </span>
    </div>
  @endif
  <!--fin Alerta-->

  <div class="table-responsive">
    <table class="table align-middle table-hover mt-1">
        <thead style="text-align: center;">      
          <tr>
            <th>id</th>
            <th>foto</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Login</th>
            <th>Password</th>            
            <th style="width: 11%;padding:0;"><i class="bi bi-wrench-adjustable-circle fs-4 p-0"></i></th>
          </tr>
        </thead>
        <tbody>
            @if( count($usuarios) == 0 )
            <tr> <td colspan="8" class="text-center"> <h5> Sin Datos </h5></td> </tr>
            @else
                @foreach($usuarios as $usuario)
                    <tr style="font-size: 14px;">
                      <td>{{ $usuario->id }}</td>
                      <td class="text-center p-0">
                          @if($usuario->foto!='(NULL)')                
                              <img src="{{asset('storage').'/'.$usuario->foto}}" class="card-img-top rounded-circle" style="height: 50px;" alt="">
                          @endif
                      </td>
                      <td>{{ $usuario->nombres }}</td>
                      <td>{{ $usuario->apellidos }}</td>
                      <td>{{ $usuario->email }}</td>
                      <td>{{ $usuario->login }}</td>
                      <td class="text-break">{{ $usuario->password }}</td>            

                      <td class="text-center p-0">
                        <button type="button" class="btn btn-outline-warning" onclick="editarUsuario($(this).parent().parent())">
                          <i class="bi bi-pencil"></i>
                        </button>

                        <button type="button" class="btn btn-outline-danger" onclick="$('.btnModalEliminar').data('idForm','{{$usuario->id}}')" data-bs-toggle="modal" data-bs-target="#modalEliminar">
                          <i class="bi bi-trash"></i>
                        </button>
                        <form action='{{url('/admin/usuarios/'.$usuario->id)}}' method="POST" id='formElimUsu_{{$usuario->id}}'>
                          @csrf
                          {{method_field('DELETE')}}
                          <!--<input type="text" name="id" value="{{$usuario->id}}" hidden>
                          
                          <input type="hidden" name="_method" value="DELETE" >-->
                        </form>
                      </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
  </div>
</div>

<!--modal nuevo editar Usuario-->
<div class="modal fade" id="modalNuevoEditar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content pb-0 rounded-0">
      
      <div class="modal-header">
        <h5 class="modal-title"><span id="tituloModal">Crear</span> Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>

      <form id="formNuevoEditar" method='POST' enctype="multipart/form-data">
        @csrf 
        <span id="metodo"></span>

        <div class="modal-body pb-2">
          <!--Alerta-->
          @if( $message = Session::get('ErrorInsert'))
            <div class="alert alert-dismissible alert-danger">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <h4 class="alert-heading">{{$message}}!</h4>
              <ul>
                @foreach( $errors->all() as $error)
                    <li class="text-white">{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <!--fin Alerta-->         

          <div class="form-group" style="margin-top: -2%;">
            <input type="text" id="id" name="id" value="{{ old('id') }}" hidden>

            <div class="row">
              <!--Cargar fotos-->
              <div class="col-lg-4">
                <div class="card col-lg-12 rounded-circle bg-primary" style="height: 120px;">
                  
                    <img id="fotoCargada" name="fotoCargada" src="" class="card-img-top rounded-circle" style="display:none;height: 120px;" alt="...">
                    <input type="text" id="inpFoto" name="inpFoto" value="{{ old('inpFoto') }}" hidden>
                    
                    <span id="spanFoto">
                      <input id="foto" name="foto" class="w-100 h-100 position-absolute opacity-0" onchange="mostrarFoto();" type="file" multiple>
                      <label class="ps-4 text-white fw-bold" style="margin-top: 35%;">Cragar Foto</label>
                    </span>
                    
                </div>
              </div>
              <!--fin Cargar fotos-->   

              <div class="col-lg-8 ps-1">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres') }}" placeholder="Nombre" autocomplete="off">
                  <label for="nombres">Nombres</label>
                </div>

                <div class="form-floating">
                  <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" placeholder="Apellidos" autocomplete="off">
                  <label for="apellidos">Apellidos</label>
                </div>
              </div>
            </div>

            <div class="form-floating mb-1">
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off">
              <label for="email">Email</label>
            </div>
            <div class="form-floating mb-1">
              <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}" placeholder="Login" autocomplete="off">
              <label for="login">Login</label>
            </div>
            <div class="form-floating mb-1">
              <input type="password" class="form-control" id="Password" name="password" placeholder="Password" autocomplete="off">
              <label for="Password">Password</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" id="Password2" name="confirmar_password" placeholder="Confirmar Password" autocomplete="off">
              <label for="Password2">Confirmar Password</label>
            </div>
          </div>
            
        </div>
        
        <div class="modal-footer pb-1 pt-1">        
          <button type="button" class="btn btn-light text-primary fw-bold rounded-0" data-bs-dismiss="modal">Cancelar</button>
          <button id="btnCreaModifica" type="submit" class="btn btn-primary fw-bold rounded-0">Crear</button>
        </div>

      </form>
        
    </div>
  </div>
</div>
<!--fin modal nuevo editar Usuario-->

<!--modal eliminar Usuario-->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">
          <h5>¿Desea Eliminar el Usuario?</h5>
        </div>
        <div class="modal-footer pb-1 pt-1">
          <button type="button" class="btn btn-light text-primary fw-bold rounded-0" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger btnModalEliminar fw-bold rounded-0" data-idForm="0">Eliminar</button>
        </div>
    </div>
  </div>
</div>
<!--fin modal eliminar Usuario-->
@endsection

@section('scripts')
<script>
$( function() {
    @if( $message = Session::get('ErrorInsert'))      
        //aciones de ejecucion de errores al actualizar//
        @if($message === 'Error de Actualizacion')
            $("#spanFoto").hide();
            $("#fotoCargada").show();
            $('#tituloModal').text('Modificar');
            $('#btnCreaModifica').text('Modificar');
            $('#formNuevoEditar').attr('action','/admin/usuarios/'+$("#id").val());
            $("#formNuevoEditar").append('{{method_field("PATCH")}}');

            setTimeout(function(){
                document.getElementById("fotoCargada").src = $("#inpFoto").val();           
            }, 150);   
        @endif
        //fin aciones de ejecucion de errores al actualizar//
        $('#tituloModal').text('Crear');
        $('#btnCreaModifica').text('Crear');
        $('#formNuevoEditar').attr('action','/admin/usuarios');        
        $('#metodo > input[name=_method]').remove();
        $("#modalNuevoEditar").modal("show");
    @endif
});

function mostrarFoto(){
  $("#spanFoto").hide();
  $("#fotoCargada").show();
  
    let archivo = document.getElementById("foto").files[0];
    let reader = new FileReader();
    if (archivo) {
      reader.readAsDataURL(archivo );
      reader.onloadend = function () {
        document.getElementById("fotoCargada").src = reader.result;
      }
    }
}
function nuevoUsuario(){
    $('#tituloModal').text('Crear');
    $('#btnCreaModifica').text('Crear');
    $('#formNuevoEditar').attr('action','/admin/usuarios');
    $('#metodo > input[name=_method]').remove();
    /*$("#Password").parent().show();
    $("#Password2").parent().show();*/
    blanco();
}
function editarUsuario(tr){
  let tds = tr.children();
  $('#tituloModal').text('Modificar');
  $('#btnCreaModifica').text('Modificar');

    $('#formNuevoEditar').attr('action','/admin/usuarios/'+tds.eq(0).text());
    $("#metodo").append('{{method_field("PATCH")}}');

    let imagen = tr.find('tds:eq(1) img').attr('src');

    if(typeof imagen === 'undefined'){
      document.getElementById("fotoCargada").src = '';
      $("#inpFoto").val('');
      $("#spanFoto").show();
      $("#fotoCargada").hide();
    }else{
      document.getElementById("fotoCargada").src = imagen;
      $("#inpFoto").val(imagen);
      $("#spanFoto").hide();
      $("#fotoCargada").show();
    }

    $("#id").val(tds.eq(0).text());
    $("#nombres").val(tds.eq(2).text());
    $("#apellidos").val(tds.eq(3).text());
    $("#email").val(tds.eq(4).text());
    $("#login").val(tds.eq(5).text());
    /*$("#Password").parent().hide();
    $("#Password2").parent().hide();*/

    $("#modalNuevoEditar").modal("show");
} 
$('.btnModalEliminar').click(function(){
    $('#formElimUsu_'+$(this).data('idForm')).submit();
});
function blanco(){
    $("#id").val('');
    $("#nombres").val('');
    $("#apellidos").val('');
    $("#email").val('');
    $("#login").val('');
    $("#Password").val('');
    $("#Password2").val('');
}
</script>
@endsection