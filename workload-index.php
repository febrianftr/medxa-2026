<?php
require '../koneksi/koneksi.php';
require 'default-value.php';
require '../model/query-base-workload.php';
require '../model/query-base-order.php';
require '../model/query-base-study.php';
require '../model/query-base-patient.php';

$level = $_SESSION['level'];
$http_referer = $_SERVER['HTTP_REFERER'] ?? '';
$explode = explode('/', $http_referer);
$queryphp = in_array("query.php", $explode);

$query = "SELECT COUNT(*) AS total
FROM $table_study
JOIN $table_workload
ON study.study_iuid = xray_workload.uid ";

// total studies
$total = mysqli_fetch_assoc(mysqli_query(
	$conn_pacsio,
	$query . 'WHERE DATE(study_datetime) = CURRENT_DATE()'
));

// total waiting
$waiting = mysqli_fetch_assoc(mysqli_query(
	$conn_pacsio,
	$query . 'WHERE DATE(study_datetime) = CURRENT_DATE() AND status = "waiting"'
));

// total approved
$approved = mysqli_fetch_assoc(mysqli_query(
	$conn_pacsio,
	$query . ' WHERE DATE(approved_at) = CURRENT_DATE() AND status = "approved"'
));
?>
<!-- <style>
	#purchase_order tbody tr {
		cursor: pointer;
	}

	#purchase_order tbody tr:hover {
		background-color: #7fcbbb !important;
	}
</style> -->
<div class="col-12" style="padding: 0;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active"></li>
		</ol>
	</nav>
</div>

