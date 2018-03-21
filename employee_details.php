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

  $query1 = "SELECT Emp_ID,job,salary,timings,name,shop.shop_id from employee,loggedin,shop where shop.Shop_ID=employee.shop_ID and employee.emp_ID=loggedin.ID";
    

if($result1 = mysqli_query($db, $query1)){
    if(mysqli_num_rows($result1) > 0){
        
            
            
      
         echo "<table>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>TIMING </th>";
        echo "<th>SALARY </th>";
		   echo "<th>SHOP ID </th>";
                echo "<th>SHOP NAME</th>";
     
            echo "</tr>";
        while($row = mysqli_fetch_array($result1)){
            echo "<tr>";
                
                echo "<td>" . $row['Emp_ID'] . "</td>";
		echo "<td>" . $row['timings'] . "</td>";
            echo "<td>" . $row['salary'] . "</td>";
                echo "<td>" . $row['shop_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
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
    echo "ERROR: COULD NOT EXECUTE: $query1. " . mysqli_error($db);
}

mysqli_close($db);
?>
<br>
    <a href="employee.php"><input type="submit" class="btn" value="Back to Employee Page!"></div>

</body>
</html>
