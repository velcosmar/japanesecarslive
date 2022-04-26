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
				 <li><a href="/login.php">Login</a></li>
				 <li><a href="/signup.php">Sign Up</a></li>
		     </ul> 
	 </div>
	 <main id= "swup" class= "transition-fade">
        <div class="container"> 
            <div>	 
                    <h1 style=" text-align:center; font-size:40px; color:white;">Log In</h1>
                    <form style="border:none;" action="php_c/login.php" method="POST">
                        <!-- <label>Username : </label> -sa vedem daca o sa mai am nevoie -->
                        <input type="text" placeholder="Enter Username" name="username" required>   
                        <input type="password" placeholder="Enter Password" name="password" required>  		
                        <button style="display:block; width:100px; margin-left:auto; margin-right:auto;" name="submit">Login</button> 
                    </form>
            </div>		
        </div> 
	 </main>