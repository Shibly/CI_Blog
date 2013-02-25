<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Shibly
 * Date: 2/25/13
 * Time: 4:29 PM
 * To change this template use File | Settings | File Templates.
 */

class User_m extends MY_Model
{
    protected $_table_name = 'users';
    protected $_order_by = 'name';
    public $rules = array(
        'email' =>
        array('field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|validate_email|xss_clean'),
        'password' =>
        array('field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'),
    );

    public $rules_admin = array(
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required|xss_clean'
        ),
        'order' => array(
            'field' => 'order',
            'label' => 'Order',
            'rules' => 'trim|is_natural'
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|matches[password_confirm]'
        ),
        'password_confirm' => array(
            'field' => 'password_confirm',
            'label' => 'Confirm Password',
            'rules' => 'trim|matches[password]'
        ),
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $user = $this->get_by(array(
            'email' => $this->input->post('email'),
            'password' => $this->hash($this->input->post('password')),
        ), true);
        if (count($user)) {
            // log in user
            $data = array(
                'name' => $user->name,
                'email' => $user->email,
                'id' => $user->id,
                'loggedin' => true,
            );
            $this->session->set_userdata($data);
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
    }

    public function loggedin()
    {
        return (bool)$this->session->userdata('loggedin');
    }

    /**
     * @param $string
     * @return string
     */
    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }
}