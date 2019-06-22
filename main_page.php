<?php
include('logout.php');
session_start();
echo $_SESSION['userLevel'];
?>

<h2>Welcome to Bug Hound Tracking System!</h2><br/>
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<style>
body {
    background-color: darkgray;
    font-size:30px;
}

</style>
<body>
<div class="container-fluid">
<div class="row">
  <div class="col-md-3">
  <a href="bug_report.php">New Bug Report Entry Page</a><br/><br/>
  
    <a href="maintainance_list.php" class="disabled">DataBase Maintainance</a><br/><br/>
  
  <a href="View_Details_bugs.php">View Bugs</a><br/><br/>
  </div>
</body>
<script type="text/javascript">
if( $_SESSION['userLevel'] < 3){
  $(".disabled").attr("disabled",true);
 }
</script>