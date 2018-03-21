<html>
<head>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body> 
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>


<div class="content"><div class="form_header"> Welcome <div class="new_col3">Shop Owner!</div></div><br>
	 <div class="form_content"><span> <a href="viewitem.php"><input type="submit" class="btn2" value="View Item Details">
	 <a href="additem.php"><input type="submit" class="btn2" value="Add Items">
	 <a href="delitem.php"><input type="submit" class="btn2" value="Delete Items"> </span></div></div>
         <br><div class="back_button"><form action="" method="post"><input type="submit" class="btn" value="Back to Home Page!" name="logout"></form></div>
         
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
