<?php

class Upload extends CI_Controller {

	public $config = array('hostname' => 'localhost',
							'username' => 'pi',
							'password' => 'pi_B00g3r',
							'debug'	=> TRUE
							);
							
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('Sftp');
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	
	function do_upload()
	{
		$this->load->model('piwall_model', 'piwall');
		$this->piwall->upload_file();

		redirect('/');
	}
	
	function do_delete()
	{
		if( empty($_POST) || ! isset($_POST['filenames'])) {
			redirect('/');
		}
		
		$this->load->model('piwall_model', 'piwall');
		$this->piwall->delete_files($_POST['filenames'] );
		
		redirect('/');
	}
	
}
?>