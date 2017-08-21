<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

class Welcome extends CI_Controller {
  public function __construct()
  {
	parent::__construct();
  $this->load->model(array('m_admin','admin_kursus','m_login','admin_peserta','m_kursus'));
  $this->load->database();
  }

  function index()
  {
       if($this->session->userdata('level') != 2){
            redirect('login');
        }else{
            $this->load->model('m_admin');
            $user = $this->session->userdata('username');
            $this->data['level'] = $this->session->userdata('level');
            $this->data['pengguna'] = $this->m_admin->data($user);
            $this->data['kursus'] = $this->m_admin->data_jumlah_kursus();
            $this->data['peserta'] = $this->m_admin->data_jumlah_peserta();
            $this->load->view('admin/header',$this->data);
            $this->load->view('admin/index',$this->data);
            $this->load->view('admin/footer');
        }
  }
  function kursus()
  {
    $query = $this->admin_kursus->selectAll();
    $data['kursus'] = $query;
    $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_admin->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/kursus',$data);
    $this->load->view('admin/footer');
  }

  function laboratorium()
  {
    $query = $this->admin_kursus->selectLaboratorium();
    $data['laboratorium'] = $query;
    $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_admin->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/laboratorium',$data);
    $this->load->view('admin/footer');
  }

  function tambah_data()
  {
    //$data['kursus']=$this->admin_kursus->tambah_kursus();
    $user = $this->session->userdata('username');
    $this->data['pengguna'] = $this->m_login->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/form_tambah');
    $this->load->view('admin/footer');
  }

  function tambah_data_lab()
  {
    //$data['kursus']=$this->admin_kursus->tambah_kursus();
    $user = $this->session->userdata('username');
    $this->data['pengguna'] = $this->m_login->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/form_tambah_lab');
    $this->load->view('admin/footer');
  }

  function tambah_data_akun_sosial()
  {
    //$data['kursus']=$this->admin_kursus->tambah_kursus();
    $user = $this->session->userdata('username');
    $this->data['pengguna'] = $this->m_login->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/form_tambah_akun_sosial');
    $this->load->view('admin/footer');
  }

  function tambah_data_rekening()
  {
    //$data['kursus']=$this->admin_kursus->tambah_kursus();
    $user = $this->session->userdata('username');
    $this->data['pengguna'] = $this->m_login->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/form_tambah_rekening');
    $this->load->view('admin/footer');
  }

  function tambah_kursus()
  {
    $nama_kursus=$this->input->post('nama_kursus');
    $lepkom=$this->input->post('lepkom');
    $periode=$this->input->post('periode');
    $harga=$this->input->post('harga');
    $kuota=$this->input->post('kuota');
    $this->admin_kursus->tambah_kursus($nama_kursus,$lepkom,$periode,$harga,$kuota);
    redirect('admin/welcome/kursus');
  }

  function tambah_laboratorium()
  {
    $nama_lab=$this->input->post('nama_lab');
    $this->admin_kursus->tambah_laboratorium($nama_lab);
    redirect('admin/welcome/laboratorium');
  }

  function tambah_akun_sosial()
  {
    $email=$this->input->post('email');
    $chat_id_telegram=$this->input->post('chat_id_telegram');
    $this->admin_kursus->tambah_akun_sosial($email,$chat_id_telegram);
    redirect('admin/welcome/akun_sosial');
  }

  function tambah_rekening()
  {
    $no_rekening=$this->input->post('no_rekening');
    $bank=$this->input->post('bank');
    $this->admin_kursus->tambah_rekening($no_rekening,$bank);
    redirect('admin/welcome/rekening');
  }

  function hapus($id)
  {
        $this->admin_kursus->delete($id);
        redirect('admin/welcome/kursus');
  }

  function hapus_lab($id_lab)
  {
        $this->admin_kursus->delete_lab($id_lab);
        redirect('admin/welcome/laboratorium');
  }
  function hapus_akun_sosial($id_akun)
  {
        $this->admin_kursus->delete_akun_sosial($id_akun);
        redirect('admin/welcome/akun_sosial');
  }

