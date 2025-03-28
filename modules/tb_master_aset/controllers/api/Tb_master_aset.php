<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Tb_master_aset extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_tb_master_aset');
	}

	/**
	 * @api {get} /tb_master_aset/all Get all tb_master_asets.
	 * @apiVersion 0.1.0
	 * @apiName AllTbmasteraset 
	 * @apiGroup tb_master_aset
	 * @apiHeader {String} X-Api-Key Tb master asets unique access-key.
	 * @apiPermission Tb master aset Cant be Accessed permission name : api_tb_master_aset_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Tb master asets.
	 * @apiParam {String} [Field="All Field"] Optional field of Tb master asets : id_aset, kode_tid, kode_aset, nup, kategori, merk, tipe, kondisi, status, borrow, tipe_moving, nama_aset, id_area, id_gedung, id_lokasi, tgl_perolehan, nilai_perolehan, tgl_inventarisasi, tgl_peminjaman, tgl_pengembalian, flag_inventarisasi, id_peminjam, lokasi_moving, lokasi_terakhir, nama_lokasi_terakhir, id_pegawai, image_uri, id_transaksi, no_batch_sensus, keterangan.
	 * @apiParam {String} [Start=0] Optional start index of Tb master asets.
	 * @apiParam {String} [Limit=10] Optional limit data of Tb master asets.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tb_master_aset.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataTb master aset Tb master aset data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_tb_master_aset_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id_aset', 'kode_tid', 'kode_aset', 'nup', 'kategori', 'merk', 'tipe', 'kondisi', 'status', 'borrow', 'tipe_moving', 'nama_aset', 'id_area', 'id_gedung', 'id_lokasi', 'tgl_perolehan', 'nilai_perolehan', 'tgl_inventarisasi', 'tgl_peminjaman', 'tgl_pengembalian', 'flag_inventarisasi', 'id_peminjam', 'lokasi_moving', 'lokasi_terakhir', 'nama_lokasi_terakhir', 'id_pegawai', 'image_uri', 'id_transaksi', 'no_batch_sensus', 'keterangan'];
		$tb_master_asets = $this->model_api_tb_master_aset->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_tb_master_aset->count_all($filter, $field);
		$tb_master_asets = array_map(function($row){
						
			return $row;
		}, $tb_master_asets);

		$data['tb_master_aset'] = $tb_master_asets;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Tb master aset',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /tb_master_aset/detail Detail Tb master aset.
	 * @apiVersion 0.1.0
	 * @apiName DetailTb master aset
	 * @apiGroup tb_master_aset
	 * @apiHeader {String} X-Api-Key Tb master asets unique access-key.
	 * @apiPermission Tb master aset Cant be Accessed permission name : api_tb_master_aset_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Tb master asets.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tb_master_aset.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Tb master asetNotFound Tb master aset data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_tb_master_aset_detail', false);

		$this->requiredInput(['id_aset']);

		$id = $this->get('id_aset');

		$select_field = ['id_aset', 'kode_tid', 'kode_aset', 'nup', 'kategori', 'merk', 'tipe', 'kondisi', 'status', 'borrow', 'tipe_moving', 'nama_aset', 'id_area', 'id_gedung', 'id_lokasi', 'tgl_perolehan', 'nilai_perolehan', 'tgl_inventarisasi', 'tgl_peminjaman', 'tgl_pengembalian', 'flag_inventarisasi', 'id_peminjam', 'lokasi_moving', 'lokasi_terakhir', 'nama_lokasi_terakhir', 'id_pegawai', 'image_uri', 'id_transaksi', 'no_batch_sensus', 'keterangan'];
		$tb_master_aset = $this->model_api_tb_master_aset->find($id, $select_field);

		if (!$tb_master_aset) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['tb_master_aset'] = $tb_master_aset;
		if ($data['tb_master_aset']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Tb master aset',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tb master aset not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /tb_master_aset/add Add Tb master aset.
	 * @apiVersion 0.1.0
	 * @apiName AddTb master aset
	 * @apiGroup tb_master_aset
	 * @apiHeader {String} X-Api-Key Tb master asets unique access-key.
	 * @apiPermission Tb master aset Cant be Accessed permission name : api_tb_master_aset_add
	 *
 	 * @apiParam {String} Kode_tid Mandatory kode_tid of Tb master asets. Input Kode Tid Max Length : 50. 
	 * @apiParam {String} Kode_aset Mandatory kode_aset of Tb master asets. Input Kode Aset Max Length : 255. 
	 * @apiParam {String} Nup Mandatory nup of Tb master asets.  
	 * @apiParam {String} Kategori Mandatory kategori of Tb master asets.  
	 * @apiParam {String} Merk Mandatory merk of Tb master asets. Input Merk Max Length : 100. 
	 * @apiParam {String} Tipe Mandatory tipe of Tb master asets. Input Tipe Max Length : 100. 
	 * @apiParam {String} Kondisi Mandatory kondisi of Tb master asets.  
	 * @apiParam {String} Status Mandatory status of Tb master asets.  
	 * @apiParam {String} Borrow Mandatory borrow of Tb master asets.  
	 * @apiParam {String} Tipe_moving Mandatory tipe_moving of Tb master asets.  
	 * @apiParam {String} Nama_aset Mandatory nama_aset of Tb master asets. Input Nama Aset Max Length : 100. 
	 * @apiParam {String} Id_area Mandatory id_area of Tb master asets.  
	 * @apiParam {String} Id_gedung Mandatory id_gedung of Tb master asets.  
	 * @apiParam {String} Id_lokasi Mandatory id_lokasi of Tb master asets.  
	 * @apiParam {String} Tgl_perolehan Mandatory tgl_perolehan of Tb master asets.  
	 * @apiParam {String} Nilai_perolehan Mandatory nilai_perolehan of Tb master asets.  
	 * @apiParam {String} Tgl_inventarisasi Mandatory tgl_inventarisasi of Tb master asets.  
	 * @apiParam {String} Tgl_peminjaman Mandatory tgl_peminjaman of Tb master asets.  
	 * @apiParam {String} Tgl_pengembalian Mandatory tgl_pengembalian of Tb master asets.  
	 * @apiParam {String} Flag_inventarisasi Mandatory flag_inventarisasi of Tb master asets.  
	 * @apiParam {String} Id_peminjam Mandatory id_peminjam of Tb master asets.  
	 * @apiParam {String} Lokasi_moving Mandatory lokasi_moving of Tb master asets.  
	 * @apiParam {String} Lokasi_terakhir Mandatory lokasi_terakhir of Tb master asets.  
	 * @apiParam {String} Nama_lokasi_terakhir Mandatory nama_lokasi_terakhir of Tb master asets. Input Nama Lokasi Terakhir Max Length : 100. 
	 * @apiParam {String} Id_pegawai Mandatory id_pegawai of Tb master asets.  
	 * @apiParam {String} Image_uri Mandatory image_uri of Tb master asets. Input Image Uri Max Length : 255. 
	 * @apiParam {String} Id_transaksi Mandatory id_transaksi of Tb master asets.  
	 * @apiParam {String} No_batch_sensus Mandatory no_batch_sensus of Tb master asets. Input No Batch Sensus Max Length : 50. 
	 * @apiParam {String} Keterangan Mandatory keterangan of Tb master asets. Input Keterangan Max Length : 255. 
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function add_post()
	{
		$this->is_allowed('api_tb_master_aset_add', false);

		$this->form_validation->set_rules('kode_tid', 'Kode Tid', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('nup', 'Nup', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('merk', 'Merk', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('tipe', 'Tipe', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('borrow', 'Borrow', 'trim|required');
		$this->form_validation->set_rules('tipe_moving', 'Tipe Moving', 'trim|required');
		$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('id_area', 'Id Area', 'trim|required');
		$this->form_validation->set_rules('id_gedung', 'Id Gedung', 'trim|required');
		$this->form_validation->set_rules('id_lokasi', 'Id Lokasi', 'trim|required');
		$this->form_validation->set_rules('tgl_perolehan', 'Tgl Perolehan', 'trim|required');
		$this->form_validation->set_rules('nilai_perolehan', 'Nilai Perolehan', 'trim|required');
		$this->form_validation->set_rules('tgl_inventarisasi', 'Tgl Inventarisasi', 'trim|required');
		$this->form_validation->set_rules('tgl_peminjaman', 'Tgl Peminjaman', 'trim|required');
		$this->form_validation->set_rules('tgl_pengembalian', 'Tgl Pengembalian', 'trim|required');
		$this->form_validation->set_rules('flag_inventarisasi', 'Flag Inventarisasi', 'trim|required');
		$this->form_validation->set_rules('id_peminjam', 'Id Peminjam', 'trim|required');
		$this->form_validation->set_rules('lokasi_moving', 'Lokasi Moving', 'trim|required');
		$this->form_validation->set_rules('lokasi_terakhir', 'Lokasi Terakhir', 'trim|required');
		$this->form_validation->set_rules('nama_lokasi_terakhir', 'Nama Lokasi Terakhir', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('id_pegawai', 'Id Pegawai', 'trim|required');
		$this->form_validation->set_rules('image_uri', 'Image Uri', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('id_transaksi', 'Id Transaksi', 'trim|required');
		$this->form_validation->set_rules('no_batch_sensus', 'No Batch Sensus', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'kode_tid' => $this->input->post('kode_tid'),
				'kode_aset' => $this->input->post('kode_aset'),
				'nup' => $this->input->post('nup'),
				'kategori' => $this->input->post('kategori'),
				'merk' => $this->input->post('merk'),
				'tipe' => $this->input->post('tipe'),
				'kondisi' => $this->input->post('kondisi'),
				'status' => $this->input->post('status'),
				'borrow' => $this->input->post('borrow'),
				'tipe_moving' => $this->input->post('tipe_moving'),
				'nama_aset' => $this->input->post('nama_aset'),
				'id_area' => $this->input->post('id_area'),
				'id_gedung' => $this->input->post('id_gedung'),
				'id_lokasi' => $this->input->post('id_lokasi'),
				'tgl_perolehan' => $this->input->post('tgl_perolehan'),
				'nilai_perolehan' => $this->input->post('nilai_perolehan'),
				'tgl_inventarisasi' => $this->input->post('tgl_inventarisasi'),
				'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
				'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
				'flag_inventarisasi' => $this->input->post('flag_inventarisasi'),
				'id_peminjam' => $this->input->post('id_peminjam'),
				'lokasi_moving' => $this->input->post('lokasi_moving'),
				'lokasi_terakhir' => $this->input->post('lokasi_terakhir'),
				'nama_lokasi_terakhir' => $this->input->post('nama_lokasi_terakhir'),
				'id_pegawai' => $this->input->post('id_pegawai'),
				'image_uri' => $this->input->post('image_uri'),
				'id_transaksi' => $this->input->post('id_transaksi'),
				'no_batch_sensus' => $this->input->post('no_batch_sensus'),
				'keterangan' => $this->input->post('keterangan'),
			];
			
			$save_tb_master_aset = $this->model_api_tb_master_aset->store($save_data);

			if ($save_tb_master_aset) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully stored into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Validation Errors.',
				'errors' 	=> $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	/**
	 * @api {post} /tb_master_aset/update Update Tb master aset.
	 * @apiVersion 0.1.0
	 * @apiName UpdateTb master aset
	 * @apiGroup tb_master_aset
	 * @apiHeader {String} X-Api-Key Tb master asets unique access-key.
	 * @apiPermission Tb master aset Cant be Accessed permission name : api_tb_master_aset_update
	 *
	 * @apiParam {String} Kode_tid Mandatory kode_tid of Tb master asets. Input Kode Tid Max Length : 50. 
	 * @apiParam {String} Kode_aset Mandatory kode_aset of Tb master asets. Input Kode Aset Max Length : 255. 
	 * @apiParam {String} Nup Mandatory nup of Tb master asets.  
	 * @apiParam {String} Kategori Mandatory kategori of Tb master asets.  
	 * @apiParam {String} Merk Mandatory merk of Tb master asets. Input Merk Max Length : 100. 
	 * @apiParam {String} Tipe Mandatory tipe of Tb master asets. Input Tipe Max Length : 100. 
	 * @apiParam {String} Kondisi Mandatory kondisi of Tb master asets.  
	 * @apiParam {String} Status Mandatory status of Tb master asets.  
	 * @apiParam {String} Borrow Mandatory borrow of Tb master asets.  
	 * @apiParam {String} Tipe_moving Mandatory tipe_moving of Tb master asets.  
	 * @apiParam {String} Nama_aset Mandatory nama_aset of Tb master asets. Input Nama Aset Max Length : 100. 
	 * @apiParam {String} Id_area Mandatory id_area of Tb master asets.  
	 * @apiParam {String} Id_gedung Mandatory id_gedung of Tb master asets.  
	 * @apiParam {String} Id_lokasi Mandatory id_lokasi of Tb master asets.  
	 * @apiParam {String} Tgl_perolehan Mandatory tgl_perolehan of Tb master asets.  
	 * @apiParam {String} Nilai_perolehan Mandatory nilai_perolehan of Tb master asets.  
	 * @apiParam {String} Tgl_inventarisasi Mandatory tgl_inventarisasi of Tb master asets.  
	 * @apiParam {String} Tgl_peminjaman Mandatory tgl_peminjaman of Tb master asets.  
	 * @apiParam {String} Tgl_pengembalian Mandatory tgl_pengembalian of Tb master asets.  
	 * @apiParam {String} Flag_inventarisasi Mandatory flag_inventarisasi of Tb master asets.  
	 * @apiParam {String} Id_peminjam Mandatory id_peminjam of Tb master asets.  
	 * @apiParam {String} Lokasi_moving Mandatory lokasi_moving of Tb master asets.  
	 * @apiParam {String} Lokasi_terakhir Mandatory lokasi_terakhir of Tb master asets.  
	 * @apiParam {String} Nama_lokasi_terakhir Mandatory nama_lokasi_terakhir of Tb master asets. Input Nama Lokasi Terakhir Max Length : 100. 
	 * @apiParam {String} Id_pegawai Mandatory id_pegawai of Tb master asets.  
	 * @apiParam {String} Image_uri Mandatory image_uri of Tb master asets. Input Image Uri Max Length : 255. 
	 * @apiParam {String} Id_transaksi Mandatory id_transaksi of Tb master asets.  
	 * @apiParam {String} No_batch_sensus Mandatory no_batch_sensus of Tb master asets. Input No Batch Sensus Max Length : 50. 
	 * @apiParam {String} Keterangan Mandatory keterangan of Tb master asets. Input Keterangan Max Length : 255. 
	 * @apiParam {Integer} id_aset Mandatory id_aset of Tb Master Aset.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function update_post()
	{
		$this->is_allowed('api_tb_master_aset_update', false);

		
		$this->form_validation->set_rules('kode_tid', 'Kode Tid', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('nup', 'Nup', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('merk', 'Merk', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('tipe', 'Tipe', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('borrow', 'Borrow', 'trim|required');
		$this->form_validation->set_rules('tipe_moving', 'Tipe Moving', 'trim|required');
		$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('id_area', 'Id Area', 'trim|required');
		$this->form_validation->set_rules('id_gedung', 'Id Gedung', 'trim|required');
		$this->form_validation->set_rules('id_lokasi', 'Id Lokasi', 'trim|required');
		$this->form_validation->set_rules('tgl_perolehan', 'Tgl Perolehan', 'trim|required');
		$this->form_validation->set_rules('nilai_perolehan', 'Nilai Perolehan', 'trim|required');
		$this->form_validation->set_rules('tgl_inventarisasi', 'Tgl Inventarisasi', 'trim|required');
		$this->form_validation->set_rules('tgl_peminjaman', 'Tgl Peminjaman', 'trim|required');
		$this->form_validation->set_rules('tgl_pengembalian', 'Tgl Pengembalian', 'trim|required');
		$this->form_validation->set_rules('flag_inventarisasi', 'Flag Inventarisasi', 'trim|required');
		$this->form_validation->set_rules('id_peminjam', 'Id Peminjam', 'trim|required');
		$this->form_validation->set_rules('lokasi_moving', 'Lokasi Moving', 'trim|required');
		$this->form_validation->set_rules('lokasi_terakhir', 'Lokasi Terakhir', 'trim|required');
		$this->form_validation->set_rules('nama_lokasi_terakhir', 'Nama Lokasi Terakhir', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('id_pegawai', 'Id Pegawai', 'trim|required');
		$this->form_validation->set_rules('image_uri', 'Image Uri', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('id_transaksi', 'Id Transaksi', 'trim|required');
		$this->form_validation->set_rules('no_batch_sensus', 'No Batch Sensus', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'kode_tid' => $this->input->post('kode_tid'),
				'kode_aset' => $this->input->post('kode_aset'),
				'nup' => $this->input->post('nup'),
				'kategori' => $this->input->post('kategori'),
				'merk' => $this->input->post('merk'),
				'tipe' => $this->input->post('tipe'),
				'kondisi' => $this->input->post('kondisi'),
				'status' => $this->input->post('status'),
				'borrow' => $this->input->post('borrow'),
				'tipe_moving' => $this->input->post('tipe_moving'),
				'nama_aset' => $this->input->post('nama_aset'),
				'id_area' => $this->input->post('id_area'),
				'id_gedung' => $this->input->post('id_gedung'),
				'id_lokasi' => $this->input->post('id_lokasi'),
				'tgl_perolehan' => $this->input->post('tgl_perolehan'),
				'nilai_perolehan' => $this->input->post('nilai_perolehan'),
				'tgl_inventarisasi' => $this->input->post('tgl_inventarisasi'),
				'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
				'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
				'flag_inventarisasi' => $this->input->post('flag_inventarisasi'),
				'id_peminjam' => $this->input->post('id_peminjam'),
				'lokasi_moving' => $this->input->post('lokasi_moving'),
				'lokasi_terakhir' => $this->input->post('lokasi_terakhir'),
				'nama_lokasi_terakhir' => $this->input->post('nama_lokasi_terakhir'),
				'id_pegawai' => $this->input->post('id_pegawai'),
				'image_uri' => $this->input->post('image_uri'),
				'id_transaksi' => $this->input->post('id_transaksi'),
				'no_batch_sensus' => $this->input->post('no_batch_sensus'),
				'keterangan' => $this->input->post('keterangan'),
			];
			
			$save_tb_master_aset = $this->model_api_tb_master_aset->change($this->post('id_aset'), $save_data);

			if ($save_tb_master_aset) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully updated into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Validation Errors.',
				'errors' 	=> $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
	/**
	 * @api {post} /tb_master_aset/delete Delete Tb master aset. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteTb master aset
	 * @apiGroup tb_master_aset
	 * @apiHeader {String} X-Api-Key Tb master asets unique access-key.
	 	 * @apiPermission Tb master aset Cant be Accessed permission name : api_tb_master_aset_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Tb master asets .
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function delete_post()
	{
		$this->is_allowed('api_tb_master_aset_delete', false);

		$tb_master_aset = $this->model_api_tb_master_aset->find($this->post('id_aset'));

		if (!$tb_master_aset) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tb master aset not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_tb_master_aset->remove($this->post('id_aset'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Tb master aset deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tb master aset not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Tb master aset.php */
/* Location: ./application/controllers/api/Tb master aset.php */