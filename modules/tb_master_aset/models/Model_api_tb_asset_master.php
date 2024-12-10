<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_api_tb_asset_master extends MY_Model
{

    private $primary_key = 'id';
    private $table_name = 'tb_asset_master';
    private $field_search = ['id', 'kode_aset', 'nup', 'kode_tid', 'nama_aset', 'merk', 'tipe', 'id_kondisi', 'nilai', 'kelompok', 'tgl_inventarisasi', 'tgl_perolehan', 'keterangan', 'id_pegawai'];

    public function __construct()
    {
        $config = array(
            'primary_key' => $this->primary_key,
            'table_name' => $this->table_name,
            'field_search' => $this->field_search,
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

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= $field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '(' . $where . ')';
        } else {
            $where .= "(" . $field . " LIKE '%" . $q . "%' )";
        }

        $this->db->where($where);
        $this->filter_query();

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

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                if ($iterasi == 1) {
                    $where .= $field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
                }
                $iterasi++;
            }

            $where = '(' . $where . ')';
        } else {
            if (in_array($field, $select_field)) {
                $where .= "(" . $field . " LIKE '%" . $q . "%' )";
            }
        }

        if (is_array($select_field) and count($select_field)) {
            $this->db->select($select_field);
        }

        if ($where) {
            $this->db->where($where);
        }
        $this->filter_query();

        $this->db->limit($limit, $offset);
        $sort_field = $this->input->get('sort_field') ? $this->input->get('sort_field') : $this->primary_key;
        $sort_order = $this->input->get('sort_order') ? $this->input->get('sort_order') : 'DESC';
        $this->db->order_by($sort_field, $sort_order);
        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function get_all($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
    {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {

            foreach ($this->field_search as $field) {

                if ($iterasi == 1) {
                    $where .= $field . " LIKE '%" . $q . "%' ";
                } else {
                    $where .= "OR " . $field . " LIKE '%" . $q . "%' ";
                }

                $iterasi++;
            }

            $where = '(' . $where . ')';
        } else {

            if (in_array($field, $select_field)) {
                $where .= "(" . $field . " LIKE '%" . $q . "%' )";
            }
        }

        if (is_array($select_field) and count($select_field)) {
            $this->db->select($select_field);
        }

        // if ($where) {
        //     $this->db->where($where);
        // }

        // $this->filter_query();

        // $this->db->limit($limit, $offset);
        $sort_field = $this->input->get('sort_field') ? $this->input->get('sort_field') : $this->primary_key;
        $sort_order = $this->input->get('sort_order') ? $this->input->get('sort_order') : 'DESC';

        $this->db->order_by($sort_field, $sort_order);

        $this->db->where('tag_code', '');
        // $this->db->where('kelompok', 1);

        $query = $this->db->get($this->table_name);

        return $query->result();
    }
}

/* End of file Model_tb_asset_master.php */
/* Location: ./application/models/Model_tb_asset_master.php */