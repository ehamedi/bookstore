<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$con=mysqli_connect("localhost","root","","bookstore");
	mysqli_set_charset($con,"utf8");
	if(mysqli_connect_errno($con))
		echo "faild to connect: ".mysqli_connect_errno();
	else
		//echo "connect";
	?>
</body>
</html>