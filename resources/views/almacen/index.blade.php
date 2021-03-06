@extends('adminlte::page')

@section('title', 'Caja')

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
                        <th scope="col">Acciones</th>                               
                    </tr>
			    </thead>
			    <tbody>
                @foreach($stock as $s)
				
					<tr>
                        <form method="POST" action="{{route('modificar_stock')}}" enctype="multipart/form-data">
                            @csrf 
                            <td>{{$s->id}}</td>
                            <td>{{$s->sucursal}}</td>
                            <td>{{$s->producto}}</td>
                            <input type="hidden" name="id" value="{{$s->id}}" />
                            <td><input type="number" name="cantidad" class="form-control" value="{{$s->cantidad}}" /></td>              
                            <td><input type="submit" value="Modificar cantidad" class="btn btn-primary"></td>
                        </form>
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