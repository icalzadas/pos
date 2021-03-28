<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
</head>
<body>
    <u>Detalle de venta:</u> <br/>
    Sucursal: {{$venta->sucursal->sucursal}} <br/>
    Cliente: {{$venta->cliente->nombre}}  {{$venta->cliente->paterno}}<br/>
    Fecha: {{$venta->fecha_venta}} <br/>
    Tipo de pago: {{$venta->tipoPago->tipo_pago}} <br>
    <hr>
    <table class="default">
        @foreach($venta->detalleVenta as $detalle)
        <tr>
            <td>Producto: {{$detalle->producto->producto}}</td>
            <td>Cantidad: {{$detalle->cantidad}}</td>
            <td>Precio: {{$detalle->precio_venta}}</td>
        </tr>
        @endforeach
    </table>
    Paga con: {{$venta->efectivo}} <br>
    Cambio: {{$venta->cambio}} <br>
    Costo total: {{$venta->total}}
    <br>
    <button type="submit" id="imprimir">Imprimir ticket</button>
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script>
        $(function(){
            $("#imprimir").click(function(){
                $.post('/ventas/ticket/{{$venta->id}}', {
                    id: {{$venta->id}},
                    _token: "{{ csrf_token() }}"
                }).done(function(){
                    window.close();
                }).fail(function(e){
                    alert("No se puedo realizar la impresión");
                    console.log(e);
                });
            })
        })
    </script>
</body>
</html>