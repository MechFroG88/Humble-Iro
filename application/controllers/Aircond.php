<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aircond extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Aircond_cms","aircond");
        $this->auth->is_logged_in() ? :$this->error(401);
    }

    public function get($student_id)
    {
        $this->json($this->aircond->get($student_id));
    }

    public function edit($student_id)
    {
        $data = $this->input->post();
        $status = $this->aircond->edit($data, $student_id);
        if ($status == 200){
            $this->json("Edited Succesfully");
        } else {
            $this->error($status);
        }
    }

}