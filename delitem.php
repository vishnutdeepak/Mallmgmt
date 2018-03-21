<!DOCTYPE html>
<title> MALL SYSTEM </title>
<body>
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>

<div class="content">
<form action="" method="post">
<div class="form_header">ITEM TO BE DELETED: </div> 
	<div class="form_content">
	<p>
	    <label>Item ID:</label>
            <input type="text" name="Item_ID">
	</p>
<input type="submit" class="btn2" name= "Proceed" value="Submit">

</form>
    </div></div>


<?php

if(isset($_POST['Proceed'])) {
	$db = mysqli_connect('localhost','root','','Mall')
	or die('Error connecting to MYSQL server.');
	
	$Item_ID = mysqli_real_escape_string($db, $_REQUEST['Item_ID']);
	

	$sql = "DELETE from Item WHERE Item_ID ='$Item_ID'" ;
	

	if(mysqli_query($db, $sql)) {
	     header("Location: shop_owner.php");
	} 
	else {
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db). '<br />'. '<br />';
	}


	mysqli_close($db);
}

?>

<br>
<div class="back_button">
<a href="shop_owner.php"><input type="submit" class="btn" value="Back to Shop Owner Page!">
</div>
</body>
</html>

