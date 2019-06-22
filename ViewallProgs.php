<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>View all Programs</title>
</head>
<body>
<?php
    
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "BugHound");
    $query = "SELECT * FROM areas ";
    $result = mysqli_query($con, $query);
    echo "<table border=2 ><th>Area ID</th><th>Functional Area</th><th>Program Name</th>\n";
    $none = 0;
    while($row=mysqli_fetch_row($result)) {
        $none=1;
        $Areaname ='';
        $pname ='';
        $pname = urlencode(utf8_encode($row[3]));
        $Areaname = urlencode(utf8_encode($row[1]));
        //echo "<tr><td><a href=lab4.php?ID=$result[ID]>$result[name]</a></td><td>$result[name]</td></tr>";
        printf("<tr><td><a href=FormA.php?ID=".$row[0].  "&FunctionalArea=".$Areaname.  "&ProgramName=".$pname. "&Comments=".$row[4]. "&AssignedTo=".$row[2]."\">%d</a></td><td>%s</td><td>%s</td></tr>\n",$row[0],$row[1],$row[3]);
    }
    
    ?>
</table>
<input type="button" name="cancel" value="cancel" onclick="go_home()">
</form>
<script language=Javascript>
function go_home(){
    window.location.replace("maintainance_list.php");
}
</script>
<?php
    if($none==0)
    Echo "<h3>No records found.</h3>\n";
    ?>

</body>
</html>