<style>
	/* Custom Card Style */
	.dash-card {
		background: linear-gradient(0deg, #09090b 0%, #1c1c1c 100%);
		border-radius: 24px;
		padding: 20px;
		color: #ffffff;
		transition: transform 0.2s ease, box-shadow 0.2s ease;
		position: relative;
		overflow: hidden;
	}

	/* Judul Card */
	.dash-card-title {
		color: #a0a5b5;
		/* Warna teks abu-abu redup */
		font-size: 0.95rem;
		font-weight: 500;
	}

	/* Ikon Tiga Titik Options */
	.dash-card-more {
		color: #a0a5b5;
		width: 22px;
	}

	.dash-card-more:hover {
		color: #ffffff;
	}

	/* Angka Utama */
	.dash-card-value {
		font-size: 2rem;
		font-weight: 700;
		letter-spacing: 0.5px;
		margin-bottom: 12px;
	}

	/* Teks Sub/Tren Keterangan */
	.dash-card-sub {
		color: #a0a5b5;
		font-size: 0.85rem;
		display: flex;
		align-items: center;
		gap: 6px;
	}

	.dash-card-sub i {
		font-size: 0.9rem;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 mb-3">
			<div class="dash-card">
				<div class="d-flex justify-content-between align-items-center mb-3">
					<span class="dash-card-title">Total Today Studies</span>
					<img class="dash-card-more" src="../image/new/users.svg">
					<!-- <i class="fas fa-ellipsis-h dash-card-more"></i> -->
				</div>
				<div class="dash-card-value"><?= $total['total'] ?></div>
				<!-- <div class="dash-card-sub">
					<i class="fas fa-chart-line"></i>
					<span>+2% from last quarter</span>
				</div> -->
			</div>
		</div>

		<div class="col-md-4 mb-3">
			<div class="dash-card">
				<div class="d-flex justify-content-between align-items-center mb-3">
					<span class="dash-card-title">Today Approved</span>
					<img class="dash-card-more" src="../image/new/checkmark.svg">
					<!-- <i class="fas fa-ellipsis-h dash-card-more"></i> -->
				</div>
				<div class="dash-card-value"><?= $approved['total']; ?></div>
				<!-- <div class="dash-card-sub">
					<i class="fas fa-chart-line"></i>
					<span>+15% from last quarter</span>
				</div> -->
			</div>
		</div>

		<div class="col-md-4 mb-3">
			<div class="dash-card">
				<div class="d-flex justify-content-between align-items-center mb-3">
					<span class="dash-card-title">Today Waiting</span>
					<img class="dash-card-more" src="../image/new/waiting.svg">
					<!-- <i class="fas fa-ellipsis-h dash-card-more"></i> -->
				</div>
				<div class="dash-card-value"><?= $waiting['total']; ?></div>
				<!-- <div class="dash-card-sub">
					<i class="fas fa-chart-line"></i>
					<span>+2% from last quarter</span>
				</div> -->
			</div>
		</div>
	</div>
</div>

<div class="table-view">
	<div class="col-md-12 table-box" style="overflow-x:auto;  position: relative;  padding-top: 50px; height: 300vh;">
		<?php require_once 'formsearch.php'; ?>
		<table class="table-dicom" id="purchase_order" style="width: 2400px;" cellpadding="8" cellspacing="0">
			<thead class="thead1">
				<?php require 'thead.php'; ?>
			</thead>
		</table>
		<!-- <div id="imagePreview" style="margin-top:20px;"></div> -->
	</div>
</div>
<?php require 'modal.php'; ?>
<script src="js/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.datetimepicker.full.js"></script>
<script>
	$('#from_study_datetime').datetimepicker({
		format: 'd-m-Y H:i',
		allowTimes: ['00:00',
			'01:00',
			'02:00',
			'03:00',
			'04:00',
			'05:00',
			'06:00',
			'07:00',
			'08:00',
			'09:00',
			'10:00',
			'11:00',
			'12:00',
			'13:00',
			'14:00',
			'15:00',
			'16:00',
			'17:00',
			'18:00',
			'19:00',
			'20:00',
			'21:00',
			'22:00',
			'23:00',
			'23:59'
		]
	});
	$('#to_study_datetime').datetimepicker({
		format: 'd-m-Y H:i',
		allowTimes: ['00:00',
			'01:00',
			'02:00',
			'03:00',
			'04:00',
			'05:00',
			'06:00',
			'07:00',
			'08:00',
			'09:00',
			'10:00',
			'11:00',
			'12:00',
			'13:00',
			'14:00',
			'15:00',
			'16:00',
			'17:00',
			'18:00',
			'19:00',
			'20:00',
			'21:00',
			'22:00',
			'23:00',
			'23:59'
		]
	});
</script>
<script>
	$(document).ready(function() {
		$(document).keypress(function(e) {
			var keycode = (e.keycode ? e.keycode : e.which);
			if (keycode == '13') {
				properties_data()
			}
		});

		$(document).on('click', '.cboxtombol', function() {
			$('.cbox').prop('checked', this.checked);
		});

		var datatable = null;

		fetch_data('no');

		function fetch_data(is_date_search = 'yes', from_study_datetime = '', to_study_datetime = '', mods_in_study = '', pat_name = '', mrn = '', patientid = '', fill = '') {
			datatable =
				$('#purchase_order').DataTable({
					"processing": true,
					"serverSide": true,
					"order": [],
					"searching": false,
					"ajax": {
						url: "../prosescari.php",
						type: "POST",
						data: {
							is_date_search: is_date_search,
							from_study_datetime: from_study_datetime,
							to_study_datetime: to_study_datetime,
							mods_in_study: mods_in_study,
							pat_name: pat_name,
							mrn: mrn,
							patientid: patientid,
							fill: fill
						}
					},
				});

			// ⬇️ Event klik row
			$('#purchase_order tbody').off('click').on('click', 'tr', function() {

				var data = datatable.row(this).data();

				if (!data) return;

				// Kolom ke-15
				var col15 = data[15];

				// Parse ke jQuery
				var parsed = $(col15);

				var studyUID = parsed.data("id");

				// Kirim UID ini ke API DICOM / thumbnail
				// loadImageFromAPI(studyUID);
			});
		}

		// function loadImageFromAPI(studyUID) {

		// 	$("#imagePreview").html("<p style='color:white'>Loading image...</p>");

		// 	//! JIKA MENGGUNAKAN API DCM4CHEE-ARC / OHIF
		// 	$.ajax({
		// 		url: `http://116.254.118.110:9090/dcm4chee-arc/aets/DCM4CHEE/wado?requestType=WADO&studyUID=${studyUID}`,
		// 		type: "GET",
		// 		xhrFields: {
		// 			responseType: 'blob' // penting untuk image binary
		// 		},
		// 		success: function(data, status, xhr) {

		// 			// ⬇️ Ambil content type dari header
		// 			var contentType = xhr.getResponseHeader("Content-Type");
		// 			console.log("Content-Type:", contentType);

		// 			// ⬇️ Jika API mengembalikan image (png/jpg/jpeg)
		// 			if (contentType && contentType.startsWith("image/")) {

		// 				// Convert blob ke URL
		// 				var imgURL = URL.createObjectURL(data);

		// 				$("#imagePreview").html(
		// 					'<img src="' + imgURL + '" style="max-width:300px;border:1px solid #666;border-radius:8px;">'
		// 				);

		// 			} else {
		// 				$("#imagePreview").html("<p style='color:red'>Response is not an image.</p>");
		// 			}
		// 		},

		// 		error: function() {
		// 			$("#imagePreview").html("<p style='color:red'>Failed to load image.</p>");
		// 		}
		// 	});

		// 	//! JIKA MENGGUNAKAN API DCM4CHEE / HTML
		// 	// $("#imagePreview").html(`<img src="http://116.254.118.110:19898/wado?requestType=WADO&studyUID=1.2.40.0.13.1.523882.20251129.33694003615&seriesUID=1.2.276.0.7230010.3.0.3.5.1.15641797.320140028&objectUID=1.2.276.0.7230010.3.0.3.5.1.15641797.3778521787" style="max-width:300px;border:1px solid #666;border-radius:8px;">`);
		// }

		function properties_data() {
			var from_study_datetime = $('#from_study_datetime').val();
			var to_study_datetime = $('#to_study_datetime').val();
			var pat_name = $('#pat_name').val();
			var mrn = $('#mrn').val();
			var mods_in_study = get_filter('checkbox');
			var patientid = $('#patientid').val();
			var fill = $('#fill').val();
			if (from_study_datetime != '' && to_study_datetime != '') {
				$('#purchase_order').DataTable().destroy();
				fetch_data('yes', from_study_datetime, to_study_datetime, mods_in_study, pat_name, mrn, patientid, fill);
			} else {
				alert("Please Select Date");
			}
		}

		$('#range').click(function() {
			properties_data()
		});

		function get_filter(class_name) {
			var filter = [];
			$('#' + class_name + ':checked').each(function() {
				filter.push($(this).val());
			});
			return filter;
		}
		$('.common_selector').click(function() {
			$('#purchase_order');
		});
	});
</script>
<!-- ------------------hide search di tables--------------------- -->
<script>
	$(document).ready(function() {
		$(".dataTables_filter").hide();
	});
</script>
<!-- ----------------------hide search di tables------------------------ -->