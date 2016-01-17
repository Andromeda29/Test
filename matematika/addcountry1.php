<?php 

include_once("dbconnect.php");
connect();

if(isset($_POST['countryname']))
{
	$add=trim(htmlspecialchars($_POST['countryname']));
    $ins='insert into countries(country) values ("'.$add.'")';
    echo $ins;
    mysql_query($ins);

}

if(isset($_POST['country']) && isset($_POST['cityname']))
{
	$cnname= $_POST['country'];
	$ct= $_POST['cityname'];
	$ins='insert into cities(countryid, city) values ('.$cnname.',"'.$ct.'")';
	mysql_query($ins);

}

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
 echo'<select class="city form-control " disabled>
 <option value="0">----Выберите страну----</option>
 </select>';
}

if(isset($_POST['addselcn']) && isset($_POST['addselct']) && isset($_POST['addinlg']))
{
	$cnlg= $_POST['addselcn'];
	$ctlg= $_POST['addselct'];
	$lg= $_POST['addinlg'];
	$ins='insert into lenguages(countryid, cityid, lenguage) values ('.$cnlg.',"'.$ctlg.'","'.$lg.'")';
	mysql_query($ins);

}



?>