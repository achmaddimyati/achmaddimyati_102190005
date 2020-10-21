<?php
 
class Auth extends CI_Controller
 
{
    public function __construct(){
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
 
    public function index(){
        $this->load->view('auth/login');
    }
 
    public function loginForm(){
        $validation=$this->form_validation;
        $validation->set_rules('email', 'Email', 'required');
        $validation->set_rules('password', 'Password', 'required');
 
        if ($validation->run() == FALSE) {
            $errors = $validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('index.php/auth');  
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $pass = htmlspecialchars($this->input->post('password'));
            $cek_login = $this->auth_model->cek_login($email);
 
            if($cek_login== FALSE){
                $this->session->set_flashdata('error_login', 'Email yang Anda masukan tidak terdaftar.');
                redirect('index.php/auth');
 
            } else {
 
                if(password_verify($pass, $cek_login->password)){
                    $this->session->set_userdata('id_user', $cek_login->id_user);
                    $this->session->set_userdata('nama', $cek_login->nama);
                    $this->session->set_userdata('email', $cek_login->email);
                    $this->session->set_userdata('id_level', $cek_login->id_level); 
                    
                    redirect('/profil');
 
                } else {
 
                    $this->session->set_flashdata('error_login', 'Email atau password yang Anda masukan salah.');
                    redirect('auth');
 
                }
            }
        }
    }
 
    public function register()
    {
 
        $this->load->view('auth/register');
 
    }
 
    public function registerForm()
 
    {
        $validation = $this->form_validation;
        $validation->set_rules('username','Username','required|is_unique[user.username]');
        $validation->set_rules('nama', 'Nama', 'required');
        $validation->set_rules('email', 'Email', 'required|is_unique[user.email]|valid_email');
        $validation->set_rules('password', 'Password', 'required|trim');
        $validation->set_rules('confrim_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        $validation->set_rules('kd_agama','Agama','required');
        $validation->set_rules('kd_jurusan','Jurusan','required');
        $validation->set_rules('alamat', 'Alamat', 'required');
 
        if ($validation->run() == FALSE) {
 
            $errors = $validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('auth/register');
 
        } else {
            
            $username=$this->input->post('username');
            $name = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $agama=$this->input->post('kd_agama');
            $jurusan=$this->input->post('kd_jurusan');
            $alamat=$this->input->post('alamat');
            $level = "User";
 
            $data = [
                'username' => $username,
                'nama' => $name,
                'email' => $email,
                'password' => $pass,
                'kd_agama' => $agama,
                'kd_jurusan' => $jurusan,
                'alamat' => $alamat,
                'id_level' => $level
            ];
 
            $insert = $this->auth_model->register("user", $data);
 
            if($insert){
 
                $this->session->set_flashdata('success_login', 'Sukses, Anda berhasil register. Silahkan login sekarang.');
                redirect('auth');
 
            }
        }
    }
 
    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>
            alert("Sukses!!! Anda berhasil Log Out."); 
            alert("Klik OK ! untuk Kembali ke halaman login"); 
            window.location.href="'.base_url('index.php/auth').'";
            </script>';
    }
}