<div class="modal fade" id="modal_crear_caja" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Capturar caja</h5>
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
                                    
                                    <form method="POST" action="{{url('cajas')}}" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="form-group form-row">
                                            <div class="form-group col-md-12">                            
                                                <select data-toggle="tooltip" data-placement="top" title="Sucursal" aria-describedby="id_sucursal" name="id_sucursal" id="id_sucursal" class="form-control form-control-sm" required value="{{ old('id_sucursal') }}">
                                                    
                                                    @foreach($missucursales as $s)
                                                    <option value="{{$s->id}}">{{$s->sucursal}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <small id="id_sucursal" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>                                                                                                       
                                                               
                                        </div>

                                        <div class="form-group form-row">                                  

                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Caja" aria-describedby="caja" id="caja" name="caja" placeholder="Caja"  maxlength="15" required value="{{ old('caja') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Descripcion" aria-describedby="descripcion" id="descripcion" name="descripcion" placeholder="Descripcion"  maxlength="50" value="{{ old('descripcion') }}">
                                                
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