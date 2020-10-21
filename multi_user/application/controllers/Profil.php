<?php
 
class Profil extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_model');
        $this->load->model('agama_model');
        $this->load->model('jurusan_model');
        $this->load->library('form_validation');
        $this->cek_status();
    }
 
    public function index()
    {
        if($this->session->userdata('id_level')=='Admin') {
            $data['profil'] = $this->profil_model->get_all();
            $this->load->view('category/profil', $data);
        } else {
            $email=$this->session->userdata('email');
            $data['profil']=$this->profil_model->get_user($email);
            $data['agama'] = $this->agama_model->get_agama();
            $data['jurusan'] = $this->jurusan_model->get_jurusan();
            $this->load->view('category/profil',$data);
        }
    }

    public function add()
    {
        $post=$this->input->post();
        $validation = $this->form_validation;

        $validation->set_rules('username','Username','required');
        $validation->set_rules('password','Password','required');
        $validation->set_rules('nama','Nama','required');
        $validation->set_rules('email','Email','required');
        $validation->set_rules('kd_agama','Agama','required');
        $validation->set_rules('kd_jurusan','Jurusan','required');
        $validation->set_rules('alamat','Alamat','required');

        if($validation->run() == FALSE){
            $errors = $validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $post);
            $this->load->view('profil/new_profil');
        }else {
            $username=$post['username'];
            $password=$post['password'];
            $nama=$post['nama'];
            $email=$post['email'];
            $kd_agama=$post['kd_agama'];
            $kd_jurusan=$post['kd_jurusan'];
            $alamat=$post['alamat'];

            $data=array(
                'id_user'=>$id_user,
                'username'=>$username,
                'password'=>$password,
                'nama'=>$nama,
                'email'=>$email,
                'kd_agama'=>$kd_agama,
                'kd_jurusan'=>$kd_jurusan,
                'alamat'=>$alamat
            );
            $profil = $this->profil_model;
            $insert = $profil->save($data);

            if($insert){
                $this->session->set_flashdata('success','berhasil disimpan');
                $this->load->view('profil/new_profil');
            }
        }
    }

    public function edit($username = null)
    {
        if(!isset($username)) redirect('profil');

        $post=$this->input->post();
        $validation = $this->form_validation;

        $validation->set_rules('username','Username','required');
        $validation->set_rules('password','Password','required');
        $validation->set_rules('nama','Nama','required');
        $validation->set_rules('email','Email','required');
        $validation->set_rules('kd_agama','Agama','required');
        $validation->set_rules('kd_jurusan','Jurusan','required');
        $validation->set_rules('alamat','Alamat','required');
        if($validation->run() == FALSE){
            $errors = $validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $post);
            $profil = $this->profil_model;
            $data['profil'] = $profil->get_one($username);
            $data['agama'] = $this->agama_model->get_agama();
            $data['jurusan'] = $this->jurusan_model->get_jurusan();
            if(!$data['profil']) show_404();
            $this->load->view('profil/edit_profil',$data);
        }else{
            $id_user=$post['id_user'];
            $username=$post['username'];
            $password=$post['password'];
            $nama=$post['nama'];
            $email=$post['email'];
            $kd_agama=$post['kd_agama'];
            $kd_jurusan=$post['kd_jurusan'];
            $alamat=$post['alamat'];

            $data=array(
                'id_user'=>$id_user,
                'username'=>$username,
                'password'=>$password,
                'nama'=>$nama,
                'email'=>$email,
                'kd_agama'=>$kd_agama,
                'kd_jurusan'=>$kd_jurusan,
                'alamat'=>$alamat
            );

            $profil = $this->profil_model;
            $update = $profil->update($data,$username);

            if($update){
                $this->session->set_flashdata('success','berhasil disimpan');
                $data['profil'] = $profil->get_one($username);
                $data['agama'] = $this->agama_model->get_agama();
                $data['jurusan'] = $this->jurusan_model->get_jurusan();
                $this->load->view('profil/edit_profil',$data);
            }
        } 
    }

    public function delete($email = null)
    {
        if(!isset($email)) show_404();

        if($this->profil_model->delete($email))
        {
        redirect(site_url('profil'));
        }
    }
}
