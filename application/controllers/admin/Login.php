<?php 
    class login extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_admin');
            $this->load->library(array('form_validation','session'));
            $this->load->database();
            $this->load->helper('url');
        }
        public function index(){
            $session = $this->session->userdata('Login');
            if($session !='berhasil'){
                
                $this->load->view('login');
            }else{
                redirect('admin/welcome');
            }
        }
        public function login_form(){
            if ($this->session->userdata('Login')== 'berhasil') {
                redirect('admin/welcome');
            }
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|md5');
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if($this->form_validation->run()==FALSE){
                $this->load->view('login');
            }else{
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $cek= $this->m_admin->getPengguna($username, $password,1);

                if($cek->num_rows() == 1) {

                    foreach ($cek->result() as $c) {
                            $data_user['Login']       = 'berhasil';
                            $data_user['username']    = $c->username;
                            $data_user['id_user']     = $c->id_user;
                            $data_user['nama']        = $c->nama;
                            $data_user['level']       = $c->level;
                            
                        }
                        if($data_user['level']==2){
                            $this->session->set_userdata($data_user);
                            redirect('admin/welcome');
                        } else { 
                         echo " <script>
                                    alert('Gagal Login: Cek username dan password admin!');
                                    history.go(-1);
                                </script>";     
                        }
                }else{
                    echo " <script>
                            alert('Gagal Login: Cek username dan password admin!');
                            history.go(-1);
                        </script>";
                }
            }
        }
        public function logout(){
            $this->session->sess_destroy();
            redirect('admin/login','refresh');
        }
    }
?>