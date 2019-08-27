 <?php
class User_Model extends CI_Model{

  public function checkUser($data){
     $this->db->select('*');
     $this->db->from('tbl_user');
     $this->db->where('user', $data['user']);
     $this->db->where('pass', md5($data['pass']));
     $qresult =  $this->db->get(); 
     $user = $qresult->num_rows();
     if ($user === 1) {
     	$result = $qresult->row();
     	return $result;
     }


  }

 
  }

  ?>