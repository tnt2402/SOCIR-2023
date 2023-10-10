<?php session_start();
	$hocki = 'I';
	if(isset($_POST['idhk'])){
		$hocki = $_POST['idhk'];
	}
	include_once('../../../config/config.php');
	if($_SESSION["nhomtk"] > 0)
	{

		$sql = "SELECT * FROM `jp_students` ";
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
		while($row = mysqli_fetch_assoc($qr)){
			$id =  $row["id"];
		    $get = "SELECT * FROM `jp_score` WHERE `ma_sinhvien` = '$id' AND `kithi` = '$hocki'  ";
			$qr1 = mysqli_query($conn, $get);
			$score = mysqli_fetch_assoc($qr1);
			if($score['pass'] == 1){
				$stt = "Passed";
			}else {
				$stt = "Failure";
			};
			?>
			<tr>
				<td><?php echo $row["id"]?></td>
				<td><img src="<?php echo $url.$row["photo"]?>" alt="Girl in a jacket" width="24" height="24"></td>
				<td><?php echo $row["fullName"]?></td>
				<td><?php echo date('m/d/Y', $score['ngaythi']);?></td>
				<td><?php echo $score["hinhthuc"]?></td>
				<td><?php echo $hocki?></td>

				<td><?php echo $score["level"]?></td>
				<td><?php echo $score["score"]?></td>
				<td><?php echo $stt?></td>
				<td align="center">
					<button sua="<?php echo $row["id"]?>" kithi="<?php echo $hocki?>" class="btn btn-warning btn-xs" id="sua" title="Sửa"><span class="glyphicon glyphicon-edit"></span>
					</button>
						<button xoa="<?php echo $row["id"]?>" class="btn btn-danger btn-xs" id="xoa" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
						</button>
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
			 var kithi = $(this).attr('kithi');
 			$.ajax({
 				url: 'xu-ly/sinh-vien/du-lieu-sua-n.php',
 				type: 'POST',
 				dataType: 'HTML',
 				data: {id: id, kithi: kithi},
 				success: function(data){
 					$('#noidungsua').html(data);
 				}
 			});
 			
 		});
</script>
<?php	}
	else {}
 ?>