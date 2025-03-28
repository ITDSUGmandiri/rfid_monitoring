<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_tb_master_aset extends MY_Model
{

    private $primary_key    = 'kode_tid';
    private $table_name     = 'tb_master_aset';
    public $field_search   = ['id_aset', 'kode_aset', 'nup', 'lokasi_terakhir', 'merk', 'tipe_moving', 'tipe', 'kategori', 'kode_tid', 'nama_aset', 'kondisi', 'lokasi_moving', 'status'];
    public $sort_option = ['id_aset', 'DESC'];

    public function __construct()
    {
        $config = array(
            'primary_key'   => $this->primary_key,
            'table_name'    => $this->table_name,
            'field_search'  => $this->field_search,
            'sort_option'   => $this->sort_option,
        );

        parent::__construct($config);
    }

    public function count_all($q = null, $field = null)
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);
        $field = in_array($field, $this->field_search) ? $field : "";


        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "tb_master_aset." . $field;

                if (strpos($field, '.')) {
                    $f_search = $field;
                }
                if ($iterasi == 1) {
                    $where .=  $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " .  $f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '(' . $where . ')';
        } else {
            $where .= "(" . "tb_master_aset." . $field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);
        $field = in_array($field, $this->field_search) ? $field : "";


        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "tb_master_aset." . $field;
                if (strpos($field, '.')) {
                    $f_search = $field;
                }

                if ($iterasi == 1) {
                    $where .= $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . $f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '(' . $where . ')';
        } else {
            $where .= "(" . "tb_master_aset." . $field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) and count($select_field)) {
            $this->db->select($select_field);
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);

        $this->sortable();

        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function get_aset()
    {
        $query = $this->db->query(
            "SELECT a.id_aset, a.kode_tid, a.kode_aset, a.nup, a.nama_aset, s.id, s.status FROM tb_master_aset a JOIN tb_master_status s ON s.id = a.status ORDER BY a.kode_tid DESC LIMIT 500 OFFSET 0"
        );

        return $query->result();
    }

    public function get_asetkategori($id_kategori)
    {
        $query = $this->db->query(
            "SELECT a.id_aset, a.kode_tid, a.kode_aset, a.nup, a.nama_aset, s.id, s.status FROM tb_master_aset a JOIN tb_master_status s ON s.id = a.status WHERE a.kategori = $id_kategori ORDER BY a.kode_tid ASC LIMIT 500 OFFSET 0"
        );

        return $query->result();
    }


    public function get_detail_edit($id)
    {
        $query = $this->db->query(
            "SELECT * FROM tb_master_aset WHERE id_aset = $id"
        );

        return $query->result();
    }

    public function get_detail_aset($id)
    {
        // JOIN tb_master_pegawai p ON p.id = a.id_pegawai
        $query = $this->db->query(
            "SELECT a.*, s.ket_status, s.id, k.ket_kategori, r.ruangan as ruangasal, rr.ruangan as ruangaktual FROM tb_master_aset a 
JOIN tb_master_status s ON s.id = a.status 
JOIN tb_master_ruangan r ON  r.id = a.id_lokasi
JOIN tb_master_ruangan rr ON  rr.id = a.lokasi_moving 
JOIN tb_master_kategori k ON k.id = a.kategori WHERE id_aset = $id"
        );

        return $query->result();
    }

    public function join_avaiable()
    {
        $this->db->join('tb_master_status', 'tb_master_status.id = tb_master_aset.status', 'LEFT');
        $this->db->join('tb_master_ruangan', 'tb_master_ruangan.id = tb_master_aset.lokasi_moving', 'LEFT');
        $this->db->join('tb_master_pegawai', 'tb_master_pegawai.id = tb_master_aset.id_pegawai', 'LEFT');

        $this->db->select('tb_master_status.ket_status,tb_master_ruangan.ruangan,tb_master_pegawai.nama,tb_master_aset.*,tb_master_status.ket_status as status,tb_master_ruangan.ruangan as tb_master_ruangan_name_room,tb_master_ruangan.ruangan as name_room,tb_master_pegawai.nama as tb_master_pegawai_Pegawai,tb_master_pegawai.nama as Pegawai');


        return $this;
    }

    public function get_history($id = 0)
    {


        $query = $this->db->query(
            "SELECT  a.kode_tid, a.lokasi_terakhir, a.tipe_moving, m.tag_code, m.tanggal, DATE_FORMAT(m.waktu,'%H:%i:%s') as waktugerak,r.ruangan, m.room_id, m.status_moving FROM tb_master_aset a INNER JOIN tb_asset_moving m ON m.tag_code = a.kode_tid JOIN tb_master_ruangan r ON r.id = a.lokasi_terakhir WHERE a.kode_tid = $id group by m.id ORDER by m.id DESC LIMIT 10"
        );

        return $query->result();
    }

    public function get_event($id = 0)
    {


        $query = $this->db->query(
            "SELECT a.kode_tid, a.tipe_moving,DATE(m.tgl_input) as tglawal, DATE_FORMAT(m.tgl_input,'%H:%i:%s') as waktuawal,r.ruangan as ruangtujuan, x.ruangan as ruangawal,m.id_ruangan, m.ket_transaksi, mt.tipe_transaksi FROM tb_master_aset a JOIN tb_detail_transaksi d ON d.kode_tid = a.kode_tid JOIN tb_master_transaksi m ON m.id = d.id_transaksi JOIN tb_master_ruangan r ON r.id = m.id_ruangan JOIN tb_master_ruangan x ON x.id = a.lokasi_terakhir JOIN tb_master_type_transaksi mt ON mt.id = m.tipe_transaksi WHERE a.kode_tid = $id group by m.id ORDER by m.id DESC LIMIT 10"
        );

        return $query->result();
    }

    public function filter_avaiable()
    {

        if (!$this->aauth->is_admin()) {
        }

        return $this;
    }
    public function update_aset($id, $data)
    {
        $this->db->where('id_aset', $id);
        return $this->db->update('tb_master_aset', $data);
    }

    public function reset_data_master($data)
    {
        $this->db->update('tb_master_aset', $data);
    }

    public function importDataAset($data)
    {
        $this->db->insert_batch('tb_master_import', $data); // Sesuaikan dengan tabel Anda
    }
}

/* End of file Model_tb_master_aset.php */
/* Location: ./application/models/Model_tb_master_aset.php */