<?php

require_once "constants.php";
require_once 'tablesheet_reader.php';

session_start();

$filePath = $_SESSION["filePath"];

$tablesheet = new PhpSheet($filePath);

if ($tablesheet->saveSheet()) {
    $message = SAVE_COMPLETE_SUCCESS;
    unlink($filePath);
    session_reset();
} else {
    $message = SAVE_COMPLETE_FAILED;
}

echo $message;

?>