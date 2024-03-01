@extends('layouts.main2')

@section('contenido')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between pt-1 pb-1">
  <h1 class="h3 mb-0 text-body-secondary">Permisos</h1>
</div>
<!-- fin Page Heading -->

<div class="row">
  <!--Alerta-->
  @if( $message = Session::get('Listo'))
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <h4 class="alert-heading">Exito!</h4>
      <span> {{ $message }} </span>
    </div>
  @endif
  <!--fin Alerta-->

  <div class="col-lg-5 pe-0">
    
    <div class="card mb-3 rounded-0" style="box-shadow: 0px 3px 10px 2px #aaa;">
        <h4 class="card-header bg-primary rounded-0 text-white" id="tituloCrearModificar">Nuevo</h4>

      <form id="formNuevoEditar" action="/admin/permisos" method='POST'>    
        @csrf 
        <span id="metodo"></span>

        <div class="card-body">

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

          <input type="text" id="id" name="id" value="{{ old('id') }}" hidden>

          <div class="form-group" style="margin-top: -2%;">

            <div class="form-floating mb-0">
                <input type="text" class="form-control" id="nombrePermiso" name="nombrePermiso" value="{{ old('nombrePermiso') }}" placeholder="Nombre Permiso" autocomplete="off">
                <label for="nombrePermiso">Nombre Permiso</label>
            </div>

          </div>
        </div>

        <div class="card-footer" style="border-top:1px solid #ddd;">
          <button type="button" onclick="cancelar();" class="btn btn-light text-primary fw-bold rounded-0">Cancelar</button>
          <button type="submit" class="btn btn-primary fw-bold rounded-0 float-end">Guardar</button>
        </div>

      </form>

    </div>

  </div>

  <div class="col-lg-7">
    <div class="table-responsive">
      <table class="table align-middle table-hover">
          <thead style="text-align: center;">      
            <tr>
              <th style="width: 10%;">id</th>              
              <th>Nombres</th>                       
              <th style="width: 11%;padding:0;"><i class="bi bi-wrench-adjustable-circle fs-4 p-0"></i></th>
            </tr>
          </thead>
          <tbody>
              @if( count($permisos) == 0 )
                  <tr> <td colspan="3" class="text-center"> <h5> Sin Datos </h5></td> </tr>
              @else
                  @foreach($permisos as $permiso)
                    <tr style="font-size: 14px;">

                      <td class="text-center">{{ $permiso->id }}</td>
                      <td>{{ $permiso->nombrePermiso }}</td>

                      <td class="text-center p-0" style="width: 17%;">
                        <button type="button" class="btn btn-outline-warning" onclick="editar($(this).parent().parent());">
                          <i class="bi bi-pencil"></i>
                        </button>
          
                        <button type="button" class="btn btn-outline-danger" onclick=" $('#eliminar').attr('action','/admin/permisos/{{ $permiso->id }}');" data-bs-toggle="modal" data-bs-target="#modalEliminar">
                          <i class="bi bi-trash"></i>
                        </button>
                      </td>

                    </tr>   
                  @endforeach               
              @endif

          </tbody>
      </table>
    </div>
  </div>

</div>

<!--modal eliminar-->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Permiso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">
          <h5>¿Desea Eliminar Permiso?</h5>
        </div>
        <div class="modal-footer pb-1 pt-1">
          <button type="button" class="btn btn-light text-primary fw-bold rounded-0" data-bs-dismiss="modal">Cancelar</button>
         
          <form id="eliminar" method="POST">
            @csrf
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger fw-bold rounded-0">Eliminar</button>
          </form>
        </div>
    </div>
  </div>
</div>
<!--fin modal eliminar-->

@endsection

@section('scripts')
<script>
  $('#nombrePermiso').val('');

  function editar(tr){
    let tds = tr.children();

    $('#formNuevoEditar').attr('action','/admin/permisos/'+tds.eq(0).text());
    $("#metodo > input").remove();
    $("#metodo").append('{{method_field("PATCH")}}');   
    $("#tituloCrearModificar").text('Modificar');
    
    $("#id").val(tds.eq(0).text());
    $("#nombrePermiso").val(tds.eq(1).text());
  }

  function cancelar(){
    $('#formNuevoEditar').attr('action','/admin/permisos');
    $("#metodo > input").remove();
    $("#tituloCrearModificar").text('Nuevo');   
    
    $("#id").val();
    $("#nombrePermiso").val('');
  }
</script>
@endsection