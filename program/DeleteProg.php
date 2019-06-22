<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>Program</title>
</head>
<body>

<h2>
<?php
    $ID=$_POST['ProgramID'];
    $Programname = $_POST['ProgramName'];
    $Release = $_POST['Release'];
    $Version = $_POST['Version'];
    $CreatedBy = $_POST['CreatedBy'];
    $CreatedDate = $_POST['CreatedDate'];
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "BugHound");
    $query = "Delete from Program where ProgramID = '$ID'";
    
    mysqli_query($con, $query);
    
    
    ?>



</h2>

<form action="Program.php" method="post" >
<p>
Employee Updated Successfully!. Please click on return to go back.<br />
<input type="submit" value = "Return" >

</h2>
</form>
<script language=Javascript>

</script>
</body>
</html>
