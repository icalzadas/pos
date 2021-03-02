@extends('adminlte::page')

@section('content')

<!--<x-dg-card title="Productos" bg="primary" :outline="true" :full="false" :collapsed="false" :maximizable="true" :removable="true" :disabled="false">
    ...
</x-dg-card>-->

@if($estatus_caja_user==1)


<x-dg-card title="Terminal POS - {{$nombre_caja}}" bg="primary" :outline="true" :full="false" :collapsed="false" :maximizable="false" :removable="false" :disabled="false">

  <!--<x-dg-select2 id="myID">
      <x-dg-option value="val">pantalon</x-dg-option>
      <x-dg-option value="val">short</x-dg-option>
      <x-dg-option value="val">camisa</x-dg-option>
  </x-dg-select2>-->
  
  <form method="" action="" enctype="multipart/form-data" id="frmVentas">
  @csrf

  <!--id de la tabla operaciones_caja, sirve para guardar las ventas respectivas a la caja abierta-->
  <input type="hidden" autocomplete="off" class="form-control" id="id_operacion_caja" name="id_operacion_caja" value="{{$id_operacion_caja}}">
  <input type="hidden" autocomplete="off" class="form-control" id="tipo_pago" name="tipo_pago" >

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

    <!--CLIENTE-->
    <div class="form-group col-md-6">
      <div class="input-group mb-3">
      
        <!--<div class="input-group-prepend">
          <div class="input-group-text bg-transparent">
            <i class="far fa-address-card "></i>
          </div>
        </div>-->
        
        <select name="id_cliente" id="id_cliente" class="custom-select" title="Selecciona cliente">
          @foreach($clientes as $c)
            <option value="{{$c->id}}">{{$c->nombre." ".$c->materno}}</option>
          @endforeach    
                                          
        </select>         

      </div>    
    </div>
  </div>

  <!--FILA CLIENTE Y PRODUCTO-->
  <div class="form-group form-row">
    <!--TIPO DE PRECIO-->
    <div class="form-group col-md-6">
      <div class="input-group mb-3">
      
        <div class="input-group-prepend">
          <div class="input-group-text bg-transparent border-right-0">
            <span class="fas fa-money-check-alt"></span>
          </div>
        </div>
        <select name="tipo_precio" id="tipo_precio" class="custom-select" title="Tipo de precio">
          <option value="general" selected>Precio publico en general</option>
          <option value="mayoreo" >Precio mayoreo</option>                     
                                          
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
             
                                          
        </select> --> 
        <!--<div class="input-group-append">
          <button class="btn btn-secondary" type="button" id="">+</button>
        </div>-->

      </div>    
    </div>
  </div>

  <div class="form-group form-row">
    <div class="form-group col-auto">                                                  
        <button type="button" class="btn btn-success" id="btnAgregarProducto"><i class="fas fa-plus fa-1x"></i>&nbsp;Agregar producto</button>                                                  
                                                  
    </div>
  </div>

  <!--Tabla ventas-->
  <div class="table-responsive">
    <table class="table table-bordered table-hover" id="tblVentas">
      <thead class="">
      
      <tr>
      <th scope="col" >ID Producto</th>
      <th scope="col">Producto</th>
      <th scope="col" class="">Cantidad</th>
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

  <!--informacion del pago-->
  <div class="card text-center">
    <div class="card-header">
      Informacion de pago
    </div>
    <div class="card-body">      

      <div class="row">
        <div class="form-group col">
          <label for="total_venta" class="col-form-label">Total a pagar:</label>
          <input type="text" autocomplete="off" class="form-control" id="total_venta" name="total_venta" placeholder="" title="" readonly>  
        </div>
        <div class="form-group col">
          <label for="efectivo_pago" class="col-form-label">Paga con:</label>
          <input type="text" autocomplete="off" class="form-control" id="efectivo_pago" name="efectivo_pago" placeholder="" title="" onkeypress="return solonumeros(event);">  
        </div>
        <div class="form-group col">
          <label for="cambio" class="col-form-label">Su cambio:</label>
          <input type="text" autocomplete="off" class="form-control" id="cambio" name="cambio" placeholder="" title="" readonly>  
        </div>
      </div>

      
    </div>
    
  </div>

  </form>
  
  <!--CARD OPCIONES DE COBRO-->
  <div class="card text-center">
    <div class="card-header">
    Metodo de Pago
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <p class="card-text"></p>

      <div class="row">
        <div class="col-6">
          <button title="" id="btnEfectivo" type="button" class="btn btn-success btn-block btn-flat btn-lg">
            
            <div class="text-center">
              <i class="fa fa-check" aria-hidden="true"></i>
              <b>Efectivo</b>
            </div>
          </button>
        </div>
        <div class="col-6">
          <button title="" id="btnCredito" type="button" class="btn btn-warning btn-block btn-flat btn-lg">
            
            <div class="text-center">
              <i class="fa fa-check" aria-hidden="true"></i>
              <b>Credito</b>
            </div>
          </button>
        </div>
        <div class="col">
          
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
@else

