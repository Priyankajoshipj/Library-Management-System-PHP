
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
	<div class="Content">
		<center><h1>Book Hub Library Management System</h1></center>
	  <hr/>
		<center><font size="5"> <a href="Unnamed Site 2/MainPage.php"> Home </a>| <a>Check Out </a></font></center><hr/>
		<?php
		$CardID=$_POST['Card_ID'];
		$ISBN=$_POST['ISBN'];
		
		$date=mysql_query("select curdate() from dual;");
		$dateOut=mysql_fetch_array($date);
		
		$CheckAvailability= "Select Availability from book_loans where isbn=$ISBN;";
		$MaxCheckQuery="select count(*) from book_loans where availability='NO' group by card_id having card_id=$CardID;";
		$MaxCheckResult=mysql_query($MaxCheckQuery);
		$dueDateQuery="select adddate(curdate(),interval 14 day);";
		$dueDate1=mysql_query($dueDateQuery);
		$dueDate=mysql_fetch_array($dueDate1);
		$CheckAvailabilityResult=mysql_query($CheckAvailability);
		$IsAvailable=$CheckAvailabilityResult;
		$MaxCheck=mysql_fetch_array($MaxCheckResult);
		$UserExistsQuery="Select count(*) from borrowers where card_id =$CardID;";
		
		
		$UserExists=mysql_query($UserExistsQuery);
			$UserExistsResult=$UserExists;
		if($UserExistsResult==0)
		{
			echo "<center><font size=\"3\"> User is not a member of the library ! <a href=\"CreateBorrower.php\"> Create New Borrower </a></font></center>";
		}
		else
		{
		if($IsAvailable[0]=='NO')
		{
			$Existingduedate=mysql_query("Select due_date from book_loans where isbn=$ISBN;");
			$Existingduedate1=mysql_fetch_array($Existingduedate);
			$Eduedate=date_create($Existingduedate1[0]);
			echo "<center><font size=\"3\">Sorry But the Book is not available! Probable Date of availability is: $Eduedate1</font></center>";
		}
		elseif($MaxCheck[0]>=3)
		{
			echo "<Center><font size=\"3\">Maximum Limit reached.User already has 3 books , Can not checkout!!</font></center>";
		}
		else
		{
			$query= "Insert into book_loans(ISBN13,CARD_ID,DATE_OUT,DUE_DATE,Availability) values($ISBN,$CardID,'$dateOut[0]','$dueDate[0]','NO');";
			$result=mysql_query($query);
			if(!$result)
				echo mysql_error();
			else
			{
			echo "<center>Book Successfully checked out!!</center>";
			}
		}
		}
		?>
	</div>
</div>
</body>
</html>
