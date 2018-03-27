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
	 	
		  <?php
			$LoanID=$_POST['Book_clicked'];
			$SelectQuery="Select Availability from book_loans where loan_id = $LoanID;";
			
			$result=mysql_query($SelectQuery);
			$result1=mysql_fetch_array($result);
			if(!$result)
				echo mysql_error();
			else
			{
			If($result1[0]=='NO')
			{
				echo "Book is not Checked In yet! Can not Accept Fine</br>";
			}
			else
			{
					$Sql="update Fines set paid = 1 where loan_id=$LoanID;";
					
				
				$result = mysql_query($Sql);
				if(!$result)
					echo mysql_error();
				else
				{
					
					
					echo "<font size=\"3\">			
							 <li> LoanID :$LoanID</li>
									
									Amount paid successfully!!
									</font>";
					
				}
			}
			}			
		  ?>
		  
		</font> 
		</FORM>
		</center>
		
	</div>
</div>
</body>
</html>
