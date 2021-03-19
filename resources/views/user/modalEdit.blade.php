<div class="modal fade" id="modal_editar_user" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Editar Usuario</h5>
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
                                    
                                    <form method="POST" action="{{route('actualizar_user')}}" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="form-group form-row">                                  
                                            <input type="hidden" class="form-control form-control-sm" id="id_user" name="id_user" >
                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Nombre Completo" aria-describedby="edit_name" id="edit_name" name="edit_name" placeholder="Nombre completo" required maxlength="80" value="{{ old('edit_name') }}">
                                                <small id="edit_name" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>

                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Nick" aria-describedby="edit_nick" id="edit_nick" name="edit_nick" placeholder="Nick"  required maxlength="50" value="{{ old('edit_nick') }}">
                                                <small id="edit_nick" class="form-text text-muted">
                                                    *Obligatorio y unico, este dato se usara para iniciar sesion
                                                </small>
                                            </div>                                                                                                                    
                                                               
                                        </div>

                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Telefono" aria-describedby="edit_telefono" id="edit_telefono" name="edit_telefono" placeholder="Telefono"  maxlength="20" value="{{ old('edit_telefono') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="email" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Email" aria-describedby="edit_email" id="edit_email" name="edit_email" placeholder="Email"  required maxlength="50" value="{{ old('edit_email') }}">
                                                <small id="edit_email" class="form-text text-muted">
                                                    *Obligatorio y unico
                                                </small>
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="password" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Password" aria-describedby="edit_password" id="edit_password" name="edit_password" placeholder="Password"   maxlength="10" value="{{ old('edit_password') }}">
                                                <small id="edit_password" class="form-text text-muted">
                                                    Para mantener la contraseña actual del usuario solo ignore este campo
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