<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>Add New Functional area</title>
</head>
<body>

<h2>
<?php
    $programid= $_POST['ProgID'];
    $FunctionalArea =  $_POST['FunctionalArea'];
    $ProgramName = $_POST['program'];
    $AssignedTo = $_POST['AssignedTo'];
    $Comments = $_POST['Comments'];

  $con = mysqli_connect("localhost","root");
  mysqli_select_db($con, "BugHound");

    $q = "SELECT * FROM program WHERE ProgramName='$ProgramName'";
    $result = mysqli_query($con, $q);
    while ($row=mysqli_fetch_row($result)) {
        $programid .= '<option value="'.$row[0].'">'.$row['0'].'</option>';
       }

     
    $query = "INSERT INTO areas (FunctionalArea,AssignedTo,Comments,ProgramName,ProgramID ) VALUES ('".$FunctionalArea."','".$AssignedTo."','".$Comments."','".$ProgramName."','".$programid."')";
  
    mysqli_query($con, $query);
   
    ?>

<form action="ViewallProgs.php" method="post" onsubmit="return validate(this)">
<p>

<input type="submit" value="View all Programs" id="button1" name="submit">
<input type="button" value="Add Program" id="button2" name="add Program" onclick="go_home()">
</h2>
</form>
<script language=Javascript>
function go_home(){
    window.location.replace("functional_area_index.php");
}
</script>

</body>
</html>

