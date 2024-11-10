<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Tb_asset_master extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_tb_asset_master');
	}

	/**
	 * @api {get} /tb_asset_master/all Get all tb_asset_masters.
	 * @apiVersion 0.1.0
	 * @apiName AllTbassetmaster 
	 * @apiGroup tb_asset_master
	 * @apiHeader {String} X-Api-Key Tb asset masters unique access-key.
	 * @apiPermission Tb asset master Cant be Accessed permission name : api_tb_asset_master_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Tb asset masters.
	 * @apiParam {String} [Field="All Field"] Optional field of Tb asset masters : id, kode_brg, nup, tag_code, nama_brg, merk, tipe, kondisi, nilai, kelompok, tgl_inventarisasi, tglperolehan, keterangan, pic_aset.
	 * @apiParam {String} [Start=0] Optional start index of Tb asset masters.
	 * @apiParam {String} [Limit=10] Optional limit data of Tb asset masters.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tb_asset_master.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataTb asset master Tb asset master data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_tb_asset_master_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id', 'kode_brg', 'nup', 'tag_code', 'nama_brg', 'merk', 'tipe', 'kondisi', 'nilai', 'kelompok', 'tgl_inventarisasi', 'tglperolehan', 'keterangan', 'pic_aset'];
		$tb_asset_masters = $this->model_api_tb_asset_master->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_tb_asset_master->count_all($filter, $field);
		$tb_asset_masters = array_map(function($row){
						
			return $row;
		}, $tb_asset_masters);

		$data['tb_asset_master'] = $tb_asset_masters;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Tb asset master',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /tb_asset_master/detail Detail Tb asset master.
	 * @apiVersion 0.1.0
	 * @apiName DetailTb asset master
	 * @apiGroup tb_asset_master
	 * @apiHeader {String} X-Api-Key Tb asset masters unique access-key.
	 * @apiPermission Tb asset master Cant be Accessed permission name : api_tb_asset_master_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Tb asset masters.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tb_asset_master.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Tb asset masterNotFound Tb asset master data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_tb_asset_master_detail', false);

		$this->requiredInput(['id']);

		$id = $this->get('id');

		$select_field = ['id', 'kode_brg', 'nup', 'tag_code', 'nama_brg', 'merk', 'tipe', 'kondisi', 'nilai', 'kelompok', 'tgl_inventarisasi', 'tglperolehan', 'keterangan', 'pic_aset'];
		$tb_asset_master = $this->model_api_tb_asset_master->find($id, $select_field);

		if (!$tb_asset_master) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['tb_asset_master'] = $tb_asset_master;
		if ($data['tb_asset_master']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Tb asset master',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tb asset master not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /tb_asset_master/add Add Tb asset master.
	 * @apiVersion 0.1.0
	 * @apiName AddTb asset master
	 * @apiGroup tb_asset_master
	 * @apiHeader {String} X-Api-Key Tb asset masters unique access-key.
	 * @apiPermission Tb asset master Cant be Accessed permission name : api_tb_asset_master_add
	 *
 	 * @apiParam {String} Kode_brg Mandatory kode_brg of Tb asset masters. Input Kode Brg Max Length : 15. 
	 * @apiParam {String} Nup Mandatory nup of Tb asset masters. Input Nup Max Length : 11. 
	 * @apiParam {String} Tag_code Mandatory tag_code of Tb asset masters. Input Tag Code Max Length : 96. 
	 * @apiParam {String} Nama_brg Mandatory nama_brg of Tb asset masters. Input Nama Brg Max Length : 200. 
	 * @apiParam {String} Merk Mandatory merk of Tb asset masters. Input Merk Max Length : 50. 
	 * @apiParam {String} Tipe Mandatory tipe of Tb asset masters. Input Tipe Max Length : 30. 
	 * @apiParam {String} Kondisi Mandatory kondisi of Tb asset masters.  
	 * @apiParam {String} Nilai Mandatory nilai of Tb asset masters.  
	 * @apiParam {String} Kelompok Mandatory kelompok of Tb asset masters.  
	 * @apiParam {String} Tgl_inventarisasi Mandatory tgl_inventarisasi of Tb asset masters.  
	 * @apiParam {String} Tglperolehan Mandatory tglperolehan of Tb asset masters.  
	 * @apiParam {String} Lokasi Mandatory lokasi of Tb asset masters.  
	 * @apiParam {String} Status_id Mandatory status_id of Tb asset masters.  
	 * @apiParam {String} Keterangan Mandatory keterangan of Tb asset masters. Input Keterangan Max Length : 200. 
	 * @apiParam {String} Pic_aset Mandatory pic_aset of Tb asset masters.  
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
		$this->is_allowed('api_tb_asset_master_add', false);

		$this->form_validation->set_rules('kode_brg', 'Kode Brg', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('nup', 'Nup', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('tag_code', 'Tag Code', 'trim|required|max_length[96]');
		$this->form_validation->set_rules('nama_brg', 'Nama Brg', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('merk', 'Merk', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('tipe', 'Tipe', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');
		$this->form_validation->set_rules('kelompok', 'Kelompok', 'trim|required');
		$this->form_validation->set_rules('tgl_inventarisasi', 'Tgl Inventarisasi', 'trim|required');
		$this->form_validation->set_rules('tglperolehan', 'Tglperolehan', 'trim|required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
		$this->form_validation->set_rules('status_id', 'Status Id', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('pic_aset', 'Pic Aset', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'kode_brg' => $this->input->post('kode_brg'),
				'nup' => $this->input->post('nup'),
				'tag_code' => $this->input->post('tag_code'),
				'nama_brg' => $this->input->post('nama_brg'),
				'merk' => $this->input->post('merk'),
				'tipe' => $this->input->post('tipe'),
				'kondisi' => $this->input->post('kondisi'),
				'nilai' => $this->input->post('nilai'),
				'kelompok' => $this->input->post('kelompok'),
				'tgl_inventarisasi' => $this->input->post('tgl_inventarisasi'),
				'tglperolehan' => $this->input->post('tglperolehan'),
				'lokasi' => $this->input->post('lokasi'),
				'status_id' => $this->input->post('status_id'),
				'keterangan' => $this->input->post('keterangan'),
				'pic_aset' => $this->input->post('pic_aset'),
			];
			
			$save_tb_asset_master = $this->model_api_tb_asset_master->store($save_data);

			if ($save_tb_asset_master) {
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
	 * @api {post} /tb_asset_master/update Update Tb asset master.
	 * @apiVersion 0.1.0
	 * @apiName UpdateTb asset master
	 * @apiGroup tb_asset_master
	 * @apiHeader {String} X-Api-Key Tb asset masters unique access-key.
	 * @apiPermission Tb asset master Cant be Accessed permission name : api_tb_asset_master_update
	 *
	 * @apiParam {String} Kode_brg Mandatory kode_brg of Tb asset masters. Input Kode Brg Max Length : 15. 
	 * @apiParam {String} Nup Mandatory nup of Tb asset masters. Input Nup Max Length : 11. 
	 * @apiParam {String} Tag_code Mandatory tag_code of Tb asset masters. Input Tag Code Max Length : 96. 
	 * @apiParam {String} Nama_brg Mandatory nama_brg of Tb asset masters. Input Nama Brg Max Length : 200. 
	 * @apiParam {String} Merk Mandatory merk of Tb asset masters. Input Merk Max Length : 50. 
	 * @apiParam {String} Tipe Mandatory tipe of Tb asset masters. Input Tipe Max Length : 30. 
	 * @apiParam {String} Kondisi Mandatory kondisi of Tb asset masters.  
	 * @apiParam {String} Nilai Mandatory nilai of Tb asset masters.  
	 * @apiParam {String} Kelompok Mandatory kelompok of Tb asset masters.  
	 * @apiParam {String} Tgl_inventarisasi Mandatory tgl_inventarisasi of Tb asset masters.  
	 * @apiParam {String} Tglperolehan Mandatory tglperolehan of Tb asset masters.  
	 * @apiParam {String} Lokasi Mandatory lokasi of Tb asset masters.  
	 * @apiParam {String} Status_id Mandatory status_id of Tb asset masters.  
	 * @apiParam {String} Keterangan Mandatory keterangan of Tb asset masters. Input Keterangan Max Length : 200. 
	 * @apiParam {String} Pic_aset Mandatory pic_aset of Tb asset masters.  
	 * @apiParam {Integer} id Mandatory id of Tb Asset Master.
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
		$this->is_allowed('api_tb_asset_master_update', false);

		
		$this->form_validation->set_rules('kode_brg', 'Kode Brg', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('nup', 'Nup', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('tag_code', 'Tag Code', 'trim|required|max_length[96]');
		$this->form_validation->set_rules('nama_brg', 'Nama Brg', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('merk', 'Merk', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('tipe', 'Tipe', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');
		$this->form_validation->set_rules('kelompok', 'Kelompok', 'trim|required');
		$this->form_validation->set_rules('tgl_inventarisasi', 'Tgl Inventarisasi', 'trim|required');
		$this->form_validation->set_rules('tglperolehan', 'Tglperolehan', 'trim|required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
		$this->form_validation->set_rules('status_id', 'Status Id', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('pic_aset', 'Pic Aset', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'kode_brg' => $this->input->post('kode_brg'),
				'nup' => $this->input->post('nup'),
				'tag_code' => $this->input->post('tag_code'),
				'nama_brg' => $this->input->post('nama_brg'),
				'merk' => $this->input->post('merk'),
				'tipe' => $this->input->post('tipe'),
				'kondisi' => $this->input->post('kondisi'),
				'nilai' => $this->input->post('nilai'),
				'kelompok' => $this->input->post('kelompok'),
				'tgl_inventarisasi' => $this->input->post('tgl_inventarisasi'),
				'tglperolehan' => $this->input->post('tglperolehan'),
				'lokasi' => $this->input->post('lokasi'),
				'status_id' => $this->input->post('status_id'),
				'keterangan' => $this->input->post('keterangan'),
				'pic_aset' => $this->input->post('pic_aset'),
			];
			
			$save_tb_asset_master = $this->model_api_tb_asset_master->change($this->post('id'), $save_data);

			if ($save_tb_asset_master) {
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
	 * @api {post} /tb_asset_master/delete Delete Tb asset master. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteTb asset master
	 * @apiGroup tb_asset_master
	 * @apiHeader {String} X-Api-Key Tb asset masters unique access-key.
	 	 * @apiPermission Tb asset master Cant be Accessed permission name : api_tb_asset_master_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Tb asset masters .
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
		$this->is_allowed('api_tb_asset_master_delete', false);

		$tb_asset_master = $this->model_api_tb_asset_master->find($this->post('id'));

		if (!$tb_asset_master) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tb asset master not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_tb_asset_master->remove($this->post('id'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Tb asset master deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tb asset master not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	public function all_ridwan_get()
	{

		$this->is_allowed('api_tb_asset_master_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get_all('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id', 'kode_brg', 'nup', 'tag_code', 'nama_brg', 'merk', 'tipe', 'kondisi', 'nilai', 'kelompok', 'tgl_inventarisasi', 'tglperolehan', 'keterangan', 'pic_aset'];
		$tb_asset_masters = $this->model_api_tb_asset_master->get_all($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_tb_asset_master->count_all($filter, $field);
		
		$tb_asset_masters = array_map(function($row){
			return $row;
		}, $tb_asset_masters);

		$data['tb_asset_master'] = $tb_asset_masters;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Tb asset master',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);

	}

	public function update_ridwan_post()
	{
		$this->is_allowed('api_tb_asset_master_update', false);

		// $this->form_validation->set_rules('kode_brg', 'Kode Brg', 'trim|required|max_length[15]');
		// $this->form_validation->set_rules('nup', 'Nup', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('tag_code', 'Tag Code', 'trim|required|max_length[96]');
		// $this->form_validation->set_rules('nama_brg', 'Nama Brg', 'trim|required|max_length[200]');
		// $this->form_validation->set_rules('merk', 'Merk', 'trim|required|max_length[50]');
		// $this->form_validation->set_rules('tipe', 'Tipe', 'trim|required|max_length[30]');
		// $this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
		// $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');
		$this->form_validation->set_rules('is_perlu_dipantau', 'Aset dipantau ?', 'trim|required');
		// $this->form_validation->set_rules('tgl_inventarisasi', 'Tgl Inventarisasi', 'trim|required');
		// $this->form_validation->set_rules('tglperolehan', 'Tglperolehan', 'trim|required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
		// $this->form_validation->set_rules('status_id', 'Status Id', 'trim|required');
		// $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[200]');
		// $this->form_validation->set_rules('pic_aset', 'Pic Aset', 'trim|required');
		
		if ($this->form_validation->run()) {

			$rfid	= str_replace(' ', '', $this->input->post('tag_code'));

			if (strlen($rfid) < 2) {

				$this->response([
					'status' => false,
					'message' => 'RFID harus memiliki setidaknya 8 karakter'
				], API::HTTP_NOT_ACCEPTABLE);
				
				return; // Stop execution

			} else {

				// $rfid				= $rfid;
				// $barcode			= $this->input->post('barcode_id');
				// $created			= date('Y-m-d H:i:s');
				// $createdby			= $this->input->post('user_id');
				// $udpated			= date('Y-m-d H:i:s');
				// $udpatedby			= $this->input->post('user_id');
				// $librarian_stock	= $this->input->post('room_id');
				// $aging				= $this->input->post('aging');

				// Check if rfid_id exists in tag_rfid table

				$this->db->where('tag_code', $rfid);
				$existing_rfid = $this->db->get('tb_asset_master')->row();

				if ($existing_rfid) {

					// RFID already exists
					$this->response([
						'status' => false,
						'message' => 'Kode RFID sudah ada !'
					], API::HTTP_NOT_ACCEPTABLE);

				} else {

					$save_data = [
						'tag_code' => $this->input->post('tag_code'),
						'lokasi' => $this->input->post('lokasi'),
						'status_id' => 1,
						'kelompok' => $this->input->post('is_perlu_dipantau')
					];
					
					$save_tb_asset_master = $this->model_api_tb_asset_master->change($this->post('id'), $save_data);

					if ($save_tb_asset_master) {

						// insert to tb_asset_moving
						$data = array(
							'tanggal' => date('Y-m-d'), 
							'waktu' => date('Y-m-d H:i:s'),
							'reader_id' => 0,
							'room_id' => $this->input->post('lokasi'),
							'tag_code' => $this->input->post('tag_code'), 
							'status_moving' => 'In'
						);

						$save_tag_location = $this->db->insert('tb_asset_moving', $data);

						if ($save_tag_location) {

							$tb_history_invent = array(
								'tanggal' => date('Y-m-d'),
								'waktu' => date('Y-m-d H:i:s'),
								'id_room' => $this->input->post('lokasi'),
								'id_reader' => 0,
								'user' => $this->input->post('user_id'),
								'labeling' => 1,
								'rfid_code_tag' => $this->input->post('tag_code')
							);

							$save_tb_history_invent = $this->db->insert('tb_history_invent', $tb_history_invent);

							if ($save_tb_history_invent) {
							
								$this->response([
									'status' => true,
									'message' => 'RFID berhasil di daftarkan & masuk ruangan !'
								], API::HTTP_OK);

							}

						} else {

							$this->response([
								'status' => false,
								'message' => cclang('data_not_change')
							], API::HTTP_NOT_ACCEPTABLE);

						}

					} else {

						$this->response([
							'status' => false,
							'message' => cclang('RFID tidak bisa didaftarkan !')
						], API::HTTP_NOT_ACCEPTABLE);

					}

				}

			}

		} else {

			$this->response([
				'status' 	=> false,
				'message' 	=> 'Validation Errors.',
				'errors' 	=> $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);

		}
	}
	
}

/* End of file Tb asset master.php */
/* Location: ./application/controllers/api/Tb asset master.php */