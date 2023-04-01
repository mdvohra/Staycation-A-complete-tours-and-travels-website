<html>
<head>
	
  		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Trains | tourism_management</title>
    
    	<link href="css/main.css" rel="stylesheet">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/bootstrap-select.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400|Raleway:100,300,400,500|Roboto:100,400,500,700" rel="stylesheet">
    	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    	<script src="js/jquery-3.2.1.min.js"></script>
    	<script src="js/main.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	<script src="js/bootstrap-select.js"></script>
    	<script src="js/bootstrap-dropdown.js"></script>
    	<script src="js/jquery-2.1.1.min.js"></script>
    	<script src="js/moment-with-locales.js"></script>
    	<script src="js/bootstrap-datetimepicker.js"></script>
		<script type="text/javascript">
		
			$(function () {
				
                $('#datetimepicker3').datetimepicker({
					format: 'L',
		   			locale: 'en-gb',
					useCurrent: false,
					minDate: moment()
				});
				
				$('#datetimepicker3').on('dp.change',function(e){
					console.log(e.date.format('dddd'));
					$('#dayTrain').val(e.date.format('dddd'));
				});
            });
		
		</script>
    	
	</head>
<body>
<form action="reports.php" method="POST">
<div class="col-sm-3">
        						<div class="form-group">
     								<label for="datetime3">Select Date:<p> </p></label>
            						<div class="input-group date" id="datetimepicker3">
                						<input id="datetime" type="text" class="inputDate form-control" placeholder="Select Date" name="date1" required/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
	
<div class="col-sm-3">
        						<div class="form-group">
     								<label for="datetime">Select Date:<p> </p></label>
            						<div class="input-group date" id="datetimepicker4">
                						<input id="datetime4" type="text" class="inputDate form-control" placeholder="Select Date" name="date2" required/>
                						<span class="input-group-addon">
                   						<span class="fa fa-calendar"></span>
                						</span>
            						</div>
        						</div>
    						</div>
							
            				<div class="col-sm-12 text-center">
            			
            					<input type="submit" class="button" name="searchTrains" value="Search Trains">
            				
            				</div>
		</form>
		<?php 
		$date1=$_POST["date1"];
		$date2=$_POST["date2"];
		$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "projectmeteor";
			
			// Creating a connection to MySQL database
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Checking if successfully connected to the database
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
			$sql = "SELECT * FROM trainbookings WHERE date between '$date1' and '$date2'";
			$rowcount = mysqli_num_rows(mysqli_query($conn,$sql));
			
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      echo "<tr>";
echo "<td>" . $row['bookingID'] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['cancelled'] . "</td>";
echo "<td>" . $row['origin'] . "</td>";
echo "<td>" . $row['destination'] . "</td>";
echo "<td>" . $row['passengers'] . "</td>";

echo "</tr>";


    }
} else {
    echo "0 results";
}

$conn->close();
?>
		</body>
		</html>