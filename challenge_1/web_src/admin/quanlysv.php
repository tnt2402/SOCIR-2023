<?php include_once('../config/config.php');
 session_start();
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
		 ?>

			<div style="padding-top: 55px" class="caption">
			Quản Lý Sinh Viên
			</div>
			<hr>
			<div class="input-group form-group">
			<input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm sinh viên..">

      </span>
    </div>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>ID</th>
						<th>Photo</th>
						<th>ID Student</th>
						<th>Full name</th>
						<!-- <th>Valuer</th>
						<th>Reaction</th>
						<th>Memory..</th>
						<th>Pragmatic</th>
						<th>communication</th>
						<th>Concentration</th>
						<th>Attitude</th>
						<th>Planability</th>
						<th>Health</th>
						<th>Total</th>
						<th>Conscious attitude</th>
						<th>Health condition</th>
						<th>Act</th> -->
						<th>Username</th>
						<th>Email</th>
						<th>Phone</th>
					</tr>
					<tbody id="hienthidulieulop">
					</tbody>
				</table>
			</div>

<!-- Start Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">SỬA THÔNG TIN SINH VIÊN</h4>
      </div>
      <div class="modal-body">
       <div id="noidungsua"></div>
      </div>
      <div class="modal-footer" style="text-align: center;">
      	<div id="thongbaothem"></div>
        <button type="button" id="suasinhvien" class="btn btn-primary">CẬP NHẬT</button>
      </div><br>
    </div>
  </div>
</div>
<!-- End Modal -->


<?php } ?>
<script>
	function get_data(){
 	$(document).ready(function() {
 		$('a#quanlysv').addClass('chon');
 		$('a#themsv').removeClass('chon');
 		$('a#bangdk').removeClass('chon');
 		$('a#quanlykhoa').removeClass('chon');

			 $.get('xu-ly/sinh-vien/du-lieu-lop.php', function(data) {
				$('#hienthidulieulop').html(data);
			});
			 

			

		$.get('xu-ly/sinh-vien/du-lieu-lop.php',{id: ""}, function(data) {
			$('#hienthidulieulop').html(data);
		});
	 })}
	 var x = setInterval(get_data, 1000);
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
	var value = $(this).val().toLowerCase();
	clearInterval(x);

    $("#hienthidulieulop tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 </script>