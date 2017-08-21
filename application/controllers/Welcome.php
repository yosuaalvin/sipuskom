<?php
require APPPATH.'/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

class Welcome extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
				$this->load->model(array('m_kursus','m_login'));

		}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function pendaftaran()
	{

		$query = $this->m_kursus->selectAll();
		$data['kursus'] = $query;
		$data['pertanyaan'] = $this->m_kursus->get_pertanyaan();
		if($query){
			$data['kursus'] = $query;
			$this->load->view('header');
			$this->load->view('pendaftaran',$data);
		 }

	}

	public function konfirmasi()
	{
			$this->load->view('header');
			$this->load->view('konfirmasi');
	}

	public function lupa_password()
	{
			$this->load->view('header');
			$this->load->view('lupa_password');
	}

	function lupa_password_proses()
	{
		if ($this->input->post('g-recaptcha-response'))
		{
			$secret = '6LebdC0UAAAAAPUXsf9doTvr317GHu2pA_Ii4x9l';
			//get verify response data
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
			$responseData = json_decode($verifyResponse);
			if($responseData->success)
			{
				$email=$this->input->post('email');
				$berhasil = $this->m_kursus->get_lupa_password($email);
				if ($berhasil)
				{
				$data['email'] = $email;
				$data['pertanyaan'] = $this->m_kursus->get_pertanyaan();
				$this->load->view('header');
				$this->load->view('lupa_password_pertanyaan',$data);
			  }
				else
				{
					$this->load->view('header');
					$this->load->view('lupa_password_gagal');
				}
			}
		}
			else
			{
				echo '<script>
				alert("Mohon Maaf recaptcha belum ditekan");
				history.go(-1);
				</script>';
			}
	}

	function lupa_password_proses_pertanyaan()
	{
				$email=$this->input->post('email');
				$id_pertanyaan=$this->input->post('id_pertanyaan');
				$jawaban_pertanyaan=$this->input->post('jawaban_pertanyaan');
				$berhasil = $this->m_kursus->get_cek_jawaban_pertanyaan($email,$id_pertanyaan,$jawaban_pertanyaan);
				$password_asli = substr(md5(uniqid(rand(), true)), 16, 16);
				$npm = $password_asli;
				$password = md5($npm);
				$pengguna = $this->m_kursus->selectLastPelatihan($email);
				$chat_id = $pengguna->chat_id;
				$nm_pengguna = $pengguna->nama;
				if ($berhasil)
				{
					$berhasilmasuk = $this->m_kursus->ganti_password($email,$npm,$password);
          if ($berhasilmasuk)
					{
					$messagedikirim = 'Anda telah berhasil mengganti password anda menjadi '.$npm.'.';

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

					$mail->Subject    = "Reset Password User";
					$mail->MsgHTML($messagedikirim);

					$mail->AddAddress($email, $nm_pengguna);
					$mail->Send();
					//$mail->AddAddress('upt_puskom@undip.ac.id','CC ke Puskom');
					//Telegram
					$token = "bot412746341:AAEpSzMlVa7LRk3zEf4EKgouyRgh7c2LBTU";
					//$chatid = "293078439";

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
					if($berhasilmasuk)
					{
						echo '<script>
						alert("Anda Sudah Berhasil Mengganti Password Anda");
						window.location="'. site_url('welcome') . '";
						</script>';
					}
					else
					{
						echo '<script>
						alert("Mohon maaf anda belum berhasil mengganti Password Anda");
						window.location="'. site_url('welcome/lupa_password') . '";
						</script>';
					}
					}
				}
				else {
					echo '<script>
					alert("Mohon maaf anda belum berhasil mengganti Password Anda");
					window.location="'. site_url('welcome/lupa_password') . '";
					</script>';
				}
		}
	function kursus()
	{
	  $id=$this->uri->segment(7);
    $query = $this->m_kursus->selectAll();
   	$data['kursus'] = $this->m_kursus->selectAll($id);
      if($query){
        $data['kursus'] = $query;
        $this->load->view('header');
        $this->load->view('kursus',$data);
       }
  }

  public function get_harga()
	{
    $nama_kursus = $this->input->post('nama_kursus');
    $data["results"] = $this->m_kursus->get_harga($nama_kursus);
    echo json_encode($data["results"]);
	}

	public function daftar_peserta_pelatihan()
  {
				$nm_peserta=$this->input->post('nm_peserta');
				$institusi=$this->input->post('institusi');
				if ($this->input->post('nm_kursus'))
				{
				$nm_kursus=$this->input->post('nm_kursus');
				}
			  else
				{
				$nm_kursus=$this->input->post('nm_kursus_custom');
			  }
				$harga_pelatihan=$this->input->post('harga_pelatihan');
				$kuota=$this->input->post('kuota');
				$periode=$this->input->post('periode');
				$email=$this->input->post('email');
				$chat_id=$this->input->post('chat_id');
        $password=$this->input->post('password');
				$tempat_lahir=$this->input->post('tempat_lahir');
				$tanggal_lahir=$this->input->post('tanggal_lahir');
				$alamat=$this->input->post('alamat');
				$no_telp=$this->input->post('no_telp');
				$custom=$this->input->post('custom');
				$id_pembayaran = substr(md5(uniqid(rand(), true)), 4, 4);
				$rekening = $this->m_kursus->get_rekening();
				$no_rekening = $rekening->no_rekening;
				$bank = $rekening->bank;
				$id_pertanyaan=$this->input->post('id_pertanyaan');
				$jawaban_pertanyaan=$this->input->post('jawaban_pertanyaan');
				if ($this->input->post('g-recaptcha-response'))
				{
					$secret = '6LebdC0UAAAAAPUXsf9doTvr317GHu2pA_Ii4x9l';
					//get verify response data
					$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
					$responseData = json_decode($verifyResponse);
					if($responseData->success)
					{
        $berhasil = $this->m_kursus->tambah_peserta_pelatihan($nm_peserta,$institusi,$nm_kursus,$harga_pelatihan,$kuota,$periode,$email,$chat_id,$password,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp,$id_pembayaran,$id_pertanyaan,$jawaban_pertanyaan,$custom);
				//Email
				if ($berhasil)
				{
				if ($custom==0)
				{
				$messagedikirim = 'Terima Kasih '.$nm_peserta.' Telah Mendaftar Pelatihan ' . $nm_kursus . ' pada tanggal ' . $periode . ' dengan kuota peserta ' . $kuota . ' orang di UPT Puskom UNDIP. Biaya yang harus dibayarkan sebesar Rp. ' . number_format($kuota*$harga_pelatihan,0, ',' , '.').', bisa dilakukan pembayaran pada rekening <b>'. $bank . '</b> dengan No. Rekening <b>' . $no_rekening . '</b>. Verifikasi Pembayaran dilakukan dengan memasukkan ID Pembayaran yaitu <b> '. $id_pembayaran . ' </b> dan juga harap masukkan <b> nomor transaksi </b> dari transfer Bank anda.';
				$messagedikirimtele = 'Terima Kasih '.$nm_peserta.' Telah Mendaftar Pelatihan ' . $nm_kursus . ' pada tanggal ' . $periode . ' dengan kuota peserta ' . $kuota . ' orang di UPT Puskom UNDIP. Biaya yang harus dibayarkan sebesar Rp. ' . number_format($kuota*$harga_pelatihan,0, ',' , '.').', bisa dilakukan pembayaran pada rekening ' . $bank . ' dengan No. Rekening ' . $no_rekening . '. Verifikasi Pembayaran dilakukan dengan memasukkan ID Pembayaran yaitu '. $id_pembayaran . ' dan juga harap masukkan nomor transaksi dari transfer Bank anda.';
				}
				elseif ($custom==1)
				{
				$messagedikirim = 'Terima Kasih '.$nm_peserta.' Telah Mendaftar Pelatihan Custom ' . $nm_kursus . ' pada tanggal ' . $periode . ' dengan kuota peserta ' . $kuota . ' orang di UPT Puskom UNDIP. Untuk pelatihan custom harap menunggu penawaran harga dari kami yang akan dikirim melalui email dan telegram. Bila sudah setuju dengan penawaran kami silahkan melakukan verifikasi pembayaran dengan memasukkan ID Pembayaran yaitu <b> '. $id_pembayaran . ' </b> dan juga harap masukkan nomor transaksi dari transfer Bank anda.';
				$messagedikirimtele = 'Terima Kasih '.$nm_peserta.' Telah Mendaftar Pelatihan Custom ' . $nm_kursus . ' pada tanggal ' . $periode . ' dengan kuota peserta ' . $kuota . ' orang di UPT Puskom UNDIP. Untuk pelatihan custom harap menunggu penawaran harga dari kami yang akan dikirim melalui email dan telegram. Bila sudah setuju dengan penawaran kami silahkan melakukan verifikasi pembayaran dengan memasukkan ID Pembayaran yaitu '. $id_pembayaran . ' dan juga harap masukkan nomor transaksi dari transfer Bank anda.';
				}
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
				$data['email'] = $this->m_kursus->getAkunSosial();
				foreach ($data['email'] as $emailsent)
				{
				$mail->AddAddress($emailsent['email'],'CC ke Puskom');
				}
				$mail->Send();
				//$mail->AddAddress('upt_puskom@undip.ac.id','CC ke Puskom');
				//Telegram
				$token = "bot412746341:AAEpSzMlVa7LRk3zEf4EKgouyRgh7c2LBTU";
				//$chatid = "293078439";
				$data['telegram'] = $this->m_kursus->getAkunSosial();
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
					alert("Anda Sudah Berhasil Melakukan registrasi");
					window.location="'. site_url('welcome') . '";
					</script>';
				}
				else
				{
					echo '<script>
					alert("Mohon maaf anda belum berhasil melakukan registrasi");
					window.location="'. site_url('welcome/pendaftaran') . '";
					</script>';
				}
			}
			else
			{
				echo '<script>
				alert("Mohon Maaf Email sudah pernah didaftarkan, silahkan menggunakan email lain");
				window.location="'. site_url('welcome/pendaftaran') . '";
				</script>';
			}
		}
	}
		else {
			echo '<script>
			alert("Mohon Maaf recaptcha belum ditekan");
			history.go(-1);
			</script>';
				}
  }

	public function konfirmasi_pembayaran()
	{
				$id_pembayaran=$this->input->post('id_pembayaran');
				$no_transaksi=$this->input->post('no_transaksi');
				if ($this->input->post('g-recaptcha-response'))
				{
					$secret = '6LebdC0UAAAAAPUXsf9doTvr317GHu2pA_Ii4x9l';
					//get verify response data
					$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
					$responseData = json_decode($verifyResponse);
					if($responseData->success)
					{
				$data['peserta'] = $this->m_kursus->konfirmasi_pembayaran($id_pembayaran,$no_transaksi);
        foreach ($data['peserta'] as $peserta)
				{
					$nm_peserta = $peserta['nama'];
					$nm_kursus = $peserta['nm_kursus'];
					$periode = $peserta['periode'];
					$chat_id = $peserta['chat_id'];
					$email = $peserta['email'];
				}
				$messagedikirim = 'Terima Kasih '.$nm_peserta.' Telah Melakukan Verifikasi Pembayaran dengan ID ' . $id_pembayaran . ' dengan No. Transaksi ' . $no_transaksi . ' untuk Pelatihan ' . $nm_kursus . ' untuk tanggal ' . $periode . '. Silahkan menunggu email konfirmasi dari kami yang berisi notifikasi bahwa anda sudah bisa login ke sistem kami.';

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

				$data['email'] = $this->m_kursus->getAkunSosial();
				foreach ($data['email'] as $emailsent)
				{
				$mail->AddAddress($emailsent['email'],'CC ke Puskom');
				}
				$mail->Send();
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
				if($nm_peserta)
				{
					echo '<script>
					alert("Anda Sudah Berhasil Melakukan Konfirmasi Pembayaran");
					window.location="'. site_url('welcome') . '";
					</script>';
				}
				else
				{
					echo '<script>
					alert("Mohon maaf anda belum berhasil melakukan konfirmasi pembayaran");
					window.location="'. site_url('welcome/konfirmasi') . '";
					</script>';
				}
			}
		}
			else {
				echo '<script>
				alert("Mohon Maaf recaptcha belum ditekan");
				history.go(-1);
				</script>';
					}
			}


	public function workshop()
	{
		$this->load->view('header');
		$this->load->view('workshop');
	}
}
