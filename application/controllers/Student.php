<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Student_cms","student");
        $this->auth->is_logged_in() ? :$this->error(401);
    }

    public function get($student_id)
    {
        $this->json($this->student->get($student_id));
    }

    public function get_current()
    {
        $this->json($this->student->get_current());
    }

    public function get_basic()
    {
        $this->json($this->student->get_basic());
    }
    
    public function create()
    {
        $this->json($this->student->create());
    }

    public function edit($student_id)
    {
        $data = $this->input->post();
        $status = $this->student->edit($data, $student_id);
        if ($status == 200){
            $this->json("Edited Successfully");
        } else {
            $this->error($status);
        }
    }

    public function delete($student_id)
    {
        $status = $this->student->delete($student_id);
        if ($status == 200){
            $this->json("Deleted Successfully");
        } else {
            $this->error($status);
        }
    }

}