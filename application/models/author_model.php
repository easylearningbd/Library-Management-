<?php
class Author_Model extends CI_Model{

public function saveAuthor($data){
$this->db->insert('tbl_author', $data);

}

public function getAllAuthorData(){ 
     $this->db->select('*');
     $this->db->from('tbl_author');
     $this->db->order_by('autid', 'desc');
     $qresult =  $this->db->get(); 
     $result = $qresult->result();
     return $result;

}

public function getAuthorById($id){
	 $this->db->select('*');
     $this->db->from('tbl_author');
     $this->db->where('autid', $id);
     $qresult =  $this->db->get(); 
     $result = $qresult->row();
     return $result; 
 
}

 public function updateAuthor($data){
   $this->db->set('autname', $data['autname']);
   $this->db->where('autid', $data['autid']);
   $this->db->update('tbl_author');

 }

 public function delAuthorById($id){
  $this->db->where('autid', $id);
  $this->db->delete('tbl_author');

 }

public function getAllAuthor($adepid){
     $this->db->select('*');
     $this->db->from('tbl_author');
     $this->db->where('autid', $adepid);
     $qresult =  $this->db->get(); 
     $result = $qresult->row();
     return $result; 

  }


 
}