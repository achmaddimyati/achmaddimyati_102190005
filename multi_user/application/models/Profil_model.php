<?php
 
class Profil_model extends CI_model
{
    private $_table = "user";

    public function get_all()
    {
        return $this->db->get($this->_table)->result();
    }

    public function get_user($email)
    {
        return $this->db->get_where($this->_table,['email'=>$email]);
    }

    public function get_one($username)
    {
        return $this->db->get_where($this->_table,['username'=>$username])->row();
    }

    public function save($data)
    {
        return $this->db->insert($this->_table,$data);
    }

    public function update($data,$username)
    {
        return $this->db->update($this->_table,$data,array('username'=>$username));
    }

    public function delete($id_user)
    {
        return $this->db->delete($this->_table,array('id_user'=>$id_user));
    }
}
?>