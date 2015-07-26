<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All extends CI_Controller {

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

	public function index()
	{
		$this->load->helper('jejalan_view');
		$this->load->helper('jejalan_post');
		$this->load->helper('jejalan_auth');
        $response = array();
        
		$sidebarResponse = getSidebar();
		$topPostResponse = getTopPost();
        $userLoggedIn    = isUserLoggedIn();

		$response = array_merge($response,$sidebarResponse,$topPostResponse,$userLoggedIn);
		$this->load->view('public/allHome',$response);
	}
}
