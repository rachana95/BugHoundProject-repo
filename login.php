<?php  session_start(); ?> 
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
<style>
body {background-color: lightblue;}
.container-fluid{
    text-align:center;
}

</style>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1 style="text-align:center;">Bug Hound Tracking System</h1>
        <h3 style="text-align:center;">Login Page.</h3><br/>
        <form action="login_user_Validate.php" method="post" onsubmit="return validate(this)">
<div class="container-fluid">
<div class="row">
  <div class="col-md-2 col-md-offset-5">
  <label for="program">UserName:</label>
                <input class="form-control" type="Text" name="userName">  
</div> 
</div>	
<br/>
<div class="row">
<div class="col-md-2 col-md-offset-5">
  <label for="program">Password:</label>
  <input class="form-control" type="password" name="password">
</div> 
</div>

<br/>   
<button type="submit" class="btn btn-success"  >Submit</button>
</div>
			
        </form>
        <script language=Javascript>
            function validate(theform) {
        if(theform.userName.value === ""){
                    alert ("User name field must contain characters");
                    return false;
                }
				 if(theform.password.value === ""){
                    alert ("Password field must contain characters");
                    return false;
                }
            }
</script>
    </body>
</html>