  function hapus_rekening($id_akun)
  {
        $this->admin_kursus->delete_rekening($id_akun);
        redirect('admin/welcome/rekening');
  }

  function ubah($id)
  {
        if($_POST==NULL) {
            $data['dt_kursus'] = $this->admin_kursus->select($id);
            $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
            $this->load->view('admin/header',$this->data);
            $this->load->view('admin/edit_form_tambah',$data);
            $this->load->view('admin/footer');
        }else {
            $nama_kursus=$this->input->post('nama_kursus');
            $lepkom=$this->input->post('lepkom');
            $periode=$this->input->post('periode');
            $harga=$this->input->post('harga');
            $kuota=$this->input->post('kuota');
            $this->admin_kursus->update($id,$nama_kursus,$lepkom,$periode,$harga,$kuota);
            redirect('admin/welcome/kursus');
        }
  }

  function ubah_lab($id_lab)
  {
        if($_POST==NULL) {
            $data['laboratorium'] = $this->admin_kursus->selectLab($id_lab);
            $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
            $this->load->view('admin/header',$this->data);
            $this->load->view('admin/edit_form_tambah_lab',$data);
            $this->load->view('admin/footer');
        }else {
            $nama_lab=$this->input->post('nama_lab');
            $this->admin_kursus->update_lab($id_lab,$nama_lab);
            redirect('admin/welcome/laboratorium');
        }
  }

  function ubah_akun_sosial($id_akun)
  {
        if($_POST==NULL) {
            $data['akun_sosial'] = $this->admin_kursus->selectAkun($id_akun);
            $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
            $this->load->view('admin/header',$this->data);
            $this->load->view('admin/edit_form_tambah_akun_sosial',$data);
            $this->load->view('admin/footer');
        }else {
            $email=$this->input->post('email');
            $chat_id_telegram=$this->input->post('chat_id_telegram');
            $this->admin_kursus->update_akun_sosial($id_akun,$email,$chat_id_telegram);
            redirect('admin/welcome/akun_sosial');
        }
  }

  function ubah_rekening($id_akun)
  {
        if($_POST==NULL) {
            $data['rekening'] = $this->admin_kursus->selectRekening($id_akun);
            $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
            $this->load->view('admin/header',$this->data);
            $this->load->view('admin/edit_form_tambah_rekening',$data);
            $this->load->view('admin/footer');
        }else {
            $no_rekening=$this->input->post('no_rekening');
            $bank=$this->input->post('bank');
            $this->admin_kursus->update_rekening($id_akun,$no_rekening,$bank);
            redirect('admin/welcome/rekening');
        }
  }

