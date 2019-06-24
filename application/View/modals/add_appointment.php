<div id="modal-add-appointment" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Add Appointment</h5>
			</div>

			<div class="modal-body">

				<form method="POST" id="form-add-appointment" action="<?php echo URL?> appointments/add">

					<input type="hidden" name="patient_id" required>
					<input type="hidden" name="cellphone">
					
					<div class="form-group">
						<span class="control-label text-semibold">Name:</span>
						<input type="text" class="form-control typeahead-remote" name="name">
					</div>

					<div class="form-group">
						<span class="control-label text-semibold">Date of Appointment:</span>
						<input type="date" class="form-control" name="date" required>
					</div>

					<div class="form-group">
						<span class="control-label text-semibold">Time of Appointment:</span>
						<input type="time" class="form-control" name="time" required>
					</div>

					<div class="form-group">
						<span class="control-label text-semibold">Appointment Details:</span>
						<textarea class="form-control" name="title" rows="2" required></textarea>
					</div>
					<button type="submit" class="btn bg-purple-400 btn-block" disabled="true" id="button-save-appointment"><i class="icon-floppy-disk position-left"></i>Save changes</button>
					<button type="button" class="btn btn-link btn-block" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
