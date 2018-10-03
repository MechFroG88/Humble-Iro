<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Parent_CMS","parents");
        $this->auth->is_logged_in() ? :$this->error(401);
    }

    public function get($student_id)
    {
        $this->json($this->parents->get($student_id));
    }

    public function get_basic()
    {
        $this->json($this->parents->get_basic());
    }

    public function create($student_id)
    {
        $this->json($this->parents->create($student_id));
    }

    public function edit($student_id)
    {
        $data = $this->input->post();
        $status = $this->parents->edit($data, $student_id);
        if ($status == 200){
            $this->json("Edited Succesfully");
        } else {
            $this->error($status);
        }
    }

    public function delete($student_id)
    {
        $status = $this->parents->delete($student_id);
        if ($status == 200){
            $this->json("Deleted Succesfully");
        } else {
            $this->error($status);
        }
    }

}