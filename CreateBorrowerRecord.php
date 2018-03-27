
<!doctype html>

<?php 
include_once("C:/xampp/htdocs/Unnamed Site 2/Connections/connection1.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Create Borrower</title>
<link rel="stylesheet" type="text/css" href="Unnamed Site 2/Style.css">

</head>

<body>
<div class="Container">
	<div class="Contenet">
		<center><h1>Book Hub Library Management System</h1></center>
	  <hr/>
		<center><font size="5"> <a href="MainPage.php"> Home </a>| <a>Create Borrower </a></font></center><hr/>
		<?php
		
		$FirstName=$_POST['FirstName'];
		$LastName=$_POST['LastName'];
		$Email=$_POST['Email'];
		$Bname=$FirstName.' '.$LastName;
		$Address=$_POST['Address'];
		$Phone=$_POST['Phone'];
		if (strlen($Phone)!=10 ) 
			{ 
				echo "<center>Incorrect Entries :Phone Number should be a 10 digit integer!</center>";
		}
		else{
		$query= "Insert into borrowers(BName,email,Address,Phone) values('$Bname','$Email','$Address',$Phone);";
		$result=mysql_query($query);
		if(!$result)
					echo mysql_error();
		else
		{
			echo "<center>Record for New Borrower Created!!</center>";
		}
		}
		?>
	</div>
</div>
</body>
</html>
