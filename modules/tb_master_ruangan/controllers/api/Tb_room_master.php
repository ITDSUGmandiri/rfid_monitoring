<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Tb_room_master extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_tb_room_master');
	}

	/**
	 * @api {get} /tb_room_master/all Get all tb_room_masters.
	 * @apiVersion 0.1.0
	 * @apiName AllTbroommaster 
	 * @apiGroup tb_room_master
	 * @apiHeader {String} X-Api-Key Tb room masters unique access-key.
	 * @apiPermission Tb room master Cant be Accessed permission name : api_tb_room_master_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Tb room masters.
	 * @apiParam {String} [Field="All Field"] Optional field of Tb room masters : id_room, kode_room, name_room.
	 * @apiParam {String} [Start=0] Optional start index of Tb room masters.
	 * @apiParam {String} [Limit=10] Optional limit data of Tb room masters.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tb_room_master.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataTb room master Tb room master data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_tb_room_master_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id_room', 'kode_room', 'name_room'];
		$tb_room_masters = $this->model_api_tb_room_master->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_tb_room_master->count_all($filter, $field);
		$tb_room_masters = array_map(function($row){
						
			return $row;
		}, $tb_room_masters);

		$data['tb_room_master'] = $tb_room_masters;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Tb room master',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /tb_room_master/detail Detail Tb room master.
	 * @apiVersion 0.1.0
	 * @apiName DetailTb room master
	 * @apiGroup tb_room_master
	 * @apiHeader {String} X-Api-Key Tb room masters unique access-key.
	 * @apiPermission Tb room master Cant be Accessed permission name : api_tb_room_master_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Tb room masters.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tb_room_master.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Tb room masterNotFound Tb room master data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_tb_room_master_detail', false);

		$this->requiredInput(['id_room']);

		$id = $this->get('id_room');

		$select_field = ['id_room', 'kode_room', 'name_room'];
		$tb_room_master = $this->model_api_tb_room_master->find($id, $select_field);

		if (!$tb_room_master) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['tb_room_master'] = $tb_room_master;
		if ($data['tb_room_master']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Tb room master',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tb room master not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /tb_room_master/add Add Tb room master.
	 * @apiVersion 0.1.0
	 * @apiName AddTb room master
	 * @apiGroup tb_room_master
	 * @apiHeader {String} X-Api-Key Tb room masters unique access-key.
	 * @apiPermission Tb room master Cant be Accessed permission name : api_tb_room_master_add
	 *
 	 * @apiParam {String} Gedung_id Mandatory gedung_id of Tb room masters.  
	 * @apiParam {String} Kode_room Mandatory kode_room of Tb room masters. Input Kode Room Max Length : 30. 
	 * @apiParam {String} Name_room Mandatory name_room of Tb room masters. Input Name Room Max Length : 30. 
	 * @apiParam {String} Lat Mandatory lat of Tb room masters.  
	 * @apiParam {String} Long Mandatory long of Tb room masters.  
	 * @apiParam {String} Pic Mandatory pic of Tb room masters.  
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
		$this->is_allowed('api_tb_room_master_add', false);

		$this->form_validation->set_rules('gedung_id', 'Gedung Id', 'trim|required');
		$this->form_validation->set_rules('kode_room', 'Kode Room', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('name_room', 'Name Room', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('lat', 'Lat', 'trim|required');
		$this->form_validation->set_rules('long', 'Long', 'trim|required');
		$this->form_validation->set_rules('pic', 'Pic', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'gedung_id' => $this->input->post('gedung_id'),
				'kode_room' => $this->input->post('kode_room'),
				'name_room' => $this->input->post('name_room'),
				'lat' => $this->input->post('lat'),
				'long' => $this->input->post('long'),
				'pic' => $this->input->post('pic'),
			];
			
			$save_tb_room_master = $this->model_api_tb_room_master->store($save_data);

			if ($save_tb_room_master) {
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
	 * @api {post} /tb_room_master/update Update Tb room master.
	 * @apiVersion 0.1.0
	 * @apiName UpdateTb room master
	 * @apiGroup tb_room_master
	 * @apiHeader {String} X-Api-Key Tb room masters unique access-key.
	 * @apiPermission Tb room master Cant be Accessed permission name : api_tb_room_master_update
	 *
	 * @apiParam {String} Gedung_id Mandatory gedung_id of Tb room masters.  
	 * @apiParam {String} Kode_room Mandatory kode_room of Tb room masters. Input Kode Room Max Length : 30. 
	 * @apiParam {String} Name_room Mandatory name_room of Tb room masters. Input Name Room Max Length : 30. 
	 * @apiParam {String} Lat Mandatory lat of Tb room masters.  
	 * @apiParam {String} Long Mandatory long of Tb room masters.  
	 * @apiParam {String} Pic Mandatory pic of Tb room masters.  
	 * @apiParam {Integer} id_room Mandatory id_room of Tb Room Master.
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
		$this->is_allowed('api_tb_room_master_update', false);

		
		$this->form_validation->set_rules('gedung_id', 'Gedung Id', 'trim|required');
		$this->form_validation->set_rules('kode_room', 'Kode Room', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('name_room', 'Name Room', 'trim|required|max_length[30]');
		$this->form_validation->set_rules('lat', 'Lat', 'trim|required');
		$this->form_validation->set_rules('long', 'Long', 'trim|required');
		$this->form_validation->set_rules('pic', 'Pic', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'gedung_id' => $this->input->post('gedung_id'),
				'kode_room' => $this->input->post('kode_room'),
				'name_room' => $this->input->post('name_room'),
				'lat' => $this->input->post('lat'),
				'long' => $this->input->post('long'),
				'pic' => $this->input->post('pic'),
			];
			
			$save_tb_room_master = $this->model_api_tb_room_master->change($this->post('id_room'), $save_data);

			if ($save_tb_room_master) {
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
	 * @api {post} /tb_room_master/delete Delete Tb room master. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteTb room master
	 * @apiGroup tb_room_master
	 * @apiHeader {String} X-Api-Key Tb room masters unique access-key.
	 	 * @apiPermission Tb room master Cant be Accessed permission name : api_tb_room_master_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Tb room masters .
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
		$this->is_allowed('api_tb_room_master_delete', false);

		$tb_room_master = $this->model_api_tb_room_master->find($this->post('id_room'));

		if (!$tb_room_master) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tb room master not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_tb_room_master->remove($this->post('id_room'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Tb room master deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tb room master not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Tb room master.php */
/* Location: ./application/controllers/api/Tb room master.php */