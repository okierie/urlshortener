<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home Extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
        public function __construct() {
            parent::__construct();
//            $this->ini = $inivar;
            date_default_timezone_set('Asia/Jakarta');
            $this->load->model('oshort_model','st',TRUE);
        }
        public function index()
	{   
            $this->load->view('home');
	}
        function shorting(){
            $url    = $this->input->post('url');
            if ($url != NULL){
                $url    = $this->url_validator($url);
                if ($url != "reject"){
		
        	$shortened= $this->randomizer();
		$whplain['PlainURL']= $url;
		$cek_plain= $this->st->geturl($whplain);
			if ($cek_plain->num_rows == 0){
		            $rec    = array(
		                "GenURL"    => $shortened,
		                "PlainURL"  => $url,
		                "URLOwner"  => "-",
				"AddedDate" => date('Y-m-d H:i:s'),
				"AddedIP"   => $this->input->ip_address()
		            );

		            $this->st->insert($rec);
		            $msg['valid']       = "true";
		            $msg['shortened']   = $shortened;
			}else{
		            $msg['valid']       = "true";
		            $msg['shortened']	= $cek_plain->row()->GenURL;				
			}
                }else{
                    $msg['valid']       = "false";
                }
                echo json_encode($msg);
            }
            else{
                redirect($base_url);
            }
        }
        function url_validator($url){
            $banned = array("!","@","#","$","%","^","&","*","(",")","-","_","=","+","\\","/","","?",".",",",";",":","{","}","[","]","|"); 
            $cekhttp = substr($url,0,4);
            if ($cekhttp == "http"){
                $ret    = $url;
            }
            else if(in_array(substr($cekhttp,0,1),$banned)){
                $ret    = "reject";
            }else{
                $ret    = "http://".$url;
            }
            return $ret;
        }
        function randomizer(){
            $length = 5;
            $chars  = "Qw3E2rTy75UiOp84As0D3f1Gh1J3kL9zX8c56Vb4NmW32Rg1YASD345";
            $gen    = "";
          
            for($i=0;$i < 5;$i++){
                $ugen   = rand(1, strlen($chars));
                $str    = substr($chars, $ugen,1);
                $gen = $gen.$str;
            }
//            echo strlen($chars)."|";
		$whgen['GenURL']= $gen;
		$cek_generated	= $this->st->geturl($whgen);
		if ($cek_generated->num_rows() > 0){
			$gen = $this->randomizer();
		}
		else{
            		return $gen;
		}
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
