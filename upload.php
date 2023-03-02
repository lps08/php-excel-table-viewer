<?php
require_once 'constants.php';
require_once 'tablesheet_reader.php';

session_start();

$fileName = basename($_FILES["select_excel"]["name"]);
$fileTempName = $_FILES["select_excel"]["tmp_name"];
$filePath = UPLOAD_DIR . $fileName;
$fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

if (($_FILES["select_excel"]["name"] != "")) {
    if (in_array($fileType, ALLOWED_FORMAT)) {
        move_uploaded_file($fileTempName, $filePath);

        $tempFile = stream_get_meta_data($file);

        $tablesheet = new PhpSheet($filePath);
        $message = $tablesheet->createViewer();

        $_SESSION["filePath"] = $filePath;
    }
    else {
        $message = FILE_NOT_FOUND;
    }

    echo $message;
}
?>