<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Tag_temp_table extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_tag_temp_table');
	}

	/**
	 * @api {get} /tag_temp_table/all Get all tag_temp_tables.
	 * @apiVersion 0.1.0
	 * @apiName AllTagtemptable 
	 * @apiGroup tag_temp_table
	 * @apiHeader {String} X-Api-Key Tag temp tables unique access-key.
	 * @apiPermission Tag temp table Cant be Accessed permission name : api_tag_temp_table_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Tag temp tables.
	 * @apiParam {String} [Field="All Field"] Optional field of Tag temp tables : id_temp_table, lokasi_terakhir_id, nama_lokasi_terakhir, room_id, room_name, reader_id, reader_antena, reader_angle, reader_gate, rfid_tag_number, waktu, output, kategori_pergerakan, keterangan_pergerakan.
	 * @apiParam {String} [Start=0] Optional start index of Tag temp tables.
	 * @apiParam {String} [Limit=10] Optional limit data of Tag temp tables.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tag_temp_table.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataTag temp table Tag temp table data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_tag_temp_table_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id_temp_table', 'lokasi_terakhir_id', 'nama_lokasi_terakhir', 'room_id', 'room_name', 'reader_id', 'reader_antena', 'reader_angle', 'reader_gate', 'rfid_tag_number', 'waktu', 'output', 'kategori_pergerakan', 'keterangan_pergerakan'];
		$tag_temp_tables = $this->model_api_tag_temp_table->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_tag_temp_table->count_all($filter, $field);
		$tag_temp_tables = array_map(function($row){
						
			return $row;
		}, $tag_temp_tables);

		$data['tag_temp_table'] = $tag_temp_tables;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Tag temp table',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /tag_temp_table/detail Detail Tag temp table.
	 * @apiVersion 0.1.0
	 * @apiName DetailTag temp table
	 * @apiGroup tag_temp_table
	 * @apiHeader {String} X-Api-Key Tag temp tables unique access-key.
	 * @apiPermission Tag temp table Cant be Accessed permission name : api_tag_temp_table_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Tag temp tables.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tag_temp_table.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Tag temp tableNotFound Tag temp table data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_tag_temp_table_detail', false);

		$this->requiredInput(['id_temp_table']);

		$id = $this->get('id_temp_table');

		$select_field = ['id_temp_table', 'lokasi_terakhir_id', 'nama_lokasi_terakhir', 'room_id', 'room_name', 'reader_id', 'reader_antena', 'reader_angle', 'reader_gate', 'rfid_tag_number', 'waktu', 'output', 'kategori_pergerakan', 'keterangan_pergerakan'];
		$tag_temp_table = $this->model_api_tag_temp_table->find($id, $select_field);

		if (!$tag_temp_table) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['tag_temp_table'] = $tag_temp_table;
		if ($data['tag_temp_table']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Tag temp table',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tag temp table not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /tag_temp_table/add Add Tag temp table.
	 * @apiVersion 0.1.0
	 * @apiName AddTag temp table
	 * @apiGroup tag_temp_table
	 * @apiHeader {String} X-Api-Key Tag temp tables unique access-key.
	 * @apiPermission Tag temp table Cant be Accessed permission name : api_tag_temp_table_add
	 *
 	 * @apiParam {String} Lokasi_terakhir_id Mandatory lokasi_terakhir_id of Tag temp tables.  
	 * @apiParam {String} Nama_lokasi_terakhir Mandatory nama_lokasi_terakhir of Tag temp tables. Input Nama Lokasi Terakhir Max Length : 50. 
	 * @apiParam {String} Room_id Mandatory room_id of Tag temp tables.  
	 * @apiParam {String} Room_name Mandatory room_name of Tag temp tables. Input Room Name Max Length : 50. 
	 * @apiParam {String} Reader_id Mandatory reader_id of Tag temp tables.  
	 * @apiParam {String} Reader_antena Mandatory reader_antena of Tag temp tables.  
	 * @apiParam {String} Reader_angle Mandatory reader_angle of Tag temp tables.  
	 * @apiParam {String} Reader_gate Mandatory reader_gate of Tag temp tables. Input Reader Gate Max Length : 50. 
	 * @apiParam {String} Rfid_tag_number Mandatory rfid_tag_number of Tag temp tables. Input Rfid Tag Number Max Length : 96. 
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
		$this->is_allowed('api_tag_temp_table_add', false);

		// $this->form_validation->set_rules('lokasi_terakhir_id', 'Lokasi Terakhir Id', 'trim|required');
		// $this->form_validation->set_rules('nama_lokasi_terakhir', 'Nama Lokasi Terakhir', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('room_id', 'Room Id', 'trim|required');
		$this->form_validation->set_rules('room_name', 'Room Name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('reader_id', 'Reader Id', 'trim|required');
		$this->form_validation->set_rules('reader_antena', 'Reader Antena', 'trim|required');
		$this->form_validation->set_rules('reader_angle', 'Reader Angle', 'trim|required');
		$this->form_validation->set_rules('reader_gate', 'Reader Gate', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('rfid_tag_number', 'Rfid Tag Number', 'trim|required|max_length[96]');
		
		if ($this->form_validation->run()) {

			// $data = [
			// 'lokasi_terakhir_id' => $dataReader->room_id,
			// 'nama_lokasi_terakhir' => $dataReader->ruangan,
			// 'room_id' => $dataReader->room_id,
			// 'room_name' => $dataReader->ruangan,
			// 'reader_id' => $dataReader->reader_id,
			// 'reader_antena' => $dataReader->reader_antena,
			// 'reader_angle' => $dataReader->reader_angle,
			// 'reader_gate' => $dataReader->reader_gate,
			// 'rfid_tag_number' => $tid,
			// 'is_legal_moving' => $dataReader->reader_identity
			// ];

			$save_data = [
				'lokasi_terakhir_id' => $this->input->post('room_id'),
				'nama_lokasi_terakhir' => $this->input->post('room_name'),
				'is_legal_moving' => $this->input->post('is_legal_moving'),
				'room_id' => $this->input->post('room_id'),
				'room_name' => $this->input->post('room_name'),
				'reader_id' => $this->input->post('reader_id'),
				'reader_antena' => $this->input->post('reader_antena'),
				'reader_angle' => $this->input->post('reader_angle'),
				'reader_gate' => $this->input->post('reader_gate'),
				'rfid_tag_number' => $this->input->post('rfid_tag_number'),
			];
			
			$save_tag_temp_table = $this->model_api_tag_temp_table->store($save_data);
			$this->db->insert('tag_temp_table_process', $save_data);
			// $save_tag_temp_table = $this->db->insert_id();

			if ($save_tag_temp_table) {
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
	 * @api {post} /tag_temp_table/update Update Tag temp table.
	 * @apiVersion 0.1.0
	 * @apiName UpdateTag temp table
	 * @apiGroup tag_temp_table
	 * @apiHeader {String} X-Api-Key Tag temp tables unique access-key.
	 * @apiPermission Tag temp table Cant be Accessed permission name : api_tag_temp_table_update
	 *
	 * @apiParam {String} Lokasi_terakhir_id Mandatory lokasi_terakhir_id of Tag temp tables.  
	 * @apiParam {String} Nama_lokasi_terakhir Mandatory nama_lokasi_terakhir of Tag temp tables. Input Nama Lokasi Terakhir Max Length : 50. 
	 * @apiParam {String} Room_id Mandatory room_id of Tag temp tables.  
	 * @apiParam {String} Room_name Mandatory room_name of Tag temp tables. Input Room Name Max Length : 50. 
	 * @apiParam {String} Reader_id Mandatory reader_id of Tag temp tables.  
	 * @apiParam {String} Reader_antena Mandatory reader_antena of Tag temp tables.  
	 * @apiParam {String} Reader_angle Mandatory reader_angle of Tag temp tables.  
	 * @apiParam {String} Reader_gate Mandatory reader_gate of Tag temp tables. Input Reader Gate Max Length : 50. 
	 * @apiParam {String} Rfid_tag_number Mandatory rfid_tag_number of Tag temp tables. Input Rfid Tag Number Max Length : 96. 
	 * @apiParam {Integer} id_temp_table Mandatory id_temp_table of Tag Temp Table.
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
		$this->is_allowed('api_tag_temp_table_update', false);

		
		$this->form_validation->set_rules('lokasi_terakhir_id', 'Lokasi Terakhir Id', 'trim|required');
		$this->form_validation->set_rules('nama_lokasi_terakhir', 'Nama Lokasi Terakhir', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('room_id', 'Room Id', 'trim|required');
		$this->form_validation->set_rules('room_name', 'Room Name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('reader_id', 'Reader Id', 'trim|required');
		$this->form_validation->set_rules('reader_antena', 'Reader Antena', 'trim|required');
		$this->form_validation->set_rules('reader_angle', 'Reader Angle', 'trim|required');
		$this->form_validation->set_rules('reader_gate', 'Reader Gate', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('rfid_tag_number', 'Rfid Tag Number', 'trim|required|max_length[96]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'lokasi_terakhir_id' => $this->input->post('lokasi_terakhir_id'),
				'nama_lokasi_terakhir' => $this->input->post('nama_lokasi_terakhir'),
				'room_id' => $this->input->post('room_id'),
				'room_name' => $this->input->post('room_name'),
				'reader_id' => $this->input->post('reader_id'),
				'reader_antena' => $this->input->post('reader_antena'),
				'reader_angle' => $this->input->post('reader_angle'),
				'reader_gate' => $this->input->post('reader_gate'),
				'rfid_tag_number' => $this->input->post('rfid_tag_number'),
			];
			
			$save_tag_temp_table = $this->model_api_tag_temp_table->change($this->post('id_temp_table'), $save_data);

			if ($save_tag_temp_table) {
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
	 * @api {post} /tag_temp_table/delete Delete Tag temp table. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteTag temp table
	 * @apiGroup tag_temp_table
	 * @apiHeader {String} X-Api-Key Tag temp tables unique access-key.
	 	 * @apiPermission Tag temp table Cant be Accessed permission name : api_tag_temp_table_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Tag temp tables .
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
		$this->is_allowed('api_tag_temp_table_delete', false);

		$tag_temp_table = $this->model_api_tag_temp_table->find($this->post('id_temp_table'));

		if (!$tag_temp_table) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tag temp table not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_tag_temp_table->remove($this->post('id_temp_table'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Tag temp table deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tag temp table not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Tag temp table.php */
/* Location: ./application/controllers/api/Tag temp table.php */