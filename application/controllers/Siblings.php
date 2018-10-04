<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siblings extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Sibling_CMS","siblings");
        $this->auth->is_logged_in() ? :$this->error(401);
    }

    public function get($student_id)
    {
        $this->json($this->siblings->get($student_id));
    }

    public function get_basic($student_id)
    {
        $this->json($this->siblings->get_basic($student_id));
    }

    public function create($student_id)
    {
        $this->json($this->siblings->create($student_id));
    }

    public function edit($student_id)
    {
        $data = $this->input->post();
        $status = $this->siblings->edit($data, $student_id);
        if ($status == 200){
            $this->json("Edited Succesfully");
        } else {
            $this->error($status);
        }
    }

    public function delete($student_id)
    {
        $status = $this->siblings->delete($student_id);
        if ($status == 200){
            $this->json("Deleted Succesfully");
        } else {
            $this->error($status);
        }
    }

}