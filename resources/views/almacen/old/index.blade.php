@extends('adminlte::page')

@section('title', 'Caja')

@section('content')





<div class="card">
    <div class="card-header">
        <h3 class="card-title">Control de almacen</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
    </div>
              
    <div class="card-body" >        
           
        <div class="table-responsive">
		    <table class="table table-sm table-striped table-bordered" id="tblAlmacen">
			    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad existencia</th>                            
                                                    
                    </tr>
			    </thead>
			    <tbody>
                @foreach($stock as $s)
				
					<tr>
						<td>{{$s->id}}</td>
                        <td>{{$s->sucursal}}</td>
                        <td>{{$s->producto}}</td>
                        <td>{{$s->cantidad}}</td> 
                                  
						
					</tr>                    
                    
                @endforeach					
			    </tbody>
		    </table>
		</div> 

    </div><!--fin div card body-->
             
</div> 

@endsection


@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            console.log("hola");
            
            
            

        });//fin document ready
    
    </script>
@stop