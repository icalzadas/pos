<div class="modal fade" id="modal_crear_permiso" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Capturar Cliente</h5>
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
                                    
                                    <form method="POST" action="{{url('sucursales/permisos')}}" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-6">                            
                                                <select data-toggle="tooltip" data-placement="top" title="Usuario" aria-describedby="id_user" name="id_user" id="id_user" class="form-control form-control-sm" required value="{{ old('id_user') }}">
                                                    <option value="" >Seleccione usuario...</option>
                                                    @foreach($users as $u)
                                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                
                                                
                                                <small id="nombre" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>

                                            <div class="form-group col-md-6">                            
                                                <select data-toggle="tooltip" data-placement="top" title="Sucursal" aria-describedby="id_sucursal" name="id_sucursal" id="id_sucursal" class="form-control form-control-sm" required value="{{ old('id_sucursal') }}">
                                                    <option value="" >Seleccione sucursal...</option>
                                                    @foreach($sucursales as $s)
                                                    <option value="{{$s->id}}">{{$s->sucursal}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <small id="id_sucursal" class="form-text text-muted">
                                                    *Obligatorio, sucursal a la que se le dara permiso al usuario.
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