<?php
require(FCPATH."/vendor/autoload.php");
use Instagram\Instagram;
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		redirect(base_url('apps'));
	}

	function wordJoin()
	{
		$word = $this->dbm->select('base')->result();
		foreach ($word as $key) {
			$word = $key->word;
			$id_base = $key->id;
			$city = $this->dbm->select('location')->result();
			foreach ($city as $key2) {
				$id_location = $key2->id;
				$city = $key2->word;
				$join = $word.$city;
				$tag = $join;
				$data = array(
					'id_base' => $id_base, 
					'id_location' => $id_location, 
					'tag' => $tag, 
					'is_checked' => "No" 
					);
				$last_id = $this->dbm->insert_last_id("result", $data);
				echo $last_id." Your words has joined, >> ".$join."<br>";
			}
		}
	}

	function getTagCountOne()
	{
		ini_set('max_execution_time', 3000);
		$instagram = new instagram();
		$instagram->setVerifyPeer(false);
    $instagram->login("goodlovelycoolyes", "jogja2016");

    //$resultTag = $this->dbm->select("result")->result();
    $resultTag = $this->dbm->select_where("result", "*", "is_checked", "0")->result();
    foreach ($resultTag as $key) {
    	$id = $key->id;
    	$tag = $key->tag;
    	//$count = $this->getTagInfo($tag);

    $tagInfo = $instagram->searchTags($tag, "");
    $tagResult = $tagInfo->getResults();
    $data_result = json_encode($tagResult);

    	$data = array(
    		'is_checked' => "Yes", 
    		//'count' => $count 
    		'data_result' => $data_result
    		);
    	$this->dbm->update("result", $id, $data);
    	echo $key->id." Success to get count for tags >> ".$tag."---\n";
    	//sleep(rand(1,5));
    }
	}

	function getTagCount()
	{
		ini_set('max_execution_time', 3000);
	    //$resultTag = $this->dbm->select("result")->result();
	    $resultTag = $this->dbm->select_where("result", "*", "is_checked", "0")->result();
	    foreach ($resultTag as $key) {
	    	$id = $key->id;
	    	$tag = $key->tag;
	    	$count = $this->getTagInfo($tag);
	    	$data_result = $count;
	    	$data = array(
	    		'is_checked' => "Yes", 
	    		//'count' => $count 
	    		'data_result' => $data_result
	    		);
	    	$this->dbm->update("result", $id, $data);
	    	echo $key->id." Success to get count for tags >> ".$tag."---\n";
	    	sleep(rand(20,40));
	    }
	}

	function getTagInfo($tag)
	{
		set_time_limit(0);
		$instagram = new instagram();
		$instagram->setVerifyPeer(false);
	    $instagram->login("goodlovelycoolyes", "jogja2016");
	    $tagInfo = $instagram->searchTags($tag, "");
	    $tagResult = $tagInfo->getResults();
	    $data_result = json_encode($tagResult);

	    return $data_result;
	}

	function setToArray()
	{
		$no = 0;
		$tb_result = $this->dbm->select('result')->result();
		foreach ($tb_result as $key) {
			$no++;
			$data_result = json_decode($key->data_result);	
			echo $no.$data_result[0]->media_count."<br>";
			$data = array(
    		'count' => $data_result[0]->media_count 
    		);
    	$this->dbm->update("result", $key->id, $data);
		}
	}

}
