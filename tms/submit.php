<?php
error_reporting(0);
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$cno=$_POST['cno'];
$email=$_POST['email'];
$cvv=md5($_POST['cvv']);
$exp_month=$_POST['exp_month'];
$exp_year=$_POST['exp_year'];
$sql="INSERT INTO  tblpayment(name,email,card_num,cvv,exp_month,exp_year) VALUES(:name,:email,:card_num,:cvv,:exp_month,:exp_year)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam('card_num',$cno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':cvv',$cvv,PDO::PARAM_STR);
$query->bindParam(':exp_month',$exp_month,PDO::PARAM_STR);
$query->bindParam(':exp_year',$exp_year,PDO::PARAM_STR);
$query->execute();
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta
	name="viewport"
	content="width=device-width,
			initial-scale=1.0"/>
	<link rel="stylesheet" href="style.css"
		class="css" />
</head>
<body>
	<div class="container">
	

	<div class="centre-content">
		<h1 class="price" ALIGN=CENTER>STAYCATION</span></h1>
		
	</div>
	
	<div class="card-details">
		<p>Pay using Credit or Debit card</p>

		<div class="card-number">
<form action="submit.php" method="POST" id="paymentFrm">
    <p>
        <label>Name</label>
        <input type="text" name="name" size="20" />
    </p>
    <p>
        <label>Email</label>
        <input type="text" name="email" size="20" />
    </p>
    <p>
        <label>Card Number</label>
        <input type="text" name="card_num" size="20" autocomplete="off" 
class="card-number" />
    </p>
    <p>
        <label>CVV</label>
        <input type="text" name="cvv" size="4" placeholder="xxx" autocomplete="off" class="card-cvc" />
    </p>
    <p>
        <label>Expiration (MM/YYYY)</label>
        <input type="text" name="exp_month" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_year" size="4" class="card-expiry-year"/>
    </p>

    <button type="submit" id="payBtn">Submit Payment</button>
</div>
</div>
</form>
</html>