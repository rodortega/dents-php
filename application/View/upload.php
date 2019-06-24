<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Global stylesheets -->
	<link href="<?php echo URL?>assets/css/fonts.css" rel="stylesheet" type="text/css">
	<link href="<?php echo URL?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo URL?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo URL?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo URL?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Custom CSS -->
	<link href="assets/css/faller.css" rel="stylesheet" type="text/css">
	<!-- /Custom CSS -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo URL?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo URL?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo URL?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo URL?>assets/js/plugins/loaders/blockui.min.js"></script>
</head>
<body class="container">
	<h1 class="text-center"><?php echo $patient->firstname . ' ' . $patient->lastname ?></h1>
	<img src="../../<?php echo $patient->picture?>" style="width: 100%;">
	<br><br><br>
	<div class="progress-bar progress-bar-striped" id="progress-bar" style="width: 0%">0%</div>

	<form method="POST" id="form-upload" action="<?php echo URL?>remote/upload" enctype="multipart/form-data">
		<input type="hidden" id="id" name="id" value="<?php echo $patient->id?>">
		<input type="file" id="file" name="file" style="display: none;" onchange="submitForm();">
	</form>
</body>

	<script type="text/javascript">

		$("img").click(function() {
		    $("input#file").click();
		});

		function submitForm(){

			var form = $("#form-upload");
			form.submit();
		}
	</script>
</html>