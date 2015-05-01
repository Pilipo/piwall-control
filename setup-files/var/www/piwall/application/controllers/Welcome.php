<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->model('piwall_model', 'piwall');
	}
	
	public function index()
	{
	
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['file_list'] = $this->piwall->list_files();
			$data['disk_usage'] = $this->piwall->get_disk_usage();
			$data['current_selection'] = $this->piwall->get_current_selection();
			$data['mediainfo'] = $this->piwall->get_media_info($data['current_selection']);
			
			$this->load->view('head', $data);
			$this->load->view('body-open', $data);
			$this->load->view('welcome_message', $data);
		}
	}
	
	public function do_update()
	{
		$this->load->helper('url');
		$this->load->model('piwall_model', 'piwall');
		$this->piwall->update_current_selection($_POST['selected_video']);

		redirect('/');
	}
}
