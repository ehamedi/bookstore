<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	include('connect.php');
	$id=$_GET['bid'];
	$query="delete from books where bid='$id'";
			if(!mysqli_query($con,$query))
				echo("error in deleted");
			else
			{
				echo "deleted";
				echo '<meta http-equiv="Refresh" content="0;url=show.php">';
			}
	mysqli_close($con);
	?>
</body>
</html>