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
        $this->db->column("financial_aid_id")   ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("supplier")           ->text()
                 ->column("expired_date")       ->datetime()
                 ->column("financial_aid_type") ->text()
                 ->column("status")             ->tinyint(2) ->default(1)
                 ->create("financial_aid");

        return $this;
    }

    public function students()
    {
        $this->db->column("student_id")  ->bigint(20) ->primary()->unique()->autoIncrement()
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
                 ->column("status")      ->tinyint(2) ->default(1)
                 ->create("parents");

        return $this;
    }

    public function parents_cms()
    {
        $this->db->column("parent_id")  ->bigint(20) ->index()
                 ->column("title")       ->text()
                 ->column("value")       ->text()
                 ->create("parents_cms");

        return $this;
    }

    public function siblings()
    {
        $this->db->column("sibling_id")   ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")   ->bigint(20) ->index()
                 ->column("status")       ->tinyint(2) ->default(1)
                 ->create("siblings");

        return $this;
    }

    public function siblings_cms()
    {
        $this->db->column("sibling_id")  ->bigint(20) ->index()
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
        $this->db->column("finance_income_id") ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")        ->bigint(20) ->index()
                 ->column("status")            ->tinyint(2) ->default(1)
                 ->create("finance_income");

        return $this;
    }

    public function finance_income_cms()
    {
        $this->db->column("finance_income_id")   ->bigint(20) ->index()
                 ->column("member")              ->varchar(16)
                 ->column("income")              ->bigint(20)
                 ->create("finance_income_cms");

        return $this;
    }

    public function finance_expenditure()
    {
        $this->db->column("finance_expenditure_id")   ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")               ->bigint(20) ->index()
                 ->column("status")                   ->tinyint(2) ->default(1)
                 ->create("finance_expenditure");

        return $this;
    }

    public function finance_expenditure_cms()
    {
        $this->db->column("finance_expenditure_id")   ->bigint(20) ->index()
                 ->column("object")                   ->varchar(16)
                 ->column("expenditure")              ->bigint(20)
                 ->create("finance_expenditure_cms");

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

    public function house()
    {
        $this->db->column("house_id")      ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")    ->bigint(20) ->index()
                 ->column("status")        ->tinyint(2) ->default(1)
                 ->create("house");

        return $this;
    }

    public function house_cms()
    {
        $this->db->column("house_id")    ->bigint(20) ->index()
                 ->column("title")       ->text()
                 ->column("value")       ->text()
                 ->create("house_cms");

        return $this;
    }

    public function transport()
    {
        $this->db->column("transport_id")     ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")       ->bigint(20) ->index()
                 ->column("status")           ->tinyint(2) ->default(1)
                 ->create("transport");

        return $this;
    }

    public function transport_cms()
    {
        $this->db->column("transport_id")     ->bigint(20) ->index()
                 ->column("title")            ->text()
                 ->column("value")            ->text()
                 ->create("transport_cms");

        return $this;
    }

}

$up = new Upstream();

/*$up->users()
   ->students()
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
   ->transport_cms();*/

$up->transport_cms();