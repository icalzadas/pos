@extends('adminlte::page')

@section('title', 'Caja')

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

<!-- CARD MAXIMIZABLE
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Maximizable Card Example</h3>
    <div class="card-tools">
      
      <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
    </div>
    
  </div>
  <
  <div class="card-body">
    The body of the card
  </div>
  
</div>-->


@section('content')
@include('caja/modalAbrirCaja')
@include('caja/modalCerrarCaja')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Cajas</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
    </div>
              
    <div class="card-body p-0" style="display: block;">
            
        <div class="d-md-flex">
            <div class="p-1 flex-fill" style="overflow: hidden">
                <div class="table-responsive">
				    <table class="table table-sm table-striped table-bordered" id="tblClientes">
					    <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Caja</th>
                                <th scope="col">Cajero</th>
                                <th scope="col">Fecha Apertura</th>                            
                                <th scope="col">Monto Apertura</th>
                                <th scope="col">Fecha Cierre</th>
                                <th scope="col">Monto Cierre</th>
                                <th scope="col">Estatus</th>
                                    
                            </tr>
					    </thead>
					    <tbody>
                        @foreach($cajas as $c)
						
							<tr>
								<td>{{$c->id}}</td>
                                <td>{{$c->caja}}</td>
                                <td>{{$c->cajero}}</td>
                                <td>{{$c->fecha_apertura}}</td> 
                                <td>{{$c->monto_apertura}}</td>                               
                                
                                @if(empty($c->fecha_cierre))
                                    <td><span class="text-light bg-dark">Aun no cerrada</span></td> 
                                @else
                                    <td><span class="text-light bg-danger">{{$c->fecha_cierre}}</span></td>
                                @endif    
                                
                                
                                <td>${{$c->monto_cierre}}</td>
                                 
                                
                                @if($c->estatus==1)
                                    <td><span class="text-light bg-success">Caja abierta</span></td>
                                @elseif($c->estatus==0)
                                    <td><span class="text-light bg-danger">Caja Cerrada</span></td>
                                @else
                                    <td><span class="text-muted">{{$c->estatus}}</span></td>   
                                @endif
								
							</tr>                     

                            
                        @endforeach					
					    </tbody>
				    </table>
			    </div> 
            </div>
                  
            <div class="card-pane-right pt-2 pb-2 pl-4 pr-4">
                <div class="description-block mb-4">
                      
                    <a class="btn btn-app bg-success" id="abrir_caja" data-toggle="modal" data-target="#modal_abrir_caja">    
                        <i class="fas fa-inbox"></i> Abrir Caja
                    </a> 
                    
                </div>

                <div class="description-block mb-4">
                      
                    <a class="btn btn-app bg-danger" id="cerrar_caja" data-toggle="modal" data-target="#modal_cerrar_caja">    
                        <i class="fas fa-inbox"></i> Cerrar Caja
                    </a> 
                    
                </div>             
                    
            </div><!-- /.card-pane-right -->
        </div><!-- /.d-md-flex -->
        
    </div><!--fin div card body-->
             
</div> 

    
@endsection

@section('css')
    
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            //console.log("hola");
            $('[data-toggle="tooltip"]').tooltip();
            /*$('#abrir_caja').on('click', function () {
                console.log("click");
            })*/
            
            

        });//fin document ready
    
    </script>
@stop