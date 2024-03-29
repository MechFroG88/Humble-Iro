<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financial_aid_model extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        "supplier" => "",
        "expired_date"  => "",
        "financial_aid_type" => "required",
        "requirements" => ""
    ];

    public function get($financial_aid_id = false)
    {
        if ($financial_aid_id){
            $this->load->model("Student_financial_model", "student_financial");
            $financial_aid = $this->db->where("financial_aid_id", $financial_aid_id)
                                      ->where("status", 1)
                                      ->get(T_FINANCIAL_AIDS)
                                      ->row();
            $time = strtotime($financial_aid->expired_date);
            $financial_aid->expired_date = date('Y-m-d',$time);
            $financial_aid->student = $this->student_financial->get_by_financial_aid_id($financial_aid_id);
        } else {
            $financial_aid = $this->db->where("status", 1)
                                      ->get(T_FINANCIAL_AIDS)
                                      ->result_array();

            foreach($financial_aid as &$single_financial_aid){
                $time = strtotime($single_financial_aid['expired_date']);
                $single_financial_aid['expired_date'] = date('Y-m-d',$time);
            }
        }
        
        return $financial_aid;
    }

    public function create($data)
    {
        if ($this->form_validation->validate($this->rules,$data)){
            if (isset($data_time)){
                $date_time = DateTime::createFromFormat('d-m-Y', $data['expired_date']);
                $data['expired_date'] = $date_time->format("Y-m-d H:i:s");
            } 
            $this->db->insert(T_FINANCIAL_AIDS, $data);
            return 200;
        } else {
            return 400;
        }
    }

    public function edit($data, $financial_aid_id)
    {
        $this->check_existance($financial_aid_id, "financial_aid_id", T_FINANCIAL_AIDS);
        if ($this->form_validation->validate($this->rules, $data)){
            if (isset($data_time)){
                $date_time = DateTime::createFromFormat('d-m-Y', $data['expired_date']);
                $data['expired_date'] = $date_time->format("Y-m-d H:i:s");
            } 
            $this->db->where("financial_aid_id", $financial_aid_id)
                     ->where("status", 1)
                     ->update(T_FINANCIAL_AIDS, $data);
        
            return 200;
        } else {
            return 400;
        }
    }

    public function delete($financial_aid_id)
    {
        $this->check_existance($financial_aid_id, "financial_aid_id", T_FINANCIAL_AIDS);
        $this->db->where("financial_aid_id", $financial_aid_id)
                 ->set("status", 0)
                 ->update(T_FINANCIAL_AIDS);
        
        return 200;
    }

}