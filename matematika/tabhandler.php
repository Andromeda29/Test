<?php 
include_once("dbconnect.php");
connect();

if(isset($_POST['cn1']) && isset($_POST['ct1']))
{ 	
	$cn1=$_POST['cn1'];
	$ct1=$_POST['ct1'];
	echo "<table class='table table-bordered table-responsive fon'>
			<tr>
				<th>Страна</th>
				<th>Город</th>
				<th>Язык</th>
				<th></th>
				<th></th>
			</tr>
			<tr>";
	$sel = "select country from Countries where id=".$cn1;
	$res = mysql_query($sel);
		while($row = mysql_fetch_array($res, MYSQL_ASSOC))
			{
			 echo '<td>'.$row["country"].'</td>';
			}

	$sel1 ="select * from Cities where id=".$ct1;
	$res1 = mysql_query($sel1);
		while($row = mysql_fetch_array($res1, MYSQL_ASSOC))
			{
			 echo '<td>'.$row["city"].'</td>';
			}

	$sel2="select * from Lenguages where cityid=".$ct1;
	$res2 = mysql_query($sel2);
	
		while($row = mysql_fetch_array($res2, MYSQL_ASSOC))
			{
			 echo '<td>'.$row["lenguage"].'</td>';
			}
			echo '<td class="td"><a href="addcn1.php">ДОБАВИТЬ</a></td>';
			echo '<td class="td"><a href="upimput.php">ОБНОВИТЬ</a></td>';
	echo '</tr>
		</table>';
};

if(isset($_POST["cid"]))
	{
       $countryid=$_POST["cid"];
       	mysql_query('delete from lenguages where countryid='.$countryid);
       	$err = mysql_errno();
       	echo $err;

		mysql_query('delete from cities where countryid='.$countryid);
		$err = mysql_errno();
       	echo $err;
		
		mysql_query('delete from countries where id='.$countryid);
		$err = mysql_errno();
       	echo $err;
	};




?>