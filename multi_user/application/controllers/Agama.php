<?php
 
class Agama extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('agama_model');
        $this->load->library('form_validation');
        $this->cek_status();
    }
 
    public function index()
    {
        $data['agama'] = $this->agama_model->get_agama();
        $this->load->view('category/agama', $data);
    }

    public function add()
    {
        $post=$this->input->post();
        $validation = $this->form_validation;

        $validation->set_rules('agama','Agama','required');
        if($validation->run() == FALSE){
            $errors = $validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $post);
            $this->load->view('agama/new_agama');
        }else {
            $agama=$post['agama'];
            $data=array(
                'agama'=>$agama
            );
            $agama = $this->agama_model;
            $insert=$agama->save($data);

            if($insert){
                $this->session->set_flashdata('success','berhasil disimpan');
                $this->load->view('agama/new_agama');
            }  
        }
    }

    public function edit($id_agama = null)
    {
        if(!isset($id_agama)) redirect('agama');

        $post=$this->input->post();
        $validation = $this->form_validation;

        $validation->set_rules('agama','Agama','required');
        if($validation->run() == FALSE){
            $errors = $validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $post);
            $agama = $this->agama_model;
            $data['agama'] = $agama->get_one($id_agama);
            if(!$data['agama']) show_404();
            $this->load->view('agama/edit_agama',$data);
        }else {
            $id_agama=$post['id_agama'];
            $agama=$post['agama'];
    
            $data=array(
                'id_agama'=>$id_agama,
                'agama'=>$agama
            );
            $agama = $this->agama_model;
            $update = $agama->update($data,$id_agama);

            if($update){
                $this->session->set_flashdata('success','berhasil disimpan');
                $data['agama'] = $agama->get_one($id_agama);
                $this->load->view('agama/edit_agama',$data); 
            }  
        }
    }

    public function delete($id_agama = null)
    {
        if(!isset($id_agama)) show_404();

        if($this->agama_model->delete($id_agama))
        {
        redirect(site_url('agama'));
        }
    }
}
