<div class="modal fade" id="modal_crear_user" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Capturar Usuario</h5>
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
                                    
                                    <form method="POST" action="{{url('usuarios')}}" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Nombre Completo" aria-describedby="name" id="name" name="name" placeholder="Nombre completo" required maxlength="80" value="{{ old('name') }}">
                                                <small id="name" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>

                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Nick" aria-describedby="nick" id="nick" name="nick" placeholder="Nick"  required maxlength="50" value="{{ old('nick') }}">
                                                <small id="nick" class="form-text text-muted">
                                                    *Obligatorio y unico, este dato se usara para iniciar sesion
                                                </small>
                                            </div>

                                                                                                                    
                                                               
                                        </div>

                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-4">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Telefono" aria-describedby="telefono" id="telefono" name="telefono" placeholder="Telefono"  maxlength="20" value="{{ old('telefono') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="email" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Email" aria-describedby="email" id="email" name="email" placeholder="Email"  required maxlength="50" value="{{ old('email') }}">
                                                <small id="email" class="form-text text-muted">
                                                    *Obligatorio y unico
                                                </small>
                                            </div>

                                            <div class="form-group col-md-4">                            
                                                <input type="password" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Password" aria-describedby="password" id="password" name="password" placeholder="Password"  required maxlength="10" value="{{ old('password') }}">
                                                <small id="password" class="form-text text-muted">
                                                    *Obligatorio, maximo 10 caracteres
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