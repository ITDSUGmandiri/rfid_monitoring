<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tb_history_invent extends MY_Model {

    private $primary_key    = 'id';
    private $table_name     = 'tb_history_invent';
    public $field_search   = ['invent_id', 'tanggal', 'waktu', 'id_room', 'id_reader', 'user', 'labeling', 'tb_room_master.name_room', 'tag_reader.reader_serialnumber', 'tb_pegawai_master.Pegawai'];
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
                $f_search = "tb_history_invent.".$field;

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
            $where .= "(" . "tb_history_invent.".$field . " LIKE '%" . $q . "%' )";
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
                $f_search = "tb_history_invent.".$field;
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
            $where .= "(" . "tb_history_invent.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->join('tb_room_master', 'tb_room_master.room_id = tb_history_invent.id_room', 'LEFT');
        $this->db->join('tag_reader', 'tag_reader.reader_id = tb_history_invent.id_reader', 'LEFT');
        $this->db->join('tb_pegawai_master', 'tb_pegawai_master.id = tb_history_invent.user', 'LEFT');
        
        $this->db->select('tb_room_master.name_room,tag_reader.reader_serialnumber,tb_pegawai_master.Pegawai,tb_history_invent.*,tb_room_master.name_room as tb_room_master_name_room,tb_room_master.name_room as name_room,tag_reader.reader_serialnumber as tag_reader_reader_serialnumber,tag_reader.reader_serialnumber as reader_serialnumber,tb_pegawai_master.Pegawai as tb_pegawai_master_Pegawai,tb_pegawai_master.Pegawai as Pegawai');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_tb_history_invent.php */
/* Location: ./application/models/Model_tb_history_invent.php */