<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aircond_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        "amount" => "integer"
    ];

    public function get($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $aircond = $this->db->where("student_id", $student_id)
                            ->get(T_AIRCONDS)
                            ->result_array();

        unset($aircond['student_id']);
        return $aircond;
    }

    public function edit($data, $student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        if ($this->form_validation->validate($this->rules,$data)){
            
            $aircond = $this->db->where("student_id", $student_id)
                                ->get(T_AIRCONDS)
                                ->row();
            
            if (isset($aircond)){
                $this->db->where("student_id", $student_id)
                         ->set("amount", $data['amount'])
                         ->update(T_AIRCONDS);
            } else {
                $data['student_id'] = $student_id;
                $this->db->insert(T_AIRCONDS, $data);
            }

            return 200;
        } else {
            return 400;
        }
    }
}