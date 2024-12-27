<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pencarian_aset extends MY_Model {

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
        $this->db->select('tb_master_type_transaksi.tipe_transaksi,tb_master_area.area,tb_master_gedung.gedung,tb_master_ruangan.ruangan,tb_master_transaksi.*,tb_master_type_transaksi.tipe_transaksi as tb_master_type_transaksi_tipe_transaksi,tb_master_type_transaksi.tipe_transaksi as tipe_transaksi,tb_master_area.area as tb_master_area_area,tb_master_area.area as area,tb_master_gedung.gedung as tb_master_gedung_gedung,tb_master_gedung.gedung as gedung,tb_master_ruangan.ruangan as tb_master_ruangan_ruangan,tb_master_ruangan.ruangan as ruangan');
        // $this->db->select('tb_detail_transaksi.id as detail_id, tb_detail_transaksi.kode_tid, tb_detail_transaksi.id_aset, tb_detail_transaksi.kode_aset, tb_detail_transaksi.nup, tb_detail_transaksi.nama_aset, tb_detail_transaksi.status, tb_detail_transaksi.id_kondisi, tb_detail_transaksi.flag_transaksi');
        // $this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.id_transaksi = tb_master_transaksi.id', 'INNER');
        $this->db->join('tb_master_type_transaksi', 'tb_master_type_transaksi.id = tb_master_transaksi.tipe_transaksi', 'LEFT');
        $this->db->join('tb_master_area', 'tb_master_area.id = tb_master_transaksi.id_area', 'LEFT');
        $this->db->join('tb_master_gedung', 'tb_master_gedung.id = tb_master_transaksi.id_gedung', 'LEFT');
        $this->db->join('tb_master_ruangan', 'tb_master_ruangan.id = tb_master_transaksi.id_ruangan', 'LEFT');
        return $this;
    }

    public function filter_avaiable() {
        if (!$this->aauth->is_admin()) {}
        return $this;
    }

    public function count_all_content(){

        $this->db->from('tb_master_aset');
        $this->db->where('kode_tid IS NOT NULL');
        return $this->db->count_all_results();
        
    }

    public function get_all_aset($filter_data) {

        if ($filter_data['id_area'] != '') {
            $this->db->where('a.id_area', $filter_data['id_area']);
        }
        if ($filter_data['id_gedung'] != '') {
            $this->db->where('a.id_gedung', $filter_data['id_gedung']);
        }
        if ($filter_data['id_ruangan'] != '') {
            $this->db->where('a.id_lokasi', $filter_data['id_ruangan']);
        }

        $this->db->select('a.*');
        $this->db->from('tb_master_aset a');
        $this->db->where('a.kode_tid IS NOT NULL');
        return $this->db->get()->result();
    }

    public function get_content($limit, $start, $order, $dir, $select_all, $filter_data){

        if ($select_all == '1') {
            $this->db->where('a.id_area', $filter_data['id_area']);
            $this->db->where('a.id_gedung', $filter_data['id_gedung']);
            $this->db->where('a.id_lokasi', $filter_data['id_ruangan']);
        } else {
            
            if ($filter_data['id_area'] != '') {
                $this->db->where('a.id_area', $filter_data['id_area']);
            }
            if ($filter_data['id_gedung'] != '') {
                $this->db->where('a.id_gedung', $filter_data['id_gedung']);
            }
            if ($filter_data['id_ruangan'] != '') {
                $this->db->where('a.id_lokasi', $filter_data['id_ruangan']);
            }

        }

        $this->db->select('a.*');
        $this->db->from('tb_master_aset a');
        $this->db->where('a.kode_tid IS NOT NULL');
        $this->db->order_by($order, $dir);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result();
        
    }

    public function content_search($limit, $start, $search, $order, $dir, $select_all, $filter_data){
        $this->db->select('a.*');
        $this->db->from('tb_master_aset a');
        $this->db->where('a.kode_tid IS NOT NULL');
        $this->db->like('a.nama_aset', $search);
        $this->db->or_like('a.kode_aset', $search);
        $this->db->order_by($order, $dir);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function content_search_count($search, $select_all, $filter_data){
        $this->db->from('tb_master_aset a');
        $this->db->where('a.kode_tid IS NOT NULL');
        $this->db->like('a.nama_aset', $search);
        $this->db->or_like('a.kode_aset', $search);
        return $this->db->count_all_results();
    }

    public function saveRegisterAset($save_data_master_transaksi, $save_data_detail_transaksi, $linked_data){

        // Mulai transaksi database
        $this->db->trans_start();

        try {
            // Insert ke tabel master transaksi
            $this->db->insert('tb_master_transaksi', $save_data_master_transaksi);
            $id_transaksi = $this->db->insert_id();

            // Jika ada data linked aset dan tag
            if(!empty($linked_data)) {
                
                // Loop untuk setiap data linked
                foreach($linked_data as $data) {
                    
                    $data_detail = array(
                        'id_transaksi' => $id_transaksi,
                        // 'kode_transaksi' => $save_data_master_transaksi['kode_transaksi'],
                        'kode_transaksi' => '',
                        'kode_tid' => $data['tag']['tid'], // Ambil tid dari tag
                        'id_aset' => $data['aset']['id'],
                        'kode_aset' => $data['aset']['kode_aset'],
                        'nup' => $data['aset']['nup'],
                        'nama_aset' => $data['aset']['nama_aset'],
                        // 'id_area' => $save_data_detail_transaksi['id_area'],
                        // 'id_gedung' => $save_data_detail_transaksi['id_gedung'], 
                        // 'id_ruangan' => $save_data_detail_transaksi['id_ruangan'],
                        'status' => 1,
                        'id_kondisi' => 1
                    );

                    // echo '<pre>';
                    // print_r($data_detail);
                    // echo '</pre>';
                    
                    // Insert ke tabel detail transaksi
                    $this->db->insert('tb_detail_transaksi', $data_detail);

                    // Update status tag
                    $this->db->where('kode_tid', $data['tag']['tid']);
                    $this->db->update('tb_master_tag_rfid', array(
                        'status_tag' => 'N',
                        'id_aset' => $data['aset']['id']
                    ));

                    // update field kode_rfid, id_area, id _gedung, id_ruangan, id_kondisi, status ke master aset
                    $this->db->where('id_aset', $data['aset']['id']);
                    $this->db->update('tb_master_aset', array(
                        'kode_tid' => $data['tag']['tid'],
                        'id_area' => $save_data_master_transaksi['id_area'],
                        'id_gedung' => $save_data_master_transaksi['id_gedung'],
                        'id_lokasi' => $save_data_master_transaksi['id_ruangan'],
                        'kondisi' => 1,
                        'status' => 1,
                        'flag_inventarisasi' => 1,
                        'tgl_inventarisasi' => date('Y-m-d')
                    )); 
                    
                }

            }

            // exit();

            // Commit transaksi jika semua berhasil
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE) {
                // Rollback jika ada error
                $this->db->trans_rollback();
                return FALSE;
                // echo 'false';
            } else {
                return $id_transaksi;
                // echo 'true';
            }

        } catch(Exception $e) {
            // Rollback jika terjadi exception
            $this->db->trans_rollback();
            return FALSE;
        }

    }

    function getTransaksiById($id){
        $this->db->select('tb_master_transaksi.*, tb_master_area.area as tb_master_area_area, tb_master_gedung.gedung as tb_master_gedung_gedung, tb_master_ruangan.ruangan as tb_master_ruangan_ruangan');
        $this->db->from('tb_master_transaksi');
        $this->db->join('tb_master_area', 'tb_master_area.id = tb_master_transaksi.id_area', 'left');   
        $this->db->join('tb_master_gedung', 'tb_master_gedung.id = tb_master_transaksi.id_gedung', 'left');
        $this->db->join('tb_master_ruangan', 'tb_master_ruangan.id = tb_master_transaksi.id_ruangan', 'left');
        $this->db->where('tb_master_transaksi.id', $id);
        return $this->db->get()->row();
    }

    function getDetailTransaksiById($id){
        $this->db->select('*');
        $this->db->from('tb_detail_transaksi');
        $this->db->where('id_transaksi', $id);
        return $this->db->get()->result();
    }

    function getPengaturanSistem(){
        $this->db->select('*');
        $this->db->from('pengaturan_sistem');
        return $this->db->get()->row();
    }
    
    function get_data_pie_chart(){
        $this->db->select('tb_master_area.area, count(tb_master_transaksi.id_area) as total');
        $this->db->from('tb_master_transaksi');
        $this->db->join('tb_master_area', 'tb_master_transaksi.id_area = tb_master_area.id', 'left');
        $this->db->group_by('tb_master_transaksi.id_area');
        return $this->db->get()->result();
    }

}

/* End of file Model_pencarian_aset.php */
/* Location: ./application/models/Model_pencarian_aset.php */