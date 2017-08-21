<?php
    class login extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('m_login');
            $this->load->library(array('form_validation','session'));
            $this->load->database();
            $this->load->helper('url');
        }
        public function index(){
            $session = $this->session->userdata('Login');
            if($session !='berhasil'){
                $this->load->view('header');
                $this->load->view('home');
                $this->load->view('footer');
            }else{
                redirect('user/welcome');
            }
        }
        public function login_form(){
            if ($this->session->userdata('Login')== 'berhasil') {
                redirect('user/welcome');
            }
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('npm', 'NPM', 'required|trim');
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if($this->form_validation->run()==FALSE){
                $this->load->view('header');
                $this->load->view('home');
                $this->load->view('footer');
            }else{
                $username = $this->input->post('username');
                $npm = $this->input->post('npm');
                $cek= $this->m_login->getPengguna($username, $npm,1);

                if($cek->num_rows() == 1) {

                    foreach ($cek->result() as $c) {
                            $data_user['Login']       = 'berhasil';
                            $data_user['username']    = $c->username;
                            $data_user['id_user']     = $c->id_user;
                            $data_user['nama']        = $c->nama;
                            //$data_user['kelas']       = $c->kelas;
                            $data_user['level']       = $c->level;

                        }
                        if($data_user['level']==1){
                            $this->session->set_userdata($data_user);
                            redirect('user/welcome');
                        } else {
                         echo " <script>
                                    alert('Gagal Login: Cek username dan password anda sebelumnya lakukan konfirmasi pembayaran!');
                                    history.go(-1);
                                </script>";
                        }
                }else{
                    echo " <script>
                            alert('Gagal Login: Cek username dan password anda sebelumnya lakukan konfirmasi pembayaran!');
                            history.go(-1);
                        </script>";
                }
            }
        }
        public function logout(){
            $this->session->sess_destroy();
            redirect('user/login','refresh');
        }
    }
?>
