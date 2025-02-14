<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_manual_sensus extends MY_Model
{

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
                $f_search = "tb_master_transaksi." . $field;

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
            $where .= "(" . "tb_master_transaksi." . $field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where('tb_master_transaksi.tipe_transaksi = 3');
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
                $f_search = "tb_master_transaksi." . $field;
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
            $where .= "(" . "tb_master_transaksi." . $field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) and count($select_field)) {
            $this->db->select($select_field);
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where('tb_master_transaksi.tipe_transaksi = 3');
        $this->db->limit($limit, $offset);

        $this->sortable();

        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable()
    {
        $this->db->select('tb_master_type_transaksi.tipe_transaksi,tb_master_area.area,tb_master_gedung.gedung,tb_master_ruangan.ruangan,tb_master_transaksi.*,tb_master_type_transaksi.tipe_transaksi as tb_master_type_transaksi_tipe_transaksi,tb_master_type_transaksi.tipe_transaksi as tipe_transaksi,tb_master_area.area as tb_master_area_area,tb_master_area.area as area,tb_master_gedung.gedung as tb_master_gedung_gedung,tb_master_gedung.gedung as gedung,tb_master_ruangan.ruangan as tb_master_ruangan_ruangan,tb_master_ruangan.ruangan as ruangan');
        // $this->db->select('tb_detail_transaksi.id as detail_id, tb_detail_transaksi.kode_tid, tb_detail_transaksi.id_aset, tb_detail_transaksi.kode_aset, tb_detail_transaksi.nup, tb_detail_transaksi.nama_aset, tb_detail_transaksi.status, tb_detail_transaksi.id_kondisi, tb_detail_transaksi.flag_transaksi');
        // $this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.id_transaksi = tb_master_transaksi.id', 'INNER');
        $this->db->join('tb_master_type_transaksi', 'tb_master_type_transaksi.id = tb_master_transaksi.tipe_transaksi', 'LEFT');
        $this->db->join('tb_master_area', 'tb_master_area.id = tb_master_transaksi.id_area', 'LEFT');
        $this->db->join('tb_master_gedung', 'tb_master_gedung.id = tb_master_transaksi.id_gedung', 'LEFT');
        $this->db->join('tb_master_ruangan', 'tb_master_ruangan.id = tb_master_transaksi.id_ruangan', 'LEFT');
        return $this;
    }

    public function filter_avaiable()
    {
        if (!$this->aauth->is_admin()) {
        }
        return $this;
    }

    public function count_all_content()
    {

        // if ($filter_id_parameter != '0') {
        //     $this->db->where('parameter_id', $filter_id_parameter);
        // }

        $this->db->from('tb_master_aset');
        $this->db->where('kode_tid IS NULL');
        return $this->db->count_all_results();
    }

    public function get_content($limit, $start, $order, $dir)
    {
        $this->db->select('a.*');
        $this->db->from('tb_master_aset a');
        $this->db->where('a.kode_tid IS NULL');
        $this->db->order_by($order, $dir);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function content_search($limit, $start, $search, $order, $dir)
    {
        $this->db->select('a.*');
        $this->db->from('tb_master_aset a');
        $this->db->like('a.nama_aset', $search);
        $this->db->or_like('a.kode_aset', $search);
        $this->db->order_by($order, $dir);
        $this->db->limit($limit, $start);
        $this->db->where('a.kode_tid IS NULL');
        $query = $this->db->get();
        return $query->result();
    }

    public function content_search_count($search)
    {
        $this->db->from('tb_master_aset a');
        $this->db->like('a.nama_aset', $search);
        $this->db->or_like('a.kode_aset', $search);
        $this->db->where('a.kode_tid IS NULL');
        return $this->db->count_all_results();
    }

    public function saveSensus($save_data_master_transaksi, $save_data_detail_transaksi, $hasil_sensus_normal, $hasil_sensus_anomali)
    {

        // Mulai transaksi database
        $this->db->trans_start();

        try {
            // Insert ke tabel master transaksi
            $this->db->insert('tb_master_transaksi', $save_data_master_transaksi);
            $id_transaksi = $this->db->insert_id();

            if (!empty($hasil_sensus_normal)) {

                // Loop untuk setiap data linked
                foreach ($hasil_sensus_normal as $data_hasil_sensus_normal) {

                    $data_detail_normal = array(
                        'id_transaksi' => $id_transaksi,
                        // 'kode_transaksi' => $save_data_master_transaksi['kode_transaksi'],
                        'kode_transaksi' => '',
                        'kode_tid' => $data_hasil_sensus_normal['kode_tid'], // Ambil tid dari tag
                        'id_aset' => $data_hasil_sensus_normal['id'],
                        'kode_aset' => $data_hasil_sensus_normal['kode_aset'],
                        'nup' => $data_hasil_sensus_normal['nup'],
                        'nama_aset' => $data_hasil_sensus_normal['nama_aset'],
                        'id_area' => $save_data_detail_transaksi['id_area'],
                        'id_gedung' => $save_data_detail_transaksi['id_gedung'], 
                        'id_ruangan' => $save_data_detail_transaksi['id_ruangan'],
                        'status' => $data_hasil_sensus_normal['is_found'],
                        'id_kondisi' => $data_hasil_sensus_normal['kondisi_aset'],
                        'flag_transaksi' => $data_hasil_sensus_normal['flag_sensus']
                    );

                    // echo '<pre>';
                    // print_r($data_detail_normal);
                    // echo '</pre>';

                    // Insert ke tabel detail transaksi
                    $this->db->insert('tb_detail_transaksi', $data_detail_normal);

                    // update field tgl_inventarisasi, flag_inventarisasi, id_transaksi ke master aset
                    $this->db->where('id_aset', $data_hasil_sensus_normal['id']);
                    $this->db->update('tb_master_aset', array(
                        // 'id_area' => $save_data_master_transaksi['id_area'],
                        // 'id_gedung' => $save_data_master_transaksi['id_gedung'],
                        // 'id_lokasi' => $save_data_master_transaksi['id_ruangan'],
                        // 'lokasi_moving' => $save_data_master_transaksi['id_ruangan'],
                        // 'kondisi' => 1,
                        // 'status' => 1,
                        'flag_inventarisasi' => $data_hasil_sensus_normal['flag_sensus'],
                        'tgl_inventarisasi' => date('Y-m-d H:i:s'),
                        'id_transaksi' => $id_transaksi,
                        'no_batch_sensus' => '-'
                    ));
                }
            }

            if (!empty($hasil_sensus_anomali)) {

                // Loop untuk setiap data linked
                foreach ($hasil_sensus_anomali as $data_hasil_sensus_anomali) {

                    $data_detail_anomali = array(
                        'id_transaksi' => $id_transaksi,
                        // 'kode_transaksi' => $save_data_master_transaksi['kode_transaksi'],
                        'kode_transaksi' => '',
                        'kode_tid' => $data_hasil_sensus_anomali['kode_tid'], // Ambil tid dari tag
                        'id_aset' => $data_hasil_sensus_anomali['id'],
                        'kode_aset' => $data_hasil_sensus_anomali['kode_aset'],
                        'nup' => $data_hasil_sensus_anomali['nup'],
                        'nama_aset' => $data_hasil_sensus_anomali['nama_aset'],
                        'id_area' => $save_data_detail_transaksi['id_area'],
                        'id_gedung' => $save_data_detail_transaksi['id_gedung'], 
                        'id_ruangan' => $save_data_detail_transaksi['id_ruangan'],
                        'status' => $data_hasil_sensus_anomali['is_found'],
                        'id_kondisi' => $data_hasil_sensus_anomali['kondisi_aset'],
                        'flag_transaksi' => $data_hasil_sensus_anomali['flag_sensus']
                    );

                    // echo '<pre>';
                    // print_r($data_detail_anomali);
                    // echo '</pre>';

                    // Insert ke tabel detail transaksi
                    $this->db->insert('tb_detail_transaksi', $data_detail_anomali);

                    // update field tgl_inventarisasi, flag_inventarisasi, id_transaksi ke master aset
                    $this->db->where('id_aset', $data_hasil_sensus_anomali['id']);
                    $this->db->update('tb_master_aset', array(
                        // 'id_area' => $save_data_master_transaksi['id_area'],
                        // 'id_gedung' => $save_data_master_transaksi['id_gedung'],
                        // 'id_lokasi' => $save_data_master_transaksi['id_ruangan'],
                        // 'lokasi_moving' => $save_data_master_transaksi['id_ruangan'],
                        // 'kondisi' => 1,
                        // 'status' => 1,
                        'flag_inventarisasi' => $data_hasil_sensus_anomali['flag_sensus'],
                        'tgl_inventarisasi' => date('Y-m-d H:i:s'),
                        'id_transaksi' => $id_transaksi,
                        'no_batch_sensus' => '-'
                    ));
                }
            }

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
        } catch (Exception $e) {
            // Rollback jika terjadi exception
            $this->db->trans_rollback();
            return FALSE;
        }
    }

    function getTransaksiById($id)
    {
        $this->db->select('tb_master_transaksi.*, date(tb_master_transaksi.tgl_awal_transaksi) as tanggal_sensus, tb_master_area.area as tb_master_area_area, tb_master_gedung.gedung as tb_master_gedung_gedung, tb_master_ruangan.ruangan as tb_master_ruangan_ruangan');
        $this->db->from('tb_master_transaksi');
        $this->db->join('tb_master_area', 'tb_master_area.id = tb_master_transaksi.id_area', 'left');
        $this->db->join('tb_master_gedung', 'tb_master_gedung.id = tb_master_transaksi.id_gedung', 'left');
        $this->db->join('tb_master_ruangan', 'tb_master_ruangan.id = tb_master_transaksi.id_ruangan', 'left');
        $this->db->where('tb_master_transaksi.id', $id);
        return $this->db->get()->row();
    }

    function getDetailTransaksiById($id)
    {
        $this->db->select("a.*, b.status as status_aset, c.kondisi as kondisi_aset, case when a.flag_transaksi = 1 then 'Normal' else 'Anomali' end as ceklis_sensus");
        $this->db->from("tb_detail_transaksi a");
        $this->db->join("tb_master_status b", "a.status = b.id", "LEFT");
        $this->db->join("tb_master_kondisi c", "a.id_kondisi = c.id", "LEFT");
        $this->db->where("a.id_transaksi", $id);
        return $this->db->get()->result();
    }

    function getPengaturanSistem()
    {
        $this->db->select('*');
        $this->db->from('pengaturan_sistem');
        return $this->db->get()->row();
    }

    // sensus

    public function getMasterStatus(){
        $this->db->select('*');
        $this->db->from('tb_master_status');
        return $this->db->get()->result();
    }

    public function get_all_aset($filter_data) {

        if ($filter_data['metode_pencarian'] == 'partial') {

            if ($filter_data['id_area'] != '') {
                $this->db->where('b.id_area', $filter_data['id_area']);
            }

            if ($filter_data['id_gedung'] != '') {
                $this->db->where('b.id_gedung', $filter_data['id_gedung']);
            }

            if ($filter_data['id_ruangan'] != '') {
                $this->db->where('a.lokasi_moving', $filter_data['id_ruangan']);
            }
            
            $this->db->select('a.*');
            $this->db->from('tb_master_aset a');
            $this->db->join('tb_master_ruangan b', 'b.id = a.lokasi_moving', 'LEFT');
            $this->db->where('a.kode_tid IS NOT NULL');

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

            $this->db->select('a.*');
            $this->db->from('tb_master_aset a');
            $this->db->join('tb_master_ruangan b', 'b.id = a.id_lokasi', 'LEFT');
            $this->db->where('a.kode_tid IS NOT NULL');

        }

        return $this->db->get()->result();
    }

    function getAsetByID($tid){
        $this->db->select('a.*, b.ruangan, c.gedung, d.area');
        $this->db->from('tb_master_aset a');
        $this->db->join('tb_master_ruangan b', 'b.id = a.id_lokasi', 'LEFT');
        $this->db->join('tb_master_gedung c', 'c.id = a.id_gedung', 'LEFT');            
        $this->db->join('tb_master_area d', 'd.id = a.id_area', 'LEFT');
        $this->db->where('a.kode_tid', $tid);
        return $this->db->get()->row();
    }

    function getStatusAsetByTID($tid, $flag_moving_in){
        $this->db->select('a.nama_aset, a.nama_lokasi_terakhir, b.status');
        $this->db->from('tb_master_aset a');
        $this->db->join('tb_master_status b', 'b.id = a.status', 'LEFT');
        $this->db->where('a.kode_tid', $tid);
        $this->db->where('a.status <>', $flag_moving_in);
        return $this->db->get();
    }

    function getHasilSensusById($id)
    {
        $this->db->select("a.*, b.status as status_aset, c.kondisi as kondisi_aset, case when a.flag_transaksi = 1 then 'Normal' else 'Anomali' end as ceklis_sensus, e.kategori as kategori_aset, YEAR(d.tgl_perolehan) as tahun_perolehan, d.nilai_perolehan, f.ruangan as lokasi_sensus");
        $this->db->from("tb_detail_transaksi a");
        $this->db->join("tb_master_status b", "a.status = b.id", "LEFT");
        $this->db->join("tb_master_kondisi c", "a.id_kondisi = c.id", "LEFT");
        $this->db->join("tb_master_aset d", "a.id_aset = d.id_aset", "LEFT");
        $this->db->join("tb_master_kategori e", "e.id = d.kategori", "LEFT");
        $this->db->join("tb_master_ruangan f", "a.id_ruangan = f.id", "LEFT");
        $this->db->where("a.id_transaksi", $id);
        return $this->db->get()->result();
    }

    function getRekonSensusById($id)
    {
        $this->db->select("a.*, YEAR(b.tgl_perolehan) as tahun_perolehan, c.ruangan AS lokasi_master, d.ruangan AS lokasi_sensus, case when a.flag_transaksi = 1 then 'Normal' ELSE 'Anomali' END AS status_sensus, e.status AS catatan_sensus, f.kondisi AS kondisi_aset, g.kategori AS kategori_aset");
        $this->db->from("tb_detail_transaksi a");
        $this->db->join("tb_master_aset b", "a.id_aset = b.id_aset");
        $this->db->join("tb_master_ruangan c", "c.id = b.id_lokasi");
        $this->db->join("tb_master_ruangan d", "d.id = a.id_ruangan");
        $this->db->join("tb_master_status e", "e.id = a.status");
        $this->db->join("tb_master_kondisi f", "f.id = a.id_kondisi");
        $this->db->join("tb_master_kategori g", "g.id = b.kategori");
        $this->db->where("a.id_transaksi", $id);
        return $this->db->get()->result();
    }

    function getSummaryRekonSensusById($id, $id_ruangan)
    {
        $this->db->select("
            (SELECT COUNT(id_aset) FROM tb_master_aset WHERE kode_tid IS NOT null) AS total_aset_tahun_all,
            (SELECT COUNT(id_aset) FROM tb_master_aset WHERE kode_tid IS NOT NULL AND id_lokasi = $id_ruangan) AS total_aset_ruangan,
            (SELECT COUNT(id) FROM tb_detail_transaksi WHERE id_transaksi = $id) AS total_aset_terdata,
            (SELECT COUNT(id) FROM tb_detail_transaksi WHERE id_transaksi = $id AND status = 1) AS total_cocok,
            (SELECT COUNT(id) FROM tb_detail_transaksi WHERE id_transaksi = $id AND status <> 1) AS total_hilang
        ");
        return $this->db->get()->row_array();
    }

    public function get_dataaset()
    {
        $query = $this->db->query(
            // "SELECT a.id_aset, a.kode_tid, a.kode_aset, a.nup, a.nama_aset, s.id, s.status FROM tb_master_aset a JOIN tb_master_status s ON s.id = a.status WHERE a.kode_tid != '' ORDER BY a.kode_tid DESC LIMIT 500 OFFSET 0"
            "SELECT a.id_aset, a.kode_tid, a.kode_aset, a.nup, a.nama_aset FROM tb_master_aset a WHERE a.kode_tid IS NOT NULL ORDER BY a.kode_tid DESC LIMIT 500 OFFSET 0"
        );

        return $query->result();
    }

    public function getRuangan($id)
    {

        if ($id != '') {
            // Add your logic here for when $id is null
            $this->db->where('id', $id);
        }

        $query = $this->db->get('tb_master_ruangan');
        $this->db->order_by('ruangan', 'ASC');

        return $query;
    }

    public function getReader($id_ruangan, $reader_id)
    {

        if ($id_ruangan != '') {
            $this->db->where('room_id', $id_ruangan);
        }

        if ($reader_id != '') {
            $this->db->where('reader_id', $reader_id);
        }

        $query = $this->db->get('tag_reader');
        $this->db->order_by('reader_name', 'ASC');

        return $query;
    }

}

/* End of file model_manual_sensus.php */