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
		  	 	function dateDifferene($date1,$date2)
			{
				$InputDate1=date_create($date1);
				$InputDate2=date_create($date2);
				$interval=date_diff($InputDate1,$InputDate2);
				$diffInDays = (int)$interval->format("%r%a");
				return($diffInDays);
			}
			$date=mysql_query("select curdate() from dual;");
			$CurrentDate=mysql_fetch_array($date);
			
						
			function InsertIfFineOrDeleteIfPaid()
			{
				$SelectQuery="Select Loan_ID,ISBN13,CARD_ID,date_out,date_in,due_date,Availability from book_loans;";
			
				$ExecuteSelect=mysql_query($SelectQuery);
			
				if(!$ExecuteSelect)
					echo mysql_error();
				else
				{
					
					while($row=mysql_fetch_array($ExecuteSelect))
					{
						$CheckedInDateDiff=dateDifferene($row[4],$row[5]);
						
						if( $CheckedInDateDiff<0)
						{
							$SelectFine="Select Count(*) from Fines where Loan_id=$row[0]";
							$ExecuteSelectFine=mysql_query($SelectFine);
							$FineResult=mysql_fetch_array($ExecuteSelectFine);
												
							if($FineResult[0]==0 )
							{
								$Fine=$CheckedInDateDiff*0.25;	
								$InsertQuery="Insert into Fines values($row[0],$Fine,0);";
									$Inserted=mysql_query($InsertQuery);
							}
						}
						
					}
				}
				
			}
			$InsertFine=InsertIfFineOrDeleteIfPaid();
			$Sql="select b.loan_id,b.due_date,b.date_in,f.paid,b.availability,f.fine_amt
    			from book_loans b,fines f
    			where b.loan_id = f.loan_id;";
				$result = mysql_query($Sql);
				if(!$result)
					echo mysql_error();
				else
				{
					
					while($row=mysql_fetch_array($result))
					{
						
						if ($row[3]==0 and $row[4]=='NO')
						{
							$Paid='NO';
												
						$diffInDays = dateDifferene($row[1],$CurrentDate[0]);
							if ($diffInDays>0)
							{
							
								$Fine=$diffInDays*0.25;	
							
							$UpdateQuery="update fines set fine_amt=$Fine where loan_id=$row[0];";
							$updateExecuted = mysql_query($UpdateQuery);
							}
						}
						elseif($row[3]==0 and $row[4]=='YES')
						{
							$Paid='NO';
							
							$diffInDays = dateDifferene($row[1],$row[2]);	
							if ($diffInDays>0)
							{
							
								$Fine=$diffInDays*0.25;	
							
							$UpdateQuery="update fines set fine_amt=$Fine where loan_id=$row[0];";
							$updateExecuted = mysql_query($UpdateQuery);
							}
						}
						elseif($row[3]==1 and $row[4]=='YES')
						{
							$Paid='YES';
							
							$DeleteQuery=mysql_query("Delete from fines where loan_id=$row[0];");
							$DeleteQuery=mysql_query("Delete from book_loans where loan_id=$row[0];");
							
						}
						else
							$Paid='YES';
						
						if($Paid=='YES'){
							echo "<font size=\"3\"><FORM method=\"post\" action=\"PayFine.php\">			
							 <li> LoanID :$row[0] </li>
									<li> Amount to be paid: $row[5]</li>
									<li> Paid: $Paid</li>
									
									</FORM></font>";
						}
						elseif($Paid=='NO')
						{
							
													
							echo "<font size=\"3\"><FORM method=\"post\" action=\"PayFine.php\">			
							 <li> LoanID :$row[0] <input type=\"hidden\" name=\"Book_clicked\" value=$row[0]><input type=\"Submit\" name=\"PayFine\" value=\"PayFine\">
							 </li>
									<li> Amount to be paid: $row[5]</li>
									<li> Paid: $Paid</li>
									
									</FORM></font>";
							}
							$_POST['Book_clicked']=$row[0];
						
						
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
