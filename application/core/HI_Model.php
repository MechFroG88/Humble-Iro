<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HI_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    private $errors = [
        404 => "Not Found",
        401 => "Unauthorized",
        400 => "Validation error",
        500 => "Internal Server Error"
    ];

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

    public function error($status, $data = '')
    {
        $this->output
             ->set_content_type('application/json')
             ->set_status_header($status)
             ->set_output(json_encode([
                 "status"  => $status,
                 "message" => $this->errors[$status],
                 "errors"  => $data
             ]))
             ->_display();
        exit;
    }

}