<?php session_start();
	include_once('../../../config/config.php');
	if($_SESSION["nhomtk"] > 0)
	{

		// $sql = "SELECT * FROM `jp_students` ";
		$sql = "SELECT jp_students.*, tai_khoan.* FROM jp_students JOIN tai_khoan ON jp_students.id = tai_khoan.id_tai_khoan";
		$qr = mysqli_query($conn, $sql);

	 if(mysqli_num_rows($qr) == 0)
		{ ?><tr>
			<td colspan="8">
			<div class="alert alert-info fade in" role="alert">
		      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		      	<strong>ERROR!</strong> Lớp <strong><?php echo $id;?></strong> hiện chưa có sinh viên nào!.
	    	</div>
	    	</td>
	    	</tr>
		<?php }
		else
		{
		while($row = mysqli_fetch_assoc($qr)){ ?>
			<tr>
				<td><?php echo $row["id"]?></td>
				<td><img src="<?php echo $url.$row["photo"]?>" alt="Girl in a jacket" width="24" height="24"></td>
				<td><?php echo $row["id_student"]?></td>
				<td><?php echo $row["fullName"]?></td>
				<!-- <td><?php echo $row["valuer"]?></td>
				<td><?php echo $row["point_Reaction"]?></td>
				<td><?php echo $row["point_Memorization"]?></td>
				<td><?php echo $row["point_Pragmatic"]?></td>
				<td><?php echo $row["point_communication"]?></td>
				<td><?php echo $row["point_Concentration"]?></td>
				<td><?php echo $row["point_Attitude"]?></td>
				<td><?php echo $row["point_Planability"]?></td>
				<td><?php echo $row["point_Health"]?></td>
				<td><?php echo $row["point_Total"]?></td> -->
				
				<td><?php echo $row["ten_tai_khoan"]?></td>
				<!-- <td><?php echo $row["mat_khau"]?></td> -->
				<td><?php echo $row["email"]?></td>
				<td><?php echo $row["sdt"]?></td>
				<!-- <td><?php echo $row["mk2"]?></td> -->

				<!-- <td><textarea style="background-color: black;color:#fff;"><?php echo $row["cmt_1"]?></textarea></td>
				<td><textarea style="background-color: black;color:#fff;"><?php echo $row["cmt_2"]?></textarea></td> -->
				<td align="center">
					<button sua="<?php echo $row["id"]?>" class="btn btn-warning btn-xs" id="sua" title="Sửa"><span class="glyphicon glyphicon-edit"></span>
					</button>
						<button xoa="<?php echo $row["id"]?>" class="btn btn-danger btn-xs" id="xoa" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
						</button>
				</td>
			</tr>
		<?php }} ?>
		<script>
	$('button#xoa').click(function(event) {
 			var id = $(this).attr('xoa');
 			var xoa = confirm("Bạn có thực sự muốn xóa sinh viên có MSV: "+id+" ?");
			if (xoa == true) {
			    $.ajax({
			    	url: 'xu-ly/xoa-sinh-vien.php',
			    	type: 'POST',
			    	dataType: 'HTML',
			    	data: {id: id},
			    });
			    alert("Xóa Thành Công!");
			    location.reload();
			}
 		});

 		$('button#sua').click(function() {
 			$('#ModalEdit').modal();
 			var id = $(this).attr('sua');

 			$.ajax({
 				url: 'xu-ly/sinh-vien/du-lieu-sua.php',
 				type: 'POST',
 				dataType: 'HTML',
 				data: {id: id},
 				success: function(data){
 					$('#noidungsua').html(data);
 				}
 			});
 			
 		});
</script>
<?php	}
	else {}
 ?>