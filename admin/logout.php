<?php
include('../admin/partials/config.php/constants.php');

session_destroy();
header('location:' . SITEURL . 'admin/login.php');



?>