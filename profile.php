<?php

session_start();
?>
<html>
<head>
<title>Twitter clone</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Kufam:wght@500&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
    body { background-image: url(bg1.jpg);
      background-repeat: no-repeat;
      max-height: 100%;
      background-size: cover;
    }
    p{ font-family: 'Oswald', sans-serif;
  color: #3E4FE3; }
    h3{  font-family: 'Oswald', sans-serif;
  color: black; }
  .bg{
    background-color: white;
  }
</style>
</head>
<body bgcolor="#9999ff">
  <!-- Image and text -->
<nav class="navbar navbar-light bg-light-transparent">
  <a class="navbar-brand" href="home.php">
    <img src="logo.jpg" width="40" height="40" class="d-inline-block align-top rounded-circle" alt="">
    Twitter
  </a>
  <div class="navbar-right" style="background-color:#00DDE4">
      <h6>
        Welcome! @<?php

        $u1=$_SESSION['uname'];
        echo "<b>$u1</b>";
        ?></b>
      </h6></div>

</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light-transparent">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" style="width: 30%; padding: 0rem;">
    <hr width=0rem>
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a class="nav-link" href="home.php"><b>HOME</b></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="profile.php"><b><u>VIEW PROFILE</u></b><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userlist.php"><b>VIEW USERS</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><b>LOGOUT</b></a>
      </li>
    </ul>
    <hr>
  </div>
</nav>




<?php
  $con = mysqli_connect('localhost','root','','twitterdb');
  $uname=$_SESSION['uname'];
  $query="SELECT users.image, users.fname, users.username, 
          tweets.body, tweets.date FROM users, tweets 
          WHERE 
            users.username = '$uname' && tweets.username = '$uname' ORDER BY tweets.date Desc";
  $result=mysqli_query($con,$query) or die(mysqli_error());  
  while($row=mysqli_fetch_array($result)){
    echo'
    <div class="container">
      <center>
      <div class="col-md-6">
      <div class="thumbnail bg" style="padding-left: 30px; padding-top: 20px; padding-right: 0px;padding-bottom: 0px; text-align: left;">
        <img src="images/'.$row['image'].'" width="80" height="80" class="rounded-circle" alt=" style="img-align: left;" >'.$row['fname'].'<u><b>@'.$row['username'].'</u></b>
        <div class="caption" style="padding-left: 80px; padding-right: 30px;padding-top: 0px;">
          <p><b>'.$row['body'].'</p></b>
          <center><small>Created on '.$row['date'].'</small></center>
            <hr width="50%" class="dashed">
        </div>
      </div><br><br>
      </div>
      </center>
    </div>
    ';
  } 
?>
   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</body>
</html>
