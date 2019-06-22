<?php
include('logout.php'); ?>
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
<h2>New Bug Report Entry Page</h2><br/>
<style>
body {background-color: darkgray;}

</style>
<?php
     $ID = $_GET['id'];

  $val = '';
  $val1 = '';
  $funcAreaval1 ='';
  $areaval = '';
  $funcAreaval = '';
  $assignedTo = '';
  $repType = '';
  $severity = '';
  $summary = '';
  $reproducible ='';
  $suggestedfix ='';
  $howtoReproduce = '';
  $reportedbyemp ='';
  $reportedDate = '';
  $status ='';
  $priority = '';
  $resolution ='';
  $resolutionVersion = '';
  $resolvedbyEmp ='';
  $resolvedDate ='';
  $TestedbyEmp ='';
  $TestedDate ='';
  $deferred = '';
  $comments = '';
  $attachdescription = '';
  $attachfiles = '';
  $assignedToEmp ='';
  $attachedval ='';
  $pathval ='';

  $con = mysqli_connect("localhost","root");
  mysqli_select_db($con, "bughound");
  $query = "SELECT * FROM bugs where BugID ='$ID'";
  $result = mysqli_query($con, $query);

// Loop through the query results, outputing the options one by one
while ($row=mysqli_fetch_row($result)) {
    $repType .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
    $val .= '<option value="'.$row[2].'">'.$row['2'].'</option>';
    $severity .= '<option value="'.$row[3].'">'.$row['3'].'</option>';
    $suggestedfix .= $row[4];
    $reproducible .= $row[5];
    $howtoReproduce .= $row[6];
    $summary .= $row[7];
    $reportedbyemp .= '<option value="'.$row[8].'">'.$row['8'].'</option>';
    $reportedDate .= $row[9]; 
    $funcAreaval .= '<option value="'.$row[21].'">'.$row['21'].'</option>';
  $assignedTo .= '<option value="'.$row[22].'">'.$row['22'].'</option>';

    //do from here
    $status .= '<option value="'.$row[10].'">'.$row['10'].'</option>';
    $priority .= '<option value="'.$row[11].'">'.$row['11'].'</option>';
    $resolution .= '<option value="'.$row[12].'">'.$row['12'].'</option>';
    $resolutionVersion .= $row['13'];
    $resolvedbyEmp .= '<option value="'.$row[14].'">'.$row['14'].'</option>';
    $resolvedDate .= $row[15]; 
    $TestedbyEmp .= '<option value="'.$row[16].'">'.$row['16'].'</option>';   
    $TestedDate .= $row[17]; 
    $deferred .= $row[18];
}


$employeeName = "SELECT * FROM employee ";
$arearesult = mysqli_query($con, $employeeName);


while ($row=mysqli_fetch_row($arearesult)) {
 // $funcAreaval .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
 $assignedToEmp .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
 // $comments .= $row[5];
}

$attachmentval = "SELECT * FROM attachment where BugID ='$ID'";
$attachmentresult = mysqli_query($con, $attachmentval);

$attachedval .= 'attachments/';

while ($row=mysqli_fetch_row($attachmentresult)) {
  
  $pathval .= $attachedval.$row[3]; 

  $attachdescription .= $row[1];  
  $attachfiles .=   '<a href="'.$pathval.'" target="_blank">'.$row['3'].'</a>';
  $pathval='';
  //$path = "/attachment/"; 
}

// $attachedval .= 'attachments/';
// $pathval .= $attachedval.$attachfiles; 

$query1 = "SELECT * FROM program";
$result = mysqli_query($con, $query1);

// Loop through the query results, outputing the options one by one
while ($row=mysqli_fetch_row($result)) {
 $val1 .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
}
$funcArea = "SELECT * FROM areas";

$funcArearesult = mysqli_query($con, $funcArea);


while ($row=mysqli_fetch_row($funcArearesult)) {
  $funcAreaval1 .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
}


?>
<body>
<form action="Update_bugreport_OnClick.php"  method="post" enctype="multipart/form-data">
<input type="hidden" name="ID" value="<?php echo $ID; ?>">
  <div class="container-fluid">
<div class="row">
  <div class="col-md-3">
     <label for="program">Program:</label>
    <select class="form-control" name="program" id="program" >
    <?php echo $val; ?>
    <?php echo $val1; ?>
