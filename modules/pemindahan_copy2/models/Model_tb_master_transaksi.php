<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tb_master_transaksi extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'tb_master_transaksi';
    public $field_search   = ['kode_transaksi', 'tipe_transaksi', 'status_transaksi', 'tgl_awal_transaksi', 'ket_transaksi', 'id_pegawai_input', 'nama_pegawai_input', 'id_area', 'id_gedung', 'id_ruangan', 'tb_master_type_transaksi.tipe_transaksi', 'tb_master_area.area', 'tb_master_gedung.gedung', 'tb_master_ruangan.ruangan'];
    public $sort_option = ['id', 'DESC'];
    
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
                $f_search = "tb_master_transaksi.".$field;

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

            $where = '('.$where.')';
        } else {
            $where .= "(" . "tb_master_transaksi.".$field . " LIKE '%" . $q . "%' )";
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
                $f_search = "tb_master_transaksi.".$field;
                if (strpos($field, '.')) {
                    $f_search = $field;
                }

                if ($iterasi == 1) {
                    $where .= $f_search . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " .$f_search . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '('.$where.')';
        } else {
            $where .= "(" . "tb_master_transaksi.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        
        $this->sortable();
        
        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        $this->db->join('tb_master_type_transaksi', 'tb_master_type_transaksi.id = tb_master_transaksi.tipe_transaksi', 'LEFT');
        $this->db->join('tb_master_area', 'tb_master_area.id = tb_master_transaksi.id_area', 'LEFT');
        $this->db->join('tb_master_gedung', 'tb_master_gedung.id = tb_master_transaksi.id_gedung', 'LEFT');
        $this->db->join('tb_master_ruangan', 'tb_master_ruangan.id = tb_master_transaksi.id_ruangan', 'LEFT');
        
        $this->db->select('tb_master_type_transaksi.tipe_transaksi,tb_master_area.area,tb_master_gedung.gedung,tb_master_ruangan.ruangan,tb_master_transaksi.*,tb_master_type_transaksi.tipe_transaksi as tb_master_type_transaksi_tipe_transaksi,tb_master_type_transaksi.tipe_transaksi as tipe_transaksi,tb_master_area.area as tb_master_area_area,tb_master_area.area as area,tb_master_gedung.gedung as tb_master_gedung_gedung,tb_master_gedung.gedung as gedung,tb_master_ruangan.ruangan as tb_master_ruangan_ruangan,tb_master_ruangan.ruangan as ruangan');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_tb_master_transaksi.php */
/* Location: ./application/models/Model_tb_master_transaksi.php */