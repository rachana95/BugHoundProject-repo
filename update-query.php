<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>CECS 544 Lab 4</title>
    </head>
    <body>
	 
        <h2>
            <?php
                $ID=$_POST['ID'];
                $name = $_POST['name'];
                $userName = $_POST['userName'];
                $password = $_POST['password'];
				$userLevel = $_POST['userLevel'];
				$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
				$query = "UPDATE employee SET Name = '$name',Username = '$userName',Password='$password',Userlevel='$userLevel' where EmpID = '$ID'";
				
                mysqli_query($con, $query);
               

            ?>
            
          
          
        </h2>
		
        <form action="employee.php" method="post" >
            <p>
            Employee Updated Successfully!. Please click on return to go back.<br />
            <input type="submit" value = "Return" >
               
        </h2>
		</form>
        <script language=Javascript>
           
        </script>
    </body>
</html>
