<?php

//file_name.php
//
//Author: Kevin Shell
//Date  : Today's Date
//
session_start();
session_unset();
session_destroy();
header('Location: index.php');
?>
