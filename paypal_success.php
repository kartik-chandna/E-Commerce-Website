<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Untitled Document</title>
</head>
<body>

	<h2>Welcome Guest!</h2>

	<h3>You have successfully paid for this product</h3>

	<b>Please go to your account</b><br>
	<a href="customer/my_account.php">Go to My Account</a>

	<!--Script for Storing Paypal Payment Information-->
	<?php
	include("includes/db.php");
	$transaction_id = $_REQUEST['tx']; // Paypal transaction ID
	$amount = $_REQUEST['amt'];  // Paypal received amount
	$currency = $_REQUEST['cc'];  // Paypal received currency type

	$insert_payment = "insert into paypal_payments (transaction_no,amount,currency) values('$transaction_id','$amount','$currency')";
	$run_payment = mysqli_query($con ,$insert_payment);
	$empty_cart = "delete * from cart";
	$run_cart = mysqli_query($con , $empty_cart);

	?>
	
</body>
</html>