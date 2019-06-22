<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>View-Select for Edit Employees</title>
    </head>
    <body>
        <?php
             $name = $_POST['name'];
            $con = mysqli_connect("localhost","root");
	    mysqli_select_db($con, "bughound");
	    $query = "SELECT * FROM employee where Name = '$name'";
	    $result = mysqli_query($con, $query);
            echo "<table border=1 ><th>Emp ID</th><th>Name</th>\n";
            $none = 0;
            while($row=mysqli_fetch_row($result)) {
                $none=1;
				//echo "<tr><td><a href=lab4.php?ID=$result[ID]>$result[name]</a></td><td>$result[name]</td></tr>";
                printf("<tr><td><a href=update.php?ID=".$row[0]. "&FirstName=".$row[1]. "&userName=".$row[2]. "&password=".$row[3]. "&userLevel=".$row[4]."\">%d</a></td><td>%s</td></tr>\n",$row[0],$row[1]);
            }
   
        ?>
        </table>
        <?php
            if($none==0)
		Echo "<h3>No matching records found.</h3>\n";
        ?>

    </body>
</html>
