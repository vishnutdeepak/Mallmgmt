<!DOCTYPE html>
<title> MALL SYSTEM </title>
<body>
<LINK REL="STYLESHEET" HREF="style.css" >
</STYLE>

<div class="content">
<form action="" method="post">
<div class="form_header"><p> Enter current Mall Owner Details</p></div>
	<p>
        <div class="form_content">
	
	</p>
	<p>
	    <label>USERNAME</label>
            <input type="text" required="yes" name="u_name">
	</p>

	<p>
	    <label>PASSWORD</label>
            <input type="password" required="yes" name="pwd">
	</p>
	
	
	<br>

       

	<input type="submit" class="btn" name= "Proceed" value="Proceed">
 



</div>
</form>
</div>
<div class="form_content">
<a href="homepage.html"><button class="btn">Back to Home</button></a></div>
<?php

	if(isset($_POST['Proceed'])){
       
        
        
		$db = mysqli_connect('localhost','root','','Mall')
		 or die('Error connecting to MySQL server.');


		
		$username = mysqli_real_escape_string($db, $_REQUEST['u_name']);
        	$password= md5(mysqli_real_escape_string($db, $_REQUEST['pwd']));
        
        
    
        
		$sql = "select master_pass from person,Mall_owner where person.id = m_owner_id and person.username='$username' and person.pass_word='$password' ";

        $result=mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);
      $mpass=$row['master_pass'];
       
   
            if($result)
            {
                if(mysqli_num_rows($result)==1)
                {
                    
                            $sql1="delete from mall_owner where master_pass='$mpass'";
                    $result1=mysqli_query($db, $sql1);
                    if($result1)
                    {
                        $sql2="update mall_owner set master_pass = '$mpass'";
                        if($result2=mysqli_query($db,$sql2))
                             header("Location: homepage.html");
                    }
                               
                 }
                else echo '<script type="text/javascript">alert("Wrong username or password")</script>';
                }
            
                else
		    	echo "ERROR:  not able to execute $sql. " . mysqli_error($db);
            
	
		mysqli_close($db);
	
    }
    
?>

</body>
</html>

