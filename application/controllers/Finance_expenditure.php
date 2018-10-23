<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_expenditure extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Finance_expenditure_cms","finance_expenditure");
        $this->auth->is_logged_in() ? :$this->error(401);
        echo "hello world";
    }

    public function get($student_id)
    {
        $this->json($this->finance_expenditure->get($student_id));
    }

    public function create($student_id)
    {
        $this->json($this->finance_expenditure->create($student_id));
    }

    public function edit($student_id)
    {
        $data = $this->input->post();
        $status = $this->finance_expenditure->edit($data, $student_id);
        if ($status == 200){
            $this->json("Edited Succesfully");
        } else {
            $this->error($status);
        }
    }

    public function delete($student_id)
    {
        $status = $this->finance_expenditure->delete($student_id);
        if ($status == 200){
            $this->json("Deleted Succesfully");
        } else {
            $this->error($status);
        }
    }

}