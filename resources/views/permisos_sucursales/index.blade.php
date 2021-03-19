@extends('adminlte::page')

@section('title', 'Permisos Sucursales')

@section('content_header')
    <h1>Permisos Sucursales</h1>
    <!--@if(session('message'))
        <div class="alert alert-success alert-block">
            <div class="row"> 
            <div class="col-auto align-self-start"> 
                <div class="glyphicon glyphicon-exclamation-sign"></div>
                <i class="fas fa-exclamation"></i>
            </div>
            <div class="col">
            {{ session('message') }}
            </div>
            </div>
            
        </div>
    @endif-->

    @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
@stop


@section('content')
    @include('permisos_sucursales/modalCreate')    
    @include('permisos_sucursales/modalDelete')
    <div class="row p-1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <a href="#" data-toggle="modal" data-target="#modal_crear_permiso"><button class="btn btn-success"><i class="fab fa-cuttlefish fa-1x"></i>&nbsp;Nuevo permiso sucursal</button></a>
        </div>
        
    </div>
    
    <div class="row p-1">
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">            
            
            <div class="table-responsive">
				<table class="table table-sm table-striped table-bordered" id="tblPermisosSucursales">
					<thead class="thead-dark">
						<tr>
							<th scope="col" style="display:none;">ID Permiso</th>
							<th scope="col">Usuario</th>
                            <th scope="col">Sucursal</th> 
                            <th scope="col">Opciones</th>	
						</tr>
					</thead>
					<tbody>
						@foreach($permisos_sucursales as $p)
							<tr>
								<td style="display:none;">{{$p->id}}</td>
                                <td>{{$p->nick}}</td>
                                <td>{{$p->sucursal}}</td>                                                              

                                <td>
                                    
                                    <a href="#" data-toggle="modal" data-target="#modal_eliminar_permiso" data-id_permiso="{{$p->id}}">
                                        <button class="btn btn-square" title="Eliminar"><i class="fas fa-trash-alt fa-1x"></i></button>
                                    </a>
                                    
                                </td>
								
							</tr>
						@endforeach					
					</tbody>
				</table>
			</div>
            
        </div>

    </div>
@endsection

@section('css')
    
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {

            @if(Session::has('message'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true,
                    "timeOut": "2000",
                }
                toastr.success("{{ session('message') }}");
            @endif

            //console.log("hola");
            $('[data-toggle="tooltip"]').tooltip(); 

            var tblClientes = $('#tblPermisosSucursales').DataTable({
                         
                stateSave: true,
                "language": {
                    "sProcessing":     "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ filas",
                    "zeroRecords": "No hay coincidencias",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",
                    "infoFiltered": "(filtrado de _MAX_ total de registros)",
                    "sSearch":         "Buscar:",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    }
                }


            });

            

            $('#modal_eliminar_permiso').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_permiso = button.data('id_permiso')                                                                                     
                
                var modal = $(this)

                modal.find('#del_id_permiso').val(id_permiso)         
               
            });


        });//fin document ready
    
    </script>
@stop