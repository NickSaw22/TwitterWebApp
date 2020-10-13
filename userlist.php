<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Twitter clone</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@600&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@500&display=swap" rel="stylesheet">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <style>
      body { background-image: url(bg1.jpg);
              background-repeat: no-repeat;
              background-size: cover;
              max-height: 100%;
              height: 100%;
      }
    </style>
  </head>
  <body>

    <!--For logo-->
    <nav class="navbar navbar-light bg-light-transparent">
      <a class="navbar-brand" href="home.php">
      <img src="logo.jpg" width="40" height="40" class="d-inline-block align-top rounded-circle" alt="">
      Twitter
      </a>
      <div class="navbar-right" style="background-color:#00DDE4">
      <h6>
        Welcome! @<?php

        session_start();
        $u1=$_SESSION['uname'];
        echo "<b>$u1</b>";
        ?></b>
      </h6></div>
    </nav>

    <!--Navbar-->
  
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
          <li class="nav-item">
            <a class="nav-link" href="profile.php"><b>VIEW PROFILE</b></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="userlist.php"><b><u>VIEW USERS</u></b><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><b>LOGOUT</b></a>
          </li>
        </ul>
        <hr><hr>
      </div>
    </nav>

    <!--List of people from json file-->
    <div class="container">
      <h1 class="display-4 text-center white"  id="headr">
          <font color=white size=5px>List of people you may know!!</font>
      </h1>
      <input class="form-control" type="text" id="filterInput" placeholder="Search Names......" style="background-color: lightblue; color: black;">
      <br>
      <div class="row">
        <div class="col-12 col-lg-5">
          <div class="list-group">
            <ul id="people" ></ul>
          </div>
          </div>
      </div>
    </div>
    


    <script>

      //Get input element from search bar
      let filterInput = document.getElementById('filterInput');

      //Add event Listener
      filterInput.addEventListener('keyup', filterNames);

      function filterNames(){

        //Get value of input
        let filterValue = document.getElementById('filterInput').value.toUpperCase();

        //Get names ul
        let ul = document.getElementById('people');
        //Get li's from ul
        let li = ul.querySelectorAll('li.list-group-item');
        //Loop through collection itme li's
        for(let i = 0;i < li.length;i++){
          let a = li[i].getElementsByTagName('a')[0];
          console.log(a);
          const flwbtn = document.getElementById("f"+ i +"");
         // const vpbtn = document.getElementById('bt'+ i +'');

          console.log(flwbtn);
          //if matched
          if(a.innerHTML.toUpperCase().indexOf(filterValue) > -1 ){
            li[i].style.display = '';
          }else{
            li[i].style.display = "none";
            flwbtn.style.display = "none";
           // vpbtn.style.display = "none";
          }
        }
      }

      

      //Pop-ups
      function showAlerts(message, className){
        const div = document.createElement('div');
        div.className = `alert alert-${className}`;
        div.appendChild(document.createTextNode(message));
        //console.log(message);
        const container = document.querySelector('.container');
        //console.log(container);
        const header = document.querySelector('.row');
        //console.log(header);
        container.insertBefore(div, header);
        //Vanish in 3 seconds
        setTimeout(() => document.querySelector('.alert').remove(), 3000);

    }
     

     function follow(i){
      var rmvfollow = document.getElementById("f"+ i +"");
        var response = JSON.parse(xhttp.responseText);
        var people = response.people;
        //console.log(people[i].image);
       
        let j=0;
        //console.log('f'+i);
        //console.log("hi");
        
        if(j==i){
          //console.log('f'+j);
          document.getElementById("f"+j).style.backgroundColor="green";
          document.getElementById("g"+j).src = people[j].image;
          document.getElementById("f"+j).innerHTML="Following";
          showAlerts("You Followed : "+people[j].name, 'success');   
          rmvfollow.onclick = "";    
           
          //Added view profile button
          const button = document.createElement('button');
          button.className = 'btn btn-primary';
          button.id = 'bt'+ j +''; 
          button.appendChild(document.createTextNode('View Profile'));
          //console.log(button)
          const ul = document.querySelector("#people");
          //console.log(ul);
          const folwbtn = document.querySelector("#f"+j+"");
          //console.log(folwbtn); 
          ul.insertBefore(button, folwbtn);

        }
        while(j!=i){
          //console.log(j);
          
          j++;
          if(j==i){
            //console.log('f'+j);
            document.getElementById("f"+j).style.backgroundColor="green";
            document.getElementById("g"+j).src = people[j].image;
            document.getElementById("f"+j).innerHTML="Following";
            showAlerts("You Followed : "+people[j].name, 'success'); 

            //Added view profile button
            const button = document.createElement('button');
            button.className = 'btn btn-primary';
            button.id = 'bt'+ j +''; 
            button.appendChild(document.createTextNode('View Profile'));
            //console.log(button)
            const ul = document.querySelector("#people");
            //console.log(ul);
            const folwbtn = document.querySelector("#f"+j+"");
            //console.log(folwbtn); 
            ul.insertBefore(button, folwbtn);      
          }
          rmvfollow.onclick = "";
        }	
		
	  	}

      //JSON data fetching
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(xhttp.responseText);
            var people = response.people;
            var output = '';

            for(var i = 0;i < people.length;i++){

              //console.log(i);
              output += '<li id="lst'+ i +'" style="background-color: white;padding: 30px; margin-bottom: none;" class="list-group-item"><img id="g'+ i +'" class="img-top rounded-circle" style="width: 130px; padding: 9px;" src="profile.jpg"><font color=black size=4px> Name <sub>(age)</sub> : </font><span><b><a>'+people[i].name +'</a>(' +people[i].age +')</span><font color= #8B53BF><h4 align=left><font color="black" style="Perpetua" size=5px>UserName : </font></b><u>@'+ people[i].username +'</u></h4></font></li><br><button class="btn btn-primary" id="f'+ i +'" onclick="follow('+i+')">FOLLOW</button><br><br>';
            }
            
            document.getElementById('people').innerHTML = output;
            
          }
      };
      xhttp.open("GET", "people.json", true);
      xhttp.send();      

    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
</html>
