{{-- <!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html>
<head>
    <title>My bill {{ strtotime($order->created_at) }}</title>
</head>
<body>
    <img src="img/logo.png" alt="">
    <h1>Bill N°{{ strtotime($order->created_at) }} </h1>
    <p>{{ date_format($order->created_at, 'd M Y') }}</p>
    
    <ul class="">
        <li>Bill N°{{ strtotime($order->created_at) }}</li>
        <li>{{ $order->paiement_firstname }}</li>
        <li>{{ $order->paiement_lastname }}</li>
        <li>{{ $order->paiement_phone }}</li>
        <li>{{ $order->paiement_email }}</li>
        <li>{{ $order->paiement_address }}</li>
        <li>{{ $order->paiement_city }}</li>
        <li>{{ $order->paiement_postalcode }}</li>
        <li>{{ $order->paiement_total }}</li>
    </ul>
</body>
</html> --}}

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="img/logo.png" alt=""></td>
        <td align="right">
            <h3>Shinra Electric power company</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td>N°{{ strtotime($order->created_at) }}</td>
        <td><strong>From:</strong> Colombia - Bogotá D.C.</td>
        <td><strong>To:</strong> France - {{ $order->paiement_city }}</td>
    </tr>
  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>Description</th>
        <th>Quantity</th>
        <th>££</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>        
        <td>Playstation IV - Black</td>
        <td align="right">1</td>
        <td align="right">1400.00</td>
        <td align="right">1400.00</td>
      </tr>
      <tr>
          
          <td>Metal Gear Solid - Phantom</td>
          <td align="right">1</td>
          <td align="right">105.00</td>
          <td align="right">105.00</td>
      </tr>
      <tr>
          
          <td>Final Fantasy XV - Game</td>
          <td align="right">1</td>
          <td align="right">130.00</td>
          <td align="right">130.00</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
            <td align="right">1635.00</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax $</td>
            <td align="right">294.3</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">$ 1929.3</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>