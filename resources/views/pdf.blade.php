<!DOCTYPE html>
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
</html>
