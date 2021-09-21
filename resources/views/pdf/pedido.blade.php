<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
<style> 

body
{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 10;
	
}


#main {
  width: auto;

  border: 1px solid #c3c3c3;
  align-content: center;
  padding:10px
}

#main div {
  width: auto;

  align-content: center;
}

.th_cabecera
{
	font-weight:bold;
	text-align:center;
}
	
 
	
.tituloBoldLeft
{
	font-weight:bold;
	text-align:left;	
}
</style>
</head>
<body>

<div id="main">
  <div style="background-color:CAD7D7;">
    <table width="90%" border="0">
      <tbody>
        <tr>
          <td width="27%" class="tituloBoldLeft">SYS AdeconPeru</td>
          <td width="50%"><p class="tituloBoldLeft">PEDIDO {{strtoupper($pedido->nombre)}} NRO: {{$pedido->id}}</p></td>
          <td width="23%"><table width="200" border="0">
            <tbody>
              <tr>
                <td class="tituloBoldLeft">Fecha</td>
                <td> 
                
                {{date('Y-m-d', strtotime(str_replace('-','/', $pedido->created_at)))}}</td>
              </tr>
              <tr>
                <td class="tituloBoldLeft">Hora</td>
                <td>{{date('h:i a', strtotime($pedido->created_at))}}</td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </tbody>
    </table>

  
  </div>
  <div style="background-color:FFFFFF;">
  
  <table width="90%" border="0">
      <tbody  >
        <tr>
          <td colspan="2"><strong>Reporte de Pedido</strong></td>
        </tr>
        <tr>
          <td width="29%"> <p class="tituloBoldLeft">CLIENTE</p></td>
          <td width="71%">{{ Auth::user()->name}}</td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
    
  </div>
  <div style="background-color:FFFFFF;">
  <?php
$col1 = "10%";
$col2 = "20%";
$col3 = "30%";
$col4 = "40%";


  ?>
    <table width="90%" border="0">
      <tbody>
          <tr class="th_cabecera">
            <td width="6%">#</td>
            <td width="{{$col4}}" align="left">Nombre</td>
            <td width="9%">Proveedor</td>
            <td width="{{$col1}}" align="center">Laboratorio</td>
            <td width="{{$col1}}" align="center">Precio</td>
            <td width="{{$col1}}" align="center">Cantidad</td>
            <td width="{{$col1}}" align="center">Total</td>
            
 
          </tr>

          <?php $x=1;
          $total =0;
          ?>
          @foreach($detalles as $detalle)

            <tr>
              <td align="center">{{$x++}}</td>
              <td width="{{$col4}}">{{$detalle->prod_nombre}}</td>
              <td width="{{$col1}}" align="center">{{$detalle->prov_code}}</td>
              <td width="{{$col1}}" align="center">{{$detalle->pp_laboratorio}}</td>
              <td width="{{$col2}}" align="center">{{number_format($detalle->pp_precio,2)}}<</td>
              <td width="{{$col1}}" align="center">{{$detalle->pp_cantidad}}</td>
              <?php
              
              $subtotal = $detalle->pp_cantidad * $detalle->pp_precio;
              $total +=$subtotal; 
              ?>

              <td width="{{$col1}}" align="right">{{number_format($subtotal,2)}}</td>
  
    
   
            </tr>
          @endforeach  

          <tr>
          <td>&nbsp;</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>

          </tr>


          <tr  >
          <td ></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><p class="tituloBoldLeft">Total</p></td>
          <td><p class="tituloBoldLeft">{{number_format($total,2)}}</p></td>

          </tr>

        </tbody>
      </table>
  </div>
</div>

<p>&nbsp;</p>

</body>
</html>