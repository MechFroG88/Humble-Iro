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
        'class'         => 'regex_match[/[\x{4e00}-\x{9fa5}]+/u]',
        'contact'       => '',
        'address'       => '',
        'ancestor'      => '',
        'score'         => 'integer',
        'attitude'      => 'integer',
        'photo'         => 'integer',
        'gender'        => 'integer',
        'birthdate'     => '',
        'financial_aid' => '',
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
                                   ->get(T_STUDENTS_CMS)
                                   ->result_array();

        $financial_aid = [];
        foreach ($student_detail as $single_detail){
            $title = $single_detail['title'];
            $value = $single_detail['value'];
            if ($title == "financial_aid"){
                $cn_name = $this->db->where("financial_aid_id", $value)
                                    ->where("status", 1)
                                    ->select("financial_aid_type")
                                    ->get(T_FINANCIAL_AID)
                                    ->row();
                isset($cn_name) ? array_push($financial_aid, $cn_name) : NULL ;
                continue;
            }
            $student->$title = $value;
        }
        $student->financial_aid = $financial_aid;

        return $student;
    }

    public function get_basic()
    {
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
                                ->or_where("title", "cn_name")
                                ->select("value")
                                ->get(T_STUDENTS_CMS)
                                ->row();
        
            $cn_name = isset($cn_name) ? $cn_name->value : "";
            
            $en_name = $this->db->where("student_id", $student_id)
                                ->or_where("title", "en_name")
                                ->select("value")
                                ->get(T_STUDENTS_CMS)
                                ->row();

            $en_name = isset($en_name) ? $en_name->value : "";

            $student->cn_name = $cn_name;
            $student->en_name = $en_name;

            $financial_aid_ids = $this->db->where("student_id", $student_id)
                                          ->where("title", "financial_aid")
                                          ->select("value")
                                          ->get(T_STUDENTS_CMS)
                                          ->result_array();

            $financial_aid = [];
            foreach ($financial_aid_ids as $single_financial_aid_id){
                $cn_name = $this->db->where("financial_aid_id", $single_financial_aid_id['value'])
                                    ->where("status", 1)
                                    ->select("financial_aid_type")
                                    ->get(T_FINANCIAL_AID)
                                    ->row();
            
                if (isset($cn_name)){
                    array_push($financial_aid,$cn_name->financial_aid_type);
                }
            }
            if(!empty($financial_aid)){
                $student->financial_aid = $financial_aid;
            } 
            array_push($students, $student);
        }
        return $students;
    }

    public function create()
    {
        $data = [];
        $data['created'] = $this->date();
        $data['updated'] = $this->date();
        $this->db->insert(T_STUDENTS,$data);
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
                if ($key == "financial_aid"){
                    $this->financial_aid($value, $student_id);
                    continue;
                }
                $temp_data = [];
                $temp_data['student_id'] = $student_id;
                $temp_data['title'] = $key;
                $temp_data['value'] = $value;
                
                $student_cms = $this->db->where("student_id", $student_id)
                                        ->where("title", $key)
                                        ->get(T_STUDENTS_CMS)
                                        ->row();

                if (isset($student_cms)){
                    $this->db->where("student_id", $student_id)
                             ->where("title", $key)
                             ->update(T_STUDENTS_CMS, $temp_data);
                } else {
                    $this->db->insert(T_STUDENTS_CMS, $temp_data);
                }
            }
            return 200;
        } else {
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

    public function financial_aid($value, $student_id)
    {
        $this->db->where("student_id", $student_id)
                 ->where("title", "financial_aid")
                 ->delete(T_STUDENTS_CMS);

        foreach ($value as $single_value){
            $temp_data = [];
            $temp_data['student_id'] = $student_id;
            $temp_data['title'] = "financial_aid";
            $temp_data['value'] = $single_value;

            $this->db->insert(T_STUDENTS_CMS, $temp_data);
        }
    }
}