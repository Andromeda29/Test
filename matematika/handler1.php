

<?php 
include_once("dbconnect.php");
connect();

if(isset($_POST['id']) && !empty($_POST['id']))
{
	$id= intval($_POST['id']);
	$sel = "select * from cities where countryid=".$id;
	$res = mysql_query($sel);
echo'<select id="ct1" class="form-control">';
		while($row = mysql_fetch_array($res, MYSQL_NUM))
			{ 
			 echo '<option value="'.$row[0].'">'.$row[2].'</option>';
			};		
echo'</select>';
}
else
{
 echo'<select id="ct1" class="form-control" disabled>
 <option value="0">----Выберите страну----</option>
 </select>';
}



?>