<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 2/25/13
 * Time: 4:02 PM
 * To change this template use File | Settings | File Templates.
 */

class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['meta_title'] = 'My awesome CMS';
    }

    public function login()
    {
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == true) {
            // we can log in and redirect
        }
        $this->data['subview'] = 'admin/user/login';
        $this->load->view('admin/_layout_modal', $this->data);
    }

}