  function ubah_cek_pembayaran($id,$id_user)
  {
        if($_POST==NULL) {
            $data['peserta'] = $this->admin_peserta->select($id);
            $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
            $this->load->view('admin/header',$this->data);
            $this->load->view('admin/edit_peserta_cek_pembayaran',$data);
            $this->load->view('admin/footer');
        }else {
            $berhasil = $this->admin_peserta->update_cek_pembayaran($id,$id_user);
            $nama=$this->input->post('nama');
            $id_pembayaran=$this->input->post('id_pembayaran');
            $no_transaksi=$this->input->post('no_transaksi');
            $nm_kursus=$this->input->post('nm_kursus');
            $harga_pelatihan=$this->input->post('harga_pelatihan');
            $kuota=$this->input->post('kuota');
            $periode=$this->input->post('periode');
            $email=$this->input->post('email');
            $chat_id=$this->input->post('chat_id');
            $messagedikirim = 'Terima Kasih '.$nama.' Telah Melakukan Konfirmasi Pembayaran ID ' . $id_pembayaran . ' dengan nomor transaksi ' . $no_transaksi . ' untuk Pelatihan ' . $nm_kursus . ' pada tanggal ' . $periode . ' dengan harga pelatihan Rp. ' . number_format($kuota*$harga_pelatihan,0, ',' , '.').'. dan kuota peserta ' . $kuota . '. Silahkan login untuk memastikan bahwa anda telah berhasil registrasi dan masuk ke sistem kami.';
            if ($berhasil)
            {
    				$mail             = new PHPMailer();
    				$mail->IsSMTP(); // telling the class to use SMTP
    				//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
    																									 // 1 = errors and messages
    																									 // 2 = messages only
    				$mail->SMTPAuth   = true;                  // enable SMTP authentication
    				$mail->SMTPSecure = "tls";
    				$mail->Host       = "smtp.gmail.com";      // SMTP server
    				$mail->Port       = 587;                   // SMTP port
    				$mail->Username   = "yosua@live.undip.ac.id";  // username
    				$mail->Password   = "S3m4r4ng";            // password

    				$mail->SetFrom('upt_puskom@undip.ac.id', 'UPT Puskom UNDIP');

    				$mail->Subject    = "Pendaftaran Pelatihan $nm_kursus";
    				$mail->MsgHTML($messagedikirim);

    				$mail->AddAddress($email, $nm_peserta);
            $data['email'] = $this->admin_kursus->getAkunSosial();
            foreach ($data['email'] as $emailsent)
            {
            $mail->AddAddress($emailsent['email'],'CC ke Puskom');
            }
            $mail->Send();
    				//$mail->AddAddress('upt_puskom@undip.ac.id','CC ke Puskom');
    				//Telegram
    				$token = "bot412746341:AAEpSzMlVa7LRk3zEf4EKgouyRgh7c2LBTU";
    				//$chatid = "293078439";
            $data['telegram'] = $this->admin_kursus->getAkunSosial();
            foreach ($data['telegram'] as $telegramsent)
            {
    				$url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $telegramsent['chat_id_telegram'];
    				$url = $url . "&text=" . urlencode($messagedikirim);
    				    $ch = curl_init();
    				    $optArray = array(
    				            CURLOPT_URL => $url,
    				            CURLOPT_RETURNTRANSFER => true
    				    );
    				    curl_setopt_array($ch, $optArray);
    				    $telegram = curl_exec($ch);
    				    curl_close($ch);
            }
    				if ($chat_id!='')
    				{
    				$url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $chat_id;
    				$url = $url . "&text=" . urlencode($messagedikirim);
    				    $ch = curl_init();
    					  $optArray = array(
    					          CURLOPT_URL => $url,
    					          CURLOPT_RETURNTRANSFER => true
    					  );
    					  curl_setopt_array($ch, $optArray);
    					  $telegram = curl_exec($ch);
    					  curl_close($ch);
    				}
    				if($berhasil)
    				{
    					echo '<script>
    					alert("Anda Sudah Berhasil Mengaktifkan Peserta");
    					window.location="'. site_url('admin/welcome/cek_pembayaran') . '";
    					</script>';
    				}
    				else
    				{
              echo '<script>
    					alert("Mohon maaf anda belum berhasil mengaktifkan peserta");
    					window.location="'. site_url('admin/welcome/cek_pembayaran') . '";
    					</script>';
    				}
          }
    				else {
    					echo '<script>
    					alert("Mohon maaf anda belum berhasil mengaktifkan peserta");
    					window.location="'. site_url('admin/welcome/cek_pembayaran') . '";
    					</script>';
    				}
            //redirect('admin/welcome/cek_pembayaran');
        }
  }

function lock_kursus($id){
            $status=1;
            $this->admin_kursus->lock_kursus($id,$status);
            redirect('admin/welcome/kursus');

}

function unlock_kursus($id){
            $status=0;
            $this->admin_kursus->unlock_kursus($id,$status);
            redirect('admin/welcome/kursus');

}

