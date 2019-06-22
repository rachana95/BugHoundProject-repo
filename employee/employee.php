<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>search emp</title>
    </head>
    <body>
	 
        <h2>
            <?php
            
                $name =  $_POST['name'];
                $userName = $_POST['userName'];
                $password = $_POST['password'];
				$userLevel = $_POST['userLevel'];
				$con = mysqli_connect("localhost","root");
                mysqli_select_db($con, "bughound");
                if($name!=""){
				$query = "INSERT INTO employee (Name,Username,Password,Userlevel) VALUES ('".$name."','".$userName."','".$password."','".$userLevel."')";
				
                mysqli_query($con, $query);
                }

            ?>
             <form action="view.php" method="post" onsubmit="return validate(this)">
            <p>
            <input type="hidden" value="<?php echo $name; ?>">
            <input type="Text" name="name">
            <input type="submit" value="Search" id="button1" name="search">   
            <input type="button" value="Add employee" id="button2" name="add employee" onclick="go_home()">   
        </h2>
        <a href="maintainance_list.php">Return</a><br/><br/>
  </div>
		</form>
        <script language=Javascript>
            function go_home(){
                window.location.replace("lab4.php");
            }
        </script>
            
    </body>
</html>
