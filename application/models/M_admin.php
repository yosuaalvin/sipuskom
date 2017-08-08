<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin extends CI_Model{
    public $table = 'tb_pengguna';
    function __construct()
    {

    }

    function cek_user($username,$password)
    {
        $query = $this->db->get_where($this->tbl,array('username' => $username, 'password' => $password));
        $query = $query->result_array();
        return $query;
    }
    function ambil_user($username)
        {
        $query = $this->db->get_where($this->tbl, array('username' => $username));
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    }
    public function getPengguna($username, $password)
    {
            $this->db->select('*');
            $this->db->from('tb_pengguna');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get();
            return $query;
    }
    public function data($username)
    {
            $this->db->select('*');
            $this->db->where('username', $username);
            $query = $this->db->get('tb_pengguna');
            return $query->row();
    }
    public function data_jumlah_kursus()
    {
            $this->db->select('count(id) as jumlah_kursus');
            $query = $this->db->get('kursus');
            return $query->row();
    }
    public function data_jumlah_peserta()
    {
            $this->db->select('count(id) as jumlah_peserta,sum(kuota) as total_peserta');
            $query = $this->db->get('peserta');
            return $query->row();
    }
}
