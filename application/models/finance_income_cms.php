<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_income_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        "finance_income_id" => "required|integer",
        "member" => "required",
        "income" => "required|numeric"
    ];

    /**
     * finance_income details
     * 
     * @var int
     * @return array
     */
    public function get($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $finance_income_ids = $this->db->where("student_id", $student_id)
                                            ->where("status", 1)
                                            ->get(T_FINANCE_INCOMES)
                                            ->result_array();
        $finance_incomes = [];
        foreach ($finance_income_ids as $single_finance_income){
            $finance_income_id = $single_finance_income['finance_income_id'];
            $finance_income_detail = $this->db->where("finance_income_id", $finance_income_id)
                                                   ->select("member, income")
                                                   ->get(T_FINANCE_INCOME_CMS)
                                                   ->result_array();

            $finance_income = [];
            foreach ($finance_income_detail as $single_finance_income_detail){
                $member = $single_finance_income_detail['member'];
                $income = $single_finance_income_detail['income'];
                $finance_income[$member] = $income;
            }
            $finance_income['finance_income_id'] = $finance_income_id;
            array_push($finance_incomes, $finance_income);
        }

        return $finance_incomes;
    }

    /**
     * create finance_income
     * 
     * @var int
     * @return int
     */
    public function create($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $this->db->set("student_id", $student_id)
                 ->insert(T_FINANCE_INCOMES);

        $finance_income_id = $this->db->insert_id();
        return $finance_income_id;
    }

/**
     *  edit finance_income detail
     * 
     * @var member|int
     * @return int
     */
    public function edit($data, $student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        foreach ($data as $single_data){
            if ($this->form_validation->validate($this->rules, $single_data)){
                $finance_income_id = $single_data['finance_income_id'];
                $this->check_existance($finance_income_id, "finance_income_id", T_FINANCE_INCOMES);
                $finance_income_cms = $this->db->where("finance_income_id", $finance_income_id)
                                                    ->where("member", $single_data['member'])
                                                    ->get(T_FINANCE_INCOME_CMS)
                                                    ->row();
                if (isset($finance_income_cms)){
                    $this->db->where("finance_income_id", $finance_income_id)
                             ->where("member", $single_data['member'])
                             ->update(T_FINANCE_INCOME_CMS, $single_data);
                } else {
                    $this->db->insert(T_FINANCE_INCOME_CMS, $single_data);
                }
            } else {
                return 400;
            }
        }
        return 200;
    }

    /**
     * Delete finance_income
     * 
     * @var int
     * @return int
     */
    public function delete($finance_income_id)
    {
        $this->check_existance($finance_income_id, "finance_income_id", T_FINANCE_INCOMES);
        $this->db->where("finance_income_id", $finance_income_id)
                 ->set("status", 0)
                 ->update(T_FINANCE_INCOMES);

        return 200;
    }
}