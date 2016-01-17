<?php 
include_once("dbconnect.php");
connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<script src="jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
	$(function() {
		var id = $(".country").val();
	    $.ajax({
				type: "POST",
				url:"handler.php",
				data:{id:id},
				success: function(data){
					$(".citysel").html(data);
				}
			});

	    $(".country").change (function(){
			var id = $(".country").val();
			
			$.ajax({
				type: "POST",
				url:"handler.php",
				data:{id:id},
				success: function(data){
					$(".citysel").html(data);
				}
			});
		});

		$("#addlenguage").click(function(){
			addLenguage();
		});

		function addLenguage(){
			var addselcn = $(".country").val();
			var addselct = $(".city").val();
			var addinlg = $("#lenguagename").val();
			
			$.ajax({
				type: "POST",
				url:"addcountry1.php",
				data:{addselcn:addselcn, addselct:addselct, addinlg:addinlg},
				success: function(data){
					window.location.reload();
				}	
			});
		};
		
		$("#addcountry").click(function(){
			addCountries();
		});

		function addCountries(){
			var add= $("#countryname").val();
			$.ajax({
				type: "POST",
				url:"addcountry1.php",
				data:{countryname:add},
				success: function(data){
					window.location.reload();
				}	
			});
		}



		$("#addcity").click(function(){
			addCities();
		});

		function addCities()
		{
			var addcn= $("#country").val();
			var ct= $("#cityname").val();
				$.ajax({
					type: "POST",
					url:"addcountry1.php",
					data:{country:addcn, cityname:ct},
					success: function(data){
						
					}	
				});

		};

		
	});

</script>
	
</head>

<body>

	<div class="container">
		<a href="index.php"> <--Назад</a>
		<div class="row">
			
			<div class="col-md-4">
				
				<h5>Добавить страну</h5>
					<input type="text" name="countryname" id="countryname" class="form-control"/>
					<button id="addcountry" class="btn btn-default">ДОБАВИТЬ</button>
			
			</div>

			<div class="col-md-4">
			
				<h5>Добавить город</h5>
					<select id="country" name="country" class="form-control">
							<option value="0">--Выбрать страну---</option>
							<?php  
								$sel = "select * from countries order by country";
								$res = mysql_query($sel);
								while($row = mysql_fetch_array($res, MYSQL_ASSOC))
								{
			 						echo '<option value="'.$row["id"].'">'.$row["country"].'</option>';
								}
							?>
					</select>
					<input type="text" name="cityname" id="cityname" class="form-control"/>
					<button id="addcity" class="btn btn-default">ДОБАВИТЬ</button> 
		
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<h5>Добавить язык</h5>
				<select class="country form-control" name="country">
					<option value="0">--Выбрать страну---</option>
					<?php  
					$sel = "select * from countries order by country";
					$res = mysql_query($sel);
					while($row = mysql_fetch_array($res, MYSQL_ASSOC))
					{
			 			echo '<option value="'.$row["id"].'">'.$row["country"].'</option>';
					}
					?>
				</select>
						
				<span class="citysel">	</span>
			
				<input type="text" name="lenguagename" id="lenguagename" class="form-control"/>
			
				<button id="addlenguage" class="btn btn-default">ДОБАВИТЬ</button>
				<button id="dell" class="btn btn-default">УДАЛИТЬ</button>  
			</div>	
		</div>	
	</div>	

</body>
</html>