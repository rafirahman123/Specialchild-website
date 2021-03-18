<?php 
    
  $host = 'localhost';
  $user = 'root';
  $pass ='';
  $db   = 'registration';
  $conn = new mysqli($host, $user, $pass, $db);

if (isset($_POST['log_in'])) {
   $username = $_POST['username'];
   $user_password = $_POST['user_password'];

  if(empty($username)){
    $username_valid = "<p style ='color:#CC3C39;'>Username/Email Required</p>";
   }
   if(empty($user_password)){
    $pass_valid = "<p style ='color:#CC3C39;'>Password Required</p>";
   }

   if(empty($username)||empty($user_password)){
    $valid =  "<p style ='color:#CC3C39;'>All fields are required<button style='color:red;' class='close' data-dissmiss='alert'>&times;</button></p>";

   }else{

    $sql_username = "SELECT * FROM worker_data WHERE email ='$username'";
    $data = $conn -> query($sql_username);
    $f_data = $data -> fetch_assoc();
    if( $data -> num_rows == 1) {
        
        if($user_password == $f_data['password']){

            session_start();
            $_SESSION['id'] = $f_data['id'];
            $_SESSION['name'] = $f_data['name'];;
            $_SESSION['email'] = $f_data['email'];
            $_SESSION['address'] = $f_data['address'];
            $_SESSION['phone'] = $f_data['phone'];
            header("location:worker-profile.php");
        }else{
            $valid =  "<p style ='color:#CC3C39;'>Wrong Password<button style='color:red;' class='close' data-dissmiss='alert'>&times;</button></p>";
        }

    }else{
        $valid =  "<p style ='color:#CC3C39;'>wrong username<button style='color:red;' class='close' data-dissmiss='alert'>&times;</button></p>";
    }
   

    }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title> Login or Signin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500&display=swap" rel="stylesheet">
</head>
<body class="bg-info">
  <br>
  <div class="container ">
    <div style="width: 420px;" class="card mx-auto mt-5">
      <div class="card-header">
        <h2>Worker Login</h2>
      </div>
      <div class="card-body">
      <div class="form">
        <form action="<?php $_SERVER['PHP_SELF']?>" method = "POST">
        <?php

          if (isset($valid)) {
            echo $valid;
          }

        ?>
        <div class="form-group">
          <input  class="form-control" type="text" placeholder="Username/Email" name="username">
          <?php 

          if (isset($username_valid)) {
            echo $username_valid;
          }

        ?>
        </div>
        <div class="form-group">
          <input  class="form-control" type="password"  placeholder="Password" name="user_password">
          <?php 

          if (isset($pass_valid)) {
            echo $pass_valid;
          }

        ?>
        </div>
        <div class="form-group">
        <input class="btn btn-info" type="submit" value="Log In" name="log_in">
        </div>
        <label id="forgotpwd">Child Login<a href="login.php"> Click Here</a></label>
        <label id="forgotpwd" class="text-right float-right">Registration<a href="registration.php"> Click Here</a></label>
      </form>
    </div>
  </div>
      </div>
    </div>
  <br>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>