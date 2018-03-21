<!DOCTYPE html>
<title> MALL SYSTEM </title>
<body>
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>

<div class="content">
<form action="" method="post">
<div class="form_header">ITEM DETAILS</div> 
	<div class="form_content">
	<p>
	    <label>Item ID:</label>
            <input type="text" name="Item_ID">
	</p>
	<p>
	    <label>Price/Piece:</label>
            <input type="number" name="price">
	</p>
        <p>
            <label>Quantity:</label>
            <input type="text" name="quantity">
        </p>
	
<input type="submit" class="btn2" name= "Proceed" value="Submit">
</form>
    </div></div>


<?php

if(isset($_POST['Proceed'])) {
	$db = mysqli_connect('localhost','root','','Mall')
	or die('Error connecting to MYSQL server.');
	
	$Item_ID = mysqli_real_escape_string($db, $_REQUEST['Item_ID']);
	$price = mysqli_real_escape_string($db, $_REQUEST['price']);
	$quantity = mysqli_real_escape_string($db, $_REQUEST['quantity']);
	
    $sid = "select s_id from shop_owner,loggedin where shop_owner.Sh_Owner_ID=loggedin.ID";

    if($result1 = mysqli_query($db, $sid)){
    if(mysqli_num_rows($result1) > 0){
        $row = mysqli_fetch_array($result1);
        $shopid=$row['s_id'];
        
    }

	$sql = "INSERT INTO Item VALUES ('$Item_ID', '$price','$quantity', '$shopid')";

	if(mysqli_query($db, $sql)) {
	     header("Location: shop_owner.php");
	} 
	else {
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db). '<br />'. '<br />';
	}


	mysqli_close($db);
}
}
?>

<br>
<div class="back_button">
    <a href="shop_owner.php"><input type="submit" class="btn" value="Back to Shop Owner Page!"></div>

</div>
</body>
</html>

