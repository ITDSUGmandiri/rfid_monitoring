<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Pengaturan Sistem Controller
*| --------------------------------------------------------------------------
*| Pengaturan Sistem site
*|
*/
class Pengaturan_sistem extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_pengaturan_sistem');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Pengaturan Sistems
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('pengaturan_sistem_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['pengaturan_sistems'] = $this->model_pengaturan_sistem->get($filter, $field, $this->limit_page, $offset);
		$this->data['pengaturan_sistem_counts'] = $this->model_pengaturan_sistem->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/pengaturan_sistem/index/',
			'total_rows'   => $this->data['pengaturan_sistem_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/pengaturan_sistem/pengaturan_sistem_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['pengaturan_sistem_counts']
			]);
		}

		$this->template->title('Pengaturan Sistem List');
		$this->render('backend/standart/administrator/pengaturan_sistem/pengaturan_sistem_list', $this->data);
	}
	
	/**
	* Add new pengaturan_sistems
	*
	*/
	public function add()
	{
		$this->is_allowed('pengaturan_sistem_add');

		$this->template->title('Pengaturan Sistem New');
		$this->render('backend/standart/administrator/pengaturan_sistem/pengaturan_sistem_add', $this->data);
	}

	/**
	* Add New Pengaturan Sistems
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('pengaturan_sistem_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('ip_address_server', 'Ip Address Server', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('protocol_ws_server', 'Protocol Ws Server', 'trim|required|max_length[3]');
		

		$this->form_validation->set_rules('port_ws_server', 'Port Ws Server', 'trim|required|max_length[4]');
		

		$this->form_validation->set_rules('validation_ip_address_server', 'Validation Ip Address Server', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('validation_protocol_ws_server', 'Validation Protocol Ws Server', 'trim|required|max_length[3]');
		

		$this->form_validation->set_rules('validation_port_ws_server', 'Validation Port Ws Server', 'trim|required|max_length[4]');
		

		$this->form_validation->set_rules('validation_auto_reconnect', 'Validation Auto Reconnect', 'trim|required');
		

		$this->form_validation->set_rules('flag_moving_in', 'Flag Moving In', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_moving_out', 'Flag Moving Out', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('timeout_duration', 'Timeout Duration', 'trim|required');
		

		$this->form_validation->set_rules('is_web_play_buzzer', 'Is Web Play Buzzer', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('deras_status_default', 'Deras Status Default', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('deras_description', 'Deras Description', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('deras_category_default', 'Deras Category Default', 'trim|required');
		

		$this->form_validation->set_rules('flag_alarm_register_tag', 'Flag Alarm Register Tag', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_status_available', 'Flag Status Available', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_status_not_available', 'Flag Status Not Available', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_kondisi_baik', 'Flag Kondisi Baik', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_sensus_normal', 'Flag Sensus Normal', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_sensus_anomali', 'Flag Sensus Anomali', 'trim|required|max_length[1]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'ip_address_server' => $this->input->post('ip_address_server'),
				'protocol_ws_server' => $this->input->post('protocol_ws_server'),
				'port_ws_server' => $this->input->post('port_ws_server'),
				'validation_ip_address_server' => $this->input->post('validation_ip_address_server'),
				'validation_protocol_ws_server' => $this->input->post('validation_protocol_ws_server'),
				'validation_port_ws_server' => $this->input->post('validation_port_ws_server'),
				'validation_auto_reconnect' => $this->input->post('validation_auto_reconnect'),
				'flag_moving_in' => $this->input->post('flag_moving_in'),
				'flag_moving_out' => $this->input->post('flag_moving_out'),
				'timeout_duration' => $this->input->post('timeout_duration'),
				'is_web_play_buzzer' => $this->input->post('is_web_play_buzzer'),
				'deras_status_default' => $this->input->post('deras_status_default'),
				'deras_description' => $this->input->post('deras_description'),
				'deras_category_default' => $this->input->post('deras_category_default'),
				'flag_alarm_register_tag' => $this->input->post('flag_alarm_register_tag'),
				'flag_status_available' => $this->input->post('flag_status_available'),
				'flag_status_not_available' => $this->input->post('flag_status_not_available'),
				'flag_kondisi_baik' => $this->input->post('flag_kondisi_baik'),
				'flag_sensus_normal' => $this->input->post('flag_sensus_normal'),
				'flag_sensus_anomali' => $this->input->post('flag_sensus_anomali'),
			];

			
			



			
			
			$save_pengaturan_sistem = $id = $this->model_pengaturan_sistem->store($save_data);
            

			if ($save_pengaturan_sistem) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_pengaturan_sistem;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/pengaturan_sistem/edit/' . $save_pengaturan_sistem, 'Edit Pengaturan Sistem'),
						admin_anchor('/pengaturan_sistem', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/pengaturan_sistem/edit/' . $save_pengaturan_sistem, 'Edit Pengaturan Sistem')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/pengaturan_sistem');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/pengaturan_sistem');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Pengaturan Sistems
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('pengaturan_sistem_update');

		$this->data['pengaturan_sistem'] = $this->model_pengaturan_sistem->find($id);

		$this->template->title('Pengaturan Sistem Update');
		$this->render('backend/standart/administrator/pengaturan_sistem/pengaturan_sistem_update', $this->data);
	}

	/**
	* Update Pengaturan Sistems
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('pengaturan_sistem_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('ip_address_server', 'Ip Address Server', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('protocol_ws_server', 'Protocol Ws Server', 'trim|required|max_length[3]');
		

		$this->form_validation->set_rules('port_ws_server', 'Port Ws Server', 'trim|required|max_length[4]');
		

		$this->form_validation->set_rules('validation_ip_address_server', 'Validation Ip Address Server', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('validation_protocol_ws_server', 'Validation Protocol Ws Server', 'trim|required|max_length[3]');
		

		$this->form_validation->set_rules('validation_port_ws_server', 'Validation Port Ws Server', 'trim|required|max_length[4]');
		

		$this->form_validation->set_rules('validation_auto_reconnect', 'Validation Auto Reconnect', 'trim|required');
		

		$this->form_validation->set_rules('flag_moving_in', 'Flag Moving In', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_moving_out', 'Flag Moving Out', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('timeout_duration', 'Timeout Duration', 'trim|required');
		

		$this->form_validation->set_rules('is_web_play_buzzer', 'Is Web Play Buzzer', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('deras_status_default', 'Deras Status Default', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('deras_description', 'Deras Description', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('deras_category_default', 'Deras Category Default', 'trim|required');
		

		$this->form_validation->set_rules('flag_alarm_register_tag', 'Flag Alarm Register Tag', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_status_available', 'Flag Status Available', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_status_not_available', 'Flag Status Not Available', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_kondisi_baik', 'Flag Kondisi Baik', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_sensus_normal', 'Flag Sensus Normal', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('flag_sensus_anomali', 'Flag Sensus Anomali', 'trim|required|max_length[1]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'ip_address_server' => $this->input->post('ip_address_server'),
				'protocol_ws_server' => $this->input->post('protocol_ws_server'),
				'port_ws_server' => $this->input->post('port_ws_server'),
				'validation_ip_address_server' => $this->input->post('validation_ip_address_server'),
				'validation_protocol_ws_server' => $this->input->post('validation_protocol_ws_server'),
				'validation_port_ws_server' => $this->input->post('validation_port_ws_server'),
				'validation_auto_reconnect' => $this->input->post('validation_auto_reconnect'),
				'flag_moving_in' => $this->input->post('flag_moving_in'),
				'flag_moving_out' => $this->input->post('flag_moving_out'),
				'timeout_duration' => $this->input->post('timeout_duration'),
				'is_web_play_buzzer' => $this->input->post('is_web_play_buzzer'),
				'deras_status_default' => $this->input->post('deras_status_default'),
				'deras_description' => $this->input->post('deras_description'),
				'deras_category_default' => $this->input->post('deras_category_default'),
				'flag_alarm_register_tag' => $this->input->post('flag_alarm_register_tag'),
				'flag_status_available' => $this->input->post('flag_status_available'),
				'flag_status_not_available' => $this->input->post('flag_status_not_available'),
				'flag_kondisi_baik' => $this->input->post('flag_kondisi_baik'),
				'flag_sensus_normal' => $this->input->post('flag_sensus_normal'),
				'flag_sensus_anomali' => $this->input->post('flag_sensus_anomali'),
			];

			

			


			
			
			$save_pengaturan_sistem = $this->model_pengaturan_sistem->change($id, $save_data);

			if ($save_pengaturan_sistem) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/pengaturan_sistem', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/pengaturan_sistem');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/pengaturan_sistem');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Pengaturan Sistems
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('pengaturan_sistem_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($this->input->get('ajax')) {
			if ($remove) {
				$this->response([
					"success" => true,
					"message" => cclang('has_been_deleted', 'pengaturan_sistem')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'pengaturan_sistem')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'pengaturan_sistem'), 'success');
			} else {
				set_message(cclang('error_delete', 'pengaturan_sistem'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Pengaturan Sistems
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('pengaturan_sistem_view');

		$this->data['pengaturan_sistem'] = $this->model_pengaturan_sistem->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Pengaturan Sistem Detail');
		$this->render('backend/standart/administrator/pengaturan_sistem/pengaturan_sistem_view', $this->data);
	}
	
	/**
	* delete Pengaturan Sistems
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$pengaturan_sistem = $this->model_pengaturan_sistem->find($id);

		
		
		return $this->model_pengaturan_sistem->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('pengaturan_sistem_export');

		$this->model_pengaturan_sistem->export(
			'pengaturan_sistem', 
			'pengaturan_sistem',
			$this->model_pengaturan_sistem->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('pengaturan_sistem_export');

		$this->model_pengaturan_sistem->pdf('pengaturan_sistem', 'pengaturan_sistem');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('pengaturan_sistem_export');

		$table = $title = 'pengaturan_sistem';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_pengaturan_sistem->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file pengaturan_sistem.php */
/* Location: ./application/controllers/administrator/Pengaturan Sistem.php */