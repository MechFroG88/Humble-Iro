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

}