<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
   
   public function __construct(){
       parent::__construct();
        $this->load->model('student_model');
        $this->load->model('dep_model');
        $data = array(); 
   } 
	 
   public function addstudent(){
    $data['title']    = 'Add New Student';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['depdata'] = $this->dep_model->getAllDepartmentData();

    $data['content']  = $this->load->view('inc/studentadd', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

   }

   public function addStudentForm(){
    $data['name'] = $this->input->post('name');
    $data['dep'] = $this->input->post('dep');
    $data['roll'] = $this->input->post('roll');
    $data['reg'] = $this->input->post('reg');
    $data['phone'] = $this->input->post('phone');

    $name = $data['name'];
    $dep = $data['dep'];
    $roll = $data['roll'];
    $reg = $data['reg'];
    $phone = $data['phone'];
    if (empty($name) && empty($dep) && empty($roll) && empty($reg) && empty($phone) ) {
     $sdata = array();
     $sdata['msg'] = '<span style="color:red"> Field must not be Empty </span>';
       $this->session->set_flashdata($sdata);
       redirect("student/addstudent");

    }else {
       $this->student_model->saveStudent($data);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Data Added Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("student/addstudent");
      
    } 
   }


    public function studentlist(){
    $data['title']    = 'Student List ';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['studentdata'] = $this->student_model->getAllStudentData();

    $data['content']  = $this->load->view('inc/liststudent', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

}



  public function editstudent($sid){
    $data['title']    = 'Student List ';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['departmentdata'] = $this->dep_model->getAllDepartmentData();
    $data['stuById'] = $this->student_model->getStudentById($sid);

    $data['content']  = $this->load->view('inc/studentedit', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

}



public function updateStudent(){
    $data['sid'] = $this->input->post('sid');
    $data['name'] = $this->input->post('name');
    $data['dep'] = $this->input->post('dep');
    $data['roll'] = $this->input->post('roll');
    $data['reg'] = $this->input->post('reg');
    $data['phone'] = $this->input->post('phone');


    $sid = $data['sid'];
    $name = $data['name'];
    $dep = $data['dep'];
    $roll = $data['roll'];
    $reg = $data['reg'];
    $phone = $data['phone'];
    if (empty($name) && empty($dep) && empty($roll) && empty($reg) && empty($phone) ) {
     $sdata = array();
     $sdata['msg'] = '<span style="color:red"> Field must not be Empty </span>';
       $this->session->set_flashdata($sdata);
       redirect("student/editstudent/".$sid);

    }else {
       $this->student_model->updateStudentData($data);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Data Updated Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("student/editstudent/".$sid);
      
    } 
   }

 public function delstudent($sid){
       $this->student_model->delStudendById($sid);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Data Deleted Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("student/studentlist"); 
 }
 

}
