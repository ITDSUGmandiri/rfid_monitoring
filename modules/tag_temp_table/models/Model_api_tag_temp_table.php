<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api_tag_temp_table extends MY_Model {

private $primary_key = 'id_temp_table';
private $table_name = 'tag_temp_table';
private $field_search = ['id_temp_table', 'lokasi_terakhir_id', 'nama_lokasi_terakhir', 'room_id', 'room_name', 'reader_id', 'reader_antena', 'reader_angle', 'reader_gate', 'rfid_tag_number', 'waktu', 'output', 'kategori_pergerakan', 'keterangan_pergerakan'];

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

$where = '('.$where.')';
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

$where = '('.$where.')';
} else {
if (in_array($field, $select_field)) {
$where .= "(" . $field . " LIKE '%" . $q . "%' )";
}
}

if (is_array($select_field) AND count($select_field)) {
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

}

/* End of file Model_tag_temp_table.php */
/* Location: ./application/models/Model_tag_temp_table.php */