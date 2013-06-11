<?php
class Upload_model extends CI_Model {
	// CODE VAN CODE IGNITER
	// Uploaden van afbeeldingen binnen posts
	var $upload_path;
	var $upload_path_url;
	
	function __construct() {
		parent::__construct();
		
		$this->upload_path = realpath(APPPATH . '../uploads');
		$this->upload_path_url = base_url().'uploads/';
	}
	
	function do_upload() {
		
		$config = array( // settings afbeelding
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->upload_path
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		$filename = $image_data['file_name'];
		
		$config = array( // thumbnail maken
			'source_image' => $image_data['full_path'],
			'new_image' => $this->upload_path . '/resize',
			'maintain_ration' => true,
			'width' => 180,
			'height' => 180
		);
		
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		
		return $filename;
		
	}
	
}