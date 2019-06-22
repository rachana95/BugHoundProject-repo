<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>Program</title>
</head>
<body>

<h2>
<?php
    $ID=$_POST['ID'];
    $Programname = $_POST['Programname'];
    $Release = $_POST['Release'];
    $Version = $_POST['Version'];
    
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "bughound");
    $query = "UPDATE program SET ProgramName = '$Programname',release1 = '$Release',Version='$Version' where ProgramID = '$ID'";
    
    mysqli_query($con, $query);
    
    
    ?>



</h2>

<form action="ViewP.php" method="post" >
<p>
Program Updated Successfully!. Please click on return to go back.<br />
<input type="submit" value = "Return" >

</h2>
</form>
<script language=Javascript>

</script>
</body>
</html>
