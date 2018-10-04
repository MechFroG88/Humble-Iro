<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financial_aid extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Financial_aid_model","finance");
        $this->auth->is_logged_in() ? :$this->error(401);
    }

    public function get()
    {
        $this->json($this->finance->get());
    }

    public function create()
    {
        $data = $this->input->post();
        $status = $this->finance->create($data);
        if ($status == 200){
            $this->json('Added successfully');
        } else {
            $this->error($status);
        }
    }

    public function edit($finance_aid_id)
    {
        $data = $this->input->post();
        $status = $this->finance->edit($data, $finance_aid_id);
        if ($status == 200){
            $this->json('Edited successfully');
        } else {
            $this->error($status);
        }
    }

    public function delete($finance_aid_id)
    {
        $status = $this->finance->delete($finance_aid_id);
        if ($status == 200){
            $this->json('Deleted successfully');
        } else {
            $this->error($status);
        }
    }

}