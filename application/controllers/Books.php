<?php

class Books extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('books_model');
  }

  public function index()
  {
    // ambil artikel yang statusnya bukan draft
    $data['books'] = $this->books_model->get_published();

    if (count($data['books']) > 0) {
      // kirim data artikel ke view
      $this->load->view('books/list_books.php', $data);
    } else {
      // kalau gak ada artikel, tampilkan view ini
      $this->load->view('books/empty_books.php');
    }
  }

  public function show($slug = null)
  {
    // jika gak ada slug di URL tampilkan 404
    if (!$slug) {
      show_404();
    }

    // ambil artikel dengan slug yang diberikan
    $data['books'] = $this->books_model->find_by_slug($slug);

    // jika artikel tidak ditemuakn di database tampilkan 404
    if (!$data['books']) {
      show_404();
    }

    // tampilkan artikel
    $this->load->view('books/show_books.php', $data);
  }
}
