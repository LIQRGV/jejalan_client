<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
    function __construct()
    {
        parent::__construct();
    }

	public function login()
	{
        var_dump($this->input->post());
	}
	
	public function register()
	{
		$response = array();
		
        $this->load->view('public/allRegistration',$response);
	}
	
	public function registerAction()
	{
		$this->load->helper('jejalan_user');
		$response = array();
		
        $allPost = $this->input->post();
		//var_dump($allPost);
		
		$postUserResponse 	= postUser($allPost);
		
		if($postUserResponse['http_code'] == 202)
			redirect(base_url());
		else
			redirect(base_url(). 'register');
	}
}
