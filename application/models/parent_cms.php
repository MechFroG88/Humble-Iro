<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parent_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        'parent_id'    => 'required|integer',
        'cn_name'      => 'regex_match[/[\x{4e00}-\x{9fa5}]+/u]',
        'en_name'      => '',
        'age'          => 'integer',
        'contact'      => '',
        'occupation'   => '',
        'work_place'   => '',
        'work_address' => '',
        'boss_contact' => '',
        'relation'     => 'integer',
        'ic'           => '',
    ];


    /**
     * parents details
     * 
     * @var int
     * @return array
     */
    public function get($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $parent_ids = $this->db->where("student_id", $student_id)
                               ->where("status", 1)
                               ->get(T_PARENTS)
                               ->result_array();

        $parents = [];
        foreach ($parent_ids as $single_parent){
            $parent_id = $single_parent['parent_id'];
            $parent_detail = $this->db->where("parent_id", $parent_id)
                                      ->select("title, value")
                                      ->get(T_PARENTS_CMS)
                                      ->result_array();
            
            $parent = [];
            foreach ($parent_detail as $single_parent_detail){
                $title = $single_parent_detail['title'];
                $value = $single_parent_detail['value'];
                $parent[$title] = $value;
            }
            $parent['parent_id'] = $parent_id;
            array_push($parents, $parent);
        }

        return $parents;
    }

    public function get_basic($student_id)
    {
        $parent_ids = $this->db->where("student_id", $student_id)
                               ->where("status", 1)
                               ->get(T_PARENTS)
                               ->result_array();

        $parents = [];
        foreach ($parent_ids as $single_parent){
            $parent_id = $single_parent['parent_id'];
            $parent_detail = $this->db->where("parent_id", $parent_id)
                                      ->where("title", "relation")
                                      ->select("title, value")
                                      ->get(T_PARENTS_CMS)
                                      ->result_array();
            
            $parent = [];
            $parent['parent_id'] = $parent_id;
            foreach ($parent_detail as $single_parent_detail){
                $title = $single_parent_detail['title'];
                $value = $single_parent_detail['value'];
                $parent[$title] = $value;
            }
            array_push($parents, $parent);
        }
        return $parents;
    }

    /**
     * create parent
     * 
     * @var int
     * @return int
     */
    public function create($student_id)
    {
        $this->db->set("student_id", $student_id)
                 ->insert(T_PARENTS);

        $parent_id = $this->db->insert_id();
        return $parent_id;
    }

     /**
     *  edit parents details
     * 
     * @var object|int
     * @return int
     */
    public function edit($data, $student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        foreach ($data as $single_data){
            if ($this->form_validation->validate($this->rules, $single_data)){
                $parent_id = $single_data['parent_id'];
                unset($single_data['parent_id']);
                $this->check_existance($parent_id, "parent_id", T_PARENTS);
                foreach ($single_data as $key => $value){
                    $temp_data = [];
                    $temp_data['parent_id'] = $parent_id;
                    $temp_data['title'] = $key;
                    $temp_data['value'] = $value;
                    
                    $parent_cms = $this->db->where("parent_id", $parent_id)
                                           ->where("title", $key)
                                           ->get(T_PARENTS_CMS)
                                           ->row();

                    if (isset($parent_cms)){
                        $this->db->where("parent_id", $parent_id)
                                 ->where("title", $key)
                                 ->update(T_PARENTS_CMS, $temp_data);
                    } else {
                        $this->db->insert(T_PARENTS_CMS, $temp_data);
                    }
                }
            } else {
                return 400;
            }
        }
        return 200;
    }

    /**
     * delete parent
     * 
     * @var int
     * @return int
     */
    public function delete($parent_id)
    {
        $this->check_existance($parent_id, "parent_id", T_PARENTS);
        $this->db->where("parent_id", $parent_id)
                 ->set("status", 0)
                 ->update(T_PARENTS);

        return 200;
    }
}