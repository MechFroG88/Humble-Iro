<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sibling_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * siblings details
     * 
     * @var int
     * @return array
     */
    public function get($student_id)
    {
        $sibling_ids = $this->db->where("student_id", $student_id)
                                ->where("status", 1)
                                ->get(T_SIBLINGS)
                                ->result_array();
        $siblings = [];
        foreach ($siblings_ids as $single_sibling){
            $sibling_id = $single_sibling['sibling_id'];
            $sibling_detail = $this->db->where("sibling_id", $sibling_id)
                                       ->select("title, value")
                                       ->get(T_SIBLINGS_CMS)
                                       ->result_array();
            
            $sibling = [];
            foreach ($sibling_detail as $single_sibling_detail){
                $title = $single_sibling_detail['title'];
                $value = $single_sibling_detail['value'];
                $sibling[$title] = $value;
            }
            array_push($siblings, $sibling);
        }

        return $siblings;
    }

    public function get_basic($student_id)
    {
        $sibling_ids = $this->db->where("student_id", $student_id)
                                ->where("status", 1)
                                ->get(T_SIBLINGS)
                                ->result_array();

        $siblings = [];
        foreach ($siblings_ids as $single_sibling){
            $sibling_id = $single_sibling['sibling_id'];
            $sibling_detail = $this->db->where("sibling_id", $sibling_id)
                                       ->where("title", "relation")
                                       ->select("title, value")
                                       ->get(T_SIBLINGS_CMS)
                                       ->result_array();
            
            $sibling = [];
            foreach ($sibling_detail as $single_sibling_detail){
                $title = $single_sibling_detail['title'];
                $value = $single_sibling_detail['value'];
                $sibling[$title] = $value;
            }
            array_push($siblings, $sibling);
        }
    }

    /**
     * create sibling
     * 
     * @var int
     * @return int
     */
    public function create($student_id)
    {
        $this->db->set("student_id", $student_id)
                 ->insert(T_SIBLINGS);

        $sibling_id = $this->db->insert_id();
        return $sibling_id;
    }

     /**
     *  edit siblings details
     * 
     * @var object|int
     * @return int
     */
    public function edit($data, $student_id)
    {
        foreach ($data as $single_data){
            $sibling_id = $single_data['sibling_id'];
            unset($single_data['sibling_id']);
            if ($this->form_validation->validate($this->rules, $single_data)){
                foreach ($single_data as $key => $value){
                    $temp_data = [];
                    $temp_data['sibling_id'] = $sibling_id;
                    $temp_data['title'] = $key;
                    $temp_data['value'] = $value;
                    
                    $sibling_cms = $this->db->where("sibling_id", $sibling_id)
                                            ->where("title", $key)
                                            ->get(T_SIBLINGS_CMS)
                                            ->row();
    
                    if (isset($sibling_cms)){
                        $this->db->where("sibling_id", $sibling_id)
                                 ->where("title", $key)
                                 ->update(T_SIBLINGS_CMS, $temp_data);
                    } else {
                        $this->db->insert(T_SIBLINGS_CMS, $temp_data);
                    }
                }
            } else {
                return 400;
            }
        }
        return 200;
    }

    /**
     * delete sibling
     * 
     * @var int
     * @return int
     */
    public function delete($sibling_id)
    {
        $this->check_existance($sibling_id, "sibling_id", T_SIBLINGS);
        $this->db->where("sibling_id", $sibling_id)
                 ->set("status", 0)
                 ->update(T_SIBLINGS);

        return 200;
    }
}