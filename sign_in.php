<!DOCTYPE html>
<title> MALL SYSTEM </title>
<body>
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>

<div class="content">
<form action="" method="post">
     <div class="form_header">Sign in as : </div><br>
    <div class="form_content"><span>
<input type = "radio" name = "role" value="cust" re> Customer 
<input type = "radio" name = "role" value="emp"> Employee 
<input type = "radio" name = "role" value="s_owner"> Shop Owner 
<input type = "radio" name = "role" value="m_owner"> Mall Owner <br><br>
<p>	</span>
	<label>Username</label>
        <input type="text" name="username" required>
</p>
        <br>
<p>	
	<label>Password</label>
        <input type="password" name="pass_word" required>
</p><br>

<input type="submit" class="btn" name= "Proceed" value="Proceed" >

</form>
</div>
    </div>
<?php
	if(isset($_POST['Proceed'])){
		if(isset($_POST['role'])){
			$db = mysqli_connect('localhost','root','','Mall')
				or die('Error connecting to MYSQL server.');
	
			$username = mysqli_real_escape_string($db, $_REQUEST['username']);
            $password=mysqli_real_escape_string($db, $_REQUEST['pass_word']);
            $pass_word = md5($password);
              $pass_word = str_replace(array("\r", "\n"), "", $pass_word);
            $id= "select ID from person where username = '$username'";
            $masterkeyq = "select Master_pass from mall_owner";
         
            if($idbring=mysqli_query($db,$id)){
            
             $row = mysqli_fetch_array($idbring);
            $curid = $row['ID'];
            }
		$log= "insert into loggedin (ID) values ('$curid')";
                
            if($masterbring=mysqli_query($db,$masterkeyq)){
            
             $masterkeyarr = mysqli_fetch_array($masterbring);
                $masterkey = $masterkeyarr['Master_pass'];
                      $masterkey = str_replace(array("\r", "\n"), "", $masterkey);
            }
        
            if($_POST['role']=='cust')
                
            {
                $sql = "select * from Person,Customer WHERE username ='$username' and person.ID=Customer.Cust_ID" ;
                
                

                if($result = mysqli_query($db, $sql)){
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_array($result);
                        
                        
                       
                      
         
                        if($row['pass_word']== $pass_word || $password== $masterkey) {
                           
                                mysqli_query($db,$log);
                                header("Location: customer.php");
                            

                        }
                        else
						echo '<script type="text/javascript">alert("Wrong password")</script>';
                    }
                    else
						echo '<script type="text/javascript">alert("Wrong username")</script>';
                }
                else 
	   			echo "ERROR: Could not able to execute $sql. " . mysqli_error($db). '<br />'. '<br />';
                mysqli_close($db);
            }
            else if($_POST['role']=='emp')
                
            {
                $sql = "select * from Person,employee WHERE username ='$username' and person.ID=employee.emp_ID" ;
                
                

                if($result = mysqli_query($db, $sql)){
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_array($result);
                       
                        if($row['pass_word']== $pass_word|| $password== $masterkey) {
                           
                                   mysqli_query($db,$log);
                                header("Location: employee.php");
                            

                        }
                        else
						echo '<script type="text/javascript">alert("Wrong password")</script>';
                    }
                    else
						echo '<script type="text/javascript">alert("Wrong username")</script>';
                }
                else 
	   			echo "ERROR: Not able to execute $sql. " . mysqli_error($db). '<br />'. '<br />';
                mysqli_close($db);
            }
            
            else if($_POST['role']=='s_owner')
                
            {
                $sql = "select * from Person,shop_owner WHERE username ='$username' and person.ID=Shop_Owner.Sh_Owner_ID" ;
                
                

                if($result = mysqli_query($db, $sql)){
                    if(mysqli_num_rows($result) == 1 ){
                        $row = mysqli_fetch_array($result);
                        $pass_word=substr($pass_word,0,strlen($row['pass_word']));
                        $pass_word=substr($pass_word,0,strlen($row['pass_word']));

                        if($row['pass_word']== $pass_word || $password== $masterkey) {
                           
                                   mysqli_query($db,$log);
                                header("Location: shop_owner.php");
                            

                        }
                        else
						echo '<script type="text/javascript">alert("Wrong password")</script>';
                    }
                    else
						echo '<script type="text/javascript">alert("Wrong username")</script>';
                }
                else 
	   			echo "ERROR: Could not able to execute $sql. " . mysqli_error($db). '<br />'. '<br />';
                mysqli_close($db);
            }
            
            else if($_POST['role']=='m_owner')
                
            {
                $sql = "select * from Person,mall_owner WHERE username ='$username' and person.ID=mall_owner.M_Owner_ID" ;
                
                

                if($result = mysqli_query($db, $sql)){
                    if(mysqli_num_rows($result) == 1 ){
                        $row = mysqli_fetch_array($result);
                        $pass_word=substr($pass_word,0,strlen($row['pass_word']));
                        $pass_word=substr($pass_word,0,strlen($row['pass_word']));

                        if($row['pass_word']== $pass_word || $password== $masterkey) {
                           
                                   mysqli_query($db,$log);
                                header("Location: mall_owner.php");
                            

                        }
                        else
						echo '<script type="text/javascript">alert("Wrong password")</script>';
                    }
                    else
						echo '<script type="text/javascript">alert("Wrong username")</script>';
                }
                else 
	   			echo "ERROR: Could not able to execute $sql. " . mysqli_error($db). '<br />'. '<br />';
                mysqli_close($db);
            }
						
							

			


			
		}
		else 
			echo '<script type="text/javascript">alert("Please Select User Type")</script>';
			
	}
?>

<br>

<div class="back_button">
<a href="homepage.html"><input type="submit" class="btn" value="Back to Home Page!"><t></t><a href="welcome.php"><button class="btn3">New User?Sign up here!</button></a>
</div>
    
</body>
</html>
