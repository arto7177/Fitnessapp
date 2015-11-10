<?php
session_start();
    $exercises = $_SESSION['exercises'];
    if(!$exercises){
      $_SESSION['exercises'] = $exercises = array(
          array( 'EType' => 'Running','Date'=>'9/15/2015', Minutes => 40 ),
          array( 'EType' => 'Swimming', 'Date'=>'9/15/2015',Minutes => 20 ),
          array( 'EType' => 'Weight Lifting','Date'=>'9/15/2015', Minutes => 30),
          array( 'EType' => 'Climbing', 'Date'=>'9/15/2015', Minutes => 60 ),
          );
   }
	if($_POST){
		$exercises[] = $_POST;
	}
	$_SESSION['exercises']=$exercises;
    
?>
<!DOCTYPE html>
<html lang=en>
	<head>
		<meta chasret="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Fitness > Exercise</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="style/style.css">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Fitness</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a>
						<li class="active"><a href="ehist.php">Exercise</a></li>
						<li><a href="meals.php">Meals</a></li>
						<li><a href="goals.php">Goal</a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings <span class="glyphicon glyphicon-cog"></span></a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="profile.html">Profile <span class="glyphicon glyphicon-user"></span></a></li>
								<li><a href="#">Account Options <span class="glyphicon glyphicon-edit"></span></a></li>
								<li class="divider"></li>
								<li><a href="#">Sign Out <span class="glyphicon glyphicon-log-out"></span></a></li>
							</ul>
						</li>	
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="cardbg">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#week">This Week</a></li>
							<li><a data-toggle="tab" href="#month">This Month</a></li>
							<li><a data-toggle="tab" href="#year">This Year</span></a></li>
						</ul>
						<div class="tab-content">
							<div id="week" class="tab-pane fade in active">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Exercise Type</th>
											<th>Date</th>
											<th>Minutes</th>
										</tr>
									</thead>
									<?php foreach($exercises as $i => $exercise): ?>

										<tr>
											<td><?=$exercise['EType']?></td>
											<td><?=$exercise['Date']?></td>
                 							<td><?=$exercise['Minutes']?></td>
                 							<td>
			                     				<a href="ehistedit.php?id=<?=$i?>" title="Edit" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
			                      				<a href="ehistdel.php?id=<?=$i?>" title="Delete" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></a>
                 							</td>
										</tr>
									<?php endforeach; ?>
								
								</table>				
							</div>
							<div id="month" class="tab-pane fade">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Week</th>
											<th>Minutes</th>
										</tr>
									</thead>

									</tr>
								</table>
							</div>
							<div id="year" class="tab-pane fade">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Month</th>
											<th>Minutes</th>

										</tr>
									</thead>
								</table>						
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="cardbg">
						<h3 class="text-center">Add Exercise</h3>
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label class="control-label col-xs-3">Exercise Type:</label>
								<div class="col-xs-9"> 
									<select class="form-control" name="EType">
								    	<option>Running</option>
								      	<option>Climbing</option>
								      	<option>Swimming</option>
								    	<option>Weight Lifting</option>
								  	</select>
								 </div>

							</div>
							<div class="form-group">
								<label class="control-label col-xs-3">Minutes:</label>
								<div class="col-xs-9">
									<input type="number" class="form-control" id="txtMinutes" name="Minutes" placeholder="Minutes exercising"  value="<?=$newmeal['Minutes']?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-3">Date:</label>
								<div class="col-xs-9">
									<input type="text" class="form-control date" id="txtDate" name="Date" placeholder=""  value="<?=$newmeal['Date']?>">
								</div>
							</div>
							<div class="form-group">
								
								<div class='col-xs-offset-3 col-xs-9'>
									<button type=submit class="btn btn-primary">Add <span class="glyphicon glyphicon-plus"></button>
									<button type="reset" class='btn btn-danger'>Cancel</button>
								</div>
							</div>
						
						
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="mealcalc" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Meal Calculator</h4>
					</div>
					<div class="modal-body">
					</div>
					Calculator will go here
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
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
        			 
        			$("#txtDate" ).datepicker();
        		});
	    	})(jQuery);
	    </script>
	</body>
</html>

