<!-- DASHBOARD -->
<div class="tab-pane has-padding active" id="tab-dashboard">

	<div class="row">
		<div class="col-md-12">
			<h3 class="text-uppercase"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?></h3>
		</div>
	</div>
	<!-- ROW -->
	<div class="row">
		<div class="col-sm-6 col-md-4">
			<div class="panel panel-body bg-green-400 has-bg-image">
				<div class="media no-margin">
					<div class="media-body">
						<h3 class="no-margin" id="counter-revenue">0</h3>
						<span class="text-uppercase text-size-mini" >Today's Revenue</span>
					</div>

					<div class="media-right media-middle">
						<i class="icon-coin-dollar icon-3x opacity-75"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-md-4">
			<div class="panel panel-body bg-danger-400 has-bg-image">
				<div class="media no-margin">
					<div class="media-body">
						<h3 class="no-margin" id="counter-receivable">0</h3>
						<span class="text-uppercase text-size-mini">Total Receivables</span>
					</div>

					<div class="media-right media-middle">
						<i class="icon-credit-card icon-3x opacity-75"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 col-md-4">
			<div class="panel panel-body bg-blue-400 has-bg-image">
				<div class="media no-margin">
					<div class="media-body">
						<h3 class="no-margin" id="counter-patient">0</h3>
						<span class="text-uppercase text-size-mini">Today's New Patients</span>
					</div>

					<div class="media-right media-middle">
						<i class="icon-users icon-3x opacity-75"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /ROW -->

	<!-- ROW -->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-white">
				<div class="panel-heading">
					<h6 class="panel-title text-semibold"><i class="icon-calendar"></i> Today's Appointments</h6>
					<div class="heading-elements">
						<label class="label label-primary" id="text-date-today"></label>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-framed table-xs">
							<thead>
								<tr>
									<th>Time</th>
									<th>Name</th>
									<th>Cellphone</th>
									<th>Message</th>
								</tr>
							</thead>
							<tbody id="tbody-appointments">
								<tr>
									<td>01:30 pm</td>
									<td>Juan Dela Cruz</td>
									<td>09123456789</td>
									<td>2 tooth extraction</td>
								</tr>
								<tr>
									<td>02:30 pm</td>
									<td>Rod Carlos Ortega</td>
									<td>09581252152</td>
									<td>regular checkup</td>
								</tr>
								<tr>
									<td>03:30 pm</td>
									<td>Elise Lazatin</td>
									<td>09218515827</td>
									<td>Retainer langs.</td>
								</tr>
								<tr>
									<td>04:30 pm</td>
									<td>Juan Dela Cruz</td>
									<td>09126751272</td>
									<td>2 tooth extraction</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /ROW -->
</div>