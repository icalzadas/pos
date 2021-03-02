<div class="modal fade" id="modal_editar_producto" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                
                <div class="container">        
                    <div class="row">            
                        <div class="col-md-12">                
                            <div class="card">
                                                    
                                <div class="card-body">
                                    
                                    <form method="POST" action="{{route('actualizar')}}" enctype="multipart/form-data">
                                    @csrf

                                        <div class="form-group form-row">
                                                               
                                            <div class="form-group col-md-12">                            
                                                <select data-toggle="tooltip" data-placement="top" title="Sucursal" aria-describedby="edit_id_sucursal" name="edit_id_sucursal" id="edit_id_sucursal" class="form-control form-control-sm" disabled required value="{{ old('id_sucursal') }}">
                                                    
                                                    @foreach($missucursales as $s)
                                                    <option value="{{$s->id}}">{{$s->sucursal}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <small id="edit_id_sucursal" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>                                                             
                                                               
                                        </div> 
                                    
                                        <div class="form-group form-row">
                                            <input type="hidden" class="form-control form-control-sm" id="id_producto" name="id_producto" >                  
                                            <div class="form-group col-md-6">                            
                                                <select data-toggle="tooltip" data-placement="top" title="Categoria" aria-describedby="edit_id_categoria" name="edit_id_categoria" id="edit_id_categoria" class="form-control form-control-sm" required value="{{ old('id_categoria') }}">
                                                    <option value="" selected>Selecciona Categoria...</option>
                                                    @foreach($categorias as $c)
                                                    <option value="{{$c->id}}">{{$c->categoria}}</option>
                                                    @endforeach
                                                </select>
                                                <small id="edit_id_categoria" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>
                                       
                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Producto" aria-describedby="edit_producto" id="edit_producto" name="edit_producto" placeholder="Producto" required maxlength="100" value="{{ old('producto') }}">
                                                <small id="edit_producto" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>                            
                                                               
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" aria-describedby="edit_sku" data-toggle="tooltip" data-placement="top" title="SKU" id="edit_sku" name="edit_sku" placeholder="SKU" maxlength="15" value="{{ old('sku') }}" required>
                                                <small id="edit_sku" class="form-text text-muted">
                                                    *Obligatorio e irrepetible
                                                </small>
                                            </div>
                                            
                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Codigo Barras" id="edit_codigo_barras" name="edit_codigo_barras" placeholder="Codigo Barras" maxlength="255" value="{{ old('codigo_barras') }}">
                                            </div>
                                        </div> 

                                        <div class="form-group form-row">
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" aria-describedby="edit_precio_costo" data-toggle="tooltip" data-placement="top" title="Precio Costo" id="edit_precio_costo" name="edit_precio_costo" placeholder="Precio Costo" required value="{{ old('precio_costo') }}" onkeypress="return solonumerosdecimal(event);" maxlength="8">
                                                <small id="edit_precio_costo" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" aria-describedby="edit_precio_venta" data-toggle="tooltip" data-placement="top" title="Precio Venta" id="edit_precio_venta" name="edit_precio_venta" placeholder="Precio Venta" required value="{{ old('precio_venta') }}" onkeypress="return solonumerosdecimal(event);" maxlength="8">
                                                <small id="edit_precio_venta" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Precio Mayoreo" id="edit_precio_mayoreo" name="edit_precio_mayoreo" placeholder="Precio Mayoreo" value="{{ old('precio_mayoreo') }}" onkeypress="return solonumerosdecimal(event);" maxlength="8">
                                            </div>
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Talla" id="edit_talla" name="edit_talla" placeholder="Talla" maxlength="30" value="{{ old('talla') }}">
                                            </div>
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Modelo" id="edit_modelo" name="edit_modelo" placeholder="Modelo" maxlength="50" value="{{ old('modelo') }}">
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Color" id="edit_color" name="edit_color" placeholder="Color" maxlength="30" value="{{ old('color') }}">
                                            </div>
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="form-group col-md-3">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Minimo" id="edit_minimo" name="edit_minimo" placeholder="Minimo" value="{{ old('minimo') }}" onkeypress="return solonumeros(event);" maxlength="6">
                                            </div>
                                       
                                            <div class="form-group col-md-3">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Maximo" id="edit_maximo" name="edit_maximo" placeholder="Maximo" value="{{ old('maximo') }}" onkeypress="return solonumeros(event);" maxlength="6">
                                            </div>

                                            <div class="form-group col-md-3">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Cantidad inicial" aria-describedby="edit_cantidad" id="edit_cantidad" name="edit_cantidad" placeholder="Cantidad inicial" required value="{{ old('cantidad') }}" onkeypress="return solonumeros(event);" maxlength="6">
                                                <small id="edit_cantidad" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <select name="edit_status" aria-describedby="edit_status" data-toggle="tooltip" data-placement="top" title="Status" id="edit_status" class="form-control form-control-sm" required>
                                                    <option value="1" selected>Activo</option>
                                                    
                                                    <option value="0">Inactivo</option>
                                                    
                                                </select>
                                                <small id="edit_status" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>
                                        </div> 
                                                                            

                                        
                                        <div class="form-group form-row">
                                            <div class="ml-auto">
                                                    
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close fa-1x"></i>&nbsp;Cancelar</button>
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-edit fa-1x"></i>&nbsp;Editar</button>
                                                    
                                            </div>
                                        </div> 
                                                                  

                                    </form>                                    

                                </div>                    
                            </div>                
                        </div>            
                    </div>        
                </div>
            
            </div><!--Fin Modal Body-->            
            
        </div>
    </div>
</div>