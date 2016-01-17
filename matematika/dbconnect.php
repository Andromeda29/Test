<?php 

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "testmatematika";

	function connect()
	{
		global $host,$dbuser,$dbpass,$dbname;
		$link = mysql_connect($host,$dbuser,$dbpass) or die('Ошибка подключения к серверу');
		mysql_query ("CREATE DATABASE IF NOT EXISTS ".$dbname) or die ("Не могу создать базу данных testmatematika.");
		mysql_select_db($dbname) or die('Ошибка подключения к базе данных');
		mysql_query("set names 'utf8'");
		mysql_query ("CREATE TABLE IF NOT EXISTS Countries(id int not null auto_increment, country varchar(100) not null, primary key(id)) default charset='utf8'") or die ("Не могу создать таблицу countries");
		mysql_query ("CREATE TABLE IF NOT EXISTS Cities(id int not null auto_increment, countryid int not null, city varchar(100) not null, primary key(id), foreign key(countryid) references Countries(id)) default charset='utf8'") or die ("Не могу создать таблицу cities");
		mysql_query ("CREATE TABLE IF NOT EXISTS Lenguages(id int not null auto_increment, countryid int not null, cityid int not null, lenguage varchar(100), primary key(id), foreign key(countryid)references Countries(id), foreign key(cityid) references Cities (id)) default charset='utf8'") or die ("Не могу создать таблицу Lenguages");

	}

	$addCountry = 'insert into Countries(country) values("Австрия"),
						("Андорра"),("Болгария"),("Бразилия"),("Египет"),("Испания")';
		mysql_query($addCountry);				
		
	$addCity= 'insert into Cities(countryid,city) values(1,"Вена"),(1,"Зальцбург"),(1,"Инсбрук"),(2,"Солдеу"),(2,"Пас-де-ла-Каса"),(3,"Банско"),(3,"София"),(4,"Рио-де-Жанейро"),(4,"Бузиус"),(4,"Амазония"),(5,"Дахаб"),(5,"Таба"),(6,"Барселона"),(6,"Майорка"),(6,"Мадрид")';
mysql_query($addCity);	
	$addLenguages='insert into Lenguages (countryid, cityid, lenguage) values(1,1,"венский"),(1,2,"немецкий"),(1,3,"немецкий"),(2,4,"каталинский"),(2,5,"французкий"),(3,6,"болгарский"),(3,7,"болгарский"),(4,8,"партугальский"),(4,9,"партугальский"),(4,10,"индийский"),(5,11,"арабский"),(5,12,"арабский"),(6,13,"испанский"),(6,14,"каталанский"),(6,15,"мадридский")';
mysql_query($addLenguages);	
?>