<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Finance_cms","finance");
        $this->auth->is_logged_in() ? :$this->error(401);
    }

    public function get($student_id)
    {
        $this->json($this->finance->get($student_id));
    }

    public function edit($student_id)
    {
        $data = $this->input->post();
        $status = $this->finance->edit($data, $student_id);
        if ($status == 200){
            $this->json("Edited Succesfully");
        } else {
            $this->error($status);
        }
    }

}