<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HI_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function date()
    {
            return date("Y-m-d H:i:s");
    }

    public function check_existance($id, $id_name, $table)
    {
        $status = $this->db->where($id_name, $id)
                           ->where("status", 1)
                           ->get($table)
                           ->row();
        
        isset($status) ? NULL : $this->error(404);
    }

}