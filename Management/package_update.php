<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Panel | Hotels </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
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
<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="projectmeteor";
$PackageId="";
$PackageName="";
$PackageType="";
$PackageLocation="";
$PackagePrice="";
$PackageFetures="";
$PackageDetails="";
$PackageImage="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//connect to mysql database
try{
	$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
	echo("Connection Error");
}
//get data from the form
function getData()
{
	$data = array();

	//$data[1]=$_POST['PackageId'];
	$data[2]=$_POST['PackageName'];
	$data[3]=$_POST['PackageLocation'];
	$data[4]=$_POST['PackagePrice'];
    $data[5]=$_POST['PackageFetures'];
    $data[6]=$_POST['PackageDetails'];
    $data[7]=$_POST['PackageImage'];
    
	return $data;
}

//insert
if(isset($_POST['insert'])){
	$info = getData();
	$insert_query="INSERT INTO `tbltourpackages`(`PackageName`, `PackageType`, `PackageLocation`,`PackagePrice`,`PackageFetures`,`PackageDetails`,`PackageImage`) VALUES ('$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]')";
	try{
		$insert_result=mysqli_query($conn, $insert_query);
		if($insert_result)
		{
			if(mysqli_affected_rows($conn)>0){
				echo("Data inserted successfully");

			}else{
				echo("Data not inserted");
			}
		}
	}catch(Exception $ex){
		echo("error inserted".$ex->getMessage());
	}
}
//delete
if(isset($_POST['delete'])){
	$info = getData();
	$delete_query = "DELETE FROM `tbltourpackages` WHERE PackageId = '$info[0]'";
	try{
		$delete_result = mysqli_query($conn, $delete_query);
		if($delete_result){
			if(mysqli_affected_rows($conn)>0)
			{
				echo("Data deleted");
			}else{
				echo("Data not deleted");
			}
		}
	}catch(Exception $ex){
		echo("Error in deleting".$ex->getMessage());
	}
}

?>
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


	<div class="container-fluid" >
	  <div class="row mx-5 my-5" style="display: flex;
  justify-content: center;">
	    <div class="col-lg-4">
<form method ="post"   action="">  
  <h4>Package ID (Use to Search hotel's detail)</h4>
  <input type="number" name="PackageImage "  class="form-control" placeholder="Hotel ID /Automatic Number Genrates" value="<?php echo($PackageId);?>" disabled>

	<div class="form-group row">
	<div class="col-xs-6">
		<h4>Package Name</h4>
	<input type="text" name="PackageName" class="form-control" placeholder="Enter package name" required>
</div>

<div class="col-xs-6">
	<h4>Package Type</h4>
	<input type="text" name="PackageType" class="form-control" placeholder="Enter package type" required>
</div>

<div class="col-xs-6">
	<h4>Package Location</h4>
	<input type="text" name="PackageLocation" class="form-control" placeholder="Enter Package Location" required>
</div>

<div class="col-xs-6">
<h4>Package Price</h4>
	<input type="int" name="PackagePrice" class="form-control" placeholder="Enter Package Price" required>
</div>

<div class="col-xs-6">
	<h4>Package Features</h4>
	<input type="text" class="form-control" name="PackageFetures"  placeholder="Enter Package Fetures" required>
</div>


	<div class="col-xs-6">
		<h4>Package Details</h4>
  <input type="text" name="PackageDetails" class="form-control" placeholder="Enter Package Details" required>
</div>

<div class="col-xs-6">
		<h4>Image link</h4>
<label for="myfile">Select a file:</label>
<input type="file" id="myfile" name="PackageImage"></div>

</div>

	<div>
		<input type="submit" class="btn btn-success btn-block btn-lg" name="insert" value="Add">
    <a href=""class="btn btn-info btn-block btn-lg">Update | Delete | Search</a>


	</div>
</form>
</div>
</div>
<br>
<br>

    <div class="col-lg-8">
			<h1 class="text-danger text-center" style="font-weight:bold">HOTELS DETAILS</h1>
			<hr>
			<br>
			<br>
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

$sql = "SELECT * from tbltourpackages";
$result = $conn->query($sql);

echo "<div class='col-xs-6'>
<table class='table table-striped table-bordered table-hover py-5' style='width:200%; border: 4px solid black; text:white; text-align: center;'>
<tr class='text-centre text-white'style='font-size:20px; background:black;'>
<th>Package Name</th>
<th>Package Type</th>
<th>Package Location</th>
<th>Package Price</th>
<th>Package Fetures</th>
<th>Package Details</th>
<th>Package Image</th>



</tr>
</div>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      echo "<tr>";

echo "<td>" . $row['PackageName'] . "</td>";
echo "<td>" . $row['PackageType'] . "</td>";
echo "<td>" . $row['PackageLocation'] . "</td>";
echo "<td>" . $row['PackagePrice'] . "</td>";
echo "<td>" . $row['PackageFetures'] . "</td>";
echo "<td>" . $row['PackageDetails'] . "</td>";
echo "<td>" . $row['PackageImage'] . "</td>";


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
