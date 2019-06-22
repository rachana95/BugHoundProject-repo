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
    $FunctionalArea = $_POST['FunctionalArea'];
    $AssignedTo = $_POST['AssignedTo'];
    $Comments = $_POST['Comments'];
    $ProgramName = $_POST['program'];
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "BugHound");
    $query = "UPDATE areas SET FunctionalArea = '$FunctionalArea',AssignedTo = '$AssignedTo',Comments='$Comments' ,ProgramName='$ProgramName' where AreaID = '$ID'";
    
    mysqli_query($con, $query);
     
    ?>
</h2>

<form action="ViewAllProgs.php" method="post" >
<p>
Employee Updated Successfully!. Please click on return to go back.<br />
<input type="submit" value = "Return" >

</h2>
</form>
<script language=Javascript>

</script>
</body>
</html>
