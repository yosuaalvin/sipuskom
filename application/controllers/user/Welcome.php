<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
class Welcome extends CI_Controller {
  public function __construct()
  {
	parent::__construct();
	$this->load->model(array('m_kursus','m_login'));
  	$this->load->database();
  }

  public function index()
  {
       if($this->session->userdata('level') != 1){
            redirect('login');
        }else{
            $this->load->model('m_login');
            $user = $this->session->userdata('username');
            $this->data['level'] = $this->session->userdata('level');
            $this->data['pengguna'] = $this->m_login->data($user);
            $this->data['kursus'] = $this->m_login->data_jumlah_pelatihan($user);
            $total = $this->m_kursus->count_all();
            $this->load->view('user/header',$this->data);
            $this->load->view('user/index',array('total' => $total),$this->data);
            $this->load->view('user/footer');
        }
  }
//membuat fungsi crud kursus
	function kursus()
	{
	  $id=$this->uri->segment(7);
    $query = $this->m_kursus->selectAll();
   	$data['kursus'] = $this->m_kursus->selectAll($id);
    $data['lock'] = $this->m_kursus->get_lock();
   	$user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
      if($query){
        $data['kursus'] = $query;
        $this->load->view('user/header',$this->data);
        $this->load->view('user/kursus',$data);
        $this->load->view('user/footer');
       }
  }
  function daftar($id_kursus)
  {
        //$nm_kursus=str_replace('%20',' ',$nm_kursus);
        //$data['id_kursus']= $id_kursus;
        $query = $this->m_kursus->selectAll();
        $data['kursus'] = $query;
        $user = $this->session->userdata('username');
        $this->data['pengguna'] = $this->m_login->data($user);
        $this->data['kursus_dipilih'] = $this->m_kursus->selectPelatihan($id_kursus);
        $this->data['dt_peserta'] = $this->m_kursus->selectLastPelatihan($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/daftar_peserta', $data);
        $this->load->view('user/footer');
  }

  function pendaftaran()
  {
        $this->load->view('user/header',$this->data);
        $this->load->view('user/daftar_peserta', $data);
        $this->load->view('user/footer');
  }

  function daftar_peserta()
  {
        $data['title']="Pendaftaran Kursus dan Workshop";
        $npm=$this->input->post('npm');
        $nama=$this->input->post('nm_peserta');
        $kursus=$this->input->post('nm_kursus');
        $kelas=$this->input->post('kelas');
        $jurusan=$this->input->post('jurusan');
        $periode=$this->input->post('periode');
        $this->m_kursus->tambah_peserta($npm,$nama,$kursus,$kelas,$jurusan,$periode);
        redirect('user/welcome/daftar_peserta_kursus');
  }
 function daftar_peserta_kursus()
  {
        $data['title']="List Pelatihan Terdaftar";
        $data['d_peserta']=$this->m_kursus->ambil();
        $user = $this->session->userdata('username');
        $this->data['pengguna'] = $this->m_login->data($user);
        $this->load->view('user/header',$this->data);
        $this->load->view('user/form_daftar', $data);
        $this->load->view('user/footer');
  }
  function hapus($id)
  {
        $peserta = $this->m_kursus->select($id);
        $nama = $peserta->nama;
        $nm_kursus = $peserta->nm_kursus;
        $institusi = $peserta->institusi;
        $harga_pelatihan = $peserta->harga_pelatihan;
        $kuota = $peserta->kuota;
        $periode = $peserta->periode;
        if ($nama!='')
        {
        $messagedikirim = 'Terima Kasih '.$nama.' Anda telah melakukan pembatalan Pelatihan dengan jenis pelatihan ' . $nm_kursus . ' pada tanggal ' . $periode . ' dengan kuota peserta ' . $kuota . ' orang di UPT Puskom UNDIP. ID Pembayaran untuk pelatihan ini akan dihapus dan silahkan gunakan ID Pembayaran baru ketika mendaftar lagi.';
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
        $mail->Password   = "S3m4r4ng123";            // password

        $mail->SetFrom('upt_puskom@undip.ac.id', 'UPT Puskom UNDIP');

        $mail->Subject    = "Pembatalan Pelatihan $nm_kursus";
        $mail->MsgHTML($messagedikirim);

        $mail->AddAddress($email, $nm_peserta);
        $data['email'] = $this->m_kursus->getAkunSosial();
        foreach ($data['email'] as $emailsent)
        {
        $mail->AddAddress($emailsent['email'],'CC ke Puskom');
        }
        //$mail->AddAddress('upt_puskom@undip.ac.id','CC ke Puskom');
        //Telegram
        $token = "bot412746341:AAEpSzMlVa7LRk3zEf4EKgouyRgh7c2LBTU";
        //$chatid = "293078439";
        $data['telegram'] = $this->m_kursus->getAkunSosial();
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
        if($mail->Send() && !$telegram)
        {
          $this->m_kursus->delete($id);
          echo '<script>
          alert("Anda Sudah Berhasil Melakukan Penggantian Data Pelatihan namun pesan telegram tidak terkirim");
          window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
          </script>';
        }
        else if (!$mail->Send() && $telegram)
        {
          $this->m_kursus->delete($id);
          echo '<script>
          alert("Anda Sudah Berhasil Melakukan Penggantian Data Pelatihan namun pesan email tidak terkirim");
          window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
          </script>';
        }
        else if ($mail->Send() && $telegram)
        {
          $this->m_kursus->delete($id);
          echo '<script>
          alert("Anda Sudah Berhasil Melakukan Penggantian Data Pelatihan");
          window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
          </script>';
        }
        else if (!$mail->Send() && !$telegram)
        {
          echo '<script>
          alert("Anda Sudah Berhasil Melakukan Penggantian Data Pelatihan namun pesan email dan telegram tidak terkirim");
          window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
          </script>';
        }
        else {
          echo '<script>
          alert("Mohon maaf anda belum berhasil melakukan penggantian data pelatihan");
          window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
          </script>';
        }
      }
      else
      {
        echo '<script>
        alert("Mohon Maaf Proses Penggantian Gagal, silahkan melakukan proses penggantian lagi");
        window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
        </script>';
      }

        //redirect('user/welcome/daftar_peserta_kursus');
  }
  function ubah($id)
  {
        if($_POST==NULL) {
            $data['title']="Edit Data Peserta";
            $query = $this->m_kursus->selectAll();
            $data['kursus'] = $query;
            $data['dt_peserta'] = $this->m_kursus->select($id);
            $user = $this->session->userdata('username');
            $this->data['pengguna'] = $this->m_login->data($user);
            $this->load->view('user/header',$this->data);
            $this->load->view('user/form_edit_peserta',$data);
            $this->load->view('user/footer');
        }else {
            //$id=$this->input->post('id'); error
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
            $id_pembayaran = substr(md5(uniqid(rand(), true)), 16, 16);
            $berhasil = $this->m_kursus->update($id,$nama,$institusi,$nm_kursus,$harga_pelatihan,$kuota,$periode,$email,$chat_id,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp,$id_pembayaran);
            if ($berhasil)
    				{
    				$messagedikirim = 'Terima Kasih '.$nama.' Anda telah melakukan perubahan Jenis Pelatihan menjadi ' . $nm_kursus . ' pada tanggal ' . $periode . ' dengan kuota peserta ' . $kuota . ' orang di UPT Puskom UNDIP. Berikut merupakan ID Pembayaran yang bisa anda gunakan untuk verifikasi pembayaran. Verifikasi Pembayaran dilakukan dengan memasukkan ID Pembayaran yaitu '. $id_pembayaran . ' dan juga harap masukkan nomor transaksi dari transfer Bank anda.';
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
    				$mail->Password   = "S3m4r4ng123";            // password

    				$mail->SetFrom('upt_puskom@undip.ac.id', 'UPT Puskom UNDIP');

    				$mail->Subject    = "Pendaftaran Pelatihan $nm_kursus";
    				$mail->MsgHTML($messagedikirim);

    				$mail->AddAddress($email, $nm_peserta);
    				$data['email'] = $this->m_kursus->getAkunSosial();
    				foreach ($data['email'] as $emailsent)
    				{
    				$mail->AddAddress($emailsent['email'],'CC ke Puskom');
    				}
    				//$mail->AddAddress('upt_puskom@undip.ac.id','CC ke Puskom');
    				//Telegram
    				$token = "bot412746341:AAEpSzMlVa7LRk3zEf4EKgouyRgh7c2LBTU";
    				//$chatid = "293078439";
    				$data['telegram'] = $this->m_kursus->getAkunSosial();
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
    				if($mail->Send() && !$telegram)
    				{
    					echo '<script>
    					alert("Anda Sudah Berhasil Melakukan Penggantian Data Pelatihan namun pesan telegram tidak terkirim");
    					window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
    					</script>';
    				}
    				else if (!$mail->Send() && $telegram)
    				{
    					echo '<script>
    					alert("Anda Sudah Berhasil Melakukan Penggantian Data Pelatihan namun pesan email tidak terkirim");
    					window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
    					</script>';
    				}
    				else if ($mail->Send() && $telegram)
    				{
    					echo '<script>
    					alert("Anda Sudah Berhasil Melakukan Penggantian Data Pelatihan");
    					window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
    					</script>';
    				}
    				else if (!$mail->Send() && !$telegram)
    				{
    					echo '<script>
    					alert("Anda Sudah Berhasil Melakukan Penggantian Data Pelatihan namun pesan email dan telegram tidak terkirim");
    					window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
    					</script>';
    				}
    				else {
    					echo '<script>
    					alert("Mohon maaf anda belum berhasil melakukan penggantian data pelatihan");
    					window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
    					</script>';
    				}
    			}
    			else
    			{
    				echo '<script>
    				alert("Mohon Maaf Proses Penggantian Gagal, silahkan melakukan proses penggantian lagi");
    				window.location="'. site_url('user/welcome/daftar_peserta_kursus') . '";
    				</script>';
    			}
            //redirect('user/welcome/daftar_peserta_kursus');
        }
  }
  function login()
  {
    $session = $this->session->userdata('isLogin');
      if($session == FALSE)
      {
          $this->load->view('user/index');
      }else
      {
          redirect('user/welcome');
      }
  }
  function logout()
  {
    $this->session->unset_userdata('Login');
    redirect('user/login','refresh');
  }
}
?>
