<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //get data from form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //encrypt password
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $gender =$_POST['gender'];
    $usertype = $_POST['usertype'];

    

    //sql query to insert data into table
    $sql = "INSERT INTO users (username,email,phone,password,gender,usertype) VALUES ('$username','$email','$phone','$password','$gender','$usertype')";
    //$sql = "INSERT INTO users (email,password) VALUES ('$email','$password')";

    //execute query
    $result = mysqli_query($connect,$sql);

    //check if query was successful
    if($result){
        header('location:login.php');
    } else{
        die(mysqli_error($connect));
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="assets/css/register.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
       
    </head>
    <body>
    <nav class="navbar navbar-custom navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav w-100">
            <li class="nav-item">
              <a class="nav-link " style="color: white;" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: white;" href="about.php">About Us</a>
            </li>
            <li class="nav-item ml-auto">
              <a class="nav-link active" style="color: white;" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: white;" href="login.php">Login</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav> 
        
        <div class="background">
            <form onsubmit="return validateForm()" class="registration" method="post"> <!--onsubmit="return validateForm()"-->
                <h2>Registration Form</h2>
    
                <label>User Name: </label>
                <input type="text" name="username" id="uname" placeholder="Enter your name" required>
                <div id="result_1"></div>
    
                <label>Email Address</label>
                <input type="email" name="email" id="emad" placeholder="Enter your email address" required>
                <div id=""></div>
    
                <label>Phone Number: </label>
                <input type="text" name="phone" id="pnum" placeholder="Enter your Phone Number" required>
                <div id="result_5"></div>
    
                <label>Password: </label>
                <input type="password" name="password" id="pwd" placeholder="Enter your password" required>
                <div id="result_3"></div>
    
                <label>Confirm Password: </label>
                <input type="password" name="pwdc" id="pwdc" placeholder="Confirm password" required>
                <div id="result_4"></div>
    
                <label>Gender: </label>
                <select name="gender" id="gender" class="seelect" required>
                    <option>--Select Gender--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                
    
                <label>User Type: </label>
                <select name="usertype" id="ustype" class="seelect" required>
                    <option>--Select User Type--</option>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
    
                <div></div>
                <input type="submit" name="submit">
    
                <div id="resultage"></div>
    
            </form>
           </div>
           <script src="validation.js"></script>
        </body>
    </html>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        