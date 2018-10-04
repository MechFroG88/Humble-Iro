<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class House_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        "house_type" => "",
        "house_state" => "integer"
    ];

    /**
     * house details
     * 
     * @var int
     * @return array
     */
    public function get($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $house_ids = $this->db->where("student_id", $student_id)
                              ->where("status", 1)
                              ->get(T_HOUSE)
                              ->result_array();
        $houses = [];
        foreach ($house_ids as $single_house){
            $house_id = $single_house['house_id'];
            $house_detail = $this->db->where("house_id", $house_id)
                                     ->select("title, value")
                                     ->get(T_HOUSE_CMS)
                                     ->result_array();
            
            $house = [];
            foreach ($house_detail as $single_house_detail){
                $title = $single_house_detail['title'];
                $value = $single_house_detail['value'];
                $house[$title] = $value;
            }
            $house['house_id'] = $house_id;
            array_push($houses, $house);
        }

        return $houses;
    }

    /**
     * create house
     * 
     * @var int
     * @return int
     */
    public function create($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $this->db->set("student_id", $student_id)
                 ->insert(T_HOUSE);

        $house_id = $this->db->insert_id();
        return $house_id;
    }

    /**
     *  edit house detail
     * 
     * @var object|int
     * @return int
     */
    public function edit($data, $student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        foreach ($data as $single_data){
            $house_id = $single_data['house_id'];
            unset($single_data['house_id']);
            if ($this->form_validation->validate($this->rules, $single_data)){
                foreach ($single_data as $key => $value){
                    $temp_data = [];
                    $temp_data['house_id'] = $house_id;
                    $temp_data['title'] = $key;
                    $temp_data['value'] = $value;
                    
                    $house_cms = $this->db->where("house_id", $house_id)
                                          ->where("title", $key)
                                          ->get(T_HOUSE_CMS)
                                          ->row();
    
                    if (isset($house_cms)){
                        $this->db->where("house_id", $house_id)
                                 ->where("title", $key)
                                 ->update(T_HOUSE_CMS, $temp_data);
                    } else {
                        $this->db->insert(T_HOUSE_CMS, $temp_data);
                    }
                }
            } else {
                return 400;
            }
        }
        return 200;
    }

    /**
     * Delete house
     * 
     * @var int
     * @return int
     */
    public function delete($house_id)
    {
        $this->check_existance($house_id, "house_id", T_HOUSE);
        $this->db->where("house_id", $house_id)
                 ->set("status", 0)
                 ->update(T_HOUSE);

        return 200;
    }
}