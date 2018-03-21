<html>
<body> 
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>

<?php
$db = mysqli_connect('localhost','root','','Mall')
or die('Error connecting to MYSQL server.');
?>
    <div class="content"><div class="form_header">THE STAR MALL<div class ="new_col"><?php

    $avg = "SELECT avg(rating) from rating_review";
if($avgresult=mysqli_query($db, $avg)){
    
    if(mysqli_num_rows($avgresult) > 0 )
    {
        $rowavg = mysqli_fetch_array($avgresult);
    $avgval = $rowavg['avg(rating)'];
        if($avgval!=0)
            
            echo " &nbsp; Average Rating : ";
    echo number_format((float)$avgval, 2, '.', ''); 
    }
}
    ?></div></div><br>


   
    <?php
    $query = "SELECT * FROM rating_review;";
if($result = mysqli_query($db, $query)){
    if(mysqli_num_rows($result) > 0){
         echo "<table>";
            echo "<tr>";
                echo "<th>Rating</th>";
                echo "<th>Review</th>";
		
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['rating'] . "</td>";
                echo "<td>" . $row['review'] . "</td>";
	
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
?>

    <br></div><br>
<div class="back_button"><a href="mall_owner.php"><input type="submit" class="btn" value="Back to Mall Owner Page!"></div>
</body>
</html>
