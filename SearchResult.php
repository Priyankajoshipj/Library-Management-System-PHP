	
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
			$Sql="select B.Title,a.author,B.ISBN13
   					from book B,Authors a,book_authors ba
    				where a.author_id=ba.author_id
					and b.isbn13=ba.isbn13
    				and (b.title like '%$KeyWords[$i]%' or a.author like '%$KeyWords[$i]%' or b.isbn13 like '%$KeyWords[$i]%');";
				$result = mysql_query($Sql);
				if(!$result)
					echo mysql_error();
				else
				{
					if(!in_array($row[0],$ISBNList))
						{	
							echo "<table border='1'>
									<tr>
									<th>Title</th>
									<th>ISBN</th>
									<th>Author</th>
												</tr>";
					while($row=mysql_fetch_array($result))
					{
					
						echo "<tr>";
						echo "<td>" . $row[0] . "</td>";
						echo "<td>" . $row[1] . "</td>";
						echo "<td>" . $row[2] . "</td>";
						echo "</tr>";
					}
						echo "</table>";
							
							
						}
						
					}
			
		}		
		?>
	</div>
</div>
</body>
</html>
