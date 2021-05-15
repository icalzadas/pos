@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
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

                            <th scope="col">Calle</th>
                            <th scope="col">Colonia</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">CP</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">RFC</th>
                            <th scope="col">CURP</th>
                            <th scope="col">Limite Credito</th>
                            <th scope="col">Dias Credito</th> 
                               

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

                                <td>{{$c->calle}}</td>
                                <td>{{$c->colonia}}</td>
                                <td>{{$c->ciudad}}</td>
                                <td>{{$c->cp}}</td>
                                <td>{{$c->telefono}}</td>
                                <td>{{$c->rfc}}</td>
                                <td>{{$c->curp}}</td>
                                <td>{{$c->limite_credito}}</td>
                                <td>{{$c->dias_credito}}</td>                              

                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modal_editar_cliente" data-id_cliente="{{$c->id}}" data-nombre="{{$c->nombre}}" data-paterno="{{$c->paterno}}" data-materno="{{$c->materno}}" data-calle="{{$c->calle}}" data-colonia="{{$c->colonia}}" data-ciudad="{{$c->ciudad}}" data-cp="{{$c->cp}}" data-telefono="{{$c->telefono}}" data-rfc="{{$c->rfc}}" data-curp="{{$c->curp}}" data-limite_credito="{{$c->limite_credito}}" data-dias_credito="{{$c->dias_credito}}"> 
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

                var cp = button.data('cp')
                var telefono = button.data('telefono')
                var rfc = button.data('rfc')
                var curp = button.data('curp')
                var limite_credito = button.data('limite_credito')
                var dias_credito = button.data('dias_credito')                                                                                  
                
                var modal = $(this)

                modal.find('#id_cliente').val(id_cliente)          
                modal.find('#edit_nombre').val(nombre)

                modal.find('#edit_paterno').val(paterno)
                modal.find('#edit_materno').val(materno)
                modal.find('#edit_calle').val(calle)
                modal.find('#edit_colonia').val(colonia)
                modal.find('#edit_ciudad').val(ciudad)  

                modal.find('#edit_cp').val(cp)
                modal.find('#edit_telefono').val(telefono)
                modal.find('#edit_rfc').val(rfc)      

                modal.find('#edit_curp').val(curp)
                modal.find('#edit_limite_credito').val(limite_credito)
                modal.find('#edit_dias_credito').val(dias_credito)
                            
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