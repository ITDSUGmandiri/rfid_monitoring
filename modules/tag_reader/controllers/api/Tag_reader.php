<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Tag_reader extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_tag_reader');
	}

	/**
	 * @api {get} /tag_reader/all Get all tag_readers.
	 * @apiVersion 0.1.0
	 * @apiName AllTagreader 
	 * @apiGroup tag_reader
	 * @apiHeader {String} X-Api-Key Tag readers unique access-key.
	 * @apiHeader {String} X-Token Tag readers unique token.
	 * @apiPermission Tag reader Cant be Accessed permission name : api_tag_reader_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Tag readers.
	 * @apiParam {String} [Field="All Field"] Optional field of Tag readers : reader_id, room_id, reader_name, setfor, reader_serialnumber, reader_type, reader_ip, reader_port, reader_com, reader_baudrate, reader_power, reader_interval, reader_mode, reader_updatedby, reader_updated, reader_createdby, reader_created, reader_family, connecting, reader_model, reader_identity, reader_antena, reader_angle, reader_gate.
	 * @apiParam {String} [Start=0] Optional start index of Tag readers.
	 * @apiParam {String} [Limit=10] Optional limit data of Tag readers.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tag_reader.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataTag reader Tag reader data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_tag_reader_all');

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['reader_id', 'room_id', 'reader_name', 'setfor', 'reader_serialnumber', 'reader_type', 'reader_ip', 'reader_port', 'reader_com', 'reader_baudrate', 'reader_power', 'reader_interval', 'reader_mode', 'reader_updatedby', 'reader_updated', 'reader_createdby', 'reader_created', 'reader_family', 'connecting', 'reader_model', 'reader_identity', 'reader_antena', 'reader_angle', 'reader_gate', 'alias_antenna', 'flag_alarm', 'flag_buzzer'];
		$tag_readers = $this->model_api_tag_reader->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_tag_reader->count_all($filter, $field);
		
		$tag_readers = array_map(function($row){
			$row->room_id = $this->db
			    ->get_where('tb_master_ruangan', [
			    	'id' => $row->room_id])
			    ->row();
	        			
			return $row;
		}, $tag_readers);

		$data['tag_reader'] = $tag_readers;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Tag reader',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /tag_reader/detail Detail Tag reader.
	 * @apiVersion 0.1.0
	 * @apiName DetailTag reader
	 * @apiGroup tag_reader
	 * @apiHeader {String} X-Api-Key Tag readers unique access-key.
	 * @apiHeader {String} X-Token Tag readers unique token.
	 * @apiPermission Tag reader Cant be Accessed permission name : api_tag_reader_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Tag readers.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tag_reader.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Tag readerNotFound Tag reader data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_tag_reader_detail');

		$this->requiredInput(['reader_id']);

		$id = $this->get('reader_id');

		$select_field = ['reader_id', 'room_id', 'reader_name', 'setfor', 'reader_serialnumber', 'reader_type', 'reader_ip', 'reader_port', 'reader_com', 'reader_baudrate', 'reader_power', 'reader_interval', 'reader_mode', 'reader_updatedby', 'reader_updated', 'reader_createdby', 'reader_created', 'reader_family', 'connecting', 'reader_model', 'reader_identity', 'reader_antena', 'reader_angle', 'reader_gate'];
		$tag_reader = $this->model_api_tag_reader->find($id, $select_field);

		if (!$tag_reader) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

		$tag_reader->room_id = $this->db
		    ->get_where('tb_master_ruangan', [
		    	'id_room' => $tag_reader->room_id])
		    ->row();
        			
		$data['tag_reader'] = $tag_reader;
		if ($data['tag_reader']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Tag reader',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tag reader not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /tag_reader/add Add Tag reader.
	 * @apiVersion 0.1.0
	 * @apiName AddTag reader
	 * @apiGroup tag_reader
	 * @apiHeader {String} X-Api-Key Tag readers unique access-key.
	 * @apiHeader {String} X-Token Tag readers unique token.
	 * @apiPermission Tag reader Cant be Accessed permission name : api_tag_reader_add
	 *
 	 * @apiParam {String} Room_id Mandatory room_id of Tag readers.  
	 * @apiParam {String} Reader_name Mandatory reader_name of Tag readers. Input Reader Name Max Length : 50. 
	 * @apiParam {String} Setfor Mandatory setfor of Tag readers.  
	 * @apiParam {String} Reader_serialnumber Mandatory reader_serialnumber of Tag readers. Input Reader Serialnumber Max Length : 10. 
	 * @apiParam {String} Reader_type Mandatory reader_type of Tag readers.  
	 * @apiParam {String} Reader_ip Mandatory reader_ip of Tag readers. Input Reader Ip Max Length : 45. 
	 * @apiParam {String} Reader_port Mandatory reader_port of Tag readers. Input Reader Port Max Length : 7. 
	 * @apiParam {String} Reader_com Mandatory reader_com of Tag readers.  
	 * @apiParam {String} Reader_baudrate Mandatory reader_baudrate of Tag readers.  
	 * @apiParam {String} Reader_power Mandatory reader_power of Tag readers.  
	 * @apiParam {String} Reader_interval Mandatory reader_interval of Tag readers.  
	 * @apiParam {String} Reader_mode Mandatory reader_mode of Tag readers.  
	 * @apiParam {String} Reader_updatedby Mandatory reader_updatedby of Tag readers.  
	 * @apiParam {String} Reader_updated Mandatory reader_updated of Tag readers.  
	 * @apiParam {String} Reader_createdby Mandatory reader_createdby of Tag readers.  
	 * @apiParam {String} Reader_created Mandatory reader_created of Tag readers.  
	 * @apiParam {String} Reader_family Mandatory reader_family of Tag readers.  
	 * @apiParam {String} Connecting Mandatory connecting of Tag readers.  
	 * @apiParam {String} Reader_model Mandatory reader_model of Tag readers. Input Reader Model Max Length : 50. 
	 * @apiParam {String} Reader_identity Mandatory reader_identity of Tag readers. Input Reader Identity Max Length : 50. 
	 * @apiParam {String} Reader_antena Mandatory reader_antena of Tag readers.  
	 * @apiParam {String} Reader_angle Mandatory reader_angle of Tag readers.  
	 * @apiParam {String} Reader_gate Mandatory reader_gate of Tag readers. Input Reader Gate Max Length : 50. 
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
		$this->is_allowed('api_tag_reader_add');

		$this->form_validation->set_rules('room_id', 'Room Id', 'trim|required');
		$this->form_validation->set_rules('reader_name', 'Reader Name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('setfor', 'Setfor', 'trim|required');
		$this->form_validation->set_rules('reader_serialnumber', 'Reader Serialnumber', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('reader_type', 'Reader Type', 'trim|required');
		$this->form_validation->set_rules('reader_ip', 'Reader Ip', 'trim|required|max_length[45]');
		$this->form_validation->set_rules('reader_port', 'Reader Port', 'trim|required|max_length[7]');
		$this->form_validation->set_rules('reader_com', 'Reader Com', 'trim|required');
		$this->form_validation->set_rules('reader_baudrate', 'Reader Baudrate', 'trim|required');
		$this->form_validation->set_rules('reader_power', 'Reader Power', 'trim|required');
		$this->form_validation->set_rules('reader_interval', 'Reader Interval', 'trim|required');
		$this->form_validation->set_rules('reader_mode', 'Reader Mode', 'trim|required');
		$this->form_validation->set_rules('reader_updatedby', 'Reader Updatedby', 'trim|required');
		$this->form_validation->set_rules('reader_updated', 'Reader Updated', 'trim|required');
		$this->form_validation->set_rules('reader_createdby', 'Reader Createdby', 'trim|required');
		$this->form_validation->set_rules('reader_created', 'Reader Created', 'trim|required');
		$this->form_validation->set_rules('reader_family', 'Reader Family', 'trim|required');
		$this->form_validation->set_rules('connecting', 'Connecting', 'trim|required');
		$this->form_validation->set_rules('reader_model', 'Reader Model', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('reader_identity', 'Reader Identity', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('reader_antena', 'Reader Antena', 'trim|required');
		$this->form_validation->set_rules('reader_angle', 'Reader Angle', 'trim|required');
		$this->form_validation->set_rules('reader_gate', 'Reader Gate', 'trim|required|max_length[50]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'room_id' => $this->input->post('room_id'),
				'reader_name' => $this->input->post('reader_name'),
				'setfor' => $this->input->post('setfor'),
				'reader_serialnumber' => $this->input->post('reader_serialnumber'),
				'reader_type' => $this->input->post('reader_type'),
				'reader_ip' => $this->input->post('reader_ip'),
				'reader_port' => $this->input->post('reader_port'),
				'reader_com' => $this->input->post('reader_com'),
				'reader_baudrate' => $this->input->post('reader_baudrate'),
				'reader_power' => $this->input->post('reader_power'),
				'reader_interval' => $this->input->post('reader_interval'),
				'reader_mode' => $this->input->post('reader_mode'),
				'reader_updatedby' => $this->input->post('reader_updatedby'),
				'reader_updated' => $this->input->post('reader_updated'),
				'reader_createdby' => $this->input->post('reader_createdby'),
				'reader_created' => $this->input->post('reader_created'),
				'reader_family' => $this->input->post('reader_family'),
				'connecting' => $this->input->post('connecting'),
				'reader_model' => $this->input->post('reader_model'),
				'reader_identity' => $this->input->post('reader_identity'),
				'reader_antena' => $this->input->post('reader_antena'),
				'reader_angle' => $this->input->post('reader_angle'),
				'reader_gate' => $this->input->post('reader_gate'),
			];
			
			$save_tag_reader = $this->model_api_tag_reader->store($save_data);

			if ($save_tag_reader) {
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
	 * @api {post} /tag_reader/update Update Tag reader.
	 * @apiVersion 0.1.0
	 * @apiName UpdateTag reader
	 * @apiGroup tag_reader
	 * @apiHeader {String} X-Api-Key Tag readers unique access-key.
	 * @apiHeader {String} X-Token Tag readers unique token.
	 * @apiPermission Tag reader Cant be Accessed permission name : api_tag_reader_update
	 *
	 * @apiParam {String} Room_id Mandatory room_id of Tag readers.  
	 * @apiParam {String} Reader_name Mandatory reader_name of Tag readers. Input Reader Name Max Length : 50. 
	 * @apiParam {String} Setfor Mandatory setfor of Tag readers.  
	 * @apiParam {String} Reader_serialnumber Mandatory reader_serialnumber of Tag readers. Input Reader Serialnumber Max Length : 10. 
	 * @apiParam {String} Reader_type Mandatory reader_type of Tag readers.  
	 * @apiParam {String} Reader_ip Mandatory reader_ip of Tag readers. Input Reader Ip Max Length : 45. 
	 * @apiParam {String} Reader_port Mandatory reader_port of Tag readers. Input Reader Port Max Length : 7. 
	 * @apiParam {String} Reader_com Mandatory reader_com of Tag readers.  
	 * @apiParam {String} Reader_baudrate Mandatory reader_baudrate of Tag readers.  
	 * @apiParam {String} Reader_power Mandatory reader_power of Tag readers.  
	 * @apiParam {String} Reader_interval Mandatory reader_interval of Tag readers.  
	 * @apiParam {String} Reader_mode Mandatory reader_mode of Tag readers.  
	 * @apiParam {String} Reader_updatedby Mandatory reader_updatedby of Tag readers.  
	 * @apiParam {String} Reader_updated Mandatory reader_updated of Tag readers.  
	 * @apiParam {String} Reader_createdby Mandatory reader_createdby of Tag readers.  
	 * @apiParam {String} Reader_created Mandatory reader_created of Tag readers.  
	 * @apiParam {String} Reader_family Mandatory reader_family of Tag readers.  
	 * @apiParam {String} Connecting Mandatory connecting of Tag readers.  
	 * @apiParam {String} Reader_model Mandatory reader_model of Tag readers. Input Reader Model Max Length : 50. 
	 * @apiParam {String} Reader_identity Mandatory reader_identity of Tag readers. Input Reader Identity Max Length : 50. 
	 * @apiParam {String} Reader_antena Mandatory reader_antena of Tag readers.  
	 * @apiParam {String} Reader_angle Mandatory reader_angle of Tag readers.  
	 * @apiParam {String} Reader_gate Mandatory reader_gate of Tag readers. Input Reader Gate Max Length : 50. 
	 * @apiParam {Integer} reader_id Mandatory reader_id of Tag Reader.
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
		$this->is_allowed('api_tag_reader_update');

		
		$this->form_validation->set_rules('room_id', 'Room Id', 'trim|required');
		$this->form_validation->set_rules('reader_name', 'Reader Name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('setfor', 'Setfor', 'trim|required');
		$this->form_validation->set_rules('reader_serialnumber', 'Reader Serialnumber', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('reader_type', 'Reader Type', 'trim|required');
		$this->form_validation->set_rules('reader_ip', 'Reader Ip', 'trim|required|max_length[45]');
		$this->form_validation->set_rules('reader_port', 'Reader Port', 'trim|required|max_length[7]');
		$this->form_validation->set_rules('reader_com', 'Reader Com', 'trim|required');
		$this->form_validation->set_rules('reader_baudrate', 'Reader Baudrate', 'trim|required');
		$this->form_validation->set_rules('reader_power', 'Reader Power', 'trim|required');
		$this->form_validation->set_rules('reader_interval', 'Reader Interval', 'trim|required');
		$this->form_validation->set_rules('reader_mode', 'Reader Mode', 'trim|required');
		$this->form_validation->set_rules('reader_updatedby', 'Reader Updatedby', 'trim|required');
		$this->form_validation->set_rules('reader_updated', 'Reader Updated', 'trim|required');
		$this->form_validation->set_rules('reader_createdby', 'Reader Createdby', 'trim|required');
		$this->form_validation->set_rules('reader_created', 'Reader Created', 'trim|required');
		$this->form_validation->set_rules('reader_family', 'Reader Family', 'trim|required');
		$this->form_validation->set_rules('connecting', 'Connecting', 'trim|required');
		$this->form_validation->set_rules('reader_model', 'Reader Model', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('reader_identity', 'Reader Identity', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('reader_antena', 'Reader Antena', 'trim|required');
		$this->form_validation->set_rules('reader_angle', 'Reader Angle', 'trim|required');
		$this->form_validation->set_rules('reader_gate', 'Reader Gate', 'trim|required|max_length[50]');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'room_id' => $this->input->post('room_id'),
				'reader_name' => $this->input->post('reader_name'),
				'setfor' => $this->input->post('setfor'),
				'reader_serialnumber' => $this->input->post('reader_serialnumber'),
				'reader_type' => $this->input->post('reader_type'),
				'reader_ip' => $this->input->post('reader_ip'),
				'reader_port' => $this->input->post('reader_port'),
				'reader_com' => $this->input->post('reader_com'),
				'reader_baudrate' => $this->input->post('reader_baudrate'),
				'reader_power' => $this->input->post('reader_power'),
				'reader_interval' => $this->input->post('reader_interval'),
				'reader_mode' => $this->input->post('reader_mode'),
				'reader_updatedby' => $this->input->post('reader_updatedby'),
				'reader_updated' => $this->input->post('reader_updated'),
				'reader_createdby' => $this->input->post('reader_createdby'),
				'reader_created' => $this->input->post('reader_created'),
				'reader_family' => $this->input->post('reader_family'),
				'connecting' => $this->input->post('connecting'),
				'reader_model' => $this->input->post('reader_model'),
				'reader_identity' => $this->input->post('reader_identity'),
				'reader_antena' => $this->input->post('reader_antena'),
				'reader_angle' => $this->input->post('reader_angle'),
				'reader_gate' => $this->input->post('reader_gate'),
			];
			
			$save_tag_reader = $this->model_api_tag_reader->change($this->post('reader_id'), $save_data);

			if ($save_tag_reader) {
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
	 * @api {post} /tag_reader/delete Delete Tag reader. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteTag reader
	 * @apiGroup tag_reader
	 * @apiHeader {String} X-Api-Key Tag readers unique access-key.
	 * @apiHeader {String} X-Token Tag readers unique token.
	 	 * @apiPermission Tag reader Cant be Accessed permission name : api_tag_reader_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Tag readers .
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
		$this->is_allowed('api_tag_reader_delete');

		$tag_reader = $this->model_api_tag_reader->find($this->post('reader_id'));

		if (!$tag_reader) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tag reader not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_tag_reader->remove($this->post('reader_id'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Tag reader deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tag reader not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Tag reader.php */
/* Location: ./application/controllers/api/Tag reader.php */