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
  $val = '';
  $empval = '';
  $funcAreaval = '';
  $empreport = '';
  $programName ='';

  $con = mysqli_connect("localhost","root");
  mysqli_select_db($con, "bughound");
  $query = "SELECT * FROM program";
  $result = mysqli_query($con, $query);

// Loop through the query results, outputing the options one by one
while ($row=mysqli_fetch_row($result)) {
   $val .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
}

$employeeName = "SELECT * FROM employee";
$empresult = mysqli_query($con, $employeeName);


while ($row=mysqli_fetch_row($empresult)) {
  $empval .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
 
}

$funcArea = "SELECT * FROM areas";

$funcArearesult = mysqli_query($con, $funcArea);


while ($row=mysqli_fetch_row($funcArearesult)) {
  $funcAreaval .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
}

?>
<body>
<form  action="newbug_OnSubmit.php" method="post" onsubmit="return validate(this)">
  <div class="container-fluid">
<div class="row">
  <div class="col-md-3">
     <label for="program">Program:</label>
    <select class="form-control" name="program" id="program">
    <option value="">Select</option>
    <?php echo $val; ?>
</select>
<?php if(isset($_GET['program'])){
       $programName = $_GET['program'];
     }
     ?>
  </div>
  <div class="col-md-3">
  <label for="reportType">Report Type:</label>
    <select class="form-control" name="reportType" id="reportType">
    <option value="Select">Select</option>
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
    <textarea class="form-control" type="text" name="problemSummary"  id="problemSummary"></textarea>
  </div>
  <div class="col-md-4">
  <label for="reproducible">Reproducible?</label>
    <input  type="checkbox" name="reproducible" id="reproducible">
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-2">
     <label for="problem">Attachments(If any):</label>
    <input  type="file" name="attachments" id="attachments">
  
  </div>
  <div class="col-md-6">
     <label for="problem">Attachment Description:</label>
    <textarea class="form-control" name="attachmentdescription" id="attachmentdescription"></textarea>
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-8">
     <label for="problem">Problem:</label>
    <textarea class="form-control" name="problem" id="problem"></textarea>
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-8">
     <label for="suggestedFix">Suggested Fix:</label>
    <textarea class="form-control"  name="suggestedFix"  id="suggestedFix"></textarea>
  </div>
</div>
<br/>
<div class="row">
<div class="col-md-3">
  <label for="reportedBy">Reported By:</label>
    <select class="form-control" name="ReportedBy"  id="reportedBy">
    <option value="">Select</option>
    <?php echo $empval; ?>
    </select> 
  </div>
  <div class="col-md-3">
     <label for="Date">Reported Date:</label>
    <input class="form-control" type="text" name="reportedDate"  id="reportedDate">
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-3">
     <label for="functionalArea">Functional Area:</label>
    <select class="form-control" name="functionalArea" id="functionalArea">
    <option value="">Select</option>
    <?php echo $funcAreaval; ?>
    </select>
  </div>
  <div class="col-md-3">
  <label for="assignedTo">Assigned To:</label>
    <select class="form-control" name="assignedTo" id="assignedTo">
    <option value="">Select</option>
    <?php echo $empval; ?>
    </select> 
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-8">
     <label for="comments">Comments:</label>
    <textarea class="form-control" name="comments"  id="comments"></textarea>
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-2">
     <label for="status">Status:</label>
    <select class="form-control" name="status" id="status">
    <option value="Select">Select</option>
    <option value="Open">Open</option>
    <option value="Closed or Open">Closed or Open</option>
    <option value="Closed">Closed</option>
    <option value="Resolved">Resolved</option>
    </select>
  </div>
  <div class="col-md-2">
  <label for="priority">Priority:</label>
    <select class="form-control" name="priority" id="priority">
    <option value="Select">Select</option>
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
    <option value="Select">Select</option>
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
    <select class="form-control" name="resolutionVersion" id="resolutionVersion">
    </select> 
  </div>
</div>
<br/>
<div class="row">
  <div class="col-md-2">
     <label for="resolvedBy">Resolved By:</label>
    <select class="form-control" name="resolvedBy" id="resolvedBy">
    <option value="">Select</option>
    <?php echo $empval; ?>
    </select>
  </div>
  <div class="col-md-2">
  <label for="ResolvedDate">Resolved Date:</label>
    <input class="form-control" type="text" name="ResolvedDate" id="ResolvedDate">
</div>
  <div class="col-md-2">
  <label for="testedBy">Tested By:</label>
    <select class="form-control" name="testedBy" id="testedBy">
    <option value="">Select</option>
    <?php echo $empval; ?>
    </select> 
  </div>
  <div class="col-md-2">
  <label for="testedDate">Tested Date:</label>
    <input class="form-control" name="testedDate" id="testedDate"> 
  </div>
  <div class="col-md-1">
  <label for="deferred">Treat as deferred?</label>
    <input type="checkbox" name="deferred" id="deferred">
    </div>
  </div>
</div>
</div>
<br/>
<button type="submit" class="btn btn-success"  style="margin-left:10px;">Submit</button>
<button type="reset" class="btn btn-primary" >Reset</button>
<button type="button" class="btn btn-danger" onclick="go_home()">Cancel</button>
</form>
</body>
<script type="text/javascript">

  //   
  // $Areaval = '';

  //   $con = mysqli_connect("localhost","root");
  // mysqli_select_db($con, "bughound");
  
  // $query = "SELECT * FROM areas where ProgramName='$value'";
 
  // $result = mysqli_query($con, $query);
  // while ($row=mysqli_fetch_row($funcArearesult)) {
  //   $Areaval .= '<option value="'.$row[1].'">'.$row['1'].'</option>';
  // }
  // 


            $(function () {
                $('#ResolvedDate').datepicker();
                $('#testedDate').datepicker();
                $('#reportedDate').datepicker();
                
            });
           
            function validate(theform) {
             
              if(theform.problemSummary.value != "" && theform.problem.value === "") {
                alert ("problem cant be empty");
                return false;
              }
              if(theform.problem.value != "" && theform.problemSummary.value === "") {
               
                alert ("problem summary cant be empty");
                return false;
              }
              if(theform.problemSummary.value === " ") {
               
                alert ("No blank space for Summary  is accepted");
                return false;
              }
              if(theform.problem.value === " " ) {
                alert ("No blank space for Problem is accepted");
                return false;
              }
                if(theform.program.value === "" || theform.reportType.value === "" || theform.severity.value === ""
                || theform.problemSummary.value === "" || theform.problem.value === ""  ||theform.functionalArea.value === ""   ){
                    alert ("Field cant be empty");
                    return false;
                }
                return true;
            }
            function go_home(){
              window.location.replace("main_page.php");
               
            }
        </script>