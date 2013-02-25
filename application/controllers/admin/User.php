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

    public function index()
    {
        $this->data['users'] = $this->user_m->get();
        $this->data['subview'] = 'admin/user/index';
        $this->load->view('admin/_layout_main', $this->data);
    }


    public function edit($id = null)
    {
        if ($id == NULL) {
            $this->data['user'] = $this->user_m->get($id);
        }
        $rules = $this->user_m->rules_admin;
        $id || $rules['password'] .= '|required';
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == true) {
        }
        $this->data['subview'] = 'admin/user/edit';
        $this->load->view('admin/_layout_main', $this->data);

    }

    public function delete($id)
    {
    }

    public function login()
    {
        $dashboard = 'admin/dashboard';
        $this->user_m->loggedin() == false || redirect($dashboard);
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == true) {
            // we can log in and redirect
            if ($this->user_m->login() == true) {
                redirect($dashboard);
            } else {
                $this->session->set_flashdata('error', 'The email/password combination does not exist');
                redirect('admin/user/login', 'refresh');
            }
        }
        $this->data['subview'] = 'admin/user/login';
        $this->load->view('admin/_layout_modal', $this->data);
    }

    public function logout()
    {
        $this->user_m->logout();
        redirect('admin/user/login');
    }


    public function  _unique_email($str)
    {
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $user = $this->user_m->get();
        if (count($user)) {
            $this->form_validation->set_message('_unique_email', '%s should be unique');
            return false;
        }
        return true;
    }

}