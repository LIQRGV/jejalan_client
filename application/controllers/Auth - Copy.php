<?php
	$host = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$is_http = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
	$absolut_url 	= $is_http."://".$host.$uri."/";
	$file_name 		= basename($_SERVER['PHP_SELF'], null);
	$file_name_no_ext = explode(".",$file_name);
	
	/*
		function seoUrl return unwanted character from string
		
	*/
	function seoUrl($string) {
		//Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
        $string = strtolower($string);
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
	}
	/*
		function prettyFileName return unwanted character from filename
		
	*/
	function prettyFileName($filename,$uploaddir)
	{
		$path_parts = pathinfo($newfilename);
		// since PHP 5.2.0
		$extention 	= $path_parts['extension'];
		$file_name 	= $path_parts['filename']; 
		$file_name 	= seoUrl($file_name);
		$newfilename	= $file_name.".".$extention;
		$uploadfile1	= $uploaddir . $newfilename;
		
		return $uploadfile1;
	}
	
	
	
	function fence1($param) // prevent SQL injection attack
	{		
		if (get_magic_quotes_gpc()) {	// prevents duplicate backslashes
			$param = mysql_real_escape_string(stripslashes($param));	
			} else {		
			$param = mysql_real_escape_string($param);		
		}
		
		if (phpversion() >= '4.3.0') //if using new version of PHP and mysql_real_escape_string
		{
			$param = mysql_real_escape_string(htmlentities($param, ENT_QUOTES));
			} else { //for the old version of PHP and mysql_escape_string		
			$param = mysql_escape_string(htmlentities($param, ENT_QUOTES));
		}
		
		if (!ctype_digit($param)) {
			$param = mysql_real_escape_string($param);
			} else {
			$param = intval($param);
		}
		
		return $param;	//return the secure string
	}
	
	function limitstr($param, $length=50) // to limit string input
	{
		if (trim($param)!="") {
			$param = substr($param,0,$length);
		}
		
		return $param;	//return string
	}
	
	function securefield($param, $length=50) // get secure field
	{
		if (trim($param)!="") {
			$param = fence1(strip_tags(str_replace("'","''",limitstr(trim($param),$length))));
		}
		
		return $param;	//return the secure field
	}
	
	function logs($log) 
	{
		$createddate = date("Y-m-d,h:i:s");
		
		$query = "INSERT INTO log (log_log,tanggal_log) 
		VALUES ('$log','$createddate') ";
		mysql_query($query) or die("Error, insert query failed : $query ");
	}
	
	function ShowDate($str_date,$type=1) {
		$day=date("d",strtotime($str_date)); // Date
		$month=date("m",strtotime($str_date)); // Month
		$year=date("Y",strtotime($str_date)); // Year
		$hour=date("H",strtotime($str_date)); // Hour
		$minute=date("i",strtotime($str_date)); // Minute
		$second=date("s",strtotime($str_date)); // Second
		
		if ($type==1){ // format: dd/mm/YYYY
			return $day."/".$month."/".$year;
		}
		else if ($type==2){ // format: mm/dd/YYYY
			return $month."/".$day."/".$year;
		}
		else if ($type==3){ // format: dd-mm-YYYY 00:00:00
			return $day."-".$month."-".$year.' '.$hour.':'.$minute.':'.$second;
		}
		else if ($type==4){ // format: 00:00
			return $hour.':'.$minute;
		}
		else if ($type==5){ // format: YYYY-mm-dd
			return $year."-".$month."-".$day;
		}
		else {
			return "";
		}
	}
	
	function ShowDateFull($str_date,$type=1) {
		$T['Day']=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
		$T['Day_indo']=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		$T['S_Day']=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
		$T['Month']=array("","January","February","March","April","May","June","July","August","September","October","November","December");
		$T['Month_indo']=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$T['S_Month']=array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		
		$longday=$T['Day'][date("w",strtotime($str_date))]; // days full
		$longday_s=$T['S_Day'][date("w",strtotime($str_date))]; // days full short
		$day=date("d",strtotime($str_date)); // date
		$month=$T['Month'][date("n",strtotime($str_date))]; // month full
		$month_s=$T['S_Month'][date("n",strtotime($str_date))]; // month full short
		$year=date("Y",strtotime($str_date)); // year
		$day_indo=$T['Day_indo'][date("w",strtotime($str_date))]; // day full in indo
		$month_indo=$T['Month_indo'][date("n",strtotime($str_date))]; // month full in indo
		
		if ($type==1) { // ex. Monday, January 21, 2001
			return $longday.", ".$month." ".$day.", ".$year;
		}
		else if ($type==2){ // ex. Mon, Jan 21, 2001
			return $longday_s.", ".$month_s." ".$day.", ".$year;
		}
		else if ($type==3){ // indo date, ex: 21 Januari 2001
			return $day." ".$month_indo." ".$year;
		}
		else if ($type==4){ // indo date, ex: Minggu, 21 Januari 2001
			return $day_indo.", ".$day." ".$month_indo." ".$year;
		}
		else {
			return "";
		}
	}
	
	// Converter angka kedalam format rupiah
	function rupiah($param){
		$haystack = $param;
		$needle = '.00'; // Cek apakah string mengandung ".00"
		$pos = strpos(strtolower($haystack),$needle);
		if ($pos == true){
			$lenpar = strlen($param)-3;
			$cutpar = substr($param,0,$lenpar);
			} else {
			$lenpar = strlen($param);
			$cutpar = $param;
		}
		$tempar = strrev($cutpar);
		$str = "";
		for($i=0; $i < $lenpar; $i++)
		{
			if (($i+1)%3==0){
				$str = $str.$tempar[$i]."."; } else {
				$str = $str.$tempar[$i];
			}		
		}
		$str = strrev($str);
		if ($lenpar % 3 == 0){
			$str = substr($str,1);
		}
		echo $str;
	}
	// End Convert
	
	function SendMail($to, $from, $subj, $msg, $type="1", $cc="", $bcc=""){
		$headers="";
		if ($type=="1"){ //HTML
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";	
		}
		$headers .= 'To: '.$to."\r\n";
		$headers .= 'From: '.$from."\r\n";
		if ($cc!="") $headers .= 'Cc: '.$cc."\r\n";
		if ($bcc!="") $headers .= 'Bcc: '.$bcc."\r\n";
		if (@mail($to, $subj, $msg, $headers))
		return true;
		else
		return false;
	}
	
	function RandomKey($length=10,$type=1){
		$key="";
		if ($type==1){
			$pattern = "1234567890";
			$len=10;
		}
		else if ($type==2){
			$pattern = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$len=25;
		}
		else{ 
			$pattern = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$len=35;
		}
		for($i=0;$i<$length;$i++){
			$key .= $pattern{rand(0,$len)};
		}
		return $key;
	}
	
	function VerifyEmail($email) {
		$return = false;
		if (preg_match ('/^[\w.]+@([\w.]+)\.[a-z]{2,6}$/i', $email, $domain)) {
			$domain = explode ('.', $domain[0]);
			// Split the domain into sections wherein the last element is either 'co', 'org', or the likes, or the primary domain name
			foreach ($domain as $part) { // Iterate through the parts
				if (substr ($part, 0, 1) == '_' || substr ($part, strlen ($part) - 1, 1) == '_')
				$return = false; // The first or last character is _
				else
				$return = true; // The parts are fine. The address seems syntactically valid
			}
		}
		return $return;
	}
	
	function generatePagination($totalrecords, $recordperpages, $targetpage, $page, $passname = "page", $adjacents = 2)
	{	
		// find mark (?) on URL
		if (stripos($targetpage, "?")==true) {
			$targetpage = $targetpage."&";
			} else {
			$targetpage = $targetpage."?";
		}
		
		/* Setup page vars for display. */
		if ($page == 0) $page = 1;					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		$lastpage = ceil($totalrecords/$recordperpages);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		
		/* 
			Now we apply our rules and draw the pagination object. 
			We're actually saving the code to a variable in case we want to draw it more than once.
		*/
		$pagination = "";
		if($lastpage > 1)
		{	
			$pagination .= "<div class=\"pagination\">";
			//previous button
			if ($page > 1) 
			$pagination.= "<a href=\"$targetpage"."$passname=$prev\">&laquo; previous</a>";
			else
			$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
			
			//pages	
			if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
					else
					$pagination.= "<a href=\"$targetpage"."$passname=$counter\">$counter</a>";					
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
						else
						$pagination.= "<a href=\"$targetpage"."$passname=$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage"."$passname=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage"."$passname=$lastpage\">$lastpage</a>";		
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage"."$passname=1\">1</a>";
					$pagination.= "<a href=\"$targetpage"."$passname=2\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
						else
						$pagination.= "<a href=\"$targetpage"."$passname=$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage"."$passname=$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage"."$passname=$lastpage\">$lastpage</a>";		
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<a href=\"$targetpage"."$passname=1\">1</a>";
					$pagination.= "<a href=\"$targetpage"."$passname=2\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
						else
						$pagination.= "<a href=\"$targetpage"."$passname=$counter\">$counter</a>";					
					}
				}
			}
			
			//next button
			if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage"."$passname=$next\">next &raquo;</a>";
			else
			$pagination.= "<span class=\"disabled\">next &raquo;</span>";
			$pagination.= "</div>\n";		
		}
		return $pagination;
	}
	
	function date_GMT() // return value indonesia datetime
	{
		//date_default_timezone_set('Asia/Jakarta') = UTC+7;
		$h = "7";// Hour for time zone goes here e.g. +7 or -4, just remove the + or -
		$hm = $h * 60;
		$ms = $hm * 60;
		$gmdate = gmdate("Y-m-d,H:i:s", time()+($ms)); // the "-" can be switched to a plus if that's what your time zone is.
		
		return $gmdate;
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
	/*  AES implementation in PHP (c) Chris Veness 2005-2011. Right of free use is granted for all    */
	/*    commercial or non-commercial use under CC-BY licence. No warranty of any form is offered.   */
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
	
	class Aes {
		
		/**
			* AES Cipher function: encrypt 'input' with Rijndael algorithm
			*
			* @param input message as byte-array (16 bytes)
			* @param w     key schedule as 2D byte-array (Nr+1 x Nb bytes) - 
			*              generated from the cipher key by keyExpansion()
			* @return      ciphertext as byte-array (16 bytes)
		*/
		public static function cipher($input, $w) {    // main cipher function [§5.1]
			$Nb = 4;                 // block size (in words): no of columns in state (fixed at 4 for AES)
			$Nr = count($w)/$Nb - 1; // no of rounds: 10/12/14 for 128/192/256-bit keys
			
			$state = array();  // initialise 4xNb byte-array 'state' with input [§3.4]
			for ($i=0; $i<4*$Nb; $i++) $state[$i%4][floor($i/4)] = $input[$i];
			
			$state = self::addRoundKey($state, $w, 0, $Nb);
			
			for ($round=1; $round<$Nr; $round++) {  // apply Nr rounds
				$state = self::subBytes($state, $Nb);
				$state = self::shiftRows($state, $Nb);
				$state = self::mixColumns($state, $Nb);
				$state = self::addRoundKey($state, $w, $round, $Nb);
			}
			
			$state = self::subBytes($state, $Nb);
			$state = self::shiftRows($state, $Nb);
			$state = self::addRoundKey($state, $w, $Nr, $Nb);
			
			$output = array(4*$Nb);  // convert state to 1-d array before returning [§3.4]
			for ($i=0; $i<4*$Nb; $i++) $output[$i] = $state[$i%4][floor($i/4)];
			return $output;
		}
		
		
		private static function addRoundKey($state, $w, $rnd, $Nb) {  // xor Round Key into state S [§5.1.4]
			for ($r=0; $r<4; $r++) {
				for ($c=0; $c<$Nb; $c++) $state[$r][$c] ^= $w[$rnd*4+$c][$r];
			}
			return $state;
		}
		
		private static function subBytes($s, $Nb) {    // apply SBox to state S [§5.1.1]
			for ($r=0; $r<4; $r++) {
				for ($c=0; $c<$Nb; $c++) $s[$r][$c] = self::$sBox[$s[$r][$c]];
			}
			return $s;
		}
		
		private static function shiftRows($s, $Nb) {    // shift row r of state S left by r bytes [§5.1.2]
			$t = array(4);
			for ($r=1; $r<4; $r++) {
				for ($c=0; $c<4; $c++) $t[$c] = $s[$r][($c+$r)%$Nb];  // shift into temp copy
				for ($c=0; $c<4; $c++) $s[$r][$c] = $t[$c];           // and copy back
			}          // note that this will work for Nb=4,5,6, but not 7,8 (always 4 for AES):
			return $s;  // see fp.gladman.plus.com/cryptography_technology/rijndael/aes.spec.311.pdf 
		}
		
		private static function mixColumns($s, $Nb) {   // combine bytes of each col of state S [§5.1.3]
			for ($c=0; $c<4; $c++) {
				$a = array(4);  // 'a' is a copy of the current column from 's'
				$b = array(4);  // 'b' is a•{02} in GF(2^8)
				for ($i=0; $i<4; $i++) {
					$a[$i] = $s[$i][$c];
					$b[$i] = $s[$i][$c]&0x80 ? $s[$i][$c]<<1 ^ 0x011b : $s[$i][$c]<<1;
				}
				// a[n] ^ b[n] is a•{03} in GF(2^8)
				$s[0][$c] = $b[0] ^ $a[1] ^ $b[1] ^ $a[2] ^ $a[3]; // 2*a0 + 3*a1 + a2 + a3
				$s[1][$c] = $a[0] ^ $b[1] ^ $a[2] ^ $b[2] ^ $a[3]; // a0 * 2*a1 + 3*a2 + a3
				$s[2][$c] = $a[0] ^ $a[1] ^ $b[2] ^ $a[3] ^ $b[3]; // a0 + a1 + 2*a2 + 3*a3
				$s[3][$c] = $a[0] ^ $b[0] ^ $a[1] ^ $a[2] ^ $b[3]; // 3*a0 + a1 + a2 + 2*a3
			}
			return $s;
		}
		
		/**
			* Key expansion for Rijndael cipher(): performs key expansion on cipher key
			* to generate a key schedule
			*
			* @param key cipher key byte-array (16 bytes)
			* @return    key schedule as 2D byte-array (Nr+1 x Nb bytes)
		*/
		public static function keyExpansion($key) {  // generate Key Schedule from Cipher Key [§5.2]
			$Nb = 4;              // block size (in words): no of columns in state (fixed at 4 for AES)
			$Nk = count($key)/4;  // key length (in words): 4/6/8 for 128/192/256-bit keys
			$Nr = $Nk + 6;        // no of rounds: 10/12/14 for 128/192/256-bit keys
			
			$w = array();
			$temp = array();
			
			for ($i=0; $i<$Nk; $i++) {
				$r = array($key[4*$i], $key[4*$i+1], $key[4*$i+2], $key[4*$i+3]);
				$w[$i] = $r;
			}
			
			for ($i=$Nk; $i<($Nb*($Nr+1)); $i++) {
				$w[$i] = array();
				for ($t=0; $t<4; $t++) $temp[$t] = $w[$i-1][$t];
				if ($i % $Nk == 0) {
					$temp = self::subWord(self::rotWord($temp));
					for ($t=0; $t<4; $t++) $temp[$t] ^= self::$rCon[$i/$Nk][$t];
					} else if ($Nk > 6 && $i%$Nk == 4) {
					$temp = self::subWord($temp);
				}
				for ($t=0; $t<4; $t++) $w[$i][$t] = $w[$i-$Nk][$t] ^ $temp[$t];
			}
			return $w;
		}
		
		private static function subWord($w) {    // apply SBox to 4-byte word w
			for ($i=0; $i<4; $i++) $w[$i] = self::$sBox[$w[$i]];
			return $w;
		}
		
		private static function rotWord($w) {    // rotate 4-byte word w left by one byte
			$tmp = $w[0];
			for ($i=0; $i<3; $i++) $w[$i] = $w[$i+1];
			$w[3] = $tmp;
			return $w;
		}
		
		// sBox is pre-computed multiplicative inverse in GF(2^8) used in subBytes and keyExpansion [§5.1.1]
		private static $sBox = array(
		0x63,0x7c,0x77,0x7b,0xf2,0x6b,0x6f,0xc5,0x30,0x01,0x67,0x2b,0xfe,0xd7,0xab,0x76,
		0xca,0x82,0xc9,0x7d,0xfa,0x59,0x47,0xf0,0xad,0xd4,0xa2,0xaf,0x9c,0xa4,0x72,0xc0,
		0xb7,0xfd,0x93,0x26,0x36,0x3f,0xf7,0xcc,0x34,0xa5,0xe5,0xf1,0x71,0xd8,0x31,0x15,
		0x04,0xc7,0x23,0xc3,0x18,0x96,0x05,0x9a,0x07,0x12,0x80,0xe2,0xeb,0x27,0xb2,0x75,
		0x09,0x83,0x2c,0x1a,0x1b,0x6e,0x5a,0xa0,0x52,0x3b,0xd6,0xb3,0x29,0xe3,0x2f,0x84,
		0x53,0xd1,0x00,0xed,0x20,0xfc,0xb1,0x5b,0x6a,0xcb,0xbe,0x39,0x4a,0x4c,0x58,0xcf,
		0xd0,0xef,0xaa,0xfb,0x43,0x4d,0x33,0x85,0x45,0xf9,0x02,0x7f,0x50,0x3c,0x9f,0xa8,
		0x51,0xa3,0x40,0x8f,0x92,0x9d,0x38,0xf5,0xbc,0xb6,0xda,0x21,0x10,0xff,0xf3,0xd2,
		0xcd,0x0c,0x13,0xec,0x5f,0x97,0x44,0x17,0xc4,0xa7,0x7e,0x3d,0x64,0x5d,0x19,0x73,
		0x60,0x81,0x4f,0xdc,0x22,0x2a,0x90,0x88,0x46,0xee,0xb8,0x14,0xde,0x5e,0x0b,0xdb,
		0xe0,0x32,0x3a,0x0a,0x49,0x06,0x24,0x5c,0xc2,0xd3,0xac,0x62,0x91,0x95,0xe4,0x79,
		0xe7,0xc8,0x37,0x6d,0x8d,0xd5,0x4e,0xa9,0x6c,0x56,0xf4,0xea,0x65,0x7a,0xae,0x08,
		0xba,0x78,0x25,0x2e,0x1c,0xa6,0xb4,0xc6,0xe8,0xdd,0x74,0x1f,0x4b,0xbd,0x8b,0x8a,
		0x70,0x3e,0xb5,0x66,0x48,0x03,0xf6,0x0e,0x61,0x35,0x57,0xb9,0x86,0xc1,0x1d,0x9e,
		0xe1,0xf8,0x98,0x11,0x69,0xd9,0x8e,0x94,0x9b,0x1e,0x87,0xe9,0xce,0x55,0x28,0xdf,
		0x8c,0xa1,0x89,0x0d,0xbf,0xe6,0x42,0x68,0x41,0x99,0x2d,0x0f,0xb0,0x54,0xbb,0x16);
		
		// rCon is Round Constant used for the Key Expansion [1st col is 2^(r-1) in GF(2^8)] [§5.2]
		private static $rCon = array( 
		array(0x00, 0x00, 0x00, 0x00),
		array(0x01, 0x00, 0x00, 0x00),
		array(0x02, 0x00, 0x00, 0x00),
		array(0x04, 0x00, 0x00, 0x00),
		array(0x08, 0x00, 0x00, 0x00),
		array(0x10, 0x00, 0x00, 0x00),
		array(0x20, 0x00, 0x00, 0x00),
		array(0x40, 0x00, 0x00, 0x00),
		array(0x80, 0x00, 0x00, 0x00),
		array(0x1b, 0x00, 0x00, 0x00),
		array(0x36, 0x00, 0x00, 0x00) ); 
		
	} 
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
	/*  AES counter (CTR) mode implementation in PHP (c) Chris Veness 2005-2011. Right of free use is */
	/*    granted for all commercial or non-commercial use under CC-BY licence. No warranty of any    */
	/*    form is offered.                                                                            */
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
	
	class AesCtr extends Aes {
		
		/** 
			* Encrypt a text using AES encryption in Counter mode of operation
			*  - see http://csrc.nist.gov/publications/nistpubs/800-38a/sp800-38a.pdf
			*
			* Unicode multi-byte character safe
			*
			* @param plaintext source text to be encrypted
			* @param password  the password to use to generate a key
			* @param nBits     number of bits to be used in the key (128, 192, or 256)
			* @return          encrypted text
		*/
		public static function encrypt($plaintext, $password, $nBits) {
			$blockSize = 16;  // block size fixed at 16 bytes / 128 bits (Nb=4) for AES
			if (!($nBits==128 || $nBits==192 || $nBits==256)) return '';  // standard allows 128/192/256 bit keys
			// note PHP (5) gives us plaintext and password in UTF8 encoding!
			
			// use AES itself to encrypt password to get cipher key (using plain password as source for  
			// key expansion) - gives us well encrypted key
			$nBytes = $nBits/8;  // no bytes in key
			$pwBytes = array();
			for ($i=0; $i<$nBytes; $i++) $pwBytes[$i] = ord(substr($password,$i,1)) & 0xff;
			$key = Aes::cipher($pwBytes, Aes::keyExpansion($pwBytes));
			$key = array_merge($key, array_slice($key, 0, $nBytes-16));  // expand key to 16/24/32 bytes long 
			
			// initialise 1st 8 bytes of counter block with nonce (NIST SP800-38A §B.2): [0-1] = millisec, 
			// [2-3] = random, [4-7] = seconds, giving guaranteed sub-ms uniqueness up to Feb 2106
			$counterBlock = array();
			$nonce = floor(microtime(true)*1000);   // timestamp: milliseconds since 1-Jan-1970
			$nonceMs = $nonce%1000;
			$nonceSec = floor($nonce/1000);
			$nonceRnd = floor(rand(0, 0xffff));
			
			for ($i=0; $i<2; $i++) $counterBlock[$i]   = self::urs($nonceMs,  $i*8) & 0xff;
			for ($i=0; $i<2; $i++) $counterBlock[$i+2] = self::urs($nonceRnd, $i*8) & 0xff;
			for ($i=0; $i<4; $i++) $counterBlock[$i+4] = self::urs($nonceSec, $i*8) & 0xff;
			
			// and convert it to a string to go on the front of the ciphertext
			$ctrTxt = '';
			for ($i=0; $i<8; $i++) $ctrTxt .= chr($counterBlock[$i]);
			
			// generate key schedule - an expansion of the key into distinct Key Rounds for each round
			$keySchedule = Aes::keyExpansion($key);
			//print_r($keySchedule);
			
			$blockCount = ceil(strlen($plaintext)/$blockSize);
			$ciphertxt = array();  // ciphertext as array of strings
			
			for ($b=0; $b<$blockCount; $b++) {
				// set counter (block #) in last 8 bytes of counter block (leaving nonce in 1st 8 bytes)
				// done in two stages for 32-bit ops: using two words allows us to go past 2^32 blocks (68GB)
				for ($c=0; $c<4; $c++) $counterBlock[15-$c] = self::urs($b, $c*8) & 0xff;
				for ($c=0; $c<4; $c++) $counterBlock[15-$c-4] = self::urs($b/0x100000000, $c*8);
				
				$cipherCntr = Aes::cipher($counterBlock, $keySchedule);  // -- encrypt counter block --
				
				// block size is reduced on final block
				$blockLength = $b<$blockCount-1 ? $blockSize : (strlen($plaintext)-1)%$blockSize+1;
				$cipherByte = array();
				
				for ($i=0; $i<$blockLength; $i++) {  // -- xor plaintext with ciphered counter byte-by-byte --
					$cipherByte[$i] = $cipherCntr[$i] ^ ord(substr($plaintext, $b*$blockSize+$i, 1));
					$cipherByte[$i] = chr($cipherByte[$i]);
				}
				$ciphertxt[$b] = implode('', $cipherByte);  // escape troublesome characters in ciphertext
			}
			
			// implode is more efficient than repeated string concatenation
			$ciphertext = $ctrTxt . implode('', $ciphertxt);
			$ciphertext = base64_encode($ciphertext);
			return $ciphertext;
		}
		
		
		/** 
			* Decrypt a text encrypted by AES in counter mode of operation
			*
			* @param ciphertext source text to be decrypted
			* @param password   the password to use to generate a key
			* @param nBits      number of bits to be used in the key (128, 192, or 256)
			* @return           decrypted text
		*/
		public static function decrypt($ciphertext, $password, $nBits) {
			$blockSize = 16;  // block size fixed at 16 bytes / 128 bits (Nb=4) for AES
			if (!($nBits==128 || $nBits==192 || $nBits==256)) return '';  // standard allows 128/192/256 bit keys
			$ciphertext = base64_decode($ciphertext);
			
			// use AES to encrypt password (mirroring encrypt routine)
			$nBytes = $nBits/8;  // no bytes in key
			$pwBytes = array();
			for ($i=0; $i<$nBytes; $i++) $pwBytes[$i] = ord(substr($password,$i,1)) & 0xff;
			$key = Aes::cipher($pwBytes, Aes::keyExpansion($pwBytes));
			$key = array_merge($key, array_slice($key, 0, $nBytes-16));  // expand key to 16/24/32 bytes long
			
			// recover nonce from 1st element of ciphertext
			$counterBlock = array();
			$ctrTxt = substr($ciphertext, 0, 8);
			for ($i=0; $i<8; $i++) $counterBlock[$i] = ord(substr($ctrTxt,$i,1));
			
			// generate key schedule
			$keySchedule = Aes::keyExpansion($key);
			
			// separate ciphertext into blocks (skipping past initial 8 bytes)
			$nBlocks = ceil((strlen($ciphertext)-8) / $blockSize);
			$ct = array();
			for ($b=0; $b<$nBlocks; $b++) $ct[$b] = substr($ciphertext, 8+$b*$blockSize, 16);
			$ciphertext = $ct;  // ciphertext is now array of block-length strings
			
			// plaintext will get generated block-by-block into array of block-length strings
			$plaintxt = array();
			
			for ($b=0; $b<$nBlocks; $b++) {
				// set counter (block #) in last 8 bytes of counter block (leaving nonce in 1st 8 bytes)
				for ($c=0; $c<4; $c++) $counterBlock[15-$c] = self::urs($b, $c*8) & 0xff;
				for ($c=0; $c<4; $c++) $counterBlock[15-$c-4] = self::urs(($b+1)/0x100000000-1, $c*8) & 0xff;
				
				$cipherCntr = Aes::cipher($counterBlock, $keySchedule);  // encrypt counter block
				
				$plaintxtByte = array();
				for ($i=0; $i<strlen($ciphertext[$b]); $i++) {
					// -- xor plaintext with ciphered counter byte-by-byte --
					$plaintxtByte[$i] = $cipherCntr[$i] ^ ord(substr($ciphertext[$b],$i,1));
					$plaintxtByte[$i] = chr($plaintxtByte[$i]);
					
				}
				$plaintxt[$b] = implode('', $plaintxtByte); 
			}
			
			// join array of blocks into single plaintext string
			$plaintext = implode('',$plaintxt);
			
			return $plaintext;
		}
		
		
		/*
			* Unsigned right shift function, since PHP has neither >>> operator nor unsigned ints
			*
			* @param a  number to be shifted (32-bit integer)
			* @param b  number of bits to shift a to the right (0..31)
			* @return   a right-shifted and zero-filled by b bits
		*/
		private static function urs($a, $b) {
			$a &= 0xffffffff; $b &= 0x1f;  // (bounds check)
			if ($a&0x80000000 && $b>0) {   // if left-most bit set
				$a = ($a>>1) & 0x7fffffff;   //   right-shift one bit & clear left-most bit
				$a = $a >> ($b-1);           //   remaining right-shifts
				} else {                       // otherwise
				$a = ($a>>$b);               //   use normal right-shift
			} 
			return $a; 
		}
		
	}  
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  */
	
	function encryptIt($param) // try to enhanced security with Rijndael algorithm
	{
		$param = AesCtr::encrypt($param, "r1jnd43l4lg0r1thm", 256);
		
		return($param);
	}
	
	function decryptIt($param) // try to enhanced security with Rijndael algorithm
	{
		$param = AesCtr::decrypt($param, "r1jnd43l4lg0r1thm", 256);
		
		return($param);
	}
	
	function makeSeo($text)
    {
		// replace non letter or digits by -
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		
		// trim
		$text = trim($text, '-');
		
		// lowercase
		$text = strtolower($text);
		
		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);
		
		if(strlen($text) > 70) {
			$text = substr($text, 0, 70);
		} 
		
		if (empty($text))
		{
			//return 'n-a';
			return time();
		}
		
		return $text;
	}
?>
