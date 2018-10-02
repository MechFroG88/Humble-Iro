<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HI_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    private $errors = [
        404 => "Not Found",
        401 => "Unauthorized",
        400 => "Validation error",
        500 => "Internal Server Error"
    ];

    public function json($data, $status = 200)
    {
        $this->output
             ->set_content_type('application/json')
             ->set_status_header($status)
             ->set_output(json_encode([
                 "status" => $status,
                 "data"   => $data
             ]));
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
             ]));
    }

}