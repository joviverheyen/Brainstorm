<?php

class BrainstormDetail extends CI_Controller {
	
	public function show() {
		$brainstorm_ID = $this->uri->segment(3);
		$this->load->model('brainstorm_model');
		$data['rows'] = $this->brainstorm_model->getBrainstormDetails($brainstorm_ID);
		$this->load->view('brainstormDetail_view', $data);
	}
	
	
	
}

?>
