<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	if ( ! function_exists('getUser()'))
     {
       function getUser($id = NULL)
       {	
			$response = array();
			
			$curl = curl_init();
			
			curl_setopt($curl,CURLOPT_URL,JEJALAN_SERVER_URL."User/".$id);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

			$result = curl_exec($curl);
			$error = curl_error($curl);

			$curlFetchPost = json_decode($result);
			$fetchPost = array();
			
			if(isset($curlFetchPost->status))
				$fetchPost = $curlFetchPost->status;
			else
			{
				$fetchPost = $curlFetchPost;
			}
				
			$response['fetchUser'] = $fetchPost;
			
			curl_close($curl);
			
			return $response;
		}
	 }
	 
	 if ( ! function_exists('postUser()'))
     {
       function postUser(array $param)
       {	
			$response = array();
			
			$curl = curl_init();
			
			$obj = new stdClass();
			
			$obj->username 			= $param['username'];
			$obj->password 			= $param['password'];
			$obj->completeName		= $param['completeName'];
			$obj->region 			= $param['region'];
			$obj->email 			= $param['email'];
			$obj->hp 				= $param['phone'];
			$obj->profilePicture 	= "";
			
			$sendQuery			= json_encode($obj);
			//echo $sendQuery;
			
			curl_setopt($curl,CURLOPT_URL,JEJALAN_SERVER_URL."User");
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