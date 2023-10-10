<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id_student"];
	$kithi = $_POST["kithi"];
    $sql = "SELECT * FROM `jp_score` WHERE `ma_sinhvien` = $id AND `kithi` = '$kithi'";
	$qr = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($qr);
    
    $sql1 = "SELECT * FROM `jp_students` WHERE `id` = $id";
    $qr1 = mysqli_query($conn, $sql1);
    $info = mysqli_fetch_assoc($qr1);



 ?>

<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<input type="text" id="idsv" value="<?php echo $id?>" style="display: none">
		Mã Sinh Viên:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    	<span class="glyphicon glyphicon-barcode"></span>
		    </div>
		    <input class="form-control" id="masv" type="text" placeholder="Mã sinh viên..." value="<?php echo $id?>" style="color:#000" disabled>
		    </div>
	    </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		type:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-user"></span>
		    </div>
		    <input class="form-control" id="type" type="text" placeholder="Cách thức thi..." value="<?php echo $row["type"]?>" autofocus="autofocus" >
		    </div>
	    </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Name:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-user"></span>
		    </div>
		    <input class="form-control" style="color: black" id="name" type="text" placeholder="Họ tên sinh viên..." value="<?php echo $info["fullName"]?>" autofocus="autofocus" disabled>
		    </div>
	    </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	Kì thi:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-ok"></span>
		    </div>
		    <input class="form-control" id="kithi" type="text" placeholder="Kì thi..." value="<?php echo $kithi?>" autofocus="autofocus" >
		    </div>
	    </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Level:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-ok"></span>
		    </div>
		    <input class="form-control" id="level" type="text" placeholder="Level..." value="<?php echo $row["level"]?>" autofocus="autofocus" >
		    </div>
	    </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Score:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-ok"></span>
		    </div>
		    <input class="form-control" id="score" type="text" placeholder="Score..." value="<?php echo $row["score"]?>" autofocus="autofocus" >
		    </div>
	    </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Trang thai:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-ok"></span>
		    </div>
		    <input class="form-control" id="status" type="text" placeholder="Họ tên sinh viên..." value="<?php echo '1'?>" autofocus="autofocus" >
		    </div>
	    </div>
	</div>
	
	
	

	

	
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Mật khẩu cấp 2:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-saved"></span>
		    </div>
		    <input class="form-control" id="mk2" type="text" placeholder="Nhập mật khẩu..." value="" autofocus="autofocus" >
		    </div>
	    </div>
	</div>
	</div>
	

</div>

<script>
	


/*== Hiển Thị Học Kỳ ==*/


/*== Hiển Thị Môn Học ==*/


/*== Thêm Sinh Viên ==*/
$(document).ready(function() {
	$('#suasinhvien').click(function(event) {
		$.ajax({
			url: 'xu-ly/sua-sinh-vien-n.php',
			type: 'POST',
			dataType: 'HTML',
			data: {
				idsv: $('#idsv').val(),
				mk2: $('#mk2').val(),
				type: $('#type').val(),
				kithi: $('#kithi').val(),
				status: $('#status').val(),
				level: $('#level').val(),
                score: $('#score').val(),
				
			},
		success: function(data){
			$('#thongbaothem').html(data);
		}
		});
		
	});
});
</script>