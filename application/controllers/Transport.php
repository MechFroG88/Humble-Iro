<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transport extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Transport_CMS","transport");
        $this->auth->is_logged_in() ? :$this->error(401);
    }

    public function get($student_id)
    {
        $this->json($this->transport->get($student_id));
    }

    public function create($student_id)
    {
        $this->json($this->transport->create($student_id));
    }

    public function edit($student_id)
    {
        $data = $this->input->post();
        $status = $this->transport->edit($data, $student_id);
        if ($status == 200){
            $this->json("Edited Succesfully");
        } else {
            $this->error($status);
        }
    }

    public function delete($student_id)
    {
        $status = $this->transport->delete($student_id);
        if ($status == 200){
            $this->json("Deleted Succesfully");
        } else {
            $this->error($status);
        }
    }

}