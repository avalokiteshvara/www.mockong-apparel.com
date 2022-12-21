<?php
//http://adhit.net/2012/12/menampilkan-format-rupiah-dengan-php/

function format_rupiah($angka){

	$jadi = number_format($angka,0,',','.');
	return $jadi;
}