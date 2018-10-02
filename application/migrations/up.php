<?php
require_once "MysqliDb.php";
require_once "hoff.php";

class Upstream
{
    public function __construct()
    {
        $this->db = new Hoff(new MysqliDb('localhost', 'root', 'root', 'fulichu'));
        $this->table = new MysqliDb('localhost', 'root', 'root', 'fulichu');
    }

    public function users()
    {
        $this->db->column("user_id")     ->bigint(20)  ->primary()->unique()->autoIncrement()
                 ->column("username")    ->varchar(64) ->index()
                 ->column("password")    ->char(60)
                 ->column("token")       ->text()
                 ->column("created")     ->datetime()
                 ->column("updated")     ->datetime()
                 ->column("status")      ->tinyint(2)  ->default(1)
                 ->create("users");

        return $this;
    }

    public function financial_aid()
    {
        $this->db->column("financial_aid_id") ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("title")            ->text()
                 ->column("supplier")         ->text()
                 ->column("status")           ->tinyint(2) ->default(1)
                 ->create("financial_aid");

        return $this;
    }

    public function students()
    {
        $this->db->column("student_id")  ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("cn_name")     ->varchar(8) ->index()
                 ->column("en_name")     ->varchar(64)
                 ->column("number")      ->int(6)
                 ->column("class")       ->varchar(8)
                 ->column("created")     ->datetime()
                 ->column("updated")     ->datetime()
                 ->column("status")      ->tinyint(2)  ->default(1)
                 ->create("students");

        return $this;
    }

    public function students_cms()
    {
        $this->db->column("student_id")  ->bigint(20) ->index()
                 ->column("title")       ->text()
                 ->column("value")       ->text()
                 ->create("students_cms");

        return $this;
    }

    public function parents()
    {
        $this->db->column("parent_id")   ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")  ->bigint(20) ->index()
                 ->create("parents");

        return $this;
    }

    public function parents_cms()
    {
        $this->db->column("student_id")  ->bigint(20) ->index()
                 ->column("title")       ->text()
                 ->column("value")       ->text()
                 ->create("parents_cms");

        return $this;
    }

    public function siblings()
    {
        $this->db->column("sibling_id")   ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")  ->bigint(20) ->index()
                 ->create("siblings");

        return $this;
    }

    public function siblings_cms()
    {
        $this->db->column("student_id")  ->bigint(20) ->index()
                 ->column("title")       ->text()
                 ->column("value")       ->text()
                 ->create("siblings_cms");

        return $this;
    }

    public function family()
    {
        $this->db->column("student_id")  ->bigint(20) ->index()
                 ->column("title")       ->text()
                 ->column("value")       ->text()
                 ->create("family");
        
        return $this;
    }

    public function finance_income()
    {
        $this->db->column("student_id")   ->bigint(20) ->index()
                 ->column("member")       ->varchar(16)
                 ->column("income")       ->bigint(20)
                 ->create("finance_income");

        return $this;
    }

    public function finance_expenditure()
    {
        $this->db->column("student_id")   ->bigint(20) ->index()
                 ->column("object")       ->varchar(16)
                 ->column("expenditure")  ->bigint(20)
                 ->create("finance_expenditure");

        return $this;
    }

    public function finance()
    {
        $this->db->column("student_id")     ->bigint(20) ->primary()->unique()
                 ->column("remarks")        ->text()
                 ->column("auto_transfer")  ->tinyint(2)
                 ->column("balance")        ->bigint(20)
                 ->create("finance");

        return $this;
    }

    public function aircond()
    {
        $this->db->column("student_id")    ->bigint(20) ->primary()->unique()
                 ->column("amount")        ->bigint(20)
                 ->create("aircond");
        
        return $this;
    }

    public function houses()
    {
        $this->db->column("student_id")    ->bigint(20) ->index()
                 ->column("house_state")   ->tinyint(2)
                 ->column("house_type")    ->varchar(16)
                 ->create("houses");

        return $this;
    }

    public function transport()
    {
        $this->db->column("student_id")       ->bigint(20) ->index()
                 ->column("transport_type")   ->tinyint(2)
                 ->column("model")            ->varchar(16)
                 ->column("year")             ->int(4)
                 ->create("transport");

        return $this;
    }
}

$up = new Upstream();

$up->users()
   ->students()
   ->parents()
   ->siblings()
   ->family()
   ->finance_income()
   ->finance_expenditure()
   ->finance()
   ->houses()
   ->financial_aid()
   ->students_cms()
   ->parents_cms()
   ->siblings_cms()
   ->aircond()
   ->transport();