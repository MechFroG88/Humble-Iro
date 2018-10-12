<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sibling_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        'sibling_id'    => 'required|integer',
        'cn_name'       => 'regex_match[/[\x{4e00}-\x{9fa5}]+/u]',
        'age'           => 'integer',
        'aid_total'     => 'integer',
        'got_aid'       => 'integer',
        'relation'      => 'integer',
        'financial_aid' => '',
    ];

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
        foreach ($sibling_ids as $single_sibling){
            $sibling_id = $single_sibling['sibling_id'];
            $sibling_detail = $this->db->where("sibling_id", $sibling_id)
                                       ->select("title, value")
                                       ->get(T_SIBLING_CMS)
                                       ->result_array();
            
            $sibling = new stdClass;
            $financial_aid = [];
            foreach ($sibling_detail as $single_sibling_detail){
                $title = $single_sibling_detail['title'];
                $value = $single_sibling_detail['value'];
                if ($title == "financial_aid"){
                    $cn_name = $this->db->where("financial_aid_id", $value)
                                        ->where("status", 1)
                                        ->select("financial_aid_type")
                                        ->get(T_FINANCIAL_AIDS)
                                        ->row();
                    isset($cn_name) ? array_push($financial_aid, $cn_name) : NULL ;
                    continue;
                }
                $sibling->$title = $value;
            }
            $sibling->sibling_id = $sibling_id;
            if(!empty($financial_aid)){
                $sibling->financial_aid = $financial_aid;
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
        foreach ($sibling_ids as $single_sibling){
            $sibling_id = $single_sibling['sibling_id'];
            $sibling_detail = $this->db->where("sibling_id", $sibling_id)
                                       ->where("title", "relation")
                                       ->select("title, value")
                                       ->get(T_SIBLING_CMS)
                                       ->result_array();
            
            $sibling = new stdClass;
            foreach ($sibling_detail as $single_sibling_detail){
                $title = $single_sibling_detail['title'];
                $value = $single_sibling_detail['value'];
                $sibling->$title = $value;
            }
            $sibling->sibling_id = $sibling_id;
            array_push($siblings, $sibling);
        }
        return $siblings;
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
            if ($this->form_validation->validate($this->rules, $single_data)){
                $sibling_id = $single_data['sibling_id'];
                unset($single_data['sibling_id']);
                $this->check_existance($sibling_id, "sibling_id", T_SIBLINGS);
                foreach ($single_data as $key => $value){
                    if ($key == "financial_aid"){
                        $this->financial_aid($value, $sibling_id);
                        continue;
                    }
                    $temp_data = [];
                    $temp_data['sibling_id'] = $sibling_id;
                    $temp_data['title'] = $key;
                    $temp_data['value'] = $value;
                    
                    $sibling_cms = $this->db->where("sibling_id", $sibling_id)
                                            ->where("title", $key)
                                            ->get(T_SIBLING_CMS)
                                            ->row();
    
                    if (isset($sibling_cms)){
                        $this->db->where("sibling_id", $sibling_id)
                                 ->where("title", $key)
                                 ->update(T_SIBLING_CMS, $temp_data);
                    } else {
                        $this->db->insert(T_SIBLING_CMS, $temp_data);
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

    public function financial_aid($value, $sibling_id)
    {
        $this->db->where("sibling_id", $sibling_id)
                 ->where("title", "financial_aid")
                 ->delete(T_SIBLING_CMS);

        if (is_array($value)){
            foreach ($value as $single_value){
                $temp_data = [];
                $temp_data['sibling_id'] = $sibling_id;
                $temp_data['title'] = "financial_aid";
                $temp_data['value'] = $single_value;
    
                $this->db->insert(T_SIBLING_CMS, $temp_data);
            }
        }
    }
}