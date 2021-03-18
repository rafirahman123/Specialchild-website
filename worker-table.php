<?php
   $host = 'localhost';
  $user = 'root';
  $pass ='';
  $db   = 'registration';
  $conn = new mysqli($host, $user, $pass, $db);

	if(isset($_POST['submit_search'])){
		$search= $_POST['search'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Worker-Table</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&display=swap" rel="stylesheet">
	 
</head>
<body>
	
	<div class="container">
		<div class="card mt-5">
			<div class="card-header">
				<h3>Worker-Table</h3><br>
				<!-- Search Form -->
				<form action="worker_search.php" method = "POST" >
					<div class="form-group ">
						<input type="text" name="search" class="form-control w-25 d-inline-block">
						<button class="btn btn-info" type="submit" name="submit_search">Search</button>
					</div>
					<div class="form-group">
						
					</div>
				</form>
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr class="">
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Phone</th>
						</tr>
					</thead>
					<tbody >
						<tr >							
							<?php
								$show_table = "SELECT * FROM worker_data";

								$data = $conn -> query($show_table);
								$i = 1;
								while($f_data = $data -> fetch_assoc()):
							?>
							<td><?php echo $i; $i++; ?></td>
							<td><?php echo $f_data['name']; ?></td>
							<td><?php echo $f_data['email']; ?></td>
							<td><?php echo $f_data['address']; ?></td>
							<td><?php echo $f_data['phone']; ?></td>

							
						</tr>
						<?php endwhile; ?>							
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<a class="btn btn-success btn-sm shadow" href="profile.php">Profile</a>
			</div>
		</div>
	</div>




	<script src="js/jquery-3.5.0.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$('a#data_delete').click(function(){
			let val = confirm('Are You Want To Delete ?');

			if( val == true){
				return true;
			}else{
				return false;
			}	
		});
	</script>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>