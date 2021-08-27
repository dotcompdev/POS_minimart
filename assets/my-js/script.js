// $(document).ready(function () {
// 	load_data();

// 	function load_data(query) {
// 		$.ajax({
// 			url: "<?php echo base_url(); ?>Supervisor/fetch",
// 			method: "POST",
// 			data: { query: query },
// 			success: function (data) {
// 				$("#tabelPegawai").html(data);
// 			},
// 		});
// 	}

// 	$("#keywordPegawai").keyup(function () {
// 		var search = $(this).val();
// 		if (search != "") {
// 			load_data(search);
// 		} else {
// 			load_data();
// 		}
// 	});
// });

// SWEET ALERT--------------------------------------------------------------------
$(".toastsDefaultSuccess").click(function () {
	$(document).Toasts("create", {
		class: "bg-success",
		title: "Toast Title",
		subtitle: "Subtitle",
		body: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr.",
	});
});
