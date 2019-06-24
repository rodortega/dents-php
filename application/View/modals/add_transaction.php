<div id="modal-add-transaction" class="modal fade" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center hidden-print" id="add-transaction-text-fullname"></h5>
			</div>
			<div class="modal-body">

				<div class="row">
					<div class="col-md-2">
						<div class="panel panel-body border-purple-400 hidden-print">
							<span class="text-semibold text-purple-400">Add Dental Record</span>
							<form method="POST" id="form-add-transaction" action="<?php echo URL . 'transaction/add'?>">

								<input type="hidden" id="input-patient-id" name="patient_id" value="" required>

								<div class="form-group mt-20">
									<span class="control-label text-semibold">Date:</span>
									<input type="date" name="date_created" class="form-control" required>
								</div>

								<div class="form-group">
									<span class="control-label text-semibold">Tooth Number:</span>
									<input type="number" name="tooth_number" min="0" max="32" id="input_tooth_number" class="form-control" required>
								</div>

								<div class="form-group">
									<span class="control-label text-semibold">Treatment:</span>
									<select name="treatment_id" class="form-control" required>
										<option value="">Select Transaction</option>
										<option value="EXO">EXO</option>
										<option value="LC">LC</option>
										<option value="ODONTEC">ODONTEC</option>
										<option value="RPD">RPD</option>
										<option value="FPD">FPD</option>
										<option value="OP">OP</option>
										<option value="TF">TF</option>
										<option value="GI">GI</option>
										<option value="ADJUSTMENT">ADJUSTMENT</option>
										<option value="CONSULTATION">CONSULTATION</option>
										<option value="FLEXITE">FLEXITE</option>
										<option value="CD">CD</option>
										<option value="RETAINER">RETAINER</option>
										<option value="U/L BRACE">U/L BRACE</option>
										<option value="U BRACE">U BRACE</option>
										<option value="L BRACE">L BRACE</option>
										<option value="TOOTH WHITENING">TOOTH WHITENING</option>
									</select>
								</div>

								<div class="form-group">
									<span class="control-label text-semibold">Total:</span>
									<input name="total" type="number" min="0" placeholder="0" class="form-control" required>
								</div>

								<div class="form-group">
									<span class="control-label text-semibold">Down:</span>
									<input name="payment" type="number" min="0" placeholder="0" class="form-control" required>
								</div>
								<div class="text-right">
									<button type="submit" class="btn bg-purple-400 btn-block"><i class="icon-plus-circle2 position-left"></i>Add Record</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-10">
						<div class="visible-print-block text-center">
							<h1><!-- <img src="assets/images/logo.jpg" height="50"> -->Faller Dental Clinic</h1>
							<span>#60 F. Benito Avenue, Barangay Langgam, San Pedro Laguna </span><br>
							<span>Telephone: (02) 533-0422</span><br>
							<span>Cellphone: 09163341496, 09196210120</span><br><br><br>
						</div>
						<div class="visible-print-block" id="div-add-transaction-print">
							
						</div>
						<table class="table table-framed table-xs">
							<thead>
								<tr>
									<th>Tooth #</th>
									<th>Treatment</th>
									<th>Total</th>
									<th>Date</th>
									<th>Down</th>
									<th>Balance</th>
									<th class="hidden-print">Action</th>
								</tr>
							</thead>
							<tbody id="tbody-add-transaction">
								
							</tbody>
						</table>
						<div class="text-right mt-20">
							<button type="button" class="btn btn-flat border-slate hidden-print" onclick="window.print()"><i class="icon-printer2 position-left"></i> Print</button>
							<button type="button" class="btn btn-flat border-slate hidden-print" id="button-finish-transaction"><i class="icon-check position-left"></i>Finish</button>
						</div>
					</div>
				</div>
				<div class="clearfix">
				</div>
			</div>	
		</div>
	</div>
</div>