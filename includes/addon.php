<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}

  function denominasiRupiah( $n, $precision = 1 ) 
  {    if ($n < 900) 
	{      // 0 - 900     
		$n_format = number_format($n, $precision);   
		$suffix = '';    
	} else if ($n < 900000) 
	{      // 0.9k-850k   
	$n_format = number_format($n / 1000, $precision); 
	$suffix = 'K'; //ribuan    
	} else if ($n < 900000000) 
	{      // 0.9m-850m      
	$n_format = number_format($n / 1000000, $precision);  
	$suffix = 'J'; //juta    
	} else if ($n < 900000000000) 
	{      // 0.9b-850b      
	$n_format = number_format($n / 1000000000, $precision); 
	$suffix = 'M'; //miliar    
	} else 
	{      // 0.9t+      
		$n_format = number_format($n / 1000000000000, $precision); 
		$suffix = 'T'; //triliun    
	}    // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"    // Intentionally does not affect partials, eg "1.50" -> "1.50"    
	if ( $precision > 0 ) 
	{      
		$dotzero = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );    
	}    
	return $n_format ." ". $suffix;  
}


function tanggal($date){
	
	$hasil_tanggal = date("d-m-Y", strtotime($date));
	return $hasil_tanggal;
}

function tanggal_time($date){
	
	$hasil_tanggal = date("d-m-y", strtotime($date));
	return $hasil_tanggal;
}

function waktu_time($date){
	
	$hasil_tanggal = date("H:m", strtotime($date));
	return $hasil_tanggal;
}

function tanggalwaktu($date){
	
	$hasil_tanggal = date("d-m-Y H:m", strtotime($date));
	return $hasil_tanggal;
}

setlocale(LC_ALL, 'id-ID', 'id_ID');

?>