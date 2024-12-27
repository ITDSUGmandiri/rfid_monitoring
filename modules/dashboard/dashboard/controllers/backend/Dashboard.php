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
		// echo !$this->aauth->is_allowed('dashboard');
		// exit();
		// if (!$this->aauth->is_allowed('dashboard')) {
		// 	redirect('/', 'refresh');
		// }
		$dashboards = $this->model_dashboard->get(null, null, $limit = 9999, $offset = 0);
		$kategori = $this->model_dashboard->getKategori(null, null, $this->limit_page, $offset);
		$data = [
			'dashboards' => $dashboards,
			'kategori' => $kategori
		];

		// File ini terletak di: modules/dashboard/dashboard/controllers/backend/Dashboard.php
		$this->render('backend/standart/dashboard', $data);
	}
	public function abc($data)
	{

		$data_json = array(); // Inisialisasi array untuk menyimpan data JSON

		switch ($data) {
			case "2":
				$room2 = "SELECT * FROM tb_master_aset WHERE tag_code != '' AND kelompok = 1 AND lokasi=2 AND status_id = 1 ORDER BY id";
				$data_json = $this->db->query($room2)->result();
				break;
			case "3":
				$room2 = "SELECT * FROM tb_master_aset WHERE tag_code != '' AND kelompok = 1 AND lokasi=3 AND status_id = 1 ORDER BY id";
				$data_json = $this->db->query($room2)->result();
				break;
			case "gettotalpantau":
				$row_totalpantau = "SELECT kode_tid, nama_aset, kode_aset, nup, tgl_inventarisasi FROM tb_master_aset WHERE DATEDIFF(CURDATE(), tgl_inventarisasi) <= 365 AND kode_tid !='' ORDER BY nama_aset ASC";
				$data_json = $this->db->query($row_totalpantau)->result();
				break;
			case "total":
				$row_total = "SELECT kode_tid, nama_aset, kode_aset, nup, tgl_inventarisasi FROM tb_master_aset WHERE kode_tid !='' ORDER BY nama_aset ASC";
				$data_json = $this->db->query($row_total)->result();
				break;
			case "anomali":
				$query_anomali = "SELECT x.kode_tid, x.nama_aset, x.kode_aset, x.nup, x.status, x.id_lokasi, y.id, y.ruangan FROM tb_master_aset x JOIN tb_master_ruangan y ON y.id = x.lokasi_moving WHERE x.status = 1 AND x.kode_tid !='' order by x.lokasi_moving asc, x.kode_aset asc, nup asc";
				$data_json = $this->db->query($query_anomali)->result();
				break;
			case "mutation":
				$query_mut = "SELECT x.kode_tid, x.nama_aset, x.kode_aset, x.nup, x.status, x.id_lokasi, y.id, y.ruangan FROM tb_master_aset x JOIN tb_master_ruangan y ON y.id = x.id_lokasi WHERE x.status = 2 AND x.kode_tid !=''";
				$data_json = $this->db->query($query_mut)->result();
				break;
			case "moving":
				$query_mov = "SELECT x.kode_tid, x.nama_aset, x.kode_aset, x.nup,x.nama_lokasi_terakhir, x.status, x.id_lokasi AS asal, y.id, y.ruangan FROM tb_master_aset x JOIN tb_master_ruangan y ON y.id = x.id_lokasi WHERE x.status = 4 AND x.kode_tid !=''";
				$data_json = $this->db->query($query_mov)->result();
				break;
			case "maintenance":
				$query_disp = "SELECT x.kode_tid, x.nama_aset, x.kode_aset, x.nup, x.status, x.id_lokasi, y.id, y.ruangan FROM tb_master_aset x JOIN tb_master_ruangan y ON y.id = x.id_lokasi WHERE x.status = 3 AND x.kode_tid !=''";
				$data_json = $this->db->query($query_disp)->result();
				break;
			case "ontime":
				$query_ontime = "SELECT distinct c.tag_code,o.kode_brg,o.nup, o.nama_brg, o.tag_code ,i.rfid_code_tag, i.id_room, r.id_room, r.name_room from tb_master_aset o inner join tb_asset_moving c on c.tag_code = o.tag_code inner join tb_history_invent i on i.rfid_code_tag = o.tag_code inner join tb_room_master r on r.id_room = i.id_room AND c.status_moving = 'Out' AND o.lokasi = 0 AND o.status_id = 7 AND o.kelompok = 1";
				$data_json = $this->db->query($query_ontime)->result();
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
				$data_json = $this->db->query($query_overdue)->result();
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
				$data_json = $this->db->query($query_borrow)->result();
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
				$data_json = $this->db->query($query_broken)->result();
				break;
		}

		// Mengirimkan data dalam format JSON ke klien
		echo json_encode($data_json);
	}

	public function getSumAsetRoom()
	{


		// Ambil data untuk chart
		$row_totalpantau = "SELECT COUNT(*) as total FROM tb_master_aset WHERE DATEDIFF(CURDATE(), tgl_inventarisasi) <= 365 AND kode_tid !=''";
		$result_total = $this->db->query($row_totalpantau);
		$row_totalpantau = $result_total->row();

		// // Ambil data untuk chart
		$query_total = "SELECT COUNT(*) as total FROM tb_master_aset WHERE kode_tid != ''";
		$result_total = $this->db->query($query_total);
		$row_total = $result_total->row();

		// // Ambil data untuk chart
		$query_inv = "SELECT COUNT(*) as total FROM tb_master_aset WHERE status = 1 AND kode_tid != ''";
		$result_total = $this->db->query($query_inv);
		$row_sensus = $result_total->row();

		$query_on_time = "SELECT COUNT(*) as total from tb_master_aset WHERE status = 3 AND kode_tid != ''";
		$result_on_time = $this->db->query($query_on_time);
		$row_on_time = $result_on_time->row();

		$query_mutation = "SELECT COUNT(*) as total FROM tb_master_aset WHERE status = 2 AND kode_tid != 0";
		$result_mutation = $this->db->query($query_mutation);
		$mutation = $result_mutation->row();

		$query_disp = "SELECT COUNT(*) as total FROM tb_master_aset WHERE status = 4 AND tipe_moving = 0";
		$result_dispo = $this->db->query($query_disp);
		$ilegal = $result_dispo->row();

		$query_disp = "SELECT COUNT(*) as total FROM tb_master_aset WHERE status = 4 AND tipe_moving = 1";
		$result_legal = $this->db->query($query_disp);
		$legal = $result_legal->row();
		// // $query_on_time = "SELECT COUNT(*) as total FROM tb_master_aset WHERE lokasi = 0 AND librarian_id = '1' AND location_updated > DATE_SUB(NOW(), INTERVAL 2 DAY)";
		// // $result_on_time = $this->db->query($query_on_time);
		// // $row_on_time = $result_on_time->row();

		// $query_overdue = "SELECT o.tag_code, count(distinct c.tag_code) as total, c.tanggal, TIME(c.waktu) as Time from tb_master_aset o inner join tb_asset_moving c on c.tag_code = o.tag_code AND o.lokasi = 0 AND o.status_id = 7 AND o.kelompok = 1 AND c.status_moving = 'Out' AND c.id=(SELECT max(id) FROM tb_asset_moving) AND datediff(CURRENT_TIMESTAMP, c.tanggal) > 6";
		// $result_overdue = $this->db->query($query_overdue);
		// $row_overdue = $result_overdue->row();

		// $query_pinjam = "SELECT COUNT(*) as total FROM tb_master_aset WHERE kondisi = 07";
		// $result_pinjam = $this->db->query($query_pinjam);
		// $row_pinjam = $result_pinjam->row();

		// $query_rusak = "SELECT COUNT(*) as total FROM tb_master_aset WHERE kondisi = 03 AND kondisi = 04";
		// $result_rusak = $this->db->query($query_rusak);
		// $row_rusak = $result_rusak->row();

		// $query_anomaly = "SELECT COUNT(*) as total, c.id_room,c.rfid_code_tag, o.nama_brg, o.kode_brg, o.nup, o.status_id, o.tag_code, o.lokasi FROM tb_master_aset AS o INNER JOIN tb_history_invent AS c ON c.rfid_code_tag = o.tag_code AND o.lokasi != c.id_room AND NOT EXISTS (SELECT tag_code FROM tb_asset_moving AS p WHERE p.tag_code = o.tag_code) ORDER BY o.tag_code";
		// $result_anomaly = $this->db->query($query_anomaly);
		// $row_anomaly = $result_anomaly->row();

		// //ambil data chart untuk label kondisi
		// $querycondt = "SELECT k.keterangan, count(k.keterangan) as total FROM tb_master_aset a INNER JOIN tb_kondisi_master k ON a.kondisi = k.id GROUP BY k.keterangan";
		// $data_chart = $this->db->query($querycondt)->result();

		//status chart
		$querycateg = "SELECT case when a.status = 1 then 'Available' when a.status = 2 then 'Peminjaman' when a.status = 3 then 'Perbaikan' when a.status = 4 and a.tipe_moving = 1 then 'Legal Moving' else 'Ilegal Moving' end as key_status, count(a.kode_aset) as total FROM tb_master_aset a INNER JOIN tb_master_status c ON a.status = c.id AND a.kode_tid != '' GROUP BY key_status ORDER BY key_status ASC";
		$data_status = $this->db->query($querycateg)->result();

		//status room
		$querycateg = "SELECT c.ruangan,count(a.lokasi_moving) as total FROM tb_master_aset a JOIN tb_master_ruangan c ON c.id = a.lokasi_moving AND a.status != 0 AND a.kode_tid !='' GROUP BY c.ruangan";
		$data_ruangan = $this->db->query($querycateg)->result();

		//status kategory
		$querycateg = "SELECT c.kategori, count(a.kategori) as total FROM tb_master_aset a INNER JOIN tb_master_kategori c ON a.kategori = c.id AND a.status != 0 AND a.kode_tid !='' GROUP BY c.kategori";
		$data_kate = $this->db->query($querycateg)->result();

		// $querykon = "SELECT status FROM tb_master_status";
		// // $querycateg = "SELECT c.nama_kategori FROM tb_master_aset a INNER JOIN tb_category_aset c ON a.kategori_id = c.id_kategori GROUP BY c.nama_kategori";
		// $data_kon = $this->db->query($querykon)->result();




		// $data_chart = array(
		// 	"TOTAL" => $row_total->total,
		// 	"ANOMALI" => $row_anomali->total,
		// 	"MUTASI" => $mutation,
		// 	"DISPOSAL" => $disposal,
		// 	"ON TIME" => $row_on_time->total,
		// 	"OVERDUE" => $row_overdue->total,
		// 	"PINJAM" => $row_pinjam->total,
		// 	"RUSAK" => $row_rusak->total
		// );

		// $querylibrarian = "
		// SELECT b.name_room as building_name, b.id_room, b.name_room, COUNT(CASE WHEN tl.Lokasi != '' THEN tl.Lokasi ELSE NULL END) as total_rfid FROM tb_room_master b LEFT JOIN tb_master_aset tl ON b.id_room = tl.Lokasi GROUP BY b.id_room, tl.Lokasi ORDER BY b.id_room;
		// ";

		// $result = $this->db->query($querylibrarian);
		$data = array(
			"totalpantau" => $row_totalpantau->total,
			"total" 	=> $row_total->total,
			"avalaible"   => $row_sensus->total,
			"peminjaman"	=> $mutation->total,
			"ilegal"	=> $ilegal->total,
			"legal"	=> $legal->total,
			"perbaikan" 	=> $row_on_time->total,
			// "overdue"	=> $row_overdue->total,
			// "borrow" 	=> $row_pinjam->total,
			// "broken" 	=> $row_rusak->total,
			// "anomaly" 	=> $row_anomaly->total,
			"labelkat" 	=> $data_kate,
			"valueskat"	=> array_values($data_kate),
			"label" 	=> $data_ruangan,
			"values"	=> array_values($data_ruangan),
			"labelcateg" 	=> $data_status,
			"valuescateg"	=> array_values($data_status),
			// "librarian"	=> $result->result_array()
		);
		// Encode data untuk chart menjadi format JSON
		$data_json = json_encode($data);
		echo $data_json;
	}

	public function reza()
	{


		// Ambil data untuk chart
		$query_total = "SELECT COUNT(*) as total FROM tag_location";
		$result_total = $this->db->query($query_total);
		$row_total = $result_total->row();

		$query_on_time = "SELECT COUNT(*) as total FROM tag_location WHERE location_status='TERSEDIA' AND librarian_id = '1' AND location_updated > DATE_SUB(NOW(), INTERVAL 2 DAY)";
		$result_on_time = $this->db->query($query_on_time);
		$row_on_time = $result_on_time->row();

		$query_overdue = "SELECT COUNT(*) as total FROM tag_location WHERE location_status='TERSEDIA' AND librarian_id = '1' AND location_updated <= DATE_SUB(NOW(), INTERVAL 2 DAY)";
		$result_overdue = $this->db->query($query_overdue);
		$row_overdue = $result_overdue->row();

		$query_pinjam = "SELECT COUNT(*) as total FROM tag_borrow WHERE borrow_status = 'PENDING'";
		$result_pinjam = $this->db->query($query_pinjam);
		$row_pinjam = $result_pinjam->row();

		$query_rusak = "SELECT COUNT(*) as total FROM tag_broken";
		$result_rusak = $this->db->query($query_rusak);
		$row_rusak = $result_rusak->row();

		$query_anomaly = "SELECT COUNT(*) as total FROM tag_anomaly";
		$result_anomaly = $this->db->query($query_anomaly);
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

		$result = $this->db->query($querylibrarian);

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