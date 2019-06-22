<?php
session_start();

// $file=basename($_SESSION['file']);
// header("Content-Length: " . filesize($file));
// header('Cache-Control: public');
// header('Content-Description: File Transfer');
// header('Content-Type: text/plain');
// header('Content-Disposition: attachment; filename="' .$file.'"');
// header("Content-Transfer-Encoding:binary");
// readfile('/Users/pradyumna/Documents/'.$file);
// exit();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	 
        <h2>
            <?php
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
                $ID = $_POST['ID'];
                $program = $_POST['program'];
                $reportType = $_POST['reportType'];
                $Severity = $_POST['Severity'];
                $problemSummary = $_POST['problemSummary'];
                $reproducible =  $_POST['reproducible'];

               // $attachments = ($_FILES['attachments']['name']);
                //$_POST['attachments'];
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
                $resolutionVersion = $_POST['resolutionversion'];
                $resolvedBy = $_POST['resolvedBy'];
                $ResolvedDate = date("Y-m-d H:i:s",strtotime($_POST['ResolvedDate']));
                $testedBy = $_POST['testedBy'];
                $testedDate = date("Y-m-d H:i:s",strtotime($_POST['testedDate']));
                $deferred = $_POST['deferred'];
                $createdDate = date("Y-m-d H:i:s");
                $EmployeeID = '1';

				$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
				$query = "UPDATE  bugs SET  ProgramName='$program' ,ReportType='$reportType' ,Severity='$Severity' ,
                SuggestedFix='$suggestedFix' ,Reproducibility='$reproducible',HowToReproduce='$problem',
                Summary='$problemSummary' ,ReportedByEmp='$ReportedBy' ,ReportedDate='$reportedDate' ,
                Status='$status' ,Priority='$priority' ,Resolution='$resolution' ,ResolutionVersion='$resolutionVersion' 
                ,ResolvedByEmp='$resolvedBy' ,ResolvedByDate='$ResolvedDate' ,TestedByEmp='$testedBy' ,
                TestedByDate='$testedDate' ,Deffered='$deferred' ,CreatedDate='$createdDate',FunctionalArea='$functionalArea',AssignedTo='$assignedTo'  where BugID = '$ID'";
                 echo $query;
                 mysqli_query($con, $query);
                //  $lastId = mysqli_insert_id($con);
              // echo $_POST['attachments'];
              
                    $name= $_FILES['attachments']['name'];
                    $tmp_name= $_FILES['attachments']['tmp_name'];
                    //$submitbutton= $_POST['attachments'];
                    $position= strpos($name, "."); 
                    $fileextension= substr($name, $position + 1);
                    $fileextension= strtolower($fileextension);
                    if (isset($name)) 
                    {
                        
                        $path= 'C:xampp/htdocs/BugHoundProject/attachments/';
                        if (!empty($name))
                        {
                            if (move_uploaded_file($tmp_name, $path.$name)) 
                            {
                                //echo 'copy to directory';
                            }
                        }
                    }
                   
                        echo $name;
                        echo $path.$name;
                      $query=  "INSERT INTO attachment (Description ,BugID ,AttachmentFiles ,CreatedBy)
                 VALUES ('".$attachmentdescription."','".$ID."','".$name."','".$ReportedBy."')";
                        //$sql="INSERT INTO bugs (attachment) VALUES ('$name') where bug_id = '$var'";
                //         $query = "UPDATE attachment SET Description='$attachmentdescription' ,BugID='$ID' ,
                //  AttachmentFiles='$name'  where BugID = '$ID'";
                        
                        // if (mysqli_query($con, $sql)) {
                        //   // echo 'insertion ';
                        //   $URL="searchb.php";
                        // echo "<script>location.href='$URL'</script>";
                        // }
                    
               


                
                echo $query;
                
                mysqli_query($con, $query);

            ?>

        </h2>
        <script language="javascript">
       
                window.location.replace("View_Details_bugs.php");
            
        </script>
        
    </body>
</html>
