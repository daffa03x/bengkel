<?php
session_start();
unset($_SESSION['USER']); //hapus session User
header('location:index.php?hal=home');