<div class="card card-default">
  <div class="card-header">
    <h3 class="card-title">
      <i class="fas fa-exclamation-triangle"></i>
        Caja cerrada
    </h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-ban"></i> Caja cerrada!</h5>
      Pide al admin la apertura de caja correspondiente
    </div>
                
  </div>
  <!-- /.card-body -->
  </div>


@endif

@endsection   
        
        
@section('js')
  <script type="text/javascript">
    //solo numeros y tecla retroceso
    function solonumeros(e) {
      tecla = (document.all) ? e.keyCode : e.which;

      //Tecla de retroceso para borrar, siempre la permite
      if (tecla == 8) {
        return true;
      }

      // Patron de entrada, en este caso solo acepta numeros
      patron = /[0-9,.]/;
      tecla_final = String.fromCharCode(tecla);
      return patron.test(tecla_final);
    }

    //hace los calculos instantaneos en la tabla de los productos
    function Calcular(ele) {

      var cantidad = 0, precunit = 0, totalitem = 0, sumatotal=parseFloat(document.getElementById("total_venta").value);
      var tr = ele.parentNode.parentNode;
      //console.log("calcular")
      //console.log(sumatotal)

      $(tr).each(function() {

        //totalitem_aux = $(this).find("td:eq(5) > input").val();

        var totalitem = $(this).find("td:eq(2) > input").val()/*cantidad*/  * $(this).find("td:eq(3) > input").val();//precio unitario; 

        $(this).find("td:eq(5) > input").val(totalitem); //total
        $(this).find("td:eq(4) > input").val(totalitem);  //subtotal

        //console.log(totalitem_aux)
        //console.log(totalitem)

        /*if(totalitem<totalitem_aux){
          sumatotal=sumatotal-parseFloat($(this).find("td:eq(3) > input").val());
        }else if(totalitem==totalitem_aux){
          sumatotal=sumatotal;
        }else{
          sumatotal=sumatotal+parseFloat($(this).find("td:eq(3) > input").val());
        }*/

        
      });

      var sum = 0;
      $('.total').each(function() {
        sum += parseFloat($(this).val());
      });
      
      //console.log("summmmm")
      //console.log(sum)

      //console.log("calcular")
      //console.log(sumatotal)

      document.getElementById("total_venta").value = sum;
    }
    
    $(document).ready(function() { 
      var total_venta = 0;
      const node = document.getElementById("producto");
      const ep = document.getElementById("efectivo_pago");
      const cambio = document.getElementById("cambio");
      const tv = document.getElementById("total_venta");
      
      //var producto = "";

      //MANEJA EL CAMBIO AL CLIENTE
      ep.addEventListener("keyup", function(event) {
        console.log(ep.value);
        console.log(tv.value);
        cambio.value = ep.value - tv.value;
      });      
      
      //console.log(producto);
      //EVENTO KEYUP DEL INPUT PRODUCTO
      node.addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
          event.preventDefault();
          //console.log(producto);
          // Do more work 
          var tipo_precio =  $('#tipo_precio').val();        

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

              if(tipo_precio=="general"){
                precio = response[0].precio_venta;

              } else if(tipo_precio=="mayoreo"){
                precio = response[0].precio_mayoreo;
                if(precio == null || precio==""){
                  Swal.fire("El producto seleccionado no cuenta con precio por mayoreo");
                  return;
                }
              } else{
                precio = response[0].precio_venta;
              }            
              
              //si encuentra la data entonces llena la tabla
              $('#tblVentasBody').append('<tr>' +
                '<td>' + '<input readonly type="text" value="'+response[0].id + '" class="form-control"  name="id_producto_tabla[]" >' + '</td>' +
                '<td>' + response[0].producto + '</td>' + 
                '<td>' + '<input type="number" value="1" class="form-control"  name="cantidad[]" onChange="Calcular(this)" onKeyup="Calcular(this)" min="1">' + '</td>' + 
                '<td>' + '<input readonly type="text" value="'+precio + '" class="form-control"  name="precio_venta[]" >' + '</td>' +
                '<td>' + '<input readonly type="text" value="'+precio + '" class="form-control subtotal"  name="subtotal[]" >' + '</td>' + 
                '<td>' + '<input readonly type="text" value="'+precio + '" class="form-control total"  name="total[]" >' + '</td>' +
                '<td>' +                
                    '<a href="#" >' +
                        '<button class="btn btn-square" title="Eliminar"><i class="fas fa-trash-alt fa-1x"></i></button>' +
                    '</a>' +
                '</td>' +
              '</tr>');

              total_venta = parseFloat(total_venta) + parseFloat(precio);
              //console.log("total venta abajo");
              //console.log(total_venta);
              //console.log(total_venta);
              
              console.log(tv.value)
              if(tv.value==null || tv.value==""){
                console.log("epa null")
                tv.value=0;
              }
              console.log(tv.value) 

              tv.value=parseFloat(tv.value)+parseFloat(total_venta);
              document.getElementById("producto").value="";
              total_venta = 0;      
                                       
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
                title: 'Venta no registrada',
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
            search: request.term,
            id_sucursal: $('#id_sucursal').val()
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
          console.log('sucursal:'+$('#id_sucursal').val());
          return false;
        }

      });
      
      $('#id_cliente').select2();
      
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

      //submit nuevo contacto customer
      $("#frmVentas").submit(function (e) {
        e.preventDefault();
      });

      $('#btnAgregarProducto').on('click', function () {
          var tipo_precio =  $('#tipo_precio').val(); 

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

              if(tipo_precio=="general"){
                precio = response[0].precio_venta;

              } else if(tipo_precio=="mayoreo"){
                precio = response[0].precio_mayoreo;
                if(precio == null || precio==""){
                  Swal.fire("El producto seleccionado no cuenta con precio por mayoreo");
                  return;
                }
              } else{
                precio = response[0].precio_venta;
              } 
              
              //si encuentra la data entonces llena la tabla
              $('#tblVentasBody').append('<tr>' +
                '<td>' + '<input readonly type="text" value="'+response[0].id + '" class="form-control" name="id_producto_tabla[]" >' + '</td>' +
                '<td>' + response[0].producto + '</td>' + 
                '<td>' + '<input type="number" value="1" class="form-control"  name="cantidad[]" onChange="Calcular(this)" onKeyup="Calcular(this)" min="1">' + '</td>' + 
                '<td>' + '<input readonly type="text" value="'+precio + '" class="form-control"  name="precio_venta[]" >' + '</td>' +
                '<td>' + '<input readonly type="text" value="'+precio + '" class="form-control subtotal"  name="subtotal[]" >' + '</td>' + 
                '<td>' + '<input readonly type="text" value="'+precio + '" class="form-control total"  name="total[]" >' + '</td>' +
                '<td>' +                
                    '<a href="#" >' +
                        '<button class="btn btn-square" title="Eliminar"><i class="fas fa-trash-alt fa-1x"></i></button>' +
                    '</a>' +
                '</td>' +
              '</tr>');

              total_venta = parseFloat(total_venta) + parseFloat(precio);
              //console.log("total venta abajo");
              //console.log(total_venta);
              //console.log(total_venta);
              
              console.log(tv.value)
              if(tv.value==null || tv.value==""){
                console.log("epa null")
                tv.value=0;
              }
              console.log(tv.value) 

              tv.value=parseFloat(tv.value)+parseFloat(total_venta);
              document.getElementById("producto").value="";
              total_venta = 0;      
                                       
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
                title: 'Venta no registrada',
                showConfirmButton: true
                })
              }
                        
            }
          }); //FIN PETICION AJAX    
      });

      $('#btnEfectivo').on('click', function () {
        //console.log('paga');
        //validaciones
        var id_sucursal =  $('select[name=id_sucursal]').val();
        var tot_venta = $("#total_venta").val();
        var cambio = $("#cambio").val();
        var efectivo_pago = $("#efectivo_pago").val();

        //envio el tipo de pago con la palabra Efectivo, este ya debe existir en la tabla tipos_pago
        $("#tipo_pago").val("Efectivo");

        if(id_sucursal==""){
          $("#id_sucursal").focus();
          Swal.fire("Selecciona una sucursal");
          return;
        }

        if(tot_venta==""){  
          $("#producto").focus();        
          Swal.fire("No hay nada que cobrar");
          return;
        }

        if(efectivo_pago==""){ 
          $("#efectivo_pago").focus();         
          Swal.fire("Con cuanto paga el cliente?");
          return;
        }

        if(parseFloat(efectivo_pago)<parseFloat(tot_venta)){
          $("#efectivo_pago").focus();         
          Swal.fire("El total a pagar es mayor al efectivo ingresado");
          return;
        }

        var formData = new FormData(document.getElementById('frmVentas'));
        
        $.ajax({
          url:"{{route('store_ventas')}}",
          type:'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(response){
            console.log("exito venta");
            console.log(response);
            total_venta = 0;
            tv.value="";
            Swal.fire({
                position: 'center',
                type: 'success',
                title: 'Venta exitosa',
                showConfirmButton: false,
                timer: 2500
                
            }).then(() => { 
                //console.log('triggered redirect here');
                //limpiar();
                //window.location.href = "{{ url("/") }}/customers"; 
                $("#tblVentasBody").children().remove() 
                $("#frmVentas")[0].reset();
                //total_venta = 0;
            }); 
                    
                                       
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
              title: 'Venta no registrada',
              showConfirmButton: true
              })
            }
                        
          }
        });
      });


        
    });//fin document ready
    
  </script>
@stop        