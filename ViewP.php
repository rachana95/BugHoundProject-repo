<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>View all Programs</title>
</head>
<body>
<?php
    
    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "bughound");
    $query = "SELECT * FROM program ";
    $result = mysqli_query($con, $query);
    echo "<table border=1 ><th>Program ID</th><th>Program Name</th>\n";
    $none = 0;
    while($row=mysqli_fetch_row($result)) {
        $none=1;
        $progname ='';
        $progname = urlencode(utf8_encode($row[1]));
        //echo "<tr><td><a href=lab4.php?ID=$result[ID]>$result[name]</a></td><td>$result[name]</td></tr>";
        printf("<tr><td><a href=ViewProgs.php?ID=".$row[0]. "&ProgramName=". $progname. "&release1=".$row[2]. "&Version=".$row[3]. "\">%d</a></td><td>%s</td></tr>\n",$row[0],$row[1]);
    }
    
    ?>
</table>
<?php
    if($none==0)
    Echo "<h3>No records found.</h3>\n";
    ?>

</body>
</html>
