<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	 
        <h2>
            <?php
            $program ='';
            $reportType ='';
            $program ='';
            $deferred ='';
            $testedDate ='';
            $testedBy ='';
            $ResolvedDate ='';
            $resolvedBy ='';
            $resolutionVersion ='';
            $resolution ='';
            $priority ='';
            $status ='';
            $comments ='';
            $assignedTo ='';
            $functionalArea ='';
            $reportedDate ='';
            $ReportedBy ='';
            $suggestedFix ='';
            $problem ='';
            $attachmentdescription ='';
            $attachments ='';
            $program ='';
            $reproducible ='';
            $problemSummary ='';
            $Severity ='';

            if(!empty($_POST['reproducible'])) { 
                $_POST['reproducible'] = 1;
            }
            else {
                $_POST['reproducible'] =  0;
               }
               if(!empty($_POST['deferred'])) { 
                $_POST['deferred'] = 1;
            }
            else {
                $_POST['deferred'] =  0;
               }
               
                $program = $_POST['program'];
               
                $reportType = $_POST['reportType'];
                $Severity = $_POST['Severity'];
                $problemSummary = $_POST['problemSummary'];
                $reproducible =  $_POST['reproducible'];

                $attachments =  $_POST['attachments'];
                $attachmentdescription = $_POST['attachmentdescription'];
                $problem = $_POST['problem'];
                $suggestedFix = $_POST['suggestedFix'];
                
                $ReportedBy = $_POST['ReportedBy'];
                $reportedDate = date("Y-m-d H:i:s",strtotime($_POST['reportedDate']));
                $functionalArea = $_POST['functionalArea'];
                $assignedTo = $_POST['assignedTo'];
                $comments = $_POST['comments'];
                $status = $_POST['status'];
                $priority = $_POST['priority'];
                $resolution = $_POST['resolution']; 
                $resolutionVersion = '1.1';//$_POST['resolutionVersion'];
                $resolvedBy = $_POST['resolvedBy'];
                $ResolvedDate = date("Y-m-d H:i:s",strtotime($_POST['ResolvedDate']));
                $testedBy = $_POST['testedBy'];
                $testedDate = date("Y-m-d H:i:s",strtotime($_POST['testedDate']));
                $deferred = $_POST['deferred'];
                $createdDate = date("Y-m-d H:i:s");
                $EmployeeID = '1';

              
				$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
				$query = ("INSERT INTO bugs (ProgramName ,ReportType ,Severity ,SuggestedFix ,Reproducibility,HowToReproduce,
                Summary ,ReportedByEmp ,ReportedDate ,Status ,Priority ,Resolution ,ResolutionVersion ,ResolvedByEmp ,
                ResolvedByDate ,TestedByEmp ,TestedByDate ,Deffered ,CreatedDate,EmployeeID,FunctionalArea,AssignedTo)
                 VALUES ('".$program."','".$reportType."','".$Severity."','".$suggestedFix."','".$reproducible."','".$problem."',
                 '".$problemSummary."','".$ReportedBy."','".$reportedDate."','".$status."','".$priority."','".$resolution."','".$resolutionVersion."','".$resolvedBy."'
                 ,'".$ResolvedDate."','".$testedBy."','".$testedDate."','".$deferred."','".$createdDate."','".$EmployeeID."','".$functionalArea."','".$assignedTo."')");
               
                 mysqli_query($con, $query);
                 $lastId = mysqli_insert_id($con);

                 $query = "INSERT INTO attachment (Description ,BugID ,AttachmentFiles ,CreatedBy)
                 VALUES ('".$attachmentdescription."','".$lastId."','".$attachments."','".$ReportedBy."')";
                
                mysqli_query($con, $query);

            ?>

        </h2>
		
        </body>
</html>
        <script language="javascript">
        {
       window.location.replace("bug_report.php");
       alert("Submitted Successfully!");
        }
        </script>
  
