<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CECS 544 Lab 4</title>
    </head>
    <body>
       <?php
       $ID = $_GET['ID'];
       $name = $_GET['FirstName'];
       $userName = $_GET['userName'];
       $password = $_GET['password'];
       $userLevel = $_GET['userLevel'];
 	   printf("View-Edit-Update Employee %d .<p>",$ID);
	   $con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
				$query = "Select * from employee where EmpID = '$ID'";
				mysqli_query($con, $query);
	   ?>
        <form action="update-query.php" method="post" >
            <table>
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
                <tr><td>Name:</td><td><input type="Text" name="name" value="<?php echo $name; ?>"></td></tr>
                <tr><td>User name:</td><td><input type="Text" name="userName" value="<?php echo $userName; ?>"></td></tr>     
				<tr><td>password:</td><td><input type="text" name="password" value="<?php echo $password; ?>"></td></tr>     
				<tr><td>User level:</td><td><input type="number" name="userLevel" value="<?php echo $userLevel; ?>"></td></tr>     
            </table>
            <input type="submit" name="Update" value="Update">
			<input type="button" name="cancel" value="cancel">
        </form>
        <script language=Javascript>
		 function go_home(){
                window.location.replace("view.php");
            }
            function validate(theform) {
                if(theform.name.value === ""){
                    alert ("name field must contain characters");
                    return false;
                }
                if(theform.userName.value === ""){
                    alert ("User name field must contain characters");
                    return false;
                }
				 if(theform.password.value === ""){
                    alert ("Password field must contain characters");
                    return false;
                }
				 if(theform.userLevel.value === ""){
                    alert ("User level  field must contain characters");
                    return false;
                }
                return true;
            }
</script>
    </body>
</html>
