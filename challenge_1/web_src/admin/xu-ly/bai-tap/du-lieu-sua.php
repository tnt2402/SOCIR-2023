<?php
include_once('../../../config/config.php');

$id = $_POST["id"];
$sql = "SELECT * FROM `jp_homeworks` WHERE `id` = $id";

$qr = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($qr);

?>

<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<input type="text" id="idsv" value="<?php echo $id ?>" style="display: none">
		Mã bài tập:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-barcode"></span>
				</div>
				<input class="form-control" id="idbaitap" type="text" placeholder="Mã bài tập..."
					value="<?php echo $row["id"] ?>" style="color:#000" disabled>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Tên bài tập:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</div>
				<input class="form-control" id="tenbaitap" type="text" placeholder="Tên bài tập..."
					value="<?php echo $row["name"] ?>" autofocus="autofocus">
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Thời gian bắt đầu:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</div>
				<input class="form-control" id="starttime" type="text" placeholder="Giời gian bắt đầu"
					value="<?php echo $row["start_time"] ?>" autofocus="autofocus">
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Thời gian kết thúc:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</div>
				<input class="form-control" id="endtime" type="text" placeholder="Giời gian kết thúc"
					value="<?php echo $row["end_time"] ?>" autofocus="autofocus">
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Giáo viên tạo:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</div>
				<input class="form-control" id="teacher" type="text" placeholder="" value="<?php echo $row["teacher"] ?>"
					autofocus="autofocus">
			</div>
		</div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Trạng thái:
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				</div>
				<input class="form-control" id="status" type="text" placeholder="" value="<?php echo $row["status"] ?>"
					autofocus="autofocus">
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<?php function getFileIcon($fileType)
		{
			switch ($fileType) {
				case 'pdf':
					return '../images/pdf-icon.png';
				case 'png':
				case 'jpg':
				case 'jpeg':
					return '../images/image-icon.png';
				default:
					return '../images/default-icon.png';
			}
		}
		$uploadedFile = $_FILES[$row["file_path"]]; // Assuming the file input name is 'file' 
		$fileName = $uploadedFile['name'];
		$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
		// Display file icon with link to download/open the file 
		echo '<div class="file-item">';
		echo '<a href="' . $row["file_path"] . '">';
		echo '<img src="' . getFileIcon($fileType) . '" alt="File icon" width="32" height="32">';
		echo '</a>';
		echo '</div>'; ?>
		<style>
			.file-item img {
				cursor: pointer;
			}

			.file-item img:hover {
				opacity: 0.7;
			}
		</style>

		<div class="file-item">
			<form action="xu-ly/bai-tap/upload.php" method="post" enctype="multipart/form-data">
				<input type="file" name="file[]" multiple>
				<input type="submit" value="Upload More" name="submit">
			</form>
		</div>

	<!-- Add JavaScript code -->
	<script>
	// Handle form submission event
	document.querySelector('form').addEventListener('submit', function (event) {
		event.preventDefault(); // Prevent form from submitting normally
		var formData = new FormData(this);

		// Use Fetch API to submit the form data asynchronously
		fetch('xu-ly/bai-tap/upload.php', {
		method: 'POST',
		body: formData
		})
		.then(function (response) {
		// Display the success message
		if (response.ok) {
			alert('File upload successful!');
			// Reset the file input field
			document.querySelector('form').reset();
		} else {
			alert('Error uploading file!');
		}
		})
		.catch(function (error) {
		console.error('Error:', error);
		});
	});
	</script>
		<style>
			.file-item img {
				cursor: pointer;
			}

			.file-item img:hover {
				opacity: 0.7;
			}
		</style>
	</div>



</div>

<div class="form-group">
	Mô tả bài tập:
	<textarea class="form-control box-text" id="desc" placeholder=""><?php echo $row["description"] ?></textarea>
</div>

<script>



	/*== Thêm bài tập ==*/
	$(document).ready(function () {
		$('#suasinhvien').click(function (event) {
			$.ajax({
				url: 'xu-ly/sua-bai-tap.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					name: $('#tenbaitap').val(),
					start_time: $('#starttime').val(),
					end_time: $('#endtime').val(),
				},
				success: function (data) {
					$('#thongbaothem').html(data);
				}
			});

		});
	});
</script>