<?php
session_start();

  $meals = $_SESSION['meals'];
  if($_POST){
    unset($meals[$_POST['id']]);
    $_SESSION['meals'] = $meals;
    header('Location: ./meals.php');
  }
  
  $meal = $meals[$_REQUEST['id']];
?>
<!DOCTYPE html>
<html lang=en>
	<head>
		<meta chasret="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Fitness > Meal > Delete</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="style/style.css">
	</head>
	<body>

		<div class='container'>
		    <form class='form-horizonal' action="" method='post'>
		        <div class='alert alert-danger alert-block'>
		            Delete Meal <?=$meal['MealName']?> on <?=$meal['Date']?>?
		        </div>
		         <input type="submit" value="Delete" class="btn btn-danger" />
		         <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
		    </form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	    <script type="text/javascript">
	    	(function($){
        		$(function(){
        			 
        		});
	    	})(jQuery);
	    </script>
	</body>
</html>