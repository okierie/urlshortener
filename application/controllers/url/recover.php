<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recover extends CI_Controller {
        public function __construct() {
            parent::__construct();
            date_default_timezone_set('Asia/Jakarta');
            $this->load->model('oshort_model','st',TRUE);
        }
        public function index()
	{   
//            echo $r;
            echo "heheheheeh";
	}
        function ads_wait($url){
            
        }
        function langsung($url){
            $wh = array("GenURL" => $url);
            $rec    = $this->st->geturl($wh)->row();
	    $rectracker['IDURL'] = $rec->ID;
	    $rectracker['AccessDate'] = date("Y-m-d H:i:s");
	    $rectracker['AccessIP'] = $this->input->ip_address();
		$this->st->insert_track($rectracker);
            redirect($rec->PlainURL);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
