<!DOCTYPE html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<html>
<head>
<meta charset="UTF-8">
<title>Functional Area index</title>
</head>
<body>
<h1>Add new Functional Area</h1>

<?php 
$val='';
$ProgID ='';

$con = mysqli_connect("localhost","root");
mysqli_select_db($con, "bughound");
$query = "SELECT * FROM program";
$result = mysqli_query($con, $query);

// Loop through the query results, outputing the options one by one
while ($row=mysqli_fetch_row($result)) {
    
 $val .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
$ProgID .= $row[0];
}


?>

<form action="Area.php" method="post" onsubmit="return validate(this)">

<input type ="hidden" name="ProgID" value="<?php echo $ProgID; ?>" > 
<table>
 
<tr><td>Functional Area:</td><td><input type="Text" name="FunctionalArea"></td></tr>
<tr><td>Assigned To:</td><td><input type="Text" name="AssignedTo"></td></tr>
<tr><td>Comments:</td><td><input type="Text" name="Comments" ></td></tr>
<tr><td>Program:</td><td>
<select type="Text" name="program">
<option value="">Select</option>
    <?php echo $val; ?>
    </select>
</td></tr>
</table>
<input type="submit" name="submit" value="Submit">
<input type="button" name="cancel" value="cancel" onclick="go_home()">

</form>
<script language=Javascript>
function go_home(){
    window.location.replace("maintainance_list.php");
}
function validate(theform) {
    if(theform.FunctionalArea.value === ""){
        alert ("Functional Area field must contain characters");
        return false;
    }
    // if(theform.AssignedTo.value === ""){
    //     alert ("Assigned To field must contain characters");
    //     return false;
    // }
    // if(theform.Comments.value === ""){
    //     alert ("comments field must contain characters");
    //     return false;
    // }
    if(theform.program.value === ""){
        alert ("program field must contain characters");
        return false;
    }
    return true;
}
</script>
</body>
</html>

