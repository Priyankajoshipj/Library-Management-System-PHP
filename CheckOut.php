
<!doctype html>

<?php 
include_once("connection1.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Check Out</title>
<link rel="stylesheet" type="text/css" href="Unnamed Site 2/Style.css">

</head>

<body>
<div class="Container">
	<div class="Contenet">
		<center><h1>Book Hub Library Management System</h1></center>
	  <hr/>
		<center><font size="5"> <a href="Unnamed Site 2/MainPage.php"> Home </a>| <a>Enter Details </a></font></center><hr/>
		<?php
		
		
	  echo "<center><FORM method=\"post\" action=\"CheckedOutMessage.php\"> ISBN <input type=\"text\" name=\"ISBN\"></br>
			Card_ID <input type=\"text\" name=\"Card_ID\"></br>
			
		  <input type=\"submit\"  value=\"Card ID\">
		  
		   
		</font>
		</FORM></center>";
		
		
		?>
	</div>
</div>
</body>
</html>
