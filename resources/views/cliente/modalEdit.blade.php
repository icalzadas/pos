<div class="modal fade" id="modal_editar_cliente" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Editar Cliente</h5>
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
                                    
                                    <form method="POST" action="{{route('actualizar_cliente')}}" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="form-group form-row"> 
                                            <input type="hidden" class="form-control form-control-sm" id="id_cliente" name="id_cliente" >                                 
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Nombre" aria-describedby="edit_nombre" id="edit_nombre" name="edit_nombre" placeholder="Nombre" required maxlength="50" value="{{ old('nombre') }}">
                                                <small id="edit_nombre" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Apellido Paterno" aria-describedby="edit_paterno" id="edit_paterno" name="edit_paterno" placeholder="Apellido paterno"  maxlength="50" value="{{ old('paterno') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Apellido materno" aria-describedby="edit_materno" id="edit_materno" name="edit_materno" placeholder="Apellido materno"  maxlength="50" value="{{ old('materno') }}">
                                                
                                            </div>                                                                         
                                                               
                                        </div>

                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Calle" aria-describedby="edit_calle" id="edit_calle" name="edit_calle" placeholder="Calle"  maxlength="50" value="{{ old('calle') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Colonia" aria-describedby="edit_colonia" id="edit_colonia" name="edit_colonia" placeholder="Colonia"  maxlength="50" value="{{ old('colonia') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Ciudad" aria-describedby="edit_ciudad" id="edit_ciudad" name="edit_ciudad" placeholder="Ciudad"  maxlength="50" value="{{ old('ciudad') }}">
                                                
                                            </div>                                                                         
                                                               
                                        </div>

                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Codigo Postal" aria-describedby="edit_cp" id="edit_cp" name="edit_cp" placeholder="Codigo Postal"  maxlength="5" value="{{ old('cp') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Telefono" aria-describedby="edit_telefono" id="edit_telefono" name="edit_telefono" placeholder="Telefono"  maxlength="15" value="{{ old('telefono') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="RFC" aria-describedby="edit_rfc" id="edit_rfc" name="edit_rfc" placeholder="RFC"  maxlength="13" value="{{ old('rfc') }}">
                                                
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