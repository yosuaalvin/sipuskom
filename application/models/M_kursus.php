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
   $data = array_shift($query->result_array());
 $data = array(
     'nama'=>$nm_peserta,
     'institusi'=>$institusi,
     'nm_kursus'=>$nm_kursus,
     'harga_pelatihan'=>$harga_pelatihan,
     'kuota'=>$kuota,
     'periode'=>$periode,
     'email'=>$email,
     'chat_id'=>$chat_id,
     'npm'=>$password,
     'tempat_lahir'=>$tempat_lahir,
     'tanggal_lahir'=>$tanggal_lahir,
     'alamat'=>$alamat,
     'no_telp'=>$no_telp,
     'id_kursus'=>$data['id'],
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
	 $this->db->delete('peserta', array('id'=>$id));
 }
 function update($id,$nama,$institusi,$nm_kursus,$harga_pelatihan,$kuota,$periode,$email,$chat_id,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp,$id_pembayaran)
 {
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
  'id_pembayaran'=>$id_pembayaran
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
 			peserta.periode
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
}
?>
