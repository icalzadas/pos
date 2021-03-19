<div class="modal fade" id="modal_editar_caja" tabindex="" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Capturar Sucursal</h5>
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
                                    
                                    <form method="POST" action="{{route('actualizar_caja')}}" enctype="multipart/form-data">
                                    @csrf  
                                        <div class="form-group form-row">
                                            <input type="hidden" class="form-control form-control-sm" id="id_caja" name="id_caja" >
                                            <div class="form-group col-md-12">                            
                                                <select data-toggle="tooltip" data-placement="top" title="Sucursal" aria-describedby="edit_id_sucursal" name="edit_id_sucursal" id="edit_id_sucursal" class="form-control form-control-sm"  value="{{ old('edit_id_sucursal') }}">
                                                    
                                                    @foreach($missucursales as $s)
                                                    <option value="{{$s->id}}">{{$s->sucursal}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <small id="edit_id_sucursal" class="form-text text-muted">
                                                    *Obligatorio
                                                </small>
                                            </div>                                                                                                       
                                                               
                                        </div>

                                        <div class="form-group form-row">                                  

                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Caja" aria-describedby="caja" id="edit_caja" name="edit_caja" placeholder="Caja"  maxlength="15" required value="{{ old('edit_caja') }}">
                                                
                                            </div>

                                            <div class="form-group col-md-6">                            
                                                <input type="text" class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Descripcion" aria-describedby="descripcion" id="edit_descripcion" name="edit_descripcion" placeholder="Descripcion"  maxlength="50" value="{{ old('edit_descripcion') }}">
                                                
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