<?php
 
class Jurusan extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jurusan_model');
        $this->load->library('form_validation');
        $this->cek_status();
    }
 
    public function index()
    {
        $data['jurusan'] = $this->jurusan_model->get_jurusan();
        $this->load->view('category/jurusan', $data);
    }

    public function add()
    {
        $post=$this->input->post();
        $validation = $this->form_validation;

        $validation->set_rules('nama_jurusan','jurusan','required');
        if($validation->run() == FALSE){
            $errors = $validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $post);
            $this->load->view('jurusan/new_jurusan');
        }else {
            $jurusan=$post['nama_jurusan'];
            $data=array(
                'nama_jurusan'=>$jurusan
            );

            $jurusan = $this->jurusan_model;
            $insert = $jurusan->save($data);
            
            if($insert){
                $this->session->set_flashdata('success','berhasil disimpan');
                $this->load->view('jurusan/new_jurusan');
            }   
        } 
    }

    public function edit($id_jurusan = null)
    {
        if(!isset($id_jurusan)) redirect('jurusan');

        $post=$this->input->post();
        $validation = $this->form_validation;
        
        $validation->set_rules('nama_jurusan','Jurusan','required');
        if($validation->run() == FALSE){
            $errors = $validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $post);
            $jurusan = $this->jurusan_model;
            $data['jurusan'] = $jurusan->get_one($id_jurusan);
            if(!$data['jurusan']) show_404();
            $this->load->view('jurusan/edit_jurusan',$data);
        }else {
            $id_jurusan=$post['id_jurusan'];
            $jurusan=$post['nama_jurusan'];

            $data=array(
                'id_jurusan'=>$id_jurusan,
                'nama_jurusan'=>$jurusan
            );
            $jurusan = $this->jurusan_model;
            $update = $jurusan->update($data,$id_jurusan);

            if($update){
                $this->session->set_flashdata('success','berhasil disimpan');
                $data['jurusan'] = $jurusan->get_one($id_jurusan);
                $this->load->view('jurusan/edit_jurusan',$data);
            }
        } 
    }

    public function delete($id_jurusan = null)
    {
        if(!isset($id_jurusan)) show_404();

        if($this->jurusan_model->delete($id_jurusan)){
            redirect(site_url('jurusan'));
        }
    }
}
