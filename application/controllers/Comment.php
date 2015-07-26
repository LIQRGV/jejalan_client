<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	public function save()
	{
		$this->load->helper('jejalan_comment');
		$post = $this->input->post();
		$content = $post['comment'];
		$userID = 21;
		$postID = $post['postID'];
		
		$param = array();
		
		$param['postID'] = $postID;
		$param['userID'] = $userID;
		$param['content']= $content;
		
		$result = postComment($param);
		
		echo json_encode($result);
	}
}