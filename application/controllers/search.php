<?php

class Search extends CI_Controller {
	
	public function index() {
		$this->load->view('search_view');
	}
	
	public function searchTheDatabase() {
		$term = $this->input->post('term');
		$data['brainstorms'] = '';
		$data['users'] = '';
		
		if ($this->input->post('search') == 'brainstorms') {
			$this->load->model('search_model');
			$data['brainstorms'] = $this->search_model->searchBrainstorms($term);
			$this->load->view('search_view', $data);
		}
		
		if ($this->input->post('search') == 'users') {
			$this->load->model('search_model');
			$data['users'] = $this->search_model->searchUsers($term);
			$this->load->view('search_view', $data);		
		}
		
		if ($this->input->post('search') == '') {
			$this->index();	
		}
		
		
	}
	
}

?>
