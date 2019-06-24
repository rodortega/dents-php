<div id="modal-view-patient" class="modal fade hidden-print" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4">
					    <div class="thumb">
							<img src="" id="view-patient-image-profile" class="rotated">
						</div>
						<h3 id="view-patient-text-fullname"></h3>
						<span class="display-block mb-10"><i class="icon-gift position-left"></i><span class="text-semibold" id="view-patient-text-birthdate"></span></span>
						<span class="display-block mb-10"><i class="icon-pin position-left"></i><span class="text-semibold" id="view-patient-text-address"></span></span>
						<span class="display-block mb-10"><i class="icon-mobile position-left"></i><span class="text-semibold" id="view-patient-text-cellphone"></span></span>
						<span class="display-block mb-10"><i class="icon-briefcase position-left"></i><span class="text-semibold" id="view-patient-text-occupation"></span></span>
						<button class="btn btn-block btn-primary" id="view-patient-button-edit"><i class="icon-pencil position-left"></i>Edit Profile</button>
						<button class="btn btn-block bg-purple-400" id="view-patient-button-add"><i class="icon-plus-circle2 position-left"></i>Add Transaction</button>
						<button class="btn btn-block btn-default" data-dismiss="modal">Close</button>
					</div>
				    <div class="col-md-8">
				        <?php include 'toothchart.php' ?>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>