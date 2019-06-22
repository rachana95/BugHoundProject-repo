<!DOCTYPE html>
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View-Select for Edit Employees</title>
    </head>
    <body>
        <?php
           /*  $program='';
            $status='';
            $assignedTo='';
            $reportType='';
            $severity='';
            $funcArea='';
            $Priority='';
            $resolution='';
            $reportedBy='';
            $reportedDate='';
            $resolvedBy='';

            
             $program = $_POST['program'];
             if($program=="Select"){
                 $program='';
             }
             $status = $_POST['status'];
             if($status=="Select"){
                $status='';
            }
            // $assignedTo = $_POST['assignedTo'];
             $reportType = $_POST['reportType'];
             if($reportType=="Select"){
                $reportType='';
            }
             $severity =  $_POST['Severity'];
             if($severity=="Select"){
                $severity='';
            }
             $funcArea =  $_POST['functionalArea'];
             if($funcArea=='Select'){
                $funcArea='';
            }
             $Priority =  $_POST['priority'];
             if($Priority=='Select'){
                $Priority='';
            }
             $resolution =  $_POST['resolution'];
             if($resolution=='Select'){
                $resolution='';
            }
             $reportedBy =  $_POST['ReportedByEmp'];
             if($reportedBy=='Select'){
                $reportedBy='';
            }
             $reportedDate =  $_POST['reportedDate'];
             $resolvedBy =  $_POST['resolvedBy'];
             if($resolvedBy=='Select'){
                $resolvedBy='';
            } */
            $con = mysqli_connect("localhost","root");
	    mysqli_select_db($con, "bughound");
        //$query = "SELECT * FROM bugs"; 
        /*where  (ProgramName = '%$program%') or (Status = '%$status%') or (ReportType == '%$reportType%')
        or (Severity == '%$severity%' ) or (Priority  == '%$Priority%') or (Resolution  == '%$resolution%')
        or (ReportedByEmp == '%$reportedBy%') or (ReportedDate == '%$reportedDate%') or (ResolvedByEmp == '%$resolvedBy%')"; 
    
    */
    $query = "SELECT * FROM bugs where Status!='Closed'";

$filtered_get = array_filter($_POST); // removes empty values from $_GET

if (count($filtered_get)) { // not empty
    $query .= " WHERE";

    $keynames = array_keys($filtered_get); // make array of key names from $filtered_get
    $count=count($filtered_get);
    foreach($filtered_get as $key => $value)
    {
        if($value!="" || $value!="Select")
        {
       $query .= " $key = '$value'";  // $filtered_get keyname = $filtered_get['keyname'] value
       if (count($filtered_get) > 1 && $count>1) { // more than one search filter, and not the last 
        $query .= " AND";
       

        echo $count ;
        echo $key;
        $count--;
       }
    }
    }
   echo $query;
}
$query .= ";";
    
   
	    $result = mysqli_query($con, $query);
        echo "<table width=1000 height=300 border=1 ><th>BugID</th><th>Report Type</th><th>Program Name</th>
        <th>Reported By Emp</th><th>View Details</th>\n";
       
        while($row=mysqli_fetch_row($result)) {
           
            printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td><a href=\"View_Details_OnClick.php?id=" . $row[0] . "\">View Details</a></td></tr>\n",$row[0],$row[1],$row[2],$row[8],$row[10],$row[15]);
        }

   
        ?>
        </table><br>
        <button type="button" class="btn btn-danger" onclick="go_home()">Cancel</button>

    </body>
</html>
<script type="text/javascript">
   function go_home(){
              window.location.replace("View_Details_bugs.php");   
            }
</script>
