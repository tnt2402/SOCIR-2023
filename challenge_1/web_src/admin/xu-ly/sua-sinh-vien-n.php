<?php 
	include_once('../../config/config.php');
	session_start();
	$idsv = (int)$_POST["idsv"];
	$mk2 = md5($_POST["mk2"]);
	$type = htmlspecialchars($_POST["type"]);
	$kithi = $_POST["kithi"];
	$status = $_POST["status"];
    $level = $_POST["level"];
    $score = $_POST["score"];

	//$rowkhoa = mysqli_fetch_assoc($qrkhoa);


	if($idsv == NULL || $mk2 == NULL ||$type == NULL ||$kithi == NULL ||$status == NULL || $level == NULL ){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php }
	else
	{	
	    $taikhoan = $_SESSION["taikhoan"];

		$kiemtra = "SELECT * FROM `tai_khoan` WHERE `ten_tai_khoan` = '".$taikhoan."'";
    	$chay = mysqli_query($conn, $kiemtra);
    	$xem = mysqli_fetch_assoc($chay);
		if($mk2 !== $xem['mk2']){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Mật khẩu cấp 2 sai .
		</div>
		
	<?php
			
		}else {
	    $suasv = "UPDATE `jp_score` SET  `hinhthuc` = '$type', `score` = '$score' ,`pass` = '$status',`level` = '$level' WHERE `ma_sinhvien` = $idsv AND `kithi` = '$kithi'";
		mysqli_query($conn, $suasv); ?>

			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>Done!</strong> Sửa thành công cho Sinh viên <strong><?php echo $idsv;?></strong>,<br> <a href="#" id="rfpage" title="Thoát" style="color: #FFF;font-weight: bold;">Đóng.</a>
	    	</div>

		<?php }} ?>
<script>
	$(document).ready(function() {

		$('#rfpage').click(function(event) {
			location.reload();
		});
	});
</script>