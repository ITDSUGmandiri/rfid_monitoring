<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api_tb_master_aset extends MY_Model {

private $primary_key = 'id_aset';
private $table_name = 'tb_master_aset';
private $field_search = ['id_aset', 'kode_tid', 'kode_aset', 'nup', 'kategori', 'merk', 'tipe', 'kondisi', 'status', 'borrow', 'tipe_moving', 'nama_aset', 'id_area', 'id_gedung', 'id_lokasi', 'tgl_perolehan', 'nilai_perolehan', 'tgl_inventarisasi', 'tgl_peminjaman', 'tgl_pengembalian', 'flag_inventarisasi', 'id_peminjam', 'lokasi_moving', 'lokasi_terakhir', 'nama_lokasi_terakhir', 'id_pegawai', 'image_uri', 'id_transaksi', 'no_batch_sensus', 'keterangan'];

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

/* End of file Model_tb_master_aset.php */
/* Location: ./application/models/Model_tb_master_aset.php */