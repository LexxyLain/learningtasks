<?php
include 'config/config.php';
session_destroy();
header("location: index.php");