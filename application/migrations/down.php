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

    public function financial_aids()
    {
        $this->db->drop("financial_aids");
        return $this;
    }

    public function students()
    {
        $this->db->drop("students");
        return $this;
    }

    public function student_financials()
    {
        $this->db->drop("student_financials");
        return $this;
    }

    public function student_cms()
    {
        $this->db->drop("student_cms");
        return $this;
    }

    public function parents()
    {
        $this->db->drop("parents");
        return $this;
    }

    public function parent_cms()
    {
        $this->db->drop("parent_cms");
        return $this;
    }

    public function siblings()
    {
        $this->db->drop("siblings");
        return $this;
    }

    public function sibling_cms()
    {
        $this->db->drop("sibling_cms");
        return $this;
    }

    public function families()
    {
        $this->db->drop("families");
        return $this;
    }

    public function finance_incomes()
    {
        $this->db->drop("finance_incomes");
        return $this;
    }

    public function finance_income_cms()
    {
        $this->db->drop("finance_income_cms");
        return $this;
    }

    public function finance_expenditures()
    {
        $this->db->drop("finance_expenditures");
        return $this;
    }

    public function finance_expenditure_cms()
    {
        $this->db->drop("finance_expenditure_cms");
        return $this;
    }

    public function finances()
    {
        $this->db->drop("finances");
        return $this;
    }

    public function airconds()
    {
        $this->db->drop("airconds");       
        return $this;
    }

    public function houses()
    {
        $this->db->drop("houses");
        return $this;
    }
    
    public function house_cms()
    {
        $this->db->drop("house_cms");
        return $this;
    }

    public function transports()
    {
        $this->db->drop("transports");
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
     ->student_financials()
     ->parents()
     ->siblings()
     ->families()
     ->finance_incomes()
     ->finance_income_cms()
     ->finance_expenditures()
     ->finance_expenditure_cms()
     ->finances()
     ->houses()
     ->house_cms()
     ->financial_aids()
     ->student_cms()
     ->parent_cms()
     ->sibling_cms()
     ->airconds()
     ->transports()
     ->transport_cms();