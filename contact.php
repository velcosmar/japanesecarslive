<?php
    session_start();

?>
<html>
<head>
<script defer src="node_modules/swup/dist/swup.min.js"></script> 
<script defer src= "js/script.js"></script>
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
            <li><a href="/contact.html">Contact</a></li>
        </ul> 

    </div>

	 <main id= "swup" class= "transition-fade">
        <?php 
            include "php_c/PhpContact.php";
            include "php_c/database.php";            
            if($_SESSION["user"] === 'admin'){
                 
                $sql = mysqli_query($conn,"SELECT * FROM questions ORDER BY ID DESC");
                $i=0;
                $maxId=0;

                echo "        
                    <div class=\"Answer\">
                        <h1 style=\"color:white; font-size:40px; text-align:center;\">Answer a Question</h1>
                        <div class=\"answers\">
                    ";
                    while($row = mysqli_fetch_assoc($sql)){
                        $i++;
                        $id = (int)$row["id"];
                        if($id > $maxId)$maxId=$id;
                        $q = $row["question"];
                        $user = $row["username"];
                        $answer = $row["answer"];
                        if(!empty($answer)){

                            echo "
                            <div class='qAList'>
                                <div>
                                    <p><em>$user</em>: <strong>$q</strong></p>
                                    <p><em style='color:#69ff8f;'>Answer</em>: <strong>$answer</strong></p>
                                </div>

                                <form style='border:none; display:flex; width:70%;' action='php_c/PhpContact.php' method='POST'>
                                    <input style='width:70%;' type='text' placeholder='Answer' name = 'answ'>
                                    <input type='hidden' value='$q' name='ques'>
                                    <button style='width:100px;' name='go'>Send</button>
                                </form>
                            </div>
                            ";

                        }else{
                            echo "
                            <div class='qAList'>
                                <div><p><em>$user</em>: <strong>$q</strong></p></div>
                                <form style='border:none; display:flex; width:70%;' action='php_c/PhpContact.php' method='POST'>
                                    <input style='width:70%;' type='text' placeholder='Answer' name = 'answ'>
                                    <input type='hidden' value='$q' name='ques'>
                                    <button style='width:100px;' name='go'>Send</button>
                                </form>
                            </div>
                            ";
                        }
                    
                        if($i != $maxId)$output = "<hr>";
                    }
                
                    if( $maxId===0 )echo "<p style='font-size:20px; padding-top:10px; text-align:center; color:white;'>No questions yet</p>";
                    echo "</div></div>";
            }else {
                        echo '        
                            <div class="Ctitle">

                                <h3>Cosma Catalin</h3>
                                <h4>Phone:<a href="tel:0749827508" onclick="ga(\'send\', \'event\', { eventCategory: \'Contact\', eventAction: \'Call\', eventLabel: \'Mobile Button\'});"> 0749827508<p                                            class="call-button"></p></a></h4>	
                                <h4>Email:<a href="mailto:cata.cosma@outlook.com"> cata.cosma@outlook.com</a></h4>
                                <h4>Instagram:<a href="https://www.instagram.com/catalincosma/"> @catalincosma</a></h4>

                            </div>  

                            <div class="conForm">
                                <div class="bg">

                                    <h1 style="color:white; font-size:40px; text-align:center;">Ask a question</h1>
                            
                                    <form style="border:none;" action="php_c/PhpContact.php" method="POST">
                                        <input id="conInp" type="text" placeholder="Enter your question here" name="question">
                                        <button style="margin-right:auto; margin-left:auto; display:block; width:150px;" name="send">Send</button>
                                    </form>

                                 </div>
                            </div>
                            
                            <div class="Questions">
                                <h1 style="color:white; font-size:40px; text-align:center;">Questions</h1>
                                <div class="format">
                        ';
                        $sql = mysqli_query($conn,"SELECT * FROM questions ORDER BY ID DESC");
                        $i=0;
                        $maxId=0;
                        while($row = mysqli_fetch_assoc($sql)){
                            $i++;
                            $id = (int)$row["id"];
                
                            if($id > $maxId)$maxId=$id;
                
                            $q = $row["question"];
                            $answer = $row["answer"];
                            $user = $row["username"];
                            if(!empty($answer)){
                                echo "
                                <div class='qList'>
                                    <p><em>$user</em>: <strong>$q</strong></p>
                                    <p style='color:#69ff8f;'>Answer: <strong>$answer</strong></p>
                                </div>
                                ";
                            }else{
                                echo "
                                <div class='qList'>
                                    <p><em>$user</em>: <strong>$q</strong></p>
                                </div>
                                ";
                            }
                            if($i != $maxId)echo "<hr>";

                        
                        }
                        if( $maxId === 0 )echo "<p style='font-size:20px; padding-top:10px; text-align:center; color:white;'>No questions yet</p>";
                        
                                    
                        echo "</div></div>";
                
            }
        
        ?>


	 </main>
    
   

   </header>

   <audio controls> 
	<source src="audio/breakuself.ogg" type="audio/ogg"> 
	<source src="audio/breakuself.mp3" type="audio/mpeg"> 
</audio>
</body>
</html>