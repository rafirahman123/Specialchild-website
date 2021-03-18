<?php
    $host = 'localhost';
  $user = 'root';
  $pass ='';
  $db   = 'registration';
  $conn = new mysqli($host, $user, $pass, $db);

  session_start();
  if(!isset($_SESSION['id']) AND !isset( $_SESSION['child_name']) AND !isset( $_SESSION['email'])){
		header("location:login.php");
	  }

  if(isset($_GET['logout']) AND $_GET['logout'] == 'user-logout'){
    session_destroy();
    setcookie('user_re_log','',time() - (60*60*24*365));
    header("location:login.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo  $_SESSION['child_name']; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/profile-style.css">

    <link rel="stylesheet" type="text/css" href="profile.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>

<div class="container search-bar">
    <form action="search.php" method = "POST" >
       <div class="form-group ">
            <input type="text" name="search" class="form-control d-inline-block">
            <button class="btn btn-info btn-sm d-inline-block" type="submit" name="submit_search">Search</button>
        </div>
                   
    </form>
</div>


<div class="card mx-auto shadow">
    <div class="card-header">
        <div class="loginas">
            <h4>Log In as Child</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <h4></h4>
            <h2><?php echo $_SESSION['child_name']; ?></h2>
        </div>
        <div class="form-group">
            <h4>Father Name:</h4>
            <p><?php echo $_SESSION['father_name']; ?></p>
        </div>
        <div class="form-group">
            <h4>Mother Name:</h4>
            <p><?php echo $_SESSION['mother_name']; ?></p>
        </div>
        <div class="form-group">
            <h4>Email:</h4>
            <p><?php echo $_SESSION['email']; ?></p>
        </div>
        <div class="form-group">
            <h4>Address:</h4>
            <p><?php echo $_SESSION['address']; ?></p>
        </div>
        <div class="form-group">
            <h4>Phone</h4>
            <p><?php echo $_SESSION['phone']; ?></p>
        </div>
    </div>
    <div class="card-footer">
        <a href="worker-table.php" class="btn btn-info">Worker-Table</a>
        <label id="forgotpwd" class=" btn btn-primary btn-sm text-right float-right"><a href="?logout=user-logout" class="text-light">Log Out</a></label>
    </div>
</div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>