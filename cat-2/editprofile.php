<?php

include 'connect.php';

//start session
session_start();

//check if user is logged in
$id = $_GET['updateid'];

//sql query to get info from database
$sql = "SELECT userId,username,email,phone,password,gender FROM users WHERE userId=$id";

//execute query
$result = mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);
$username = $row['username'];
$email = $row['email'];
$phone = $row['phone'];
$password = $row['password'];
$gender = $row['gender'];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //get data from form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //encrypt password
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    

    //sql query to insert data into table
    $sql = "UPDATE users SET username='$username',email='$email',phone='$phone',password='$password' WHERE userId=$id";
    
    //execute query
    $result = mysqli_query($connect,$sql);

    //check if query was successful
    if($result){
        echo "Updated successfully";
       header('location:display.php');
    } else{
        die(mysqli_error($connect));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/editprofile.css">
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-custom navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a style="border-top:thick black solid; border-bottom:thick black double" class="navbar-brand" href="#"><b style="color:white;">Rescue</b> Center</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav w-100">
            <li class="nav-item">
              <a class="nav-link" style="color: white;" aria-current="page" href="index.php">Home</a>
            </li>
            
            <li class="nav-item dropdown ml-auto">
                <a style="color: white;" class="nav-link dropdown-toggle active" href="#" 
                    id="navbarDropdownMenuLink" role="button" 
                    data-toggle="dropdown" aria-expanded="false">
                 
                    <?php 
                        $id = $_SESSION['id'];
                        $email = $_SESSION['email'];
                        echo "$email";
                    ?>     
    
                </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        </li>
                    </ul>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <!--Table Header-->

    <div class="">
      <h2>Update Account</h2>
    </div>

    <div class="background"> 
        <form onsubmit="return validateForm()" class="registration" method="post"> <!--onsubmit="return validateForm()"-->
    
                <h2>Edit Profile</h2>

                
                <label for="uname">User Name: </label>
                <input type="text" name="username" id="uname" value=<?php echo $username?>>
               
                <div id="result_1"></div>

                
                <label for="emad">Email Address: </label>
                <input class="form-control" type="email" name="email" id="emad" value=<?php echo $email?>>
                <div id=""></div>
               

                
                <label>Phone Number: </label>
                <input class="form-control" type="text" name="phone" id="pnum" value=<?php echo $phone?>>
                <div id="result_5"></div>
                

                
                <label>Password: </label>
                <input class="form-control" type="password" name="password" id="pwd" placeholder="Enter New Password">
                <div id="result_3"></div>
               

                <div class="form-group">
                <label>Confirm Password: </label>
                <input class="form-control" type="password" name="pwdc" id="pwdc" placeholder="Confirm New Password">
                <div id="result_4"></div>
                </div>

                
                <label>Gender: </label>
                <select class="form-control" name="gender" id="gender" class="seelect" value=<?php echo $gender?>>
                    <option>--Select Gender--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                


                <div class="form-group">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                
                <div id="resultage"></div>

                
    
        </form>
    </div>
   


    


</body>
</html>