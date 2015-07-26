<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('jejalan_view');
		$this->load->helper('jejalan_post');
		$this->load->helper('jejalan_auth');
		$response = array();
        
		$sidebarResponse = getSidebar();
		$topPostResponse = getTopPost();
		$response = array_merge($response,$sidebarResponse,$topPostResponse);
		$this->load->view('public/allPost',$response);
	}

    public function next()
    {
        $this->load->view('public/allPost');
    }

    public function id( $postID = NULL)
    {
		$this->load->helper('jejalan_view');
		$this->load->helper('jejalan_post');
		$this->load->helper('jejalan_user');
		$this->load->helper('jejalan_auth');		
		
		$response = array();
        
		$sidebarResponse = getSidebar();
		$topPostResponse = getTopPost();
		$singlePostResponse = getPost($postID);		
		$singlePostCommentResponse = getCommentByPost($postID);		
		
		$response = array_merge($response,$sidebarResponse,$topPostResponse,$singlePostResponse,$singlePostCommentResponse);
		
		$response['postID'] = $postID;
        
        if($postID == NULL || !is_numeric($postID))
        {
            $this->index();
        } else {
            $this->load->view('public/allPostView',$response);
        }
    }

    public function create()
    {
        $this->load->view('user/ownPostCreate');
    }

    public function edit()
    {
        $this->load->view('user/ownPostCreate');
    }

    public function save()
    {
        $response = array();
        $response["result"] = "empty";
        if(isset($_FILES))
        {
            $target_dir = "assets/img/";
            //$target_dir = '';
            $uploadOk = 1;
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            $imageUploadName = $_FILES["image"]["name"];
            $imageFileType = pathinfo($imageUploadName)['extension'];

            $fileMD5 = md5_file($_FILES["image"]["tmp_name"]);
            $target_file = $fileMD5.'.'.$imageFileType;

            if($check !== false) {
                $response["success"][] =  "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $response["error"][] = "File is not an image.";
                $uploadOk = 0;
            }

            if (file_exists($target_dir.$target_file)) {
                $response["error"][] = "File already exists.";
                //$uploadOk = 0;
            } else {
                $response["success"][] = "File not exist yet";
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $response["error"][] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            } else{
                $response["success"][] = "File extension within allowed extension";
            }

            if ($uploadOk == 0) {
                $response["result"] = "not complete";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$target_file)) {
                    $response["result"] = "success";
                    $response["filename"] = $target_file;
                } else {
                    $response["result"] = "move upload fail";
                }
            }
        }
        echo json_encode($response);
    }
}
