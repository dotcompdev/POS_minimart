// $(document).ready(function () {
// 	load_data();

// 	function load_data(query) {
// 		$.ajax({
// 			url: "<?= base_url(); ?>/Gudang/fetch",
// 			method: "POST",
// 			data: { query: query },
// 			success: function (data) {
// 				$("#container").html(data);
// 			},
// 		});
// 	}

// 	$("#table_search").keyup(function () {
// 		var search = $(this).val();
// 		if (search != "") {
// 			load_data(search);
// 		} else {
// 			load_data();
// 		}
// 	});
// });

// sum total transaksi
var table = document.getElementById("nilai"),
	sumHsl = 0,
	sumDiskon = 0;
for (var t = 1; t < table.rows.length; t++) {
	sumHsl = sumHsl + parseInt(table.rows[t].cells[5].innerHTML);
	sumDiskon = sumDiskon + parseInt(table.rows[t].cells[4].innerHTML);
}
document.getElementById("hasil").innerHTML = sumHsl;
document.getElementById("total").value = sumHsl;
document.getElementById("total_diskon").value = sumDiskon;
