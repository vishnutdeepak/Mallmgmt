<html>
<head>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body> 
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>


<?php
$db = mysqli_connect('localhost','root','','Mall')
or die('Error connecting to MYSQL server.');
?>

<div class="back_button"><?php

$query = "SELECT * FROM shop;";

if($result = mysqli_query($db, $query)){
    if(mysqli_num_rows($result) > 0){
         echo "<table>";
            echo "<tr>";
                echo "<th>SHOP-ID</th>";
                echo "<th>NAME</th>";
		echo "<th>TYPE </th>";
               
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Shop_ID'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);  // Free result set
    } 
    else{
        echo "NO RECORDS FOUND!";
    }

} 
else{
    echo "ERROR: COULD NOT EXECUTE: $sql1. " . mysqli_error($db);
}

mysqli_close($db);
?></div>
<br>
<div class="back_button"><a href="customer.php"><input type="submit" class="btn" value="Back to Customer Page!"></div>

</body>
</html>
