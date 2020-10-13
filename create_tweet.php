<?php

    session_start();

    if(isset($_POST['submit'])){
        $con = mysqli_connect('localhost','root','','twitterdb');
        if($con){
            echo "yes";
        }
        
        $body=$_POST['body'];
        $uname=$_SESSION['uname'];

        echo"\n$body";
        echo"\n$uname";
        $query="insert into tweets(body, username) values ('$body', '$uname')";
        $result=mysqli_query($con,$query) or die(mysqli_error($result));
        header("location:home.php");
    }

?>
