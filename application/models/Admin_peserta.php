<?php
class admin_peserta extends CI_Model{
function selectAll()
{
	$this->db->order_by("id","asc");
	return $this->db->get('peserta')->result();
}
function selectPelatihan()
{
	return $this->db->get_where('peserta', array('custom'=>0))->result();
}
function selectPelatihanCustom()
{
	return $this->db->get_where('peserta', array('custom'=>1))->result();
}
function selectCekPembayaran()
{
	return $this->db->get_where('peserta', array('no_transaksi !='=>'','status'=>0))->result();
}
function selectAkunSosial()
{
	$this->db->order_by("id_akun","asc");
	return $this->db->get('akun_sosial')->result();
}

function tambah_peserta($npm,$nama,$nm_kursus,$periode,$kelas,$jurusan)
{
	$data = array(
	'npm'=>$npm,
	'nama'=>$nama,
	'nm_kursus'=>$nm_kursus,
	'periode'=>$periode,
	'kelas'=>$kelas,
	'jurusan'=>$jurusan,
	);
	$this->db->insert('peserta',$data);
}
function delete($id)
{
	$this->db->delete('peserta', array('id'=>$id));
}
function update($id,$nama,$institusi,$nm_kursus,$harga_pelatihan,$kuota,$periode,$email,$chat_id,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp)
{
	$data = array(
	'nama'=>$nama,
	'nm_kursus'=>$nm_kursus,
	'harga_pelatihan'=>$harga_pelatihan,
	'kuota'=>$kuota,
	'periode'=>$periode,
	'email'=>$email,
	'chat_id'=>$chat_id,
	'tempat_lahir'=>$tempat_lahir,
	'tanggal_lahir'=>$tanggal_lahir,
	'alamat'=>$alamat,
	'no_telp'=>$no_telp
	);
	$this->db->where('id',$id)->update('peserta', $data);
}

function update_custom($id,$nama,$institusi,$nm_kursus,$harga_pelatihan,$kuota,$periode,$email,$chat_id,$tempat_lahir,$tanggal_lahir,$alamat,$no_telp)
{
	$data = array(
	'nama'=>$nama,
	'nm_kursus'=>$nm_kursus,
	'harga_pelatihan'=>$harga_pelatihan,
	'kuota'=>$kuota,
	'periode'=>$periode,
	'email'=>$email,
	'chat_id'=>$chat_id,
	'tempat_lahir'=>$tempat_lahir,
	'tanggal_lahir'=>$tanggal_lahir,
	'alamat'=>$alamat,
	'no_telp'=>$no_telp
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

function update_cek_pembayaran($id,$id_user)
{
	$data = array(
	'status'=>1
	);
	$this->db->where('id',$id)->update('peserta', $data);
	$data = array(
	'status'=>1
	);
	$hasil = $this->db->where('id_user',$id_user)->update('tb_pengguna', $data);
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
}
