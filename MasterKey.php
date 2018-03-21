<html>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<head>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body> 
<LINK REL="STYLESHEET" HREF="style.css" TYPE="text/css">
</STYLE>
    
<div class="mk"><div class ="contenttpwd"><?php
    session_start();
$db = mysqli_connect('localhost','root','','Mall')
or die('Error connecting to MYSQL server.');

  $query1 = "SELECT master_pass from mall_owner";
    

if($result1 = mysqli_query($db, $query1)){
    if(mysqli_num_rows($result1) > 0){
        
            $row = mysqli_fetch_array($result1);
        $masterkey = $row['master_pass'];
            echo "$masterkey";
      $_SESSION["mastery"] = "$masterkey";
         
        }
        
   
     
    }
    

 
else{
    echo "ERROR: COULD NOT EXECUTE: $query1. " . mysqli_error($db);
}

mysqli_close($db);
    ?></div></div>





 
<script>
    $(".mk").delay(3000).fadeOut(300);
    setTimeout(function () {
   window.location.href = "mall_owner.php"; //will redirect to your blog page (an ex: blog.html)
}, 3350);

</script>
    
	
</body>
</html>
