<?php
// ------------------------------------------------------------
// INCORRECT PAYMENT AMOUNT FOR REGULAR SUBSCRIPTION
// SEND E-MAIL TO ADMIN FOR INVESTIGATION
// ------------------------------------------------------------
// ------------------------------------------------------------
// CREATE HTML E-MAIL
// ------------------------------------------------------------
$from_address = NO_REPLY;
$to = GENERAL_CONTACT;
$subject = 'PayPal Subscription Error...';
$priority = 1;
$message = '
<html>
<head>
  	<title>PayPal Subscription Error...</title>
</head>
<body>
  	<p>Hello Admin,</p>
	<p>This is an automated e-mail to let you know that there was a problem with a PayPal transaction for your premium subscription site. Some one was paying for a Subscription  but the <strong>Amount Paid</strong> does NOT match the value in the database.</p>
	<p>This transaction was flagged as a bad transaction and a record was created in the databse.</p>
	<p><strong>Transaction Details:</strong></p>
	<p>
		Payment Status: '.$payment_status.'<br/>
		Item Name: '.$item_name.'<br/>
		Item Number: '.$item_number.'<br/>
		<span style="font-weight:bold;color:Red">Gross Amount: '.$mc_gross.'</span><br/>
		<span style="font-weight:bold;color:Red">Membership Amount: '.$membership_fee.'</span><br/>
		Trial-1 Amount: '.$trial_period_1.'<br/>
		Trial-2 Amount: '.$trial_period_2.'<br/>
		Currency: '.$payment_currency.'<br/>
		Transaction ID: '.$txn_id.'<br/>
		Transaction Type: '.$txn_type.'<br/>
		Payment Receiver: '.$receiver_email.'<br/>
		Payer Email: '.$payer_email.'<br/>
		User Name: '.$user_name.'<br/>
		Subscription ID: '.$rates_id.'
	</p>
	<p>Sincerely,<br/>Your Automated Alert System</p>
	<h2>Raw Data Sent By PalPal:</h2>
	<p>'.$postdata.'</p>
</body>
</html>
';

// ------------------------------------------------------------
// SET HEADERS FOR HTML MAIL
// ------------------------------------------------------------
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$headers .= 'To: <'.$from_address.'>' . "\r\n";
$headers .= 'From: PayPal Subscription Error <'.$from_address.'>' . "\r\n";
//$headers .= 'Cc: '.$from_address.'' . "\r\n";
//$headers .= 'Bcc: '.$bcc.'' . "\r\n";
$headers .= 'X-Priority: '.$priority.'' . "\r\n";

// ------------------------------------------------------------
// SEND E-MAIL
// ------------------------------------------------------------
mail($to, $subject, $message, $headers);
?>