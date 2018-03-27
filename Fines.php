<?php 
include_once("connection1.php");
?>
<html>
<head>
<meta charset="utf-8">
<title> Fines </title>
<link rel="stylesheet" type="text/css" href="Style.css">

</head>

<body>	
<div class="Container">
	<div class="Content">
		<center><h1>Book Hub Library Management System</h1></center>
	  <hr/>
		<center><font size="5"><a href="MainPage.php"> Home</a> || Check Fines<hr/>
	  <FORM method="post" action="CheckFines.php"></br>
	
	  
		  <input type="submit" id="Check Fines|Refresh" value="Check Fines|Refresh"></form>
		  
		  <FORM method="post" action="FineSearch.php"></br>
		    <input type="text" name="CardID">
			<input type="submit" id="TotalFines" value="TotalFines">
		  <br/>
		  <br/>
		</FORM>
		  
		
		
		</font> 
		</center>
		
	</div>
</div>
</body>
</html>
