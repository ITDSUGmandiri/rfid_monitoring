<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_tb_room_master extends MY_Model
{

    private $primary_key    = 'id_room';
    private $table_name     = 'tb_room_master';
    public $field_search   = ['gedung_id', 'id_room', 'name_room', 'PIC', 'tag_reader.reader_id', 'tb_gedung_master.gedung', 'tb_pegawai_master.Pegawai'];
    public $sort_option = ['id_room', 'DESC'];

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
                $f_search = "tb_room_master." . $field;

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
            $where .= "(" . "tb_room_master." . $field . " LIKE '%" . $q . "%' )";
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
                $f_search = "tb_room_master." . $field;
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
            $where .= "(" . "tb_room_master." . $field . " LIKE '%" . $q . "%' )";
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

    public function join_avaiable()
    {
        $this->db->join('tb_gedung_master', 'tb_gedung_master.id_gedung = tb_room_master.gedung_id', 'LEFT');
        $this->db->join('tb_pegawai_master', 'tb_pegawai_master.NIP = tb_room_master.PIC', 'LEFT');
        $this->db->join('tag_reader', 'tag_reader.room_id = tb_room_master.id_room', 'LEFT');
        $this->db->select('tag_reader.reader_id,tb_gedung_master.gedung,tb_pegawai_master.Pegawai,tb_room_master.*,tb_gedung_master.gedung as tb_gedung_master_gedung,tb_gedung_master.gedung as gedung,tb_pegawai_master.Pegawai as tb_pegawai_master_Pegawai,tb_pegawai_master.Pegawai as Pegawai');


        return $this;
    }

    public function filter_avaiable()
    {

        if (!$this->aauth->is_admin()) {
        }

        return $this;
    }
}

/* End of file Model_tb_room_master.php */
/* Location: ./application/models/Model_tb_room_master.php */