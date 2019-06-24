<div class="tab-pane has-padding hidden-print" id="tab-patients">
	<div class="row">
		<div class="col-md-6">
			<button type="button" class="btn btn-success btn-raised btn-rounded" data-toggle="modal" data-target="#modal-add-patient"><i class="icon-user-plus position-left"></i>Add Patient</button>
		</div>
		<div class="col-md-6">
			<form method="POST" id="form-search-patient" action="<?php echo URL . 'patients/search'?>">
				<div class="form-group">
					<input type="text" placeholder="Name" name="name" class="form-control" required>
				</div>			
				<div class="text-right">
					<button type="submit" class="btn btn-primary btn-raised btn-rounded"><i class="icon-search4 position-left"></i>Search</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mb-10">
			<span class="text-semibold mb-20"><i class="icon-search4 position-left"></i>Search Results</span>
		</div>
		<div class="row" id="panel-search-patient-result">
			
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<template id="template-patients-result">
  <div class="col-md-4">
		<div class="panel panel-body clickable" onclick="viewPatient(this.getAttribute('data-id'));">
			<div class="media">
				<div class="media-left">
					<img src="" class="img-lg rotated-xs" alt="">
				</div>

				<div class="media-body">
					<h6 class="media-heading text-semibold text-purple-400"></h6>
					<span class="text-muted"></span>
				</div>
			</div>
		</div>
	</div>
</template>