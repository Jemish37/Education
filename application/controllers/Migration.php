<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration extends CI_Controller
{
    public function index()
    {
        $this->load->dbforge();

        $strSQL = "CREATE DATABASE IF NOT EXISTS " . DATABASE;
        $query = $this->db->query($strSQL);
        if ($query) {
            echo "Database Created";
        }        
    }
}
