@extends('adminlte::page')

@section('content')

<!--<x-dg-card title="Productos" bg="primary" :outline="true" :full="false" :collapsed="false" :maximizable="true" :removable="true" :disabled="false">
    ...
</x-dg-card>-->

<x-dg-card title="Terminal POS" bg="primary" :outline="true" :full="false" :collapsed="false" :maximizable="false" :removable="false" :disabled="false">

  <!--<x-dg-select2 id="myID">
      <x-dg-option value="val">pantalon</x-dg-option>
      <x-dg-option value="val">short</x-dg-option>
      <x-dg-option value="val">camisa</x-dg-option>
  </x-dg-select2>-->
  
  <!--<form method="" action="" enctype="multipart/form-data" id="frmVentas">-->
  
  <!--FILA SUCURSAL Y TIPO DE PRECIO-->
  <div class="form-group form-row">
    <!--SUCURSAL-->
    <div class="form-group col-md-6">
      <div class="input-group mb-3">
      
        <div class="input-group-prepend">
          <div class="input-group-text bg-transparent border-right-0">
            <span class="fas fa-store "></span>
          </div>
        </div>
        <select name="id_sucursal" id="id_sucursal" class="custom-select" title="Sucursal">
          <option value="" selected>Selecciona sucursal...</option>
          @foreach($sucursales as $s)
            <option value="{{$s->id}}">{{$s->sucursal}}</option>
          @endforeach
            
                                          
        </select> 

      </div>    
    </div>

    <!--TIPO DE PRECIO-->
    <div class="form-group col-md-6">
      <div class="input-group mb-3">
      
        <div class="input-group-prepend">
          <div class="input-group-text bg-transparent border-right-0">
            <span class="fas fa-money-check-alt"></span>
          </div>
        </div>
        <select name="tipo_precio" id="tipo_precio" class="custom-select" title="Tipo de precio">
          <option value="" selected>Precio publico en general</option>
          <option value="" >Precio mayoreo</option>
          <option value="" >Donacion</option>            
                                          
        </select> 

      </div>    
    </div>
  </div>

  <!--FILA CLIENTE Y PRODUCTO-->
  <div class="form-group form-row">
    <!--CLIENTE-->
    <div class="form-group col-md-6">
      <div class="input-group mb-3">
      
        <div class="input-group-prepend">
          <div class="input-group-text bg-transparent border-right-0">
            <span class="far fa-address-card "></span>
          </div>
        </div>
        
        <select name="id_cliente" id="id_cliente" class="custom-select" title="">
          @foreach($clientes as $c)
            <option value="{{$c->id}}">{{$c->nombre." ".$c->materno}}</option>
          @endforeach    
                                          
        </select>         

      </div>    
    </div>

    <!--PRODUCTO-->
    <div class="form-group col-md-6">
      <div class="input-group mb-3">
      
        <div class="input-group-prepend">
          <div class="input-group-text bg-transparent border-right-0">
            <span class="fab fa-product-hunt "></span>
          </div>
        </div>
        <input type="hidden" autocomplete="off" class="form-control" id="id_producto" name="id_producto" >
        <input type="text" autocomplete="off" class="form-control" id="producto" name="producto" placeholder="Ingresa nombre de Producto / SKU / Codigo de barras" title="Producto" required>
        <!--<select name="producto" id="producto" class="custom-select" title="">
          @foreach($productos as $pr)
            <option value="{{$pr->id}}">{{$pr->producto." ( ".$pr->sku." ) "}}</option>
          @endforeach    
                                          
        </select> --> 
        <!--<div class="input-group-append">
          <button class="btn btn-secondary" type="button" id="">+</button>
        </div>-->

      </div>    
    </div>
  </div>

  <!--Tabla ventas-->
  <div class="table-responsive">
    <table class="table table-bordered table-hover" id="tblVentas">
      <thead class="">
      
      <tr>
      <th scope="col">Producto</th>
      <th scope="col" class="col-sm-2">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Subtotal</th>
      <th scope="col">Total</th>
      <th scope="col">Opciones</th>
      </tr>
      </thead>
      <tbody id="tblVentasBody">
                                      
      </tbody>
      </table>
  </div><!--fin tabla ventas-->

  <!--</form>-->
  
  <!--CARD OPCIONES DE COBRO-->
  <div class="card text-center">
    <div class="card-header">
    Metodo de Pago
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text"></p>

      <div class="row">
        <div class="col">
          <button title="" id="btnEfectivo" type="button" class="btn btn-success btn-block btn-flat btn-lg">
            
            <div class="text-center">
              <i class="fa fa-check" aria-hidden="true"></i>
              <b>Efectivo</b>
            </div>
          </button>
        </div>
        <div class="col-6">
          otro metodo de pago...
        </div>
        <div class="col">
          otro metodo de pago...
        </div>
      </div>

      
    </div>
    <div class="card-footer text-muted">
      
    </div>
  </div>
  
  <!--<button title="" id="btnCalculator" type="button" class="btn btn-success btn-flat pull-right m-5 btn-xs mt-10 popover-default" data-toggle="popover" data-trigger="click" data-html="true" data-placement="bottom" data-original-title="Calculator">
            <strong><i class="fa fa-calculator fa-lg" aria-hidden="true"></i></strong>
  </button> -->                               

