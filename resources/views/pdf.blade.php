<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
					Colombia - Bogotá D.C.
					Tax ID
					phone
					fax
				</pre>
			</td>
		</tr>
  	</table>
  	<p>Commande number N°{{ strtotime($order->created_at) }}</p>
 	<table align="left" width="100%">
		<tr>
			<td>
				<p>Shipping Address:</p>
				<pre>
					{{ $order->paiement_firstname }} {{ $order->paiement_lastname }} 
					{{ $order->paiement_address }}
					{{ $order->paiement_postalcode }}
					{{ $order->paiement_city }}							 
					{{ $order->paiement_phone }}
				</pre>
			</td>
		</tr>
  	</table>
	<br/>
	<table width="100%">
		<thead style="background-color: lightgray;">
			<tr>
				<th>Description</th>
				<th>Unit Price $</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($order->products as $product) 
			<tr>             
				<td>{{ $product->name }}</td>
				<td align="right">{{ $product->price }}</td>
				<td align="right">{{ $product->pivot->quantity }}</td>
			</tr>
			@endforeach 
		</tbody>
		<tfoot>        
			<tr>
				<td colspan="3"></td>
				<td align="right">Tax $</td>
				<td align="right">00.00</td>
			</tr>        
			<tr>
				<td colspan="3"></td>
				<td align="right">Total $</td>
				<td align="right" class="gray">$ {{ $order->paiement_total }}</td>
			</tr>        
		</tfoot>
	</table>
</body>
</html>