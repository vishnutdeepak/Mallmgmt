<!DOCTYPE html>
<title> MALL SYSTEM </title>
<body>
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>

<div class="content">
<form action="" method="post">
<div class="form_header">ENTER NEW MASTER KEY </div> 
	<div class="form_content">
	<p>
	    
            <input type="text" name="mkey">
	</p>
<input type="submit" class="btn2" name= "Proceed" value="Submit">

</form>
    </div></div>


<?php

if(isset($_POST['Proceed'])) {
	$db = mysqli_connect('localhost','root','','Mall')
	or die('Error connecting to MYSQL server.');
	
	$mkey = mysqli_real_escape_string($db, $_REQUEST['mkey']);
	

	$sql = "update mall_owner set Master_pass ='$mkey'" ;
	

	if(mysqli_query($db, $sql)) {
	     header("Location: mall_owner.php");
	} 
	else {
	    echo "ERROR: Not able to execute $sql. " . mysqli_error($db). '<br />'. '<br />';
	}


	mysqli_close($db);
}

?>

<br>
<div class="back_button">
<a href="mall_owner.php"><input type="submit" class="btn" value="Back to Mall Owner Page!">
</div>
</body>
</html>

