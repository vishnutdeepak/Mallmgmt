<html>
<body> 
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>


    <div class="content"><div class="form_header"> Welcome <div class ="new_col">Customer!</div></div><br>

   <div class="form_content"><span> <a href="m_dir.php"><input type="submit" class="btn2" value="Mall Directory"  ></a>
    <a href="feedback.php"><input type="submit" class="btn2" value="Feedback"></a><br> </span></div></div><br><div class="back_button"> 
   <form action="" method="post"> <a href="homepage.html"><input type="submit" class="btn" value="Back to Home Page!" name="logout"></div></form>
    
    <?php
	if(isset($_POST['logout'])){
		
			$db = mysqli_connect('localhost','root','','Mall')
				or die('Error connecting to MYSQL server.');
	
			
            $logout= "delete from loggedin";
            
         
            if($result=mysqli_query($db,$logout)){
            echo '<script type="text/javascript">alert("Logging out")</script>';
                header("Location: homepage.html");
             
            }
	   			else echo "ERROR: Not able to execute $sql. " . mysqli_error($db). '<br />'. '<br />';
                mysqli_close($db);
        
            }
						
?>

</body>
</html>
