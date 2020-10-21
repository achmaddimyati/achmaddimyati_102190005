<?php
 
class Auth_model extends CI_Model
{
 
    public function cek_login($email){
        $this->db->where('email', $email);
        $hasil = $this->db->get('user');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }
    
    // public function cek_login($email){
    //     $this->db->where('email', $email);
    //     $hasil = $this->db->get('user');
    //     if($hasil->num_rows() > 0){
    //         return $hasil->row();
    //     } else {
    //         return array();
    //     }
    // }

    public function join2table()
    {
        $this->db->select('*');
        $this->db->from('level');
        $this->db->join('user','user.id_level=level.id_level');
        $data= $this->db->get();
        return $data;

    }
 
    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}
?>