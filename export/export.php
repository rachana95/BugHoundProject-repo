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
<h2>Export Tables</h2><br/>
<style>
body {background-color: darkgray;}

</style>
<body>
<form  action="exportto.php" method="post" onsubmit="return validate(this)">
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-3">
  <label for="Table">Table:</label>
    <select class="form-control" name="Table" id="Table">
    <option value="">Select</option>
    <option value="employee">employee</option>
    <option value="areas">areas</option>
    <option value="program">program</option>
    </select> 
  </div>
  <div class="col-md-3">
  <label for="exportType">Export Type:</label>
    <select class="form-control" name="exportType" id="exportType">
    <option value="">Select</option>
    <option value="XML">XML</option>
    <option value="ASCII">ASCII</option>
    </select> 
  </div>

<button type="submit" class="btn btn-success"  style="margin-left:10px;">Submit</button>
<button type="button" class="btn btn-danger" onclick="go_home()">Cancel</button>
</form>
</body>
<script type="text/javascript">
function validate(theform) {
             
             
             if(theform.Table.value === "") {
              
               alert ("table has to be selected");
               return false;
             }
             if(theform.exportType.value === "" ) {
                alert ("export Type has to be selected");
               return false;
             }
             return true;
}

function go_home(){
              window.location.replace("main_page.php");
               
            }
        </script>