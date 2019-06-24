<div class="navbar" style="background-color: transparent;">
	<div class="navbar-boxed">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">DENTAL CLINIC</a>
		</div>
	</div>
</div>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

	<!-- Page content -->
	<div class="page-content">

		<div class="row">
			<div class="col-md-12">
				<div class="tabbable tab-content-bordered">
					<ul class="nav nav-tabs nav-tabs-highlight hidden-print">
						<li class="active"><a href="#tab-dashboard" data-toggle="tab">Dashboard</a></li>
						<li><a href="#tab-appointments" data-toggle="tab" id="navtab-appointments">Appointments</a></li>
						<li><a href="#tab-patients" data-toggle="tab">Patients</a></li>
						<li><a href="#tab-reports" data-toggle="tab">Reports</a></li>
						<li><a href="#tab-templates" data-toggle="tab">Templates</a></li>
					</ul>

					<div class="tab-content">
						<?php 
						include VIEW . 'templates.php';
						include VIEW . 'reports.php';
						include VIEW . 'dashboard.php';
						include VIEW . 'appointments.php';
						include VIEW . 'patients.php';
						?>
					</div>
				</div>
			</div>
		</div>
		<!-- /bordered tab content -->
	</div>
	<!-- /page content -->
</div>
<!-- /page container -->
