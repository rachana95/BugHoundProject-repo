<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>Add New Program</title>
</head>
<body>

<h2>
<?php
    
    $Programname =  $_POST['Programname'];
    
    $Release = $_POST['Release'];
   
    $Version = $_POST['Version'];
   
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "bughound");
    $query = "INSERT INTO program (ProgramName,release1,Version) VALUES ('".$Programname."','".$Release."','".$Version."')";
    
    mysqli_query($con, $query);
   
    ?>

<form action="ViewP.php" method="post" onsubmit="return validate(this)">
<p>
<input type="submit" value="View all Programs" id="button1" name="submit">
<input type="button" value="Add Program" id="button2" name="add Program" onclick="go_home()">
</h2>
</form>
<script language=Javascript>
function go_home(){
    window.location.replace("indexP.php");
}
</script>

</body>
</html>

