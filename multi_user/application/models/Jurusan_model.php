<?php
 
class Jurusan_model extends CI_model
{
    private $_table = "jurusan";

    public function get_jurusan()
    {
        return $this->db->get($this->_table)->result();
    }

    public function get_one($id_jurusan)
    {
        return $this->db->get_where($this->_table,['id_jurusan'=>$id_jurusan])->row();
    }

    public function save($data)
    {
        return $this->db->insert($this->_table,$data);
    }

    public function update($data,$id_jurusan)
    {
        return $this->db->update($this->_table,$data,array('id_jurusan'=>$id_jurusan));
    }

    public function delete($id_jurusan)
    {
        return $this->db->delete($this->_table,array('id_jurusan'=>$id_jurusan));
    }
}
?>