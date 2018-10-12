<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transport_cms extends HI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    private $rules = [
        "transport_id" => "required|integer",
        "transport_type" => "",
        "transport_state" => "integer",
        "year" => "integer",
        "model" => ""
    ];
    
    /**
     * transport details
     * 
     * @var int
     * @return array
     */
    public function get($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $transport_ids = $this->db->where("student_id", $student_id)
                                  ->where("status", 1)
                                  ->get(T_TRANSPORTS)
                                  ->result_array();
        $transports = [];
        foreach ($transport_ids as $single_transport){
            $transport_id = $single_transport['transport_id'];
            $transport_detail = $this->db->where("transport_id", $transport_id)
                                         ->select("title, value")
                                         ->get(T_TRANSPORT_CMS)
                                         ->result_array();
            
            $transport = new stdClass;
            foreach ($transport_detail as $single_transport_detail){
                $title = $single_transport_detail['title'];
                $value = $single_transport_detail['value'];
                $transport->$title = $value;
            }
            $transport->transport_id = $transport_id;
            array_push($transports, $transport);
        }

        return $transports;
    }

    /**
     * create transport
     * 
     * @var int
     * @return int
     */
    public function create($student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        $this->db->set("student_id", $student_id)
                 ->insert(T_TRANSPORTS);

        $transport_id = $this->db->insert_id();
        return $transport_id;
    }

    /**
     *  edit transport detail
     * 
     * @var object|int
     * @return int
     */
    public function edit($data, $student_id)
    {
        $this->check_existance($student_id, "student_id", T_STUDENTS);
        foreach ($data as $single_data){
            if ($this->form_validation->validate($this->rules, $single_data)){
                $transport_id = $single_data['transport_id'];
                unset($single_data['transport_id']);
                $this->check_existance($transport_id, "transport_id", T_TRANSPORTS);
                foreach ($single_data as $key => $value){
                    $temp_data = [];
                    $temp_data['transport_id'] = $transport_id;
                    $temp_data['title'] = $key;
                    $temp_data['value'] = $value;
                    
                    $transport_cms = $this->db->where("transport_id", $transport_id)
                                              ->where("title", $key)
                                              ->get(T_TRANSPORT_CMS)
                                              ->row();
    
                    if (isset($transport_cms)){
                        $this->db->where("transport_id", $transport_id)
                                 ->where("title", $key)
                                 ->update(T_TRANSPORT_CMS, $temp_data);
                    } else {
                        $this->db->insert(T_TRANSPORT_CMS, $temp_data);
                    }
                }
            } else {
                return 400;
            }
        }
        return 200;
    }

    /**
     * Delete transport
     * 
     * @var int
     * @return int
     */
    public function delete($transport_id)
    {
        $this->check_existance($transport_id, "transport_id", T_TRANSPORTS);
        $this->db->where("transport_id", $transport_id)
                 ->set("status", 0)
                 ->update(T_TRANSPORTS);
                 
        return 200;
    }
}