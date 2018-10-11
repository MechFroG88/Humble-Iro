<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financial_aid_model extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        "supplier" => "required",
        "expired_date"  => "",
        "financial_aid_type" => "",
        "requirements" => ""
    ];

    public function get()
    {
        return $this->db->where("status", 1)
                        ->get(T_FINANCIAL_AID)
                        ->result();
    }

    public function create($data)
    {
        if ($this->form_validation->validate($this->rules,$data)){
            $date_time = DateTime::createFromFormat('d-m-Y', $data['expired_date']);
            $data['expired_date'] = $date_time->format("Y-m-d H:i:s");
            $this->db->insert(T_FINANCIAL_AID, $data);
            return 200;
        } else {
            return 400;
        }
    }

    public function edit($data, $financial_aid_id)
    {
        $this->check_existance($financial_aid_id, "financial_aid_id", T_FINANCIAL_AID);
        if ($this->form_validation->validate($this->rules, $data)){
            $date_time = DateTime::createFromFormat('d-m-Y', $data['expired_date']);
            $data['expired_date'] = $date_time->format("Y-m-d H:i:s");
            $data['updated'] = $this->date();
            $this->db->where("financial_aid_id", $financial_aid_id)
                     ->where("status", 1)
                     ->update(T_FINANCIAL_AID, $data);
        
            return 200;
        } else {
            return 400;
        }
    }

    public function delete($financial_aid_id)
    {
        $this->check_existance($financial_aid_id, "financial_aid_id", T_FINANCIAL_AID);
        $this->db->where("financial_aid_id", $financial_aid_id)
                 ->set("status", 0)
                 ->set("updated", $this->date())
                 ->update(T_FINANCIAL_AID);
        
        return 200;
    }

}