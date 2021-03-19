<div class="modal fade" id="modal_editar_sucursal" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Editar Sucursal</h5>
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
                                    
                                    <form method="POST" action="{{route('actualizar_sucursal')}}" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="form-group form-row">                                  
                                            <input type="hidden" class="form-control form-control-sm" id="id_sucursal" name="id_sucursal" >
                                            <div class="form-group col-md-8">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Sucursal" aria-describedby="edit_sucursal" id="edit_sucursal" name="edit_sucursal" placeholder="Sucursal" required maxlength="50" value="{{ old('edit_sucursal') }}">
                                                <small id="edit_sucursal" class="form-text text-muted">
                                                    *Obligatorio e irrepetible
                                                </small>
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <select name="edit_estatus" aria-describedby="edit_estatus" data-toggle="tooltip" data-placement="top" title="Status" id="edit_estatus" class="form-control form-control-sm" required>
                                                    <option value="1" selected>Activo</option>
                                                    
                                                    <option value="0">Inactivo</option>
                                                    
                                                </select>
                                                <small id="edit_estatus" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                                
                                            </div>

                                                                                                                  
                                                               
                                        </div>

                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Calle" aria-describedby="edit_calle" id="edit_calle" name="edit_calle" placeholder="Calle"  maxlength="50" value="{{ old('edit_calle') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Colonia" aria-describedby="edit_colonia" id="edit_colonia" name="edit_colonia" placeholder="Colonia"  maxlength="50" value="{{ old('edit_colonia') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Ciudad" aria-describedby="edit_ciudad" id="edit_ciudad" name="edit_ciudad" placeholder="Ciudad"  maxlength="50" value="{{ old('edit_ciudad') }}">
                                                
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