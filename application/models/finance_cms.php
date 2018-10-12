<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        "remarks"       => "",
        "auto_transfer" => "integer",
        "balance"       => "integer"
    ];

    /**
     * finance details
     * 
     * @var int
     * @return object
     */
    public function get($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $finance = $this->db->where("student_id", $student_id)
                            ->get(T_FINANCES)
                            ->result_array();

        unset($finance['student_id']);
        return $finance;
    }

    /**
     * edit finance details 
     * 
     * @var object|int
     * @var int
     */
    public function edit($data, $student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        if ($this->form_validation->validate($this->rules, $data)){
            foreach ($data as $key => $value){
                $temp_data = [];
                $temp_data['student_id'] = $student_id;
                $temp_data[$key] = $value;
                
                $finance = $this->db->where("student_id", $student_id)
                                    ->get(T_FINANCES)
                                    ->row();

                if (isset($finance)){
                    $this->db->where("student_id", $student_id)
                             ->update(T_FINANCES, $temp_data);
                } else {
                    $this->db->insert(T_FINANCES, $temp_data);
                }
            }
            return 200;
        } else {
            return 400;
        }
    }
}