<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Tag_librarian extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_tag_librarian');
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
	 * @apiParam {String} [Field="All Field"] Optional field of Tag readers : reader_id, librarian_id, reader_name, reader_serialnumber, reader_type, reader_ip, reader_port, reader_com, reader_baudrate, reader_power, reader_interval, reader_mode, reader_updatedby, reader_updated, reader_createdby, reader_created.
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
		//ini fungsi untuk get all data tag_librarian, jika role yang mengakses tidak memiliki permission 'api_tag_librarian_all' maka akan di block aksesnya
		$this->is_allowed('api_tag_librarian_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['librarian_id', 'librarian_name', 'librarian_gate', 'librarian_condition', 'librarian_aging', 'librarian_updateby', 'librarian_updated', 'librarian_createdby', 'librarian_created', 'building_id'];
		
        $tag_librarians = $this->model_api_tag_librarian->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_tag_librarian->count_all($filter, $field);

		$tag_librarians = array_map(function($row){
			return $row;
		}, $tag_librarians);

		$data['tag_librarian'] = $tag_librarians;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Tag librarian successfully retrieved.',
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

		$select_field = ['reader_id', 'librarian_id', 'reader_name', 'reader_serialnumber', 'reader_type', 'reader_ip', 'reader_port', 'reader_com', 'reader_baudrate', 'reader_power', 'reader_interval', 'reader_mode', 'reader_updatedby', 'reader_updated', 'reader_createdby', 'reader_created'];
		$tag_reader = $this->model_api_tag_reader->find($id, $select_field);

		if (!$tag_reader) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
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

		
		if ($this->form_validation->run()) {

			$save_data = [
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

		
		
		if ($this->form_validation->run()) {

			$save_data = [
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