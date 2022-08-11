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
		$sliderData = getRows("md5(id) as id, title, title_2,description,date,attachment", "sliders", "1=1");
		$aboutData = getRows("md5(id) as id, content_key, content_value", "contents", "content_key like 'about%'");
        $aboutData = array_column($aboutData, 'content_value', 'content_key');

        $data["courseData"] = $courseData;
        $data["sliderData"] = $sliderData;
        $data["aboutData"] = $aboutData;
		$this->loads("index", $data);

	}

	public function contactUs(){
		$data = [];
		$data["title"] = "Welcome to " . SITENAME;

		$this->loads("contact", $data);

	}
}
