<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($student_id)
    {
        $student = new stdClass;

        // student_detail
        $student->student = $this->db->where("student_id", $student_id)
                                     ->where("status", 1)
                                     ->select("cn_name, en_name, number, class")
                                     ->get(T_STUDENTS)
                                     ->row();

        $student_detail = $this->db->where("student_id", $student_id)
                                   ->select("title, value")
                                   ->get(T_STUDENTS_CMS)
                                   ->result_array();

        foreach ($single_detail as $student_detail){
            $title = $single_detail['title'];
            $value = $single_detail['value'];
            $student->student->$title = $value;
        }

        // parents_detail
        $parent_ids = $this->db->where("student_id", $student_id)
                               ->get(T_PARENTS)
                               ->result_array();
        $parents = [];
        foreach ($single_parent as $parent_ids){
            $parent_id = $single_parent['parent_id'];
            $parent_detail = $this->db->where("parent_id", $parent_id)
                                      ->select("title, value")
                                      ->get(T_PARENTS_CMS)
                                      ->result_array();

            $parent = [];
            foreach ($single_parent_detail as $parent_detail){
                $title = $single_parent_detail['title'];
                $value = $single_parent_detail['value'];
                $parent[$title] = $value;
            }
            array_push($parents, $parent);
        }
        $student->parents = $parents;

        // siblings detail
        $sibling_ids = $this->db->where("student_id", $student_id)
                                ->get(T_SIBLINGS)
                                ->result_array();
        $siblings = [];
        foreach ($single_sibling as $siblings_ids){
            $sibling_id = $single_sibling['sibling_id'];
            $sibling_detail = $this->db->where("sibling_id", $sibling_id)
                                       ->select("title, value")
                                       ->get(T_SIBLINGS_CMS)
                                       ->result_array();
            
            $sibling = [];
            foreach ($single_sibling_detail as $sibling_detail){
                $title = $single_sibling_detail['title'];
                $value = $single_sibling_detail['value'];
                $sibling[$title] = $value;
            }
            array_push($siblings, $sibling);
        }
        $student->siblings = $siblings;

        // family detail
        $student->family = NULL;
        $family = $this->db->where("student_id", $student_id)
                           ->select("title, value")
                           ->get(T_FAMILY)
                           ->result_array();

        foreach ($single_family as $family){
            $title = $single_family['title'];
            $value = $single_family['value'];
            $student->family->$title = $value; 
        }

        // finance
        $finance = $this->db->where("student_id", $student_id)
                            ->get(T_FINANCE)
                            ->row();

        unset($finance['student_id']);
        $student->finance = $finance;

        // finance_income
        $finance_income = $this->db->where("student_id", $student_id)
                                   ->select("title, value")
                                   ->get(T_FINANCE_INCOME)
                                   ->result_array();

        foreach ($single_finance_income as $finance_income){
            $member = $single_finance_income['member'];
            $income = $single_finance_income['income'];
            $student->finance->income->$member = $income;
        }

        // finance_expenditure
        $finance_expenditure = $this->db->where("student_id", $student_id)
                                        ->select("title, value")
                                        ->get(T_FINANCE_EXPENDITURE)
                                        ->result_array();

        foreach ($single_finance_expenditure as $finance_expenditure){
            $object      = $single_finance_expenditure['object'];
            $expenditure = $single_finance_expenditure['expenditure'];
            $student->finance->expenditure->$object = $expenditure;
        }

        // details
        $student->detail = NULL;

        // aircond
        $aircond = $this->db->where("student_id", $student_id)
                            ->get(T_AIRCOND);

        unset($aircond['student_id']);
        $student->detail->aircond = $aircond;

        // houses
        $houses = $this->db->where("student_id", $student_id)
                           ->select("house_state, house_type")
                           ->get(T_HOUSES)
                           ->result_array();

        $student->detail->house = $houses;

        // transport
        $transports = $this->db->where("student_id", $student_id)
                               ->select("transport_type, model, year")
                               ->get(T_TRANSPORT)
                               ->result_array();

        $student->detail->transport = $transports;

        return $student;
    }

    public function get_basic()
    {
        $student = $this->db->where("status", 1)
                            ->select("student_id, cn_name, en_name")
                            ->get(T_STUDENTS)
                            ->row();

        $financial_aid_ids = $this->db->where("student_id", $student->$student_id)
                                      ->where("title", "financial_aid")
                                      ->select("value")
                                      ->get(T_STUDENTS_CMS)
                                      ->result_array();

        $financial_aid = [];
        foreach ($single_financial_aid_id as $financial_aid_ids){
            $cn_name = $this->db->where("financial_aid_id", $single_financial_aid_id)
                                ->where("status", 1)
                                ->select("title")
                                ->get(T_FINANCIAL_AID)
                                ->row();

            if (isset($cn_name)){
                array_push($financial_aid,$cn_name->title);
            }
        }
        $student->financial_aid = $financial_aid;

        return $student;
    }

    public function create($data)
    {

    }

    public function edit($data)
    {
        
    }

    public function delete($student_id)
    {
        $this->db->where("student_id", $student_id)
                 ->set("status", 0)
                 ->update(T_STUDENTS);

        return 200;
    }

}