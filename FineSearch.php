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
	 
	
	  
		  
		  <br/>
		  <br/>
		  <?php
			$CardId=$_POST['CardID'];
		  	$Sql="Select Sum(f.fine_amt) from Fines F ,book_loans b where b.loan_id=f.loan_id group by card_id having card_id=$CardId;"; 
				$result = mysql_query($Sql);
				if(!$result)
					echo mysql_error();
				else
				{
					
					while($row=mysql_fetch_array($result))
					{
						if ($row[2]==0)
						{
							$Paid='NO';
							echo "<font size=\"3\"><FORM method=\"post\" action=\"PayFines.php\">
								PAST Payments</br>
							 <li> LoanID :$row[0] <input type=\"hidden\" name=\"Book_clicked\" value=$row[0]><input type=\"Submit\" name=\"PayFine\" value=\"PayFine\">
							 </li>
									<li> Amount to be paid: $row[1]</li>
									<li> Paid: $Paid</li>
									
									</FORM></font>";
							
						}
						else
						{
							$Paid='YES';
							echo "<font size=\"3\"><FORM method=\"post\" action=\"PayFine.php\">
								Pending</br>
							 <li> LoanID :$row[0] </li>
									<li> Amount to be paid: $row[1]</li>
									<li> Paid: $Paid</li>
									
									</FORM></font>";
					
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
