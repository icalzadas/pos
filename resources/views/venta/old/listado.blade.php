@extends('adminlte::page')

@section('content')

<div class="row p-1">
        
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            
        <!--<a href="#" data-toggle="modal" data-target="#modal_crear_producto"><button class="btn btn-success"><i class="fas fa-file-alt fa-1x"></i>&nbsp;Nuevo Producto</button></a>&nbsp&nbsp;-->
            
        <div class="table-responsive">
			<table class="table table-sm table-striped table-bordered" id="tblListadoVentas">
				<thead class="thead-dark">
					<tr>
                        
						<th scope="col" style="display:none;">ID Venta</th>
						<th scope="col">Sucursal</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Tipo de pago</th>
                        <th scope="col">Fecha de venta</th>
                        <th scope="col">Efectivo</th>
                        <th scope="col">Cambio</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Subtotal</th>
						<th scope="col">Total</th>	
					</tr>
				</thead>
				<tbody>
					@foreach($ventas as $v)
					<tr>                        
						<td style="display:none;">{{$v->id}}</td>
                        <td>{{$v->sucursal}}</td>
                        <td>{{$v->cliente}}</td>
                        <td>{{$v->nick}}</td>
                        <td>{{$v->tipo_pago}}</td>
                        <td>{{$v->fecha_venta}}</td>
                        <td>{{$v->efectivo}}</td>
                        <td>{{$v->cambio}}</td>
                        
                        
                        @if($v->cobrado_sn==1)
                        <td>Cobrada</td>
                        @else
                        <td>Sin cobrar</td>
                        @endif 
                        <td>{{$v->subtotal}}</td>
                        <td>{{$v->total}}</td>                       
						
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

        });//fin document ready
    </script>
@stop