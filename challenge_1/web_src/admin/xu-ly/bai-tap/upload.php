<?php
// Specify the directory where uploaded files will be stored
$targetDirectory = "homeworks_vault/";

// Handle file uploads
if(isset($_FILES['file'])) {
    // Loop through each uploaded file
    $files = $_FILES['file'];
    $fileCount = count($files['name']);

    for($i = 0; $i < $fileCount; $i++) {
        $fileName = $files['name'][$i];
        $fileTmpPath = $files['tmp_name'][$i];
        $fileType = $files['type'][$i];
        $fileSize = $files['size'][$i];
        $fileError = $files['error'][$i];

        // Generate a unique file name to avoid conflicts
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid() . '.' . $fileExtension;

        // Set the target path for the uploaded file
        $targetFilePath = $targetDirectory . $newFileName;

        // Move the temporary file to the target location
        if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
            echo 'File "' . $fileName . '" uploaded successfully.<br>';
        } else {
            echo 'Error uploading file "' . $fileName . '".<br>';
        }
    }
}
?>