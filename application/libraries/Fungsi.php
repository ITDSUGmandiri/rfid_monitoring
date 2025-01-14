<?php error_reporting(0);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fungsi
{

    function __construct()
    {
        $this->CI =& get_instance();
    }
	
	//display registrasi memakai koma
	
	function displayReg($reg) {
			$ret = '';
			// dari tabel anggota
			$ret .= substr($reg,0,2).'.';
			$ret .= substr($reg,2,2).'.';
			$ret .= substr($reg,4,2).'.';
			$ret .= substr($reg,6,4).'.';
			$ret .= substr($reg,10,6);
			return $ret;		
	}
	
	function GetNamaHariByDate($sTanggal){
		
		$day = date('D', strtotime($sTanggal));
    	
			$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
			);
    
			$sHari = $dayList[$day];
			return $sHari;
	}
	
	function urusan($input)
	{
		if($input=='0'){$output='Umum';}
        if($input=='1'){$output='Wajib';}
        if($input=='2'){$output='Pilihan';}
		return $output;
    }
    
	function prioritas($input)
	{
		if($input=='0'){$output='Belum Prioritas';}
        if($input=='1'){$output='Prioritas';}
        if($input=='2'){$output='Sangat Prioritas';}
		return $output;
    }
    
	function jenis($input)
	{
		if($input=='0'){$output='Non Fisik';}
        if($input=='1'){$output='Fisik';}
		return $output;
    }
    
	function status($input)
	{
		if($input=='0'){$output='Tidak Aktif';}
        if($input=='1'){$output='Aktif';}
		return $output;
    }
    
	function sumber_dana($add='0',$swadaya='0',$apbd='0',$lainnya='0')
	{
		if($add=='1'){$output = 'ADD';}else
		if($swadaya=='1'){$output = 'Swadaya';}else
		if($apbd=='1'){$output = 'APBD';}else
		if($lainnya='1'){$output = 'Lainnya';}
		return $output;
    }
    
	function jenis_login($input)
	{
		if($input=='1'){$output='Administrator';}
        if($input=='2'){$output='Bapeda';}
		if($input=='3'){$output='Desa';}
        if($input=='4'){$output='Kecamatan';}
		if($input=='5'){$output='SKPD';}
		return $output;
    }
    
	function centang($input)
	{
		if($input==''){$output='';}
		if($input=='0'){$output='';}
        if($input=='1'){$output='&radic;';}
		return $output;
    }
    
    function bulan($input)
    {
        if($input=='1'){$output='Januari';}
        if($input=='2'){$output='Februari';}
        if($input=='3'){$output='Maret';}
        if($input=='4'){$output='April';}
        if($input=='5'){$output='Mei';}
        if($input=='6'){$output='Juni';}
        if($input=='7'){$output='Juli';}
        if($input=='8'){$output='Agustus';}
        if($input=='9'){$output='September';}
        if($input=='10'){$output='Oktober';}
        if($input=='11'){$output='November';}
        if($input=='12'){$output='Desember';}
        return $output;
    }

	function bulan1($input)
    {
        if($input=='1'){$output='Jan';}
        if($input=='2'){$output='Feb';}
        if($input=='3'){$output='Mar';}
        if($input=='4'){$output='Apr';}
        if($input=='5'){$output='Mei';}
        if($input=='6'){$output='Juni';}
        if($input=='7'){$output='Juli';}
        if($input=='8'){$output='Ags';}
        if($input=='9'){$output='Sep';}
        if($input=='10'){$output='Okt';}
        if($input=='11'){$output='Nov';}
        if($input=='12'){$output='Des';}
        return $output;
    }

    function hari($input)
    {
        if($input=='Sun'){$output='Minggu';}
        if($input=='Mon'){$output='Senin';}
        if($input=='Tue'){$output='Selasa';}
        if($input=='Wed'){$output='Rabu';}
        if($input=='Thu'){$output='Kamis';}
        if($input=='Fri'){$output='Jumat';}
        if($input=='Sat'){$output='Sabtu';}
        return $output;
    }

    function hari2($input)
    {
        if($input=='1'){$output='Minggu';}
        if($input=='2'){$output='Senin';}
        if($input=='3'){$output='Selasa';}
        if($input=='4'){$output='Rabu';}
        if($input=='5'){$output='Kamis';}
        if($input=='6'){$output='Jumat';}
        if($input=='7'){$output='Sabtu';}
        return $output;
    }

    function hari3($input)
    {
        if($input=='1'){$output='Sun';}
        if($input=='2'){$output='Mon';}
        if($input=='3'){$output='Tue';}
        if($input=='4'){$output='Wed';}
        if($input=='5'){$output='Thu';}
        if($input=='6'){$output='Fri';}
        if($input=='7'){$output='Sat';}
        return $output;
    }

    function yyyymmdd_ddmmyyyy_hhmmss($in,$time='',$show_time=true)
    {
        $tgl = substr($in,8,2);
        $bln = substr($in,5,2);
        $thn = substr($in,0,4);

        if($time=='')
        {
            $hour = 0;
            $min = 0;
            $sec = 0;
        }
        else
        {
            //hh:mm:ss
            $hour = substr($time,11,2);
            $min = substr($time,14,2);
            $sec = substr($time,17,2);
        }
        $timestmp = mktime($hour,$min,$sec,$bln,$tgl,$thn);
        $output = $tgl.'-'.$bln.'-'.$thn. ' ' . $hour.':'.$min.':'.$sec;
        return $output;
    }

	function tanggals($in,$time='',$show_time=true)
    {
        $tgl = substr($in,8,2);
        $bln = substr($in,5,2);
        $thn = substr($in,0,4);
        if($time=='')
        {
            $hour = 0;
            $min = 0;
            $sec = 0;
        }
        else
        {
            $hour = substr($time,0,2);
            $min = substr($time,3,2);
            $sec = substr($time,6,2);
        }
        $timestmp = mktime($hour,$min,$sec,$bln,$tgl,$thn);
        $output = $this->hari(date('D',$timestmp)).', '.$tgl.' '.$this->bulan($bln).' '.$thn;
        return $output;
    }

    function tanggal($in,$time='',$show_time=true)
    {
        $tgl = substr($in,8,2);
        $bln = substr($in,5,2);
        $thn = substr($in,0,4);
        if($time=='')
        {
            $hour = 0;
            $min = 0;
            $sec = 0;
        }
        else
        {
            $hour = substr($time,0,2);
            $min = substr($time,3,2);
            $sec = substr($time,6,2);
        }
        $timestmp = mktime($hour,$min,$sec,$bln,$tgl,$thn);
        $output = $this->hari(date('D',$timestmp)).', '.$tgl.' '.$this->bulan($bln).' '.$thn;
        if($show_time) $output .= ' pukul '.$hour.'.'.$min;
        return $output;
    }

    function tanggal2($timestamp)
    {
        $tgl = date('d',$timestamp);
        $bln = date('n',$timestamp);
        $thn = date('Y',$timestamp);
        $hari = date('D',$timestamp);
        $output = $this->hari($hari).", ".$tgl." ".$this->bulan($bln)." ".$thn." pukul ".date('G:i',$timestamp);
        return $output;
    }

    function tanggal3($in)
    {
        $tgl = substr($in,8,2);
        $bln = substr($in,5,2);
        $thn = substr($in,0,4);
        $output = $tgl.' '.$this->bulan($bln).' '.$thn;
        return $output;
    }

	function tanggal4($in)
    {
        $bln = substr($in,5,2);
        $thn = substr($in,0,4);
        $output = $this->bulan($bln).' '.$thn;
        return $output;
    }
	
    function tanggal_jurnal($in)
    { 
        $out[]=$this->bulan(substr($in,5,2)).' '.substr($in,0,4);
        $out[]=substr($in,8,2);
        return $out;
    }
	
    function date_to_tanggal($in)
    {
        $tgl = substr($in,8,2);
        $bln = substr($in,5,2);
        $thn = substr($in,0,4);
        if(checkdate($bln,$tgl,$thn))
        {
           $out=substr($in,8,2)." ".$this->bulan(substr($in,5,2))." ".substr($in,0,4);
        }
        else
        {
           $out = "<span class='error'>-error-</span>";
        }
        return $out;
    }
	
    function pecah($uang,$delimiter='.',$kurung=false)
    {
        if($uang == '' || $uang == 0)
        {
            $rupiah = '0';
            return $rupiah;
        }
        $neg = false;
        if($uang<0)
        {
            $neg = true;
            $uang = abs($uang);
        }
        $rupiah = number_format($uang,0,',',$delimiter);
        if($neg && $kurung)
        {
            $rupiah = '('.$rupiah.')';
        }
        return $rupiah;
    }
	
	function complete($in,$max)
    {
        $len = $max;
        $len_in = strlen($in);
        $zero_len = $len - $len_in;
        $zero = "";
        for($i=1;$i<=$zero_len;$i++)
        {
            $zero .= '0';
        }
        return $zero.$in;
    }
	
    function build_select_time($name,$edit='')
    {
        $select = '<select name="'.$name.'">';
        for($i=0;$i<=23;$i++)
        {
            for($j=0;$j<=30;$j+=30)
            {
                $selected = '';
                $c_hour = $this->complete($i,2);
                $c_min = $this->complete($j,2);
                if($edit!='')
                {
                    if($edit==($c_hour.':'.$c_min.':00'))
                    {
                        $selected = 'selected="selected"';
                    }
                }
                $select .= '<option '.$selected.' value="'.$c_hour.':'.$c_min.'">'.$c_hour.':'.$c_min.'</option>';
            }
        }
        $select .= '</select>';
        return $select;
    }
	
    function build_select_weekly($name,$edit='')
    {
        $select = '<select name="'.$name.'">';
        $select .= '<option value="">- pilih -</option>';
        for($j=1;$j<=7;$j++)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$this->hari3($j))
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$this->hari3($j).'">'.$this->hari2($j).'</option>';
        }
        $select .= '</select>';
        return $select;
    }
	
    function build_select_monthly($name,$edit='')
    {
        $select = '<select name="'.$name.'">';
        $select .= '<option value="">- pilih -</option>';
        for($j=1;$j<=31;$j++)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$j)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$j.'">'.$j.'</option>';
        }
        $select .= '</select>';
        return $select;
    }
	
    function build_select_date($start,$finish,$name,$extra='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
        for($j=$start;$j<=$finish;$j++)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$j)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$j.'">'.$j.'</option>';
        }
        $select .= '</select>';
        return $select;
    }
	
	function build_select_month($name,$extra='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
        for($j=1;$j<=12;$j++)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$j)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$this->complete($j,2).'">'.$this->bulan($j).'</option>';
        }
        $select .= '</select>';
        return $select;
    }

	function build_select_month_plus($name,$extra='',$awalan='',$akhiran='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
		if($awalan != '')
		{
			$select .= '<option value="">'.$awalan.'</option>';
		}
        for($j=1;$j<=12;$j++)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$j)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$this->complete($j,2).'">'.$this->bulan($j).'</option>';
        }
		if($akhiran != '')
		{
			$select .= '<option value="0">'.$akhiran.'</option>';
		}
        $select .= '</select>';
        return $select;
    }

	function build_select_years($start,$end,$name,$extra='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
        for($j=$start;$j<=$end;$j++)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$j)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$j.'">'.$j.'</option>';
        }
        $select .= '</select>';
        return $select;
    }

    function build_select_year($start,$name,$extra='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
        for($j=date('Y');$j>=$start;$j--)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$j)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$j.'">'.$j.'</option>';
        }
        $select .= '</select>';
        return $select;
    }

	function build_select_year_next($end,$name,$extra='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
        for($j=$end;$j>=date('Y');$j--)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$j)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$j.'">'.$j.'</option>';
        }
        $select .= '</select>';
        return $select;
    }

	function build_select_year_plus($start,$name,$extra='',$awalan='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
		if($awalan != '')
		{
			$select .= '<option value="">'.$awalan.'</option>';
		}
        for($j=date('Y');$j>=$start;$j--)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$j)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$j.'">'.$j.'</option>';
        }
        $select .= '</select>';
        return $select;
    }

    function build_select_common($name,$dbobj,$extra='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
        foreach($dbobj as $key => $value)
        {
            $selected = '';
			if($edit!='')
            {
                if($edit==$key)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
        }
        $select .= '</select>';
        return $select;
    }

	function build_select_common_plus($name,$dbobj,$extra='',$awalan='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
		if($awalan != '')
		{
			$select .= '<option value="0">'.$awalan.'</option>';
		}
        foreach($dbobj as $key => $value)
        {
            $selected = '';
			if($edit!='')
            {
                if($edit==$key)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$key.'">'.$value.'</option>';
        }
        $select .= '</select>';
        return $select;
    }

    function array_delete($array,$keys)
    {
        $tmp_array = array();
        if(is_string($keys))
        {
            $keys_to_be_deleted = array($keys);
        }
        elseif(is_array($keys))
        {
            $keys_to_be_deleted = $keys;
        }
        else
        {
            return $array;
        }
        foreach($array as $key=>$val)
        {
            if(!in_array($key,$keys_to_be_deleted))
            {
                $tmp_array[$key] = $val;
            }                
        }
        return $tmp_array;
    }

    function get_post($keys)
    {
        foreach($keys as $val)
        {
            $inp = $this->CI->input->post($val);
            $inp = trim($inp);
            $data[$val] = $inp;
        }
        return $data;
    }

    function fixtime($time)
    {
        $timespan = timespan($time);
        if(stristr($timespan,'hari'))
        {
            return $this->tanggal2($time);
        }
        return $timespan.' yang lalu';
    }

    function display_gravatar($email)
    {
        $gravatarMd5 = md5($email);
        return '<img src="http://www.gravatar.com/avatar/'.$gravatarMd5.'" alt="" width="35" height="35" />';
    }
    function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array())
    {
	$first_of_month = gmmktime(0,0,0,$month,1,$year);
	#remember that mktime will automatically correct if invalid dates are entered
	# for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
	# this provides a built in "rounding" feature to generate_calendar()

	$day_names = array(); #generate all the day names according to the current locale
	for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) #January 4, 1970 was a Sunday
		$day_names[$n] = ucfirst(gmstrftime('%A',$t)); #%A means full textual day name

	list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
	$weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day
	$title   = htmlentities(ucfirst($month_name)).'&nbsp;'.$year;  #note that some locales don't capitalize month and day names

	#Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03
	@list($p, $pl) = each($pn); @list($n, $nl) = each($pn); #previous and next links, if applicable
	if($p) $p = '<span class="calendar-prev">'.($pl ? '<a href="'.htmlspecialchars($pl).'">'.$p.'</a>' : $p).'</span>&nbsp;';
	if($n) $n = '&nbsp;<span class="calendar-next">'.($nl ? '<a href="'.htmlspecialchars($nl).'">'.$n.'</a>' : $n).'</span>';
	$calendar = '<div class="calendar"><table class="cal_bottom" style="border-top:1px solid #777777;">'."\n<tr class=day_title>";

	if($day_name_length){ #if the day names should be shown ($day_name_length > 0)
		#if day_name_length is >3, the full name of the day will be printed
		foreach($day_names as $d)
			$calendar .= '<th abbr="'.htmlentities($d).'">'.htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d).'</th>';
		$calendar .= "</tr>\n<tr class='day'>";
	}

	if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days
	for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
		if($weekday == 7){
			$weekday   = 0; #start a new week
			$calendar .= "</tr>\n<tr class='day'>";
		}
		if(isset($days[$day]) and is_array($days[$day])){
			@list($link, $classes, $content) = $days[$day];
			if(is_null($content))  $content  = $day;
			$calendar .= '<td'.($classes ? ' class="'.htmlspecialchars($classes).'">' : '>').
				($link ? '<a href="'.htmlspecialchars($link).'">'.$content.'</a>' : $content).'</td>';
		}
		else $calendar .= "<td>$day</td>";
	}
	if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>'; #remaining "empty" days

	return $calendar."</tr>\n</table></div>\n";
    }
    function accept_data($value)
    {
        foreach($value as $key => $val)
        {	
            $data[$val]  = $this->CI->input->post($val,TRUE);
            if(!is_array($data[$val]))
            {
                $data[$val]     = strip_image_tags($data[$val]);
                $data[$val]     = quotes_to_entities($data[$val]);
                $data[$val]     = encode_php_tags($data[$val]);
                $data[$val]     = trim($data[$val]);
            }
        }		
        return $data;
    }

    function warning($input,$goTo='')
    {
        if($goTo=='')
        {
           $goTo = site_url().'/home';
        }
        $output="<script> 
                alert(\"$input\");
                location = '$goTo';
            </script>";
        return $output;
    }

	function warnings($input,$goTo='')
    {
        $output="<script> 
                alert(\"$input\");
            </script>";
        return $output;
    }

	function warningss($input,$add='')
    {
        $output="<script> 
                alert(\"$input\");$add
            </script>";
        return $output;
    }
	
	function catat($kegiatan,$awal ='',$isData=false)
	{

        $this->CI->load->database();
        if($isData)
        {
            $gab='';
            foreach($kegiatan as $key=>$val):
                if($val==''){ $val='kosong';}
                $keg='<li><b>'.$key.'</b> dengan value <b>'.$val.'</b></li>';
                $gab=$gab.$keg;
            endforeach;
            $str = $awal.'<br />
                <ul>'.$gab.'</ul>';
        }
        else
        {
            $str = $kegiatan;
        }

        $ip = isset($_SERVER['HTTP_X_FORWARDED_FOR'])
            ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
        $ip_name = gethostbyaddr ( $ip );//masuk ke server
        $waktu=date('Y-m-d H:i:s');
        $creator=$this->CI->session->userdata('username');

        if($creator == ''){ $creator = 'Tamu';}	
        //catat ke log
        $this->CI->db->insert('catatan',array('ip'=>$ip,
                                            'server'=>$ip_name,
                                            'user'=>$creator,
                                            'kegiatan'=>$str,
                                            'waktu'=>$waktu));
        //if(!$act){ echo mysql_error();}
        
	}
	
	function indonesian_date($timestamp = '', $date_format = '', $suffix = '') 
	{
    
		if (trim ($timestamp) == '')
		{
			$timestamp = time ();
		}
		elseif (!ctype_digit ($timestamp))
		{
			$timestamp = strtotime ($timestamp);
		}
    
		# remove S (st,nd,rd,th) there are no such things in indonesia :p
		$date_format = preg_replace ("/S/", "", $date_format);
		$pattern = array(
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
		);
		
		$replace = array('Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','September',
        'Oktober','November','Desember',
		);
		
		$date = date ($date_format, $timestamp);
		$date = preg_replace ($pattern, $replace, $date);
		$date = "{$date} {$suffix}";
		return $date;
	
    }
    
    function tanggal_indo($tanggal, $cetak_hari = false)
    {
        $hari = array (1 => 'Senin',
                    'Selasa',
                    'Rabu',
                    'Kamis',
                    'Jumat',
                    'Sabtu',
                    'Minggu'
                );
                
        $bulan = array (1 => 'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );

        $split 	  = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        
        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }

        return $tgl_indo;

    }

    function date2mysql($tgl) {
        $tgl = explode("/", $tgl);
        if (empty($tgl[2]))
            return "";
        $news = "$tgl[2]-$tgl[1]-$tgl[0]";
        return $news;
    }

    function datefmysql($tgl) {
        if ($tgl == '' || $tgl == null) {
            return "";
        } else {
            $tgl = explode("-", $tgl);
            $new = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
            return $new;
        }
    }

    function currencyToNumber($a) {
        return str_ireplace(".", "", $a);
    }
	
}