<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_financial extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Student_financial_model","student_financial");
        $this->auth->is_logged_in() ? :$this->error(401);
    }

    public function create()
    {
        $data = $this->input->post();
        $status = $this->student_financial->create($data);
        if ($status == 200){
            $this->json("Added Succesfully");
        } else {
            $this->error($status);
        }
    }

    public function verify()
    {
        $data = $this->input->post();
        $status = $this->student_financial->verify($data);
        if ($status == 200){
            $this->json("Verified Succesfully");
        } else {
            $this->error($status);
        }
    }

    public function delete()
    {
        $data = $this->input->post();
        $status = $this->student_financial->delete($data);
        if ($status == 200){
            $this->json("Delete Succesfully");
        } else {
            $this->error($status);
        }
    }

}