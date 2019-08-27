<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {
   
   public function __construct(){
       parent::__construct();
        $this->load->model('student_model');
        $this->load->model('dep_model');
        $this->load->model('author_model');
         $this->load->model('book_model');
        $data = array(); 
   }


   public function addbook(){
    $data['title']    = 'Add New Book';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['depdata'] = $this->dep_model->getAllDepartmentData();
    $data['autdata'] = $this->author_model->getAllAuthorData();

    $data['content']  = $this->load->view('inc/addbook', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

   }

   public function addBookForm(){
    $data['bookname'] = $this->input->post('bookname');
    $data['dep'] = $this->input->post('dep');
    $data['author'] = $this->input->post('author');
    $data['totalbook'] = $this->input->post('totalbook');
 

    $bookname = $data['bookname'];
    $dep = $data['dep'];
    $author = $data['author'];
    $totalbook = $data['totalbook'];
  
    if (empty($bookname) && empty($dep) && empty($author) && empty($totalbook)) {
     $sdata = array();
     $sdata['msg'] = '<span style="color:red"> Field must not be Empty </span>';
       $this->session->set_flashdata($sdata);
       redirect("book/addbook");

    }else {
       $this->book_model->saveBook($data);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Book Added Successfully </span>';
       $this->session->set_flashdata($sdata);
        redirect("book/addbook");
      
    } 
   }


    public function booklist(){
    $data['title']    = 'Book List';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['allbook'] = $this->book_model->getAllBookData();
    
    $data['content']  = $this->load->view('inc/booklist', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

   } 


    public function editbook($bookid){
    $data['title']    = 'Edit Book ';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['departmentdata'] = $this->dep_model->getAllDepartmentData();
    $data['authordata'] = $this->author_model->getAllAuthorData();
    $data['bookbyid'] = $this->book_model->bookById($bookid);
    
    $data['content']  = $this->load->view('inc/editbook', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

   }




   public function updateBookForm(){
   	$data['bookid'] = $this->input->post('bookid');
    $data['bookname'] = $this->input->post('bookname');
    $data['dep'] = $this->input->post('dep');
    $data['author'] = $this->input->post('author');
    $data['totalbook'] = $this->input->post('totalbook');
 
    $bookid = $data['bookid'];
    $bookname = $data['bookname'];
    $dep = $data['dep'];
    $author = $data['author'];
    $totalbook = $data['totalbook'];
  
    if (empty($bookname) && empty($dep) && empty($author) && empty($totalbook)) {
     $sdata = array();
     $sdata['msg'] = '<span style="color:red"> Field must not be Empty </span>';
       $this->session->set_flashdata($sdata);
       redirect("book/editbook/".$bookid);

    }else {
       $this->book_model->updateBook($data);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Book Updated Successfully </span>';
       $this->session->set_flashdata($sdata);
         redirect("book/editbook/".$bookid);
      
    } 
   }


       public function delbook($bookid){
       $this->book_model->delBookById($bookid);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Data Deleted Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("book/booklist");


 }


}

?>