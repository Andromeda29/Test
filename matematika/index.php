<?php 
@header('Content-type:text/html,charset=utf8'); 
include_once("dbconnect.php");
connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<script src="jquery-1.11.3.min.js"></script>
	
	<script type="text/javascript">
	$(function () {
		var id = $("#cn1").val();
	    $.ajax({
				type:"POST",
				url:"handler1.php",
				data:{id:id},
				success: function(data){
					$(".sel").html(data);
				}
			});
		
		$("#cn1").change (function(){
        addCountryname();
        });
			
			
			function addCountryname(){
			var id = $("#cn1").val();
			$.ajax({
				type:"POST",
				url:"handler1.php",
				data:{id:id},
				success: function(data){
					$(".sel").html(data);
				}
			});
		};

	
			$("#tab").click (function(){
			CreatTable();
		})

			function CreatTable()
			{
				var cn1 = $("#cn1").val();
				var ct1 = $("#ct1").val();
			$.ajax({
			type:"POST",
			url:"tabhandler.php",
			data:{cn1:cn1, ct1:ct1},
				success: function (data){
				$("#info").html(data);
				}
				})
			};

			$("#dell").click (function(){
			DellTable();
		    })

			function DellTable()
			{
				var cid = $("#cn1").val();
				
			$.ajax({
			type:"POST",
			url:"tabhandler.php",
			data:{cid:cid},
				success: function (data){
					window.location.reload();
				}
				})
			};
		
});

	</script>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
    			<div class="fon">
					<select id="cn1" class="form-control">
						<option value="0">--Выберите страну---</option>
						<?php  
						$sel = "select * from countries order by country";
						$res = mysql_query($sel);
						while($row = mysql_fetch_array($res, MYSQL_ASSOC))
							{
			 				echo '<option value="'.$row["id"].'">'.$row["country"].'</option>';
							}
						?>
					</select>

					<span class="sel"> </span>
					<button id="tab" class="btn btn-default">Выбрать</button>
					<button id="dell" class="btn btn-default">Удалить</button>
   				</div>
   			</div>
   		</div>

		<div class="row">
			<div class="col-md-8">

				<span id="info"> </span>
			</div>
		</div>
	</div>

</body>
</html>


