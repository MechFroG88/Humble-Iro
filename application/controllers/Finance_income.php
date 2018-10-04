<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_income extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Finance_income_cms","finance_income");
        $this->auth->is_logged_in() ? :$this->error(401);
    }

    public function get($student_id)
    {
        $this->json($this->finance_income->get($student_id));
    }

    public function create($student_id)
    {
        $this->json($this->finance_income->create($student_id));
    }

    public function edit($student_id)
    {
        $data = $this->input->post();
        $status = $this->finance_income->edit($data, $student_id);
        if ($status == 200){
            $this->json("Edited Succesfully");
        } else {
            $this->error($status);
        }
    }

    public function delete($student_id)
    {
        $status = $this->finance_income->delete($student_id);
        if ($status == 200){
            $this->json("Deleted Succesfully");
        } else {
            $this->error($status);
        }
    }

}