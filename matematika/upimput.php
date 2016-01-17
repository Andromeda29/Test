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

		
		$("#upcountry").click(function(){
			UpdateCoyntry();
		});
		
		function UpdateCoyntry()
		{
			var updatecountry= $("#country").val();
			var newcountry= $("#newcountry").val();
				$.ajax({
					type: "POST",
					url:"update.php",
					data:{updatecountry:updatecountry, newcountry:newcountry},
					success: function(data){
						window.location.reload();
					}	
				 });
		};




		$("#upcity").click(function(){
			UpdateCities();
		});


		function UpdateCities()
		{
			var updatecity= $(".city").val();
			var newcity= $("#cityname").val();
				$.ajax({
					type: "POST",
					url:"update.php",
					data:{updatecity:updatecity, newcity:newcity},
					success: function(data){
						window.location.reload();
					}	
				 });
		};

		var id = $("#cn1").val();
		
	    $.ajax({
				type:"POST",
				url:"sell.php",
				data:{id:id},
				success: function(data){
					$("#ct1").html(data);
				}
			});
	    
		
		$("#cn1").change (function(){
        addCityname();
        });
			
			
			function addCityname(){
			var id = $("#cn1").val();
			$.ajax({
				type:"POST",
				url:"sell.php",
				data:{id:id},
				success: function(data){
					$("#ct1").html(data);
				}
			});
		};

		$("#ct1").change (function(){
        addLenguagename();
        });

			
			
			function addLenguagename(){
			var countryid = $("#cn1").val();
			var cityid = $("#ct1").val();
			$.ajax({
				type:"POST",
				url:"sell1.php",
				data:{countryid:countryid, cityid:cityid},
				success: function(data){
					$("#lg1").html(data);
				}
			});
		};

		$("#addleng").click(function(){
			UpdateLenguages();
		});


		function UpdateLenguages()
		{
			var updalg= $("#lg1").val();
			var newlg= $("#newlg").val();
				$.ajax({
					type: "POST",
					url:"update.php",
					data:{updalg:updalg, newlg:newlg},
					success: function(data){
						window.location.reload();
					}	
				 });
		};

		
	
	});

</script>
	
</head>

<body>
		<div class="container">
			<a href="index.php"><--Назад</a>
			<div class="row">
				<div class="col-md-4">
				<h5>Обновить страну</h5>
					<select id="country" id="country" class="form-control">
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
				<input type="text" name="newcountry" id="newcountry" class="form-control"/>
				<button id="upcountry" class="btn btn-default">ОБНОВИТЬ</button> 
				</div>

				<div class="col-md-4">
					<h5>Обновить город</h5>
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
						<input type="text" name="cityname" id="cityname" class="form-control"/>
						<button id="upcity" class="btn btn-default">ОБНОВИТЬ</button> 
				</div>

				<div class="col-md-4">
					<h5>Обновить язык</h5>
						<select id="cn1" class="form-control">
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
						<select id="ct1" class="form-control">
							<option value="0">--Выбрать страну---</option>
						</select>
						<br>
						<select id="lg1" class="form-control">
							<option value="0">--Выбрать город---</option>
						</select>
						<input type="text" id="newlg"class="form-control">
						<button id="addleng" class="btn btn-default">ДОБАВИТЬ</button>
				</div>
			</div>
		</div>
	


	

	

	

	

</body>
</html>