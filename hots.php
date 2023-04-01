<?php session_start();
if(!isset($_SESSION["username"]))
{
    	header("Location:blocked.php");
   		$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
}
?>

<!DOCTYPE html>

<html lang="en">
	
	<!-- HEAD TAG STARTS -->

	<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
		<title>Hotel Search | tourism_management</title>
    
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
		
		<?php include("common/headerLoggedIn.php"); ?>
		
		
		
		<div class="spacer">a</div>
		
		<div class="searchHotels">
					
			
			

		<?php
		
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "projectmeteor";
			
			// Creating a connection to MySQL database
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Checking if we've successfully connected to the database
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
			$sql = "SELECT * FROM hotels";
			$rowcount = mysqli_num_rows(mysqli_query($conn,$sql));
			
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				
		?>
		
			<div class="col-sm-12 noOfHotels">
				<?php echo $rowcount ." hotels found.";?>
			</div>
			
		</div> <!-- search hotels -->
		
		<div class="col-sm-12 searchHotels">
		
		<?php
				while($row = $result->fetch_assoc()) {
        			
		?>
					
			<div class="col-sm-4 text-center">
												
				<div class="col-sm-12 listItem">
													
				<!-- hotel INFO STARTS -->

				<div class="col-sm-12 imageContainer text-center">
										
					<img src="<?php echo $row["mainImage"]; ?>" alt="<?php echo $row["hotelName"] ?>">
										
				</div>
				
				
				<div class="col-sm-12 hotelName"><?php echo $row["hotelName"]; ?></div>
				
				<div class="col-sm-12 starContainer">
					
					<?php
					
						$noOfStars=$row["stars"];
					
						for($i=0; $i<$noOfStars; $i++) {?>
						
						<i class="fa fa-star"></i>
						
						<?php } ?>
					
				</div>
				
				
				
				<div class="col-sm-12 view">
					
					<a href="hots1.php?hotelId=<?php echo $row["hotelID"]; ?>"><input type="button" class="viewDetails" name="viewDetails" value="View Hotel Details"/></a>
					
				</div>
	
				
			</div> <!-- listItem 1 -->
  		
  		</div>
   		

   		<?php
    			
				} ?>
				
				</div>
			
		<?php	} else {
    			
		?>
		
		<div class="col-sm-12 searchHotels">
		
			<div class="noHotels">
			
				No hotels found.
			
			</div>
		
		</div>
		
		<?php
			
			}
		
		?>
		
		<?php $conn->close(); //closing the connection to the database ?>
			
		<div class="spacerLarge">.</div> <!-- just a dummy class for creating some space -->
			
		<?php include("common/footer.php"); ?>
				
	</body>
	
	<!-- BODY TAG ENDS -->
	
</html>