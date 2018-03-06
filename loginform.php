<?php

//Processing of form when submit button is clicked

if(isset($_POST['username']) && isset($_POST['password']))

{

$username = $_POST['username'];

$password = $_POST['password'];

if(!empty($username) && !empty($password))

{

$query = "SELECT id FROM users WHERE username = '$username' AND password = '$password';";

if($query_run = mysqli_query($conn,$query))

{

$query_num_rows = mysqli_num_rows($query_run);

if($query_num_rows == 0)

echo "<script type='text/javascript'>alert('Invalid Password or Username');</script>";

else if($query_num_rows == 1)

{

$user_id = mysqli_fetch_assoc($query_run);

$_SESSION['user_id'] = $user_id;	

header('Location: index.php');

}

}

}

else

echo "<script type='text/javascript'>alert('Please Enter the details!');</script>";

}

?>

<!--Login form with username and password-->
<html>
<head>
<title>Login</title>

<style>
#b1{
background-color:#99ff99 ;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;}

#button{
font-size: 16px;
color: white;
background-color:#4CAF50;
border: 2px solid black;
margin: 10px;
padding: 10px;
text-align: center;
}
#button:hover {
color: black;
background-color:#99ff99;
border: 1px solid black;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
cursor: pointer;
}
form{
	text-align:center;
	padding:15px;
	border: 2px dotted black;
	border-radius:30px;
	margin-left:25%;
	margin-right:25%;
	margin-top:50px;
	font-size:20px;
	
}
#div1{
	background-color:#99ff99;
	font-size:30px;
	cursor:pointer;
	text-decoration:none;
	color:white;
	text-align:center;
	padding:15px;
}
#box1{
	height:40px;
	width:200px;
}
</style>
<script>
				function validateform()
				{
				var name=document.myform.username.value;
				var password=document.myform.pwd.value;
			                if (name==null || name=="")
				{
					alert("Name can't be blank");
					return false;
				}
				else if(password.length<3)
				{
					alert("Password must be at least 3 characters long.");
					return false;
				}
				}
</script>
</head>
<div id="c3">
<form action = "index.php" method = "POST" onsubmit="return validateform();">
<div id="div1"><a href="main.php" style="text-decoration:none; color:black;">HOME</a></div><br/><br/><br/>
<h3> If existing user, Please log in: </h3><br/><br/>
USERNAME &nbsp<input type="text" name="username" id="box1"> </br><br/><br/>
PASSWORD &nbsp<input type="password" name="password" id="box1"> </br><br/><br/>
<input type="checkbox" name="forgetpassword" value="i have forgot password" >Forgot Password<br/><br/>
<div class="button">
<input type = "submit" value = "Log In" id="button">
<input type="reset" value="Reset" name="reset" id="button">
</div>
</form>
</body>
</html>



