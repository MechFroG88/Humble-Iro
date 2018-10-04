<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aircond_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function get($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $aircond = $this->db->where("student_id", $student_id)
                            ->get(T_AIRCOND);

        unset($aircond['student_id']);
        return $aircond;
    }

    public function edit($data, $student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        if (is_int($data['amount'])){
            $this->check_existance($student_id);
            $this->db->where("student_id", $student_id)
                     ->set("amount", $data['amount'])
                     ->update(T_AIRCOND);

            return 200;
        } else {
            return 400;
        }
    }
}