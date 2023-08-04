<?php

include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //sql query to insert data into table
    $sql = "SELECT * FROM users WHERE email = '$email'";

    //execute query
    $result = mysqli_query($connect,$sql);

    //check if query was successful
    if($result){
        //check if there is a record in the db
        $rownumber = mysqli_num_rows($result);
        if($rownumber > 0){
            //fetch the record from the db using associative array
            $row = mysqli_fetch_assoc($result);

            //verify password
            $passwordhash = $row['password'];
            $id = $row['id'];
            $email = $row['email'];
            if(password_verify($password,$passwordhash)){
                //redirect to dashboard

                //create a session
                session_start();
                //store the user id and email in the session variables
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                //redirect to dashboard
                header('location:display.php?viewemail='.$email);
            } 
        }else{
          //echo '<script>alert("Invalid Email or Password")</script>';   
          echo "Invalid Email or Password";
        }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-custom navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
      <a style="border-top:thick black solid; border-bottom:thick black double; padding:1px; " class="navbar-brand" href="#"><b style="color:white;">Rescue</b> Center</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav w-100">
            <li class="nav-item">
              <a class="nav-link" style="color: white;" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: white;" href="about.php">About Us</a>
            </li>
            <li class="nav-item ml-auto">
              <a class="nav-link" style="color: white;" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" style="color: white;" href="login.php">Login</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <div class="background">
            <form  class="container" method="post">
                <h1>Login</h1>
                <p>Don't have an account? <a href="register.php">Create an Account</a></p>
                <label>Email</label>
                <input type="text" placeholder="Enter your Email" name="email" id="emailAd">
                <div id="result1"></div>
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter your password" name="password" id="psw" >
                <div id="result2"></div>
                <p><a href="#">Forgot Password?</a></p>
                <input type="submit" class="bttn" value="Login">
            </form>
    </div>


</body>
</html>