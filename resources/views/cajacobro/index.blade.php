@extends('adminlte::page')

@section('title', 'Cajas')

@section('content_header')
    <h1>Cajas</h1>
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
    @include('cajacobro/modalCreate')
    @include('cajacobro/modalEdit')
    @include('cajacobro/modalDelete')
    <div class="row p-1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <a href="#" data-toggle="modal" data-target="#modal_crear_caja"><button class="btn btn-success"><i class="fas fa-boxes fa-1x"></i>&nbsp;Nueva Caja</button></a>
        </div>
        
    </div>
    
    <div class="row p-1">
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">            
            
            <div class="table-responsive">
				<table class="table table-sm table-striped table-bordered" id="tblCajas">
					<thead class="thead-dark">
						<tr>
							<th scope="col">ID Caja</th>
							<th scope="col">Sucursal</th>
                            <th scope="col">Caja</th>                            
							<th scope="col">Descripcion</th>                            
                            <th scope="col">Opciones</th>	
						</tr>
					</thead>
					<tbody>
						@foreach($cajas as $c)
							<tr>
								<td>{{$c->id}}</td>
                                <td>{{$c->sucursal}}</td>
                                <td>{{$c->caja}}</td> 
                                <td>{{$c->descripcion}}</td>                                                                                                                       

                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modal_editar_caja" data-id_caja="{{$c->id}}" data-id_sucursal="{{$c->id_sucursal}}" data-caja="{{$c->caja}}" data-descripcion="{{$c->descripcion}}" >
                                        <button class="btn btn-square" title="Editar"><i class="fas fa-edit fa-1x"></i></button>
                                    </a>
                                    <!--<a href="#" data-toggle="modal" data-target="#modal_eliminar_caja" data-id_caja="{{$c->id}}">
                                        <button class="btn btn-square" title="Eliminar"><i class="fas fa-trash-alt fa-1x"></i></button>
                                    </a>-->
                                    
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

            var tblCajas = $('#tblCajas').DataTable({
                         
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

            $('#modal_editar_caja').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_caja = button.data('id_caja')
                var id_sucursal = button.data('id_sucursal') 
                var caja =  button.data('caja')      
                var descripcion = button.data('descripcion') 
                                                                                                             
                
                var modal = $(this)

                modal.find('#id_caja').val(id_caja)                  
                modal.find('#edit_caja').val(caja)
                modal.find('#edit_descripcion').val(descripcion)
                
                
                $("#edit_id_sucursal option[value='"+id_sucursal+"']").attr("selected", true);
                    
                            
            });

            $('#modal_eliminar_caja').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_caja = button.data('id_caja')                                                                                     
                
                var modal = $(this)

                modal.find('#del_id_caja').val(id_caja)         
               
            });


        });//fin document ready
    
    </script>
@stop