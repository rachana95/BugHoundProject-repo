<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Program index</title>
</head>
<body>
<h1>Add new Program</h1>
<form action="Program.php" method="post" onsubmit="return validate(this)">
<table>
<tr><td>Program Name:</td><td><input type="Text" name="Programname"></td></tr>
<tr><td>Release:</td><td><input type="Text" name="Release"></td></tr>
<tr><td>Version:</td><td><input type="Text" name="Version"></td></tr>

</table>
<input type="submit" name="submit" value="Submit">
<input type="button" name="cancel" value="cancel" onclick="go_home()">
</form>
<script language=Javascript>
function go_home(){
    window.location.replace("maintainance_list.php");
}
function validate(theform) {
    if(theform.Programname.value === ""){
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
