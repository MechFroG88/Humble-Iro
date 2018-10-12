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
                 ->column("cn_name")     ->varchar(32)
                 ->column("username")    ->varchar(64) ->index()
                 ->column("password")    ->char(60)
                 ->column("token")       ->text()
                 ->column("created")     ->datetime()
                 ->column("updated")     ->datetime()
                 ->column("status")      ->tinyint(2)  ->default(1)
                 ->create("users");

                 $this->table->insertMulti("users", [
                    [ "cn_name" => "干你", "username" => "admin", "password" => password_hash('admin', PASSWORD_DEFAULT), "token" => 0,
                      "created" => date("Y-m-d H:i:s"), "updated" => date("Y-m-d H:i:s") ]]);

        return $this;
    }

    public function financial_aids()
    {
        $this->db->column("financial_aid_id")   ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("supplier")           ->text()
                 ->column("expired_date")       ->datetime()
                 ->column("requirements")       ->text()
                 ->column("financial_aid_type") ->text()
                 ->column("status")             ->tinyint(2) ->default(1)
                 ->create("financial_aids");

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

    public function student_financials()
    {
        $this->db->column("student_id")       ->bigint(20) ->index()
                 ->column("financial_aid_id") ->bigint(20) ->index()
                 ->column("status")           ->tinyint(2)  ->default(1)
                 ->create("student_financials");

        return $this;
    }

    public function student_cms()
    {
        $this->db->column("student_id")  ->bigint(20) ->index()
                 ->column("title")       ->text()
                 ->column("value")       ->text()
                 ->create("student_cms");

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

    public function parent_cms()
    {
        $this->db->column("parent_id")  ->bigint(20) ->index()
                 ->column("title")       ->text()
                 ->column("value")       ->text()
                 ->create("parent_cms");

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

    public function sibling_cms()
    {
        $this->db->column("sibling_id")  ->bigint(20) ->index()
                 ->column("title")       ->text()
                 ->column("value")       ->text()
                 ->create("sibling_cms");

        return $this;
    }

    public function families()
    {
        $this->db->column("student_id")  ->bigint(20) ->index()
                 ->column("title")       ->text()
                 ->column("value")       ->text()
                 ->create("families");
        
        return $this;
    }

    public function finance_incomes()
    {
        $this->db->column("finance_income_id") ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")        ->bigint(20) ->index()
                 ->column("status")            ->tinyint(2) ->default(1)
                 ->create("finance_incomes");

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

    public function finance_expenditures()
    {
        $this->db->column("finance_expenditure_id")   ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")               ->bigint(20) ->index()
                 ->column("status")                   ->tinyint(2) ->default(1)
                 ->create("finance_expenditures");

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

    public function finances()
    {
        $this->db->column("student_id")     ->bigint(20) ->primary()->unique()
                 ->column("remarks")        ->text()
                 ->column("auto_transfer")  ->tinyint(2)
                 ->column("balance")        ->bigint(20)
                 ->create("finances");

        return $this;
    }

    public function airconds()
    {
        $this->db->column("student_id")    ->bigint(20) ->primary()->unique()
                 ->column("amount")        ->bigint(20)
                 ->create("airconds");
        
        return $this;
    }

    public function houses()
    {
        $this->db->column("house_id")      ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")    ->bigint(20) ->index()
                 ->column("status")        ->tinyint(2) ->default(1)
                 ->create("houses");

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

    public function transports()
    {
        $this->db->column("transport_id")     ->bigint(20) ->primary()->unique()->autoIncrement()
                 ->column("student_id")       ->bigint(20) ->index()
                 ->column("status")           ->tinyint(2) ->default(1)
                 ->create("transports");

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

$up->users()
   ->students()
   ->parents()
   ->student_financials()
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
