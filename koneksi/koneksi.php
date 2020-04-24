<?php 
function open_connection() {
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "akademik";
	$koneksi = mysqli_connect($hostname,$username,$password,$dbname);
	return $koneksi;
}
 ?>