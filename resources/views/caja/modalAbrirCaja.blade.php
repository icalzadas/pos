<div class="modal fade" id="modal_abrir_caja" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Apertura de caja</h5>
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
                                    
                                    <form method="POST" action="{{route('open')}}" enctype="multipart/form-data">
                                    @csrf  
                                        
                                        <div class="form-group form-row">                                  
                                       
                                            <div class="form-group col-md-6">                            
                                                <select data-toggle="tooltip" data-placement="top" title="Caja" aria-describedby="id_caja" name="id_caja" id="id_caja" class="form-control form-control-sm" required value="{{ old('id_caja') }}">
                                                    <option value="" selected>Selecciona Caja...</option>
                                                    @foreach($cajas_select as $cs)
                                                    <option value="{{$cs->id}}">{{$cs->caja}}</option>
                                                    @endforeach
                                                </select>
                                                <small id="id_caja" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>
                                       
                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Monto Apertura" aria-describedby="monto_apertura" id="monto_apertura" name="monto_apertura" placeholder="Monto Apertura" maxlength="15" value="{{ old('monto_apertura') }}">
                                                
                                            </div>                                                                          
                                                               
                                        </div>

                                        <div class="form-group form-row">
                                            <div class="form-group col-md-6">                            
                                                <select data-toggle="tooltip" data-placement="top" title="Cajero" aria-describedby="id_user" name="id_user" id="id_user" class="form-control form-control-sm" required value="{{ old('id_user') }}">
                                                    <option value="" selected>Selecciona Cajero...</option>
                                                    @foreach($cajeros as $ca)
                                                    <option value="{{$ca->id}}">{{$ca->name}}</option>
                                                    @endforeach
                                                </select>
                                                <small id="id_user" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group form-row">
                                            <div class="ml-auto">
                                                    
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close fa-1x"></i>&nbsp;Cancelar</button>
                                                <button type="submit" class="btn btn-success"><i class="fas fa-lock-open fa-1x"></i>&nbsp;Abrir</button>
                                                    
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