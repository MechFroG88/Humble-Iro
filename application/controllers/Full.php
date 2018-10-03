<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Full extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Full_model","full");
        $this->auth->is_logged_in() ? :$this->error(401);
    }

    public function get($student_id)
    {
        $this->json($this->full->get($student_id));
    }

}