<html>
<head>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body> 
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>




<div class="back_button"><?php
$db = mysqli_connect('localhost','root','','Mall')
or die('Error connecting to MYSQL server.');

  $query1 = "SELECT Item_ID, price, quantity from item,employee,loggedin where item.S_ID=employee.shop_ID and employee.emp_ID=loggedin.ID";
    

if($result1 = mysqli_query($db, $query1)){
    if(mysqli_num_rows($result1) > 0){
        
            
            
      
         echo "<table>";
            echo "<tr>";
                echo "<th>ITEM ID</th>";
                echo "<th>PRICE </th>";
		
                echo "<th>QUANTITY </th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result1)){
            echo "<tr>";
                
                echo "<td>" . $row['Item_ID'] . "</td>";
		echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        mysqli_free_result($result1);  // Free result set
    }
    else{
        echo "NO RECORDS FOUND!";
    }

} 
else{
    echo "ERROR: COULD NOT EXECUTE: $sql1. " . mysqli_error($db);
}

mysqli_close($db);
    ?>
<br>
<a href="employee.php"><input type="submit" class="btn" value="Back to Employee Page!"></div>

</body>
</html>
