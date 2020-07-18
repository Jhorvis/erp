<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
    <style type="text/css">
 .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 5px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 40px 40px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 90%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: left;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 2px;
  text-align: left;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
  text-align: right !important;
}

table td.grand {
  border-top: 1px solid #5D6975;
  text-align: right !important;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}


    </style>
  </head>
   <body>
    <header class="clearfix">
    
      <h1>INVOICE {{ $invoice }}</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        
        <div><span>CLIENTE</span> ________________________</div>
        <div><span>DIRECCIÓN</span> ________________________</div>
        <div><span>TELÉFONO</span> ________________________</div>
        <div><span>FACTURA No.</span> ________________________</div>
        <div><span>FECHA</span> {{ $date }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th style="width: 5%;">Item</th>
            <th >Producto</th>
            <th>Cantidad</th>
            <th>Precio U</th>

            <th>Precio N.</th>
          </tr>
        </thead>
        <tbody>
                      <?php $i = 1; ?>
            @foreach($products as $products)
            <tr>

              <td style="width: 5%;">{{ $i }}</td>
              <td>{{ $products->name }}</td>
              <td>{{ $products->quantity }}</td>
              <td>{{ number_format($products->price / 1.19,2,',','') }}</td>
              <td>{{ number_format(($products->price * $products->quantity)/1.19)}}</td>

            <?php $i++; ?>
          </tr>
          @endforeach
          <tr>
            <td  class="total" colspan="4">SUBTOTAL</td>
            <td class="total">{{ number_format($totalNeto) }}</td>
          </tr>
          <tr>
            <td class="total" colspan="4">IVA 19%</td>
            <td class="total">{{ number_format($totalPrice - $totalNeto)}}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">{{ number_format($totalPrice) }}</td>
          </tr>
        </tbody>
      </table>
    </main>

  </body>
</html>