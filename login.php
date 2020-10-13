<?php
  
  $con = mysqli_connect('localhost','root');
  mysqli_select_db($con, 'twitterdb');

  if(isset($_POST['login'])){

    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $s = " select * from users where username = '$uname' && password = '$pwd'";    
    
    $result = mysqli_query($con, $s);
    $num = mysqli_num_rows($result);
    session_start();
    $_SESSION['uname']=$uname;
    $_SESSION['id']=mysqli_insert_id($con);
  
    if($num == 1){
      
      header("location:home.php");
    }
    else{
      echo '<script type="text/javascript"> ';
      
      echo '  if (confirm("wrong username or password")) {';
      echo '    document.location = "login.php";';
      echo '  }';
      
      echo '</script>';

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
  <title>Login</title>
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
        <div class="panel-heading"><h3><center><b>Log in</b></center></h3></div>
          <div class="panel-body">
            <form method="post" action="login.php">
              <div class="imgcontainer">
                <center><img src="twitter-logo.png" alt="logo" class="img img-responsive"></center>
              </div>
              <div class="form-group">
                <input type="text"  name="uname" class="form-control" placeholder="Username*" required><br><br>
              </div>
              <div class="form-group">
                <input type="password" name="pwd" class="form-control" placeholder="Password*" required>
              </div>
              <div class="form-group">
                <center><button class="btn btn-success btn-lg" name="login" value="login">Log in</button></center>
              </div>
              <div class="form-group">
                <center>
                  New User? <a href="register.php">Register</a>
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>
    </center>


  </body>
  </html>
