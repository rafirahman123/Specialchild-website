<?php 
	$host = 'localhost';
	$user = 'root';
	$pass ='';
	$db   = 'registration';
	$conn = new mysqli($host, $user, $pass, $db);


	// $valid[] ='';
	if (isset($_POST['sign_up'])) {
	$child_name 	= $_POST['child_name'];
	$father_name 		= $_POST['father_name'];
	$mother_name 	= $_POST['mother_name'];

	$child_email 	= $_POST['child_email'];
	$child_address 	= $_POST['child_address'];
	$child_phone = $_POST['child_phone'];
	$child_pass = $_POST['child_pass'];
	$child_confirm_pass = $_POST['child_confirm_pass'];


	if ($child_pass == $child_confirm_pass) {
		$password_check = true;
	}else{
		$password_check = false;
	}

	if(empty($child_name) || empty($father_name) || empty($mother_name) || empty($child_email) || empty($child_address) || empty($child_phone)|| empty($child_pass)|| empty($child_confirm_pass)) {
		$valid =  "<p class='alert alert-danger'>All fields are required<button class='close' data-dissmiss='alert'>&times;</button></p>";
	}elseif ( $password_check == false ) {
		$valid =  "<p class='alert alert-warning'>Couldn't Sign In <button class='close' data-dissmiss='alert'>&times;</button></p>";
	}else{
		$sql = " INSERT INTO child_data (father_name,mother_name,child_name,email,address,phone,password)
				values ('$father_name','$mother_name','$child_name','$child_email','$child_address','$child_phone','$child_pass')";
				$conn -> query($sql);

		$valid =  "<p class='alert alert-success'>Successfully sign In<button class='close' data-dissmiss='alert'>&times;</button></p>";
	}


	// $sql = " INSERT INTO child_data (father_name,mother_name,email,address,phone,password)
	// 			values ('$father_name','$mother_name','$child_name','$user_email','$child_address','$child_phone','$user_pass')";
	// 			$conn -> query($sql);







	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Child Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body class="bg-info">

	<div class="container">
		<div class="reg-form">
			<div class="card w-50 mt-5 mx-auto shadow">
				<div class="card-header">
					<h3>Child Registration</h3>
				</div>
				<div class="card-body">
					<form action="<?php $_SERVER['PHP_SELF']?>" method = "POST">
						<?php if (isset($valid)){
							echo $valid;
						} ?>
						<input class="form-control mt-1" type="text"  name="child_name" placeholder="Child Name">
						<input class="form-control mt-1" type="text"  name="father_name" placeholder="Father Name">
						<input class="form-control mt-1" type="text"  name="mother_name" placeholder="mother Name">	
						
						<input class="form-control mt-1"  type="email" name="child_email" placeholder="Email">
						<input class="form-control mt-1"  type="text" name="child_address" placeholder="Address">
						<input class="form-control mt-1"  type="text" name="child_phone" placeholder="Phone">
						<input class="form-control mt-1"  type="password" name="child_pass" placeholder="Enter Password">
						<input class="form-control mt-1"  type="password" name="child_confirm_pass" placeholder="Confirm Password">
						<input class="btn btn-info mt-1" type="submit" name="sign_up">
						<p></p>
					</form>
				</div>

				<div class="card-footer">
                <div class="container">
                <div class="child-reg-text mx-auto text center">

                <p>To Go Worker registration page<a href="registration.php"><b>Here</b></a></p>

                </div>
                </div>
                </div>

                <br>

                <div class="card-footer">
                <div class="container">
                <div class="child-reg-text mx-auto text center">

                <p>To Go Home page<a href="special.html"><b>Home</b></a></p>

                </div>
                </div>
                </div>


			</div>
		</div>
	</div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>