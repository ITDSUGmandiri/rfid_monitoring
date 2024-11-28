<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Tag_location extends API
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_tag_location');
	}

	/**
	 * @api {get} /tag_location/all Get all tag_locations.
	 * @apiVersion 0.1.0
	 * @apiName AllTaglocation 
	 * @apiGroup tag_location
	 * @apiHeader {String} X-Api-Key Tag locations unique access-key.
	 * @apiPermission Tag location Cant be Accessed permission name : api_tag_location_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Tag locations.
	 * @apiParam {String} [Field="All Field"] Optional field of Tag locations : location_id, rfid_id, librarian_id, location_status, location_aging, location_created, location_updated.
	 * @apiParam {String} [Start=0] Optional start index of Tag locations.
	 * @apiParam {String} [Limit=10] Optional limit data of Tag locations.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tag_location.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataTag location Tag location data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_tag_location_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['location_id', 'rfid_id', 'librarian_id', 'location_status', 'location_aging', 'location_created', 'location_updated'];
		$tag_locations = $this->model_api_tag_location->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_tag_location->count_all($filter, $field);
		$tag_locations = array_map(function ($row) {

			return $row;
		}, $tag_locations);

		$data['tag_location'] = $tag_locations;

		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Tag location',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

	/**
	 * @api {get} /tag_location/detail Detail Tag location.
	 * @apiVersion 0.1.0
	 * @apiName DetailTag location
	 * @apiGroup tag_location
	 * @apiHeader {String} X-Api-Key Tag locations unique access-key.
	 * @apiPermission Tag location Cant be Accessed permission name : api_tag_location_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Tag locations.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of tag_location.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Tag locationNotFound Tag location data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_tag_location_detail', false);

		$this->requiredInput(['location_id']);

		$id = $this->get('location_id');

		$select_field = ['location_id', 'rfid_id', 'librarian_id', 'location_status', 'location_aging', 'location_created', 'location_updated'];
		$tag_location = $this->model_api_tag_location->find($id, $select_field);

		if (!$tag_location) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Blog not found'
			], API::HTTP_NOT_FOUND);
		}


		$data['tag_location'] = $tag_location;
		if ($data['tag_location']) {

			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Tag location',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tag location not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}


	/**
	 * @api {post} /tag_location/add Add Tag location.
	 * @apiVersion 0.1.0
	 * @apiName AddTag location
	 * @apiGroup tag_location
	 * @apiHeader {String} X-Api-Key Tag locations unique access-key.
	 * @apiPermission Tag location Cant be Accessed permission name : api_tag_location_add
	 *
	 * @apiParam {String} Rfid_id Mandatory rfid_id of Tag locations.  
	 * @apiParam {String} Librarian_id Mandatory librarian_id of Tag locations.  
	 * @apiParam {String} Location_status Mandatory location_status of Tag locations.  
	 * @apiParam {String} [Location_created] Optional location_created of Tag locations.  
	 * @apiParam {String} [Location_updated] Optional location_updated of Tag locations.  
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
	public function add_reza_post()
	{
		$this->load->model('model_tag_rfid');

		$this->is_allowed('api_tag_location_add', false);

		$this->form_validation->set_rules('rfid_id', 'Rfid Id', 'trim|required');
		$this->form_validation->set_rules('barcode_id', 'Barcode ID', 'trim|required');
		$this->form_validation->set_rules('location_status', 'Location Status', 'trim|required');
		$this->form_validation->set_rules('room_id', 'Room ID', 'trim|required');
		$this->form_validation->set_rules('user_id', 'User ID', 'trim|required');

		if ($this->form_validation->run()) {

			$rfid	= str_replace(' ', '', $this->input->post('rfid_id'));

			if (strlen($rfid) < 2) {
				$this->response([
					'status' => false,
					'message' => 'RFID harus memiliki setidaknya 8 karakter'
				], API::HTTP_NOT_ACCEPTABLE);
				return; // Stop execution
			} else {
				$rfid				= $rfid;
				$barcode			= $this->input->post('barcode_id');
				$created			= date('Y-m-d H:i:s');
				$createdby			= $this->input->post('user_id');
				$udpated			= date('Y-m-d H:i:s');
				$udpatedby			= $this->input->post('user_id');
				$librarian_stock	= $this->input->post('room_id');
				$aging				= $this->input->post('aging');

				// Check if rfid_id exists in tag_rfid table
				$this->db->where('rfid_rfid', $rfid);
				$existing_rfid = $this->db->get('tag_rfid')->row();

				if ($existing_rfid) {
					// RFID already exists
					$this->response([
						'status' => false,
						'message' => 'Barcode sudah ada'
					], API::HTTP_NOT_ACCEPTABLE);
				} else {
					//daftarkan dulu rfidnya di tabel tag_rfid coy
					$save_rfid = [
						'label_id' 			=> '1',
						'rfid_barcode' 		=> $barcode,
						'rfid_rfid' 		=> $rfid,
						'rfid_status' 		=> 'yes',
						'rfid_note' 		=> 'normal',
						'rfid_created' 		=> $created,
						'rfid_createdby'	=> $createdby,
						'rfid_updated' 		=> $udpated,
						'rfid_updatedby' 	=> $udpatedby,
					];

					$rfid_id = $this->model_tag_rfid->store($save_rfid);
					if ($rfid_id) {
						$save_data = [
							'rfid_id'			=> $rfid_id,
							'librarian_id' 		=> $librarian_stock,
							'location_status' 	=> 'TERSEDIA',
							'location_aging'	=> $aging ? $aging : NULL,
							'location_created' 	=> $created,
							'location_updated' 	=> $udpated,
						];
						$save_tag_location = $this->model_api_tag_location->store($save_data);
						if ($save_tag_location) {
							$this->response([
								'status' => true,
								'message' => 'RFID berhasil di daftar & RFID Masuk Ruangan'
							], API::HTTP_OK);
						} else {
							$this->response([
								'status' => false,
								'message' => cclang('data_not_change')
							], API::HTTP_NOT_ACCEPTABLE);
						}
					} else {
						$this->response([
							'status' => false,
							'message' => cclang('RFID tidak bisa didaftar')
						], API::HTTP_NOT_ACCEPTABLE);
					}
				}
			}
		} else {
			$this->response([
				'status' => false,
				'message' => 'Validation Errors.',
				'errors' => $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	public function add_post()
	{
		$this->is_allowed('api_tag_location_add', false);

		$this->form_validation->set_rules('rfid_id', 'Rfid Id', 'trim|required');
		$this->form_validation->set_rules('librarian_id', 'Librarian Id', 'trim|required');
		$this->form_validation->set_rules('location_status', 'Location Status', 'trim|required');

		if ($this->form_validation->run()) {

			$save_data = [
				'rfid_id' => $this->input->post('rfid_id'),
				'librarian_id' => $this->input->post('librarian_id'),
				'location_status' => $this->input->post('location_status'),
				'location_created' => date('Y-m-d H:i:s'),
				'location_updated' => date('Y-m-d H:i:s'),
			];

			$save_tag_location = $this->model_api_tag_location->store($save_data);

			if ($save_tag_location) {
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
	 * @api {post} /tag_location/update Update Tag location.
	 * @apiVersion 0.1.0
	 * @apiName UpdateTag location
	 * @apiGroup tag_location
	 * @apiHeader {String} X-Api-Key Tag locations unique access-key.
	 * @apiPermission Tag location Cant be Accessed permission name : api_tag_location_update
	 *
	 * @apiParam {String} Rfid_id Mandatory rfid_id of Tag locations.  
	 * @apiParam {String} Librarian_id Mandatory librarian_id of Tag locations.  
	 * @apiParam {String} [Location_updated] Optional location_updated of Tag locations.  
	 * @apiParam {Integer} location_id Mandatory location_id of Tag Location.
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

	public function update_reza_post()
	{
		$this->is_allowed('api_tag_location_update', false);

		$this->form_validation->set_rules('rfid_id', 'Rfid Id', 'trim|required');
		$this->form_validation->set_rules('librarian_id', 'Librarian Id', 'trim|required');

		if ($this->form_validation->run()) {

			// rfid tag number. example : 323032343039313300000000. memiliki kode barcode 20240913
			$rfid_tag = $this->input->post('rfid_id');

			$this->db->select('tag_location.location_id, tag_location.librarian_id, tag_rfid.rfid_id, tag_location.location_aging');
			$this->db->from('tag_location');
			$this->db->join('tag_rfid', 'tag_location.rfid_id = tag_rfid.rfid_id');
			$this->db->where('tag_rfid.rfid_rfid', $rfid_tag);
			$this->db->where('tag_location.location_status', 'TERSEDIA');

			$query = $this->db->get();
			$result = $query->row();

			if (!$result) {
				
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('rfid not found')
				], API::HTTP_NOT_ACCEPTABLE);

			} else { // rfid tag number ditemukan

				$rfid_id			= $result->rfid_id;
				$location_id		= $result->location_id;

				// variable utk cek lokasi tag_rfid terakhir
				$librarian_server	= $result->librarian_id;

				// variable utk menangkap posisi terakhir yang terbaca oleh reader yang ada / aktif
				$librarian_post		= $this->input->post('librarian_id');
				$librarian_now		= 0;
				$location_aging		= false;

				// usia rfid_tag_number, tapi di tag_location, bukan di tag_librarian
				$aging           	= $result->location_aging;

				// bandingin lokasi terakhir dengan yang di baca oleh reader
				if ($librarian_server == $librarian_post) {
					
					//if ($librarian_post == '3' || $librarian_post == '8') {
					if ($librarian_post == '4' || $librarian_post == '8') {
						$location_aging = true;
					} else {
						$location_aging = false;
					}
					
					// id_librarian 1 (moving), jika kondisi true udah pasti tag_rfid nya lagi keluar ruangan
					$librarian_now = 1;

				} else { // udah pasti lagi mau masuk ruangan ini

					//jika librarian terakhir > 1 (moving)

					if ($librarian_server > 1) {
						
						$this->load->model('model_tag_anomaly');

						$save_data = [
							'rfid_id' => $rfid_id,
							'anomaly_wrong_librarian' => $librarian_post,
							'anomaly_right_librarian' => '1',
							'anomaly_status' => 'not',
							'anomaly_created' => date('Y-m-d H:i:s'),
							'anomaly_updated' => date('Y-m-d H:i:s'),
							'anomaly_updatedby' => get_user_data('id'),
						];
						
						$this->model_tag_anomaly->store($save_data);
					
					}

					// contoh anomally tidak melewati moving
					$librarian_now = $librarian_post;
				}

				$save_data = [
					'rfid_id' => $rfid_id,
					'librarian_id' => $librarian_now,
					'location_updated' => date('Y-m-d H:i:s'),
				];

				if ($location_aging && !$aging) {
					// birthday
					$save_data['location_aging'] = date('Y-m-d H:i:s');
				}

				// update tag_location, catat posisi terakhir yang di tangkap oleh reader librarian
				$save_tag_location = $this->model_api_tag_location->change($location_id, $save_data);

				$this->load->model('model_tag_location_log');

				$save_data_log = [
					'rfid_id'		=> $rfid_id,
					'librarian_id'	=> $librarian_post,
					'log_status'	=> 'AVAILABLE',
					'log_created'	=> date('Y-m-d H:i:s'),
					'log_createdby' => 'system',
				];

				$this->model_tag_location_log->store($save_data_log);

				if ($save_tag_location) {
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
				
			}

		} else { // form validation error
			
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Validation Errors.',
				'errors' 	=> $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);

		}
	}

	public function update_post()
	{
		$this->is_allowed('api_tag_location_update', false);


		$this->form_validation->set_rules('rfid_id', 'Rfid Id', 'trim|required');
		$this->form_validation->set_rules('librarian_id', 'Librarian Id', 'trim|required');

		if ($this->form_validation->run()) {

			$save_data = [
				'rfid_id' => $this->input->post('rfid_id'),
				'librarian_id' => $this->input->post('librarian_id'),
				'location_updated' => date('Y-m-d H:i:s'),
			];

			$save_tag_location = $this->model_api_tag_location->change($this->post('location_id'), $save_data);

			if ($save_tag_location) {
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
	 * @api {post} /tag_location/delete Delete Tag location. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteTag location
	 * @apiGroup tag_location
	 * @apiHeader {String} X-Api-Key Tag locations unique access-key.
	 * @apiPermission Tag location Cant be Accessed permission name : api_tag_location_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Tag locations .
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
		$this->is_allowed('api_tag_location_delete', false);

		$tag_location = $this->model_api_tag_location->find($this->post('location_id'));

		if (!$tag_location) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tag location not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_tag_location->remove($this->post('location_id'));
		}

		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Tag location deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Tag location not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
}

/* End of file Tag location.php */
/* Location: ./application/controllers/api/Tag location.php */