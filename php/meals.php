<?php
session_start();
    $meals = $_SESSION['meals'];
    if(!$meals){
      $_SESSION['meals'] = $meals = array(
          array( 'Day' => 'Monday', Callories => 1800 ),
          array( 'Day' => 'Tuesday', Callories => 2000 ),
          array( 'Day' => 'Wednesday', Callories => 1900),
          array( 'Day' => 'Thursday', Callories => 2200 ),
          );
    }
        
    $total = 0;
    foreach ($meals as $meal) {
        $total += $meal['Callories'];
    }
    
    
?>
<!DOCTYPE html>
<html lang=en>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Fitness > Meals</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="style/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
						<li><a href="ehist.php">Exercise</a></li>
						<li class="active"><a href="meals.php">Meals</a></li>
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
											<th>Day</th>
											<th>Calories</th>
										</tr>
									</thead>
									<?php foreach($meals as $i => $meal): ?>

										<tr>
											<td><?=$meal['Day']?></td>
                 							<td><?=$meal['Callories']?></td>
                 							<td>
                 								<div class="btn-group" role="group" aria-label="...">
				                     				<a href="" title="View" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
				                     				<a href="edit.php?id=<?=$i?>" title="Edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
				                      				<a href="delete.php?id=<?=$i?>" title="Delete" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
			                    				</div>
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
											<th>Calories</th>
										</tr>
									</thead>
									<tr>
										<td>1</td>
										<td>0</td>
									</tr>
									<tr>
										<td>2</td>
										<td>5</td>
									</tr>
									<tr>
										<td>3</td>
										<td>3</td>
									</tr>
									<tr>
										<td>4</td>
										<td>2</td>
									</tr>
								</table>
							</div>
							<div id="year" class="tab-pane fade">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Month</th>
											<th>Calories</th>

										</tr>
									</thead>
									<tr>
										<td>January</td>
										<td>0</td>

									</tr>
									<tr>
										<td>February</td>
										<td>5</td>
									</tr>
									<tr>
										<td>March</td>
										<td>3</td>

									</tr>
								</table>						
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="cardbg">
						<h3 class="text-center">Add Meal</h3>
						<form class="center">
							<div class="form-group">
								<label class="control-label">Calories:</label>
								<input type="number" class="form-control form-control-inline" placeholder="300">
							</div>
							To estimate a meal click <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mealcalc">Here</button>
							<div class="form-group">
								<label class="control-label">Date:</label>
								<input type="date" class="form-control form-control-inline" placeholder="MM/DD/YYYY">
							</div>
							<div class="form-group">
								<button class="btn btn-primary">Add <span class="glyphicon glyphicon-plus"></button>
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
	</body>
</html>

