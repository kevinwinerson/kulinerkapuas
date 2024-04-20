<?php

$koneksi = new mysqli('localhost', 'root', '', 'resto');

if (!$koneksi) {
	die("<script>alert('gagal tersmabung dengan database.')</script>");
}

?>