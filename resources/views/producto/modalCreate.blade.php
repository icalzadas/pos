<div class="modal fade" id="modal_crear_producto" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Capturar Producto</h5>
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
                                    
                                    <form method="POST" action="{{url('productos')}}" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="form-group form-row">
                                                               
                                            <div class="form-group col-md-6">                            
                                                <select data-toggle="tooltip" data-placement="top" title="Categoria" aria-describedby="id_categoria" name="id_categoria" id="id_categoria" class="form-control form-control-sm" required value="{{ old('id_categoria') }}">
                                                    <option value="" selected>Selecciona Categoria...</option>
                                                    @foreach($categorias as $c)
                                                    <option value="{{$c->id}}">{{$c->categoria}}</option>
                                                    @endforeach
                                                </select>
                                                <small id="id_categoria" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>
                                       
                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Producto" aria-describedby="producto" id="producto" name="producto" placeholder="Producto" required maxlength="100" value="{{ old('producto') }}">
                                                <small id="producto" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>                             
                                                               
                                        </div> 

                                        <div class="form-group form-row">
                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" aria-describedby="sku" data-toggle="tooltip" data-placement="top" title="SKU" id="sku" name="sku" placeholder="SKU" maxlength="15" value="{{ old('sku') }}" required>
                                                <small id="sku" class="form-text text-muted">
                                                    *Obligatorio e irrepetible
                                                </small>
                                            </div>
                                            

                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Codigo Barras" id="codigo_barras" name="codigo_barras" placeholder="Codigo Barras" maxlength="255" value="{{ old('codigo_barras') }}">
                                            </div>
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" aria-describedby="precio_costo" data-toggle="tooltip" data-placement="top" title="Precio Costo" id="precio_costo" name="precio_costo" placeholder="Precio Costo" required value="{{ old('precio_costo') }}">
                                                <small id="precio_costo" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" aria-describedby="precio_venta" data-toggle="tooltip" data-placement="top" title="Precio Venta" id="precio_venta" name="precio_venta" placeholder="Precio Venta" required value="{{ old('precio_venta') }}">
                                                <small id="precio_venta" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Precio Mayoreo" id="precio_mayoreo" name="precio_mayoreo" placeholder="Precio Mayoreo" value="{{ old('precio_mayoreo') }}">
                                            </div>
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Talla" id="talla" name="talla" placeholder="Talla" maxlength="30" value="{{ old('talla') }}">
                                            </div>
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Modelo" id="modelo" name="modelo" placeholder="Modelo" maxlength="50" value="{{ old('modelo') }}">
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Color" id="color" name="color" placeholder="Color" maxlength="30" value="{{ old('color') }}">
                                            </div>
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="form-group col-md-3">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Minimo" id="minimo" name="minimo" placeholder="Minimo" value="{{ old('minimo') }}">
                                            </div>
                                       
                                            <div class="form-group col-md-3">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Maximo" id="maximo" name="maximo" placeholder="Maximo" value="{{ old('maximo') }}">
                                            </div>

                                            <div class="form-group col-md-3">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Cantidad" aria-describedby="cantidad" id="cantidad" name="cantidad" placeholder="Cantidad" required value="{{ old('cantidad') }}">
                                                <small id="cantidad" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <select name="status" aria-describedby="status" data-toggle="tooltip" data-placement="top" title="Status" id="status" class="form-control form-control-sm" required>
                                                    <option value="1" selected>Activo</option>
                                                    
                                                    <option value="0">Inactivo</option>
                                                    
                                                </select>
                                                <small id="status" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>
                                        </div> 
                                                                            

                                        
                                        <div class="form-group form-row">
                                            <div class="ml-auto">
                                                    
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close fa-1x"></i>&nbsp;Cancelar</button>
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-1x"></i>&nbsp;Guardar</button>
                                                    
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