  function peserta()
  {
    $query = $this->admin_peserta->selectPelatihan();
    $data['peserta']=$query;
    $user = $this->session->userdata('username');
    $this->data['pengguna'] = $this->m_login->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/peserta',$data);
    $this->load->view('admin/footer');
  }

  function peserta_custom()
  {
    $query = $this->admin_peserta->selectPelatihanCustom();
    $data['peserta']=$query;
    $user = $this->session->userdata('username');
    $this->data['pengguna'] = $this->m_login->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/peserta_custom',$data);
    $this->load->view('admin/footer');
  }

  function cek_pembayaran()
  {
    $query = $this->admin_peserta->selectCekPembayaran();
    $data['peserta']=$query;
    $user = $this->session->userdata('username');
    $this->data['pengguna'] = $this->m_login->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/cek_pembayaran',$data);
    $this->load->view('admin/footer');
  }

  function akun_sosial()
  {
    $query = $this->admin_peserta->selectAkunSosial();
    $data['akun_sosial']=$query;
    $user = $this->session->userdata('username');
    $this->data['pengguna'] = $this->m_login->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/akun_sosial',$data);
    $this->load->view('admin/footer');
  }

  function rekening()
  {
    $query = $this->admin_peserta->selectRekening();
    $data['rekening']=$query;
    $user = $this->session->userdata('username');
    $this->data['pengguna'] = $this->m_login->data($user);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/rekening',$data);
    $this->load->view('admin/footer');
  }

  function hapus_ps($id)
  {
        $this->admin_peserta->delete($id);
        redirect('admin/welcome/peserta');
  }
  function ubah_ps($id)
  {
         if($_POST==NULL) {
            $data['peserta'] = $this->admin_peserta->select($id);
            $query = $this->m_kursus->selectAll();
        		$data['kursus'] = $query;
            $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
            $this->load->view('admin/header',$this->data);
            $this->load->view('admin/edit_peserta',$data);
            $this->load->view('admin/footer');
        }else {
            $nama=$this->input->post('nama');
            $institusi=$this->input->post('institusi');
            $nm_kursus=$this->input->post('nm_kursus');
            $harga_pelatihan=$this->input->post('harga_pelatihan');
            $kuota=$this->input->post('kuota');
            $periode=$this->input->post('periode');
            $email=$this->input->post('email');
            $chat_id=$this->input->post('chat_id');
            $tempat_lahir=$this->input->post('tempat_lahir');
            $tanggal_lahir=$this->input->post('tanggal_lahir');
            $alamat=$this->input->post('alamat');
            $no_telp=$this->input->post('no_telp');
            $this->admin_peserta->update($id,$nama,$institusi,$nm_kursus,$harga_pelatihan,$kuota,$periode,$email,$chat_id,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp);
            redirect('admin/welcome/peserta');
        }
  }

