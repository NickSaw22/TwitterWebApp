<?php



if(isset($_POST['register'])){
  $target= "images/".basename($_FILES['image']['name']);
  $con = mysqli_connect('localhost','root');
  mysqli_select_db($con, 'twitterdb');
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $image= $_FILES['image']['name'];
  $phno = $_POST['phno'];
  $uname = $_POST['uname'];
  $pwd = $_POST['pwd'];

  $s = " select * from users where username =  '$uname'";

  $result = mysqli_query($con, $s);

  $num = mysqli_num_rows($result);

  if($num == 1){
    echo '<script type="text/javascript"> ';
      
      echo '  if (confirm("email already exist")) {';
      echo '    document.location = "register.php";';
      echo '  }';
      
      echo '</script>';

  }else{
    $reg = " insert into users(fname, lname, email, image, phno, username, password) values ('$fname', '$lname', '$email', '$image', '$phno', '$uname', '$pwd')";
    mysqli_query($con, $reg);
    echo"<center><h3>Registration successfull!</h3></center>"; 
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
      $msg ="yes";
      session_start();
      header("location:login.php");



    }else{
      $msg ="nos";	
    }
  }
}

?>

<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >        
  <!--jQuery library-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!--Latest compiled and minified JavaScript-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@500&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="css/style.css">     
  <title>REGISTER</title>
  <style>
    .container1{
      padding-right: 400px;
      padding-left: 400px;
    }
    body { background-image: url(t2.png);}
      .p1{
        opacity: 0.8;
      }
      @media (max-width:786px){
        .container1{
        padding-right:0px;
        padding-left:0px;
        }
      }
  </style>
</head>
<body>
<div class="container1">
  <center>
    <div class="panel panel-primary p1">
    <div class="panel-heading"><h3><center><b>Sign Up</b></center></h3></div>
    <div class="panel-body">
    <form method="POST" action="register.php" enctype="multipart/form-data">
      <div class="imgcontainer">
        <center>
          <img src="twitter-logo.png" alt="logo" class="img img-responsive"></center>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <input type="text" name="fname" class="form-control" placeholder="First name*" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <input type="text" name="lname" class="form-control" placeholder="Last name*">
        </div>
      </div>    
      <div class="form-group col-xs-offset-0.5">
        <input type="email"  name="email" class="form-control" placeholder="Email*" required>
      </div>
      <div class="form-group">
        <label>Upload your Profile photo:</label>
        <input type="file" name="image" autocomplete="off" class="form-control"><br><br>
      </div>
      <div class="form-group">
        <input type="text" pattern="\d{10}" name="phno" class="form-control" placeholder="phone number*" maxlength="10" required>
      </div>
      <div class="form-group">
        <input type="text"  name="uname" class="form-control" placeholder="Username*" required>
      </div>
      <div class="form-group">
        <input type="password" name="pwd" class="form-control" placeholder="password*" required>
       </div>
       
        <div class="form-group">
          <center><button class="btn btn-success btn-lg" name="register" value="register">Register</button></center>
        </div>
        <div class="form-group">
          <center>Already Have An Account? <a href="login.php">Login</a></center>
        </div>
      </div>
    </form>    
  </div>
  </div>
  </div>
</center>


  </body>
  </html>