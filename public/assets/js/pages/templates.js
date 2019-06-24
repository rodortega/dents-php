$(function() {

	$('#select-template').on('change', function(){

		if (this.value == 'waiver') {

			$("#content-waiver").removeClass('hidden');
			$("#content-certification").addClass('hidden');
		}
		else if (this.value == 'certification') {

			$("#content-waiver").addClass('hidden');
			$("#content-certification").removeClass('hidden');
		}
	});
});