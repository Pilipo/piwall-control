<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Piwall_model extends CI_Model {

	private $config = array('hostname' => 'localhost',
							'username' => 'pi',
							'password' => 'pi_B00g3r',
							'debug'	=> TRUE
							);

    function __construct()
    {
        parent::__construct();
		//$this->load->library('Sftp');
    }
	
	function list_files()
	{
		$disk_array = array_filter(explode("\n", shell_exec ( "ls /media/PIWALL")));
		return $disk_array;
	}
	
	function delete_files($filearray)
	{
		
		$this->sftp->connect($this->config);
		$return_bool = TRUE;
		
		foreach($_POST['filenames'] as $filename) {
			$return_bool = $this->sftp->delete_file('/var/www/piwall/uploads/'.$filename) == FALSE || $return_bool == FALSE ? FALSE : TRUE;
		}
		return $return_bool;
	}
	
	function get_disk_usage()
	{
		$disk_array = array_filter(explode("\n", shell_exec ( "df -h | grep /media/PIWALL | awk '{print $2} {print $3} {print $4} {print $5}'")));

		if(empty($disk_array))
		{
			return $disk_array;
		}
		else
		{
			$return_array = array(
				'total' => $disk_array[0],
				'used' => $disk_array[1],
				'avail' => $disk_array[2],
				'percent' => $disk_array[3]
				);
		}
		return $return_array;
	}
	
	function get_current_selection()
	{
		$selection_path = "current_selection";
	
		$current_selection_file = fopen($selection_path, "r") or die("Unable to open file!");
		
		$current_selection = fread($current_selection_file, filesize($selection_path));
		fclose($current_selection_file);
		return $current_selection;
	}
	
	function update_current_selection($new_filename)
	{
		$selection_path = "current_selection";
	
		$current_selection_file = fopen($selection_path, "w") or die("Unable to open file!");
		$success = fwrite($current_selection_file, trim($new_filename));
		
		fclose($current_selection_file);
		return $success;
	}
	
	function get_media_info($filename)
	{
		exec ( "omxplayer -i '/media/PIWALL/".$filename."'  2>&1", $mediainfo_array);
		return $mediainfo_array;
	}
	
	
	/*OLD FUNCTIONS */
	/*
	function list_content()
	{
		$files_array = explode("\n", shell_exec ( "ls -hl /media/1/uploads/  " ));
		$folder_size = explode(" ",array_shift($files_array))[1];
		$return_array = array();
		$file_count = 0;
		
		foreach($files_array as $line)
		{
			if( ! strlen($line) )
				continue;
				
			//var_dump($line);
			$raw_array = explode(" ", $line);
			//echo '<pre>BEFORE';
			//print_r($raw_array);
			//echo '</pre>';
			$raw_array = array_values(array_filter($raw_array));
			//echo '<pre>AFTER';
			//print_r($raw_array);
			//echo '</pre>';
			$return_array[$file_count]['size'] = $raw_array[4];
			$return_array[$file_count]['date'] = "$raw_array[5]  $raw_array[6]";// -- $raw_array[7]";
			$return_array[$file_count]['name'] = $raw_array[8];
			$file_count++;
		}
		
		return $return_array;
	}
	*/
}