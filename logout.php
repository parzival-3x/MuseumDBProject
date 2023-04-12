<?php 
if (session_status() == PHP_SESSION_NONE) {
    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../sessions'));
    //ini_set('session.gc_probability', 1);
    session_start(); 
  }
//session_start();

session_unset();
session_destroy();

header("Location: index.php");
?>