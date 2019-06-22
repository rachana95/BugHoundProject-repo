<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Update/Delete Programs</title>
</head>
<body>
<?php
    $ID=$_GET['ID'];
    $Programname = $_GET['ProgramName'];
    $Release = $_GET['release1'];
    $Version = $_GET['Version'];
   
    printf("All Programs <p>");
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "bughound");
    $query = "Select * from program where ProgramID = '$ID' ";
    mysqli_query($con, $query);
    ?>
<form action="UpdateProg.php" method="post" onsubmit="return validate(this)" >
<table>
<input type="hidden" name="ID" value="<?php echo $ID; ?>">
<tr><td>Program Name:</td><td><input type="Text" name="Programname" value="<?php echo $Programname; ?>"></td></tr>
<tr><td>Release:</td><td><input type="Text" name="Release" value="<?php echo $Release; ?>"></td></tr>
<tr><td>Version:</td><td><input type="Text" name="Version" value="<?php echo $Version; ?>"></td></tr>

</table>
<input type="submit" name="Update" value="Update">
<input type="button" name="cancel" value="cancel" onclick="go_home()">
</form>
<script language=Javascript>
function go_home(){
    window.location.replace("ViewP.php");
}

function validate(theform) {
    if(theform.ProgramName.value === ""){
        alert ("Program name field must contain characters");
        return false;
    }
    if(theform.Release.value === ""){
        alert ("Release field must contain characters");
        return false;
    }
    if(theform.Version.value === ""){
        alert ("Version field must contain characters");
        return false;
    }
    return true;
}
</script>
</body>
</html>
