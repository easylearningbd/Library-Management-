 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
   
   public function __construct(){
       parent::__construct();
        $this->load->model('student_model');
        $this->load->model('user_model');
        $data = array(); 
   } 

public function login(){
   
    $this->load->view('login');

   }


 public function loginForm(){
 	$data = array();
 	$data['user'] = $this->input->post('user');
    $data['pass'] = $this->input->post('pass');
    $check = $this->user_model->checkUser($data);
    if ($check) {
    	$sdata = array();
    	$sdata['userid'] =  $check->userid;
    	$sdata['userlogin'] = TRUE;
    	$this->session->set_userdata($sdata);
    	redirect('Library'); 
    }else{
       $sdata = array();
       $sdata['msg'] = '<span style="color:red">User Name or pw not match </span>';
       $this->session->set_flashdata($sdata);
       redirect("user/login"); 
    } 
 }

 public function logout(){
 	$this->session->unset_userdata($userid);
 	$this->session->set_userdata('userlogin', FALSE);
 	$this->session->sess_destroy();
 	redirect("user/login"); 



 }



}

?>