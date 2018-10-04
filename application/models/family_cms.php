<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        'single_reason'     => '',
        'family_size'       => 'integer',
        'working_people'    => 'integer',
        'primary_people'    => 'integer',
        'smk_people'        => 'integer',
        'smp_people'        => 'integer',
        'uni_people'        => 'integer',
        'disabled'          => 'integer',
        'disabled_relation' => 'integer',
        'single_parent'     => 'integer'
    ];

    /**
     * family details
     * 
     * @var int
     * @return object
     */
    public function get_family($student_id)
    {
        $family = $this->db->where("student_id", $student_id)
                           ->select("title, value")
                           ->get(T_FAMILY)
                           ->result_array();

        $family_detail = new stdClass;
        foreach ($family as $single_family){
            $title = $single_family['title'];
            $value = $single_family['value'];
            $family_detail->$title = $value; 
        }
        
        return $family_detail;
    }

    /**
     * family details
     * 
     * @var object|int
     * @return int
     */
    public function edit_family($data, $student_id)
    {
        if ($this->form_validation->validate($this->rules, $data)){
            foreach ($data as $key => $value){
                $temp_data = [];
                $temp_data['student_id'] = $student_id;
                $temp_data['title'] = $key;
                $temp_data['value'] = $value;
                
                $student_cms = $this->db->where("student_id", $student_id)
                                        ->where("title", $key)
                                        ->get(T_FAMILY)
                                        ->row();

                if (isset($student_cms)){
                    $this->db->where("student_id", $student_id)
                             ->where("title", $key)
                             ->update(T_FAMILY, $temp_data);
                } else {
                    $this->db->insert(T_FAMILY, $temp_data);
                }
            }
            return 200;
        } else {
            return 400;
        }
    }
}