  function ubah_ps_custom($id)
  {
         if($_POST==NULL) {
            $data['peserta'] = $this->admin_peserta->select($id);
            $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
            $this->load->view('admin/header',$this->data);
            $this->load->view('admin/edit_peserta_custom',$data);
            $this->load->view('admin/footer');
        }else {
            $nama=$this->input->post('nama');
            $institusi=$this->input->post('institusi');
            $nm_kursus=$this->input->post('nm_kursus');
            $harga_pelatihan=$this->input->post('harga_pelatihan');
            $kuota=$this->input->post('kuota');
            $periode=$this->input->post('periode');
            $email=$this->input->post('email');
            $chat_id=$this->input->post('chat_id');
            $tempat_lahir=$this->input->post('tempat_lahir');
            $tanggal_lahir=$this->input->post('tanggal_lahir');
            $alamat=$this->input->post('alamat');
            $no_telp=$this->input->post('no_telp');
            $id_pembayaran=$this->input->post('id_pembayaran');
            $rekening = $this->m_kursus->get_rekening();
            $no_rekening = $rekening->no_rekening;
            $bank = $rekening->bank;
            $berhasil = $this->admin_peserta->update_custom($id,$nama,$institusi,$nm_kursus,$harga_pelatihan,$kuota,$periode,$email,$chat_id,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp);
            $messagedikirim = 'Terima Kasih '.$nama.' Telah Mendaftar Pelatihan Custom dengan ID <b>' . $id_pembayaran . '</b> untuk Pelatihan ' . $nm_kursus . ' pada tanggal ' . $periode . ', bisa dilakukan pembayaran pada rekening <b>'. $bank . '</b> dengan No. Rekening <b>' . $no_rekening . '</b>. Kami menawarkan harga pelatihan sebesar Rp. ' . number_format($kuota*$harga_pelatihan,0, ',' , '.').'. Bila anda telah setuju silahkan melakukan konfirmasi pembayaran dan bila ingin menghubungi kami lebih lanjut bisa langsung chatting di bagian Click to chat.';
            $messagedikirimtele = 'Terima Kasih '.$nama.' Telah Mendaftar Pelatihan Custom dengan ID ' . $id_pembayaran . ' untuk Pelatihan ' . $nm_kursus . ' pada tanggal ' . $periode . ', bisa dilakukan pembayaran pada rekening '. $bank . ' dengan No. Rekening ' . $no_rekening . '. Kami menawarkan harga pelatihan sebesar Rp. ' . number_format($kuota*$harga_pelatihan,0, ',' , '.').'. Bila anda telah setuju silahkan melakukan konfirmasi pembayaran dan bila ingin menghubungi kami lebih lanjut bisa langsung chatting di bagian Click to chat.';
    				$mail             = new PHPMailer();
    				$mail->IsSMTP(); // telling the class to use SMTP
    				//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
    																									 // 1 = errors and messages
    																									 // 2 = messages only
    				$mail->SMTPAuth   = true;                  // enable SMTP authentication
    				$mail->SMTPSecure = "tls";
    				$mail->Host       = "smtp.gmail.com";      // SMTP server
    				$mail->Port       = 587;                   // SMTP port
    				$mail->Username   = "yosua@live.undip.ac.id";  // username
    				$mail->Password   = "S3m4r4ng";            // password

    				$mail->SetFrom('upt_puskom@undip.ac.id', 'UPT Puskom UNDIP');

    				$mail->Subject    = "Pendaftaran Pelatihan $nm_kursus";
    				$mail->MsgHTML($messagedikirim);

    				$mail->AddAddress($email, $nm_peserta);
            $data['email'] = $this->admin_kursus->getAkunSosial();
            foreach ($data['email'] as $emailsent)
            {
            $mail->AddAddress($emailsent['email'],'CC ke Puskom');
            }
            $mail->Send();
    				//$mail->AddAddress('upt_puskom@undip.ac.id','CC ke Puskom');
    				//Telegram
    				$token = "bot412746341:AAEpSzMlVa7LRk3zEf4EKgouyRgh7c2LBTU";
    				//$chatid = "293078439";
            $data['telegram'] = $this->admin_kursus->getAkunSosial();
            foreach ($data['telegram'] as $telegramsent)
            {
    				$url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $telegramsent['chat_id_telegram'];
    				$url = $url . "&text=" . urlencode($messagedikirimtele);
    				    $ch = curl_init();
    				    $optArray = array(
    				            CURLOPT_URL => $url,
    				            CURLOPT_RETURNTRANSFER => true
    				    );
    				    curl_setopt_array($ch, $optArray);
    				    $telegram = curl_exec($ch);
    				    curl_close($ch);
            }
    				if ($chat_id!='')
    				{
    				$url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $chat_id;
    				$url = $url . "&text=" . urlencode($messagedikirimtele);
    				    $ch = curl_init();
    					  $optArray = array(
    					          CURLOPT_URL => $url,
    					          CURLOPT_RETURNTRANSFER => true
    					  );
    					  curl_setopt_array($ch, $optArray);
    					  $telegram = curl_exec($ch);
    					  curl_close($ch);
    				}
    				if($berhasil)
    				{
    					echo '<script>
    					alert("Anda Sudah Berhasil Mengkonfirmasi Pelatihan Custom");
    					window.location="'. site_url('admin/welcome/peserta_custom') . '";
    					</script>';
    				}
    				else {
    					echo '<script>
    					alert("Mohon maaf anda belum berhasil mengkonfirmasi pelatihan custom");
    					window.location="'. site_url('admin/welcome/peserta_custom') . '";
    					</script>';
    				}
            //redirect('admin/welcome/peserta_custom');
        }
  }

