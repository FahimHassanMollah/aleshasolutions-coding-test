<!DOCTYPE html>
<html>
<body>
<h1>New Order!</h1>
<p>Thank you {{ $customer->name?? "" }}, for shopping from our system.</p>
<p>Your Order Id: {{ $order->id }}</p>
<p>Total Amount: {{ $order->total }}</p>
<p>Pay Status: {{ $order->pay_status }}</p>
</body>
</html>
