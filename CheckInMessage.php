
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
		<center><font size="5"><a href="MainPage.php"> Home</a> || Check-In <hr/>
  	<?php
			$ISBNList=$_POST['CheckIn'];
			$Loan_id=$_POST['Book_clicked'];
			echo $Loan_id;
			
			echo "</br>";
		
		for ($i=0;$i<count($ISBNList);$i++)
		{
			if(count($ISBNList)>1)
			{
			$SelectQuery="select availability from book_loans where isbn13=$ISBNList[$i] and 
			loan_id=(select max(loan_id) from book_loans where isbn13=$ISBNList[$i] group by isbn13);";
			}
			else
			{
				
				$SelectQuery="select availability from book_loans where isbn13=$ISBNList and 
			loan_id=(select max(loan_id) from book_loans where isbn13=$ISBNList group by isbn13);";
			}
			$result=mysql_query($SelectQuery);
			$result1=mysql_fetch_array($result);
			if(!$result1)
			{
				echo mysql_error();
				echo "here";
			}
			else
			{
					
					
				if($result1[0]=='NO')
				{
					if(count($ISBNList)>1)
					{
						$UpdateQuery="update book_loans set Availability='YES' ,date_in=curdate()
						where ISBN13 = $ISBNList[$i]  ;";
					}
					else
					{
						echo $Loan_id;
						$UpdateQuery="update book_loans set Availability='YES' ,date_in=curdate()
						where ISBN13 = $ISBNList ;";
						
					}
					
					$Execute=mysql_query($UpdateQuery);
					if(!$Execute)
					{
						echo mysql_error();
						echo "Here";
					}
					else
					{
					echo "<font size=\"3\">Book with ISBN $ISBNList[$i] successfully Checked In.</br></FONT> ";
					}
				}
				else
				{
					echo "<font size=\"3\">Book with ISBN $ISBNList[$i] already Checked In.</BR> </FONT>";
				}
			}
		}
			
		?>
	  
		</font> 
		
		</center>
		
	</div>
</div>
</body>
</html>
