<?php
ini_set('max_execution_time', 0);

class admin_kursus extends CI_Model{
function selectAll()
{
	$this->db->order_by("id","asc");
	return $this->db->get('kursus')->result();
}

function selectLaboratorium()
{
	$this->db->order_by("id_lab","asc");
	return $this->db->get('laboratorium')->result();
}

function tambah_kursus($nama_kursus,$laboratorium,$periode,$harga,$kuota)
{
	$data = array(
	'nama_kursus'=>$nama_kursus,
	'laboratorium'=>$laboratorium,
	'periode'=>$periode,
	'harga'=>$harga,
	'kuota'=>$kuota,
	);
	$this->db->insert('kursus',$data);
}

function tambah_laboratorium($nama_lab)
{
	$data = array(
	'nama_lab'=>$nama_lab
	);
	$this->db->insert('laboratorium',$data);
}

function tambah_akun_sosial($email,$chat_id_telegram)
{
	$data = array(
	'email'=>$email,
	'chat_id_telegram'=>$chat_id_telegram
	);
	$this->db->insert('akun_sosial',$data);
}

function tambah_rekening($no_rekening,$bank)
{
	$data = array(
	'no_rekening'=>$no_rekening,
	'bank'=>$bank
	);
	$this->db->insert('rekening',$data);
}

function delete($id)
{
	$this->db->delete('kursus', array('id'=>$id));
}

function delete_lab($id_lab)
{
	$this->db->delete('laboratorium', array('id_lab'=>$id_lab));
}

function delete_akun_sosial($id_akun)
{
	$this->db->delete('akun_sosial', array('id_akun'=>$id_akun));
}

function delete_rekening($id_akun)
{
	$this->db->delete('rekening', array('id_akun'=>$id_akun));
}


function update($id,$nama_kursus,$lepkom,$periode,$harga,$kuota)
{
	$data = array(
	'nama_kursus'=>$nama_kursus,
	'lepkom'=>$lepkom,
	'periode'=>$periode,
	'harga'=>$harga,
	'kuota'=>$kuota,
	);
	$this->db->where('id',$id)->update('kursus', $data);
}

function update_lab($id_lab,$nama_lab)
{
	$data = array(
	'nama_lab'=>$nama_lab
	);
	$this->db->where('id_lab',$id_lab)->update('laboratorium', $data);
}

function update_akun_sosial($id_akun,$email,$chat_id_telegram)
{
	$data = array(
	'email'=>$email,
	'chat_id_telegram'=>$chat_id_telegram
	);
	$this->db->where('id_akun',$id_akun)->update('akun_sosial', $data);
}

function update_rekening($id_akun,$no_rekening,$bank)
{
	$data = array(
	'no_rekening'=>$no_rekening,
	'bank'=>$bank
	);
	$this->db->where('id_akun',$id_akun)->update('rekening', $data);
}

function lock_kursus($id,$status)
{
	$data = array(
	'status'=>$status
	);
	$this->db->where('id',$id)->update('kursus', $data);
}


function unlock_kursus($id,$status)
{
	$data = array(
	'status'=>$status
	);
	$this->db->where('id',$id)->update('kursus', $data);
}


function select($id)
{
	return $this->db->get_where('kursus', array('id'=>$id))->row();
}

function selectLab($id_lab)
{
	return $this->db->get_where('laboratorium', array('id_lab'=>$id_lab))->row();
}

function selectAkun($id_akun)
{
	return $this->db->get_where('akun_sosial', array('id_akun'=>$id_akun))->row();
}

function selectRekening($id_akun)
{
	return $this->db->get_where('rekening', array('id_akun'=>$id_akun))->row();
}

function getAkunSosial()
{
	$this->db->select('email,chat_id_telegram');
	$this->db->from('akun_sosial');
	$query = $this->db->get();
	return $query->result_array();
}
}
