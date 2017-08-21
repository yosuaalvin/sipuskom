<?php
ini_set('max_execution_time', 0);
class m_kursus extends CI_Model{
  function selectAll()
  {
	$this->db->order_by("id","asc");
	return $this->db->get('kursus')->result();
  }
  function get_lock()
{
	return $this->db->get('kursus')->row();
}
function get_rekening()
{
return $this->db->get('rekening')->row();
}
  function all_peserta()
  {
	$this->db->order_by("id","asc");
	return $this->db->get('peserta')->result();
  }
  function tambah_peserta($npm,$nama,$nama_kursus,$institusi,$kelas,$jurusan) {
	$data = array(
			'npm'=>$npm,
			'nama'=>$nama,
			'nm_kursus'=>$nama_kursus,
      'institusi'=>$institusi,
			'kelas'=>$kelas,
			'jurusan'=>$jurusan,
			'id_user'=>$this->session->userdata('id_user')
			);
	$this->db->insert('peserta',$data);
	$this->db->set('kuota', 'kuota-1', FALSE);
	$this->db->where('nama_kursus', $nama_kursus);
	$this->db->update('kursus');
 }

 function get_harga($nama_kursus) {
     $this->db->select('harga');
     $this->db->from('kursus');
     $this->db->where('nama_kursus', $nama_kursus);

     $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result();
     } else {
         return false;
     }
 }

 function get_peserta_report() {
     $this->db->select('*');
     $this->db->from('peserta');
     $this->db->where('status', 1);

     $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result();
     } else {
         return false;
     }
 }

 function get_peserta_report_tanggal($tgl_awal,$tgl_akhir) {
     $this->db->select('*');
     $this->db->from('peserta');
     $this->db->where('status', 1);
     $this->db->where('tgl_pembuatan >=',$tgl_awal);
     $this->db->where('tgl_pembuatan <=',$tgl_akhir);
     $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result();
     } else {
         return false;
     }
 }

 function get_total_pemasukan() {
     $this->db->select('sum(kuota*harga_pelatihan) as total');
     $this->db->from('peserta');
     $this->db->where('status', 1);

     $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result();
     } else {
         return false;
     }
 }

 function get_total_pemasukan_tanggal($tgl_awal,$tgl_akhir) {
     $this->db->select('sum(kuota*harga_pelatihan) as total');
     $this->db->from('peserta');
     $this->db->where('status', 1);
     $this->db->where('tgl_pembuatan >=',$tgl_awal);
     $this->db->where('tgl_pembuatan <=',$tgl_akhir);
     $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result();
     } else {
         return false;
     }
 }

 function get_lupa_password($email) {
     $this->db->select('email');
     $this->db->from('tb_pengguna');
     $this->db->where('username', $email);
     $this->db->where('status',1);
     $num_results = $this->db->count_all_results();
     if ($num_results > 0) {
         return true;
     } else {
         return false;
     }
 }

 function get_cek_jawaban_pertanyaan($email,$id_pertanyaan,$jawaban_pertanyaan) {
     $this->db->select('email');
     $this->db->from('tb_pengguna');
     $this->db->where('username', $email);
     $this->db->where('id_pertanyaan',$id_pertanyaan);
     $this->db->where('jawaban_pertanyaan',$jawaban_pertanyaan);
     $num_results = $this->db->count_all_results();
     if ($num_results > 0) {
         return true;
     } else {
         return false;
     }
 }

 function get_pertanyaan() {
     $this->db->select('*');
     $this->db->from('pertanyaan');

     $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result();
     } else {
         return false;
     }
 }

 function tambah_peserta_pelatihan($nm_peserta,$institusi,$nm_kursus,$harga_pelatihan,$kuota,$periode,$email,$chat_id,$password,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp,$id_pembayaran,$id_pertanyaan,$jawaban_pertanyaan,$custom) {
   $this->db->select('id');
   $this->db->from('kursus');
   $this->db->where('nama_kursus',$nm_kursus);
   $query = $this->db->get();
   $datakursus = array_shift($query->result_array());
 $data = array(
     'nama'=>$nm_peserta,
     'institusi'=>$institusi,
     'nm_kursus'=>$nm_kursus,
     'harga_pelatihan'=>$harga_pelatihan,
     'kuota'=>$kuota,
     'periode'=>$periode,
     'email'=>$email,
     'chat_id'=>$chat_id,
     'tempat_lahir'=>$tempat_lahir,
     'tanggal_lahir'=>$tanggal_lahir,
     'alamat'=>$alamat,
     'no_telp'=>$no_telp,
     'id_kursus'=>$datakursus['id'],
     'id_pembayaran'=>$id_pembayaran,
     'custom'=>$custom
     );
 $insert = $this->db->insert('peserta',$data);
 if ($insert)
 {
 $peserta_id = $this->db->insert_id();
 $datapengguna = array(
      'username'=>$email,
      'password'=>md5($password),
      'nama'=>$nm_peserta,
      'npm'=>$password,
      'level'=>1,
      'status'=>0,
      'id_pertanyaan'=>$id_pertanyaan,
      'jawaban_pertanyaan'=>$jawaban_pertanyaan
    );
 $this->db->insert('tb_pengguna',$datapengguna);
 $user_id = $this->db->insert_id();
 $this->db->set('id_user',$user_id,FALSE);
 $this->db->where('id',$peserta_id);
 $this->db->update('peserta');
 return true;
 }
 else {
   return false;
  }
 }

