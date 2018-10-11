<?php
require_once "MysqliDb.php";
require_once "hoff.php";

class Downstream
{
    public function __construct()
    {
        $this->db = new Hoff(new MysqliDb('localhost', 'root', 'root', 'fulichu'));
        $this->table = new MysqliDb('localhost', 'root', 'root', 'fulichu');
    }

    public function users()
    {
        $this->db->drop("users");
        return $this;
    }

    public function financial_aid()
    {
        $this->db->drop("financial_aid");
        return $this;
    }

    public function students()
    {
        $this->db->drop("students");
        return $this;
    }

    public function student_financial()
    {
        $this->db->drop("student_financial");
        return $this;
    }

    public function students_cms()
    {
        $this->db->drop("students_cms");
        return $this;
    }

    public function parents()
    {
        $this->db->drop("parents");
        return $this;
    }

    public function parents_cms()
    {
        $this->db->drop("parents_cms");
        return $this;
    }

    public function siblings()
    {
        $this->db->drop("siblings");
        return $this;
    }

    public function siblings_cms()
    {
        $this->db->drop("siblings_cms");
        return $this;
    }

    public function family()
    {
        $this->db->drop("family");
        return $this;
    }

    public function finance_income()
    {
        $this->db->drop("finance_income");
        return $this;
    }

    public function finance_income_cms()
    {
        $this->db->drop("finance_income_cms");
        return $this;
    }

    public function finance_expenditure()
    {
        $this->db->drop("finance_expenditure");
        return $this;
    }

    public function finance_expenditure_cms()
    {
        $this->db->drop("finance_expenditure_cms");
        return $this;
    }

    public function finance()
    {
        $this->db->drop("finance");
        return $this;
    }

    public function aircond()
    {
        $this->db->drop("aircond");       
        return $this;
    }

    public function house()
    {
        $this->db->drop("house");
        return $this;
    }
    
    public function house_cms()
    {
        $this->db->drop("house_cms");
        return $this;
    }

    public function transport()
    {
        $this->db->drop("transport");
        return $this;
    }

    public function transport_cms()
    {
        $this->db->drop("transport_cms");
        return $this;
    }
}

$down = new Downstream();

$down->users()
     ->students()
     ->student_financial()
     ->parents()
     ->siblings()
     ->family()
     ->finance_income()
     ->finance_income_cms()
     ->finance_expenditure()
     ->finance_expenditure_cms()
     ->finance()
     ->house()
     ->house_cms()
     ->financial_aid()
     ->students_cms()
     ->parents_cms()
     ->siblings_cms()
     ->aircond()
     ->transport()
     ->transport_cms();