<?php

class Post extends CI_Controller
{
	public function index()
	{
		$this->load->view('admin/post_list.php');
	}
}