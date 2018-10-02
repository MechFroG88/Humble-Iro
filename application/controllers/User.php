<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model","user");
    }

    public function get()
    {
        if ($this->user->is_logged_in()){
            $this->json($this->user->get());
        } else {
            $this->error(401);
        }
    }

    public function create()
    {
        $data = $this->input->post();
        if ($this->user->is_logged_in()){
            $status = $this->user->create($data);
            if ($status == 200){
                $this->json('Added successfully');
            } else {
                $this->error($status);
            }
        } else {
           $this->error(401);
        }
    }

    public function change_password()
    {
        $data = $this->input->post();
        if ($this->user->is_logged_in()){
            $status = $this->user->change_password($data);
            if ($status == 200){
                $this->json('Password changed successfully');
            } else {
                $this->error($status);
            }
        } else {
            $this->error(401);
        }
    }

    public function delete($user_id)
    {
        if ($this->user->is_logged_in()){
            $status = $this->user->delete($user_id);
            if ($status == 200){
                $this->json('Deleted succesfully');
            } else {
                $this->error($status);
            }
        } else {
            $this->error(401);
        }
    }

    public function login()
    {
        $data = $this->input->post();
        $token = $this->user->login($data);
        if (is_int($token)){
            $this->error($token);
        } else {
            $this->json($token);
        }
    }

}