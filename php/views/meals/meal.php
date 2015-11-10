<?php
?>
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
									<th>Meal</th>
									<th>Date</th>
									<th>Callories</th>
								</tr>
							</thead>
							<?php foreach($meals as $meal): ?>
								<tr>
									<td><?=$meal['mealname']?></td>
									<td><?=$meal['date']?></td>
         							<td><?=$meal['callories']?></td>
         							<td>
	                     				<a href="?action=edit.php?id=<?=$meal['mid']?>" title="Edit" class="btn btn-warning btn-sm ajax"><i class="glyphicon glyphicon-edit"></i></a>
	                      				<a href="?action=delete.php?id=<?=$meal['mid']?>" title="Delete" class="btn btn-danger btn-sm ajax"><i class="glyphicon glyphicon-minus"></i></a>
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
						</table>						
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="cardbg">
				<h3 class="text-center">Add Meal</h3>
				<form class="form-horizontal" action="" method="post">
					<div class="form-group">
						<label class="control-label col-xs-3">Meal:</label>
						<div class="col-xs-9"> 
							<select class="form-control" name="MealName">
						    	<option>Breakfast</option>
						      	<option>Lunch</option>
						      	<option>Dinner</option>
						    	<option>Snack</option>
						  	</select>
						 </div>

					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">Callories:</label>
						<div class="col-xs-9">
							<input type="number" class="form-control" id="txtCallories" name="Callories" placeholder="Callories Eaten"  value="<?=$newmeal['Callories']?>">
						</div>
					</div>
					<div class='form-group'>
						<div class='col-xs-offset-3 col-xs-9'>
						To estimate a meal click <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mealcalc">Here</button>
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
</html>