function ganti_password($email,$npm,$password)
{
  $this->db->set('npm',$npm,TRUE);
  $this->db->where('username',$email);
  $this->db->update('tb_pengguna');
  $this->db->set('password',$password,TRUE);
  $this->db->where('username',$email);
  $this->db->update('tb_pengguna');
  return true;
}

 function tambah_peserta_pelatihan_baru($nama,$institusi,$nm_kursus,$harga_pelatihan,$kuota,$periode,$email,$chat_id,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp,$id_pembayaran,$custom) {
   $this->db->select('id');
   $this->db->from('kursus');
   $this->db->where('nama_kursus',$nm_kursus);
   $query = $this->db->get();
   $datakursus = array_shift($query->result_array());
   $this->db->select('id_user');
   $this->db->from('tb_pengguna');
   $this->db->where('username',$email);
   $query = $this->db->get();
   $datatb_pengguna = array_shift($query->result_array());
 $data = array(
     'nama'=>$nama,
     'institusi'=>$institusi,
     'nm_kursus'=>$nm_kursus,
     'harga_pelatihan'=>$harga_pelatihan,
     'kuota'=>$kuota,
     'periode'=>$periode,
     'email'=>$email,
     'chat_id'=>$chat_id,
     'tempat_lahir'=>$tempat_lahir,
     'tanggal_lahir'=>$tanggal_lahir,
     'alamat'=>$alamat,
     'no_telp'=>$no_telp,
     'id_kursus'=>$datakursus['id'],
     'id_user'=>$datatb_pengguna['id_user'],
     'id_pembayaran'=>$id_pembayaran,
     'custom'=>$custom
     );
 $insert = $this->db->insert('peserta',$data);
 if ($insert)
 {
   return true;
 }
 else {
     return false;
 }
 }

 function tambah_peserta_pelatihan_baru_custom($nama,$institusi,$nm_kursus,$kuota,$periode,$email,$chat_id,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp,$id_pembayaran,$custom) {
   $this->db->select('id_user');
   $this->db->from('tb_pengguna');
   $this->db->where('username',$email);
   $query = $this->db->get();
   $datatb_pengguna = array_shift($query->result_array());
 $data = array(
     'nama'=>$nama,
     'institusi'=>$institusi,
     'nm_kursus'=>$nm_kursus,
     'kuota'=>$kuota,
     'periode'=>$periode,
     'email'=>$email,
     'chat_id'=>$chat_id,
     'tempat_lahir'=>$tempat_lahir,
     'tanggal_lahir'=>$tanggal_lahir,
     'alamat'=>$alamat,
     'no_telp'=>$no_telp,
     'id_user'=>$datatb_pengguna['id_user'],
     'id_pembayaran'=>$id_pembayaran,
     'custom'=>$custom
     );
 $insert = $this->db->insert('peserta',$data);
 if ($insert)
 {
   return true;
 }
 else {
     return false;
 }
 }

