<?php

$config = parse_ini_file('config.ini', true);

define('TITLE_PAGE', '<h3 align="center">'.$config["messages"]["title_page"].'</h3>');
define('FILE_NOT_FOUND', '<div class="alert alert-danger">'.$config["messages"]["file_not_found"].'</div>');
define('ALLOWED_FORMAT', ['xls', 'xlsx']);
define('OUTPUT_WRITER', 'php://output');
define('WRITER_TYPE', 'Html');
define('UPLOAD_DIR', $config["settings"]["upload_dir"]);
define('SAVE_COMPLETE_SUCCESS', '<div class="alert alert-success">'.$config["messages"]["save_complete_success"].'</div>');
define('SAVE_COMPLETE_FAILED', '<div class="alert alert-danger">'.$config["messages"]["save_complete_failed"].'</div>');
?>