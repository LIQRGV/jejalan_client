<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
	 if ( ! function_exists('getTopPost()'))
     {
       function getTopPost()
       {
			$response = array();
			
			$curl = curl_init();
			
			curl_setopt($curl,CURLOPT_URL,JEJALAN_SERVER_URL."Util/getTopPost");
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
	 
	if ( ! function_exists('getPost()'))
     {
       function getPost($id = NULL)
       {	
			$response = array();
			
			$curl = curl_init();
			
			curl_setopt($curl,CURLOPT_URL,JEJALAN_SERVER_URL."Post/".$id);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

			$result = curl_exec($curl);
			$error = curl_error($curl);

			$curlFetchPost = json_decode($result);
			$fetchPost = array();
			if(isset($curlFetchPost->result))
				$fetchPost = $curlFetchPost->result;
			else
				$fetchPost[] = $curlFetchPost;
			
			curl_close($curl);
			
			// some useless block 
			
			$curl = curl_init();
			
			curl_setopt($curl,CURLOPT_URL,JEJALAN_SERVER_URL."User/".$fetchPost[0]->creator);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

			$result = curl_exec($curl);
			$error = curl_error($curl);
			
			$curlFetchInfo = json_decode($result);
			$fetchInfo = $curlFetchInfo;
			
			curl_close($curl);
				
			$response['fetchPost'] = $fetchPost;
			$response['fetchInfo'] = $fetchInfo;
			
			return $response;
		}
	 }
	 
	 if ( ! function_exists('getCommentByPost()'))
     {
       function getCommentByPost($id = NULL)
       {	
			$response = array();
			
			$curl = curl_init();
			
			curl_setopt($curl,CURLOPT_URL,JEJALAN_SERVER_URL."Util/getCommentByPost/".$id);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

			$result = curl_exec($curl);
			$error = curl_error($curl);

			$curlComments = json_decode($result);
			$comments = array();
			
			$comments = $curlComments->commentList;
			
			//curl_close($curl);
			
			$tempId = array();
			foreach($comments as $comment)
			{
				if(in_array($comment->userID, $tempId))
					continue;
				else
					$tempId[] = $comment->userID;
			}
			
			//$curl = curl_init();
			
			$userList = array();
			foreach($tempId as $idUser)
			{
				curl_setopt($curl,CURLOPT_URL,JEJALAN_SERVER_URL."User/".$idUser);
				curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

				$result = curl_exec($curl);
				$error = curl_error($curl);

				$curlComments = json_decode($result);
				
				$userList[$idUser] = $curlComments;
			}
			
			curl_close($curl);
			
			$response['comments'] = $comments;
			$response['commentsUser'] = $userList;
			
			return $response;
		}
	 }