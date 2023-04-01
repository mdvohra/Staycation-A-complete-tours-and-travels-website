<?php
session_start();
error_reporting(0);
include('includes/config.php');

	


?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="css/style11.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="script.js"></script>
	</head>
	
	<body>
	
		<header>
		
			<h1>Invoice</h1>
			<address contenteditable>
				<p>Staycation</p>
				<p>Opp jyoti hall<br>Nr veg market</p>
				<p>Valsad-396001</p>
			</address>
			<span><img alt="" src="images/11.jpg	" height="120" width="150"></span>
		</header>
		
		<article>
			
			

			<?php 

$uemail=$_SESSION['login'];;
$sql = "SELECT tblbooking.BookingId as bookid,tblbooking.PackageId as pkgid,tbltourpackages.PackageName as packagename,tbltourpackages.PackagePrice as packageprice,tblbooking.FromDate as fromdate,tblbooking.ToDate as todate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.RegDate as regdate,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblbooking join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where UserEmail=:uemail";
$query = $dbh->prepare($sql);
$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td>#BK<?php echo htmlentities($result->bookid);?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable><?php echo htmlentities($result->regdate);?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>Rs<?php echo htmlentities($result->packageprice);?></td>
				</tr>

			</table>
			<?php }} ?>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Name</span></th>
						<th><span contenteditable>Package</span></th>
						<th><span contenteditable>Rate</span></th>
						<th><span contenteditable>Days</span></th>
						<th><span contenteditable>Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Mohammad Vohra</td>
						<td><a href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid);?>"><?php echo htmlentities($result->packagename);?></a></td>
						<td><span data-prefix>Rs .<?php echo htmlentities($result->packageprice);?></td>
						<td><span contenteditable>3N-4D</span></td>
						<td><span data-prefix>Rs .<?php echo htmlentities($result->packageprice);?></td>
					</tr>
				</tbody>
			</table>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br><br>
			<br>
			
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>Rs .<?php echo htmlentities($result->packageprice);?></</span></td>
				</tr>
				<br>
				<br>
				<tr>
					<th><span contenteditable>Amount Paid</span></th>
					<td><span data-prefix>Rs .<?php echo htmlentities($result->packageprice);?></</span></td>
				</tr>
				
			</table>
		</article>
		<br>
			<br>
			<br>
			<br>
			<br>
			<br><br>
			<br>
			<br>
			<br>
			<br>
		<aside>
		
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>A finance charge of 1.5% is levied mandatory on card transactions</p>
			</div>
		</aside>
		<span style="float:right;"><a href="javascript:window.print()" type="button" class="btn">PRINT</a></span>
	</body>
</html>