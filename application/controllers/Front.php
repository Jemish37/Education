<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
	public function loads($view, $data = [])
	{
		$this->load->view('header', $data);
		$this->load->view($view, $data);
		$this->load->view('footer', $data);
	}

	public function index()
	{
		$data = [];
		$data["title"] = "Welcome to " . SITENAME;
		$courseData = getRows("md5(id) as id, name, short_desc,long_desc,date,attachment,duration,price", "courses", "1=1");
        $data["courseData"] = $courseData;
		$this->loads("index", $data);

	}
}
