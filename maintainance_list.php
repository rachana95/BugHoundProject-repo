<?php
include('logout.php');
session_start();
$sess = $_SESSION['userLevel'];
?>
<h2>Welcome to Bug Hound Tracking System!</h2><br/>
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<!-- <div class="container-fluid">
  <div class="col-md-offset-5">
<button type="submit" class="btn btn-success" onclick="home()">Log Out</button>
</div>
</div> -->

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
  <a href="lab4.php">Add New Employee</a><br/><br/>
  
    <a href="indexP.php">Add New Program</a><br/><br/>
  
  <a href="functional_area_index.php">Add New Area</a><br/><br/>
  <a href="main_page.php">Return to main Page</a><br/><br/>
  <a href="export.php">Export table data</a><br/><br/>
  </div>
  </div>
  </div>
 
  </body>



