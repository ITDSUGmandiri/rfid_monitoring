<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Dashboard Controller
 *| --------------------------------------------------------------------------
 *| For see your board
 *|
 */
class Dashboard extends Admin
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_dashboard');
		$this->load->model('widged/model_widged');
		$this->load->library('widged/cc_widged');
	}

	public function index()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}
		$dashboards = $this->model_dashboard->get(null, null, $limit = 9999, $offset = 0);
		$data = [
			'dashboards' => $dashboards
		];
		// File ini terletak di: modules/dashboard/dashboard/controllers/backend/Dashboard.php
		$this->render('backend/standart/dashboard', $data);
	}
	public function abc($data)
	{
		$CI = &get_instance();
		$data_json = array(); // Inisialisasi array untuk menyimpan data JSON

		switch ($data) {
			case "total":
				$query_total = "
						SELECT 
							tl.rfid_id AS rfid,
							tl.location_status AS status,
							CASE
								WHEN tl.location_aging IS NOT NULL THEN DATEDIFF(NOW(), tl.location_aging)
								ELSE '~'
							END AS aging,
							tl.location_created AS created,
							tl.location_updated AS updated,
							l.librarian_name AS ruangan
						FROM 
							tag_location tl
						JOIN 
							tag_librarian l ON tl.librarian_id = l.librarian_id
						ORDER BY
							tl.location_updated DESC
						LIMIT 20;
					";
				$data_json = $CI->db->query($query_total)->result();
				break;
			case "ontime":
				$query_ontime = "
						SELECT 
							tl.rfid_id AS rfid,
							tl.location_status AS status,
							CASE
								WHEN tl.location_aging IS NOT NULL THEN DATEDIFF(NOW(), tl.location_aging)
								ELSE '~'
							END AS aging,
							tl.location_created AS created,
							tl.location_updated AS updated,
							l.librarian_name AS ruangan
						FROM 
							tag_location tl
						JOIN 
							tag_librarian l ON tl.librarian_id = l.librarian_id
						WHERE 
							tl.location_status = 'TERSEDIA' 
							AND tl.librarian_id = '1' 
							AND tl.location_updated > DATE_SUB(NOW(), INTERVAL 2 DAY)
						ORDER BY
							tl.location_updated DESC
						LIMIT 20;
					";
				$data_json = $CI->db->query($query_ontime)->result();
				break;
			case "overdue":
				$query_overdue = "
						SELECT 
							tl.rfid_id AS rfid,
							tl.location_status AS status,
							CASE
								WHEN tl.location_aging IS NOT NULL THEN DATEDIFF(NOW(), tl.location_aging)
								ELSE '~'
							END AS aging,
							tl.location_created AS created,
							tl.location_updated AS updated,
							l.librarian_name AS ruangan
						FROM 
							tag_location tl
						JOIN 
							tag_librarian l ON tl.librarian_id = l.librarian_id
						WHERE 
							tl.location_status = 'TERSEDIA' 
							AND tl.librarian_id = '1' 
							AND tl.location_updated <= DATE_SUB(NOW(), INTERVAL 2 DAY)
						ORDER BY
							tl.location_updated DESC
						LIMIT 20;
					";
				$data_json = $CI->db->query($query_overdue)->result();
				break;
			case "borrow":
				$query_borrow = "
						SELECT 
							tl.rfid_id AS rfid,
							tl.location_status AS status,
							CASE
								WHEN tl.location_aging IS NOT NULL THEN DATEDIFF(NOW(), tl.location_aging)
								ELSE '~'
							END AS aging,
							tl.location_created AS created,
							tl.location_updated AS updated,
							l.librarian_name AS ruangan
						FROM 
							tag_location tl
						JOIN 
							tag_librarian l ON tl.librarian_id = l.librarian_id
						WHERE 
							tl.location_status = 'PINJAM'
						ORDER BY
							tl.location_updated DESC
						LIMIT 20;
					";
				$data_json = $CI->db->query($query_borrow)->result();
				break;
			case "broken":
				$query_broken = "
						SELECT 
							tl.rfid_id AS rfid,
							tl.location_status AS status,
							CASE
								WHEN tl.location_aging IS NOT NULL THEN DATEDIFF(NOW(), tl.location_aging)
								ELSE '~'
							END AS aging,
							tl.location_created AS created,
							tl.location_updated AS updated,
							l.librarian_name AS ruangan
						FROM 
							tag_location tl
						JOIN 
							tag_librarian l ON tl.librarian_id = l.librarian_id
						WHERE 
							tl.location_status = 'KERUSAKAN'
						ORDER BY
							tl.location_updated DESC
						LIMIT 20;
					";
				$data_json = $CI->db->query($query_broken)->result();
				break;
		}

		// Mengirimkan data dalam format JSON ke klien
		echo json_encode($data_json);
	}

	public function reza()
	{
		$CI = &get_instance();

		// Ambil data untuk chart
		$query_total = "SELECT COUNT(*) as total FROM tag_location";
		$result_total = $CI->db->query($query_total);
		$row_total = $result_total->row();

		$query_on_time = "SELECT COUNT(*) as total FROM tag_location WHERE location_status='TERSEDIA' AND librarian_id = '1' AND location_updated > DATE_SUB(NOW(), INTERVAL 2 DAY)";
		$result_on_time = $CI->db->query($query_on_time);
		$row_on_time = $result_on_time->row();

		$query_overdue = "SELECT COUNT(*) as total FROM tag_location WHERE location_status='TERSEDIA' AND librarian_id = '1' AND location_updated <= DATE_SUB(NOW(), INTERVAL 2 DAY)";
		$result_overdue = $CI->db->query($query_overdue);
		$row_overdue = $result_overdue->row();

		$query_pinjam = "SELECT COUNT(*) as total FROM tag_borrow WHERE borrow_status = 'PENDING'";
		$result_pinjam = $CI->db->query($query_pinjam);
		$row_pinjam = $result_pinjam->row();

		$query_rusak = "SELECT COUNT(*) as total FROM tag_broken";
		$result_rusak = $CI->db->query($query_rusak);
		$row_rusak = $result_rusak->row();

		$query_anomaly = "SELECT COUNT(*) as total FROM tag_anomaly";
		$result_anomaly = $CI->db->query($query_anomaly);
		$row_anomaly = $result_anomaly->row();

		$data_chart = array(
			"TOTAL" => $row_total->total,
			"ON TIME" => $row_on_time->total,
			"OVERDUE" => $row_overdue->total,
			"PINJAM" => $row_pinjam->total,
			"RUSAK" => $row_rusak->total
		);

		$querylibrarian = "
		SELECT 
			b.nama_lokasi as building_name, 
			l.librarian_id,
			l.librarian_name, 
			COUNT(CASE WHEN tl.location_status = 'TERSEDIA' THEN tl.librarian_id ELSE NULL END) as total_rfid
		FROM 
			lokasi_kerja b
		JOIN 
			tag_librarian l ON b.id = l.building_id
		LEFT JOIN 
			tag_location tl ON l.librarian_id = tl.librarian_id
		WHERE 
			b.id > 1
		GROUP BY 
			b.id, l.librarian_id
		ORDER BY 
			b.id;
        ";

		$result = $CI->db->query($querylibrarian);

		$data = array(
			"total" 	=> $row_total->total,
			"ontime" 	=> $row_on_time->total,
			"overdue"	=> $row_overdue->total,
			"borrow" 	=> $row_pinjam->total,
			"broken" 	=> $row_rusak->total,
			"anomaly" 	=> $row_anomaly->total,
			"label" 	=> array_keys($data_chart),
			"values"	=> array_values($data_chart),
			"librarian"	=> $result->result_array()
		);

		// Encode data untuk chart menjadi format JSON
		$data_json = json_encode($data);
		echo $data_json;
	}

	public function edit($slug = null)
	{
		if (!$this->aauth->is_allowed('dashboard_update')) {
			redirect('/', 'refresh');
		}

		$dashboard = $this->model_dashboard->find_by_slug($slug);
		if (!$dashboard) {
			redirect(ADMIN_NAMESPACE_URL . '/dashboard', 'refresh');
		}

		$widgeds = $this->model_widged->find_by_dashboard_id($dashboard->id);
		$data = [
			'dashboard' => $dashboard,
			'widgeds' => $widgeds,
			'slug' => $slug,
			'edit' => true

		];
		$this->render('backend/standart/administrator/dashboard_add', $data);
	}


	public function show($slug = null)
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}

		$dashboard = $this->model_dashboard->find_by_slug($slug);
		if (!$dashboard) {
			redirect(ADMIN_NAMESPACE_URL . '/dashboard', 'refresh');
		}

		$widgeds = $this->model_widged->find_by_dashboard_id($dashboard->id);
		$data = [
			'dashboard' => $dashboard,
			'widgeds' => $widgeds,
			'slug' => $slug,
			'edit' => false
		];
		$this->render('backend/standart/administrator/dashboard_add', $data);
	}

	public function remove($slug = null)
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}

		$dashboard = $this->model_dashboard->find_by_slug($slug);
		if (!$dashboard) {
			redirect(ADMIN_NAMESPACE_URL . '/dashboard', 'refresh');
		}
		$remove = $this->model_dashboard->remove($dashboard->id);
		if ($remove) {
			set_message(cclang('has_been_deleted', 'Dashboard'), 'success');
		} else {
			set_message(cclang('error_delete', 'Dashboard'), 'error');
		}
		redirect(ADMIN_NAMESPACE_URL . '/dashboard', 'refresh');
	}

	public function create()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}

		$name = $this->input->get('name');

		$id = $this->model_dashboard->store([
			'title' => $name,
			'created_at' => now()
		]);

		$slug = $id . '-' . url_title($name);

		$this->model_dashboard->change($id, [
			'slug' => $slug
		]);

		redirect(ADMIN_NAMESPACE_URL . '/dashboard/edit/' . $slug, 'refresh');
	}


	public function change_title()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}

		$id = $this->input->get('id');
		$title = $this->input->get('title');

		$id = $this->model_dashboard->change($id, [
			'title' => $title
		]);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */