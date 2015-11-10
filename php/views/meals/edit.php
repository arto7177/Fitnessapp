<?php
session_start();
	$meals = $_SESSION['meals'];
  	if($_POST){
    	if(isset($_GET['id'])){
			$meals[$_GET['id']] = $_POST;
    }
    else{
    	$meals[] = $_POST;
    }
    
   $_SESSION['meals'] = $meals;
   header('Location: ./meals.php');
  }
  if(isset($_GET['id'])){
    $meal = $meals[$_GET['id']];
  }
?>
<!DOCTYPE html>
<html lang=en>
	<head>
		<meta chasret="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Fitness > Meal > Edit </title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="style/style.css">
	</head>
	<body>
		<div class="container">
		    <div class="row">
		    	<div class='cardbg'>
		    		<div class="page-header"><center><h1> Edit Meal</h1></center></div>
			        <form class="form-horizontal" action="" method="post">
			            <div class="form-group">
							<label class="control-label col-xs-3">Meal:</label>
							<div class="col-xs-7"> 
								<select class="form-control" name="MealName">
							    	<option <?php if($meal['MealName'] == 'Breakfast') echo"selected"; ?>>Breakfast</option>
							      	<option <?php if($meal['MealName'] == 'Lunch') echo"selected"; ?>>Lunch</option>
							      	<option <?php if($meal['MealName'] == 'Dinner') echo"selected"; ?>>Dinner</option>
							    	<option <?php if($meal['MealName'] == 'Snack') echo"selected"; ?>>Snack</option>
							  	</select>
							 </div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-3">Calories:</label>
							<div class='col-xs-7'>
								<input type="number" class="form-control" id="txtCallories" name="Callories" placeholder="<?=$meal['Callories']?>" value="<?=$meal['Callories']?>">
							</div>
						</div>

						<div class="form-group">
								<label class="control-label col-xs-3">Date:</label>
								<div class="col-xs-7">
									<input type="text" class="form-control date" id="txtDate" name="Date" placeholder="<?=$meal['Date']?>"  value="<?=$meal['Date']?>">
								</div>
							</div>
						<div class="form-group">
							<div class='col-xs-offset-3 col-xs-9'>
								<button type='submit' class="btn btn-primary" id="submit">Edit <span class="glyphicon glyphicon-edit"></button>
								<a href='meals.php' class='btn btn-danger'>Cancel</a>
							</div>
						</div>
			        </form>
		        </div>
		    </div>
	    </div>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	    <script type="text/javascript">
	    	(function($){
        		$(function(){
        			$( "#txtDate").datepicker();
        			$("#submit").on('click', function(e){
						var self = this;
						$(self).hide().after("Checking...");

						setInterval(function(){},200);
						if( !$("#txtDate").val() ){
							
						}
						$(self).hide().after("Adding");
	        		});
        		});
	    	})(jQuery);

	    </script>
	</body>
</html>
	