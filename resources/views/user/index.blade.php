@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
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
    @include('user/modalCreate')
    @include('user/modalEdit')
    @include('user/modalDelete')
    <div class="row p-1">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <a href="#" data-toggle="modal" data-target="#modal_crear_user"><button class="btn btn-success"><i class="fab fa-cuttlefish fa-1x"></i>&nbsp;Nuevo Usuario</button></a>
        </div>
        
    </div>
    
    <div class="row p-1">
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">            
            
            <div class="table-responsive">
				<table class="table table-sm table-striped table-bordered" id="tblUsers">
					<thead class="thead-dark">
						<tr>
							<th scope="col">ID User</th>
							<th scope="col">Nombre Completo</th>
                            <th scope="col">Nick</th>                            
							<th scope="col">Email</th>

                            <th scope="col">Telefono</th>
                            
                            <th scope="col">Opciones</th>	
						</tr>
					</thead>
					<tbody>
						@foreach($users as $u)
							<tr>
								<td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->nick}}</td> 
                                <td>{{$u->email}}</td> 

                                <td>{{$u->telefono}}</td>                                                                                            

                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modal_editar_user" data-id_user="{{$u->id}}" data-name="{{$u->name}}" data-nick="{{$u->nick}}" data-email="{{$u->email}}" data-telefono="{{$u->telefono}}" data-password="{{$u->password}}" data-image="{{$u->image}}">
                                        <button class="btn btn-square" title="Editar"><i class="fas fa-edit fa-1x"></i></button>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#modal_eliminar_user" data-id_user="{{$u->id}}">
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

            var tblUsers = $('#tblUsers').DataTable({
                         
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

            $('#modal_editar_user').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_user = button.data('id_user') 
                var name =  button.data('name')      
                var nick = button.data('nick') 
                var email = button.data('email')
                var telefono = button.data('telefono')                                                                                                 
                
                var modal = $(this)

                modal.find('#id_user').val(id_user)          
                modal.find('#edit_name').val(name)

                modal.find('#edit_nick').val(nick)
                modal.find('#edit_email').val(email)
                modal.find('#edit_telefono').val(telefono)
                    
                            
            });

            $('#modal_eliminar_user').on('show.bs.modal', function(event) {                            
                
                var button = $(event.relatedTarget) 
                
                var id_user = button.data('id_user')                                                                                     
                
                var modal = $(this)

                modal.find('#del_id_user').val(id_user)         
               
            });


        });//fin document ready
    
    </script>
@stop