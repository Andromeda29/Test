<?php 
include_once("dbconnect.php");
connect();



if(isset($_POST['countryid']) && isset($_POST['cityid']))
{
	$countryid= intval($_POST['countryid']);
	$cityid= intval($_POST['cityid']);
	$sel = "select * from Lenguages where countryid=".$countryid." and cityid=".$cityid; 
	$res = mysql_query($sel);

		while($row = mysql_fetch_array($res, MYSQL_NUM))
			{ 
			 echo '<option value="'.$row[0].'">'.$row[3].'</option>';
			};		
}

?>