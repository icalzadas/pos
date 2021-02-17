<div class="modal fade" id="modal_crear_categoria" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Capturar Categoria</h5>
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
                                    
                                    <form method="POST" action="{{url('categorias')}}" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-8">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Categoria" aria-describedby="categoria" id="categoria" name="categoria" placeholder="categoria" required maxlength="50" value="{{ old('categoria') }}">
                                                <small id="categoria" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>

                                            <div class="form-group col-md-4">
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