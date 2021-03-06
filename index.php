<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
<script defer src="./node_modules/swup/dist/swup.min.js" type="text/javascript"></script> 
<script defer src= "./js/script.js" type="text/javascript"></script>
<script>
    window.onload = function() {
	var backgroundAudio = document.getElementById("breakuself");
	backgroundAudio.volume = 0.1;
                               }
 </script>
<title>Japanese Cars</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
   <header>
     <div class="main">
	     <div class="logo">
		     <img src="image/logo.png">
		 </div>
	     	 <ul>
		        <li><a href="/index.php">Home</a></li>
                <li><a href="/idk.html">JCC</a></li>
                <li><a href="/cars.html">Cars</a></li>
                <li><a href="/about.html">About</a></li>
                <li><a href="/contact.php">Contact</a></li>
                <?php 
                    if(!isset($_SESSION["user"])){
                    echo '
                        <li><a href="/login.php">Login</a></li>
                        <li><a href="/signup.php">Sign Up</a></li>
                    ';
                    }else{
                        echo '<li><p style="color:white;">'.$_SESSION["user"].'</p></li>
                              <li><a href="php_c/logout.php">Log Out</a></li>
                        ';
                        
                    }
                ?>
                
		     </ul> 
	 </div>
	 <main id= "swup" class= "transition-fade">
	 <div class="title">
	     <h1>Japanese Cars</h1>
		 <br>
		 <h2>Welcome to the world of JDMs.</h2>
	 </div>
	 </main>
   </header>
   <audio id= "breakuself" autoplay="autoplay" controls="controls" loop="loop"> 
        <source src="audio/breakuself.ogg" type="audio/ogg"> 
        <source src="audio/breakuself.mp3" type="audio/mpeg"> 
    </audio> 
</body>
</html>