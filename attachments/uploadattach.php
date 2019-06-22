<?php
$ID = $_POST['ID'];
$attachments = $_FILES['attachments']['tmp_name'];
$attachmentdescription = $_FILES['attachments']['name'];
$con = mysqli_connect("localhost","root");
mysqli_select_db($con, "bughound");
$query = "INSERT INTO attachment (Description ,BugID ,AttachmentFiles )
VALUES ('".$attachmentdescription."','".$ID."','".$attachments."')";
                
                
                mysqli_query($con, $query);
                ?>
