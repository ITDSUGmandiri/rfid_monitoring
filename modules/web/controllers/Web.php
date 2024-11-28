<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *| --------------------------------------------------------------------------
 *| Web Controller
 *| --------------------------------------------------------------------------
 *| For default controller
 *|
 */


use ElephantIO\Client as Elephant;

use ElephantIO\Engine\SocketIO\Version1X as Version1X;

class Web extends Front
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (installation_complete()) {
            $this->home();
        } else {
            redirect('wizzard/language', 'refresh');
        }
    }

    public function switch_lang($lang = 'english')
    {
        $this->load->helper(['cookie']);

        set_cookie('language', $lang, (60 * 60 * 24) * 365);
        $this->lang->load('web', $lang);
        redirect_back();
    }

    public function check()
    {

        die(report_builder(1, 1));
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($this->load->view('report/report/blog_content_1', [], true));
        $mpdf->Output();
    }

    public function home()
    {
        if (defined('IS_DEMO')) {
            $this->template->build('home-demo');
        } else {
            $this->template->build('home');
        }
    }

    public function set_full_group_sql()
    {
        $this->db->query(" 
            set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
         ");

        $this->db->query(" 
            set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
         ");
    }

    public function migrate($version = null)
    {
        $this->load->library('migration');

        if ($version) {
            if ($this->migration->version($version) === FALSE) {
                show_error($this->migration->error_string());
            }
        } else {
            if ($this->migration->latest() === FALSE) {
                show_error($this->migration->error_string());
            }
        }
    }

    public function migrate_cicool()
    {
        $this->load->helper('file');
        $this->load->helper('directory');

        $files = (directory_map('application/controllers/administrator'));

        foreach ($files as $file) {
            $f_name = str_replace('.php', '', $file);
            $f_name_lower = strtolower(str_replace('.php', '', $file));

            if ($file == 'index.html') {
                continue;
            }
            if ($f_name_lower != 'web') {

                mkdir('modules/' . $f_name);
                mkdir('modules/' . $f_name . '/models');
                mkdir('modules/' . $f_name . '/views');
                mkdir('modules/' . $f_name . '/controllers');
                mkdir('modules/' . $f_name . '/controllers/backend');
                mkdir('modules/' . $f_name . '/views/backend');
                mkdir('modules/' . $f_name . '/views/backend/standart');
                mkdir('modules/' . $f_name . '/views/backend/standart/administrator');
                copy(FCPATH . '/application/models/Model_' . $f_name_lower . '.php', 'modules/' . $f_name_lower . '/models/Model_' . $f_name_lower . '.php');
                copy(FCPATH . '/application/controllers/administrator/' . $f_name . '.php', 'modules/' . $f_name . '/controllers/backend/' . $f_name . '.php');
                if (is_dir(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower)) {

                    $this->recurse_copy(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower, 'modules/' . $f_name . '/views/backend/standart/administrator/' . $f_name_lower);
                }
                //unlink('modules/'.$f_name_lower.'/models'.$f_name_lower.'.php' );
            }
        }
    }
    public function migrate_cicool_front()
    {
        $this->load->helper('file');
        $this->load->helper('directory');

        $files = (directory_map('application/controllers'));

        foreach ($files as $file) {
            $f_name = str_replace('.php', '', $file);
            $f_name_lower = strtolower(str_replace('.php', '', $file));

            if ($file == 'index.html') {
                continue;
            }
            if ($f_name_lower != 'web') {

                mkdir('modules/' . $f_name);
                mkdir('modules/' . $f_name . '/models');
                mkdir('modules/' . $f_name . '/views');
                mkdir('modules/' . $f_name . '/controllers');
                mkdir('modules/' . $f_name . '/controllers');
                mkdir('modules/' . $f_name . '/views/backend');
                mkdir('modules/' . $f_name . '/views/backend/standart');
                mkdir('modules/' . $f_name . '/views/backend/standart/administrator');
                copy(FCPATH . '/application/models/Model_' . $f_name_lower . '.php', 'modules/' . $f_name_lower . '/models/Model_' . $f_name_lower . '.php');
                copy(FCPATH . '/application/controllers/' . $f_name . '.php', 'modules/' . $f_name . '/controllers/' . $f_name . '.php');
                if (is_dir(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower)) {

                    $this->recurse_copy(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower, 'modules/' . $f_name . '/views/backend/standart/administrator/' . $f_name_lower);
                }
                //unlink('modules/'.$f_name_lower.'/models'.$f_name_lower.'.php' );
            }
        }
    }

    public function  recurse_copy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    function image($mime_type_or_return = 'image/png')
    {
        $file_path = $this->input->get('path');
        $this->helper('file');

        $image_content = read_file($file_path);

        // Image was not found
        if ($image_content === FALSE) {
            show_error('Image "' . $file_path . '" could not be found.');
            return FALSE;
        }

        // Return the image or output it?
        if ($mime_type_or_return === TRUE) {
            return $image_content;
        }

        header('Content-Length: ' . strlen($image_content)); // sends filesize header
        header('Content-Type: ' . $mime_type_or_return); // send mime-type header
        header('Content-Disposition: inline; filename="' . basename($file_path) . '";'); // sends filename header
        exit($image_content); // reads and outputs the file onto the output buffer
    }

    public function create_user()
    {
        for ($i = 0; $i < 30; $i++) {
            $this->aauth->create_user('user' . $i . '@gmail.com', 'admin123', 'user' . $i);
        }
    }

    public function check_qry()
    {
        $this->db->where('id', 1);
        $this->db->query('
        
        SELECT *, 
        count(category_id) y_axis,
        category_name as x_axis
        FROM blog_category
        GROUP BY category_name
        ');
        echo $this->db->last_query();
    }

    public function mailer($limit = 5)
    {
        $this->load->model('mailer/model_mailer');

        $mails = $this->db
            ->select('mailer.*, email.message, email.title')
            ->limit($limit)
            ->join('email', 'email.id = mailer.email_id', 'left')
            ->where('status != "sent    "')
            ->get('mailer')
            ->result();

        $this->load->library('email');

        $this->config_vars = $this->config->item('aauth');

        foreach ($mails as $email) {
            $user = $this->db->get_where('aauth_users', ['email' => $email->mail_to])->row();
            $this->email->from($this->config_vars['email'], $this->config_vars['name']);
            $this->email->to($email->mail_to);
            $title = str_replace(['{username}', '{fullname}', '{email}'], [
                $user->username, $user->full_name, $user->email
            ], $email->title);

            $this->email->subject($title);

            $message = str_replace(['{username}', '{fullname}', '{email}'], [
                $user->username, $user->full_name, $user->email
            ], $email->message);



            $this->email->message($message);
            $result = $this->email->send();

            $status = 'failed';

            if ($result) {
                $status = 'sent';
            }

            $this->model_mailer->change($email->id, ['status' => $status]);
            echo 'email ' . $status . ' ' . $email->mail_to;

            sleep(5);
        }
    }

    public function send_message()
    {

        $emitter = new Emitter("127.0.0.1");
        $emitter->emit('new message', "hello");
    }



    public function batch()
    {
        $batch = [];

        for ($i = 0; $i <= 1000000; $i++) {

            $batch[] = [
                'title' => 'title ' . $i,
                'slug' => 'slug ' . $i,
                'category' => 'category ' . $i,
                'status' => 'publish',
                'author' => '1',
                'created_at' => now(),
            ];

            if ($i % 1000 ==  0) {
                $this->db->insert_batch('blog', $batch);
                $batch = [];
            }
        }
    }
}


/* End of file Web.php */
/* Location: ./application/controllers/Web.php */