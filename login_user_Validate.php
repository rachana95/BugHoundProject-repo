<?php  session_start(); ?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	 
        <h2>
            <?php
                
                $userName = $_POST['userName'];
                echo $userName;
                $password =$_POST['password'];
                echo $password;
                $con = mysqli_connect("localhost","root");
                mysqli_select_db($con, "bughound");
				
                $query = "SELECT * FROM employee WHERE  username ='$userName' and Password ='$password'";
                
                   $res = mysqli_query($con, $query);
                    $num_rows = mysqli_num_rows($res);
                    echo $num_rows;
                    if($num_rows==1){ 
                        $row = mysqli_fetch_array($query); 
                       
                        $_SESSION['userName'] = $row['username']; 
                        $_SESSION['password'] = $row['Name']; 
                        $_SESSION['logged'] = TRUE; 
                        $_SESSION['userLevel'] = $row['userlevel']; 
                       
                        header("Location: main_page.php"); // Modify to go to the page you would like 
                        exit; 
                    }else{ 
                       header("Location: login.php"); 
                   
                        exit; 
                } 
            ?>
        </h2>
		</form>
        <script language=Javascript>
          
        </script>
            
    </body>
</html>
