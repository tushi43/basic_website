<?php

//Connects to our database 

$mysql_host = 'localhost';

$mysql_user = 'root';

$mysql_pass = '';

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_pass);

$mysql_db = 'users';

if(!$conn || !mysqli_select_db($conn,$mysql_db))

{

die(mysqli_connect_error());	//Kill the page

}

?>