<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
   
   public function __construct(){
       parent::__construct();
        $this->load->model('dep_model');
        $data = array(); 
   }

 public function adddepartment(){
    $data['title']    = 'Add New Department';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['content']  = $this->load->view('inc/departmentadd', '' , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

   }	




    public function addDepartmentForm(){
    $data['depname'] = $this->input->post('depname');
    

    $depname = $data['depname'];
     
    if (empty($depname)) {
     $sdata = array();
     $sdata['msg'] = '<span style="color:red"> Field must not be Empty </span>';
       $this->session->set_flashdata($sdata);
      redirect("department/adddepartment");

    }else {
       $this->dep_model->saveDepartment($data);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Department Added Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("department/adddepartment");
      
    } 
   }



    public function departmentlist(){
    $data['title']    = 'Department List ';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['depdata'] = $this->dep_model->getAllDepartmentData();

    $data['content']  = $this->load->view('inc/listdeperment', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

}

  public function editdepartment($id){
    $data['title']    = 'Edit Department ';
    $data['header']   = $this->load->view('inc/header', $data , TRUE);
    $data['sidebar']  = $this->load->view('inc/sidebar', '' , TRUE);
    $data['devById'] = $this->dep_model->getDepartmentById($id);

    $data['content']  = $this->load->view('inc/depedit', $data , TRUE);
    $data['footer']   = $this->load->view('inc/footer', '' , TRUE);
    $this->load->view('home', $data);

  }

 public function updateDepartment(){
 $data['depid'] = $this->input->post('depid');
  $data['depname'] = $this->input->post('depname');
    

    $depid = $data['depid'];
    $depname = $data['depname'];
     
    if (empty($depname)) {
     $sdata = array();
     $sdata['msg'] = '<span style="color:red"> Field must not be Empty </span>';
       $this->session->set_flashdata($sdata);
     redirect("department/editdepartment/".$depid);

    }else {
       $this->dep_model->updateDepName($data);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Department Updated Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("department/editdepartment/".$depid);
      
    } 

 }


 public function deldepartment($id){
       $this->dep_model->delDepartmentById($id);
       $sdata = array();
       $sdata['msg'] = '<span style="color:green">Data Deleted Successfully </span>';
       $this->session->set_flashdata($sdata);
       redirect("department/departmentlist");

 }


}

?>
	 