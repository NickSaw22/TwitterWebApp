<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!--Latest compiled and minified JavaScript-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kufam:wght@500&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<style>
    #fdiv { 
    	background-image: url(bg1.jpg);
    	max-height: 100%;
    	height: 100%;
    	background-repeat: no-repeat;
    	background-size: cover;
    	}
    #pad{
    	padding-top: 300px;
    	padding-bottom: 300px;
    }
    .pad1{
    	padding-top: 10px;
    }
    .pad2{
    	padding-top: 70px;
    }
    .container1{
    	padding-right: 50px;
    	padding-left: 50px;
    }
    .pad3{
    	padding-right: 150px;
    	padding-left: 150px;
    }
    .pad4{
    	padding-right: 160px;
    	padding-left: 160px;
    }
    @media (max-width:786px){
    	 #pad{
    	padding-top: 200px;
    	padding-bottom: 200px;
    	padding-right: 50px;
    	padding-left: 50px;
    }

}

  </style>

</head>
<body>
	<div class="col-md-6 col-xs-12" id="fdiv" >
		<center>
			
			<div id="pad" style="font-size: 20px;">
				<ul>
				<span class="glyphicon glyphicon-search pad1"></span>Follow your interests.<br>
				<span class="glyphicon glyphicon-user pad1"></span>Hear what people are talking about.<br>
				<span class="glyphicon glyphicon-comment pad1"></span>Join the conversation.
				</ul>
		
			
			</div>
		</center>
	</div>
	<div class="col-md-6 col-xs-12 container1">
		<div style="font-size: 20px;">
			<form class="form form-inline" method="post" action="index.php">
				<div class="form-group">
					<input type="text" name="uname" placeholder="Username" class="form-control" required>	
				</div>
				<div class="form-group">
					<input type="password" name="pwd" placeholder="password" class="form-control" required>	
				</div>
				<button type="submit" name="login" class="btn btn-primary">Log in</button>			
			</form>
		</div>

		<div class="pad2">
			<img src="twitter-logo.png" class="img img-responsive" style="height: 70px";>
			<h1>See what’s happening in the world right now.</h1>
			<h4 style="padding-top: 20px;"><b>join twitter today</b></h3>
			<form>
				<button type="submit" class="btn btn-primary btn-lg pad3 hidden-xs"><a href="register.php">sign up</a></button><br><br>
				<button type="submit" class="btn btn-lg pad4 hidden-xs"><a href="login.php">Login</a></button>
				<button type="submit" class="btn btn-primary btn-lg hidden-lg"><a href="register.php">sign up</a></button><br><br>
				<button type="submit" class="btn btn-lg hidden-lg"><a href="login.php">Login</a></button>
			</form>		
		</div>		
	</div>
	<div class="row">
		<div class="col-xs-12">
		<footer>
			<center>
				<h3>COPYRIGHT RESERVED FOR TWITTER</h3>
			</center>
		</footer>
		</div>
	</div>


</body>
</html>
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
