<div class="modal fade" id="modal_editar_categoria" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Editar Categoria</h5>
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
                                    
                                    <form method="POST" action="{{route('actualizar_categoria')}}" enctype="multipart/form-data">
                                    @csrf 
                                    
                                        <div class="form-group form-row">
                                            <input type="hidden" class="form-control form-control-sm" id="id_categoria" name="id_categoria" >                  
                                            
                                       
                                            <div class="form-group col-md-8">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Categoria" aria-describedby="edit_categoria" id="edit_categoria" name="edit_categoria" placeholder="Categoria" required maxlength="50" value="{{ old('categoria') }}">
                                                <small id="edit_categoria" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>
                                       
                                            <div class="form-group col-md-4">
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