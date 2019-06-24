<div id="modal-add-patient" class="modal fade" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Add Patient</h5>
			</div>

			<div class="modal-body">
				<form method="POST" id="form-add-patient" action="<?php echo URL . 'patients/add'?>">
					<div class="form-group">
						<span class="control-label text-semibold">First Name:</span>
						<input type="text" name="firstname" class="form-control" required>
					</div>

					<div class="form-group">
						<span class="control-label text-semibold">Last Name:</span>
						<input type="text" name="lastname" class="form-control" required>
					</div>

					<div class="form-group">
						<span class="control-label text-semibold">Birthdate:</span>
						<input type="date" min="1900-01-01" max="2020-01-01" name="birthdate" class="form-control" required>
					</div>

					<div class="form-group">
						<span class="control-label text-semibold">Address:</span>
						<textarea class="form-control" name="address" rows="2" required></textarea>
					</div>

					<div class="form-group">
						<span class="control-label text-semibold">Mobile Phone:</span>
						<input type="text" maxlength="11" minlength="11" name="cellphone" class="form-control" required>
					</div>

					<div class="form-group">
						<span class="control-label text-semibold">Occupation:</span>
						<input type="text" name="occupation" class="form-control">
					</div>

					<div class="form-group hidden">
						<span class="control-label text-semibold display-block">Gender:</span>
						<label class="radio-inline">
							<input type="radio" name="gender" class="styled" checked="checked" value="m">
							Male
						</label>

						<label class="radio-inline">
							<input type="radio" name="gender" class="styled" value="f">
							Female
						</label>
					</div>
					<button type="submit" class="btn btn-block bg-purple-400"><i class="icon-floppy-disk position-left"></i>Save changes</button>
				</form>
			</div>
		</div>
	</div>
</div>