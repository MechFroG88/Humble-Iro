<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_model extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        "title"    => "required",
        "supplier" => "required"
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
            $this->db->insert(T_FINANCIAL_AID, $data);
            return 200;
        } else {
            return 400;
        }
    }

    public function edit($data, $financial_aid_id)
    {
        $finance = $this->db->where("financial_aid_id", $financial_aid_id)
                            ->where("status", 1)
                            ->get(T_FINANCIAL_AID)
                            ->row();

        if (isset($finance) && $this->form_validation->validate($this->rules, $data)){
            $this->db->where("financial_aid_id", $financial_aid_id)
                     ->set("title", $data['title'])
                     ->set("supplier", $data['supplier'])
                     ->update(T_FINANCIAL_AID);
            
            return 200;
        } else {
            return 400;
        }
    }

    public function delete ($financial_aid_id)
    {
        $this->db->where("financial_aid_id", $financial_aid_id)
                 ->set("status", 0)
                 ->update(T_FINANCIAL_AID);
        
        return 200;
    }
}