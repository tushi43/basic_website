<?php

require 'core.php';

session_destroy();
echo 'You\'ve logged out <br/> would you like to go to home page <button style="text-decoration:none ; font-size:30px; text-align:center; padding:10px; border: 2px solid black; color:black; padding:10px;">Home</button>';
header('Location: latest.php');

?>