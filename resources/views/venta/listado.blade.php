@extends('adminlte::page')

@section("content_header")
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
@endsection
@section('content')
@include('venta/modalCancel')
<div class="row p-1">
        
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            
        <!--<a href="#" data-toggle="modal" data-target="#modal_crear_producto"><button class="btn btn-success"><i class="fas fa-file-alt fa-1x"></i>&nbsp;Nuevo Producto</button></a>&nbsp&nbsp;-->
            
        <div class="table-responsive">
			<table class="table table-sm table-striped table-bordered table-hover" id="tblListadoVentas">
				<thead class="thead-dark">
					<tr>
                        
						<th scope="col" >ID Venta</th>
						<th scope="col">Sucursal</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Tipo de pago</th>
                        <th scope="col">Fecha de venta</th>
                        <th scope="col">Efectivo</th>
                        <th scope="col">Cambio</th>
                        <th scope="col">Cobrada S/N</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Total</th>	
                        <th scope="col">Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($ventas as $v)
					<tr {{$v->estatus == 0 ? 'class=bg-danger' : ''}}>                        
						<td >{{$v->id}}</td>
                        <td>{{$v->sucursal}}</td>
                        <td>{{$v->cliente}}</td>
                        <td>{{$v->nick}}</td>
                        <td>{{$v->tipo_pago}}</td>
                        <td>{{$v->fecha_venta}}</td>
                        <td>{{$v->efectivo}}</td>
                        <td>{{$v->cambio}}</td>                       
                        @if($v->cobrado_sn==1)
                        <td>Si</td>                        
                        @else
                        <td>No</td>
                        @endif 
                        <td>{{ $v->estatus==1 ? 'Activa' : 'Cancelada'}}</td>
                        <td>{{$v->subtotal}}</td>
                        <td>{{$v->total}}</td>                       
						<td >
                            <a href="#"  data-toggle="modal" data-target="#modal_cancelar_venta" data-id_venta="{{$v->id}}">
                                <button class="btn btn-square" title="Cancelar" {{ $v->estatus==0 ?  'disabled' : ''}}><i class="fas fa-trash-alt fa-1x"></i></button>
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
        
        
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            console.log("listado");
            var tblListadoVentas = $('#tblListadoVentas').DataTable({
                         
                //stateSave: true,
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

            //Asigna id_venta al formulario del modal
            $('#modal_cancelar_venta').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget); 
                
                var id_venta = button.data('id_venta');                                                                                     
                
                var modal = $(this);
        
                modal.find('#id_venta').val(id_venta);         
               
            });

        });//fin document ready
    </script>
@stop