<?php 
	mysql_connect("localhost", "root", "") or die("Connection not possible!");
	mysql_select_db("okiniidemo") or die("no database found!");
?>

<!DOCTYPE html>
<html>
<head>
	<title> Okinii Demo New Employee - Galib</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="okiniiStyle.css">

</head>
<body>



<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
			  <li role="presentation" class="active"><a href="#">Home</a></li>
			  <li role="presentation"><a href="#">Profile</a></li>
			  <li role="presentation"><a href="#">Messages</a></li>
			</ul>
		</div>		
	</div>


	<div class="row">
		<div class="col-md-12 text-center">
			<h1 class="display-3"> New Employee </h1>
			<hr>			
		</div>

	</div>


	<div class="row">
		<div class="col-md-4">
			
		</div>

		<div class="col-md-4">
			<form action="okiniiNewEmployee.php" method="post"> 
				<div class="form-group">
					<input type="text" class="fullwidth" name="employeeName" placeholder=" first name..">	
				</div>
				<div class="form-group">
					<input type="text" class="fullwidth" name="employeeEmail" placeholder=" email..">	
				</div>
				<button type="submit" class="btn btn-primary fullwidth whitish" name="createEmployeeButton"> Create employee </button>
				

			</form>


			
			<?php
				if (isset($_POST['createEmployeeButton'])):
					$person = $_POST['employeeName'] ;
					$email = $_POST['employeeEmail'];

					mysql_query("
						CREATE TABLE $person (
						    personID int,
						    name varchar(40),
						    workhour_completed int, 
						    workhour_available int, 
						    workhour_max int,
						    email varchar(25)
						); 
					");

					mysql_query("
						INSERT INTO $person ( name, email) VALUES ('$person', '$email')
					");
			?>

		</div>
	</div> <!-- 2nd row ends-->


	<div class="row bgOlive">
		<div class="col-md-4">
			
		</div>

		<div class="col-md-4 whitish">
				<h3 class="display-4"> Success! </h3>
				<p> <span class="orange"> <?php echo $person; ?> </span> with email <span class="orange"> <?php echo $email; ?> </span> has been added to the system.  </p>

			
		</div>

			
			<?php	endif;  ?>
			
	</div> <!-- 2nd row ends-->
</div>



</body>
</html>

