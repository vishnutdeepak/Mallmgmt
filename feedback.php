<!DOCTYPE html>
<title> MALL SYSTEM </title>
<body>
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>

<div class="content">
<form action="" method="post">
     <div class="form_header">Rating and Review</div><br>
    <div class="form_content">
<input type = "radio" name = "rating" value="1" ><img src="1star.png" width="42" height="42"> 
<input type = "radio" name = "rating" value="2"> <img src="2star.png" width="42" height="42"> 
<input type = "radio" name = "rating" value="3">  <img src="3star.png" width="42" height="42"> 
<input type = "radio" name = "rating" value="4"><img src="4star.png" width="42" height="42"> 
        <input type = "radio" name = "rating" value="5"> <img src="5star.png" width="42" height="42"> <br><br>
<p>	
        <div class="newfont">Review</div><br>

        <input type="text" style="height:30px; width:400px" name="rv">
</p>
<br>

<input type="submit" class="btn2" name= "Submit" value="Proceed">

</form>
</div>
    </div>
<?php

	if(isset($_POST['Submit'])){
		if(isset($_POST['rating'])){
              echo '<script type="text/javascript">alert("Select Rating")</script>';
			$db = mysqli_connect('localhost','root','','Mall')
				or die('Error connecting to MYSQL server.');
	
			$rating = mysqli_real_escape_string($db, $_REQUEST['rating']);
            $review = mysqli_real_escape_string($db, $_REQUEST['rv']);
		
                
          
                $sql = "INSERT into rating_review (rating,review) values ('$rating','$review')" ;
                
                

                if($result = mysqli_query($db, $sql)){
                    
                    
						echo '<script type="text/javascript">alert("Feedback recorded")</script>';
                        header("Location: customer.php");
                }
                else 
	   			echo "ERROR: Not able to execute $sql. " . mysqli_error($db). '<br />'. '<br />';
                mysqli_close($db);
            }
            
            else echo '<script type="text/javascript">alert("Select Rating")</script>';
            
           
            }
						
							

			


			
		
			
	
?>

<br>
<div class="back_button">
<a href="customer.php"><input type="submit" class="btn" value="Back to Customer Page!">
</div>
</body>
</html>
