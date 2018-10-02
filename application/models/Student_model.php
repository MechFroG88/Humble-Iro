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

        $student->student  = $this->student($student_id);
        $student->parents  = $this->parent($student_id);
        $student->siblings = $this->sibling($student_id);
        $student->family   = $this->family($student_id);
        $student->finance  = $this->finance($student_id);
        $student->detail   = $this->detail($student_id);

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

    /**
     * student details
     * 
     * @var int
     * @return object
     */
    private function student($student_id)
    {
        $student = $this->db->where("student_id", $student_id)
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
            $student->$title = $value;
        }

        return $student;
    }

    /**
     * parents details
     * 
     * @var int
     * @return array
     */
    private function parent($student_id)
    {
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

        return $parents;
    }

    /**
     * siblings details
     * 
     * @var int
     * @return array
     */
    private function sibling($student_id)
    {
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

        return $siblings;
    }

    /**
     * family details
     * 
     * @var int
     * @return object
     */
    private function family($student_id)
    {
        $family = $this->db->where("student_id", $student_id)
                           ->select("title, value")
                           ->get(T_FAMILY)
                           ->result_array();

        $family_detail = new stdClass;
        foreach ($single_family as $family){
            $title = $single_family['title'];
            $value = $single_family['value'];
            $family_detail->$title = $value; 
        }
        
        return $family_detail;
    }

    /**
     * finance details
     * 
     * @var int
     * @return object
     */
    private function finance($student_id)
    {
        $finance = $this->db->where("student_id", $student_id)
                            ->get(T_FINANCE)
                            ->row();

        unset($finance['student_id']);

        // finance_income
        $finance_income = $this->db->where("student_id", $student_id)
                                   ->select("title, value")
                                   ->get(T_FINANCE_INCOME)
                                   ->result_array();

        foreach ($single_finance_income as $finance_income){
            $member = $single_finance_income['member'];
            $income = $single_finance_income['income'];
            $finance->income->$member = $income;
        }

        // finance_expenditure
        $finance_expenditure = $this->db->where("student_id", $student_id)
                                        ->select("title, value")
                                        ->get(T_FINANCE_EXPENDITURE)
                                        ->result_array();

        foreach ($single_finance_expenditure as $finance_expenditure){
            $object      = $single_finance_expenditure['object'];
            $expenditure = $single_finance_expenditure['expenditure'];
            $finance->expenditure->$object = $expenditure;
        }

        return $finance;
    }

    /**
     * other details
     * 
     * @var int
     * @return object
     */
    private function detail($student_id)
    {
        $detail = new stdClass;

        // aircond
        $aircond = $this->db->where("student_id", $student_id)
                            ->get(T_AIRCOND);

        unset($aircond['student_id']);
        $detail->aircond = $aircond;

        // houses
        $houses = $this->db->where("student_id", $student_id)
                           ->select("house_state, house_type")
                           ->get(T_HOUSES)
                           ->result_array();

        $detail->house = $houses;

        // transport
        $transports = $this->db->where("student_id", $student_id)
                               ->select("transport_type, model, year")
                               ->get(T_TRANSPORT)
                               ->result_array();

        $detail->transport = $transports;

        return $detail;
    }

}