<div class="modal fade" id="modal_crear_sucursal" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Capturar Sucursal</h5>
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
                                    
                                    <form method="POST" action="{{url('sucursales')}}" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-8">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Sucursal" aria-describedby="sucursal" id="sucursal" name="sucursal" placeholder="Sucursal" required maxlength="50" value="{{ old('sucursal') }}">
                                                <small id="sucursal" class="form-text text-muted">
                                                    *Obligatorio e irrepetible
                                                </small>
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <select name="estatus" aria-describedby="estatus" data-toggle="tooltip" data-placement="top" title="Status" id="estatus" class="form-control form-control-sm" required>
                                                    <option value="1" selected>Activo</option>
                                                    
                                                    <option value="0">Inactivo</option>
                                                    
                                                </select>
                                                <small id="estatus" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                                
                                            </div>

                                                                                                                  
                                                               
                                        </div>

                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Calle" aria-describedby="calle" id="calle" name="calle" placeholder="Calle"  maxlength="50" value="{{ old('calle') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Colonia" aria-describedby="colonia" id="colonia" name="colonia" placeholder="Colonia"  maxlength="50" value="{{ old('colonia') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Ciudad" aria-describedby="ciudad" id="ciudad" name="ciudad" placeholder="Ciudad"  maxlength="50" value="{{ old('ciudad') }}">
                                                
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