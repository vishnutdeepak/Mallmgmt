<!DOCTYPE html>
<title> MALL SYSTEM </title>
<body>
<LINK REL="STYLESHEET" HREF="style.css" >
</STYLE>

<div class="content">
<form action="" method="post">
<div class="form_header"><p> Enter Employee Details</p></div>
	<p>
        <div class="form_content">
	
	</p>
	<p>
	    <label>JOB</label>
            <input type="text" required="yes" name="job">
	</p>

	<p>
	    <label>Salary</label>
            <input type="number" required="yes" name="salary">
	</p>

	<p>
	    <label>Timings (Start)</label>
            <input type="time" required="yes" name="timing_s">
	</p>
    <p>
	    <label>Timings (End)</label>
            <input type="time" required="yes" name="timing_e">
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


		
		$job = mysqli_real_escape_string($db, $_REQUEST['job']);
        	$salary = mysqli_real_escape_string($db, $_REQUEST['salary']);
        	$timing1 = mysqli_real_escape_string($db, $_REQUEST['timing_s']);
        $timing2 = mysqli_real_escape_string($db, $_REQUEST['timing_e']);
    
        
		$sql = "Update employee set job='$job',salary=$salary,timings='$timing1-$timing2' where JOB = 'newrow'";

            if(mysqli_query($db, $sql))
            {
                    
                        header("Location: homepage.html");
                    }
                else
		    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
            
	
		mysqli_close($db);
	
    }
    
?>

</body>
</html>

