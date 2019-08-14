<?php
// $host="localhost";
// $user="root";
// $password="";
// $database="db_cc1";
// $koneksi=mysqli_connect($host,$user,$password);
// mysql_select_db ($database,$koneksi);
$koneksi = mysqli_connect("localhost", "root", "", "db_biodata");
if($koneksi){
	echo " ";
}else{
	echo"coba lagi";
}
