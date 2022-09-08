<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body bgcolor="#330345" text="#1501A2">
	<br><br>
	<table width="40%" align="center" style="border: 1px solid #33438b; background-color: #d8e5c6;">
	<form action="" method="post">
			<tr>
				<th width="65%" colspan="2" align="center">فرم ورود اطلاعات کتاب</th>
			</tr>
			<tr>
				<td dir="rtl"><input type="text" name="pname" size="25"></td>
				<th width="35%" align="right">:عنوان کتاب</th>
			</tr>
			<tr>
				<td dir="rtl"><input type="text" name="tname" size="25"></td>
				<th width="35%" align="right">:نام نویسنده</th>
			</tr>
		<tr>
				<td dir="rtl"><input type="text" name="price" size="25"></td>
				<th width="35%" align="right">:قیمت</th>
			</tr>
		<tr dir="rtl">
				<th colspan="2" align="right">سال نشر:
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<select name="year">
						<option value="1390">1390</option>
						<option value="1391">1391</option>
						<option value="1392">1392</option>
						<option value="1393">1393</option>
						<option value="1394">1394</option>
						<option value="1395">1395</option>
						<option value="1396">1396</option>
						<option value="1397">1397</option>
						<option value="1398">1398</option>
						<option value="1399">1399</option>
					</select>
			</th>
			</tr>
		<tr dir="rtl">
				<th colspan="2">
					<fieldset style="background-color:plum;">
					<legend style="color: #1501A2;">دسته کتاب</legend>
					&nbsp;&nbsp;
				<input type="radio" name="class" value="کامپیوتری"> 
					کامپیوتری
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="class" value="ادبی"> 
					ادبی
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" name="class" value="پزشکی"> 
					پزشکی
			</fieldset>
			</th>
		</tr>
		<tr align="center">
		<td colspan="2"><input type="reset" value="لغو">
		<input type="submit" name="sub" value="ثبت"></td>
		</tr>
		</table>
	</form>
	
	<br><br>
	<center>
		
	<form action="" method="post">
		<table width="40%" style="border: 1px solid #33438b; background-color:lightslategray;">
			<tr dir="rtl">
				<th colspan="2" align="center">جستجو بر اساس:
			&nbsp;&nbsp;&nbsp;&nbsp;
					<select name="sinfo">
						<option value="">---</option>
						<option value="bid">ردیف</option>
						<option value="nbook">عنوان کتاب</option>
						<option value="nname">نام نویسنده</option>
						<option value="price">قیمت کتاب</option>
						<option value="year">سال نشر</option>
						<option value="class">دسته کتاب</option>
					</select>
			</th>
			</tr>
			<tr>
				<td dir="rtl"><input type="submit" value="جستجو" name="search"></td>
				<td><input type="text" name="find" size="25"></td>
				
			</tr>
		</table>	
	</form>	
	</center>
	
	<br><br>
	<?php
		include('connect.php');
		if(isset($_POST['search']))
		{
			$s=$_POST['find'];
			$query="select * from books where bid='$s' || nbook='$s' || nname='$s' || price='$s' || year='$s' || class='$s'";
			$result=mysqli_query($con,$query);
			echo '<table align="center" width="90%" dir="rtl" border="2" frame="void"  rules="all" style="background-color:#FABFFD;">
			<tr bgcolor="#E11EFF"><th colspan="6"> نتایج جستجو </th></tr>
			<tr align="center" bgcolor="#D59FE5">
			<th>ردیف</th>
			<th>عنوان کتاب</th>
			<th>نام نویسنده</th>
			<th>قیمت</th>
			<th>سال نشر</th>
			<th>دسته</th>
			</tr>';
			
		while($rows=mysqli_fetch_array($result))
		{
			echo "<tr align='center'>";
			echo "<td>".$rows['bid']."</td>";
			echo "<td>".$rows['nbook']."</td>";
			echo "<td>".$rows['nname']."</td>";
			echo "<td>".$rows['price']."</td>";
			echo "<td>".$rows['year']."</td>";
			echo "<td>".$rows['class']."</td>";
			echo "</tr>";
		}
		}
		?>
	
	<?php
	include('connect.php');
	if(isset($_POST['sub']))
	{
		$nbook=$_POST['pname'];
		$nname=$_POST['tname'];
		$price=$_POST['price'];
		$year=$_POST['year'];
		if(!empty($nbook) && !empty($nname) && !empty($price) && !empty($year) && isset($_POST['class']))
		{
			$class=$_POST['class'];
			$query="insert into books (`bid`, `nbook`, `nname`, `price`, `year`, `class`)
			VALUES ('', '$nbook', '$nname', '$price', '$year', '$class')";
			if(!mysqli_query($con,$query))
				die("error in insert");
			else
			{
				//echo "record insert";
				echo '<center><iframe src="show.php" width="70%" height="300px" style="border: none;"></iframe></center>';
		}
	}
		else
			echo "please fill in the fields";
	}
	mysqli_close($con);
	?>
	
</body>
</html>