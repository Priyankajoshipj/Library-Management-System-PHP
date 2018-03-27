
<!doctype html>

<?php 
include_once("connection1.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Check In</title>
<link rel="stylesheet" type="text/css" href="Unnamed Site 2/Style.css">

</head>

<body>
<div class="Container">
	<div class="Content">
		<center><h1>Book Hub Library Management System</h1></center>
	  <hr/>
		<center><font size="5"> <a href="MainPage.php"> Home </a>| <a>Books you might want to Check-In: </a></font></center><hr/>
		<?php
		$SearchText=$_POST['SearchText'];
		$KeyWords= explode(' ',$SearchText);
			
			echo "<center><font size=\"3\">Details of books <br/>" ;
		$ISBNList=array();    
		for($i=0;$i< count($KeyWords);$i++)
		{
			$Sql="select B.Title,Br.bName,Bl.card_id,B.ISBN13,bl.loan_id
   					from book B,borrowers Br,Book_loans Bl
    				where B.ISBN13=Bl.ISBN13
    				and Br.Card_id=Bl.card_id
    				and (bl.card_id like '%$KeyWords[$i]%' or br.bName like '%$KeyWords[$i]%' or b.isbn13 like '%$KeyWords[$i]%');";
				$result = mysql_query($Sql);
				if(!$result)
					echo mysql_error();
				else
				{
					
					while($row=mysql_fetch_array($result))
					{
						if(!in_array($row[3],$ISBNList))
						{	
		
							echo "<FORM method=\"post\" action=\"CheckInMessage.php\">
							<li> Title of the book:$row[0] <input type=\"checkbox\" name=\"CheckIn\" value=$row[3]>
							 </li>
									<li> Name of the borrower: $row[1] $row[2]</li> <li> Card Id: $row[2]</li>
															
							
							";
							array_push($ISBNList,$row[3]);
							
						}
						
					}
						echo "<input type=\"hidden\" name=\"Book_clicked\" value=$row[5]><input type=\"submit\" name=\"formSubmit\" value=\"CheckIn\"></FORM></font></center>";
						$_POST['Book_clicked[]']=$row[4];
						if(count($ISBNList)>1)
						{
							$_POST['CheckIn[]']=$ISBNList;
						}
						else
							$_POST['CheckIn']=$ISBNList;
							
				}
		}		
		?>
	</div>
</div>
</body>
</html>
