@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')    
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
    @include('producto/modalCreate')
    @include('producto/modalEdit')
    @include('producto/modalDelete')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h1 class="card-title">Productos</h1>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="row p-1">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    <a href="#" data-toggle="modal" data-target="#modal_crear_producto"><button class="btn btn-success"><i class="fab fa-product-hunt fa-1x"></i>&nbsp;Nuevo Producto</button></a>
                </div>                
            </div>    
            <div class="row p-1">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    
                    <!--<a href="#" data-toggle="modal" data-target="#modal_crear_producto"><button class="btn btn-success"><i class="fas fa-file-alt fa-1x"></i>&nbsp;Nuevo Producto</button></a>&nbsp&nbsp;-->
                    
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered" id="tblProductos">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Sucursal</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col" style="display:none;">ID Producto</th>
                                    <th scope="col" style="display:none;">Codigo de barras</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">SKU</th>
                                    <th scope="col">Precio Costo</th>
                                    <th scope="col">Precio Venta</th>
                                    <th scope="col">Precio Mayoreo</th>
                                    <th scope="col">Minimo</th>
                                    <th scope="col">Maximo</th>

                                    <th scope="col">Talla</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Estatus</th>
                                    <th scope="col">Opciones</th>	
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $p)
                                    <tr>
                                        <td>{{$p->sucursal}}</td>
                                        <td>{{$p->categoria}}</td>
                                        <td style="display:none;">{{$p->id}}</td>
                                        <td style="display:none;">{{$p->codigo_barras}}</td>
                                        <td>{{$p->producto}}</td>
                                        <td>{{$p->sku}}</td>
                                        <td>{{$p->precio_costo}}</td>
                                        <td>{{$p->precio_venta}}</td>
                                        <td>{{$p->precio_mayoreo}}</td>
                                        <td>{{$p->minimo}}</td>
                                        <td>{{$p->maximo}}</td>
                                        <td>{{$p->talla}}</td>
                                        <td>{{$p->modelo}}</td>
                                        <td>{{$p->color}}</td>
                                        
                                        @if($p->status==1)
                                        <td>Activo</td>
                                        @else
                                        <td>Inactivo</td>
                                        @endif

                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#modal_editar_producto" data-id_producto="{{$p->id}}" data-id_sucursal="{{$p->id_sucursal}}" data-id_categoria="{{$p->id_categoria}}" data-producto="{{$p->producto}}" data-sku="{{$p->sku}}" data-codigo_barras="{{$p->codigo_barras}}" data-precio_costo="{{$p->precio_costo}}" data-precio_venta="{{$p->precio_venta}}" data-precio_mayoreo="{{$p->precio_mayoreo}}" data-minimo="{{$p->minimo}}" data-maximo="{{$p->maximo}}" data-talla="{{$p->talla}}" data-modelo="{{$p->modelo}}" data-color="{{$p->color}}" data-cantidad="{{$p->cantidad_inicial}}" data-status="{{$p->status}}">
                                                <button class="btn btn-square" title="Editar"><i class="fas fa-edit fa-1x"></i></button>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#modal_eliminar_producto" data-id_producto="{{$p->id}}">
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


        </div><!--fin card body-->
    </div> <!--fin card-->

    
@endsection

@section('css')
    
@stop

@section('js')
    <script type="text/javascript">
        //solo numeros y tecla retroceso
        function solonumeros(e) {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }

            // Patron de entrada, en este caso solo acepta numeros
            patron = /[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }

        //solo numeros tecla retroceso y punto decimal
        function solonumerosdecimal(e) {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla == 8) {
                return true;
            }

            // Patron de entrada, en este caso solo acepta numeros
            patron = /[0-9,.]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
        $(document).ready(function() {
            //console.log("hola");
            $('[data-toggle="tooltip"]').tooltip(); 

            var tblProductos = $('#tblProductos').DataTable({
                "dom": 'Bfrtipl',         
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

            $('#modal_editar_producto').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_sucursal = button.data('id_sucursal')
                var id_producto = button.data('id_producto') 
                var id_categoria =  button.data('id_categoria')      
                var producto = button.data('producto')
                var sku = button.data('sku')
                var codigo_barras = button.data('codigo_barras')
                var precio_costo = button.data('precio_costo')
                var precio_venta = button.data('precio_venta') 
                var precio_mayoreo = button.data('precio_mayoreo')
                var minimo = button.data('minimo')
                var maximo = button.data('maximo')
                var talla = button.data('talla')
                var modelo = button.data('modelo')
                var color = button.data('color')
                var cantidad = button.data('cantidad')
                var status = button.data('status')                                                                      
                
                var modal = $(this)

                modal.find('#id_producto').val(id_producto)            
                
                //modal.find('#edit_id_categoria').val(id_categoria)
                $("#edit_id_categoria option[value='"+id_categoria+"']").attr("selected", true);
                
                modal.find('#edit_producto').val(producto)
                modal.find('#edit_sku').val(sku)
                modal.find('#edit_codigo_barras').val(codigo_barras)
                modal.find('#edit_precio_costo').val(precio_costo)

                modal.find('#edit_precio_venta').val(precio_venta)
                modal.find('#edit_precio_mayoreo').val(precio_mayoreo)
                modal.find('#edit_minimo').val(minimo)
                modal.find('#edit_maximo').val(maximo)
                modal.find('#edit_talla').val(talla)
                modal.find('#edit_modelo').val(modelo)
                modal.find('#edit_color').val(color)
                modal.find('#edit_cantidad').val(cantidad)
                
                //modal.find('#edit_status').val(status)
                $("#edit_status option[value='"+status+"']").attr("selected", true);
                $("#edit_id_sucursal option[value='"+id_sucursal+"']").attr("selected", true);
                            
            });

            $('#modal_eliminar_producto').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_producto = button.data('id_producto')                                                                                     
                
                var modal = $(this)

                modal.find('#del_id_producto').val(id_producto)         
               
            });


        });//fin document ready
    
    </script>
@stop