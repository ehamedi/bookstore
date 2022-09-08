<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
	<table align="center" width="90%" dir="rtl" border="2" frame="void"  rules="all" style="background-color:#FABFFD;">
		<tr bgcolor="#E11EFF"><th colspan="7"> لیست محصولات ثبت شده در سیستم </th></tr>
		<tr align="center" bgcolor="#D59FE5">
			<th>ردیف</th>
			<th>عنوان کتاب</th>
			<th>نام نویسنده</th>
			<th>قیمت</th>
			<th>سال نشر</th>
			<th>دسته</th>
			<th>حذف</th>
		</tr>
		
		<?php
		include('connect.php');
		$query="select * from books";
		$result=mysqli_query($con,$query);
		while($rows=mysqli_fetch_array($result))
		{
			echo "<tr align='center'>";
			echo "<td>".$rows['bid']."</td>";
			echo "<td>".$rows['nbook']."</td>";
			echo "<td>".$rows['nname']."</td>";
			echo "<td>".$rows['price']."</td>";
			echo "<td>".$rows['year']."</td>";
			echo "<td>".$rows['class']."</td>";
			echo "<td><a href='delete.php?bid=".$rows['bid']." '>حذف </a></td>";
			echo "</tr>";
		}
		?>
	
		</table>
</body>
</html>