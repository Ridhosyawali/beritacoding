<?php

class Books extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('books_model');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}
	
	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['books'] = $this->books_model->get();
	if(count($data['books']) <= 0){
		$this->load->view('admin/books_empty.php',$data);
	} else {
		$this->load->view('admin/books_list.php', $data);
	}
	}

	public function new()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$this->load->library('form_validation');
		if ($this->input->method() === 'post') {
			// Lakukan validasi sebelum menyimpan ke model
			$rules = $this->books_model->rules();
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() === FALSE){
				return $this->load->view('admin/books_new_form.php',$data);
			}

			// generate unique id and slug
			$id = uniqid('', true);
			$slug = url_title($this->input->post('title'), 'dash', TRUE) . '-' . $id;

			$books = [
				'id' => $id,
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'content' => $this->input->post('content'),
				'draft' => $this->input->post('draft')
			];

			$saved = $this->books_model->insert($books);

			if ($saved) {
				$this->session->set_flashdata('message', 'Books was created');
				return redirect('admin/books');
			}
		}

		$this->load->view('admin/books_new_form.php',$data);
	}

	public function edit($id = null)
	{
		$data['current_user'] = $this->auth_model->current_user();

		$data['books'] = $this->books_model->find($id);
		$this->load->library('form_validation');

		if (!$data['books'] || !$id) {
			show_404();
		}
		
		if ($this->input->method() === 'post') {
			// lakukan validasi data seblum simpan ke model
			$rules = $this->books_model->rules();
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() === FALSE){
				return $this->load->view('admin/books_edit_form.php', $data );
			}

			$books = [
				'id' => $id,
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'draft' => $this->input->post('draft')
			];
			$updated = $this->books_model->update($books);
			if ($updated) {
				$this->session->set_flashdata('message', 'books was updated');
				redirect('admin/books');
			}
		}

		$this->load->view('admin/books_edit_form.php', $data);
	}
	public function delete($id = null)
	{
		if (!$id) {
			show_404();
		}

		$deleted = $this->books_model->delete($id);
		if ($deleted) {
			$this->session->set_flashdata('message', 'books was deleted');
			redirect('admin/books');
		}
	}
}