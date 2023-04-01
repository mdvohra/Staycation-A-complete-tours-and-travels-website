<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
include('includes1/config.php');
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Payment | tourism_management</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/main.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	
	</head>
	
	<!-- HEAD TAG ENDS -->
	
	<!-- BODY TAG STARTS -->
	
	<body>
		
		
		
		
		<div class="spacer">a</div>
		
		<div class="col-sm-12 paymentWrapper">
			
			<div class="headingOne">
				
				Payment
				
			</div>
			<?php
			$uemail=$_SESSION['username'];;
$sql = "SELECT tblbooking.UserEmail as nm,tblbooking.BookingId as bookid,tblbooking.PackageId as pkgid,tbltourpackages.PackageName as packagename,tbltourpackages.PackagePrice as packageprice,tblbooking.FromDate as fromdate,tblbooking.ToDate as todate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.RegDate as regdate,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblbooking join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where UserEmail=:uemail";
$query = $dbh->prepare($sql);
$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
			<div class="totalAmount">
				
				Amount to be paid: <span class="sansSerif">₹</span> <?php echo htmlentities($result->packageprice);?>
				
			</div>
<?php }}	?>
			<!--<div class="col-sm-3"></div>-->
				
				
			<div class="col-sm-3"></div>
			
			<div class="col-sm-6">
				
				<div class="boxCenter">
				
				<div class="col-sm-12 tag">
					
					Card Number:
					
				</div>
				
				<div class="col-sm-12">
					
					<input type="text" class="input" name="cardNumber" placeholder="Enter the card number" id="cardNumber"/>
					
				</div>
				
				<div class="col-sm-12 tag">
					
					Name on Card:
					
				</div>
				
				<div class="col-sm-12">
					
					<input type="text" class="input" name="nameOnCard" placeholder="Enter the name of the card holder" id="nameOnCard"/>
					
				</div>
				
				<div class="col-sm-6 tag">
					
					CVV:
					
				</div>
				
				<div class="col-sm-6 tag">
					
					Expiry:
					
				</div>
				
				<div class="col-sm-6">
					
					<input type="password" class="inputSmall" name="cvv" placeholder="CVV" id="cvv"/>
					
				</div>
				
				<div class="col-sm-6">
					
					<input type="text" class="inputSmall" name="expiry" placeholder="MM/YY" id="cardExpiry"/>
					
				</div>
				
				<form action="bill.php" method="POST">
				
					<div class="col-sm-12 bookingButton text-center">
						<input type="submit" class="paymentButton" value="Pay Now">
					</div>
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>