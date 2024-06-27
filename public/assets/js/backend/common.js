//to hide flash message
$("document").ready(function () {
	$(".alert[role='alert']").fadeTo(2000, 500).slideUp(500, function () {
		$(".alert[role='alert']").slideUp(5000);
	});

});


var Global = function () {
	var setGlobalPlugin = function () {
		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});
	};

	var initConfirmationOnDelete = function () {

		$('body').on('click', '.delete-confirmation-button', function (event) {
		    event.preventDefault();
			var deleteUrl = $(this).attr('href');
			console.log(deleteUrl)
			/* Act on the event */
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#34c38f",
                    cancelButtonColor: "#ff3d60",
                    confirmButtonText: "Yes, delete it!"
                }).then(function (result) {
                    if (result.value) {
                        submitDeleteResourceForm(deleteUrl);
                        Swal.fire("Deleted!", "Your file has been deleted.", "success");
                    }
                }, function (dismiss) {
                });
		});
	};

	var submitDeleteResourceForm = function (deleteUrl) {
		$('<form>', {
			'method': 'POST',
			'action': deleteUrl,
			'target': '_top'
		})
			.append($('<input>', {
				'name': '_token',
				'value': $('meta[name="csrf-token"]').attr('content'),
				'type': 'hidden'
			}))
			.append($('<input>', {
				'name': '_method',
				'value': 'DELETE',
				'type': 'hidden'
			}))
			.hide().appendTo("body").submit();
	}

	return {
		init: function () {
			setGlobalPlugin();
			initConfirmationOnDelete();
		}
	};
}
();

// Initialize when page loads
jQuery(function () {
	Global.init();
});