</select>
     
  </div>
  <div class="col-md-3">
  <label for="reportType">Report Type:</label>
    <select class="form-control" name="reportType" id="reportType">
    <?php echo $repType; ?>
    <option value="Coding Error">Coding Error</option>
    <option value="Design Issues">Design Issues</option>
    <option value="Suggestion">Suggestion</option>
    <option value="Documentation">Documentation</option>
    <option value="Hardware">Hardware</option>
    <option value="Query">Query</option>
    </select> 
  </div>
  <div class="col-md-3">
  <label for="severity">Severity:</label>
    <select class="form-control" name="Severity" id="severity">
    <?php echo $severity; ?>
    <option value="Select">Select</option>
    <option value="Fatal">Fatal</option>
    <option value="Serious">Serious</option>
    <option value="Minor">Minor</option>
    </select> 
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-8">
     <label for="problemSummary">Problem Summary:</label>
    <textarea class="form-control" type="text" name="problemSummary"    id="problemSummary"><?php echo $summary; ?></textarea>
  </div>
  <div class="col-md-4">
  <label for="reproducible">Reproducible?</label>
    <input  type="checkbox" name="reproducible" id="reproducible" value="<?php echo $reproducible; ?>">
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-2">
  
     <label for="problem">Attachments(If any):</label>
    
    <input  type="file" name="attachments" id="attachments"> <?php echo $attachfiles;?>>
  </div>  
  <div class="col-md-6">
     <label for="problem">Attachment Description:</label>
    <textarea class="form-control" name="attachmentdescription" id="attachmentdescription"><?php echo $attachdescription; ?></textarea>
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-8">
     <label for="problem">Problem:</label>
    <textarea  class="form-control" name="problem" id="problem"> <?php echo $howtoReproduce; ?> </textarea>
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-8">
     <label for="suggestedFix">Suggested Fix:</label>
    <textarea class="form-control"  name="suggestedFix"  id="suggestedFix"><?php echo $suggestedfix; ?></textarea>
  </div>
</div>
<br/>
<div class="row">
<div class="col-md-3">
  <label for="reportedBy">Reported By:</label>
    <select class="form-control" name="ReportedBy"  id="reportedBy" readonly>
    <?php echo $reportedbyemp; ?>
    </select> 
  </div>
  <div class="col-md-3">
     <label for="Date">Reported Date:</label>
    <input class="form-control" type="text"  name="reportedDate"  value="<?php echo $reportedDate; ?>"  id="reportedDate" >
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-3">
     <label for="functionalArea">Functional Area:</label>
    <select class="form-control" name="functionalArea" id="functionalArea">
    <?php echo $funcAreaval; ?>
    <?php echo $funcAreaval1; ?>
    </select>
  </div>
  <div class="col-md-3">
  <label for="assignedTo">Assigned To:</label>
    <select class="form-control" name="assignedTo" id="assignedTo">
    <?php echo $assignedTo; ?>
    <?php echo $assignedToEmp; ?>
    
    </select> 
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-8">
     <label for="comments">Comments:</label>
    <textarea class="form-control" name="comments"  id="comments"> <?php echo $comments; ?> </textarea>
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-2">
     <label for="status">Status:</label>
    <select class="form-control" name="status" id="status">
    <?php echo $status; ?>
    <option value="Open">Open</option>
    <option value="Closed or Open">Closed or Open</option>
    <option value="Closed">Closed</option>
    <option value="Resolved">Resolved</option>
    </select>
  </div>
  <div class="col-md-2">
  <label for="priority">Priority:</label>
    <select class="form-control" name="priority" id="priority">
    <?php echo $priority; ?>
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
  <select class="form-control" name="resolution" id="resolution">
  <?php echo $resolution; ?>
    
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
  <label for="resolutionVersion">Resolution Version:</label>
  <input class="form-control" type="text" name="resolutionversion" id="resolutionversion"  value="<?php echo $resolutionVersion; ?>">
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-2">
     <label for="resolvedBy">Resolved By:</label>
    <select class="form-control" name="resolvedBy" id="resolvedBy">
    <?php echo $resolvedbyEmp; ?>
    <?php echo $assignedToEmp; ?>
    
    </select>
  </div>
  <div class="col-md-2">
  <label for="ResolvedDate">Resolved Date:</label>
    <input class="form-control" type="text" name="ResolvedDate" value="<?php echo $resolvedDate; ?>" id="ResolvedDate" readonly>
</div>
  <div class="col-md-2">
  <label for="testedBy">Tested By:</label>
    <select class="form-control" name="testedBy" id="testedBy">
    <?php echo $resolvedbyEmp; ?>
    <?php echo $assignedToEmp; ?>
    </select> 
  </div>
  <div class="col-md-2">
  <label for="testedDate">Tested Date:</label>
    <input class="form-control" name="testedDate" id="testedDate" value="<?php echo $TestedDate; ?>"> 
  </div>
  <div class="col-md-1">
  <label for="deferred">Treat as deferred?</label>
    <input type="checkbox" name="deferred" id="deferred" value="<?php echo $deferred; ?>">
    </div>
  </div>
</div>
</div>
<br/>
<button type="submit" class="btn btn-success" onsubmit="return validate(this)" style="margin-left:10px;">Update</button>
<button type="button" class="btn btn-danger" onclick="go_home()">Cancel</button>
</form>
</body>
<script type="text/javascript">
            $(function () {
                $('#ResolvedDate').datepicker();
                $('#testedDate').datepicker();
                $('#reportedDate').datepicker();
                
            });
            function go_home() {
                window.location.replace("View_Details_bugs.php");
            }
            
        </script>