<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_tag_anomaly extends MY_Model {

    private $primary_key    = 'anomaly_id';
    private $table_name     = 'tag_anomaly';
    public $field_search   = ['rfid_id', 'anomaly_right_librarian', 'anomaly_wrong_librarian', 'anomaly_status', 'rfid_barcode', 'tag_rfid.rfid_rfid', 'tag_librarian.librarian_name', 'tag_librarian.librarian_name'];
    public $sort_option = ['anomaly_id', 'DESC'];
    
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
                $f_search = "tag_anomaly.".$field;

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
            $where .= "(" . "tag_anomaly.".$field . " LIKE '%" . $q . "%' )";
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
                $f_search = "tag_anomaly.".$field;
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
            $where .= "(" . "tag_anomaly.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->join('tag_rfid', 'tag_rfid.rfid_id = tag_anomaly.rfid_id', 'LEFT');
        $this->db->join('tag_librarian', 'tag_librarian.librarian_id = tag_anomaly.anomaly_right_librarian', 'LEFT');
        $this->db->join('tag_librarian tag_librarian1', 'tag_librarian1.librarian_id = tag_anomaly.anomaly_wrong_librarian', 'LEFT');
        
        $this->db->select('tag_rfid.rfid_rfid,tag_librarian.librarian_name,tag_librarian.librarian_name,tag_anomaly.*,tag_rfid.rfid_rfid as tag_rfid_rfid_rfid,tag_rfid.rfid_rfid as rfid_rfid,tag_librarian.librarian_name as tag_librarian_librarian_name,tag_librarian.librarian_name as librarian_name,tag_librarian.librarian_name as tag_librarian_librarian_name,tag_librarian.librarian_name as librarian_name');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            }

        return $this;
    }

}

/* End of file Model_tag_anomaly.php */
/* Location: ./application/models/Model_tag_anomaly.php */