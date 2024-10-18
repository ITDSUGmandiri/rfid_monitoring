<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	}

	public function index()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}
		$data = [];
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
			b.building_name, 
			l.librarian_id,
			l.librarian_name, 
			COUNT(CASE WHEN tl.location_status = 'TERSEDIA' THEN tl.librarian_id ELSE NULL END) as total_rfid
		FROM 
			tag_building b
		JOIN 
			tag_librarian l ON b.building_id = l.building_id
		LEFT JOIN 
			tag_location tl ON l.librarian_id = tl.librarian_id
		WHERE 
			b.building_id > 1
		GROUP BY 
			b.building_id, l.librarian_id
		ORDER BY 
			b.building_id;
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

	public function chart()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/','refresh');
		}

		$data = [];
		$this->render('backend/standart/chart', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */
