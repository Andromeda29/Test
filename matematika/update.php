<?php 

include_once("dbconnect.php");
connect();



if(isset($_POST['id']) && !empty($_POST['id']))
{
	$id= intval($_POST['id']);
	$sel = "select * from cities where countryid=".$id;
	$res = mysql_query($sel);
echo'<select class="city form-control">';
		while($row = mysql_fetch_array($res, MYSQL_NUM))
			{ 
			 echo '<option value="'.$row[0].'">'.$row[2].'</option>';
			};		
echo'</select>';
}
else
{
 echo'<select class="city form-control" disabled>
 <option value="0">----Выберите страну----</option>
 </select>';
 /*echo'<input type="text" value="----Выберите город----" class="leng" disabled>';
*/
}

if(isset($_POST['updatecity']) && isset($_POST['newcity']))
{
	$updatecity= $_POST['updatecity'];
	$newcity= $_POST['newcity'];
	$upd ="UPDATE Cities SET city='".$newcity."' WHERE id=".$updatecity;
	mysql_query($upd);
}

if(isset($_POST['updatecountry']) && isset($_POST['newcountry']))
{
	$updatecountry= $_POST['updatecountry'];
	$newcountry= $_POST['newcountry'];
	$upd1 ="UPDATE Countries SET country='".$newcountry."' WHERE id=".$updatecountry;
	mysql_query($upd1);
}

if(isset($_POST['updalg']) && isset($_POST['newlg']))
{
	$updatelg= $_POST['updalg'];
	$newlg= $_POST['newlg'];
	$upd2 ="UPDATE Lenguages SET lenguage='".$newlg."' WHERE id=".$updatelg;
	mysql_query($upd2);
}



?>