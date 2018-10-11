<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends HI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        if ($this->auth->is_logged_in()){
            $this->json($this->auth->get());
        } else {
            $this->error(401);
        }
    }

    public function create()
    {
        $data = $this->input->post();
        if ($this->auth->is_logged_in()){
            $status = $this->auth->create($data);
            if ($status == 200){
                $this->json('Added successfully');
            } else {
                $this->error($status);
            }
        } else {
          $this->error(401);
        }
    }

    public function edit($user_id)
    {
        $data = $this->input->post();
        if ($this->auth->is_logged_in()){
            $status = $this->auth->edit($data, $user_id);
            if ($status == 200){
                $this->json('Edited successfully');
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
        if ($this->auth->is_logged_in()){
            $status = $this->auth->change_password($data);
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
        if ($this->auth->is_logged_in()){
            $status = $this->auth->delete($user_id);
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
        $token = $this->auth->login($data);
        if (is_int($token)){
            $this->error($token);
        } else {
            $this->json($token);
        }
    }

}