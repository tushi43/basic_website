<!DOCTYPE html>
<html lang="en-US">
<head>
<title>GiftARTicles</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="main1.css">
<script src="backtotop.js"></script>
<script src="slide.js"></script>
</head>
<body style="position:relative;min-height:100%;">
  <!--icon-->
<a href="main.php"><img src="icon1.jpg" class="icon"></img></a><br/><br/><br/><br/><br/>
  <!--dropdown start-->
  <div class="nav">
	<div class="dropdown">
		  <button class="dropbtn1">Home</button>
			  <div class="dropdown1-content">
				<a href="#">LATEST</a>
				<a href="main.php">OFFERS</a>
			  </div>
	</div>
	<div class="dropdown">
		   <button class="dropbtn1">Articles</button>
			   <div class="dropdown1-content">
				<a href="handmade.php">HANDMADE</a>
				<a href="wooden.php">WOODEN</a>
				<a href="appliance.php">APPLIANCES</a>
			  </div>
	</div>
		<div class="dropdown">
		   <a href="register.php" style="color:white; text-decoration:none;"><button class="dropbtn3">Register</button></a>
			<a href="about.php" style=" color:white; text-decoration:none;"><button class="dropbtn4" >About Us</button></a>
			</div>
		</div>
		  <!--dropdown ends-->
	</div>
	<br/><br/><br/><br/>
	<?php	
	require 'core.php';
	
	if(loggedin())
		{
		 	echo '<button class="dropbtn4" ><a href="index.php" style="text-decoration:none; float:right;color:white; padding:10px;">You\'re logged In</a></button>
<br/><br/><br/><br/>';
		}else{
	  echo '<button class="dropbtn4" ><a href="loginform.php" style="text-decoration:none; float:right;color:white; padding:10px;">Log In</a></button>
<br/><br/><br/><br/>';
		}
		?>
<div class="row">
<a href="wooden.php"><div class="simple-ss" id="simple-ss"></div>
</a></div>
<br/><br/>
  <!--main body ends-->
  <!--Footer starts-->
  <div class="footer" style="display:block; text-align:center; background-color:black; color:white;">
  <table>
  <i>GiftARTicles is a online shopping website which brings to you various types of gifts<br/>
  Come shop with us and Give Your Loved One a Cherishing Moment.
  We have lot to Offer<br/></i>
  While using this site, you agree to have read and accepted our terms of use, cookie and   <a href="#"><i>Privacy policy</i></a>.
  </table>
</div>
  <!--Footer ends-->
  <br/>
  <div class="copyright" >
  <i> © 2017 ALL RIGHTS RESERVED by Tushar Jumani & Rahul Dhameja </i>
  </div>
  <br/>
  <button class="btt" onclick="topFunction()" id="myBtn" title="Go to top" >Back To Top</button>
  </body>
</html>

