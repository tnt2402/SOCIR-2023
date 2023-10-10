<?php 
	include_once('../../config/config.php');
	$masv = htmlspecialchars($_POST["masv"]);
	$tensv = htmlspecialchars($_POST["tensv"]);


	
	

	$kiemtra = "SELECT `id` FROM `jp_students` WHERE `id` = '$masv'";
	$chay = mysqli_query($conn, $kiemtra);
	$xem = mysqli_fetch_assoc($chay);

	$sqlmonhoc = "SELECT * FROM `mon_hoc` WHERE `ten_lop` = '$svlop' AND `id_hoc_ky` = '$hk'";
	$qrmonhoc = mysqli_query($conn, $sqlmonhoc);

	if($masv == NULL || $tensv == NULL ){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php }elseif(mysqli_num_rows($chay) > 0){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Mã sinh viên <span style="font-weight:bold;text-transform: uppercase;text-decoration: underline;">
      	<?php echo $xem["ten_tai_khoan"];?>
      	</span> Đã tồn tại, Vui lòng vào <a href="<?=$url?>admin?menu=quanlysv" style="color:#FFF"><strong>QUẢN LÝ SINH VIÊN</strong></a> để cập nhật thông tin.
    	</div>
	<?php } else{
		
	
		$themsv = "INSERT INTO `jp_students` (`id`, `fullName`, `valuer`, `photo`) VALUES ('$masv', '$tensv','Evaluation', 'jp_imgs_students/1/$masv.png')";
		mysqli_query($conn, $themsv);
		$themsv1 = "INSERT INTO `jp_score` (`ma_sinhvien`, `ngaythi`, `pass`, `kithi`) VALUES ('$masv', '1595336868','0', 'I')";
		$themsv2 = "INSERT INTO `jp_score` (`ma_sinhvien`, `ngaythi`, `pass`, `kithi`) VALUES ('$masv', '1595336868','0', 'II')";
		$themsv3 = "INSERT INTO `jp_score` (`ma_sinhvien`, `ngaythi`, `pass`, `kithi`) VALUES ('$masv', '1595336868','0', 'III')";
		mysqli_query($conn, $themsv1);
		mysqli_query($conn, $themsv2);
		mysqli_query($conn, $themsv3);
		
		$duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
		$duoi = $duoi[(count($duoi)-1)];//lấy ra đuôi file
		//Kiểm tra xem có phải file ảnh không
		if($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif'){
			//tiến hành upload
			if(move_uploaded_file($_FILES['file']['tmp_name'], '../../jp_imgs_students/1/' . $masv.'.png')){
				//Nếu thành công
				?>
				<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>Done!</strong> Thêm thành công, Bạn có muốn thêm điểm ngay cho Sinh viên <strong><?php echo $tensv;?></strong> ? <br> <br>
	      	<center>
	      	<button type="button" class="btn btn-success" data-toggle="modal"><a href="<?=$url?>admin/?menu=quanlysv">Thêm điểm SV</a></button>
	      	<button type="button" id="themmoisv" class="btn btn-success">THÊM MỚI SV</button>
	      	</center>
			</div>
			<?php
			} else{ //nếu k thành công
				die('Có lỗi!'); //in ra thông báo
			}
		} else{ //nếu k phải file ảnh
			die('Chỉ được upload ảnh'); //in ra thông báo
		}
		
		
		?>
			

	    	<!-- Modal -->
				<div class="modal fade" id="themdiem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        <h4 class="modal-title" id="myModalLabel">
				        THÊM ĐIỂM SINH VIÊN <strong><?php echo $tensv;?></strong>
				        </h4>
				      </div>
				      <div class="modal-body">
				        	<?php include_once('../them-diem.php'); ?>
				      </div>
				    </div>
				  </div>
				</div>
			<!-- End Modal -->
		<?php } ?>
<script>
	$(document).ready(function() {
		$('#themmoisv').click(function(event) {
			window.location.reload();
		});
	});
</script>