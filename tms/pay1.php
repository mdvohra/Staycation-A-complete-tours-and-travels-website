<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
$fname=$_POST['fname'];
$email=$_POST['email'];	
$card_num=$_POST['card_num'];
$cvv=$_POST['cvv'];	
$exp_month=$_POST['exp_month'];
$exp_year=$_POST['exp_year'];
$sql="INSERT INTO  tblpayment(fname,email,card_num,cvv,exp_month,exp_year) VALUES(:fname,:email,:card_num,:cvv,:exp_month,:exp_year)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':card_num',$card_num,PDO::PARAM_STR_NATL);
$query->bindParam(':cvv',$cvv,PDO::PARAM_STR_NATL);
$query->bindParam(':exp_month',$exp_month,PDO::PARAM_STR_NATL);
$query->bindParam(':exp_year',$exp_year,PDO::PARAM_STR_NATL);
$query->execute();

echo "<script type='text/javascript'> document.location = 'thankyou1.php'; </script>";

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Tourism Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>
<!-- top-header -->
<div class="top-header">
<?php //include('includes/header.php');?>
<div class="banner-1 ">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Staycation</h1>
	</div>
</div>
<!--- /banner-1 ---->
<!--- privacy ---->
<div class="privacy">
	<div class="container">
		<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Payment Portal</h3>
		<form name="pay1" method="post" >
		 <?php if($msg){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($msg); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>Payment Done</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	<p style="width: 350px;">
		
			<b>Full name as on card</b>  <input type="text" name="fname" class="form-control" id="fname" placeholder="Full Name" required="">
	</p> 
<p style="width: 350px;">
<b>Email</b>  <input type="email" name="email" class="form-control" id="email" placeholder="Valid Email id" required="">
	</p> 

	<p style="width: 350px;">
<b>Card No</b>  <input type="text" name="card_num" class="form-control" id="card_num" maxlength="14" placeholder="xxxx-xxxx-xxxx" required="">
	</p> 

	<p style="width: 350px;">
<b>Cvv</b>  <input type="password" name="cvv" class="form-control" id="cvv"  placeholder="xxx" required="">
	</p> 
	<p style="width: 350px;">
<b>Exp Month</b>  <input type="text" name="exp_month" class="form-control" id="exp_month"  placeholder="MM" required="">
	</p> 
<p style="width: 350px;">
<b>Exp Year</b>  <input type="text" name="exp_year" class="form-control" id="exp_year"  placeholder="YYYY" required="">
	</p> 
			<p style="width: 350px;">
<button type="submit" name="submit1" class="btn-primary btn">Submit</button>
			</p>
			</form>

		
	</div>
</div>
<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>