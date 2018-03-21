<!DOCTYPE html>
<title> MALL SYSTEM </title>
<body>
<LINK REL="STYLESHEET" HREF="style.css" >
</STYLE>

<div class="content">
<form action="welcome.php" method="post">
<div class="form_header"><p> Sign up as? </p></div>
	<p>
        <div class="form_content">
	<input type = "radio" name = "role" value = "cust"> Customer 
	<input type = "radio" name = "role" value = "emp"> Employee 
	<input type = "radio" name = "role" value = "shop_own"> Shop Owner 
	<input type = "radio" name = "role" value = "mall_own"> Mall Owner <br></br>
	</p>
	<p>
	    <label>ID:</label>
            <input type="text" required="yes" name="ID">
	</p>

	<p>
	    <label>Username:</label>
            <input type="text" required="yes" name="username">
	</p>

	<p>
	    <label>Password:</label>
            <input type="password" required="yes" name="pass_word">
	</p>
	

        <p>
            <label>Aadhar Card No:</label>
            <input type="text" name="Aadhar_card">
        </p>

	<p>
            <label>First Name:</label>
            <input type="text" required="yes" name="first_name">
        </p>

        <p>
            <label>Last Name:</label>
            <input type="text" name="last_name">
        </p>

	<p>
            <label>Email id:</label>
            <input type="text" required="yes" name="email_id">
        </p>
	
	<p>
            <label>DOB(YYYY-MM-DD):</label>
            <input type="date" min="1900-01-01" required="yes" name="DOB">
        
        </p>       

        <p>
            <label>Age:</label>
            <input type="number" max="150"  name="age">
        </p>

	<p>
            <label>Phone No:</label>
            <input type="text" required="yes" name="phoneno">
        </p>
          
	<p>
	    <label>Address:</label>
	    <input type="text" name="address">
	</p><br>

	<input type="submit" class="btn" name= "Proceed" value="Proceed">
</div>
</form>
</div>

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	if(isset($_POST['Proceed'])){
        if(isset($_POST['role'])){
        
        
		$db = mysqli_connect('localhost','root','','Mall')
		 or die('Error connecting to MySQL server.');


		$ID = mysqli_real_escape_string($db, $_REQUEST['ID']);
		$username = mysqli_real_escape_string($db, $_REQUEST['username']);
		$pass_word = md5(mysqli_real_escape_string($db, $_REQUEST['pass_word']));
		$Aadhar_card = mysqli_real_escape_string($db, $_REQUEST['Aadhar_card']);
		$first_name = mysqli_real_escape_string($db, $_REQUEST['first_name']);
		$last_name = mysqli_real_escape_string($db, $_REQUEST['last_name']);
		$email_id = mysqli_real_escape_string($db, $_REQUEST['email_id']);
        $DOB = mysqli_real_escape_string($db, $_REQUEST['DOB']);
		$age = mysqli_real_escape_string($db, $_REQUEST['age']);
		$phoneno = mysqli_real_escape_string($db, $_REQUEST['phoneno']);
		$address = mysqli_real_escape_string($db, $_REQUEST['address']);    
            
		$DOB = test_input($DOB);
		$age = test_input($age);
		$phoneno = test_input($phoneno);
		$address = test_input($address);
            
            $ID = test_input($ID);
		$username = test_input($username);
		$pass_word = test_input($pass_word);
		$Aadhar_card = test_input($Aadhar_card);
		$first_name = test_input($first_name);
		$last_name = test_input($last_name);
		$email_id = test_input($email_id);
            
            
		
if (preg_match("/^[a-zA-Z ]*$/i",$first_name)&&preg_match("/^[a-zA-Z ]*$/i",$last_name))
{
    if (filter_var($email_id, FILTER_VALIDATE_EMAIL)){
		$sql = "INSERT INTO Person VALUES ('$ID', '$username','$pass_word', '$Aadhar_card', '$first_name','$last_name','$email_id', '$DOB' ,'$age','$phoneno' ,'$address')";

            if(mysqli_query($db, $sql))
            {
                    if($_POST['role']=='cust')
                    {
                        $sql1 = "INSERT INTO Customer VALUES ('$ID')";
                        if(mysqli_query($db, $sql1))
                        header("Location: homepage.html");
                    }
                else if($_POST['role']=='emp')
                    {
                        $sql1 = "INSERT INTO employee (Emp_ID,job) VALUES ('$ID','newrow')";
                        if(mysqli_query($db, $sql1))
                        header("Location: emp_spec.php");
                    }
                if($_POST['role']=='shop_own')
                    {
                        $sql1 = "INSERT INTO shop_owner(Sh_Owner_ID,S_ID) VALUES ('$ID','new')";
                        if(mysqli_query($db, $sql1))
                        header("Location: shop_spec.php");
                    }
                if($_POST['role']=='mall_own')
                    {
                       $sql1 = "INSERT INTO mall_owner(M_owner_id,master_pass) VALUES ('$ID','new')";
                    echo "yay";
                        if(mysqli_query($db, $sql1))
                        header("Location: mall_spec.php");
                    }
                else
		    	echo "ERROR: Not able to execute $sql1. " . mysqli_error($db);
            }
	
		 else
		    	echo "ERROR: Not able to execute $sql. " . mysqli_error($db);
		mysqli_close($db);
	}
else echo '<script type="text/javascript">alert("Enter a valid name!");</script>';
}
            
            
        else echo '<script type="text/javascript">alert("Enter a valid email format!");</script>';
}
        else echo '<script type="text/javascript">alert("Choose a user type!");</script>';
    }
?><br>
<div class="back_button">
    <a href="sign_in.php"><input type="submit" class="btn" value="Back to Sign in Page!"></div>
</div>
</body>
</html>

