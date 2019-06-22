
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Update/Delete Programs</title>
</head>
<body>
<?php
$ProgID='';
    $ID=$_GET['ID'];
    $FunctionalArea = $_GET['FunctionalArea'];
    $AssignedTo = $_GET['AssignedTo'];
     $Comments = $_GET['Comments'];
     $ProgramName = $_GET['ProgramName'];
    printf("All Areas <p>");
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "BugHound");
    $query = "SELECT * FROM program";
    $result = mysqli_query($con, $query);

// Loop through the query results, outputing the options one by one
while ($row=mysqli_fetch_row($result)) {
    
 $ProgID .= '<option value="'.$row[1].'">'.$row['1'].'</option>';

}


   
    $query = "Select * from areas where AreaID = '$ID' ";
    mysqli_query($con, $query);
    ?>
<form action="UpdateArea.php" method="post" onsubmit="return validate(this)" >
<table>
<input type="hidden" name="ID" value="<?php echo $ID; ?>">
<tr><td>Functional Area:</td><td><input type="Text" name="FunctionalArea" value="<?php echo $FunctionalArea; ?>"></td></tr>
<tr><td>Assigned To:</td><td><input type="Text" name="AssignedTo" value="<?php echo $AssignedTo; ?>"></td></tr>
<tr><td>Comments:</td><td><input type="Text" name="Comments" value="<?php echo $Comments; ?>"></td></tr>
<tr><td>Program Name: </td><td><select type="Text" name="program" >
<option value=""><?php echo $ProgramName; ?></option>
    <?php echo $ProgID; ?>
    </select>
    </td></tr>
</table>
<input type="submit" name="Update" value="Update"onclick="update()">
<input type="button" name="Delete" value="Delete"onclick="delete()">
<input type="button" name="cancel" value="cancel" onclick="go_home()">
</form>
<script language=Javascript>
function go_home(){
    window.location.replace("ViewAllProgs.php");
}
function delete(){
    window.location.replace("DeleteArea.php");
}
function update(){
    window.location.replace("UpdateArea.php");
}
function validate(theform) {
    if(theform.FunctionalArea.value === ""){
        alert ("Functional Area field must contain characters");
        return false;
    }
    if(theform.AssignedTo.value === ""){
        alert ("Assigned To field must contain characters");
        return false;
    }

 
    return true;
}
</script>
</body>
</html>
