@extends('adminlte::page')

@section('title', 'Sucursales')

@section('content_header')
    <h1>Sucursales</h1>
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
    @include('sucursal/modalCreate')
    @include('sucursal/modalEdit')
    @include('sucursal/modalDelete')
    <div class="row p-1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <a href="#" data-toggle="modal" data-target="#modal_crear_sucursal"><button class="btn btn-success"><i class="fab fa-cuttlefish fa-1x"></i>&nbsp;Nueva Sucursal</button></a>
        </div>
        
    </div>
    
    <div class="row p-1">
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">            
            
            <div class="table-responsive">
				<table class="table table-sm table-striped table-bordered" id="tblSucursales">
					<thead class="thead-dark">
						<tr>
							<th scope="col">ID Sucursal</th>
							<th scope="col">Sucursal</th>
                            <th scope="col">Calle</th>                            
							<th scope="col">Colonia</th>

                            <th scope="col">Ciudad</th>
                            <th scope="col">Estatus</th>
                            <th scope="col">Opciones</th>	
						</tr>
					</thead>
					<tbody>
						@foreach($sucursales as $s)
							<tr>
								<td>{{$s->id}}</td>
                                <td>{{$s->sucursal}}</td>
                                <td>{{$s->calle}}</td> 
                                <td>{{$s->colonia}}</td> 

                                <td>{{$s->ciudad}}</td>

                                @if($s->estatus==1)
                                <td>Activo</td>
                                @else
                                <td>Inactivo</td>
                                @endif                                                                                         

                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modal_editar_sucursal" data-id_sucursal="{{$s->id}}" data-sucursal="{{$s->sucursal}}" data-calle="{{$s->calle}}" data-colonia="{{$s->colonia}}" data-ciudad="{{$s->ciudad}}" data-estatus="{{$s->cestatus}}">
                                        <button class="btn btn-square" title="Editar"><i class="fas fa-edit fa-1x"></i></button>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#modal_eliminar_sucursal" data-id_sucursal="{{$s->id}}">
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

            var tblSucursales = $('#tblSucursales').DataTable({
                         
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

            $('#modal_editar_sucursal').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_sucursal = button.data('id_sucursal') 
                var sucursal =  button.data('sucursal')      
                var calle = button.data('calle') 
                var colonia = button.data('colonia')
                var ciudad = button.data('ciudad')
                var estatus = button.data('estatus')                                                                                                  
                
                var modal = $(this)

                modal.find('#id_sucursal').val(id_sucursal)          
                modal.find('#edit_sucursal').val(sucursal)

                modal.find('#edit_calle').val(calle)
                modal.find('#edit_colonia').val(colonia)
                modal.find('#edit_ciudad').val(ciudad)
                
                $("#edit_status option[value='"+estatus+"']").attr("selected", true);
                    
                            
            });

            $('#modal_eliminar_sucursal').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_sucursal = button.data('id_sucursal')                                                                                     
                
                var modal = $(this)

                modal.find('#del_id_sucursal').val(id_sucursal)         
               
            });


        });//fin document ready
    
    </script>
@stop