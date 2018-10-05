<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_expenditure_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        "finance_expenditure_id" => "required|integer",
        "object" => "required",
        "expenditure" => "required|numeric"
    ];

    /**
     * finance_expenditure details
     * 
     * @var int
     * @return array
     */
    public function get($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $finance_expenditure_ids = $this->db->where("student_id", $student_id)
                                            ->where("status", 1)
                                            ->get(T_FINANCE_EXPENDITURE)
                                            ->result_array();
        $finance_expenditures = [];
        foreach ($finance_expenditure_ids as $single_finance_expenditure){
            $finance_expenditure_id = $single_finance_expenditure['finance_expenditure_id'];
            $finance_expenditure_detail = $this->db->where("finance_expenditure_id", $finance_expenditure_id)
                                                   ->select("object, expenditure")
                                                   ->get(T_FINANCE_EXPENDITURE_CMS)
                                                   ->result_array();

            $finance_expenditure = [];
            foreach ($finance_expenditure_detail as $single_finance_expenditure_detail){
                $object = $single_finance_expenditure_detail['object'];
                $expenditure = $single_finance_expenditure_detail['expenditure'];
                $finance_expenditure[$object] = $expenditure;
            }
            $finance_expenditure['finance_expenditure_id'] = $finance_expenditure_id;
            array_push($finance_expenditures, $finance_expenditure);
        }

        return $finance_expenditures;
    }

    /**
     * create finance_expenditure
     * 
     * @var int
     * @return int
     */
    public function create($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $this->db->set("student_id", $student_id)
                 ->insert(T_FINANCE_EXPENDITURE);

        $finance_expenditure_id = $this->db->insert_id();
        return $finance_expenditure_id;
    }

/**
     *  edit finance_expenditure detail
     * 
     * @var object|int
     * @return int
     */
    public function edit($data, $student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        foreach ($data as $single_data){
            if ($this->form_validation->validate($this->rules, $single_data)){
                $finance_expenditure_id = $single_data['finance_expenditure_id'];
                $this->check_existance($finance_expenditure_id, "finance_expenditure_id", T_FINANCE_EXPENDITURE);
                $finance_expenditure_cms = $this->db->where("finance_expenditure_id", $finance_expenditure_id)
                                                    ->where("object", $single_data['object'])
                                                    ->get(T_FINANCE_EXPENDITURE_CMS)
                                                    ->row();
                if (isset($finance_expenditure_cms)){
                    $this->db->where("finance_expenditure_id", $finance_expenditure_id)
                             ->where("object", $single_data['object'])
                             ->update(T_FINANCE_EXPENDITURE_CMS, $single_data);
                } else {
                    $this->db->insert(T_FINANCE_EXPENDITURE_CMS, $single_data);
                }
            } else {
                return 400;
            }
        }
        return 200;
    }

    /**
     * Delete finance_expenditure
     * 
     * @var int
     * @return int
     */
    public function delete($finance_expenditure_id)
    {
        $this->check_existance($finance_expenditure_id, "finance_expenditure_id", T_FINANCE_EXPENDITURE);
        $this->db->where("finance_expenditure_id", $finance_expenditure_id)
                 ->set("status", 0)
                 ->update(T_FINANCE_EXPENDITURE);

        return 200;
    }
}