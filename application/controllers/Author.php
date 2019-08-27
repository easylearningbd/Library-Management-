<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {
   
   public function __construct(){
       parent::__construct();
       $this->load->model('author_model');
        $data = array(); 
   }

  public function addauthor(){
    $data['title']    = 'Add New Author';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['content']  = $this->load->view('inc/authoradd', '' , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);
 
  }

  public function addAuthorForm(){
   $data['autname'] = $this->input->post('autname');
    

    $autname = $data['autname'];
     
    if (empty($autname)) {
     $sdata = array();
     $sdata['msg'] = '<span style="color:red"> Field must not be Empty </span>';
       $this->session->set_flashdata($sdata);
      redirect("author/addauthor");

    }else {
       $this->author_model->saveAuthor($data);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Author Added Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("author/addauthor");
      
    } 

  }

   
 public function authorlist(){
    $data['title']    = 'Author List ';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['autdata'] = $this->author_model->getAllAuthorData();

    $data['content']  = $this->load->view('inc/listauthor', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

 }


  public function editauthor($id){
    $data['title']    = 'Edit Author ';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['autById'] = $this->author_model->getAuthorById($id);

    $data['content']  = $this->load->view('inc/autedit', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

  }

 public function updateAuthor($data){
  $data['autid'] = $this->input->post('autid');
  $data['autname'] = $this->input->post('autname');
    

    $autid = $data['autid'];
    $autname = $data['autname'];
     
    if (empty($autname)) {
     $sdata = array();
     $sdata['msg'] = '<span style="color:red"> Field must not be Empty </span>';
       $this->session->set_flashdata($sdata);
     redirect("author/editauthor/".$autid);

    }else {
       $this->author_model->updateAuthor($data);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Author Updated Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("author/editauthor/".$autid);
      
    } 	 
 }


 public function delauthor($id){
 	   $this->author_model->delAuthorById($id);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Data Deleted Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("author/authorlist");


 }


}

?>