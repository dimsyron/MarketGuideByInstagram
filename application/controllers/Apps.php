<?php
require(FCPATH."/vendor/autoload.php");
use Instagram\Instagram;
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['city'] = $this->dbm->select('location')->result();
		$this->load->view('index', $data);
	}

	function getData()
	{
		sleep(0.5);
		$city = $_POST['city']; 
		if ($city == 0) {
			echo "<b>Data tidak ditemukan.</b>";
		}
		else{
			//$id_location = $this->dbm->select_where("location", "*", "word", $city)->row()->id;
			$db_result = $this->dbm->select_where_order_by("result", "id_location", $city, "count", "desc")->result();
			$result = '
			<div class="col-md-12" style="margin-top:30px">
			<table class="table-bordered" width="100%">
            ';
            $rank = 0;
			foreach ($db_result as $key) {
				$rank++;
				if ($rank <= 5) $b = '<h4>';
				else if ($rank >= 6 && $rank <= 10) $b = '<h5>';
				else $b = '';
				$result.= '
				<tr>
                    <td><center>'.$b.$rank.'</center></td>
                    <td><center>'.$b.$key->tag.'</center></td>
                    <td><center>'.$b.$key->count.'</center></td>
                </tr>
				';
			}
			$result.= '
			</table>
			</div>';
			echo $result;
		}

	}
}