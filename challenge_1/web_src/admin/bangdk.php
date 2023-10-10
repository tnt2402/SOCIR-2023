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
			<div class="list-group-item">
          <div class="form-group hocky">
            <div class="input-group">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
              </div>
                <select id="hockydiem" name="hockydiem" class="form-control">
                <option value="">Chọn Kỳ thi</option>
                  <option value="I">Kỳ 1</option>
                  <option value="II">Kỳ 2</option>
                  <option value="III">Kỳ 3</option>
					  
				</select>
				
		  </div>
		  <div class="alert alert-info fade in" role="alert" id="note">

        </div>
        <hr><br>
			<div class="input-group form-group">
			<input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm sinh viên..">

      </span>
    </div>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>ID</th>
						<th>Photo</th>
						<th>Full name</th>
						<th>Date join</th>
						<th>Type</th>

						<th>Kì thi</th>
						<th>Level</th>
						<th>Điểm</th>
						<th>Trạng thái</th>
						<th>Act</th>
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
	function get_data(hocki){
 	$(document).ready(function() {
 		$('a#quanlysv').addClass('chon');
 		$('a#themsv').removeClass('chon');
 		$('a#bangdk').removeClass('chon');
 		$('a#quanlykhoa').removeClass('chon');

			 $.get('xu-ly/sinh-vien/diemtrinhdo.php', function(data) {
				$('#hienthidulieulop').html(data);
			});
			 

			

		//$.get('xu-ly/sinh-vien/diemtrinhdo',{id: ""}, function(data) {
		//$('#hienthidulieulop').html(data);
	//	});
	 })}
	 var x = setInterval(get_data, 1000);
	 //chọn kì 
	 $(document).ready(function() {
     $('#hockydiem').change(function(event) {
      $('#note').hide();
	  clearInterval(x);

      var idhk = $(this).val();
       $.ajax({
         url: '<?=$url?>admin/xu-ly/sinh-vien/diemtrinhdo.php',
         type: 'POST',
         dataType: 'HTML',
         data: {
          idhk: idhk,

        },
       success: function(data){
		$('#hienthidulieulop').html(data);
       }
       });
       
     });
   });
//search 

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