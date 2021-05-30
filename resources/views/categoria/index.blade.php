@extends('adminlte::page')

@section('title', 'Categorias')

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
    @include('categoria/modalCreate')
    @include('categoria/modalEdit')
    @include('categoria/modalDelete')

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h1 class="card-title">Categorias</h1>
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
                    <a href="#" data-toggle="modal" data-target="#modal_crear_categoria"><button class="btn btn-success"><i class="fab fa-cuttlefish fa-1x"></i>&nbsp;Nueva Categoria</button></a>
                </div>
        
            </div>
    
            <div class="row p-1">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                    
                    
                    
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered" id="tblCategorias">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID Categoria</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Status</th>                            
                                    <th scope="col">Opciones</th>	
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorias as $c)
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->categoria}}</td>
                                        <td>{{$c->status}}</td>                               

                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#modal_editar_categoria" data-id_categoria="{{$c->id}}" data-categoria="{{$c->categoria}}" data-status="{{$c->status}}">
                                                <button class="btn btn-square" title="Editar"><i class="fas fa-edit fa-1x"></i></button>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#modal_eliminar_categoria" data-id_categoria="{{$c->id}}">
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
        $(document).ready(function() {
            //console.log("hola");
            $('[data-toggle="tooltip"]').tooltip(); 

            var tblCategorias = $('#tblCategorias').DataTable({
                "dom": 'Bfrtipl',      
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

            $('#modal_editar_categoria').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_categoria = button.data('id_categoria') 
                var categoria =  button.data('categoria')      
                var status = button.data('status')                                                                                   
                
                var modal = $(this)

                modal.find('#id_categoria').val(id_categoria)          
                modal.find('#edit_categoria').val(categoria)                
                
                //modal.find('#edit_status').val(status)
                $("#edit_status option[value='"+status+"']").attr("selected", true);
                            
            });

            $('#modal_eliminar_categoria').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_categoria = button.data('id_categoria')                                                                                     
                
                var modal = $(this)

                modal.find('#del_id_categoria').val(id_categoria)         
               
            });


        });//fin document ready
    
    </script>
@stop