  function login()
  {
    $session = $this->session->userdata('isLogin');
      if($session == FALSE)
      {
          $this->load->view('admin/index');
      }else
      {
          redirect('admin/welcome');
      }
  }
  function logout()
  {
    $this->session->unset_userdata('Login');
    redirect('welcome','refresh');
  }
  function ganti_password()
   {
     $data['title']="Ubah Password";
     //$data['d_peserta']=$this->m_kursus->ambil();
     $user = $this->session->userdata('username');
     $this->data['pengguna'] = $this->m_login->data($user);
     $data['pengguna'] = $this->m_login->data($user);
     $this->load->view('admin/header',$this->data);
     $this->load->view('admin/ganti_password', $data);
     $this->load->view('admin/footer');
   }

   function ubah_password($id_user)
    {
      $password_lama=$this->input->post('password_lama');
      $password_baru=$this->input->post('password_baru');
      $password = md5($password_lama);
      $berhasil = $this->m_kursus->cek_password_lama($id_user,$password,$password_baru);
      if ($berhasil)
      {
        echo '<script>
        alert("Anda Sudah Berhasil Melakukan Penggantian Password");
        window.location="'. site_url('admin/welcome/index') . '";
        </script>';
      }
      else {
        echo '<script>
        alert("Password lama anda salah, Anda Gagal dalam Melakukan Penggantian Password");
        window.location="'. site_url('admin/welcome/ganti_password') . '";
        </script>';
      }
    }
    function cetak_kartu($id)
    {
      $data['dt_peserta'] = $this->m_kursus->select($id);
      $user = $this->session->userdata('username');
      $this->data['pengguna'] = $this->m_login->data($user);
      $this->load->view('admin/header_report',$this->data);
      $this->load->view('admin/kartu_peserta', $data);
      $this->load->view('admin/footer');
    }
    function report_pemasukan()
    {
      $data['peserta'] = $this->m_kursus->get_peserta_report();
      $data['total_pemasukan'] = $this->m_kursus->get_total_pemasukan();
      $user = $this->session->userdata('username');
      $this->data['pengguna'] = $this->m_login->data($user);
      $this->load->view('admin/header_report_pemasukan',$this->data);
      $this->load->view('admin/report_pemasukan', $data);
      $this->load->view('admin/footer');
    }

    function form_report_pemasukan()
    {
      $user = $this->session->userdata('username');
      $this->data['pengguna'] = $this->m_login->data($user);
      $this->load->view('admin/header',$this->data);
      $this->load->view('admin/form_report_pemasukan');
      $this->load->view('admin/footer');
    }

    function report_pemasukan_tanggal()
    {
      $tgl_awal = $this->input->post('tgl_awal');
      $tgl_akhir = $this->input->post('tgl_akhir');
      $data['peserta'] = $this->m_kursus->get_peserta_report_tanggal($tgl_awal,$tgl_akhir);
      $data['total_pemasukan'] = $this->m_kursus->get_total_pemasukan_tanggal($tgl_awal,$tgl_akhir);
      $user = $this->session->userdata('username');
      $this->data['pengguna'] = $this->m_login->data($user);
      $this->load->view('admin/header_report_pemasukan',$this->data);
      $this->load->view('admin/report_pemasukan', $data);
      $this->load->view('admin/footer');
    }
}
