<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo TITLE . $page_title ?></title>

	<!-- Global stylesheets -->
	<link href="assets/css/fonts.css" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Custom CSS -->
	<link href="assets/css/faller.css" rel="stylesheet" type="text/css">
	<!-- /Custom CSS -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="assets/js/plugins/visualization/d3/d3.min.js" charset="utf-8"></script>
	<script src="assets/js/plugins/visualization/c3/c3.min.js" charset="utf-8"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/pages/globals.js"></script>
	<script type="text/javascript">
		var url = "<?php echo URL ?>";
		
		var player = new Audio();
		player.src = url + 'assets/notification.mp3';	
	</script>

	<script type="text/javascript" src="assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/inputs/formatter.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/notifications/pnotify.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/ripple.min.js"></script>
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<!-- /theme JS files -->

	<!-- Per-app JS files -->
	<script type="text/javascript" src="assets/js/pages/login.js"></script>
	<script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
	<script type="text/javascript" src="assets/js/pages/appointments.js"></script>
	<script type="text/javascript" src="assets/js/pages/patients.js"></script>
	<script type="text/javascript" src="assets/js/pages/patients_add.js"></script>
	<script type="text/javascript" src="assets/js/pages/patients_search.js"></script>
	<script type="text/javascript" src="assets/js/pages/patients_edit.js"></script>
	<script type="text/javascript" src="assets/js/pages/transaction_add.js"></script>
	<script type="text/javascript" src="assets/js/pages/transaction_delete.js"></script>
	<script type="text/javascript" src="assets/js/pages/reports.js"></script>
	<script type="text/javascript" src="assets/js/pages/templates.js"></script>
	<!-- /Per-app JS files -->

</head>
<body class="layout-boxed">