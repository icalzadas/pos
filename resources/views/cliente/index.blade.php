@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
    @if(session('message'))
        <div class="alert alert-success alert-block">
            <div class="row"> <!-- add no-gutters to make it narrower -->
            <div class="col-auto align-self-start"> <!-- or align-self-center -->
                <div class="glyphicon glyphicon-exclamation-sign"></div>
                <i class="fas fa-exclamation"></i>
            </div>
            <div class="col">
            {{ session('message') }}
            </div>
            </div>
            
        </div>
    @endif

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
    @include('cliente/modalCreate')
    @include('cliente/modalEdit')
    @include('cliente/modalDelete')
    <div class="row p-1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <a href="#" data-toggle="modal" data-target="#modal_crear_cliente"><button class="btn btn-success"><i class="fab fa-cuttlefish fa-1x"></i>&nbsp;Nuevo cliente</button></a>
        </div>
        
    </div>
    
    <div class="row p-1">
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">            
            
            <div class="table-responsive">
				<table class="table table-sm table-striped table-bordered" id="tblClientes">
					<thead class="thead-dark">
						<tr>
							<th scope="col">ID Cliente</th>
							<th scope="col">Nombre</th>
                            <th scope="col">Paterno</th>                            
							<th scope="col">Materno</th>
                            <th scope="col">Opciones</th>	
						</tr>
					</thead>
					<tbody>
						@foreach($clientes as $c)
							<tr>
								<td>{{$c->id}}</td>
                                <td>{{$c->nombre}}</td>
                                <td>{{$c->paterno}}</td> 
                                <td>{{$c->materno}}</td>                               

                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modal_editar_cliente" data-id_cliente="{{$c->id}}" data-nombre="{{$c->nombre}}" data-paterno="{{$c->paterno}}" data-materno="{{$c->materno}}" data-calle="{{$c->calle}}" data-colonia="{{$c->colonia}}" data-ciudad="{{$c->ciudad}}">
                                        <button class="btn btn-square" title="Editar"><i class="fas fa-edit fa-1x"></i></button>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#modal_eliminar_cliente" data-id_cliente="{{$c->id}}">
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
            //console.log("hola");
            $('[data-toggle="tooltip"]').tooltip(); 

            var tblClientes = $('#tblClientes').DataTable({
                         
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

            $('#modal_editar_cliente').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_cliente = button.data('id_cliente') 
                var nombre =  button.data('nombre')      
                var paterno = button.data('paterno') 
                var materno = button.data('materno')
                var calle = button.data('calle')
                var colonia = button.data('colonia')
                var ciudad = button.data('ciudad')                                                                                  
                
                var modal = $(this)

                modal.find('#id_cliente').val(id_cliente)          
                modal.find('#edit_nombre').val(nombre)

                modal.find('#edit_paterno').val(paterno)
                modal.find('#edit_materno').val(materno)
                modal.find('#edit_calle').val(calle)
                modal.find('#edit_colonia').val(colonia)
                modal.find('#edit_ciudad').val(ciudad)                
                
                
                            
            });

            $('#modal_eliminar_cliente').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_cliente = button.data('id_cliente')                                                                                     
                
                var modal = $(this)

                modal.find('#del_id_cliente').val(id_cliente)         
               
            });


        });//fin document ready
    
    </script>
@stop