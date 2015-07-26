<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	 if ( ! function_exists('postComment()'))
     {
       function postComment(array $param)
       {	
			$response = array();
			
			$curl = curl_init();
			
			$obj = new stdClass();
			
			$obj->postID 		= $param['postID'];
			$obj->userID 		= $param['userID'];
			$obj->content 		= $param['content'];
			$obj->revisionOf 	= null;
			$obj->removed 		= null;
			$obj->dateCreated 	= null;
			
			$sendQuery			= json_encode($obj);
			//echo $sendQuery;
			
			curl_setopt($curl,CURLOPT_URL,JEJALAN_SERVER_URL."Comment");
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($curl, CURLOPT_HEADER, 1);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$sendQuery);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($sendQuery)));    

			$result = curl_exec($curl);
			$error = curl_error($curl);
			$info = curl_getinfo($curl);
			
			$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			$header = substr($result, 0, $header_size);
			
			curl_close($curl);
			return $info;
		}
	 }