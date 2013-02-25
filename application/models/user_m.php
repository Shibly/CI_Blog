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

    public function __construct()
    {
        parent::__construct();
    }

}