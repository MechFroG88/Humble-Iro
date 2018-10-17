<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_financial_model extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        "student_id" => "required|integer",
        "financial_aid_id" => "required|integer"
    ];

    public function get_by_student_id($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $financial_aid = $this->db->where("student_id", $student_id)
                                  ->where("(status = 1 OR status = 2)")
                                  ->order_by("status", "DESC")
                                  ->select("financial_aid_id, status")
                                  ->get(T_STUDENT_FINANCIALS)
                                  ->result_array();
                                  
        foreach ($financial_aid as &$single_financial_aid){
            $financial_aid_type = $this->db->where("financial_aid_id", $single_financial_aid['financial_aid_id'])
                                           ->select("financial_aid_type")
                                           ->get(T_FINANCIAL_AIDS)
                                           ->row()->financial_aid_type;

            $single_financial_aid['financial_aid_type'] = $financial_aid_type;
        }
        return $financial_aid;
    }

    public function get_by_financial_aid_id($financial_aid_id)
    {
        $this->check_existance($financial_aid_id, "financial_aid_id", T_FINANCIAL_AIDS);
        $student = $this->db->where("financial_aid_id", $financial_aid_id)
                            ->where("(status = 1 OR status = 2)")
                            ->order_by("status", "DESC")
                            ->select("student_id, status")
                            ->get(T_STUDENT_FINANCIALS)
                            ->result_array();

        foreach ($student as &$single_student){
            $cn_name = $this->db->where("student_id", $single_student['student_id'])
                                ->select("cn_name")
                                ->get(T_STUDENTS)
                                ->row()->cn_name;

            $single_student['cn_name'] = $cn_name;
        }

        return $student;
    }

    public function create($data)
    {
        $this->check_existance($data['financial_aid_id'], "financial_aid_id", T_FINANCIAL_AIDS);
        $this->check_existance($data['student_id'], "student_id", T_STUDENTS);
        if ($this->form_validation->validate($this->rules,$data)){
            $student_financial = $this->db->where("financial_aid_id", $data['financial_aid_id'])
                                          ->where("student_id", $data['student_id'])
                                          ->get(T_STUDENT_FINANCIALS)
                                          ->row();

            if (isset($student_financial)){
                $this->db->where("financial_aid_id", $data['financial_aid_id'])
                         ->where("student_id", $data['student_id'])
                         ->where("status", 0)
                         ->set("status", 1)
                         ->update(T_STUDENT_FINANCIALS);
            } else {
                $this->db->insert(T_STUDENT_FINANCIALS, $data);
            }
            return 200;
        } else {
            return 400;
        }
    }

    public function verify($data)
    {
        $this->check_existance($data['financial_aid_id'], "financial_aid_id", T_FINANCIAL_AIDS);
        $this->check_existance($data['student_id'], "student_id", T_STUDENTS);
        if ($this->form_validation->validate($this->rules, $data)){
            $this->db->where("student_id", $data['student_id'])
                     ->where("financial_aid_id", $data['financial_aid_id'])
                     ->set("status", 2)
                     ->update(T_STUDENT_FINANCIALS);
            return 200;
        } else {
            return 400;
        }
    }

    public function delete($data)
    {
        $this->check_existance($data['financial_aid_id'], "financial_aid_id", T_FINANCIAL_AIDS);
        $this->check_existance($data['student_id'], "student_id", T_STUDENTS);
        if ($this->form_validation->validate($this->rules, $data)){
            $this->db->where("student_id", $data['student_id'])
                     ->where("financial_aid_id", $data['financial_aid_id'])
                     ->set("status", 0)
                     ->update(T_STUDENT_FINANCIALS);
            return 200;
        } else {
            return 400;
        }
    }

}