function konfirmasi_pembayaran($id_pembayaran,$no_transaksi) {
    $this->db->select('*');
    $this->db->from('peserta');
    $this->db->where('id_pembayaran',$id_pembayaran);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      $this->db->set('no_transaksi',$no_transaksi,TRUE);
      $this->db->where('id_pembayaran',$id_pembayaran);
      $this->db->update('peserta');
      return $query->result_array();
    } else {
      return false;
    }
}


 function delete($id)
 {
	 $hasil = $this->db->delete('peserta', array('id'=>$id));
   if ($hasil)
   {
     return true;
   }
   else {
     return false;
   }
 }
 function update($id,$nama,$institusi,$nm_kursus,$kuota,$periode,$email,$chat_id,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp,$id_pembayaran,$custom)
 {
 	$data = array(
 	'nama'=>$nama,
  'institusi'=>$institusi,
 	'nm_kursus'=>$nm_kursus,
 	//'harga_pelatihan'=>$harga_pelatihan,
 	'kuota'=>$kuota,
 	'periode'=>$periode,
 	'email'=>$email,
 	'chat_id'=>$chat_id,
 	'tempat_lahir'=>$tempat_lahir,
 	'tanggal_lahir'=>$tanggal_lahir,
 	'alamat'=>$alamat,
 	'no_telp'=>$no_telp,
  'id_pembayaran'=>$id_pembayaran,
  'custom'=>$custom
 	);
 	$hasil = $this->db->where('id',$id)->update('peserta', $data);
  if ($hasil)
  {
  return true;
  }
  else
  {
  return false;
  }
 }
 function select($id)
 {
	 return $this->db->get_where('peserta', array('id'=>$id))->row();
 }
 function selectPelatihan($id)
 {
  return $this->db->get_where('kursus', array('id'=>$id))->row();
 }

 function selectLastPelatihan($email)
 {
   $this->db->select('*');
   $this->db->from('peserta');
   $this->db->where("email",$email);
   $this->db->order_by('id', 'DESC');
   $this->db->limit('1');
   $query = $this->db->get();
   return $query->row();
 }
 function ambil()
{
 	$query="SELECT tb_pengguna.id_user, peserta.status, peserta.id_user, peserta.id, peserta.harga_pelatihan, peserta.nama,peserta.nm_kursus,
 			peserta.periode, peserta.id_pembayaran, peserta.no_transaksi
 			FROM peserta
 			JOIN tb_pengguna ON peserta.id_user=tb_pengguna.id_user
 			WHERE peserta.id_user='".$this->session->userdata('id_user')."'";
 	return $this->db->query($query);
 }
 function count_all()
 {
        $this->db->select('id');
        $this->db->distinct();
        $this->db->from('kursus');
        $query = $this->db->get();
        return $query->num_rows();
  }
  function getAkunSosial()
  {
  	$this->db->select('email,chat_id_telegram');
  	$this->db->from('akun_sosial');
  	$query = $this->db->get();
  	return $query->result_array();
  }

  function cek_password_lama($id_user,$password,$password_baru)
  {
    $this->db->select('username');
    $this->db->from('tb_pengguna');
    $this->db->where("id_user",$id_user);
    $this->db->where("password",$password);
    $passwordbaru = md5($password_baru);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      $this->db->set('npm',$password_baru,TRUE);
      $this->db->where('id_user',$id_user);
      $this->db->update('tb_pengguna');
      $this->db->set('password',$passwordbaru,TRUE);
      $this->db->where('id_user',$id_user);
      $this->db->update('tb_pengguna');
      return true;
    } else {
      return false;
    }
  }
}
?>
