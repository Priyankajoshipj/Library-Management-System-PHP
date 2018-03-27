<?php 
include_once("connection1.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Book Hub </title>
<link rel="stylesheet" type="text/css" href="Style.css">

</head>

<body>	
<div class="Container">
	<div class="Content">
		<center><h1>Book Hub Library Management System</h1></center>
	  <hr/>
		<center><font size="5"><a href="MainPage.php"> Home</a> || Enter Book's or Borrower's Details to Check-In
	  <FORM method="post" action="CheckIn.php">
	  
		  <input type="text" name="SearchText">
		  <input type="submit" id="Search" value="Search">
		</font> 
		</FORM>
		</center><<hr/>
		
	</div>
</div>
</body>
</html>
