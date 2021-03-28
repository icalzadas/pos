<div class="modal fade" id="modal_cancelar_venta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Realmente desea cancelar la venta seleccionada de la base de datos?</h5>
                <i class="far fa-question-circle fa-2x"></i>
                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&#10004;</span>
                </button>-->
            </div>
            
            <div class="modal-body">
                
                <div class="container">        
                    <div class="row">            
                        <div class="col-md-12">                
                            
                                                    
                                <div class="card-body">
                                    
                                    <form method="POST" action="{{route('cancelar_ventas')}}" enctype="multipart/form-data">
                                    @csrf                                                       
                                        
                                        <input type="hidden" name="id_venta" id="id_venta" value="">
                                        <div class="form-group form-row">
                                            <div class="form-group col-md-6">
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close fa-1x"></i>&nbsp;No</button>
                                                
                                                
                                            </div>
                                            <div class="form-group col-md-6">
                                                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-check fa-1x"></i>&nbsp;Si</button>
                                            </div>
                                        </div>                            

                                    </form>                                    

                                </div>                    
                                            
                        </div>            
                    </div>        
                </div>
            
            </div><!--Fin Modal Body-->            
            
        </div>
    </div>
</div>