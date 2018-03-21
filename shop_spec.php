<!DOCTYPE html>
<title> MALL SYSTEM </title>
<body>
<LINK REL="STYLESHEET" HREF="style.css" >
</STYLE>

<div class="content">
<form action="" method="post">
<div class="form_header"><p> Enter Shop Details Details</p></div>
	<p>
        <div class="form_content">
	
	</p>
	<p>
	    <label>SHOP ID</label>
            <input type="text" required="yes" name="s_id">
	</p>

	<p>
	    <label>SHOP NAME</label>
            <input type="text" required="yes" name="name">
	</p>
	<p>
	    <label>TYPE</label>
            <input type="text" required="yes" name="type">
	</p>

	
	<br>

       

	<input type="submit" class="btn" name= "Proceed" value="Proceed">
</div>
</form>
</div>

<?php

	if(isset($_POST['Proceed'])){
       
        
        
		$db = mysqli_connect('localhost','root','','Mall')
		 or die('Error connecting to MySQL server.');


		
		$sid = mysqli_real_escape_string($db, $_REQUEST['s_id']);
        	$name = mysqli_real_escape_string($db, $_REQUEST['name']);
        	$type = mysqli_real_escape_string($db, $_REQUEST['type']);
        
    
        
		$sql = "Update shop_owner set S_ID='$sid' where S_ID = 'new'";

            if(mysqli_query($db, $sql))
            {
                    $sql1 = "INSERT into shop(shop_id,name,type) values('$sid','$name','$type')";
                if(mysqli_query($db, $sql1)){
                        header("Location: homepage.html");
                }
                    }
                else
		    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
            
	
		mysqli_close($db);
	
    }
    
?>

</body>
</html>

