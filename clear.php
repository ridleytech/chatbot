<?php

if (!isset($_SESSION)) {
  session_start();
}


unset($_SESSION['context']);
$_SESSION['context'] = null;
?>