<div class="modal fade" id="modal_cerrar_caja" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Cierre de caja</h5>
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
                                    
                                    <form method="POST" action="{{route('close')}}" enctype="multipart/form-data">
                                    @csrf  
                                        
                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-12">                            
                                                <select data-toggle="tooltip" data-placement="top" title="Caja" aria-describedby="id_caja" name="id_caja" id="id_caja" class="form-control form-control-sm" required value="{{ old('id_caja') }}">
                                                    <option value="" selected>Selecciona Caja...</option>
                                                    @foreach($cajas_cierre_select as $cc)
                                                    <option value="{{$cc->id}}">{{$cc->caja}}</option>
                                                    @endforeach
                                                </select>
                                                <small id="id_caja" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>                                                                                                          
                                                               
                                        </div>                            

                                        <div class="form-group form-row">
                                            <div class="ml-auto">
                                                    
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close fa-1x"></i>&nbsp;Cancelar</button>
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-lock fa-1x"></i>&nbsp;Cerrar</button>
                                                    
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