</x-dg-card>


@endsection   
        
        
@section('js')
  <script type="text/javascript">
    $(document).ready(function() { 
      
      const node = document.getElementById("producto");
      //var producto = "";
      
      //console.log(producto);
      //EVENTO KEYUP DEL INPUT PRODUCTO
      node.addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
          event.preventDefault();
          console.log(producto);
          // Do more work
          if(document.getElementById("producto").value==""){
            Swal.fire("Seleccione un producto");
            return;
          } 
          
          //debo buscar la informacion del producto
          var formData = {
            _token: "{{ csrf_token() }}",
            id_producto : $('#id_producto').val()
          }

          $.ajax({
            url:"{{route('getProductInfo')}}",
            type:'post',
            data: formData,
            dataType: "json",
            success: function(response){
              console.log("exito");
              console.log(response)
              console.log(response[0].producto);
              /*Swal.fire({
                position: 'center',
                type: 'success',
                title: 'Customer creado correctamente',
                showConfirmButton: false,
                timer: 2500
                        
              }).then(() => { 
                //console.log('triggered redirect here');
                limpiar();
                window.location.href = "{{ url("/") }}/customers";  
              }); */
              
              //si encuentra la data entonces llena la tabla
              $('#tblVentasBody').append('<tr>' +
                '<td>' + response[0].producto + '</td>' + 
                '<td>' + '<input type="number" value="1" class="form-control" id="" name="" >' + '</td>' + 
                '<td>' + response[0].precio_venta + '</td>' +
                '<td>' + response[0].precio_venta + '</td>' + 
                '<td>' + response[0].precio_venta + '</td>' +
                '<td>' +                
                    '<a href="#" data-del_id_contacto="">' +
                        '<button class="btn btn-square" title="Eliminar"><i class="fas fa-trash-alt fa-1x"></i></button>' +
                    '</a>' +
                '</td>' +
              '</tr>');
                    
                                       
            },
            error: function(err) {
              console.log(err);
              if(err.status)
              {
                Swal.fire({
                    position: 'center',
                    type: 'error',
                    title: `${err.responseJSON.message}`,
                    showConfirmButton: true
                })
              }else{
                Swal.fire({
                position: 'center',
                type: 'error',
                title: 'Customer no registrado',
                showConfirmButton: true
                })
              }
                        
            }
          }); //FIN PETICION AJAX
          
          

        }//fin key enter
      });//fin event listener

      $( "#producto" ).autocomplete({
        
        source: function( request, response ) {
        // Fetch data
        $.ajax({

          url:"{{route('getAutocompleteProducts')}}",
          type: 'post',
          dataType: "json",
          data: {

            _token: "{{ csrf_token() }}",
            search: request.term
          },

          success: function( data ) {
            //console.log(data);
            response( data );
          }

        });

        },

        select: function (event, ui) {

          $('#producto').val(ui.item.label);
          $('#id_producto').val(ui.item.value);
          //producto = document.getElementById("producto").value; 
          //console.log(producto);
          return false;
        }

      });
      
      //$('#id_cliente').select2();
      
      //pantalla completa
      function alterna_modo_de_pantalla() {
        if ((document.fullScreenElement && document.fullScreenElement !== null) ||    // metodo alternativo
            (!document.mozFullScreen && !document.webkitIsFullScreen)) {               // metodos actuales
          if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
          } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
          } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
          }
        } else {
          if (document.cancelFullScreen) {
            document.cancelFullScreen();
          } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
          } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
          }
        }
      }

      //escape pantalla completa con la tecla esc
      /*document.addEventListener("keydown", function(e) {
        if (e.keyCode == 13) {
          alterna_modo_de_pantalla();
        }
      }, false);*/


      $('#btnEfectivo').on('click', function () {
        alert('paga');
      });


        
    });//fin document ready
    
  </script>
@stop        