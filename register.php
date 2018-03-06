<?php

require 'core.php';

require 'connect.php';

if(!loggedin())

{

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['firstname']) && isset($_POST['lastname']))

{

$username = $_POST['username'];

$firstname = $_POST['firstname'];

$lastname = $_POST['lastname'];

$email = $_POST['email'];

$telephone = $_POST['telephone'];

$password = $_POST['password'];

$password_again = $_POST['password_again'];

$address = $_POST['address'];

$state = $_POST['state'];

$city = $_POST['city'];

$pin = $_POST['pin'];


if(!empty($username) && !empty($password) && !empty($password_again) && !empty($firstname) && !empty($lastname) 
	&& !empty($email)&& !empty($telephone) && !empty($state) && !empty($city))

{

if($password != $password_again)

{

echo "<script type='text/javascript'>alert('Passwords do not match!');</script>";

}

else

{

$query = "SELECT username FROM users WHERE username = '$username'";

$query_run = mysqli_query($conn,$query);

$query_num_rows = mysqli_num_rows($query_run);

if($query_num_rows == 1)

{

echo "<script type='text/javascript'>alert('The Username '.$username.' already exits');</script>";

}

else

{

$query = "INSERT INTO users VALUES('','".mysqli_real_escape_string($conn,$username)."','".mysqli_real_escape_string($conn,$firstname)."
','".mysqli_real_escape_string($conn,$lastname)."','".mysqli_real_escape_string($conn,$email)."','".mysqli_real_escape_string($conn,$telephone)."'
,'".mysqli_real_escape_string($conn,$address)."','".mysqli_real_escape_string($conn,$password)."','".mysqli_real_escape_string($conn,$state)."'
,'".mysqli_real_escape_string($conn,$city)."','".mysqli_real_escape_string($conn,$pin)."')";

if($query_run = mysqli_query($conn,$query))

{

header('Location: loginform.php');

}

else

{

echo "<script type='text/javascript'>alert('Sorry! We could not register you now');</script>";

}

}

}

}

else

{

echo 'All fields are mandatory';

}

}

?>
<html>
<head>
<title>Registration Page</title>
<style>
body{
background-image: url("pro.jpg");
background-repeat: no-repeat;
background-position:center;
background-size: 1480px 1450px;
}
h5{
font-size:40px;
text-align:center;
background-color: #000000;
color:white;
margin: 2px;
padding: 20px;
}
form{
display: block;
position relative;
border: 2px solid black;
font-family:Sans-serif;
padding: 20px;
margin:0px;
text-align:center;
font-size:20px;
color:white;

}
#button{
font-size: 16px;
color: black;
border: 1px solid black;
margin: 10px;
padding: 10px;
text-align: center;
}
#button:hover {
color: black;
border: 1px solid black;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
cursor: pointer;
}
#c2{
color:white;
background
}
p{
	display:table;
}
</style>
</head>
<body>
<div id="c2">
<h5><a href="main.php" style="text-decoration:none; color:white;"> Registration Form </a></h5>
<form action = "register.php" method = "POST"
onSubmit="return ValidateContactForm()">


    <p>Username :<input type = "text" name = "username" value = "<?php echo @$username;?>"/></p>
	<p>Firstname :<input type = "text" name = "firstname" value = "<?php echo @$firstname;?>"/>
	<p>Lastname :<input type = "text" name = "lastname" value = "<?php echo @$lastname;?>" />
    <p>E-mail: &nbsp <input type="text" size="55" name="email" value = "<?php echo @$email;?>"></p>
    <p>Telephone: <input type="text" size="52" name="telephone" value = "<?php echo @$telephone;?>" ></p>
	<p>Password : <input type = "password" name = "password"  /></p>
<p>Password again : <input type = "password" name = "password_again" /></p>
 <p>Address:</p>
<p><textarea cols="58" rows="3" name="address" align="left" value = "<?php echo @$address;?>" >  </textarea></p>
<p>Select the state:</p>
<p><select name="state">
<option value="null">--Choose--</option>
<option value="maharashta">Maharashtra</option>
<option value="haryana">Haryana</option>
<option value="madhya pradesh">Madhya Pradesh</option>
<option value="andhra pradesh">Andhra Pradesh</option>
<option value="Other">Other</option>
</select></p>
<p>Select the city:</p>
<p><select name="city">
<option value="null">--Choose--</option>
<option value="Kolkata">Kolkata</option>
<option value="Mumbai">Mumbai</option>
<option value="delhi">delhi</option>
<option value="Pune">Pune</option>
<option value="Other">Other</option>
</select></p>
<p>Enter your PIN code: &nbsp <input type="text" size="10" name="pin" value = "<?php echo @$pin;?>" ></p>
<p><input type="checkbox" name="ck" value="i am not robot" checked>I am not robot</p><br>
<p><input type="submit" value="Register" name="submit" onsubmit="return ValidateContactForm() " id="button" >
 <input type="reset" value="Reset" name="reset" id="button"></p>
</form>
<script> 
function ValidateContactForm() 
{
var name = document.ContactForm.Name; 
var email = document.ContactForm.email; 
var phone = document.ContactForm.Telephone; 
var nocall = document.ContactForm.DoNotCall;
var what = document.ContactForm.Subject; 
var comment = document.ContactForm.Comment; 
if (name.value == "")
{
window.alert("Please enter your name.");
name.focus();
return false;
}
if (email.value == "")
{
window.alert("Please enter a valid e-mail address.");
email.focus();
return false;
}
if (email.value.indexOf("@", 0) < 0)
{
window.alert("Please enter a valid e-mail address.");
email.focus();
return false;
}
if (email.value.indexOf(".", 0) < 0)
{
window.alert("Please enter a valid e-mail address.");
email.focus();
return false;
}
if ((nocall.checked == false) && (phone.value == ""))
{
window.alert("Please enter your telephone number.");
phone.focus();
return false;
}
if (what.selectedIndex < 1)
{
alert("Please tell us how we can help you.");
what.focus();
return false;
}
if (comment.value == "")
{
window.alert("Please provide a detailed description or comment.");
comment.focus();
return false;
}
return true;
}
</script>
</div>
</body>
</html>

<?php

}

else if(loggedin())

{

echo '<div style="font-size:30px; text-align:center; padding:10px; border: 2px solid black; color:black;" type="submit" value="Log Out" >You\'re already registered and logged in</div>';
echo '<br/><br/><form action="main.php"><input style =" font-size:30px; text-align:center; cursor: pointer; margin-left:550px; padding:10px; border: 2px solid black; color:black;" type="submit" value="Go to Home Page" /></form>';
echo '<div style="font-size:30px; text-align:center; padding:10px; border: 2px solid black; color:black;" type="submit" value="Log Out" >Or want to</div> ';
echo ' <br /><br /><form action="logout.php"><input style =" font-size:30px; text-align:center; cursor:pointer;padding:10px; margin-left:600px; border: 2px solid black; color:black;" type="submit" value="Log Out" /></form>';


}

?>