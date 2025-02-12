<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Import extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('model_tb_master_aset');
    }

    public function upload()
    {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
            return;
        }

        $file = $this->upload->data('full_path');

        $spreadsheet = IOFactory::load($file);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Hanya ambil kolom tertentu (Misalnya: Nama di kolom A dan Email di kolom B)
        $data = [];
        foreach ($sheetData as $index => $row) {
            if ($index == 0) continue; // Lewati baris header

            $data[] = [
                'kode_tid' => 0,
                'kode_aset' => $row[5],
                'nup' => $row[6],
                'kategori' => 0,
                'merk' => $row[9],
                'tipe' => $row[10],
                'kondisi' => $row[11],
                'status' => $row[50],
                'borrow' => 0,
                'tipe_moving' => 0,
                'nama_aset' => $row[8],
                'id_area' => 0,
                'id_gedung' => 0,
                'id_lokasi' => 0,
                'tgl_perolehan' => $row[34],
                'nilai_perolehan' => $row[38],
                'tgl_inventarisasi' => NULL,
                'tgl_peminjaman' => NULL,
                'tgl_pengembalian' => NULL,
                'flag_inventarisasi' => NULL,
                'id_peminjam' => NULL,
                'lokasi_moving' => NULL,
                'lokasi_terakhir' => NULL,
                'nama_lokasi_terakhir' => NULL,
                'id_pegawai' => $row[65],
                'image_uri' => NULL,
                'id_transaksi' => NULL,
                'no_batch_sensus' => NULL,
                'keterangan' => NULL,
            ];
        }

        if (!empty($data)) {
            $this->model_tb_master_aset->importDataAset($data);
        }

        unlink($file); // Hapus file setelah selesai
        echo "Data berhasil diimport!";
    }
}
