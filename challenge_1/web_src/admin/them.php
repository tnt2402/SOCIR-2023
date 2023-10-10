<?php session_start();
if($_SESSION["nhomtk"] <2){ ?>
	<div class="alert alert-danger fade in" role="alert" style="max-width:400px;margin:0 auto">
		      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		      <strong>ERROR!</strong> Bạn không đủ quyền để truy cập trang này, trở lại trang chủ sau 3s.
		      <script>
	    	window.setTimeout(function(){window.location.href="../index.php";}, 3000);
	    	</script>
		    </div>
<?php }else {
		include_once('../config/config.php');
		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] < 1){ ?>
		      <script>
	    	window.location.href="../index.php";
	    	</script>
		    </div>
		<?php }else {
		$now = getdate();
		 ?>
<div class="caption">
	Thêm Mới Sinh Viên
</div>
<hr>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
		Mã Sinh Viên:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    	<span class="glyphicon glyphicon-barcode"></span>
		    </div>
		    <input class="form-control" id="masv" type="text" placeholder="Mã sinh viên..." autofocus="autofocus">
		    </div>
	    </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
	<div class="form-group">
						<label for="">Avatar</label>
						<input id="file" type="file" name="sortpic" required="" />
					</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Họ Tên Sinh Viên:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-user"></span>
		    </div>
		    <input class="form-control" id="tensv" type="text" placeholder="Họ tên sinh viên...">
		    </div>
	    </div>
	</div>
	<center>
	<input type="submit" id="them" class="btn btn-success" value="THÊM SINH VIÊN"></input>
</center>

	
	

	

	

	

		

</div>
<div id="thongbaothem"></div>	
<div class="status"></div>

<?php }} ?>
<script>
	$(document).ready(function() {
		$('a#themsv').addClass('chon');
		$('a#bangdk').removeClass('chon');
		$('a#quanlysv').removeClass('chon');
		$('a#quanlykhoa').removeClass('chon');
	});
		$('#them').click(function() {
		var file_data = $('#file').prop('files')[0];
			//lấy ra kiểu file
			var type = file_data.type;
			//Xét kiểu file được upload
			var match= ["image/jpg","image/png","image/jpeg"];
			//kiểm tra kiểu file
			if(type == match[0] || type == match[1] || type == match[2])
			{
				//khởi tạo đối tượng form data
				var form_data = new FormData();
				//thêm files vào trong form data
				form_data.append('file', file_data);
				form_data.append('masv', $('#masv').val());
				form_data.append('tensv', $('#tensv').val());
				//sử dụng ajax post
				$.ajax({
                url: 'xu-ly/them-sinh-vien.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                       
                type: 'post',
                success: function(res){
					$('#thongbaothem').html(res);
                }
            });
			} else{
				$('.status').text('Chỉ được upload file ảnh');
                	$('#file').val('');
			}



	
});
	
</script>