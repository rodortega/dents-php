<div class="tab-pane has-padding" id="tab-reports">
	<form method="POST" id="form-generate-report" action="<?php echo URL?>report/generate">
		<div class="row hidden-print">
			<div class="col-md-3">
				<label>Type</label>
				<select name="type" class="form-control" required>
					<option value="">Select type..</option>
					<!-- <option value="transaction">Transactions</option> -->
					<option value="revenue">Revenue</option>
				</select>
			</div>
			<div class="col-md-3">
				<label>Start Date</label>
				<input type="date" name="start" class="form-control" required>
			</div>
			<div class="col-md-3">
				<label>End Date</label>
				<input type="date" name="end" class="form-control" required>
			</div>
			<div class="col-md-3 mt-20">
				<label></label>
				<button class="btn bg-purple-400 btn-rounded btn-raised"><i class="icon-cabinet position-left"></i>Generate</button>
			</div>
		</div>
	</form>
	<br><br><br>
	<button class="btn btn-rounded btn-flat border-slate hidden-print" onclick="window.print();"><i class="position-left icon-printer2"></i>Print</button>
	<div id="chart-reports"></div>
</div>