<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends HI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("House_cms"              , "house");
        $this->load->model("Parent_cms"             , "parent");
        $this->load->model("Family_cms"             , "family");
        $this->load->model("Aircond_cms"            , "aircond");
        $this->load->model("Student_cms"            , "student");
        $this->load->model("Sibling_cms"            , "sibling");
        $this->load->model("Finance_cms"            , "finance");
        $this->load->model("Transport_cms"          , "transport");
        $this->load->model("Finance_income_cms"     , "finance_income");
        $this->load->model("Finance_expenditure_cms", "finance_expenditure");
    }

    public function get($student_id)
    {
        $student = new stdClass;

        $student->house                = $this->house->get($student_id);
        $student->parent               = $this->parent->get($student_id);
        $student->family               = $this->family->get($student_id);
        $student->aircond              = $this->aircond->get($student_id);
        $student->student              = $this->student->get($student_id);
        $student->sibling              = $this->sibling->get($student_id);
        $student->finance              = $this->finance->get($student_id);
        $student->transport            = $this->transport->get($student_id);
        $student->finance_income       = $this->finance_income->get($student_id);
        $student->finance_expenditure  = $this->finance_expenditure->get($student_id);

        return $student;
    }

}