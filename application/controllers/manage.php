<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {
   
   public function __construct(){
       parent::__construct();
        $this->load->model('student_model');
        $this->load->model('book_model');
        $this->load->model('manage_model');
        $this->load->model('dep_model');
        $this->load->model('author_model');
        $data = array(); 
   }

    public function issuebook(){
    $data['title']    = 'Issue Book';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['depdata'] = $this->dep_model->getAllDepartmentData();

    $data['content']  = $this->load->view('inc/issuebook', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

   }


 public function getBookByDepId($dep){
 $getAllBook = $this->manage_model->getBookByDep($dep);
 $output = null;
 $output .='<option value="0"> Select One </option>';
 foreach ($getAllBook as $book) {
 	$output .= '<option value=" '.$book->bookid.' "> '.$book->bookname.' </option>';
 }

 echo $output;

  }


public function addIssueForm(){
    $data['studentname'] = $this->input->post('studentname');
    $data['reg'] = $this->input->post('reg');
    $data['dep'] = $this->input->post('dep');
    $data['book'] = $this->input->post('book');
    $data['return'] = $this->input->post('return');

    $studentname = $data['studentname'];
    $reg = $data['reg'];
    
    if (empty($studentname) && empty($reg)) {
     $sdata = array();
     $sdata['msg'] = '<span style="color:red"> Field must not be Empty </span>';
       $this->session->set_flashdata($sdata);
       redirect("manage/issuebook");

    }else {
       $this->manage_model->saveIssueData($data);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Book Issue Added Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("manage/issuebook");
      
    } 
   }

    public function issuebooklist(){
    $data['title']    = 'Issue Book List';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['issuedata'] = $this->manage_model->getAllIssueData();

    $data['content']  = $this->load->view('inc/issuebooklist', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

   }


    public function dellist($id){
       $this->manage_model->delListById($id);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Data Deleted Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("manage/issuebooklist"); 
 }



     public function viewstudent($reg){
    $data['title']    = 'View Student';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['stubyReg'] = $this->manage_model->getStudentByReg($reg);

    $data['content']  = $this->load->view('inc/viewstudent', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

   }


    public function viewbook($bookid){
    $data['title']    = 'View Student';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['bookbyid'] = $this->book_model->bookById($bookid);

    $data['content']  = $this->load->view('inc/viewbook', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

   }

}

?>