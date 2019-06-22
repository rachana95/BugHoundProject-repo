<?php
include('logout.php'); ?>
<!DOCTYPE html>
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
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
        <title>View Bug List</title>
    </head>
    <?php
      $val = '';
      $funcAreaval = '';
      $funcArea = '';
      $reportTypeval = '';
      $empval = '';
      $empreport ='';
      $con = mysqli_connect("localhost","root");
  mysqli_select_db($con, "bughound");
  $program = "SELECT * FROM program";
  $res = mysqli_query($con, $program);
  while($row=mysqli_fetch_row($res)) {
      $val .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
  }

  $funcArea = "SELECT * FROM areas";
$funcArearesult = mysqli_query($con, $funcArea);


while ($row=mysqli_fetch_row($funcArearesult)) {
  $funcAreaval .= '<option value="'.$row[3].'">'.$row['3'].'</option>';
  $funcArea .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
}

$employeeName = "SELECT * FROM employee";
$empresult = mysqli_query($con, $employeeName);


while ($row=mysqli_fetch_row($empresult)) {
  $empval .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
 
}


$reportType = "SELECT * FROM bugs";
$funcArearesult = mysqli_query($con, $reportType);


while ($row=mysqli_fetch_row($funcArearesult)) {
  $reportTypeval .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
  $empreport .= '<option value="'.$row[8].'">'.$row['8'].'</option>';
}

?>
    <body>
    <form action="search_bug.php"  method="post">
         <div class="container-fluid">
            <div class="row">
            <div class="col-md-2">
            <label for="program">Program:</label>
    <select class="form-control" name="ProgramName" id="program">
    <option value="">Select</option>
         <?php echo $val; ?>
            </select>     
            </div>
            <div class="col-md-2">
                <label for="status">Status:</label>
                <select class="form-control" name="Status" id="status">
            <option value="">Select</option>
            <option value="Open">Open</option>
            <option value="Closed or Open">Closed or Open</option>
            <option value="Closed">Closed</option>
            <option value="Resolved">Resolved</option>
            </select>
            </div>
            <!-- <div class="col-md-2">
                <label for="assignedTo">Assigned To:</label>
                <select class="form-control" name="assignedTo" id="assignedTo">
            <option value="Select">Select</option>
            
            </select>
            </div> -->
            <div class="col-md-2">
                <label for="reportType">Report Type:</label>
                <select class="form-control" name="ReportType" id="reportType">
            <option value=""> Select</option>
            <?php echo $reportTypeval; ?>
            </select>
            </div>
            <div class="col-md-2">
            <label for="program">Severity:</label>
            <select class="form-control" name="Severity" id="severity">
    <option value="">Select</option>
    <option value="Fatal">Fatal</option>
    <option value="Serious">Serious</option>
    <option value="Minor">Minor</option>
    </select>   
            </div>
</div>
            <div class="row">
           
            <div class="col-md-2">
     <label for="functionalArea">Functional Area:</label>
    <select class="form-control" name="FunctionalArea" id="functionalArea">
    <option value="">Select</option>
    <?php echo $funcArea; ?>
    </select>
  </div>
  <div class="col-md-2">
  <label for="priority">Priority:</label>
    <select class="form-control" name="Priority" id="priority">
    <option value="">Select</option>
    <option value="Fixed Immediately">Fixed Immediately</option>
    <option value="Fix as soon as possible">Fix as soon as possible</option>
    <option value="Fix before next milestone">Fix before next milestone</option>
    <option value="Fix before release">Fix before release</option>
    <option value="Fix if possible">Fix if possible</option>
    <option value="Optional">Optional</option>
    </select> 
  </div>
  <div class="col-md-2">
  <label for="resolution">Resolution:</label>
    <select class="form-control" name="Resolution" id="resolution">
    <option value="">Select</option>
    <option value="Pending">Pending</option>
    <option value="Fixed">Fixed</option>
    <option value="Irreproducible">Irreproducible</option>
    <option value="Deferred">Deferred</option>
    <option value="As designed">As designed</option>
    <option value="Withdrawn by reporter">Withdrawn by reporter</option>
    <option value="Need more info">Need more info</option>
    <option value="Disagree with suggestion">Disagree with suggestion</option>
    <option value="Duplicate">Duplicate</option>
    </select> 
  </div>
  <div class="col-md-2">
  <label for="reportedBy">Reported By:</label>
    <select class="form-control" name="ReportedByEmp"  id="reportedBy">
    <option value="">Select</option>
    <?php echo $empreport; ?>
    </select> 
  </div>
  <div class="col-md-2">
     <label for="Date">Reported Date:</label>
    <input class="form-control" type="text" name="ReportedDate"  id="reportedDate">
  </div>
</div>
  <div class="row">

  
  <div class="col-md-2">
     <label for="resolvedBy">Resolved By:</label>
    <select class="form-control" name="ResolvedBy" id="resolvedBy">
    <option value="">Select</option>
    <?php echo $empval; ?>
    </select>
  </div>
            </div>

            <br/><br/>
        <button type="submit" class="btn btn-success">Search</button>  
        <button type="reset" class="btn btn-primary" >Reset</button>
        <button type="button" class="btn btn-danger" onclick="go_home()">Cancel</button>
        
</div>
        <br/>
        <?php
          
        $con = mysqli_connect("localhost","root");
        mysqli_select_db($con, "bughound");
	    $query = "SELECT * FROM bugs where Status!='Closed'";
        $result = mysqli_query($con, $query);
        
      
            echo "<table width=1000 height=300 border=1 ><th>BugID</th><th>Report Type</th><th>Program Name</th>
            <th>Reported By Emp</th><th>View Details</th>\n";
           
            while($row=mysqli_fetch_row($result)) {
               
                printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td><a href=\"View_Details_OnClick.php?id=" . $row[0] . "\">View Details</a></td></tr>\n",$row[0],$row[1],$row[2],$row[8]);
            }

           
        ?>
        </table>
      
        
        <script language=Javascript>
            var optionValues =[];
            $('#reportType option').each(function(){
            if($.inArray(this.value, optionValues) >-1){
                $(this).remove()
            }else{
                optionValues.push(this.value);
            }
            });

            $(function () {
               
                $('#reportedDate').datepicker();
                
            });

            $('#reportedBy option').each(function(){
            if($.inArray(this.value, optionValues) >0){
                $(this).remove()
            }else{
                optionValues.push(this.value);
            }
            });

            $(function () {
               
                $('#reportedDate').datepicker();
                
            });

            

            function go_home() {
                window.location.replace("main_page.php");
            }

</script>    
    </body>
</html>
