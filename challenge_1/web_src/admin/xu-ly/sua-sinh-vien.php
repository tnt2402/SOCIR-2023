<?php
include_once('../../config/config.php');
session_start();
$idsv = (int) $_POST["idsv"];
$mk2 = md5($_POST["mk2"]);
$tensv = htmlspecialchars($_POST["tensv"]);
$nhanxet = htmlspecialchars($_POST["nhanxet"]);
$Reaction = (int) $_POST["Reaction"];
$Memori = (int) $_POST["Memori"];
$Pragmatic = (int) $_POST["Pragmatic"];
$Communication = (int) $_POST["Communication"];
$Concentration = (int) $_POST["Concentration"];
$Attitude = (int) $_POST["Attitude"];
$Planability = (int) $_POST["Planability"];
$Health = (int) $_POST["Health"];

$rowkhoa = mysqli_fetch_assoc($qrkhoa);


if ($tensv == NULL) { ?>
	<div class="alert alert-warning fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
				class="sr-only">Close</span></button>
		<strong>ERROR!</strong> Các trường nhập không được để trống.
	</div>
<?php } else {
	$taikhoan = $_SESSION["taikhoan"];

	$kiemtra = "SELECT * FROM `tai_khoan` WHERE `ten_tai_khoan` = '" . $taikhoan . "'";
	$chay = mysqli_query($conn, $kiemtra);
	$xem = mysqli_fetch_assoc($chay);
	if ($mk2 !== $xem['mk2']) { ?>
		<div class="alert alert-warning fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
					class="sr-only">Close</span></button>
			<strong>ERROR!</strong> Mật khẩu cấp 2 sai .
		</div>

		<?php

	} else {
		$suasv = "UPDATE `jp_students` SET `fullName` = '$tensv', `cmt_1` = '$nhanxet',`point_Reaction` = '$Reaction',`point_Memorization` = '$Memori',`point_Pragmatic` = '$Pragmatic',`point_communication` = '$Communication',`point_Concentration` = '$Concentration',`point_Attitude` = '$Attitude',`point_Planability` = '$Planability',`point_Health` = '$Health' WHERE `id` = $idsv";
		mysqli_query($conn, $suasv); 
		$suasv = "UPDATE `tai_khoan` SET `ten_tai_khoan` = '$ten_tai_khoan', 'email' = '$email', 'sdt' = '$phone' WHERE `id_tai_khoan` = $idsv";
		mysqli_query($conn, $suasv); 

		?>

		<div class="alert alert-success fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
					class="sr-only">Close</span></button>
			<strong>Done!</strong> Sửa thành công cho Sinh viên <strong>
				<?php echo $tensv; ?>
			</strong>,<br> <a href="#" id="rfpage" title="Thoát" style="color: #FFF;font-weight: bold;">Đóng.</a>
		</div>

	<?php }
} ?>
<script>
	$(document).ready(function () {

		$('#rfpage').click(function (event) {
			location.reload();
		});
	});
</script>