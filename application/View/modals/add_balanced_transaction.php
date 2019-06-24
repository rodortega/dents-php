<div id="modal-add-balanced-transaction" class="modal fade" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Add Payment</h5>
			</div>
			<div class="modal-body">
				<form method="POST" id="form-add-balanced-transaction" action="<?php echo URL . 'payment/add'?>">

					<input type="hidden" name="transaction_id" required>
					<input type="hidden" name="balance" required>
					<input type="hidden" name="previous_payment_id" required>

					<div class="form-group">
						<span class="control-label text-semibold">Payment:</span>
						<input type="number" name="payment" class="form-control" required>
					</div>

					<div class="form-group">
						<span class="control-label text-semibold">Date:</span>
						<input type="date" name="date_created" class="form-control" required>
					</div>

					<button type="submit" class="btn btn-block bg-purple-400 mb-10"><i class="icon-floppy-disk position-left"></i> Save</button>
				</form>
				<button class="btn btn-block btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>