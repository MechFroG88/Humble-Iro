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

        foreach ($student_detail as $single_detail){
            $title = $single_detail['title'];
            $value = $single_detail['value'];
            $student->$title = $value;
        }

        return $student;
    }

    public function get_basic()
    {
        $student = $this->db->where("status", 1)
                            ->select("student_id")
                            ->get(T_STUDENTS)
                            ->row();

        $cn_name = $this->db->where("student_id", $student_id)
                            ->or_where("title", "cn_name")
                            ->select("value")
                            ->row();

        isset($cn_name) ? $student->cn_name = $cn_name->cn_name : NULL ;

        $en_name = $this->db->where("student_id", $student_id)
                            ->or_where("title", "en_name")
                            ->select("value")
                            ->row();

        isset($en_name) ? $student->en_name = $en_name->en_name : NULL ;

        $financial_aid_ids = $this->db->where("student_id", $student->$student_id)
                                      ->where("title", "financial_aid")
                                      ->select("value")
                                      ->get(T_STUDENTS_CMS)
                                      ->result_array();

        $financial_aid = [];
        foreach ($financial_aid_ids as $single_financial_aid_id){
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
        if ($this->form_valdiation->validate($this->rules, $data)){
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