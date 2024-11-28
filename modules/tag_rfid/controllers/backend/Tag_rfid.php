<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tag Rfid Controller
*| --------------------------------------------------------------------------
*| Tag Rfid site
*|
*/
class Tag_rfid extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tag_rfid');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tag Rfids
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tag_rfid_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tag_rfids'] = $this->model_tag_rfid->get($filter, $field, $this->limit_page, $offset);
		$this->data['tag_rfid_counts'] = $this->model_tag_rfid->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tag_rfid/index/',
			'total_rows'   => $this->data['tag_rfid_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tag_rfid/tag_rfid_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tag_rfid_counts']
			]);
		}

		$this->template->title('RFID List');
		$this->render('backend/standart/administrator/tag_rfid/tag_rfid_list', $this->data);
	}
	
	
	
	/**
	* delete Tag Rfids
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tag_rfid_delete');

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
					"message" => cclang('has_been_deleted', 'tag_rfid')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tag_rfid')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tag_rfid'), 'success');
			} else {
				set_message(cclang('error_delete', 'tag_rfid'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tag Rfids
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tag_rfid_view');

		$this->data['tag_rfid'] = $this->model_tag_rfid->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('RFID Detail');
		$this->render('backend/standart/administrator/tag_rfid/tag_rfid_view', $this->data);
	}
	
	/**
	* delete Tag Rfids
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tag_rfid = $this->model_tag_rfid->find($id);

		
		
		return $this->model_tag_rfid->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tag_rfid_export');

		$this->model_tag_rfid->export(
			'tag_rfid', 
			'tag_rfid',
			$this->model_tag_rfid->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tag_rfid_export');

		$this->model_tag_rfid->pdf('tag_rfid', 'tag_rfid');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tag_rfid_export');

		$table = $title = 'tag_rfid';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tag_rfid->find($id);
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


/* End of file tag_rfid.php */
/* Location: ./application/controllers/administrator/Tag Rfid.php */