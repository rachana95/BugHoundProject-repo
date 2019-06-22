<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CECS 544 Lab 4</title>
    </head>
    <body>
        <h1>Add new Employee</h1>
        <form action="employee.php" method="post" onsubmit="return validate(this)">
            <table>
                <tr><td>First Name:</td><td><input type="Text" name="name"></td></tr>
                <tr><td>User name:</td><td><input type="Text" name="userName"</td></tr>     
				<tr><td>password:</td><td><input type="password" name="password"</td></tr>     
				<tr><td>User level:</td><td><input type="number" name="userLevel"</td></tr>     
            </table>
            <input type="submit" name="submit" value="Submit">
			<input type="button" name="cancel" value="cancel" onclick="go_home()">
        </form>
        <script language=Javascript>
		 function go_home(){
                window.location.replace("maintainance_list.php");
            }
            function validate(theform) {
                if(theform.name.value === ""){
                    alert ("name field must contain characters");
                    return false;
                }
                if(theform.userName.value === ""){
                    alert ("User name field must contain characters");
                    return false;
                }
				 if(theform.password.value === ""){
                    alert ("Password field must contain characters");
                    return false;
                }
				 if(theform.userLevel.value === ""){
                    alert ("User level  field must contain characters");
                    return false;
                }
                return true;
            }
</script>
    </body>
</html>
