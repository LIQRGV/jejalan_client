<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	 if ( ! function_exists('getTopPost()'))
     {
       function getTopPost()
       {
			$response = array();
			
			$curl = curl_init();
			
			curl_setopt($curl,CURLOPT_URL,SERVER_URL."Util/getTopPost");
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

			$result = curl_exec($curl);
			$error = curl_error($curl);

			$curlTopPost = json_decode($result);
			$allTopPost = $curlTopPost->result;
			$infoTopPost = array();

			foreach($curlTopPost->info as $info)
			{
				$id = $info->id;
				unset($info->id);
				unset($info->username);
				unset($info->password);
				$infoTopPost[$id] = $info;
			}
		   
			$response['allTopPost'] = $allTopPost;
			$response['infoTopPost'] = $infoTopPost;
			
			curl_close($curl);
			
			return $response;
		}
	 }