<?php session_start();
	include_once('../../../config/config.php');
	if($_SESSION["nhomtk"] > 0)
	{

		$sql = "SELECT * FROM `jp_homeworks` ";
		$qr = mysqli_query($conn, $sql);

	 if(mysqli_num_rows($qr) == 0)
		{ ?><tr>
			<td colspan="8">
			<div class="alert alert-info fade in" role="alert">
		      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		      	<strong>ERROR!</strong> Lớp <strong><?php echo $id;?></strong> hiện chưa có bài tập nào!.
	    	</div>
	    	</td>
	    	</tr>
		<?php }
		else
		{
		while($row = mysqli_fetch_assoc($qr)){ ?>
			<tr>
				<td><?php echo $row["id"]?></td>
				<td><?php echo $row["category"]?></td>
				<td><?php echo $row["name"]?></td>
				<td><?php echo $row["start_time"]?></td>
				<td><?php echo $row["end_time"]?></td>
				<td><?php echo $row["teacher"]?></td>
				<td><?php echo $row["status"]?></td>
				
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
 			var xoa = confirm("Bạn có thực sự muốn xóa bài tập: "+id+" ?");
			if (xoa == true) {
			    $.ajax({
			    	url: 'xu-ly/bai-tap/xoa-bai-tap.php',
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
 				url: 'xu-ly/bai-tap/du-lieu-sua.php',
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