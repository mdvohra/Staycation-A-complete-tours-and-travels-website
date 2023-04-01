<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel | Hotels </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
<link href="/css/main.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="js/bootstrap.min.js"></script>
<style>
body{
    background: linear-gradient(45deg, #ff8080, #ffffb3);
	height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
	width:100%;
}
</style>

</head>




<body>
	<div class="container-fliud">
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
      <img src="stay.png" height="150" width="200">
    </div>
     <div class="collapse navbar-collapse" id="nav">
    <ul class="nav navbar-nav" style="float:right">
        <li><a href="Home.php">HOME</a></li>
		<li><a href="users_add.php">USERS</a></li>
              <li><a href="hotels_add.php">ADD HOTELS</a></li>
              <li><a href="hotelbookings_view.php">HOTEL BOOKINGS</a></li>
              <li><a href="flights_add.php">ADD FLIGHTS</a></li>
              <li><a href="flightbookings_view.php">FLIGHT BOOKINGS</a></li>
              <li><a href="trains_add.php">ADD TRAINS</a></li>
              <li><a href="trainbookings_view.php">TRAIN BOOKINGS</a></li>
			  <h3><a href="adminLogout.php">LOGOUT</a></h3>
    </ul>
  </div>
</div>
</nav>
</div>


	

    <div class="col-lg-8">
			<h1 class="text-danger text-center" style="font-weight:bold">Package Booking Details</h1>
			<br>
			<br>
			<div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectmeteor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT BookingId,PackageId,UserEmail,FromDate,Comment,UpdationDate FROM tblbooking";
$result = $conn->query($sql);

echo "
<center>
<table class='table table-striped table-bordered table-hover py-5' style='width:200%; border: 4px solid black; text:white; text-align: center;'>
<tr class='text-centre text-white'style='font-size:20px; background:black'>
<th>Package ID</th>
<th>Booking ID</th>
<th>User Email</th>
<th>From Date</th>
<th>Comments</th>


</tr>
</center>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      echo "<tr>";
echo "<td>" . $row['PackageId'] . "</td>";
echo "<td>" . $row['BookingId'] . "</td>";
echo "<td>" . $row['UserEmail'] . "</td>";
echo "<td>" . $row['FromDate'] . "</td>";
echo "<td>" . $row['Comment'] . "</td>";


echo "</tr>";


    }
} else {
    echo "0 results";
}

$conn->close();
?>
</div>
</div>
</body>
</html>
