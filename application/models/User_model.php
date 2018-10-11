<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends HI_Model{

    private $register_rules = [
        "username"   => "required|min_length[5]|is_unique[users.username]",
        "password"   => "required",
    ];

    private $login_rules = [
        "username"   => "required",
        "password"   => "required",
    ];

    private $edit_rules = [
        "cn_name"    => "required|regex_match[/[\x{4e00}-\x{9fa5}]+/u]"
    ];

    public $user;

    public function __construct(){
        parent::__construct();
        $user  = $this->db->where("token", $this->get_token())
                          ->where("status", 1)
                          ->get(T_USERS)
                          ->row();

        if (isset($user)){
            $this->user = $user;
        }
    }

    public function get()
    {
        return $this->db->where("status",1)
                        ->select("user_id, cn_name, username, created")
                        ->get(T_USERS)
                        ->result();
    }

    public function create($data)
    {
        if ($this->form_validation->validate($this->register_rules,$data)){
            $data['created']   = $this->date();
            $data['updated']   = $this->date();
            $data['password']  = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->db->insert(T_USERS, $data);
            return 200;
        } else {
            return 400;
        }
    }

    public function edit($data, $user_id)
    {
        if ($this->form_validation->validate($this->register_rules,$data)){
            $this->db->where("user_id", $user_id)
                     ->set("cn_name", $data['cn_name'])
                     ->update(T_USERS);
            return 200;
        } else {
            return 400;
        }
    }

    public function change_password($data)
    {
        $user_id = $this->user->user_id;
        if (password_verify($data['old'], $this->user->password)){
            $this->db->where("user_id", $user_id)
                     ->set("password", password_hash($data['new'], PASSWORD_DEFAULT))
                     ->set("updated", $this->date())
                     ->update(T_USERS);
            return 200;
        } else {
            return 400;
        }
    }

    public function delete($user_id)
    {
        $this->db->where("user_id", $user_id)
                 ->set("status", 0)
                 ->update(T_USERS);

        return 200;
    }

    public function login($data)
    {
        if ($this->form_validation->validate($this->login_rules,$data)) {
            $user = $this->db->where("username", $data['username'])
                             ->where("status", 1)
                             ->get(T_USERS)
                             ->row();
            
            if (isset($user) && password_verify($data['password'], $user->password)){
                $token = $this->update_token($user->user_id);
                return $token;
            } else {
                return 400;
            }
        } else {
            return 400;
        }
    }

    public function is_logged_in()
    {
        return isset($this->user);
    }

    private function get_token()
    {
        return isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : 
               (isset($_COOKIE['token']) ? $_COOKIE['token'] : false);
    }

    private function update_token($user_id)
    {
        $token = $this->generate_token();
        $this->db->where("user_id", $user_id)->update(T_USERS, [
            "token"    => $token,
            "updated" => $this->date()
        ]);
        return $token;
    }

    private function generate_token()
    {
        $token = "";
        do{
            $token = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                mt_rand( 0, 0xffff ),
                mt_rand( 0, 0x0fff ) | 0x4000,
                mt_rand( 0, 0x3fff ) | 0x8000,
                mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
        }while($this->db->where("token", $token)->get(T_USERS)->row());

        return $token;
    }
}