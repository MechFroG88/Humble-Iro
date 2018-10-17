<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        'cn_name'       => 'required|regex_match[/[\x{4e00}-\x{9fa5}]+/u]',
        'en_name'       => 'required',
        'number'        => 'integer',
        'classroom'     => 'regex_match[/[\x{4e00}-\x{9fa5}]+/u]',
        'contact'       => '',
        'address'       => '',
        'ancestor'      => '',
        'score'         => 'numeric',
        'attitude'      => 'numeric',
        'gender'        => 'integer',
        'ic'            => '',
        'birthdate'     => '',
    ];

    /**
     * student details
     * 
     * @var int
     * @return object
     */
    public function get($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $student = new stdClass;
        $student_detail = $this->db->where("student_id", $student_id)
                                   ->select("title, value")
                                   ->get(T_STUDENT_CMS)
                                   ->result_array();

        foreach ($student_detail as $single_detail){
            $title = $single_detail['title'];
            $value = $single_detail['value'];
            $student->$title = $value;
        }

        return $student;
    }

    public function get_basic($student_id)
    {
        if ($student_id){
            $this->load->model("Student_financial_model", "student_financial");
            $student = new stdClass;
            $student->student_id = $student_id;
            $cn_name = $this->db->where("student_id", $student_id)
                                ->where("title", "cn_name")
                                ->select("value")
                                ->get(T_STUDENT_CMS)
                                ->row();
            $cn_name = isset($cn_name) ? $cn_name->value : "";

            $en_name = $this->db->where("student_id", $student_id)
                                ->where("title", "en_name")
                                ->select("value")
                                ->get(T_STUDENT_CMS)
                                ->row();
            $en_name = isset($en_name) ? $en_name->value : "";

            $classroom = $this->db->where("student_id", $student_id)
                                  ->where("title", "classroom")
                                  ->select("value")
                                  ->get(T_STUDENT_CMS)
                                  ->row();
            $classroom = isset($classroom) ? $classroom->value : "";

            $student->classroom = $classroom;
            $student->cn_name = $cn_name;
            $student->en_name = $en_name;
            $student->financial_aid = $this->student_financial->get_by_student_id($student_id);

            return $student;
        } else {
            $this->load->model("Student_financial_model", "student_financial");
            $student_ids = $this->db->where("status", 1)
                                    ->select("student_id")
                                    ->get(T_STUDENTS)
                                    ->result_array();
            $students = [];
            foreach ($student_ids as $studentss){
                $student = new stdClass;
                $student_id = $studentss['student_id'];
                $student->student_id = $student_id;
                $cn_name = $this->db->where("student_id", $student_id)
                                    ->where("title", "cn_name")
                                    ->select("value")
                                    ->get(T_STUDENT_CMS)
                                    ->row();
            
                $cn_name = isset($cn_name) ? $cn_name->value : "";

                $en_name = $this->db->where("student_id", $student_id)
                                    ->where("title", "en_name")
                                    ->select("value")
                                    ->get(T_STUDENT_CMS)
                                    ->row();

                $en_name = isset($en_name) ? $en_name->value : "";

                $classroom = $this->db->where("student_id", $student_id)
                                      ->where("title", "classroom")
                                      ->select("value")
                                      ->get(T_STUDENT_CMS)
                                      ->row();

                $classroom = isset($classroom) ? $classroom->value : "";

                $student->classroom = $classroom;
                $student->cn_name = $cn_name;
                $student->en_name = $en_name;
                $student->financial_aid = $this->student_financial->get_by_student_id($student_id);
                array_push($students, $student);
            }
            return $students;
        }
    }

    public function create()
    {
        $data = [];
        $data['created'] = $this->date();
        $data['updated'] = $this->date();
        $this->db->insert(T_STUDENTS, $data);
        $student_id = $this->db->insert_id();
        return $student_id;
    }

    /**
     * student details
     * 
     * @var object|int
     * @return int
     */
    public function edit($data, $student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        if ($this->form_validation->validate($this->rules, $data)){
            foreach ($data as $key => $value){
                $temp_data = [];
                $temp_data['student_id'] = $student_id;
                $temp_data['title'] = $key;
                $temp_data['value'] = $value;
                
                $student_cms = $this->db->where("student_id", $student_id)
                                        ->where("title", $key)
                                        ->get(T_STUDENT_CMS)
                                        ->row();

                if (isset($student_cms)){
                    $this->db->where("student_id", $student_id)
                             ->where("title", $key)
                             ->update(T_STUDENT_CMS, $temp_data);
                } else {
                    $this->db->insert(T_STUDENT_CMS, $temp_data);
                }
            }
            return 200;
        } else {
            echo validation_errors();
            return 400;
        }
    }

    public function delete($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $this->db->where("student_id", $student_id)
                 ->set("status", 0)
                 ->update(T_STUDENTS);

        return 200;
    }
}