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
			<div class="col-md-4 col-md-offset-4">
			    <div class="panel panel-default" style="margin-top: 25vh">
                    <div class="panel-body">
        				<h1 class="text-center text-muted text-condensed">Welcome.</h1>
        				<form id="form-login" action="<?php echo URL?>users/login" method="POST">
        				    <div class="form-group">
        				        <input type="text" class="form-control" name="username" placeholder="Your username" required>
        				    </div>
        				    <div class="form-group">
        				        <input type="password" class="form-control" name="password" placeholder="Your password" required>
        				    </div>
        				    <div class="text-right">
        				        <button type="submit" class="btn bg-purple-400 btn-raised btn-rounded"><i class="icon-enter position-left"></i>Login</button>
        				    </div>
        				</form>
        			</div>
        		</div>
			</div>
		</div>
		<!-- /bordered tab content -->
	</div>
	<!-- /page content -->
</div>
<!-- /page container -->
