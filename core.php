<?php

ob_start();

error_reporting(0);

session_start();

$http_referer = @$_SERVER['HTTP_REFERER'];

function loggedin()

{

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))

return true;

return false;

}

function getuserfield($field)

{

global $conn;

$row = $_SESSION['user_id'];

$id = $row['id'];

$query = "SELECT $field FROM users WHERE id = $id";

if($query_run = mysqli_query($conn,$query))

{

if($row = mysqli_fetch_assoc($query_run))

{

$count = $row[$field];

return $count;

}

}

}

?>