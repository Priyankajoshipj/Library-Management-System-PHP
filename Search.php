<?php 
include_once("connection1.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Book Hub Main Page</title>
<link rel="stylesheet" type="text/css" href="Style.css">

</head>

<body>	
<div class="Container">
	<div class="Contenet">
		<center><h1>Book Hub Library Management System</h1></center>
	  <hr/>
		<center><font size="5"><a href="MainPage.php"> Home</a> || Search 
	  <FORM method="post" action="SearchResult.php">
	  
		  <input type="text" name="SearchText">
		  <input type="submit" id="Search" value="Search">
		</font> 
		</FORM>
		</center><<hr/>
		
	</div>
</div>
</body>
</html>
